<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_Kas extends CI_Controller
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
        $menu = 'penerimaan_kas';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'penerimaan_kas';

        //Search By Date
        $data['search'] = $this->input->get();

        //Penerimaan Kas
        $data['data_penerimaan_kas'] = $this->penerimaanKas->getPenerimaanKas($data['search']);

        //Divisi
        $data['divisi'] = $this->master->getDivisi();

        //Bank HRIS
        $data['bank'] = $this->master->getVerBank();

        //Jenis Transaksi Arus Kas
        $data['jenis_transaksi_arus_kas'] = $this->master->getAllData(
            'mst_jenis_transaksi_arus_kas',
            [(object)["conname" => "fk_jenis_arus_kas"]]
        );
        // $data['jenis_transaksi_arus_kas'] = $this->master->getJenisCashin();

        $this->load->view('index', $data);
    }

    function laporan()
    {   $this->penerimaanKas->test_verifikasi();
        $menu = 'penerimaan_kas';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'penerimaan_kas';
        $data['pages']['sub_menu'] = 'laporan';

        //Search By Month
        $data['search'] = $this->input->get();

        //Data Laporan Arus Kas
        $data['data_laporan_arus_kas'] = $this->penerimaanKas->getLaporanArusKas($data['search']);

        //Divisi
        $data['divisi'] = $this->master->getDivisiProduksi();

        //Jenis Transaksi Arus Kas
        $data['jenis_transaksi_arus_kas'] = $this->master->getAllData(
            'mst_jenis_transaksi_arus_kas',
            [(object)["conname" => "fk_jenis_arus_kas"]]
        );

        //Jenis Arus Kas
        $data['jenis_arus_kas'] = array_unique(
            array_column($data['jenis_transaksi_arus_kas'], 'nama_jenis_arus_kas')
        );

        $this->load->view('index', $data);
    }

    function addPenerimaanKas()
    {
        $user = $this->session->userdata('admin_session');
        $post = $this->input->post();

        $result = $this->penerimaanKas->addPenerimaanKas($post);

        //Alert
        if ($result) {
            $this->session->set_flashdata('alert', 'Berhasil menambah <b>Transaksi Penerimaan Kas</b>');
        } else {
            $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> Tidak bisa menambah Transaksi Penerimaan Kas');
        }

        redirect('transaksi/penerimaan_kas');
    }

    function editPenerimaanKas()
    {
        $user = $this->session->userdata('admin_session');
        $post = $this->input->post();

        $result = $this->penerimaanKas->editPenerimaanKas($post);

        //Alert
        if ($result === true) {
            $this->session->set_flashdata('alert', 'Berhasil mengubah <b>Penerimaan Kas</b>');
        } else if ($result == "404") {
            $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> Penerimaan Kas tidak ditemukan');
        } else {
            $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> Tidak bisa mengubah Penerimaan Kas');
        }

        redirect('transaksi/penerimaan_kas');
    }

    function hapusPenerimaanKas()
    {
        $user = $this->session->userdata('admin_session');
        $post = $this->input->post();

        $result = $this->penerimaanKas->hapusPenerimaanKas($post);

        //Alert
        if ($result === true) {
            $this->session->set_flashdata('alert', 'Berhasil menghapus <b>Penerimaan Kas</b>');
        } else if ($result == "404") {
            $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> Penerimaan Kas tidak ditemukan');
        } else {
            $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> Tidak bisa menghapus Penerimaan Kas');
        }

        redirect('transaksi/penerimaan_kas');
    }

    function getDetailPenerimaanKas($id)
    {
        $data = $this->penerimaanKas->getDetailPenerimaanKas($id)[0];
        filterAllDataTable($data);

        echo json_encode($data);
    }

    
    function export()
    {
        $menu = 'penerimaan_kas';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'penerimaan_kas';

        //Search By Date
        $data['search'] = $this->input->get();

        //Penerimaan Kas
        $data['data_penerimaan_kas'] = $this->penerimaanKas->getPenerimaanKas($data['search']);

        //Divisi
        $data['divisi'] = $this->master->getDivisi();

        //Bank HRIS
        $data['bank'] = $this->master->getVerBank();

        //Jenis Transaksi Arus Kas
        // $data['jenis_transaksi_arus_kas'] = $this->master->getAllData(
        //     'mst_jenis_transaksi_arus_kas',
        //     [(object)["conname" => "fk_jenis_arus_kas"]]
        // );
        // $data['jenis_transaksi_arus_kas'] = $this->master->getJenisCashin();

        $this->load->view('pages/transaksi/penerimaan_kas/export', $data);
    }
}
