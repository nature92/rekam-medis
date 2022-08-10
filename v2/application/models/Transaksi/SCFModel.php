<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SCFModel extends CI_Model
{
    function __construct()
    {
        $this->load->database();

        //Access Model Lain
        $CI = &get_instance();
        $this->CI = $CI;
        $this->CI->load->model('master');
    }

    function getSCF($search = array())
    {
        //Get Divisi
        $divisi = $this->CI->master->getDivisi();

        //Get SCF
        if (!empty($search)) {
            $category = $search['search-category'];
            $dateRange = explode(" - ", $search['search-scf-datepicker']);

            $dateRange[0] = date_format(date_create_from_format("d/m/Y", $dateRange[0]), "Y-m-d ");
            $dateRange[1] = date_format(date_create_from_format("d/m/Y", $dateRange[1]), "Y-m-d ");

            $data_scf = $this->db->query("SELECT * FROM 
                                            (SELECT *, (tanggal_mulai_scf + INTERVAL '1 day' * tenor) as tanggal_akhir_scf FROM trx_scf) trx_scf
                                             WHERE $category BETWEEN ? AND ?
                                             ORDER BY id_scf DESC", [
                $dateRange[0],
                $dateRange[1]
            ])->result();
        } else {
            $data_scf = $this->db->query("SELECT * FROM trx_scf ORDER BY id_scf DESC")->result();
        }

        //Join Payload SCF & Divisi
        foreach ($data_scf as $scf) {
            $index_divisi_scf = array_search($scf->id_divisi, array_column($divisi, 'kode_unit'));
            $scf->nama_divisi = $divisi[$index_divisi_scf]->nama_unit;
            $scf->singkatan_divisi = $divisi[$index_divisi_scf]->singkatan_unit;
        }

        return $data_scf;
    }

    function getDetailSCF($id)
    {
        //Get Divisi
        $divisi = $this->CI->master->getDivisi();

        //Get SCF
        $data_scf = $this->db->query("SELECT * FROM trx_scf WHERE id_scf = ?", [$id])->result();

        //Join Payload SCF & Divisi
        foreach ($data_scf as $scf) {
            $index_divisi_scf = array_search($scf->id_divisi, array_column($divisi, 'kode_unit'));
            $scf->nama_divisi = $divisi[$index_divisi_scf]->nama_unit;
            $scf->singkatan_divisi = $divisi[$index_divisi_scf]->singkatan_unit;
        }

        return $data_scf;
    }

    function addSCF($data)
    {
        //Parse Date
        $data["bulan_penerimaan_bank"] = date("Y-m-d H:i:s", strtotime($data["bulan_penerimaan_bank"]));
        $data["bulan_submit_bank"] = date("Y-m-d H:i:s", strtotime($data["bulan_submit_bank"]));
        $data["tanggal_mulai_scf"] = date("Y-m-d H:i:s", strtotime($data["tanggal_mulai_scf"]));

        //Parse Number
        $data["nominal_sesuai_bukti_kas"] = parseNumberLocaleId($data["nominal_sesuai_bukti_kas"]);
        $data["biaya_scf_vendor"] = parseNumberLocaleId($data["biaya_scf_vendor"]);
        $data["biaya_scf_pindad"] = parseNumberLocaleId($data["biaya_scf_pindad"]);

        //Cek Ketersediaan
        $sudahTersedia = $this->db->query("SELECT * FROM trx_scf WHERE nomor_bukti_kas = ?", [$data["nomor_bukti_kas"]])->num_rows();
        if (!$sudahTersedia) {
            $query = $this->db->query(
                "INSERT INTO trx_scf
                                            (
                                                nomor_bukti_kas,
                                                nomor_po,
                                                id_divisi,
                                                nama_barang,
                                                nama_supplier,
                                                bulan_penerimaan_bank,
                                                bulan_submit_bank,
                                                nominal_bukti_kas,
                                                biaya_scf_vendor,
                                                biaya_scf_pindad,
                                                tanggal_mulai_scf,
                                                tenor,
                                                keterangan,
                                                status_pembayaran,
                                                bank
                                            )
                                        VALUES
                                            (
                                                ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
                                            )
                                        RETURNING id_scf
                                        ",
                [
                    $data["nomor_bukti_kas"],
                    $data["nomor_po"],
                    (int)$data["divisi"],
                    $data["nama_barang"],
                    $data["nama_supplier"],
                    $data["bulan_penerimaan_bank"],
                    $data["bulan_submit_bank"],
                    $data["nominal_sesuai_bukti_kas"],
                    $data["biaya_scf_vendor"],
                    $data["biaya_scf_pindad"],
                    $data["tanggal_mulai_scf"],
                    $data["tenor"],
                    $data["keterangan"],
                    $data["status_pembayaran"],
                    $data["bank"],
                ]
            )->result();

            if ($query) {
                return true;
            }
        }

        return false;
    }


    function editSCF($data)
    {
        //Parse Date
        $data["bulan_penerimaan_bank"] = date("Y-m-d H:i:s", strtotime($data["bulan_penerimaan_bank"]));
        $data["bulan_submit_bank"] = date("Y-m-d H:i:s", strtotime($data["bulan_submit_bank"]));
        $data["tanggal_mulai_scf"] = date("Y-m-d H:i:s", strtotime($data["tanggal_mulai_scf"]));

        //Parse Number
        $data["nominal_sesuai_bukti_kas"] = parseNumberLocaleId($data["nominal_sesuai_bukti_kas"]);
        $data["biaya_scf_vendor"] = parseNumberLocaleId($data["biaya_scf_vendor"]);
        $data["biaya_scf_pindad"] = parseNumberLocaleId($data["biaya_scf_pindad"]);

        //Cek Ketersediaan
        $dataTersedia = $this->db->query("SELECT * FROM trx_scf WHERE id_scf = ?", [$data["id_scf"]])->num_rows();
        if (!$dataTersedia) {
            return "404";
        } else {
            $query = $this->db->query(
                "UPDATE trx_scf SET
                                            nomor_bukti_kas = ?,
                                            nomor_po = ?,
                                            id_divisi = ?,
                                            nama_barang = ?,
                                            nama_supplier = ?,
                                            bulan_penerimaan_bank = ?,
                                            bulan_submit_bank = ?,
                                            nominal_bukti_kas = ?,
                                            biaya_scf_vendor = ?,
                                            biaya_scf_pindad = ?,
                                            tanggal_mulai_scf = ?,
                                            tenor = ?,
                                            keterangan = ?,
                                            status_pembayaran = ?
                                        WHERE
                                            id_scf = ?
                                        RETURNING id_scf
                                        ",
                [
                    $data["nomor_bukti_kas"],
                    $data["nomor_po"],
                    (int)$data["divisi"],
                    $data["nama_barang"],
                    $data["nama_supplier"],
                    $data["bulan_penerimaan_bank"],
                    $data["bulan_submit_bank"],
                    $data["nominal_sesuai_bukti_kas"],
                    $data["biaya_scf_vendor"],
                    $data["biaya_scf_pindad"],
                    $data["tanggal_mulai_scf"],
                    $data["tenor"],
                    $data["keterangan"],
                    $data["status_pembayaran"],
                    $data["id_scf"]
                ]
            )->result();

            if ($query) {
                return true;
            }
        }

        return false;
    }

    function hapusSCF($data)
    {
        //Cek Ketersediaan
        $dataTersedia = $this->db->query("SELECT * FROM trx_scf WHERE id_scf = ?", [$data["id_scf"]])->num_rows();
        if (!$dataTersedia) {
            return "404";
        } else {
            $query = $this->db->query("DELETE FROM trx_scf WHERE id_scf = ?", [$data['id_scf']]);
            if ($query) return true;
        }
        return false;
    }

    function getTotalSCF()
    {
        //Get Total SCF
        $data_total_scf = $this->db->query("SELECT
                                            SUM(nominal_bukti_kas) as nominal_bukti_kas,
                                            SUM(biaya_scf_vendor) as biaya_scf_vendor,
                                            SUM(biaya_scf_pindad) as biaya_scf_pindad,
                                            SUM(tenor) as tenor
                                        FROM trx_scf
                                    ")->row();

        $data_untuk_biaya_scf = $this->db->query("SELECT
                                            tenor, nominal_bukti_kas
                                        FROM trx_scf
                                    ")->result();

        $total_biaya_scf = 0;
        foreach ($data_untuk_biaya_scf as $data) {
            $total_biaya_scf += ($data->tenor / 360) * ((85 / 1000) * $data->nominal_bukti_kas);
        }

        $total_scf = [
            [
                "nama" => "Nominal Bukti Kas",
                "nilai" => $data_total_scf->nominal_bukti_kas,
                "format" => "Currency",
            ],
            [
                "nama" => "Biaya SCF Vendor",
                "nilai" => $data_total_scf->biaya_scf_vendor,
                "format" => "Currency",
            ],
            [
                "nama" => "Biaya SCF Pindad",
                "nilai" => $data_total_scf->biaya_scf_pindad,
                "format" => "Currency",
            ],
            [
                "nama" => "Total Biaya SCF",
                "nilai" => $total_biaya_scf,
                "format" => "Currency",
            ],
            [
                "nama" => "Total Nominal Bukti Kas + Biaya SCF Ditanggung Pindad",
                "nilai" => $total_biaya_scf + $data_total_scf->nominal_bukti_kas,
                "format" => "Currency",
            ],
        ];

        return $total_scf;
    }

    function getPlafon()
    {
        //Get Plafon
        $plafonSCF = 200000000000; //Hard-Code Plafon

        $nominalSCF = $this->db->query("SELECT
                                                SUM(CASE WHEN status_pembayaran = true THEN nominal_bukti_kas ELSE 0 END) as scf_sudah_dibayar,
                                                SUM(CASE WHEN status_pembayaran = false THEN nominal_bukti_kas ELSE 0 END) as scf_belum_dibayar
                                            FROM trx_scf
                                        ")->row();

        $plafon = (object)[
            "plafonSCF" => $plafonSCF,
            "pemakaianPlafon" => $nominalSCF->scf_belum_dibayar,
            "sisaPlafon" => $plafonSCF - $nominalSCF->scf_belum_dibayar
        ];

        return $plafon;
    }

    function getChartSCF($year)
    {
        //Nominal Bukti Kas Berdasarkan Tanggal Jatuh Tempo
        $query['nilaiPokok'] = $this->db->query("SELECT
                                            SUM(nominal_bukti_kas) as nominal_bukti_kas,
                                            EXTRACT(MONTH FROM DATE_TRUNC('month', (tanggal_mulai_scf + INTERVAL '1 day' * tenor))) as bulan
                                        FROM trx_scf
                                        WHERE DATE_PART('year', (tanggal_mulai_scf + INTERVAL '1 day' * tenor)) = ?
                                        GROUP BY DATE_TRUNC('month', (tanggal_mulai_scf + INTERVAL '1 day' * tenor))
                                        ", [$year])->result();

        //Biaya SCF Ditanggung Pindad Berdasarkan Tanggal Mulai
        $query['biayaSCFPindad'] = $this->db->query("SELECT
                                            SUM(biaya_scf_pindad) as biaya_scf_pindad,
                                            EXTRACT(MONTH FROM DATE_TRUNC('month', tanggal_mulai_scf)) as bulan
                                        FROM trx_scf
                                        WHERE DATE_PART('year', tanggal_mulai_scf) = ?
                                        GROUP BY DATE_TRUNC('month', tanggal_mulai_scf)
                                        ", [$year])->result();

        //Format Untuk Chart
        $listBulan = listBulan();
        $indexBulan = 1;
        $data = [];
        foreach ($listBulan as $bulan) {
            $indexNilaiPokok = array_search($indexBulan, array_column($query['nilaiPokok'], 'bulan'));
            $indexBiayaSCFPindad = array_search($indexBulan, array_column($query['biayaSCFPindad'], 'bulan'));

            array_push($data, [
                'labels' => $bulan,
                'nilaiPokok' => $indexNilaiPokok !== FALSE ? (float)$query['nilaiPokok'][$indexNilaiPokok]->nominal_bukti_kas : 0,
                'biayaSCFPindad' => $indexBiayaSCFPindad !== FALSE ? (float)$query['biayaSCFPindad'][$indexBiayaSCFPindad]->biaya_scf_pindad : 0,
            ]);

            $indexBulan++;
        }

        return json_encode($data);
    }

    function getDetailChartSCF($year, $indexMonth)
    {
        //Detail Chart SCF -----------------------------------

        //Nilai Pokok
        $nilaiPokok = $this->db->query("SELECT
                            nomor_bukti_kas,
                            nomor_po,
                            nama_barang,
                            nama_supplier,
                            (tanggal_mulai_scf + INTERVAL '1 day' * tenor) as tanggal_jatuh_tempo_scf,
                            nominal_bukti_kas as nilai_pokok
                        FROM trx_scf
                        WHERE DATE_PART('year', (tanggal_mulai_scf + INTERVAL '1 day' * tenor)) = $year AND
                            EXTRACT(MONTH FROM DATE_TRUNC('month', (tanggal_mulai_scf + INTERVAL '1 day' * tenor))) = $indexMonth
                        ORDER BY (tanggal_mulai_scf + INTERVAL '1 day' * tenor)
                        ")->result();


        //Biaya SCF Pindad
        $biayaSCFPindad = $this->db->query("SELECT
                            nomor_bukti_kas,
                            nomor_po,
                            nama_barang,
                            nama_supplier,
                            tanggal_mulai_scf,
                            biaya_scf_pindad
                        FROM trx_scf
                        WHERE DATE_PART('year', tanggal_mulai_scf) = $year AND
                            EXTRACT(MONTH FROM DATE_TRUNC('month', tanggal_mulai_scf)) = $indexMonth
                        ORDER BY tanggal_mulai_scf
                        ")->result();


        //Return Data
        return (object)array(
            "nilaiPokok" => $nilaiPokok,
            "biayaSCFPindad" => $biayaSCFPindad,
        );
    }
}
