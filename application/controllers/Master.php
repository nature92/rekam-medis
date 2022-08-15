<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends CI_Controller {
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect(base_url("auth"));
		}
		$this->load->model('Master_model');
		$this->load->model('Admin_model');
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
		if($password == $passwordconfirm){
			$data = array(
							'username' => $username,
							'password' => password_hash($password, PASSWORD_DEFAULT),
							// 'passwordconfirm' => password_hash($passwordconfirm, PASSWORD_DEFAULT)
						);
			$where = array('username' => $username);
			$this->Admin_model->update_data($where, $data,'admin');
			$this->session->set_flashdata('msg', '<div class="alert alert-success"> 
													<button type="button" class="close" data-dismiss="alert">&times;</button> Data password berhasil diubah 
												</div>');
			redirect('master/profile');
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger"> 
													<button type="button" class="close" data-dismiss="alert">&times;</button> Confirm Password tidak sesuai 
												</div>');
			redirect('master/profile');
		}
	}
	
}