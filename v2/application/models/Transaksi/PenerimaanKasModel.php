<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenerimaanKasModel extends CI_Model
{
    function __construct()
    {
        $this->load->database();
        $this->verifikasi = $this->load->database('default', TRUE);
        //Access Model Lain
        $CI = &get_instance();
        $this->CI = $CI;
        $this->CI->load->model('master');
    }

    function getPenerimaanKas($search = array())
    {
        //Get Divisi
        $divisi = $this->CI->master->getDivisi();
        
        //Get Penerimaan Kas
        if (!empty($search)) {
            $category = $search['search-category'];
            $dateRange = explode(" - ", $search['search-penerimaan_kas-datepicker']);

            $dateRange[0] = date_format(date_create_from_format("d/m/Y", $dateRange[0]), "Y-m-d ");
            $dateRange[1] = date_format(date_create_from_format("d/m/Y", $dateRange[1]), "Y-m-d ");
        if (!empty($category)) {
            $category = "trx_penerimaan_kas.kode_bank = '$category' AND";
        }else{
            $category = "";
        }   
            $data_penerimaan_kas = $this->db->query(
                "SELECT
                    trx_penerimaan_kas.*,
                    mst_jenis_transaksi_arus_kas.nama_jenis_transaksi_arus_kas
                FROM trx_penerimaan_kas
                JOIN mst_jenis_transaksi_arus_kas
                    ON trx_penerimaan_kas.id_jenis_transaksi_arus_kas = mst_jenis_transaksi_arus_kas.id_jenis_transaksi_arus_kas
                WHERE $category mst_jenis_transaksi_arus_kas.tipe_jenis_transaksi_arus_kas = 'Cash In' AND trx_penerimaan_kas.tanggal_posting BETWEEN ? AND ?
                ORDER BY id_penerimaan_kas",
                [
                    $dateRange[0],
                    $dateRange[1],
                ]
            )->result();
        } else {
            $data_penerimaan_kas = $this->db->query(
                "SELECT
                    trx_penerimaan_kas.*,
                    mst_jenis_transaksi_arus_kas.nama_jenis_transaksi_arus_kas
                FROM trx_penerimaan_kas
                JOIN mst_jenis_transaksi_arus_kas
                    ON trx_penerimaan_kas.id_jenis_transaksi_arus_kas = mst_jenis_transaksi_arus_kas.id_jenis_transaksi_arus_kas
WHERE mst_jenis_transaksi_arus_kas.tipe_jenis_transaksi_arus_kas = 'Cash In'                   
                ORDER BY id_penerimaan_kas"
            )->result();
        }

        //Join Payload Penerimaan Kas & Divisi
        foreach ($data_penerimaan_kas as $kas) {
            $index_divisi = array_search($kas->id_divisi, array_column($divisi, 'kode_unit'));
            $kas->nama_divisi = $divisi[$index_divisi]->nama_unit;
            $kas->singkatan_divisi = $divisi[$index_divisi]->singkatan_unit;
        }

        return $data_penerimaan_kas;
    }

    function getDetailPenerimaanKas($id)
    {
        //Get Divisi
        $divisi = $this->CI->master->getDivisi();

        //Get Penerimaan Kas
        $data_penerimaan_kas = $this->db->query(
            "SELECT
                trx_penerimaan_kas.*,
                mst_jenis_transaksi_arus_kas.nama_jenis_transaksi_arus_kas
            FROM trx_penerimaan_kas
            JOIN mst_jenis_transaksi_arus_kas
                ON trx_penerimaan_kas.id_jenis_transaksi_arus_kas = mst_jenis_transaksi_arus_kas.id_jenis_transaksi_arus_kas
            WHERE trx_penerimaan_kas.id_penerimaan_kas = ?
            ORDER BY id_penerimaan_kas",
            [
                $id
            ]
        )->result();

        //Join Payload Penerimaan Kas & Divisi
        foreach ($data_penerimaan_kas as $kas) {
            $index_divisi = array_search($kas->id_divisi, array_column($divisi, 'kode_unit'));
            $kas->nama_divisi = $divisi[$index_divisi]->nama_unit;
            $kas->singkatan_divisi = $divisi[$index_divisi]->singkatan_unit;
        }

        return $data_penerimaan_kas;
    }

    function addPenerimaanKas($data)
    {
        //Parse Date
        $data["tanggal_posting"] = date("Y-m-d H:i:s", strtotime($data["tanggal_posting"]));

        //Parse Number
        $data["nominal_transaksi"] = parseNumberLocaleId($data["nominal_transaksi"]);

        $query = $this->db->query(
            "INSERT INTO trx_penerimaan_kas
                (
                    id_jenis_transaksi_arus_kas,
                    id_divisi,
                    tanggal_posting,
                    kode_bank,
                    nominal_penerimaan_kas,
                    keterangan
                )
            VALUES
                (
                    ?,?,?,?,?,?
                )
            RETURNING id_penerimaan_kas
            ",
            [
                $data["jenis_transaksi"],
                (int)$data["divisi"],
                $data["tanggal_posting"],
                $data["bank"],
                $data["nominal_transaksi"],
                $data["keterangan"]
            ]
        )->result();

        return $query;
    }

    function editPenerimaanKas($data)
    {
        //Parse Date
        $data["tanggal_posting"] = date("Y-m-d H:i:s", strtotime($data["tanggal_posting"]));

        //Parse Number
        $data["nominal_transaksi"] = parseNumberLocaleId($data["nominal_transaksi"]);

        //Cek Ketersediaan
        $dataTersedia = $this->db->query("SELECT * FROM trx_penerimaan_kas WHERE id_penerimaan_kas = ?", [$data["id_penerimaan_kas"]])->num_rows();
        if (!$dataTersedia) {
            return "404";
        } else {
            $query = $this->db->query(
                "UPDATE trx_penerimaan_kas SET
                    id_jenis_transaksi_arus_kas = ?,
                    id_divisi = ?,
                    tanggal_posting = ?,
                    kode_bank = ?,
                    nominal_penerimaan_kas = ?,
                    keterangan = ?
                WHERE
                    id_penerimaan_kas = ?
                RETURNING id_penerimaan_kas
                ",
                [
                    $data["jenis_transaksi"],
                    (int)$data["divisi"],
                    $data["tanggal_posting"],
                    $data["bank"],
                    $data["nominal_transaksi"],
                    $data["keterangan"],
                    $data["id_penerimaan_kas"]
                ]
            )->result();

            if ($query) {
                return true;
            }
        }

        return false;
    }

    function hapusPenerimaanKas($data)
    {
        //Cek Ketersediaan
        $dataTersedia = $this->db->query("SELECT * FROM trx_penerimaan_kas WHERE id_penerimaan_kas = ?", [$data["id_penerimaan_kas"]])->num_rows();
        if (!$dataTersedia) {
            return "404";
        } else {
            $query = $this->db->query("DELETE FROM trx_penerimaan_kas WHERE id_penerimaan_kas = ?", [$data['id_penerimaan_kas']]);
            if ($query) return true;
        }
        return false;
    }

    function getLaporanArusKas($date)
    {
        if (count($date) > 0) {

            $arrDate = explode("-", $date['search-laporan_penerimaan_kas']);
            $tahun = (int)$arrDate[0];
            $bulan = (int)$arrDate[1];
        } else {
            $tahun = (int)date('Y');
            $bulan = (int)date('m');
        }

        $query = $this->db->query(
            "SELECT
                trx_penerimaan_kas.id_divisi,
                mst_jenis_arus_kas.nama_jenis_arus_kas,
                mst_jenis_transaksi_arus_kas.nama_jenis_transaksi_arus_kas,
                SUM (trx_penerimaan_kas.nominal_penerimaan_kas) as nominal_penerimaan_kas
            FROM trx_penerimaan_kas
            JOIN mst_jenis_transaksi_arus_kas ON trx_penerimaan_kas.id_jenis_transaksi_arus_kas = mst_jenis_transaksi_arus_kas.id_jenis_transaksi_arus_kas
            JOIN mst_jenis_arus_kas ON mst_jenis_transaksi_arus_kas.id_jenis_arus_kas = mst_jenis_arus_kas.id_jenis_arus_kas
            WHERE 
                EXTRACT(MONTH FROM DATE_TRUNC('month', trx_penerimaan_kas.tanggal_posting)) = $bulan AND
                EXTRACT(YEAR FROM DATE_TRUNC('month', trx_penerimaan_kas.tanggal_posting)) = $tahun
            GROUP BY
                trx_penerimaan_kas.id_divisi,
                EXTRACT(MONTH FROM DATE_TRUNC('month', trx_penerimaan_kas.tanggal_posting)),
                mst_jenis_transaksi_arus_kas.nama_jenis_transaksi_arus_kas,
                mst_jenis_arus_kas.nama_jenis_arus_kas

            -- -----------------------------------------------------------------------------
            UNION ALL
            SELECT
                0 as id_divisi,
                mst_jenis_arus_kas.nama_jenis_arus_kas,
                mst_jenis_transaksi_arus_kas.nama_jenis_transaksi_arus_kas,
                SUM (trx_penerimaan_kas.nominal_penerimaan_kas) as nominal_penerimaan_kas
            FROM trx_penerimaan_kas
            JOIN mst_jenis_transaksi_arus_kas ON trx_penerimaan_kas.id_jenis_transaksi_arus_kas = mst_jenis_transaksi_arus_kas.id_jenis_transaksi_arus_kas
            JOIN mst_jenis_arus_kas ON mst_jenis_transaksi_arus_kas.id_jenis_arus_kas = mst_jenis_arus_kas.id_jenis_arus_kas
            WHERE 
                EXTRACT(MONTH FROM DATE_TRUNC('month', trx_penerimaan_kas.tanggal_posting)) = $bulan AND
                EXTRACT(YEAR FROM DATE_TRUNC('month', trx_penerimaan_kas.tanggal_posting)) = $tahun
            GROUP BY
                EXTRACT(MONTH FROM DATE_TRUNC('month', trx_penerimaan_kas.tanggal_posting)),
                mst_jenis_transaksi_arus_kas.nama_jenis_transaksi_arus_kas,
                mst_jenis_arus_kas.nama_jenis_arus_kas
            "
        )->result();

        return $query;
    }
  function test_verifikasi(){
      $data = $this->verifikasi->query('select * from view_corfin')->result();
    //   print_r($data);
  }  
}
