<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ActionModel extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    function getData($table)
    {
        return $this->db->query("SELECT * FROM mst_" . $table . " ORDER BY id_" . $table . " ASC")->result();
    }


    function getColumn($table)
    {
        return $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name = 'mst_" . $table . "'")->result();
    }

    function getDetail($table, $id)
    {
        return $this->db->query("SELECT * FROM mst_" . $table . " WHERE id_" . $table . " = " . $id)->result();
    }

    function getLog($relasi)
    {
        return $this->db->query("SELECT * FROM mst_log WHERE relation = '" . $relasi . "' ORDER BY mod_date DESC")->result();
    }

    function getForeign($table)
    {
        return $this->db->query("SELECT * FROM mst_" . $table . " ORDER BY id_" . $table . " ASC")->result();
    }

    function getSpecForeign($table, $id)
    {
        return $this->db->query("SELECT * FROM mst_" . $table . " WHERE id_" . $table . " = '" . $id . "'")->result();
    }

    function getHakAkses($role)
    {
        return $this->db->query("SELECT * FROM mst_hak_akses WHERE id_role = '" . $role . "' ORDER BY id_hak_akses ASC")->result();
    }
    function getSpecHakAkses($role, $menu)
    {
        return $this->db->query("SELECT * FROM mst_hak_akses WHERE id_role = '" . $role . "' AND id_menu = '$menu'")->row();
    }

    function addColumn($table, $columns, $values, $user)
    {
        $unique = $this->db->query("SELECT relname FROM pg_class WHERE relname LIKE '%_key%' AND relname NOT LIKE '%pkey%' AND relname LIKE '%mst_$table%'")->result();
        $unique = str_replace('_key', '', str_replace("mst_" . $table . "_", '', $unique[0]->relname));
        $unique_value = '';

        $arrayValues = [];
        $count = count($columns);
        for ($i = 0; $i < $count; $i++) {
            if ($columns[$i] === $unique) $unique_value = $values[$i];
            if ($columns[$i] === 'password' && $values[$i]) $values[$i] = password_hash($values[$i], PASSWORD_BCRYPT);
            if ($values[$i] !== '') {
                $arrayLog[$columns[$i]] = $values[$i];
                array_push($arrayValues, "'" . $values[$i] . "'");
            } else {
                unset($columns[$i]);
                unset($values[$i]);
            }
        }

        $exist = $this->db->query("SELECT $unique FROM mst_$table WHERE $unique = '$unique_value'")->row();
        if ($exist) return $unique;


        $tableColumn = $this->getColumn($table);
        $arrayColumn = [];

        foreach ($tableColumn as $column) {
            array_push($arrayColumn, $column->column_name);
        }

        if (in_array('created_by', $arrayColumn)) {
            array_push($columns, 'created_by');
            array_push($arrayValues, "'" . $user . "'");
        }
        // if (in_array('created_date', $arrayColumn)) {
        //     array_push($columns, 'created_date');
        //     array_push($arrayValues, "'" . date('Y-m-d H:i:s') . "'");
        // }
        if (in_array('last_modified_by', $arrayColumn)) {
            array_push($columns, 'last_modified_by');
            array_push($arrayValues, "'" . $user . "'");
        }
        // if (in_array('last_modified_date', $arrayColumn)) {
        //     array_push($columns, 'last_modified_date');
        //     array_push($arrayValues, "'" . date('Y-m-d H:i:s') . "'");
        // }
        // if (in_array('last_login', $arrayColumn)) {
        //     array_push($columns, 'last_login');
        //     array_push($arrayValues, "'" . date('Y-m-d H:i:s') . "'");
        // }


        $this->addLog($table, $arrayLog, $user, 'create');
        $id = $this->db->query("INSERT INTO mst_" . $table . "(" . implode(', ', $columns) . ") VALUES (" . implode(', ', $arrayValues) . ") RETURNING id_" . $table . " as id")->row();
        // $nama_id = 'id_' . $table;

        if ($table === 'role' || $table === 'menu') {
            $this->addHakAkses($table, $id->id, $user);
        }

        return $id;
    }

    function addHakAkses($tipe, $id, $user)
    {
        if ($tipe === 'role') {
            $data = $this->getData('menu');
            foreach ($data as $menu) {
                print_r($menu->id_menu);
                $this->db->query("INSERT INTO mst_hak_akses (id_role, id_menu, can_create, can_read, can_update, can_delete, created_by, last_modified_by, status) VALUES ('" . $id . "', '" . $menu->id_menu . "', 'f', 'f', 'f', 'f', '" . $user . "', '" . $user . "', 't')");
            }
        } else if ($tipe === 'menu') {
            $data = $this->getData('role');
            foreach ($data as $role) {
                $this->db->query("INSERT INTO mst_hak_akses (id_role, id_menu, can_create, can_read, can_update, can_delete, created_by, last_modified_by, status) VALUES ('" . $role->id_role . "', '" . $id . "', 'f', 'f', 'f', 'f', '" . $user . "', '" . $user . "', 't')");
            }
        }
    }

    function editColumn($table, $columns, $values, $user)
    {
        $arraySet = [];
        $arrayLog = [];
        $count = count($columns);
        for ($i = 1; $i < $count; $i++) {
            if ($values[$i] !== '') {
                // if (preg_match('/\d{4}-\d{2}-\d{2}T/', $values[$i])) $values[$i] = str_replace('T', ' ', $values[$i]);
                $newSet = $columns[$i] . " = '" . $values[$i] . "'";
                $arrayLog[$columns[$i - 1]] = $values[$i - 1];
                array_push($arraySet, $newSet);
            } else {
                $newSet = $columns[$i] . " = null";
                $arrayLog[$columns[$i - 1]] = $values[$i - 1];
                array_push($arraySet, $newSet);
                //     unset($columns[$i]);
                //     unset($values[$i]);
            }
        }
        $arrayLog[$columns[$i - 1]] = $values[$i - 1];

        $tableColumn = $this->getColumn($table);
        $arrayColumn = [];

        foreach ($tableColumn as $column) {
            array_push($arrayColumn, $column->column_name);
        }

        if (in_array('last_modified_by', $arrayColumn)) {
            $newSet = "last_modified_by = '" . $user . "'";
            array_push($arraySet, $newSet);
        }
        if (in_array('last_modified_date', $arrayColumn)) {
            $newSet = "last_modified_date = '" . date('Y-m-d H:i:s') . "'";
            array_push($arraySet, $newSet);
        }

        $this->addLog($table, $arrayLog, $user, 'update');
        return $this->db->query("UPDATE mst_" . $table . " SET " . implode(', ', $arraySet) . " WHERE " . $columns[0] . " = " . $values[0]);
    }

    function addLog($menu, $new, $user, $type)
    {
        $ip = $this->input->ip_address();
        $uagent = $this->input->user_agent();
        $old = [];
        $getOld = [];
        if ($type === 'delete') {
            $getOld = ((array)$this->db->query("SELECT * FROM mst_" . $menu . " WHERE id_" . $menu . " = '" . $new['id_' . $menu] . "'")->row());
            foreach (array_keys($getOld) as $col) {
                $old[$col] = $getOld[$col];
            }
        } else if ($type === 'flag') {
            foreach (array_keys($new) as $col) {
                if ($col === 'status') {
                    $old[$col] = $new[$col] === 't' ? 'f' : 't';
                } else {
                    $old[$col] = $new[$col];
                }
            }
        } else if ($type !== 'create') {
            $getOld = ((array)$this->db->query("SELECT * FROM mst_" . $menu . " WHERE id_" . $menu . " = '" . $new['id_' . $menu] . "'")->row());
            foreach (array_keys($new) as $col) {
                if (in_array($col, array_keys($getOld))) $old[$col] = $getOld[$col];
            }
        }

        return $this->db->query("INSERT INTO mst_log (id_user, ip_address, mod_type, old_values, new_values, relation) VALUES ('" . $user . "', '" . $ip . "', '" . $type . "', '" . json_encode($old) . "', '" . json_encode($new) . "', '" . $menu . "')");
    }


    function editHakAkses($menu, $action, $role, $user)
    {
        return $this->db->query("UPDATE mst_hak_akses SET can_$action = NOT can_$action, last_modified_by = '" . $user . "', last_modified_date = '" . date('Y-m-d H:i:s') . "' WHERE id_role = '" . $role . "' AND id_menu = '" . $menu . "'");
    }

    // function editHakAkses($c, $r, $u, $d, $role, $menu, $user)
    // {
    //     return $this->db->query("UPDATE mst_hak_akses SET can_create = '" . $c . "', can_read = '" . $r . "', can_update = '" . $u . "', can_delete = '" . $d . "', last_modified_by = '" . $user . "', last_modified_date = '" . date('Y-m-d H:i:s') . "' WHERE id_role = '" . $role . "' AND id_menu = '" . $menu . "'");
    // }

    function deleteColumn($table, $columns, $values, $user)
    {
        $arrayLog = [];
        for ($i  = 0; $i < count($columns); $i++) {
            $arrayLog[$columns[$i]] = $values[$i];
        }


        $this->addLog($table, $arrayLog, $user, 'delete');
        return $this->db->query("DELETE FROM mst_" . $table . " WHERE " . $columns[0] . " = '" . $values[0] . "'");
    }

    function flagColumn($table, $columns, $values, $user)
    {
        $arrayLog = [];
        for ($i  = 0; $i < count($columns); $i++) {
            $arrayLog[$columns[$i]] = $values[$i];
        }

        $return = $this->db->query("UPDATE mst_" . $table . " SET status = NOT status WHERE " . $columns[0] . " = '" . $values[0] . "' RETURNING status")->row();
        $arrayLog['status'] = $return->status;
        print_r($arrayLog);

        $this->addLog($table, $arrayLog, $user, 'flag');
    }

    function getPass($id_user)
    {
        return $this->db->query("SELECT password FROM mst_user WHERE id_user='$id_user'")->row();
    }

    //Generate Password
    function convertDateTime($date)
    {
        return $this->db->query("SELECT date '$date' - date '1900-01-01' + 2 as date_to_number")->row();
    }
}
