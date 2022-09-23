<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect(base_url("auth"));
		}
		
		$this->load->model('Pasien_model');
		$this->load->model('Pemeriksaan_model');
		$this->load->model('Pembayaran_model');
		$this->load->model('Karyawan_model');
		$this->load->model('Obat_model');
		$this->load->model('M_id');
		$this->load->model('Resep_model');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index(){
		$judul['judul'] = 'Halaman Pemeriksaan';
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
		$data['pasien'] = $this->Pasien_model->getAllPemeriksaanPasien()->result();
		$this->load->helper('date');
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar', $data);
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('pemeriksaan/index', $data);
		$this->load->view('templates/home_footer');
	}
	
	public function periksa($kd_rm){
		$judul['judul'] = 'Pemeriksaan';
		$data['desc'] = 'Tambah Pemeriksaan';
		$data['kodeperiksa'] = $this->M_id->buat_kode_periksa();
		$data['tanggal'] = date("d-m-Y");
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		$where1 = array('kd_rm' => $kd_rm);
		$data1['pasien'] = $this->Pemeriksaan_model->tampil_detail($where1)->result();
		$data2['pemeriksaan'] = $this->Pemeriksaan_model->tampil_pemeriksaan($where1)->result();
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
		$data['tarif'] = $this->Pembayaran_model->tampil();
		$data['datadokter'] = $this->Pemeriksaan_model->getdatadokter();
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar',$data);
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('pemeriksaan/detail', $data1);
		$this->load->view('pemeriksaan/input', $data2);
		$this->load->view('templates/home_footer');
	}
	
	public function ubah($id_periksa){
		$judul['judul'] = 'Pemeriksaan';
		$data['desc'] = 'Tambah Pemeriksaan';
		$data['kodeperiksa'] = $this->M_id->buat_kode_periksa();
		$data['koderesep'] = $this->M_id->buat_kode_resep();
		$data['tanggal'] = date("d-m-Y");
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
		$data['obat'] = $this->Obat_model->getAllObat()->result();
		$kd_rm = $this->Pemeriksaan_model->getKdRm($id_periksa);
		$kd_resep = $this->Resep_model->getKodeResep($id_periksa);
		$where1 = array('kd_rm' => $kd_rm);
		$data1['pasien'] = $this->Pemeriksaan_model->tampil_detail($where1)->result();
		// $data2['pemeriksaan'] = $this->Pemeriksaan_model->tampil_pemeriksaan($where1)->result();  // asli
		$data2['pemeriksaan'] = $this->Pemeriksaan_model->tampil_pemeriksaan1($id_periksa)->result();
		$where = array('id_periksa' => $id_periksa);
		$data['data_pemeriksaan'] = $this->Resep_model->tampil_detail($where)->result();
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		$data['datadokter'] = $this->Pemeriksaan_model->getdatadokter();
		$data['tarif'] = $this->Pembayaran_model->tampil();
		$data['resep'] = $this->db->query(" SELECT * FROM detail_resep JOIN obat on detail_resep.id_obat = obat.id_obat left join resep on resep.kd_resep = detail_resep.kd_resep WHERE resep.id_pemeriksaan='".$id_periksa."'")->result();
		// $data['subtotal'] = $this->Resep_model->hitungjumlah('detail_resep', ['kd_resep' => $this->M_id->buat_kode_resep()]);
		$data['subtotal'] = $this->Resep_model->hitungjumlahbayarresep($kd_resep);
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar',$data);
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('pemeriksaan/detail_ubah', $data1);
		$this->load->view('pemeriksaan/input_ubah', $data2);
		$this->load->view('templates/home_footer');
	}
	
	public function periksaDetail($kd_rm){
		$judul['judul'] = 'Pemeriksaan';
		$data['desc'] = 'Tambah Pemeriksaan';
		$data['kodeperiksa'] = $this->M_id->buat_kode_periksa();
		$data['tanggal'] = date("d-m-Y");
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		$where1 = array('kd_rm' => $kd_rm);
		$data1['pasien'] = $this->Pemeriksaan_model->tampil_detail($where1)->result();
		$data2['pemeriksaan'] = $this->Pemeriksaan_model->tampil_pemeriksaan($where1)->result();
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		$data['tarif'] = $this->Pembayaran_model->tampil();
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar',$data);
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('pemeriksaan/detail', $data1);
		$this->load->view('pemeriksaan/detail_periksa', $data2);
		$this->load->view('templates/home_footer');
	}

	function tambah_aksi(){
		$username = $this->session->userdata('username');
		$kd_rm = $this->input->post('kd_rm');
		$id_periksa = $this->input->post('id_periksa');
		$keluhan = $this->input->post('keluhan');
		$diagnosa = $this->input->post('diagnosa');
		$dokter_jaga = $this->input->post('dokter_jaga');
		// $terapi = $this->input->post('terapi');
		$tindakan = implode(' , ', $this->input->post('tindakan',TRUE)) ;
		$tanggal = $this->input->post('tanggal');
		$id_dokter = $this->db->query("SELECT id_dokter FROM dokter WHERE username='$username'")->row_array();
		$tinggi_badan = $this->input->post('tinggi_badan');
		$berat_badan = $this->input->post('berat_badan');
		$lingkar_perut = $this->input->post('lingkar_perut');
		$imt = $this->input->post('imt');
		$sistole = $this->input->post('sistole');
		$diastole = $this->input->post('diastole');
		$respiratory_rate = $this->input->post('respiratory_rate');
		$heartrate = $this->input->post('heartrate');
		if($this->session->userdata('status') == 'admin'){
			$data = array(
							'kd_rm' => $kd_rm,
							'id_periksa' => $id_periksa,
							'keluhan' => $keluhan,
							'diagnosa' => $diagnosa,
							'id_dokter' => $dokter_jaga,
							// 'terapi' => $terapi,
							// 'tindakan' => $tindakan,
							'tanggal' => $tanggal,
							'tinggi_badan' => $tinggi_badan,
							'berat_badan' => $berat_badan,
							'lingkar_perut' => $lingkar_perut,
							'imt' => $imt,
							'sistole' => $sistole,
							'diastole' => $diastole,
							'respiratory_rate' => $respiratory_rate,
							'heartrate' => $heartrate
						);
		}else{
			$data = array(
							'kd_rm' => $kd_rm,
							'id_periksa' => $id_periksa,
							'keluhan' => $keluhan,
							'diagnosa' => $diagnosa,
							'id_dokter' => $id_dokter['id_dokter'],
							// 'terapi' => $terapi,
							'tindakan' => $tindakan,
							'tanggal' => $tanggal,
							'tinggi_badan' => $tinggi_badan,
							'berat_badan' => $berat_badan,
							'lingkar_perut' => $lingkar_perut,
							'imt' => $imt,
							'sistole' => $sistole,
							'diastole' => $diastole,
							'respiratory_rate' => $respiratory_rate,
							'heartrate' => $heartrate
						);
		}
		$kd_resep = $this->Pemeriksaan_model->getLastKdResep();
		// $kd_resep = (int) $last + 1;
		if($this->session->userdata('status') == 'admin'){
			$dataresep = array(
							'id_pemeriksaan' => $id_periksa,
							'id_dokter' => $dokter_jaga,
							'kd_resep' => $kd_resep
						);
		} else {
			$dataresep = array(
							'id_pemeriksaan' => $id_periksa,
							'id_dokter' => $id_dokter['id_dokter'],
							'kd_resep' => $kd_resep
						);
		}
		$this->Pemeriksaan_model->input_data($data, 'pemeriksaan');
		$this->Pemeriksaan_model->input_data($dataresep, 'resep');
		$this->session->set_flashdata('msg', '<div class="alert alert-success"> 
												<button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil ditambahkan.
											</div>');
		redirect('pemeriksaan/periksa/'.$kd_rm,'');
	}
	
	function ubah_aksi(){
		$username = $this->session->userdata('username');
		$kd_rm = $this->input->post('kd_rm');
		$id_periksa = $this->input->post('id_periksa');
		$keluhan = $this->input->post('keluhan');
		$diagnosa = $this->input->post('diagnosa');
		$dokter_jaga = $this->input->post('dokter_jaga');
		$tanggal = $this->input->post('tanggal');
		$tindakan = implode(' , ', $this->input->post('tindakan',TRUE));
		$tinggi_badan = $this->input->post('tinggi_badan');
		$berat_badan = $this->input->post('berat_badan');
		$lingkar_perut = $this->input->post('lingkar_perut');
		$imt = $this->input->post('imt');
		$sistole = $this->input->post('sistole');
		$diastole = $this->input->post('diastole');
		$respiratory_rate = $this->input->post('respiratory_rate');
		$heartrate = $this->input->post('heartrate');
		$data = array(
						'kd_rm' => $kd_rm,
						'id_periksa' => $id_periksa,
						'keluhan' => $keluhan,
						'diagnosa' => $diagnosa,
						'id_dokter' => $dokter_jaga,
						'tanggal' => $tanggal,
						'tindakan' => $tindakan,
						'tinggi_badan' => $tinggi_badan,
						'berat_badan' => $berat_badan,
						'lingkar_perut' => $lingkar_perut,
						'imt' => $imt,
						'sistole' => $sistole,
						'diastole' => $diastole,
						'respiratory_rate' => $respiratory_rate,
						'heartrate' => $heartrate
					);
		// $this->Pemeriksaan_model->input_data($data, 'pemeriksaan');
		$result = $this->Pemeriksaan_model->ubah_data2($data);
		if (!empty($result)){
			if ($result = TRUE) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success"> 
												<button type="button" class="close" data-dismiss="alert">&times;</button>Data Berhasil diupdate.
											</div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger"> 
												<button type="button" class="close" data-dismiss="alert">&times;</button>Data Gagal diupdate.
											</div>');
			}
		}
		redirect('pemeriksaan/periksa/'.$kd_rm,'');
	}
	
	public function hapus($id_periksa){
		$this->Pemeriksaan_model->hapus_data($id_periksa);
		redirect('pemeriksaan/index');
	}

	
	/*LAPORAN TRANSAKSI*/
	function laporan(){
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){
			$filter = $_GET['filter'];
			if($filter == '1'){
				$tanggal1 = $_GET['tanggal'];
				$tanggal2 = $_GET['tanggal2'];
				$ket = 'Data Rekam Medis dari Tanggal '.date('d-m-y', strtotime($tanggal1)).' - '.date('d-m-y', strtotime($tanggal2));
				$url_cetak = 'pemeriksaan/cetak1?tanggal1='.$tanggal1.'&tanggal2='.$tanggal2.'';
				$pemeriksaan = $this->Pemeriksaan_model->view_by_date($tanggal1,$tanggal2);
			} else if ($filter == '2'){
				$kd_rm = $_GET['kd_rm'];
				$ket = 'Data Rekam Medis ';
				$url_cetak = 'pemeriksaan/cetak2?&kd_rm='.$kd_rm;
				$pemeriksaan = $this->Pemeriksaan_model->view_by_kd_rm($kd_rm);
			} else if($filter == '3'){
				// $kelas = $_GET['kd_pasien'];
				// $ket = 'Data Pasien '.$pasien;
				// $url_cetak = 'pemeriksaan/cetak3?&pasien='.$pasien;
				// $pasien = $this->Pemeriksaan_model->view_by_kd_pasien($pasien)->result();
				
				$bulan = $_GET['bulanfilter'];
				// $ket = 'Data Pasien Per Bulan '.$bulan;
				$ket = 'Data Pasien Per Bulan ';
				$url_cetak = 'pemeriksaan/cetak3?&bulan='.$bulan;
				$pemeriksaan = $this->Pemeriksaan_model->view_by_bulan($bulan);
			}
		} else {
			$ket = 'Semua Data Rekam Medis';
			$url_cetak = 'pemeriksaan/cetak';
			$pemeriksaan = $this->Pemeriksaan_model->view_all(); 
		}

		$data['ket'] = $ket;
		$data['url_cetak'] = base_url($url_cetak);
		$data['pemeriksaan'] = $pemeriksaan;
		$data['kd_rm'] = $this->Pemeriksaan_model->kd_rm();
		$data['kd_pasien'] = $this->Pemeriksaan_model->kd_pasien();
		$data['judul'] = 'Laporan Data Rekam Medis';
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();		
		$this->load->view('templates/home_header', $data);
		$this->load->view('templates/home_sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pemeriksaan/laporan', $data);
		$this->load->view('templates/home_footer');
	}

	public function cetak(){
		$ket = 'Semua Data Rekam Medis';
		$alamat = 'Jl. Raya Purwakarta No.21, Tagogapu, Kec. Padalarang, Kabupaten Bandung Barat';
	  	ob_start();
	  	require('assets/pdf/fpdf.php');
	  	$data['pemeriksaan'] = $this->Pemeriksaan_model->view_all(); 
	  	$data['ket'] = $ket;  
	  	$data['alamat'] = $alamat;
	  	$this->load->view('pemeriksaan/preview', $data);
	}

	public function cetak1(){    
	  	$tanggal1 = $_GET['tanggal1'];
		$tanggal2 = $_GET['tanggal2'];
		$ket = 'Data Rekam Medis dari Tanggal '.date('d-m-y', strtotime($tanggal1)).' s/d '.date('d-m-y', strtotime($tanggal2));
		$alamat = 'Jl. Raya Purwakarta No.21, Tagogapu, Kec. Padalarang, Kabupaten Bandung Barat';
	  	ob_start();
	  	require('assets/pdf/fpdf.php');
	  	$data['pemeriksaan'] = $this->Pemeriksaan_model->view_by_date($tanggal1,$tanggal2);
	  	$data['ket'] = $ket;
	  	$data['alamat'] = $alamat;
	  	$this->load->view('pemeriksaan/preview', $data);
	}

	public function cetak2(){
	  	$kd_rm = $_GET['kd_rm'];
	  	$data['nama_pasien'] = $this->db->query("SELECT nama_pasien FROM pasien WHERE kd_rm = '$kd_rm'")->result();
		$ket = 'Kode RM   '   .$kd_rm  ;     
		$alamat = 'Jl. Raya Purwakarta No.21, Tagogapu, Kec. Padalarang, Kabupaten Bandung Barat';                      
	  	ob_start();   
	  	require('assets/pdf/fpdf.php');  
	  	$data['pemeriksaan'] = $this->Pemeriksaan_model->view_by_kd_rm($kd_rm); 
	  	$data['ket'] = $ket; 
	  	$data['alamat'] = $alamat;
	  	$this->load->view('pemeriksaan/preview1', $data);
	}
	
	public function cetak3(){
	  	$bulan = $_GET['bulan'];
	  	// $data['nama_pasien'] = $this->db->query("SELECT nama_pasien FROM pasien WHERE kd_rm = '$kd_rm'")->result();
		// $ket = 'Cetak Per Bulan   '   .$kd_rm  ;     
		$ket = 'Cetak Per Bulan' ;     
		$alamat = 'Jl. Raya Purwakarta No.21, Tagogapu, Kec. Padalarang, Kabupaten Bandung Barat';                      
	  	ob_start();   
	  	require('assets/pdf/fpdf.php');  
	  	$data['pemeriksaan'] = $this->Pemeriksaan_model->view_by_bulan($bulan); 
	  	$data['ket'] = $ket; 
	  	$data['alamat'] = $alamat;
	  	$this->load->view('pemeriksaan/preview', $data);
	}
}