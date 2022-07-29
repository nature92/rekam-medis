<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends CI_Controller {
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect(base_url("auth"));
		}
		$this->load->model('Master_model');
	}

	public function index(){
		$judul['judul'] = 'Halaman Beranda Admin';
		$data['jumlahpasien'] = $this->Pasien_model->jumlahpasien();
		$data['jumlahrm'] = $this->Pemeriksaan_model->jumlahrm();
		$data['jumlahbayar'] = $this->Pembayaran_model->jumlahbayar();
		$data['jumlahobatmasuk'] = $this->Apoteker_model->jumlahobatmasuk();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/home_footer',$data);
	}
	
	public function profile(){
		$judul['judul'] = 'Halaman Beranda Admin';
		// $data['jumlahpasien'] = $this->Pasien_model->jumlahpasien();
		// $data['jumlahrm'] = $this->Pemeriksaan_model->jumlahrm();
		// $data['jumlahbayar'] = $this->Pembayaran_model->jumlahbayar();
		// $data['jumlahobatmasuk'] = $this->Apoteker_model->jumlahobatmasuk();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('master/profile', $data);
		$this->load->view('templates/home_footer',$data);
	}
	
	function updatePassword(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$passwordconfirm = $this->input->post('passwordconfirm');
		$data = array(
						'username' => $username,
						'password' => $password,
						'passwordconfirm' => $passwordconfirm
					);
		$where = array('username' => $username);
		$this->Admin_model->update_data($where, $data,'admin');
		redirect('master/profile');
		$this->session->set_flashdata('msg', '<div class="alert alert-success"> 
												<button type="button" class="close" data-dismiss="alert">&times;</button> Data pegawai berhasil disimpan 
											</div>');
	}
	
}