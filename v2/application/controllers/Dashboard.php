<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //Auth User
        auth($this->session);

        //Auth Maintenance
        $ip = $this->input->ip_address();
        $setting = $this->master->getSetting();
        authSetting($setting, $ip);
    }



    public function index()
    {
        //Data Utama
        $data['user'] = get_object_vars($this->session->userdata('admin_session'));
        $data['controller'] = $this;
        $data['list_card'] = getListCard($this->dataPreview());
        $data['title'] = 'Dashboard';

        //Data Navbar
        $data['navbar']['menu'] = $this->master->getMenuForNavbar($data['user']['id_role']);

        //Data Pages
        $data['pages']['page'] = 'dashboard';
        $data['pages']['menu'] = 'dashboard';

        //Data Kurs
        $data['avail_kurs'] = $this->saldo->getAvailKurs();

        //Data Rekap Saldo
        $data['mst_kurs'] = $this->saldo->getKurs();
        $data['rekap_saldo'] = $this->saldo->getRekapSaldo();

        //Data SCF
        $data['year_scf'] = $this->input->get('year-scf') ? $this->input->get('year-scf') : date("Y");
        $data['chart_scf'] = $this->scf->getChartSCF($data['year_scf']);

        $this->load->view('index', $data);
    }

    protected function dataPreview()
    {

        $data = [];

        //ACC RECEIVABLE -------------------
        $dataAR = $this->accReceivable->getDataAccReceivable();
        $data['acc_receivable'] = isset($dataAR[0]['total']) ? filterNumber($dataAR[0]['total']) : filterNumber(0);
        $data['tgl_acc_receivable'] = isset($dataAR[0]['tanggal']) ? $dataAR[0]['tanggal'] : '';

        //CASH ON HANDS---------------------
        $saldo = $this->saldo->getTotalSaldo();
        $total_saldo = 0;
        foreach ($saldo as $s) {
            $jml = $s->jumlah_saldo;
            if ($s->rasio_kurs) $jml *= $s->rasio_kurs;
            $total_saldo += $jml;
        }
        $data['tgl_cash_on_hands'] = isset($saldo[0]) ? filterDiffDate($saldo[0]->tgl_saldo) : '';
        $data['cash_on_hands'] = filterNumber($total_saldo);

        return $data;
    }
}
