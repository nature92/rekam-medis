<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //Auth User
        auth($this->session);
    }

    public function editDetail($table, $user, $menu = 'master')
    {

        $postArrays = $this->input->post();
        $columns = array_keys($postArrays);
        $values = array_values($postArrays);

        $id = $this->input->post('id_' . $table);

        validate($postArrays, $this->form_validation);

        if ($this->form_validation->run() === False) {
            $this->session->set_flashdata('alert-error', validation_errors('<b>Gagal! : </b> '));
            redirect('' . $menu . '/' . $table);
        } else {
            $this->session->set_flashdata('alert', 'Berhasil mengubah <b>' . ucwords(str_replace('_', ' ', $table)) . '</b>');
            $this->action->editColumn($table, $columns, $values, $user);

            $config['upload_path']          = "./assets/upload/mst_$table/img/";
            $config['allowed_types']        = 'jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 5120;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file-gambar')) {
                $ext = $this->upload->data('file_ext');
                $files = glob("./assets/upload/mst_$table/img/$id.*");
                foreach ($files as $f) {
                    if (!strpos($f, $ext)) unlink($f);
                }
            } else {
                print_r($this->upload->display_errors());
            }

            redirect('' . $menu . '/' . $table);
        }
    }

    public function editHakAkses($user)
    {

        $postArrays = $this->input->post();
        $id_role = $postArrays['id_role'];

        $changed = explode(',', $postArrays['aksesChanged']);

        foreach ($changed as $input) {
            $input = explode('-', $input);
            $this->action->editHakAkses($input[0], $input[1], $id_role, $user);
        }

        $this->session->set_flashdata('alert', 'Berhasil mengubah <b>Hak Akses</b>');
        redirect('master/role');
    }

    public function addDetail($table, $user, $menu = 'master')
    {

        $postArrays = $this->input->post();
        unset($postArrays['file-gambar']);
        $columns = array_keys($postArrays);
        $values = array_values($postArrays);

        validate($postArrays, $this->form_validation);

        if ($this->form_validation->run() === False) {
            $this->session->set_flashdata('alert-error', validation_errors('<li><b>Gagal! : </b>', '</li>'));
            redirect('' . $menu . '/' . $table);
        } else {

            if (isset($postArrays['npp']) && isset($postArrays['nama_lengkap']) && !isset($postArrays['password'])) {
                array_push($columns, 'password');
                array_push($values, '');
            }

            $query = $this->action->addColumn($table, $columns, $values, $user);
            if (!isset($query->id)) {
                $this->session->set_flashdata('alert-error', "<b>Gagal! : </b>" . toTitle($query) . " yang dimasukkan sudah ada");
                redirect('' . $menu . '/' . $table);
            } else {
                $id = $query->id;
            }
            $id = $query->id;


            $config['upload_path']          = "./assets/upload/mst_$table/img/";
            $config['allowed_types']        = 'jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 5120;
            $this->load->library('upload', $config);
            $this->upload->do_upload('file-gambar');

            $this->session->set_flashdata('alert', 'Berhasil menambah <b>' . ucwords(str_replace('_', ' ', $table)) . '</b>');
            redirect('' . $menu . '/' . $table);
        }
    }

    public function hapusDetail($table, $user, $menu = 'master')
    {

        $postArrays = $this->input->post();
        $columns = array_keys($postArrays);
        $values = array_values($postArrays);

        $this->session->set_flashdata('alert', 'Berhasil menghapus <b>' . ucwords(str_replace('_', ' ', $table)) . '</b>');

        $id = $postArrays['id_' . $table];
        $files = glob("./assets/upload/mst_$table/img/$id.*");

        foreach ($files as $f) {
            unlink($f);
        }

        $this->action->deleteColumn($table, $columns, $values, $user);
        redirect('' . $menu . '/' . $table);
    }

    public function flagDetail($table, $user, $menu = 'master')
    {

        $postArrays = $this->input->post();
        $columns = array_keys($postArrays);
        $values = array_values($postArrays);

        $this->session->set_flashdata('alert', 'Berhasil mengubah status <b>' . ucwords(str_replace('_', ' ', $table)) . '</b>');

        $this->action->flagColumn($table, $columns, $values, $user);
        redirect('' . $menu . '/' . $table);
    }

    public function changePassword($user, $page, $menu = '')
    {
        $post = $this->input->post();
        $redirect = $page . ($menu === 'dashboard' ? '' : '/' . $menu);

        validate($post, $this->form_validation);


        if ($this->form_validation->run() === False) {
            $this->session->set_flashdata('alert-error', validation_errors('<b>Gagal! : </b> '));
            redirect($redirect);
        } else {
            $checkPass = $this->action->getPass($user);
            $old_pass = $post['old_pass'];

            if (password_verify($old_pass, $checkPass->password)) {
                $newPass = password_hash($post['new_pass'], PASSWORD_BCRYPT);

                // $this->session->set_flashdata('alert', 'Berhasil mengubah <b>Password</b>');
                $this->action->editColumn('user', ['id_user', 'password'], [$user, $newPass], $user);
                redirect('logout');
            } else {
                $this->session->set_flashdata('alert-error', '<b>Gagal! : </b>Password lama tidak cocok.');
                redirect($redirect);
            }
        }
    }
}
