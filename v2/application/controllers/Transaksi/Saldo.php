<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saldo extends CI_Controller
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

    function index($from = '', $until = '')
    {
        $menu = 'saldo';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'saldo';

        //Date Range
        $from = $from ? $from : date('Y-m-d H:i:s', strtotime('-1 month'));
        $until = $until ? $until : date('Y-m-d H:i:s');

        //Data Saldo
        $data['daterange'] = [$from, $until];
        $data['column'] = $this->saldo->getRekeningForColumn();
        $data['mst_kurs'] = $this->saldo->getKurs();
        $data['avail_kurs'] = $this->saldo->getAvailKurs();
        $data['rekap_saldo'] = $this->saldo->getRekapSaldo();

        $data['saldo'] = [];
        $saldo = $this->saldo->getSaldo($from, $until);

        foreach ($saldo as $s) {
            $id_rekening = explode(',', $s->id_rekening);
            $jumlah_saldo = explode(',', $s->jumlah_saldo);
            for ($i = 0; $i < count($id_rekening); $i++) {
                $data['saldo'][$s->tgl_saldo][$id_rekening[$i]] = $jumlah_saldo[$i];
            }
        }
        //Saldo Chart
        $data = $this->saldoChart($data);

        $this->load->view('index', $data);
    }

    function addSaldo()
    {
        $user = $this->session->userdata('admin_session');
        $post = $this->input->post();
        $tgl = date('Y-m-d H:i:s');
        $data = [];

        foreach ($post as $p) {
            if (!preg_match('/^[0-9.,]+$/', $p)) {
                $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> Saldo harus berupa angka');
                redirect('transaksi/saldo');
            }
        }

        foreach (array_keys($post) as $p) {

            $data['id_rekening'] = str_replace('rek-', '', $p);
            $data['jumlah_saldo'] = str_replace(',', '.', str_replace('.', '', $post[$p]));

            isset($data['jumlah_saldo']) && $this->saldo->addSaldo($data, $tgl);
        }

        $this->saldo->addSaldoLog($user->id_user, 'create', $tgl);
        $this->session->set_flashdata('alert', 'Berhasil menambah <b>Saldo</b>');
        redirect('transaksi/saldo');
    }

    function editSaldo()
    {
        $user = $this->session->userdata('admin_session');
        $post = $this->input->post();

        $now = date("Y-m-d H:i:s");
        $tgl = $this->input->post('date');

        $diff = date_diff(date_create($now), date_create($tgl));
        if ($diff->format('%a') == 0 && $diff->format('%h') == 0) {
            $i = 0;
            foreach ($post as $p) {
                if (!preg_match('/^[0-9.,]+$/', $p) && $i != 0) {
                    $this->session->set_flashdata('alert-error', '<b>Gagal! : </b> Saldo harus berupa angka');
                    redirect('transaksi/saldo');
                }
                $i++;
            }

            $data = [];
            foreach (array_keys($post) as $p) {
                if ($p !== 'date') {
                    $data['id_rekening'] = str_replace('rek-', '', $p);
                    $data['jumlah_saldo'] = str_replace(',', '.', str_replace('.', '', $post[$p]));

                    isset($data['jumlah_saldo']) && $this->saldo->editSaldo($data, $tgl);
                }
            }
            $this->saldo->addSaldoLog($user->id_user, 'update', $tgl);
            $this->session->set_flashdata('alert', 'Berhasil mengubah <b>Saldo</b>');
        } else {
            $this->session->set_flashdata('alert-error', validation_errors('<b>Gagal! : </b> Mohon input ulang data yang ingin diubah!'));
        }


        redirect('transaksi/saldo');
    }

    protected function saldoChart($data)
    {
        //Data Saldo-Chart
        $data['currency'] = $this->master->getAllDataActive('mst_currency');
        $data['chart_currency'] = $this->input->post('chart_currency') ? $this->input->post('chart_currency') : 'any';
        $data['convert_currency'] = $this->input->post('convert_currency') ? $this->input->post('convert_currency') : 'IDR';
        $mst_kurs = $this->saldo->getKurs();

        $data['tgl_saldo'] = $this->saldo->getTglSaldoForChart($data['chart_currency']);
        $saldo_chart = $this->saldo->getSaldoForChart($data['chart_currency']);


        $data['saldo_chart'] = [];
        $data['warna_label'] = [];

        $jumlah_array = [];
        foreach ($data['tgl_saldo'] as $tgl) {
            array_push($jumlah_array, 0);
        }

        foreach ($saldo_chart as $s) {
            $i = 0;
            foreach ($data['tgl_saldo'] as $tgl) {
                if ($tgl->tgl_saldo === $s->tgl_saldo) {
                    $konversi = konversiKurs($mst_kurs, $s->jumlah_saldo, $s->kode_currency, $data['convert_currency']);
                    ($jumlah_array[$i] += $konversi);
                }
                $i++;
            }

            $next = next($saldo_chart);
            if (!$next || $next->nama_bank !== $s->nama_bank) {
                $data['saldo_chart'][$s->nama_bank] = $jumlah_array;
                $data['warna_label'][$s->nama_bank] = $s->warna_label;
                $jumlah_array = [];
                foreach ($data['tgl_saldo'] as $tgl) {
                    array_push($jumlah_array, 0);
                }
            }
        }

        return $data;
    }
}
