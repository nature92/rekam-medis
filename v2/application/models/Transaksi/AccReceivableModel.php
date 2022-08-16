<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AccReceivableModel extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    function getDataAccReceivable($chart = '')
    {
        $where = '';
        $order = 'DESC';
        if ($chart === 'chart') {
            $where = "WHERE tgl_piutang >= '" . date('Y-m-d H:i:s', strtotime('-1 week')) . "'";
            $order = 'ASC';
        }

        $tgl_piutang = $this->db->query("SELECT tgl_piutang
        FROM trx_acc_receivable
        $where
        GROUP BY tgl_piutang
        ORDER BY tgl_piutang $order")->result();

        $data = [];
        foreach ($tgl_piutang as $tgl) {
            $tgl = $tgl->tgl_piutang;

            $total_per_tanggal = [];
            $piutang_divisi  = $this->db->query("SELECT piutang_divisi from trx_acc_receivable WHERE tgl_piutang = '$tgl'")->result();
            foreach ($piutang_divisi as $piutang) {
                array_push($total_per_tanggal, $piutang->piutang_divisi);
            };

            array_push($data, [
                'tanggal' => $tgl,
                'total' => array_sum($total_per_tanggal)
            ]);
        }

        return $data;
    }

    function getDetailAccReceivable($tanggal)
    {
        return ($this->db->query("SELECT
                                    mst_kategori_produksi.nama_kategori_produksi, 
                                    mst_divisi.nama_divisi, 
                                    trx_acc_receivable.piutang_divisi 
                                    FROM trx_acc_receivable
                                    INNER JOIN mst_divisi 
                                        ON mst_divisi.id_divisi = trx_acc_receivable.id_divisi
                                    INNER JOIN mst_kategori_produksi 
                                        ON mst_kategori_produksi.id_kategori_produksi = mst_divisi.id_kategori_produksi
                                    WHERE tgl_piutang = '$tanggal'
                                    ORDER BY trx_acc_receivable.id_divisi ASC"))->result();
    }
}

?>