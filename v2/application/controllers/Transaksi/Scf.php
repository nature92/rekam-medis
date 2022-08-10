<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('file'));

        //Auth User
        auth($this->session);

        //Auth Maintenance
        $ip = $this->input->ip_address();
        $setting = $this->master->getSetting();
        authSetting($setting, $ip);
    }

    function globalData($menu)
    {
        // Data Global 
        $data['user'] = get_object_vars($this->session->userdata('admin_session'));
        $data['hak_akses'] = $this->master->getHakAkses($data['user']['id_role'], $menu);
        $data['menu'] = $menu;
        $data['title'] = "Detail " . ucwords(str_replace('_', ' ', $menu));

        //Data Navbar
        $data['navbar']['menu'] = $this->master->getMenuForNavbar($data['user']['id_role']);

        return $data;
    }

    function index()
    {
        $menu = 'scf';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'scf';

        //Search By Date
        $data['search'] = $this->input->get();

        //SCF
        $data['data_scf'] = $this->scf->getSCF($data['search']);
        $data['total_scf'] = $this->scf->getTotalSCF();
        $data['plafon'] = $this->scf->getPlafon();

        //Divisi
        $data['divisi'] = $this->master->getDivisi();

        $this->load->view('index', $data);
    }

    function getDetailSCF($id)
    {
        auth($this->session);

        $data = $this->scf->getDetailSCF($id)[0];
        filterAllDataTable($data);

        echo json_encode($data);
    }

    function addSCF()
    {
        $user = $this->session->userdata('admin_session');
        $post = $this->input->post();

        $result = $this->scf->addSCF($post);

        //Alert
        if ($result) {
            $this->session->set_flashdata('alert', 'Berhasil menambah <b>SCF</b>');
        } else {
            $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> Tidak bisa menambah SCF');
        }

        redirect('transaksi/scf');
    }

    function editSCF()
    {
        $user = $this->session->userdata('admin_session');
        $post = $this->input->post();

        $result = $this->scf->editSCF($post);

        //Alert
        if ($result === true) {
            $this->session->set_flashdata('alert', 'Berhasil mengubah <b>SCF</b>');
        } else if ($result == "404") {
            $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> SCF tidak ditemukan');
        } else {
            $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> Tidak bisa mengubah SCF');
        }

        redirect('transaksi/scf');
    }

    function hapusSCF()
    {
        $user = $this->session->userdata('admin_session');
        $post = $this->input->post();

        $result = $this->scf->hapusSCF($post);

        //Alert
        if ($result === true) {
            $this->session->set_flashdata('alert', 'Berhasil menghapus <b>SCF</b>');
        } else if ($result == "404") {
            $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> SCF tidak ditemukan');
        } else {
            $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> Tidak bisa menghapus SCF');
        }

        redirect('transaksi/scf');
    }

    function getDetailChartSCF($year, $indexMonth)
    {
        $result = $this->scf->getDetailChartSCF($year, $indexMonth);

        if ($result) echo json_encode($result);
    }

    function exportSCF()
    {
        $menu = 'scf';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'scf';

        //Search By Date
        $data['search'] = $this->input->get();

        //SCF
        $data['data_scf'] = $this->scf->getSCF($data['search']);
        $data['total_scf'] = $this->scf->getTotalSCF();
        $data['plafon'] = $this->scf->getPlafon();

        //Divisi
        $data['divisi'] = $this->master->getDivisi();

        $this->load->view('pages/transaksi/scf/export_scf', $data);
    }
}
