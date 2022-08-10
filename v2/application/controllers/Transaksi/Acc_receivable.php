<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acc_Receivable extends CI_Controller
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

    function index($tanggal = '')
    {
        $menu = 'acc_receivable';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'acc_receivable';

        $data['acc_receivable'] = $this->accReceivable->getDataAccReceivable();
        $data['acc_receivable_chart'] = $this->accReceivable->getDataAccReceivable('chart');

        $this->load->view('index', $data);
    }

    function detail($tanggal)
    {
        $menu = 'acc_receivable';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'acc_receivable';

        $data['tanggal'] = urldecode($tanggal);
        $data['kategori_produksi'] = $this->master->getAllData('mst_kategori_produksi');
        $data['detail_acc_receivable'] = $this->accReceivable->getDetailAccReceivable(urldecode($tanggal));

        $this->load->view('index', $data);
    }
}
