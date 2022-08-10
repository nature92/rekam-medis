<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel', 'verify');
        // $this->load->model('MasterModel', 'master');

        //Auth Maintenance
        $ip = $this->input->ip_address();
        $setting = $this->master->getSetting();
        authSetting($setting, $ip);
    }

    public function index()
    {

        if ($this->session->userdata('admin_session')) redirect('dashboard');

        $data = [
            'username' => '',
            'password' => '',
            'error' => '',
            'usernameError' => '',
            'passwordError' => '',
        ];

        if ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');

            if (!$this->session->flashdata('username')) {
                $data['usernameError'] = 'error';
            };
            if (!$this->session->flashdata('password')) {
                $data['passwordError'] = 'error';
            };
        }

        if ($this->session->flashdata('username')) {
            $data['username'] = $this->session->flashdata('username');
        };
        if ($this->session->flashdata('password')) {
            $data['password'] = $this->session->flashdata('password');
        };

        $this->load->view('pages/login/login', $data);
    }

    public function do_login()
    {
        validate($this->input->post(), $this->form_validation);
        $username = html_escape($this->input->post('username'));
        $password = html_escape($this->input->post('password'));

        if ($username && $password && $this->form_validation->run() !== False) {
            $cek = $this->verify->cekLogin($username, $password);

            if ($cek['error']) $this->session->set_flashdata('error', $cek['string']);
            redirect(base_url());
        } else {
            $this->session->set_flashdata('error', 'Username dan Password tidak cocok');
            $this->session->set_flashdata('username', $username);
            $this->session->set_flashdata('password', $password);
            redirect(base_url());
        }
    }

    public function do_logout()
    {
        $this->session->unset_userdata('admin_session');
        redirect(base_url());
    }
}
