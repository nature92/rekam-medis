<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('MasterModel', 'master');

        //Auth User
        auth($this->session);

        //Auth Maintenance
        $ip = $this->input->ip_address();
        $setting = $this->master->getSetting();
        authSetting($setting, $ip);
    }

    public function index($menu)
    {

        // Data Utama 
        $data['user'] = get_object_vars($this->session->userdata('admin_session'));
        $data['hak_akses'] = $this->master->getHakAkses($data['user']['id_role'], $menu);
        $data['menu'] = $menu;
        $data['title'] = "Detail " . ucwords(str_replace('_', ' ', $menu));

        // Data Navbar
        $data['navbar']['menu'] = $this->master->getMenuForNavbar($data['user']['id_role']);

        //Data Table
        $foreign = $this->master->getConstraint("mst_$menu");
        $data['data'] = $this->master->getAllData("mst_$menu", $foreign);
        $data['column'] = filterColumnOrder($this->master->getColumnTable($menu, $foreign), $menu);

        //Data Foreign
        foreach ($foreign as $fk) {
            $table = str_replace('fk_', '', $fk->conname);
            $data['foreign'][$table] = $this->master->getForeign($table);
        }

        //Data Log
        $data['data_log'] = $this->master->getLog($menu);

        //Data Hak Akses
        $data['list_kategori_menu'] = $this->master->getAllData("mst_kategori_menu");

        //Data Pages
        $data['pages']['page'] = 'master';
        $data['pages']['menu'] = 'master';

        $this->load->view('index', $data);
    }

    //Function Util
    public function getDetail($table, $id)
    {
        auth($this->session);

        $data = $this->master->getDetail($table, $id);
        filterAllDataTable($data);

        echo json_encode($data);
    }

    public function getHakAkses($role)
    {
        auth($this->session);
        echo json_encode(($this->master->getEditHakAkses($role)));
    }

    public function getPersonil($npp)
    {
        auth($this->session);
        echo json_encode($this->master->getPersonil($npp));
    }

    public function getNamaPersonil($nama)
    {
        auth($this->session);
        echo json_encode($this->master->getNamaPersonil(urldecode($nama)));
    }



    // public function getForeignForLog($table, $id)
    // {
    //     auth($this->session);
    //     echo json_encode(($this->master->getForeignById($table, $id)));
    // }
}
