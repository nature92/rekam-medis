<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SaldoModel extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    
    function getRekeningForColumn()
    {
        return $this->db->query("SELECT
                                    mst_rekening.id_rekening,
                                    mst_rekening.no_rekening,
                                    mst_bank.id_bank,
                                    mst_bank.nama_bank,
                                    mst_bank.warna_label,
                                    mst_currency.id_currency,
                                    mst_currency.kode_currency
                                    FROM mst_rekening
                                    INNER JOIN mst_bank
                                        ON mst_rekening.id_bank = mst_bank.id_bank
                                    INNER JOIN mst_currency
                                        ON mst_rekening.id_currency = mst_currency.id_currency
                                    WHERE mst_rekening.status = 't'
                                    AND mst_currency.status = 't'
                                    ORDER BY mst_bank.id_bank ASC,
                                    mst_currency.id_currency ASC")->result();
    }

    function getSaldo($from, $until)
    {
        return $this->db->query("SELECT
                                    trx_saldo.tgl_saldo,
                                    string_agg(trx_saldo.id_rekening::text, ',' ORDER BY mst_bank.id_bank ASC, mst_currency.id_currency ASC) AS id_rekening,
                                    string_agg(trx_saldo.jumlah_saldo::text, ',' ORDER BY mst_bank.id_bank ASC, mst_currency.id_currency ASC) AS jumlah_saldo

                                FROM trx_saldo 
                                INNER JOIN mst_rekening ON trx_saldo.id_rekening = mst_rekening.id_rekening
                                INNER JOIN mst_bank ON mst_rekening.id_bank = mst_bank.id_bank
                                INNER JOIN mst_currency ON mst_rekening.id_currency = mst_currency.id_currency

                                WHERE trx_saldo.tgl_saldo BETWEEN '$from' AND '$until'
                                AND  mst_rekening.status = 't'
                                AND  mst_currency.status = 't'
                                GROUP BY trx_saldo.tgl_saldo 
                                ORDER BY trx_saldo.tgl_saldo DESC
                                    ")->result();
    }

    function addSaldo($data, $tgl)
    {
        return $this->db->query("INSERT INTO trx_saldo
                                    (id_rekening, jumlah_saldo, tgl_saldo)
                                VALUES ('" . $data['id_rekening'] . "', '" . $data['jumlah_saldo'] . "', '$tgl')");
    }

    function editSaldo($data, $tgl)
    {
        return $this->db->query("UPDATE trx_saldo
                                    SET jumlah_saldo = '" . $data['jumlah_saldo'] . "'
                                    WHERE tgl_saldo = '$tgl'
                                    AND id_rekening = '" . $data['id_rekening'] . "'
                                    ");
    }

    function addSaldoLog($id_user, $mod_type, $tgl)
    {
        $ip = $this->input->ip_address();

        return $this->db->query("INSERT INTO mst_log
                                    (id_user, ip_address, mod_type, old_values, new_values, relation)
                                 VALUES (
                                     '$id_user',
                                     '$ip',
                                     '$mod_type',
                                     '[]',
                                     '" . json_encode($tgl) . "',
                                     'saldo'
                                     )");
    }

    function getTglSaldoForChart($currency)
    {
        $where = ' ';
        if ($currency !== 'any') {
            $where = "AND mst_rekening.id_currency = '$currency'";
        }
        return $this->db->query("SELECT tgl_saldo 
                                    FROM trx_saldo
                                    INNER JOIN mst_rekening
                                        ON trx_saldo.id_rekening = mst_rekening.id_rekening
                                    WHERE tgl_saldo > '" . date('Y-m-d H:i:s', strtotime('-1 week')) . "'
                                        $where
                                    GROUP BY tgl_saldo
                                    ORDER BY tgl_saldo ASC")->result();
    }

    function getSaldoForChart($currency)
    {
        $where = ' ';
        if ($currency !== 'any') {
            $where = "AND mst_rekening.id_currency = '$currency'";
        }
        return $this->db->query("SELECT
                                    mst_bank.nama_bank,
                                    mst_bank.warna_label,
                                    mst_currency.kode_currency,
                                    trx_saldo.tgl_saldo,
                                    sum(trx_saldo.jumlah_saldo) as jumlah_saldo
                                    from trx_saldo
                                    INNER JOIN mst_rekening ON trx_saldo.id_rekening = mst_rekening.id_rekening
                                    INNER JOIN mst_bank ON mst_bank.id_bank = mst_rekening.id_bank
                                    INNER JOIN mst_currency ON mst_currency.id_currency = mst_rekening.id_currency

                                    WHERE mst_rekening.status = 't'
                                    AND mst_currency.status = 't'
                                    $where
                                    GROUP BY mst_bank.id_bank, trx_saldo.tgl_saldo, mst_currency.id_currency
                                    
                                    ORDER BY mst_bank.id_bank ASC, trx_saldo.tgl_saldo ASC")->result();
    }

    function getTotalSaldo()
    {
        return $this->db->query("SELECT trx_saldo.jumlah_saldo, mst_kurs.rasio_kurs, tabel_a.tgl_saldo
                                    FROM
                                        (SELECT max(trx_saldo.tgl_saldo) as tgl_saldo, trx_saldo.id_rekening 
                                        FROM trx_saldo
                                        GROUP BY trx_saldo.id_rekening) as tabel_a
                                    INNER JOIN trx_saldo ON trx_saldo.id_rekening = tabel_a.id_rekening AND trx_saldo.tgl_saldo = tabel_a.tgl_saldo
                                    INNER JOIN mst_rekening ON mst_rekening.id_rekening = trx_saldo.id_rekening
                                    INNER JOIN mst_currency ON mst_currency.id_currency = mst_rekening.id_currency
                                    LEFT JOIN mst_kurs ON mst_kurs.kode_currency = mst_currency.kode_currency
                                    WHERE mst_rekening.status = 't'
                                    AND mst_currency.status = 't'
                                    ")->result();
    }

    function getRekapSaldo()
    {
        return $this->db->query("SELECT max_tgl_saldo.tgl_saldo, mst_currency.kode_currency, sum(trx_saldo.jumlah_saldo) as jumlah_saldo FROM
                                    (SELECT max(tgl_saldo) as tgl_saldo FROM trx_saldo) as max_tgl_saldo
                                    INNER JOIN trx_saldo ON trx_saldo.tgl_saldo = max_tgl_saldo.tgl_saldo
                                    INNER JOIN mst_rekening ON mst_rekening.id_rekening = trx_saldo.id_rekening
                                    INNER JOIN mst_currency ON mst_currency.id_currency = mst_rekening.id_currency
                                    WHERE mst_rekening.status = 't'
                                    AND mst_currency.status = 't'
                                    GROUP BY max_tgl_saldo.tgl_saldo, mst_currency.id_currency, mst_currency.kode_currency
                                    ORDER BY mst_currency.id_currency")->result();
    }

    function getKurs()
    {
        return $this->db->query("SELECT
                                    rasio_kurs,
                                    kode_currency
                                    FROM mst_kurs
                                    ")->result();
    }

    function getAvailKurs()
    {
        return $this->db->query("SELECT
                                    mst_kurs.tgl_kurs,
                                    mst_kurs.rasio_kurs,
                                    mst_kurs.kode_currency
                                    FROM mst_kurs
                                    INNER JOIN mst_currency
                                        ON mst_kurs.kode_currency = mst_currency.kode_currency
                                    WHERE mst_currency.status = 't'
                                    ORDER BY mst_currency.id_currency ASC
                                    ")->result();
    }

}

?>