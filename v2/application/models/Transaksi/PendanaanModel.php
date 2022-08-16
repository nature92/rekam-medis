<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PendanaanModel extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    function getPendanaan()
    {
        return $this->db->query("SELECT
                                    dana.uid,
                                    dana.nomor_perjanjian_kontrak,
                                    dana.tanggal_perjanjian_kontrak,
                                    dana.tanggal_jatuh_tempo,
                                    mb.nama_bank AS id_bank,
                                    dana.file 
                                FROM
                                    trx_pendanaan dana
                                    LEFT JOIN mst_bank mb ON mb.id_bank = dana.id_bank 
                                GROUP BY
                                    dana.uid,
                                    dana.nomor_perjanjian_kontrak,
                                    dana.tanggal_perjanjian_kontrak,
                                    dana.tanggal_jatuh_tempo,
                                    dana.id_bank,
                                    dana.file,
                                    mb.nama_bank
                                    ")->result_array();
    
    }
    function getPendanaanDetail($uid)
    {
        return $this->db->query("SELECT
                                    *
                                FROM
                                    trx_pendanaan dana 
                                WHERE
                                    dana.uid = '$uid' 
                                    ")->result();
    
    }
    function getPendanaanHeader($uid)
    {
        return $this->db->query("SELECT
                                    dana.uid,
                                    dana.nomor_perjanjian_kontrak,
                                    dana.tanggal_perjanjian_kontrak,
                                    dana.id_bank,
                                    dana.tanggal_jatuh_tempo ,
                                    dana.file
                                FROM
                                    trx_pendanaan dana 
                                WHERE
                                    dana.uid = '$uid'
                                GROUP BY
                                    dana.uid,
                                    dana.nomor_perjanjian_kontrak,
                                    dana.tanggal_perjanjian_kontrak,
                                    dana.id_bank,
                                    dana.tanggal_jatuh_tempo,
                                    dana.file
                                    ")->result();
    
    }
    function addPendanaan($data, $detail) 
    {		
        $data = array(
            'nomor_perjanjian_kontrak' => $data['nomor_perjanjian_kontrak'],
            'uid' => $data['uid'],
            'id_project' => $detail['id_project'],
            'tanggal_perjanjian_kontrak' => $data['tanggal_perjanjian_kontrak'],
            'id_bank' => $data['id_bank'],
            'tanggal_jatuh_tempo' => $data['tanggal_jatuh_tempo'],
            'file' => $data['file'],
            'id_jenis_pendanaan' => $detail['plafon'],
            'nama_project' => $detail['nama_project'],
            'id_currency' => $detail['currency'],
            'nilai' => $detail['nilai'],
            // 'evidence' => $detail['evidence'],
            'created_date' => date("Y/m/d h:i:s"),
            'created_by' => $data['user']        
        );
        $this->db->insert('trx_pendanaan', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
    function editPendanaan($data, $detail)
    {
        return $this->db->query("
                                INSERT INTO trx_pendanaan (
                                    uid,
                                    nomor_perjanjian_kontrak,
                                    id_project,
                                    tanggal_perjanjian_kontrak,
                                    id_bank,
                                    evidence,
                                    tanggal_jatuh_tempo,
                                    file,
                                    id_jenis_pendanaan,
                                    nama_project,
                                    id_currency,
                                    nilai,
                                    created_date,
                                    created_by,
                                    updated_date,
                                    updated_by 
                                )
                                VALUES
                                    (
                                        '".$detail[ 'uid' ]."',
                                        '".$data[ 'nomor_perjanjian_kontrak' ]."',
                                        '".$detail[ 'id_project' ]."',
                                        '".$data[ 'tanggal_perjanjian_kontrak' ]."',
                                        '".$data[ 'id_bank' ]."',
                                        '" . $detail['evidence'] . "',
                                        '".$data[ 'tanggal_jatuh_tempo' ]."',
                                        '".$data[ 'file' ]."',
                                        '" . $detail['plafon'] . "',
                                        '" . $detail['nama_project'] . "',
                                        '" . $detail['currency'] . "',
                                        '" . $detail['nilai'] . "',
                                        '".$data['updated_date']."',
                                        '".$data[ 'user' ]."',
                                        '".$data['updated_date']."',
                                        '".$data[ 'user' ] ."'
                                        )");

    }
    function deletePendanaan($data)
    {
        return $this->db->query("DELETE 
                                    FROM
                                        trx_pendanaan 
                                    WHERE
                                        uid = '".$data."'                                     
                                        ");
    }
    function setEvidence($evidence, $id_project)
    {   
        return $this->db->query("UPDATE trx_pendanaan
                                    SET evidence = '" . $evidence . "'                                     
                                    WHERE id_project = '" . $id_project . "'
                                    ");        
    }
    function getCurrency()
    {
        return $this->db->query("SELECT
                                    *
                                FROM
                                    mst_currency 
                                    ")->result();
    }
    function getBank()
    {
        return $this->db->query("SELECT
                                    *
                                FROM
                                    mst_bank 
                                    ")->result();
    }
    function getJumlahPendanaan($uid)
    {        
        return $this->db->query("SELECT COUNT
                                        ( * ) AS jumlah_baris 
                                    FROM
                                        trx_pendanaan 
                                    WHERE
                                        uid = '$uid'
                                    ")->result();
    }
}

?>