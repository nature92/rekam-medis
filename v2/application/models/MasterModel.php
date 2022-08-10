<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterModel extends CI_Model
{
    function __construct()
    {
        $this->load->database();
        $this->payroll_db = $this->load->database('default', TRUE);
        $this->verifikasi_db = $this->load->database('default', TRUE);
        
    }

    function getHakAkses($role, $menu = '')
    {
        return $this->db->query("SELECT 
                                        * 
                                        FROM
                                            mst_hak_akses
                                        INNER JOIN
                                            mst_menu
                                        ON
                                            mst_hak_akses.id_menu = mst_menu.id_menu
                                        WHERE mst_hak_akses.id_role = '" . $role . "'
                                        AND mst_menu.nama_menu = '" . $menu . "'
                                        
                                        ")->row();
    }

    function getMenuForNavbar($role)
    {
        return $this->db->query("SELECT 
                                        mst_kategori_menu.nama_kategori_menu,
                                        mst_kategori_menu.url_kategori_menu,
                                        mst_kategori_menu.icon_kategori_menu,
                                        mst_menu.nama_menu,
                                        mst_menu.judul_menu,
                                        mst_menu.url_menu,
                                        mst_menu.icon_menu
                                         FROM 
                                        mst_hak_akses 
                                            INNER JOIN
                                        mst_menu
                                            ON mst_hak_akses.id_menu = mst_menu.id_menu
                                            INNER JOIN
                                        mst_kategori_menu
                                            ON mst_kategori_menu.id_kategori_menu = mst_menu.id_kategori_menu
                                        WHERE mst_hak_akses.id_role = '" . $role . "'
                                            AND mst_hak_akses.can_read = 't'
                                            AND mst_menu.status = 't'
                                            AND mst_kategori_menu.status = 't'
                                        ORDER BY
                                            mst_kategori_menu.id_kategori_menu,
                                            mst_menu.id_menu
                                            
                                            ")->result();
    }

    function getAllData($table, $foreign = [])
    {
        $id = str_replace('mst', 'id', $table);
        $fk_str = "";
        $select = "$table.*";
        if ($foreign) {
            foreach ($foreign as $fk) {
                $table_fk = str_replace('fk_', 'mst_', $fk->conname);
                $id_fk = str_replace('fk_', 'id_', $fk->conname);
                $name_fk = str_replace('fk_', 'nama_', $fk->conname);

                $select .= ", $table_fk.$name_fk";
                $fk_str .= " INNER JOIN $table_fk ON $table.$id_fk = " . $table_fk . "." . $id_fk . " ";
            }
        }
        return $this->db->query("SELECT $select FROM $table $fk_str ORDER BY $id ASC")->result();
    }

    function getAllDataActive($table, $foreign = [])
    {
        $id = str_replace('mst', 'id', $table);
        $fk_str = "";
        $select = "$table.*";
        if ($foreign) {
            foreach ($foreign as $fk) {
                $table_fk = str_replace('fk_', 'mst_', $fk->conname);
                $id_fk = str_replace('fk_', 'id_', $fk->conname);
                $name_fk = str_replace('fk_', 'nama_', $fk->conname);

                $select .= ", $table_fk.$name_fk";
                $fk_str .= " INNER JOIN $table_fk ON $table.$id_fk = " . $table_fk . "." . $id_fk . " ";
            }
        }
        return $this->db->query("SELECT $select FROM $table $fk_str WHERE $table.status = 't' ORDER BY $id ASC")->result();
    }

    function getForeign($table)
    {
        return $this->db->query("SELECT id_$table as id, nama_$table as name, status FROM mst_$table ORDER BY id_$table ASC")->result();
    }

    // function getForeignById($table, $id)
    // {
    //     return $this->db->query("SELECT id_$table as id, nama_$table as name FROM mst_$table WHERE id_$table = '$id' ORDER BY nama_$table ASC")->result();
    // }

    function getEditHakAkses($role)
    {
        return $this->db->query("SELECT * FROM mst_hak_akses INNER JOIN mst_menu ON mst_hak_akses.id_menu = mst_menu.id_menu WHERE mst_hak_akses.id_role = '" . $role . "' ORDER BY mst_hak_akses.id_hak_akses ASC")->result();
    }

    function getLog($relasi)
    {
        return $this->db->query("SELECT * FROM mst_log INNER JOIN mst_user ON mst_log.id_user = mst_user.id_user WHERE relation = '" . $relasi . "' ORDER BY mod_date DESC")->result();
    }

    function getDetail($table, $id)
    {
        return $this->db->query("SELECT * FROM mst_$table WHERE id_$table = '$id'")->row();
    }

    function getColumnTable($table, $foreign)
    {
        $column = $this->db->query("SELECT t.column_name AS name,
                                        t.data_type AS type,
										enum_table.enum_value
                                        FROM information_schema.columns t
										LEFT JOIN (
											SELECT t.typname AS enum_name,  
												string_agg(e.enumlabel::text, ',') AS enum_value
											FROM pg_type t 
												 JOIN pg_enum e ON t.oid = e.enumtypid  
												 JOIN pg_catalog.pg_namespace n ON n.oid = t.typnamespace
											 GROUP BY enum_name
										) enum_table ON enum_table.enum_name = t.column_name
                                        WHERE table_schema = 'public'
                                        AND table_name   = 'mst_$table'
										ORDER BY t.ordinal_position ASC
           ;")->result();

        for ($i = 0; $i < count($column); $i++) {
            if ($column[$i]->name === 'status') unset($column[$i]);
        }


        foreach ($foreign as $fk) {
            $id = str_replace('fk', 'id', $fk->conname);
            $name = str_replace('fk', 'nama', $fk->conname);
            foreach ($column as $col) {
                if ($col->name === $id) {
                    $col->name = $name;
                }
            }
        }

        return $column;
    }

    function getConstraint($table)
    {
        return $this->db->query("SELECT conname FROM pg_catalog.pg_constraint con INNER JOIN pg_catalog.pg_class rel ON rel.oid = con.conrelid INNER JOIN pg_catalog.pg_namespace nsp ON nsp.oid = connamespace WHERE nsp.nspname = 'public' AND rel.relname = '$table' AND conname LIKE 'fk%'")->result();
    }

    function getPersonil($npp)
    {
        $query = $this->db->query("SELECT nama_lengkap FROM view_personil WHERE npp = '$npp'")->row();
        $query2 = $this->getPassPayroll($npp);

        if ($query2) {
            $query->password = 'ada';
        } else {
            $query->password = '';
        }

        // print_r($query);
        return ($query);
    }

    function getNamaPersonil($nama)
    {
        $personil = $this->db->query("SELECT DISTINCT npp, nama_lengkap, div FROM view_personil WHERE nama_lengkap LIKE UPPER('$nama%') ORDER BY nama_lengkap LIMIT 10")->result();
        return $personil;
    }

    function getPassPayroll($npp)
    {
        return $this->db->query("SELECT password FROM tabel_user WHERE npp='$npp'")->row();
    }

    function getSetting()
    {
        return $this->db->query("SELECT * FROM mst_pengaturan ")->result();
    }


function getDivisiProduksi()
    {
        return $this->payroll_db->query("SELECT 
                                                kode_unit,
                                                nama_unit,
                                                initial_unit AS singkatan_unit
                                            FROM master_unit
                                            WHERE id_type_unit = 3 AND
                                                kode_unit >= 800 AND
                                                status_aktif_unit = 1 AND 
                                                (
                                                    initial_unit = 'JT' OR
                                                    initial_unit = 'MU' OR
                                                    initial_unit = 'KK' OR
                                                    initial_unit = 'AB' OR
                                                    initial_unit = 'IJ' OR
                                                    initial_unit = 'IP' OR
                                                    initial_unit = 'MS' OR
                                                    initial_unit = 'TI' 
                                                )
                                                ")->result();
    }

    function getDivisi()
    {
        return $this->payroll_db->query("SELECT 
                                                kode_unit,
                                                nama_unit,
                                                initial_unit AS singkatan_unit
                                            FROM master_unit
                                            WHERE id_type_unit = 3 AND
                                                kode_unit >= 800 AND
                                                status_aktif_unit = 1 
                                                ")->result();
    }
	
	function getMataUang()
    {
        return $this->db->query("SELECT * FROM mst_currency ")->result();
    }
	
	function getVendor()
    {
        return $this->db->query("SELECT * FROM mst_vendor ")->result();
    }
	
	function getMasterBank()
    {
        return $this->db->query("SELECT * FROM mst_bank ")->result();
    }

    function getHRISBank()
    {
        return $this->payroll_db->query("SELECT
                                                kode_transaksi_bank as kode_bank,
                                                nama_bank
                                            FROM master_bank
                                            ORDER BY kode_transaksi_bank
                                                ")->result();
    }
    function getVerBank()
    {
        return $this->verifikasi_db->query("SELECT
                                                kd_dtkb as kode_bank,
                                                uraian_dtkb as nama_bank
                                            FROM acuandtkasbank
                                            ORDER BY kd_dtkb
                                                ")->result();
    }

    function getJenisCashin()
    {
        return $this->db->query("SELECT * FROM mst_jenis_transaksi_arus_kas Where tipe_jenis_transaksi_arus_kas = 'Cash In' ")->result();
    }	
	
	public function getNamaDivisi($divisi) {
		$sql = $this->payroll_db->query("SELECT nama_unit
                                            FROM master_unit
                                            WHERE kode_unit = '".$divisi."' ");
        $obj = $sql->row_object();
        $num = $sql->num_rows();
        if ($num > 0) {
            return $obj->nama_unit;
        } else {
            return '';
        }
    }
	
	public function getNamaVendor($id_vendor) {
        $sql = $this->db->query( " SELECT nama_vendor
                                            FROM mst_vendor
                                            WHERE id_vendor = '".$id_vendor."'  ");
        $obj = $sql->row_object();
        $num = $sql->num_rows();
        if ($num > 0) {
            return $obj->nama_vendor;
        } else {
            return '';
        }
    }
}