<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }

  function cekLogin($npp, $password)
  {
    $npp = html_escape($npp);
    $query = $this->db->query("SELECT
                                    mst_user.id_role,
                                    mst_user.npp,
                                    mst_role.nama_role,
                                    mst_user.id_user,
                                    mst_user.nama_user,
                                    mst_user.password,
                                    mst_user.status
                                  FROM mst_user
                                  INNER JOIN mst_role 
                                    ON mst_user.id_role = mst_role.id_role
                                  WHERE mst_user.npp = '" . $npp . "'");
    $data = $query->row();

    if ($query->num_rows() > 0 && $data->status === 't') {

      if (!$data->password) {
        $password = md5(html_escape($password));
        $fPass = $this->db->query("SELECT password FROM tabel_user WHERE npp='$npp' AND password='" . $password . "'")->row();
        $data->password = $fPass->password;
        if ($data->password) $cekPassword = true;
      } else {
        $cekPassword = password_verify($password, $data->password);
      }


      if ($cekPassword) {
        $this->db->query("UPDATE mst_user SET last_login = '" . date("Y-m-d H:i:s") . "' WHERE id_user = '" . $data->id_user . "'");

        $data->password = $data->password ? 'local' : 'foreign';
        $data->token = generateToken();
        $this->session->set_userdata('admin_session', $data);
      } else {
        return ['error' => 'error', 'string' => 'Password salah'];
      }
    } else if ($data->status === 'f') {
      return ['error' => 'error', 'string' => 'Akun Nonaktif'];
    } else {
      return ['error' => 'error', 'string' => 'NPP salah'];
    }
  }
}
