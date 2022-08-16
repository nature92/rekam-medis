<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lc extends CI_Controller
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

    function index(){
        $menu = 'lc';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'lc';		
		$data['user'] = get_object_vars($this->session->userdata('admin_session'));
        $data['hak_akses'] = $this->master->getHakAkses($data['user']['id_role'], $menu);

        //Search By Date
        $data['search'] = $this->input->get();
        
        //LC
        $data['data_lc'] = $this->lcskbdn->getLc();
		$data['pendanaan'] = $this->lcskbdn->getPendanaan();
        $data['data_lc_diajukan_bank'] = $this->lcskbdn->getLcPengajuanBank();
        $data['data_lc_release_dokumen'] = $this->lcskbdn->getLcReleaseDokumen();
        $data['data_lc_jatuh_tempo'] = $this->lcskbdn->getLcJatuhTempo();
        $data['data_lc_monitor_jatuh_tempo'] = $this->lcskbdn->getLcSkbdnMonitoringJatuhTempo();
        $data['data_lc_monitor_jatuh_tempo_refinancing'] = $this->lcskbdn->getLcSkbdnMonitoringJatuhTempoRefinancing();
        $data['data_lc_skbdn_all'] = $this->lcskbdn->getLcSkbdnSummary();

        //Divisi & Mata Uang
        $data['divisi'] = $this->master->getDivisi();
        $data['matauang'] = $this->master->getMataUang();
        $data['vendor'] = $this->master->getVendor();

        $this->load->view('index', $data);
    }
	
	function detail($id_lc,$uid){
        $menu = 'lc';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'lc';        
        $data['user'] = get_object_vars($this->session->userdata('admin_session'));
        $data['hak_akses'] = $this->master->getHakAkses($data['user']['id_role'], $menu);
		
		$data['divisi'] = $this->master->getDivisi();
		$data['header_lc'] = $this->lcskbdn->getLcHeader($id_lc, $uid);
		$data['jumlah_barang'] = $this->lcskbdn->getJumlahBarang($uid);
		$data['jumlah_additional_cost'] = $this->lcskbdn->getJumlahAdditionalCost($uid);
		$data['detail_barang'] = $this->lcskbdn->getBarangDetail($uid);
		$data['detail_additional_cost'] = $this->lcskbdn->getAdditionalCostDetail($uid);
		$data['detail_po_asli'] = $this->lcskbdn->getPoAsliDetail($uid);
		$data['detail_jamlak_asli'] = $this->lcskbdn->getJamlakAsliDetail($uid);
		$data['detail_kontrak_asli'] = $this->lcskbdn->getKontrakAsliDetail($uid);
		$data['konfirmasi_keabsahan_bank_garansi'] = $this->lcskbdn->getKonfirmKeabsahanBGDetail($uid);
		$data['keabsahan_bank_garansi'] = $this->lcskbdn->getKeabsahanBGDetail($uid);
		$data['detail_kontrak_jual_so'] = $this->lcskbdn->getKontrakJualSoDetail($uid);
		$data['matauang'] = $this->master->getMataUang();
		$data['master_bank'] = $this->master->getMasterBank();

        $this->load->view('index', $data);
    }
	
	function addLC2() {
		$data = array();
		$uid											= $this->input->post('uid');
		$lc_skbdn										= $this->input->post('lc_atau_skbdn');
		$tahapan										= $this->input->post('tahapan');
		$nomor_surat									= $this->input->post('nomor_surat');
		$tanggal_surat_ajuan_isc						= $this->input->post('tanggal_surat_ajuan_isc');
		$nomor_po										= $this->input->post('nomor_po');
		$nominal_pembukaan								= $this->input->post('nominal_pembukaan1');
		$nomor_kontrak									= $this->input->post('nomor_kontrak');
		$tanggal_sjan									= $this->input->post('tanggal_sjan');
		$divisi											= $this->input->post('divisi');
		$id_vendor										= $this->input->post('id_vendor');
		$alamat_vendor									= $this->input->post('alamat_vendor');
		$total_barang									= $this->input->post('total_barang'); //jumlah looping barang
		$total_additional_cost							= $this->input->post('total_additional_cost'); //jumlah looping additional cost
		$mata_uang										= $this->input->post('mata_uang_add');
		$nama_mata_uang									= $this->input->post('nama_mata_uang');
		$nilai_kurs										= $this->input->post('nilai_kurs1add');
		// if($mata_uang = 'IDR' or $mata_uang = null or $mata_uang = ''){
			// $nilai_kurs = 0;
		// }else{
			// $nilai_kurs = $nilaikurs;
		// }
		$nominal_kontrak								= $this->input->post('nominal_kontrak1');
		$prosentase_ppn									= $this->input->post('nilai_prosentase_ppn_add');
		$ppn_10_persen									= $this->input->post('ppn_10_persen1');
		$pph_22											= $this->input->post('pph_221');
		$pph_23											= $this->input->post('pph_231');
		$pph_4_2										= $this->input->post('pph_4_21');
		$swasta_atau_bumn								= $this->input->post('swasta_atau_bumn');
		$nilai_lc_atau_skbdn							= $this->input->post('nilai_lc_atau_skbdn1');
		$po_asli										= $this->input->post('customCheck1'); // checkbox dokumen po asli
		$total_doc_po_asli								= $this->input->post('total_doc_po_asli'); //jumlah looping dokumen po asli
		// $dok_kelengkapan_po_asli						= $this->input->post('dok_kelengkapan_po_asli'); //dokumen
		$jamlak_asli									= $this->input->post('customCheck2'); // checkbox dokumen jamlak asli
		$total_doc_jamlak_asli							= $this->input->post('total_doc_jamlak_asli'); //jumlah looping dokumen jamlak asli
		// $dok_kelengkapan_jamlak_asli					= $this->input->post('dok_kelengkapan_jamlak_asli'); //dokumen
		$kontrak_asli									= $this->input->post('customCheck3'); // checkbox dokumen kontrak asli
		$total_doc_kontrak_asli							= $this->input->post('total_doc_kontrak_asli'); //jumlah looping dokumen kontrak asli
		// $dok_kelengkapan_kontrak_asli				= $this->input->post('dok_kelengkapan_kontrak_asli'); //dokumen
		$surat_konfirmasi_keabsahan_bank_garansi		= $this->input->post('surat_konfirmasi_keabsahan_bank_garansi');
		$berkas_surat_konfirmasi_keabsahan_bank_garansi	= $this->input->post('berkas_surat_konfirmasi_keabsahan_bank_garansi'); //dokumen
		$keabsahan_bank_garansi							= $this->input->post('keabsahan_bank_garansi');
		$berkas_keabsahan_bank_garansi					= $this->input->post('berkas_keabsahan_bank_garansi'); //dokumen
		$no_surat_keabsahan								= $this->input->post('no_surat_keabsahan');
		if($jamlak_asli=='' or $jamlak_asli==null or $jamlak_asli=='0'){
			$tanggal_surat_keabsahan						= null;
			$masa_berlaku_jamlak							= null;
		}else{
			$tanggal_surat_keabsahan						= $this->input->post('tanggal_surat_keabsahan');
			$masa_berlaku_jamlak							= $this->input->post('masa_berlaku_jamlak');
		}
		$keterangan_atau_alasan_belum_release			= $this->input->post('keterangan_atau_alasan_belum_release');
		$swift_number									= $this->input->post('swift_number');
		$advising_bank									= $this->input->post('advising_bank');
		$alamat_bank									= $this->input->post('alamat_bank');
		$account_no										= $this->input->post('account_no');
		$waktu_pengiriman_barang						= $this->input->post('waktu_pengiriman_barang');
		$kode_proyek									= $this->input->post('kode_proyek');
		$nama_proyek									= $this->input->post('nama_proyek');
		$nomor_kontrak_jual_so							= $this->input->post('nomor_kontrak_jual_so');
		$total_doc_kontrak_jual_so						= $this->input->post('total_doc_kontrak_jual_so'); //jumlah looping berkas nomor kontrak jual
		// $berkas_nomor_kontrak_jual_so				= $this->input->post('berkas_nomor_kontrak_jual_so0'); //dokumen
		$nilailc										= $this->input->post('nilailc1');
		$produk_yang_dijual								= $this->input->post('produk_yang_dijual');
		$customer										= $this->input->post('customer');
		$status_penerbitan								= $this->input->post('status_penerbitan');
		$now 											= date("Y/m/d H:i:s");
		$nama_divisi									= $this->master->getNamaDivisi($divisi);
		$nama_vendor									= $this->master->getNamaVendor($id_vendor);
		
		if($mata_uang == 'IDR' OR $mata_uang == null OR $mata_uang == ''){
			$data = array(	
						'uid'											=>$uid,
						'lc_skbdn'										=>$lc_skbdn,
						'tahapan'										=>$tahapan,
						'nomor_surat'									=>$nomor_surat,
						'tanggal_surat_ajuan_isc'						=>$tanggal_surat_ajuan_isc,
						'nomor_po'										=>$nomor_po,
						'nominal_pembukaan'								=>$nominal_pembukaan,
						'nomor_kontrak'									=>$nomor_kontrak,
						'tanggal_sjan'									=>$tanggal_sjan,
						'divisi'										=>$divisi,
						'id_vendor'										=>$id_vendor,
						'nama_vendor'									=>$nama_vendor,
						'alamat_vendor'									=>$alamat_vendor,
						'mata_uang'										=>'IDR',
						'nilai_kurs'									=>0,
						'nominal_kontrak'								=>$nominal_kontrak,
						'prosentase_ppn'								=>$prosentase_ppn,
						'ppn_10_persen'									=>$ppn_10_persen,
						'pph_22'										=>$pph_22,
						'pph_23'										=>$pph_23,
						'pph_4_2'										=>$pph_4_2,
						'swasta_atau_bumn'								=>$swasta_atau_bumn,
						'nilai_lc_atau_skbdn'							=>$nilai_lc_atau_skbdn,
						'masa_berlaku_jamlak'							=>$masa_berlaku_jamlak,
						'surat_konfirmasi_keabsahan_bank_garansi'		=>$surat_konfirmasi_keabsahan_bank_garansi,
						// 'berkas_surat_konfirmasi_keabsahan_bank_garansi'=>"assets/upload/trx_lc_skbdn/".$up_data['file_name'],
						'keabsahan_bank_garansi'						=>$keabsahan_bank_garansi,
						'no_surat_keabsahan'							=>$no_surat_keabsahan,
						'tanggal_surat_keabsahan'						=>$tanggal_surat_keabsahan,
						'keterangan_atau_alasan_belum_release'			=>$keterangan_atau_alasan_belum_release,
						'swift_number'									=>$swift_number,
						'advising_bank'									=>$advising_bank,
						'alamat_bank'									=>$alamat_bank,
						'account_no'									=>$account_no,
						'waktu_pengiriman_barang'						=>$waktu_pengiriman_barang,
						'kode_proyek'									=>$kode_proyek,
						'nama_proyek'									=>$nama_proyek,
						'nomor_kontrak_jual_so'							=>$nomor_kontrak_jual_so,
						'nilai'											=>$nilailc,
						'produk_yang_dijual'							=>$produk_yang_dijual,
						'customer'										=>$customer,
						'status_penerbitan'								=>$status_penerbitan,
						'created_date'									=>$now,
						'created_by'									=>$this->session->userdata('admin_session')->nama_user,
						'nama_divisi'									=>$nama_divisi
					);
		} else {
			$data = array(	
						'uid'											=>$uid,
						'lc_skbdn'										=>$lc_skbdn,
						'tahapan'										=>$tahapan,
						'nomor_surat'									=>$nomor_surat,
						'tanggal_surat_ajuan_isc'						=>$tanggal_surat_ajuan_isc,
						'nomor_po'										=>$nomor_po,
						'nominal_pembukaan'								=>$nominal_pembukaan,
						'nomor_kontrak'									=>$nomor_kontrak,
						'tanggal_sjan'									=>$tanggal_sjan,
						'divisi'										=>$divisi,
						'id_vendor'										=>$id_vendor,
						'nama_vendor'									=>$nama_vendor,
						'alamat_vendor'									=>$alamat_vendor,
						'mata_uang'										=>$mata_uang,
						'nilai_kurs'									=>$nilai_kurs,
						'nominal_kontrak'								=>$nominal_kontrak,
						'prosentase_ppn'								=>$prosentase_ppn,
						'ppn_10_persen'									=>$ppn_10_persen,
						'pph_22'										=>$pph_22,
						'pph_23'										=>$pph_23,
						'pph_4_2'										=>$pph_4_2,
						'swasta_atau_bumn'								=>$swasta_atau_bumn,
						'nilai_lc_atau_skbdn'							=>$nilai_lc_atau_skbdn,
						'masa_berlaku_jamlak'							=>$masa_berlaku_jamlak,
						'surat_konfirmasi_keabsahan_bank_garansi'		=>$surat_konfirmasi_keabsahan_bank_garansi,
						// 'berkas_surat_konfirmasi_keabsahan_bank_garansi'=>"assets/upload/trx_lc_skbdn/".$up_data['file_name'],
						'keabsahan_bank_garansi'						=>$keabsahan_bank_garansi,
						'no_surat_keabsahan'							=>$no_surat_keabsahan,
						'tanggal_surat_keabsahan'						=>$tanggal_surat_keabsahan,
						'keterangan_atau_alasan_belum_release'			=>$keterangan_atau_alasan_belum_release,
						'swift_number'									=>$swift_number,
						'advising_bank'									=>$advising_bank,
						'alamat_bank'									=>$alamat_bank,
						'account_no'									=>$account_no,
						'waktu_pengiriman_barang'						=>$waktu_pengiriman_barang,
						'kode_proyek'									=>$kode_proyek,
						'nama_proyek'									=>$nama_proyek,
						'nomor_kontrak_jual_so'							=>$nomor_kontrak_jual_so,
						'nilai'											=>$nilailc,
						'produk_yang_dijual'							=>$produk_yang_dijual,
						'customer'										=>$customer,
						'status_penerbitan'								=>$status_penerbitan,
						'created_date'									=>$now,
						'created_by'									=>$this->session->userdata('admin_session')->nama_user,
						'nama_divisi'									=>$nama_divisi
					);
		}
					
		// simpan transaksi lc/skbdn			
		$result 	= $this->lcskbdn->simpanDataLc($data);
		$postdata   = $this->input->post();
		
		// simpan detail barang	
		if($total_barang==1 or $total_barang=='1' or $total_barang > 1 or $total_barang > '1'){
			for ($index = 0; $index < $total_barang; $index++) {
				$detail['nama_barang'] 			= $postdata['nama_barang'. $index];
				$detail['quantity_barang'] 		= $postdata['quantity_barang'. $index];
				$detail['satuan_barang'] 		= $postdata['satuan_barang'. $index];
				$detail['tanggal_pengiriman'] 	= $postdata['tanggal_pengiriman'. $index];
				$detail['tolerance'] 			= $postdata['tolerance'. $index];
				$this->lcskbdn->addDetailBarang($data, $detail);
				echo '';
			}
		}
		
		// simpan additional cost
		if($total_additional_cost==1 or $total_additional_cost=='1' or $total_additional_cost > 1 or $total_additional_cost > '1'){
			for ($index = 0; $index < $total_additional_cost; $index++) {
				$detail9['additional_cost'] = $postdata['additional_cost'. $index];
				$detail9['nilai'] 			= $postdata['nilai_additional'. $index];
				$this->lcskbdn->addDetailAdditionalCost($data, $detail9);
				echo '';
			}
		}
		
		// simpan detail & upload kelengkapan dokumen po asli
		if($po_asli == 1 or $po_asli=='1'){			
			for ($index1 = 0; $index1 < $total_doc_po_asli; $index1++) {
				// $detail['dok_kelengkapan_po_asli'] = $postdata['dok_kelengkapan_po_asli'. $index1];
				// $user_folder = 'assets/upload/trx_lc_skbdn/po_asli/'.$nomor_po;
				$user_folder = 'assets/upload/trx_lc_skbdn/po_asli/';
				if(!is_dir($user_folder)){
					mkdir($user_folder,0777);
				}
				//upload config 				
				$config_upload['upload_path'] 	= $user_folder;
				$config_upload['allowed_types'] = 'pdf';
				$config_upload['max_size']		= '60000';
				// $new_name 					= 'po_asli'.$postdata['dok_kelengkapan_po_asli'. $index1].'_'.$uid.'_'.$index1;
				// $new_name 					= $nomor_po;
				// $config_upload['overwrite'] 	= TRUE;
				$new_name 						= 'po_asli_'.$uid.'_'.$index1;			
				$config_upload['file_name'] 	= $new_name;
				$this->load->library('upload', $config_upload);
				if($this->upload->do_upload('dok_kelengkapan_po_asli' . $index1)){
					$this->upload->data();
					$this->lcskbdn->addDetailKelengkapanDokumenPoAsli($data, $index1);
				} else {
					$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok po asli</b>');
				}
			}
		}
		
		// simpan detail & upload kelengkapan dokumen jamlak asli
		if($jamlak_asli == 2 or $jamlak_asli=='2'){
			for ($index2 = 0; $index2 < $total_doc_jamlak_asli; $index2++) {
				// $detail['dok_kelengkapan_jamlak_asli'] = $postdata['dok_kelengkapan_jamlak_asli'. $index2];
				// $user_folder = 'assets/upload/trx_lc_skbdn/jamlak_asli/'.$nomor_po; 
				$user_folder = 'assets/upload/trx_lc_skbdn/jamlak_asli/'; 
				if(!is_dir($user_folder)){
					mkdir($user_folder,0777);
				}
				//upload config 				
				$config_upload1['upload_path'] 	= $user_folder;
				$config_upload1['allowed_types'] = 'pdf';
				$config_upload1['max_size']		= '60000';
				// $new_name 					= 'jamlak_asli'.$postdata['dok_kelengkapan_jamlak_asli'. $index2].'_'.$uid.'_'.$index2;
				// $new_name 					= $nomor_po;
				$new_name 						= 'jamlak_asli_'.$uid.'_'.$index2;	;
				$config_upload1['file_name'] 	= $new_name;
				// $config_upload1['overwrite'] 	= TRUE;
				$this->load->library('upload', $config_upload1,'upload_jamlak_asli');
				if($this->upload_jamlak_asli->do_upload('dok_kelengkapan_jamlak_asli' . $index2)){
					// $upload_data	= $this->upload_jamlak_asli->data();
					// $this->lcskbdn->setEvidencePoAsli($upload_data['file_name'], $data); 
					$this->upload_jamlak_asli->data();
					$this->lcskbdn->addDetailKelengkapanDokumenJamlakAsli($data, $index2);
				} else {
					$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok jamlak asli</b>');
				}
			}
		}
		
		// simpan detail & upload kelengkapan dokumen kontrak asli
		if($kontrak_asli == 3 or $kontrak_asli=='3'){
			for ($index3 = 0; $index3 < $total_doc_kontrak_asli; $index3++) {
				// $detail['dok_kelengkapan_kontrak_asli'] = $postdata['dok_kelengkapan_kontrak_asli'. $index3];
				// $user_folder = 'assets/upload/trx_lc_skbdn/kontrak_asli/'.$nomor_po; 
				$user_folder = 'assets/upload/trx_lc_skbdn/kontrak_asli/'; 
				if(!is_dir($user_folder)){
					mkdir($user_folder,0777);
				}
				//upload config 				
				$config_upload2['upload_path'] 	= $user_folder;
				$config_upload2['allowed_types'] = 'pdf';
				$config_upload2['max_size']		= '60000';
				// $new_name 					= 'kontrak_asli'.$postdata['dok_kelengkapan_kontrak_asli'. $index3].'_'.$uid.'_'.$index3;
				// $new_name 					= $nomor_po;
				$new_name 						= 'kontrak_asli_'.$uid.'_'.$index3;
				$config_upload2['file_name'] 	= $new_name;
				// $config_upload2['overwrite'] 	= TRUE;
				$this->load->library('upload', $config_upload2,'upload_kontrak_asli');
				if($this->upload_kontrak_asli->do_upload('dok_kelengkapan_kontrak_asli' . $index3)){
					// $upload_data	= $this->upload_kontrak_asli->data();
					// $this->lcskbdn->setEvidencePoAsli($upload_data['file_name'], $data);
					$this->upload_kontrak_asli->data();
					$this->lcskbdn->addDetailKelengkapanDokumenKontrakAsli($data, $index3);
				} else {
					$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok kontrak asli</b>');
				}
			}
		}
		
		// simpan detail & upload kelengkapan berkas kontrak jual so
		if($total_doc_kontrak_jual_so == 1 or $total_doc_kontrak_jual_so=='1' or $total_doc_kontrak_jual_so > '1' or $total_doc_kontrak_jual_so > 1){
			for ($index4 = 0; $index4 < $total_doc_kontrak_asli; $index4++) {
				// $detail['berkas_nomor_kontrak_jual_so'] = $postdata['berkas_nomor_kontrak_jual_so'. $index4];
				// $user_folder = 'assets/upload/trx_lc_skbdn/total_doc_kontrak_jual_so/'.$nomor_po; 
				$user_folder = 'assets/upload/trx_lc_skbdn/total_doc_kontrak_jual_so/'; 
				if(!is_dir($user_folder)){
					mkdir($user_folder,0777);
				}
				//upload config 				
				$config_upload3['upload_path'] 	= $user_folder;
				$config_upload3['allowed_types'] = 'pdf';
				$config_upload3['max_size']		= '60000';
				// $new_name 					= 'kontrak_jual_so'.$postdata['berkas_nomor_kontrak_jual_so'. $index4].'_'.$uid.'_'.$index4;
				// $new_name 					= $nomor_po;
				$new_name 						= 'kontrak_jual_so_'.$uid.'_'.$index4;
				$config_upload3['file_name'] 	= $new_name;
				// $config_upload3['overwrite'] 	= TRUE;
				$this->load->library('upload', $config_upload3,'upload_kontrak_jual');
				if($this->upload_kontrak_jual->do_upload('berkas_nomor_kontrak_jual_so' . $index4)){
					// $upload_data	= $this->upload_kontrak_jual->data();
					// $this->lcskbdn->setEvidencePoAsli($upload_data['file_name'], $data);
					$this->upload_kontrak_jual->data();
					$this->lcskbdn->addDetailKelengkapanDokumenKontrakJualSo($data, $index4);
				} else {
					$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok kontrak kontrak jual so</b>');
				}
			}
		}
		
		//upload konfirmasi keabsahan bank garansi start 
		$user_folder1 = 'assets/upload/trx_lc_skbdn/keabsahan_bank_garansi/'; 
		if(!is_dir($user_folder1)){
			mkdir($user_folder1,0777);
		}				
		$config_upload4['upload_path'] 	= $user_folder1;
		$config_upload4['allowed_types']= 'pdf';
		$config_upload4['max_size']		= '60000';
		$name 							= 'konfirmasi_keabsahan_bank_garansi_'.$uid;
		$config_upload4['file_name'] 	= $name;
		// $config_upload4['overwrite'] 	= TRUE;
		$this->load->library('upload', $config_upload4,'upload_konfirm_keabsahan_bg');
		if($this->upload_konfirm_keabsahan_bg->do_upload('berkas_surat_konfirmasi_keabsahan_bank_garansi')){
			$this->upload_konfirm_keabsahan_bg->data();
			$this->lcskbdn->addDetailKonfirmasiKeabsahanDokumenBankGaransi($data);
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok Konfirmasi Bank Garansi</b>');
		}
		
		//upload keabsahan bank garansi start 
		$user_folder2 = 'assets/upload/trx_lc_skbdn/keabsahan_bank_garansi/'; 
		if(!is_dir($user_folder2)){
			mkdir($user_folder2,0777);
		}				
		$config_upload5['upload_path'] 	= $user_folder2;
		$config_upload5['allowed_types']= 'pdf';
		$config_upload5['max_size']		= '60000';
		$name2 							= 'keabsahan_bank_garansi_'.$uid;
		$config_upload5['file_name'] 	= $name2;
		// $config_upload5['overwrite'] 	= TRUE;
		$this->load->library('upload', $config_upload5,'upload_keabsahan_bg');
		if($this->upload_keabsahan_bg->do_upload('berkas_keabsahan_bank_garansi')){
			$this->upload_keabsahan_bg->data();
			$this->lcskbdn->addDetailKeabsahanDokumenBankGaransi($data);
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok Bank Garansi</b>');
		}
		
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil menambah <b>LC/SKBDN</b>');
			redirect('transaksi/lc');
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal menambah <b>LC/SKBDN</b>');
			redirect('transaksi/lc');
		}
	}
	
	function exportLC(){
        $menu = 'lc';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'lc';

        //Search By Date
        $data['search'] = $this->input->get();

        //LC
		$data['data_lc'] = $this->lcskbdn->getExportLc();
		$data['data_barang'] = $this->lcskbdn->getExportBarangLc();
		// print_r($data['data_lc']);
		// exit;

        //Divisi
        $data['divisi'] = $this->master->getDivisi();

        $this->load->view('pages/transaksi/lc/export_lc', $data);
    }
	
	function getDetailLC($id){
        auth($this->session);
        $data = $this->lcskbdn->getDetailLC($id)[0];
        filterAllDataTable($data);
        echo json_encode($data);
    }
	
	function editLC() {
		$data = array();
		$nilai_kurs = '';
		$id_lc											= $this->input->post('id_lc_edit');
		$uid											= $this->input->post('uid_edit');
		$lc_skbdn										= $this->input->post('lc_atau_skbdn_edit');
		$tahapan										= $this->input->post('tahapan_edit');
		$nomor_surat									= $this->input->post('nomor_surat_edit');
		$tanggal_surat_ajuan_isc						= $this->input->post('tanggal_surat_ajuan_isc_edit');
		$nomor_po										= $this->input->post('nomor_po_edit');
		$nominal_pembukaan								= $this->input->post('nominal_pembukaan_edit1');
		$nomor_kontrak									= $this->input->post('nomor_kontrak_edit');
		$tanggal_sjan									= $this->input->post('tanggal_sjan_edit');
		$divisi											= $this->input->post('divisi_edit');
		$vendor											= $this->input->post('vendor_edit');
		$alamat_vendor									= $this->input->post('alamat_vendor_edit');
		$total_barang									= $this->input->post('total_barang_edit'); //jumlah looping barang
		$total_additional_cost							= $this->input->post('total_additional_cost_edit'); //jumlah looping Additional Cost
		$mata_uang										= $this->input->post('mata_uang_edit');
		$kurs											= $this->input->post('nilai_kurs_edit1');
		if($mata_uang =='IDR' or $kurs== '' or $kurs== null){
			$nilai_kurs = 0; 
		}else{
			$nilai_kurs = $kurs;
		}
		$nominal_kontrak1								= $this->input->post('nominal_kontrak_edit1');
		$prosentase_ppn									= $this->input->post('prosentase_ppn_edit1');
		$ppn_10_persen									= $this->input->post('ppn_10_persen_edit');
		$pph_22											= $this->input->post('pph_22_edit');
		$pph_23											= $this->input->post('pph_23_edit');
		$pph_4_2										= $this->input->post('pph_4_2_edit');
		$swasta_atau_bumn								= $this->input->post('swasta_atau_bumn_edit');
		$nilai_lc_atau_skbdn							= $this->input->post('nilai_lc_atau_skbdn1');
		$po_asli										= $this->input->post('customCheckEdit1'); // checkbox dokumen po asli
		$total_doc_po_asli								= $this->input->post('total_doc_po_asli_edit'); //jumlah looping dokumen po asli
		$jamlak_asli									= $this->input->post('customCheckEdit2'); // checkbox dokumen jamlak asli
		$total_doc_jamlak_asli							= $this->input->post('total_doc_jamlak_asli_edit'); //jumlah looping dokumen jamlak asli
		$kontrak_asli									= $this->input->post('customCheckEdit3'); // checkbox dokumen kontrak asli
		$total_doc_kontrak_asli							= $this->input->post('total_doc_kontrak_asli_edit'); //jumlah looping dokumen kontrak asli
		$masa_berlaku_jamlak							= $this->input->post('masa_berlaku_jamlak_edit');
		$surat_konfirmasi_keabsahan_bank_garansi		= $this->input->post('surat_konfirmasi_keabsahan_bank_garansi_edit');
		$berkas_surat_konfirmasi_keabsahan_bank_garansi	= $this->input->post('berkas_surat_konfirmasi_keabsahan_bank_garansi_edit'); //dokumen
		$keabsahan_bank_garansi							= $this->input->post('keabsahan_bank_garansi_edit');
		$berkas_keabsahan_bank_garansi					= $this->input->post('berkas_keabsahan_bank_garansi_edit'); //dokumen
		$no_surat_keabsahan								= $this->input->post('no_surat_keabsahan_edit');
		if($no_surat_keabsahan==null or $no_surat_keabsahan=='' or $this->input->post('tanggal_surat_keabsahan_edit')==null or $this->input->post('tanggal_surat_keabsahan_edit')==''){
			$tanggal_surat_keabsahan					= null;
		}else{
			$tanggal_surat_keabsahan					= $this->input->post('tanggal_surat_keabsahan_edit');
		}
		$keterangan_atau_alasan_belum_release			= $this->input->post('keterangan_atau_alasan_belum_release_edit');
		$swift_number									= $this->input->post('swift_number_edit');
		$advising_bank									= $this->input->post('advising_bank_edit');
		$account_no										= $this->input->post('account_no_edit');
		$kirim_barang									= $this->input->post('kirim_barang');
		$kode_proyek									= $this->input->post('kode_proyek_edit');
		$nama_proyek									= $this->input->post('nama_proyek_edit');
		$nomor_kontrak_jual_so							= $this->input->post('nomor_kontrak_jual_so_edit');
		$total_doc_kontrak_jual_so						= $this->input->post('total_doc_kontrak_jual_so_edit'); //jumlah looping berkas nomor kontrak jual
		$nilai											= $this->input->post('kontrak_nilai_edit');
		$produk_yang_dijual								= $this->input->post('produk_yang_dijual_edit');
		$customer										= $this->input->post('customer_edit');
		$status_penerbitan								= $this->input->post('status_penerbitan_edit');
		$now 											= date("Y/m/d H:i:s");
		// echo $kode_proyek;
		// exit;
		$data = array(	
						'uid'										=>$uid,
						'lc_skbdn'									=>$lc_skbdn,
						'tahapan'									=>$tahapan,
						'nomor_surat'								=>$nomor_surat,
						'tanggal_surat_ajuan_isc'					=>$tanggal_surat_ajuan_isc,
						'nomor_po'									=>$nomor_po,
						'nominal_pembukaan'							=>$nominal_pembukaan,
						'nomor_kontrak'								=>$nomor_kontrak,
						'tanggal_sjan'								=>$tanggal_sjan,
						'divisi'									=>$divisi,
						'vendor'									=>$vendor,
						'alamat_vendor'								=>$alamat_vendor,
						'mata_uang'									=>$mata_uang,
						'nilai_kurs'								=>$nilai_kurs,
						'nominal_kontrak'							=>$nominal_kontrak1,
						'prosentase_ppn'							=>$prosentase_ppn,
						'ppn_10_persen'								=>$ppn_10_persen,
						'pph_22'									=>$pph_22,
						'pph_23'									=>$pph_23,
						'pph_4_2'									=>$pph_4_2,
						'swasta_atau_bumn'							=>$swasta_atau_bumn,
						'nilai_lc_atau_skbdn'						=>$nilai_lc_atau_skbdn,
						'masa_berlaku_jamlak'						=>$masa_berlaku_jamlak,
						'surat_konfirmasi_keabsahan_bank_garansi'	=>$surat_konfirmasi_keabsahan_bank_garansi,
						'keabsahan_bank_garansi'					=>$keabsahan_bank_garansi,
						'no_surat_keabsahan'						=>$no_surat_keabsahan,
						'tanggal_surat_keabsahan'					=>$tanggal_surat_keabsahan,
						'keterangan_atau_alasan_belum_release'		=>$keterangan_atau_alasan_belum_release,
						'swift_number'								=>$swift_number,
						'advising_bank'								=>$advising_bank,
						'account_no'								=>$account_no,
						'waktu_pengiriman_barang'					=>$kirim_barang,
						'kode_proyek'								=>$kode_proyek,
						'nama_proyek'								=>$nama_proyek,
						'nomor_kontrak_jual_so'						=>$nomor_kontrak_jual_so,
						'nilai'										=>$nilai,
						'produk_yang_dijual'						=>$produk_yang_dijual,
						'customer'									=>$customer,
						'status_penerbitan'							=>$status_penerbitan,
						'created_date'								=>$now,
						'created_by'								=>$this->session->userdata('admin_session')->nama_user
					);
					
		// simpan transaksi lc/skbdn			
		$result 	= $this->lcskbdn->simpanEditDataLc($data);
		$postdata   = $this->input->post();
		
		// simpan detail barang
		$delDetailBarang = $this->lcskbdn->delDetailBarang($data);
		if($delDetailBarang = TRUE){
			if($total_barang==1 or $total_barang=='1' or $total_barang > 1 or $total_barang > '1'){
				for ($index = 0; $index < $total_barang; $index++) {
					$detail['nama_barang'] 			= $postdata['nama_barang_edit'. $index];
					$detail['quantity_barang'] 		= $postdata['quantity_barang_edit'. $index];
					$detail['satuan_barang'] 		= $postdata['satuan_barang_edit'. $index];
					$detail['tanggal_pengiriman'] 	= $postdata['tanggal_pengiriman_edit'. $index];
					$detail['tolerance_barang'] 	= $postdata['tolerance_barang_edit'. $index];
					$this->lcskbdn->addDetailBarangEdit($data, $detail);
					echo '';
				}
			}
		}
		
		// simpan detail additional cost
		if($lc_skbdn =='LC' or $lc_skbdn =='LC_PMN'){
			$delDetailAdditionalCost = $this->lcskbdn->delDetailAdditionalCost($data);
			if($delDetailAdditionalCost = TRUE){
				if($total_additional_cost==1 or $total_additional_cost=='1' or $total_additional_cost > 1 or $total_additional_cost > '1'){
					for ($index = 0; $index < $total_additional_cost; $index++) {
						$detail['additional_cost'] 	= $postdata['additional_cost_editing'. $index];
						$detail['nilai'] 			= $postdata['nilai_edit'. $index];
						$this->lcskbdn->addDetailAdditionalCostEdit($data, $detail);
						echo '';
					}
				}
			}
		}
		
		// simpan detail & upload kelengkapan dokumen po asli
			// if($po_asli == 1 or $po_asli=='1'){
				// for ($index1 = 0; $index1 < $total_doc_po_asli; $index1++) {
					// $user_folder = 'assets/upload/trx_lc_skbdn/po_asli/';
					// if(!is_dir($user_folder)){
						// mkdir($user_folder,0777);
					// }
					// //upload config 				
					// $config_upload['upload_path'] 	= $user_folder;
					// $config_upload['allowed_types'] = 'pdf';
					// $config_upload['max_size']		= '50000';
					// $new_name 						= 'po_asli_'.$uid.'_'.$index1;
					// $config_upload['file_name'] 	= $new_name;
					// // $config_upload2['overwrite'] 	= TRUE;
					// $this->load->library('upload', $config_upload);
					// if($this->upload->do_upload('dok_kelengkapan_po_asli_edit' . $index1)){
						// if(isset($_FILES['dok_kelengkapan_po_asli_edit' . $index1])) {
							// $delDetailKelengkapanDokumenPoAsli = $this->lcskbdn->delDetailKelengkapanDokumenPoAsli($data);
							// if($delDetailKelengkapanDokumenPoAsli = TRUE){
								// $this->upload->data();
								// $this->lcskbdn->addDetailKelengkapanDokumenPoAsli($data, $index1);
							// }
						// }
					// } else {
						// $this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok po asli</b>');
					// }
				// }
			// }		
		
		// simpan detail & upload kelengkapan dokumen jamlak asli
			// if($jamlak_asli == 2 or $jamlak_asli=='2'){
				// for ($index2 = 0; $index2 < $total_doc_jamlak_asli; $index2++) {
					// $user_folder = 'assets/upload/trx_lc_skbdn/jamlak_asli/'; 
					// if(!is_dir($user_folder)){
						// mkdir($user_folder,0777);
					// }
					// //upload config 				
					// $config_upload1['upload_path'] 	= $user_folder;
					// $config_upload1['allowed_types']= 'pdf';
					// $config_upload1['max_size']		= '50000';
					// $new_name 						= 'jamlak_asli_'.$uid.'_'.$index2;	;
					// $config_upload1['file_name'] 	= $new_name;
					// // $config_upload1['overwrite'] 	= TRUE;
					// $this->load->library('upload', $config_upload1,'upload_jamlak_asli');
					// if($this->upload_jamlak_asli->do_upload('dok_kelengkapan_jamlak_asli_edit' . $index2)){
						// if(isset($_FILES['dok_kelengkapan_jamlak_asli_edit' . $index2])) {
							// $delDetailKelengkapanDokumenJamlakAsli = $this->lcskbdn->delDetailKelengkapanDokumenJamlakAsli($data);
							// if($delDetailKelengkapanDokumenJamlakAsli = TRUE){
								// $this->upload_jamlak_asli->data();
								// $this->lcskbdn->addDetailKelengkapanDokumenJamlakAsli($data, $index2);
							// }
						// }
					// } else {
						// $this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok jamlak asli</b>');
					// }
				// }
			// }
		
		// simpan detail & upload kelengkapan dokumen kontrak asli
			// if($kontrak_asli == 3 or $kontrak_asli=='3'){
				// for ($index3 = 0; $index3 < $total_doc_kontrak_asli; $index3++) {
					// $user_folder = 'assets/upload/trx_lc_skbdn/kontrak_asli/'; 
					// if(!is_dir($user_folder)){
						// mkdir($user_folder,0777);
					// }
					// //upload config 				
					// $config_upload2['upload_path'] 	= $user_folder;
					// $config_upload2['allowed_types']= 'pdf';
					// $config_upload2['max_size']		= '50000';
					// $new_name 						= 'kontrak_asli_'.$uid.'_'.$index3;
					// $config_upload2['file_name'] 	= $new_name;
					// // $config_upload2['overwrite'] 	= TRUE;
					// $this->load->library('upload', $config_upload2,'upload_kontrak_asli');
					// if($this->upload_kontrak_asli->do_upload('dok_kelengkapan_kontrak_asli_edit' . $index3)){
						// if(isset($_FILES['dok_kelengkapan_kontrak_asli_edit' . $index3])) {
							// $delDetailKelengkapanDokumenKontrakAsli = $this->lcskbdn->delDetailKelengkapanDokumenKontrakAsli($data);
							// if($delDetailKelengkapanDokumenKontrakAsli = TRUE){
								// $this->upload_kontrak_asli->data();
								// $this->lcskbdn->addDetailKelengkapanDokumenKontrakAsli($data, $index3);
							// }
						// }
					// } else {
						// $this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok kontrak asli</b>');
					// }
				// }
			// }
		
		// simpan detail & upload kelengkapan berkas kontrak jual so
			// if($total_doc_kontrak_jual_so == 1 or $total_doc_kontrak_jual_so=='1' or $total_doc_kontrak_jual_so > '1' or $total_doc_kontrak_jual_so > 1){
				// for ($index4 = 0; $index4 < $total_doc_kontrak_asli; $index4++) {
					// $user_folder = 'assets/upload/trx_lc_skbdn/total_doc_kontrak_jual_so/'; 
					// if(!is_dir($user_folder)){
						// mkdir($user_folder,0777);
					// }
					// //upload config 				
					// $config_upload3['upload_path'] 	= $user_folder;
					// $config_upload3['allowed_types']= 'pdf';
					// $config_upload3['max_size']		= '50000';
					// $new_name 						= 'kontrak_jual_so_'.$uid.'_'.$index4;
					// $config_upload3['file_name'] 	= $new_name;
					// // $config_upload3['overwrite'] 	= TRUE;
					// $this->load->library('upload', $config_upload3,'upload_kontrak_jual');
					// if($this->upload_kontrak_jual->do_upload('berkas_nomor_kontrak_jual_so_edit' . $index4)){
						// if(isset($_FILES['berkas_nomor_kontrak_jual_so_edit' . $index4])) {
							// $delDetailKelengkapanDokumenKontrakJualSo = $this->lcskbdn->delDetailKelengkapanDokumenKontrakJualSo($data);
							// if($delDetailKelengkapanDokumenKontrakJualSo = TRUE){
								// $this->upload_kontrak_jual->data();
								// $this->lcskbdn->addDetailKelengkapanDokumenKontrakJualSo($data, $index4);
							// }
						// }
					// } else {
						// $this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok kontrak kontrak jual so</b>');
					// }
				// }
			// }
		
		//upload konfirmasi keabsahan bank garansi start
			$user_folder1 = 'assets/upload/trx_lc_skbdn/keabsahan_bank_garansi/'; 
			if(!is_dir($user_folder1)){
				mkdir($user_folder1,0777);
			}				
			$config_upload4['upload_path'] 	= $user_folder1;
			$config_upload4['allowed_types']= 'pdf';
			$config_upload4['max_size']		= '50000';
			$name 							= 'konfirmasi_keabsahan_bank_garansi_'.$uid;
			$config_upload4['file_name'] 	= $name;
			// $config_upload4['overwrite'] 	= TRUE;
			$this->load->library('upload', $config_upload4,'upload_konfirm_keabsahan_bg');
			if($this->upload_konfirm_keabsahan_bg->do_upload('berkas_surat_konfirmasi_keabsahan_bank_garansi_edit')){
				if(isset($_FILES['berkas_surat_konfirmasi_keabsahan_bank_garansi_edit'])) {
					$delDetailKonfirmasiKeabsahanDokumenBankGaransi = $this->lcskbdn->delDetailKonfirmasiKeabsahanDokumenBankGaransi($data);
					if($delDetailKonfirmasiKeabsahanDokumenBankGaransi = TRUE){
						$this->upload_konfirm_keabsahan_bg->data();
						$this->lcskbdn->addDetailKonfirmasiKeabsahanDokumenBankGaransi($data);
					}
				}
			} else {
				$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok Konfirmasi Bank Garansi</b>');
			}
		
		//upload keabsahan bank garansi start
			$user_folder2 = 'assets/upload/trx_lc_skbdn/keabsahan_bank_garansi/'; 
			if(!is_dir($user_folder2)){
				mkdir($user_folder2,0777);
			}				
			$config_upload5['upload_path'] 	= $user_folder2;
			$config_upload5['allowed_types']= 'pdf';
			$config_upload5['max_size']		= '50000';
			$name2 							= 'keabsahan_bank_garansi_'.$uid;
			$config_upload5['file_name'] 	= $name2;
			// $config_upload5['overwrite'] 	= TRUE;
			$this->load->library('upload', $config_upload5,'upload_keabsahan_bg');
			if($this->upload_keabsahan_bg->do_upload('berkas_keabsahan_bank_garansi_edit')){
				if(isset($_FILES['berkas_keabsahan_bank_garansi_edit'])) {
					$delDetailKeabsahanDokumenBankGaransi = $this->lcskbdn->delDetailKeabsahanDokumenBankGaransi($data);
					if($delDetailKeabsahanDokumenBankGaransi = TRUE){
						$this->upload_keabsahan_bg->data();
						$this->lcskbdn->addDetailKeabsahanDokumenBankGaransi($data);
					}
				}
			} else {
				$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok Bank Garansi</b>');
			}
		
		
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil ubah <b>LC/SKBDN</b>');
			// redirect('transaksi/lc');
			redirect('transaksi/Lc/detail/'.$id_lc.'/'.$uid);
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal ubah <b>LC/SKBDN</b>');
			// redirect('transaksi/lc');
			redirect('transaksi/Lc/detail/'.$id_lc.'/'.$uid);
		}		
	}
	
	function hapusLcSkbdn($uid) {
		$result = $this->lcskbdn->hapusLcSkbdn($uid);
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil menghapus <b>LC/SKBDN</b>');
			redirect('transaksi/lc');
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal menghapus <b>LC/SKBDN</b>');
			redirect('transaksi/lc');
		}
    }
	
	function editLcPenerbitan() {
		$data = array();
		$id_lc								= $this->input->post('id_lc');
		$uid								= $this->input->post('uid');
		$lc_skbdn_edit						= $this->input->post('lc_skbdn_edit');
		$no_po_edit							= $this->input->post('nomor_po_edit');
		$nomor_kontrak_edit					= $this->input->post('nomor_kontrak_edit');
		$no_surat_pengajuan_aplikasi		= $this->input->post('no_surat_pengajuan_aplikasi');
		$tanggal_surat_pengajuan_aplikasi	= $this->input->post('tanggal_surat_pengajuan_aplikasi1');
		$issuing_bank						= $this->input->post('issuing_bank');
		$keterangan							= $this->input->post('keterangan');
		$status_penerbitan_edit				= $this->input->post('status_penerbitan_edit');
		$total_doc_kelengkapan				= $this->input->post('total_doc_kelengkapan'); //jumlah looping dokumen kelengkapan penerbitan draft
		$now 								= date("Y/m/d H:i:s");
		
		$data = array(	
						'uid'								=>$uid,
						'lc_skbdn'							=>$lc_skbdn_edit,
						'nomor_po'							=>$no_po_edit,
						'nomor_kontrak'						=>$nomor_kontrak_edit,
						'no_surat_pengajuan_aplikasi'		=>$no_surat_pengajuan_aplikasi,
						'tanggal_surat_pengajuan_aplikasi'	=>$tanggal_surat_pengajuan_aplikasi,
						'issuing_bank'						=>$issuing_bank,
						'keterangan'						=>$keterangan,
						'status_penerbitan'					=>$status_penerbitan_edit,
						'modified_by'						=>$this->session->userdata('admin_session')->nama_user,
						'modified_date'						=>$now
					);
					
		// simpan transaksi lc/skbdn
		$result 	= $this->lcskbdn->editLcPenerbitan($data);
		$postdata   = $this->input->post();
		
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil ubah data <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detailPenerbitan/'.$id_lc.'/'.$uid);
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal ubah data <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detailPenerbitan/'.$id_lc.'/'.$uid);
		}
	}
	
	public function getDataDetailBarang() {
		$uid 	= $_POST['uid'];
		$data 	= $this->lcskbdn->getDataDetailBarang($uid);
		echo json_encode($data);
	}
	
	function editLcReleaseDokumen() {
		$data = array();
		$id_lc					= $this->input->post('id_lc');
		$uid					= $this->input->post('uid');
		$lc_skbdn				= $this->input->post('lc_skbdn_ubah');
		$nomor_po				= $this->input->post('nomor_po_ubah');
		$nomor_kontrak			= $this->input->post('nomor_kontrak_ubah');
		$no_lc_skbdn			= $this->input->post('input_no_lc_skbdn');
		$tanggal_lc_skbdn		= $this->input->post('tanggal_lc_skbdn');
		$tanggal_exp_lc_skbdn	= $this->input->post('tanggal_exp_lc_skbdn');
		$tenor_hari				= $this->input->post('tenor_hari');
		$keterangan_tenor		= $this->input->post('keterangan_tenor');
		$status_penerbitan_ubah	= $this->input->post('status_penerbitan_ubah');
		$total_release_dokumen	= $this->input->post('total_release_dokumen'); //jumlah looping dokumen kelengkapan penerbitan draft
		$now 					= date("Y/m/d H:i:s");
		
		$data = array(	
						'uid'					=>$uid,
						'lc_skbdn'				=>$lc_skbdn,
						'nomor_po'				=>$nomor_po,
						'nomor_kontrak'			=>$nomor_kontrak,
						'no_lc_skbdn'			=>$no_lc_skbdn,
						'tanggal_lc_skbdn'		=>$tanggal_lc_skbdn,
						'tanggal_exp_lc_skbdn'	=>$tanggal_exp_lc_skbdn,
						'tenor_hari'			=>$tenor_hari,
						'keterangan_tenor'		=>$keterangan_tenor,
						'status_penerbitan'		=>$status_penerbitan_ubah,
						'modified_by'			=>$this->session->userdata('admin_session')->nama_user,
						'modified_date'			=>$now
					);
					
		// simpan transaksi lc/skbdn
		$result 	= $this->lcskbdn->editLcReleaseDokumen($data);
		$postdata   = $this->input->post();	
		
		// simpan detail & upload kelengkapan dokumen po asli
		// for ($index1 = 0; $index1 < $total_release_dokumen; $index1++) {
			// $user_folder = 'assets/upload/trx_lc_skbdn/release_dokumen/';
			// if(!is_dir($user_folder)){
				// mkdir($user_folder,0777);
			// }
			// //upload config
			// $config_upload['upload_path'] 	= $user_folder;
			// $config_upload['allowed_types'] = 'pdf';
			// $config_upload['max_size']		= '50000';
			// $new_name 						= 'release_dokumen_'.$uid.'_'.$index1;
			// $config_upload['file_name'] 	= $new_name;
			// $this->load->library('upload', $config_upload);
			// if($this->upload->do_upload('release_dokumen_draft' . $index1)){
				// if(isset($_FILES['release_dokumen_draft' . $index1])) {
					// $delDetailReleaseDokumen = $this->lcskbdn->delDetailReleaseDokumen($data);
					// if($delDetailReleaseDokumen = TRUE){
						// $this->upload->data();
						// $this->lcskbdn->addDetailReleaseDokumenDraft($data, $index1);
					// }
				// }
			// } else {
				// $this->session->set_flashdata('alert-error', 'Gagal menambah <b>Release Dokumen</b>');
			// }
		// }
		
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil ubah data <b>LC/SKBDN</b>');
			// redirect('transaksi/lc#tabs-icons-text-3');
			redirect('transaksi/Lc/detailRelease/'.$id_lc.'/'.$uid);
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal ubah data <b>LC/SKBDN</b>');
			// redirect('transaksi/lc');
			redirect('transaksi/Lc/detailRelease/'.$id_lc.'/'.$uid);
		}
	}
	
	public function getDataDetailUploadPenerbitan() {
		$uid 	= $_POST['uid'];
		$data 	= $this->lcskbdn->getDataDetailUploadPenerbitan($uid);
		echo json_encode($data);
	}
	
	function detailPenerbitan($id_lc,$uid){
        $menu = 'lc';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'lc';
        $data['user'] = get_object_vars($this->session->userdata('admin_session'));
        $data['hak_akses'] = $this->master->getHakAkses($data['user']['id_role'], $menu);
		$data['divisi'] = $this->master->getDivisi();
		$data['penerbitan_lc'] = $this->lcskbdn->getLcHeaderPenerbitan($uid);
		$data['detail_penerbitan'] = $this->lcskbdn->getPenerbitanDetail($uid);
		$data['detail_barang'] = $this->lcskbdn->getBarangDetail($uid);
        $this->load->view('index', $data);
    }
	
	function detailRelease($id_lc,$uid){
        $menu = 'lc';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'lc';
        $data['user'] = get_object_vars($this->session->userdata('admin_session'));
        $data['hak_akses'] = $this->master->getHakAkses($data['user']['id_role'], $menu);
		$data['divisi'] = $this->master->getDivisi();
		$data['release_lc'] = $this->lcskbdn->getLcHeaderRelease($uid);
		$data['detail_doc_release'] = $this->lcskbdn->getReleaseDokDetail($uid);
		$data['detail_barang'] = $this->lcskbdn->getBarangDetail($uid);
        $this->load->view('index', $data);
    }
	
	function detailPenagihan($id_lc,$uid){
        $menu = 'lc';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'lc';
        $data['user'] = get_object_vars($this->session->userdata('admin_session'));
        $data['hak_akses'] = $this->master->getHakAkses($data['user']['id_role'], $menu);
		$data['divisi'] = $this->master->getDivisi();
		$data['penagihan_lc'] = $this->lcskbdn->getLcHeaderPenagihan($uid);
		$data['detail_release'] = $this->lcskbdn->getReleaseDokDetail($uid);
		$data['detail_barang'] = $this->lcskbdn->getBarangDetail($uid);
		$data['data_lc_penagihan'] = $this->lcskbdn->getLcPenagihan($uid);
		$data['total_diakseptasi'] = $this->lcskbdn->getTotalNilaiDiakseptasi($uid);
		$data['penagihan_barang'] = $this->lcskbdn->getPenagihanBarang($uid);
        $this->load->view('index', $data);
    }
	
	function editLcPenagihanDokumen() {
		$data = array();
		$uid							= $this->input->post('uid');
		$id_lc							= $this->input->post('id_lc');
		$nomor_surat_akseptasi_isc		= $this->input->post('nomor_surat_akseptasi_isc');
		$tgl_surat_akseptasi			= $this->input->post('tanggal_surat_akseptasi');
		if($tgl_surat_akseptasi == '' or $tgl_surat_akseptasi==null ){
			$tanggal_surat_akseptasi 	= null;
		}else{
			$tanggal_surat_akseptasi 	= $this->input->post('tanggal_surat_akseptasi');
		}
		$tgl_disposisi_manager			= $this->input->post('tanggal_disposisi_manager');
		if($tgl_disposisi_manager == '' or $tgl_disposisi_manager==null ){
			$tanggal_disposisi_manager 	= null;
		}else{
			$tanggal_disposisi_manager 	= $this->input->post('tanggal_disposisi_manager');
		}
		$tanggal_pengajuan_akseptasi_ke	= $this->input->post('tanggal_pengajuan_akseptasi_ke');
		$tanggal_masuk_dokumen			= $this->input->post('tanggal_masuk_dokumen');
		$currency						= $this->input->post('currency');
		$nilai_tagihan					= $this->input->post('nilai_tagihan');
		$bunga_upas						= $this->input->post('bunga_upas');
		$potongan						= $this->input->post('potongan');
		$keterangan_potongan			= $this->input->post('keterangan_potongan');
		$penagihan_barang				= $this->input->post('penagihan_barang');
		$jumlah_volume_barang_quantity	= $this->input->post('jumlah_volume_barang_quantity');
		$jumlah_volume_barang_satuan	= $this->input->post('jumlah_volume_barang_satuan');
		$nilai_yang_diakseptasi			= $this->input->post('nilai_yang_diakseptasi_edit1');
		$tanggal_jatuh_tempo			= $this->input->post('tanggal_jatuh_tempo');
		$keterangan_penagihan			= $this->input->post('keterangan_penagihan');
		$status_penagihan				= $this->input->post('status_penagihan');
		if($status_penagihan == '' or $status_penagihan=='BAYAR' or $status_penagihan==null ){
			$tanggal_jatuh_tempo_refinancing = null;
		}else if($status_penagihan=='REFINANCING'){
			$tanggal_jatuh_tempo_refinancing = $this->input->post('tanggal_jatuh_tempo_refinancingsss');
		}
		$now 							= date("Y/m/d H:i:s");
		$lc_skbdn						= $this->input->post('lc_skbdn_ubah');
		$nomor_surat					= $this->input->post('nomor_surat_ubah');
		$nomor_kontrak					= $this->input->post('nomor_kontrak_ubah');
		$nomor_po						= $this->input->post('nomor_po_ubah');
		$tahapan						= $this->input->post('tahapan_ubah');
		
		$data = array(	
						'uid'								=>$uid,
						'nomor_surat_akseptasi_isc'			=>$nomor_surat_akseptasi_isc,
						'tanggal_surat_akseptasi'			=>$tanggal_surat_akseptasi,
						'tanggal_disposisi_manager'			=>$tanggal_disposisi_manager,
						'tanggal_pengajuan_akseptasi_ke'	=>$tanggal_pengajuan_akseptasi_ke,
						'tanggal_masuk_dokumen'				=>$tanggal_masuk_dokumen,
						'currency'							=>$currency,
						'nilai_tagihan'						=>$nilai_tagihan,
						'bunga_upas'						=>$bunga_upas,
						'potongan'							=>$potongan,
						'keterangan_potongan'				=>$keterangan_potongan,
						'penagihan_barang'					=>$penagihan_barang,
						'jumlah_volume_barang_quantity'		=>$jumlah_volume_barang_quantity,
						'jumlah_volume_barang_satuan'		=>$jumlah_volume_barang_satuan,
						'nilai_yang_diakseptasi'			=>$nilai_yang_diakseptasi,
						'tanggal_jatuh_tempo'				=>$tanggal_jatuh_tempo,
						'keterangan_penagihan'				=>$keterangan_penagihan,
						'status_penagihan'					=>$status_penagihan,
						'tanggal_jatuh_tempo_refinancing'	=>$tanggal_jatuh_tempo_refinancing,
						'modified_by'						=>$this->session->userdata('admin_session')->nama_user,
						'modified_date'						=>$now,
						'lc_skbdn'							=>$lc_skbdn,
						'nomor_surat'						=>$nomor_surat,
						'nomor_kontrak'						=>$nomor_kontrak,
						'nomor_po'							=>$nomor_po,
						'tahapan'							=>$tahapan
					);
					
		// simpan transaksi lc/skbdn
		// $this->lcskbdn->editLcPenagihanDokumen($data);
		$result    = $this->lcskbdn->addLcPenagihanDokumen($data);
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil ubah data <b>LC/SKBDN</b>');
			// redirect('transaksi/lc#tabs-icons-text-4');
			redirect('transaksi/Lc/detailPenagihan/'.$id_lc.'/'.$uid);
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal ubah data <b>LC/SKBDN</b>');
			// redirect('transaksi/lc');
			redirect('transaksi/Lc/detailPenagihan/'.$id_lc.'/'.$uid);
		}
	}	
	
	function addPoAsliLC2(){
		$data = array();
		$id_lc				= $this->input->post('id_lc_edit');
		$uid				= $this->input->post('uid_edit');
		$lc_skbdn			= $this->input->post('lc_atau_skbdn_edit');
		$nomor_surat		= $this->input->post('nomor_surat_edit');
		$nomor_kontrak		= $this->input->post('nomor_kontrak_edit');
		$nomor_po			= $this->input->post('nomor_po_edit');
		$total_detail_doc_po_asli_sdh_upload	= $this->input->post('total_detail_doc_po_asli_sdh_upload');
		$total_doc_po_asli	= $this->input->post('total_doc_po_asli_modal'); //jumlah looping dokumen po asli 2
		$now 				= date("Y/m/d H:i:s");
		$data = array(	
						'id_lc'			=> $id_lc,
						'uid'			=> $uid,
						'lc_skbdn'		=> $lc_skbdn,
						'nomor_surat'	=> $nomor_surat,
						'nomor_kontrak'	=> $nomor_kontrak,
						'nomor_po'		=> $nomor_po,
						'created_date'	=> $now,
						'created_by'	=> $this->session->userdata('admin_session')->nama_user
					);
		// $jumlahDokPOASLI = $this->lcskbdn->getJumlahDokPOAsli($uid);  //5
		// $jumlah_doc_po_asli = $total_doc_po_asli + $jumlahDokPOASLI; //7
		// simpan detail & upload kelengkapan dokumen po asli
		for ($index1 = 0; $index1 < $total_doc_po_asli; $index1++) {
			$upload_ke2 = $total_detail_doc_po_asli_sdh_upload + $index1;
			$user_folder = 'assets/upload/trx_lc_skbdn/po_asli/';
			if(!is_dir($user_folder)){
				mkdir($user_folder,0777);
			}
			//upload config
			$config_upload9['upload_path'] 	= $user_folder;
			$config_upload9['allowed_types']= 'pdf';
			$config_upload9['max_size']		= '50000';
			if($index1==0 or $index1=='0'){
				$new_name 					= 'po_asli_'.$uid.'_'.$index1;
			}else{
				$new_name 					= 'po_asli_'.$uid.'_0'.$upload_ke2;
			}
			$config_upload9['file_name'] 	= $new_name;
			$this->load->library('upload', $config_upload9);
			if($this->upload->do_upload('dok_kelengkapan_po_asli_modal' . $index1)){
				if(isset($_FILES['dok_kelengkapan_po_asli_modal' . $index1])) {
					$this->upload->data();
					$result = $this->lcskbdn->addDetailKelengkapanDokumenPoAsli($data, $upload_ke2);
				}
			} else {
				$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok po asli</b>');
			}
		}
		
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detail/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc');
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detail/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc');
		}
	}
	
	function addJamlakAsliLC2(){
		$data = array();
		$id_lc			= $this->input->post('id_lc_edit');
		$uid			= $this->input->post('uid_edit');
		$lc_skbdn		= $this->input->post('lc_atau_skbdn_edit');
		$nomor_surat	= $this->input->post('nomor_surat_edit');
		$nomor_kontrak	= $this->input->post('nomor_kontrak_edit');
		$nomor_po		= $this->input->post('nomor_po_edit');
		$total_detail_doc_jamlak_asli_sdh_upload	= $this->input->post('total_detail_doc_jamlak_asli_sdh_upload');
		$total_doc_jamlak_asli	= $this->input->post('total_doc_jamlak_asli_modal'); //jumlah looping dokumen jamlak asli
		$now 			= date("Y/m/d H:i:s");
		$data = array(	
						'id_lc'			=> $id_lc,
						'uid'			=> $uid,
						'lc_skbdn'		=> $lc_skbdn,
						'nomor_surat'	=> $nomor_surat,
						'nomor_kontrak'	=> $nomor_kontrak,
						'nomor_po'		=> $nomor_po,
						'created_date'	=> $now,
						'created_by'	=> $this->session->userdata('admin_session')->nama_user
					);
		// $jumlahDokJamlakASLI = $this->lcskbdn->getJumlahDokJamlakAsli($uid);
		// $jumlah_doc_jamlak_asli = $total_doc_jamlak_asli + $jumlahDokJamlakASLI;
		// simpan detail & upload kelengkapan dokumen po asli
		for ($index1 = 0; $index1 < $total_doc_jamlak_asli; $index1++) {
			$upload_ke2 = $total_detail_doc_jamlak_asli_sdh_upload + $index1;
			$user_folder = 'assets/upload/trx_lc_skbdn/jamlak_asli/';
			if(!is_dir($user_folder)){
				mkdir($user_folder,0777);
			}
			//upload config
			$config_upload10['upload_path'] 	= $user_folder;
			$config_upload10['allowed_types'] 	= 'pdf';
			$config_upload10['max_size']		= '50000';
			if($index1==0 or $index1=='0'){
				$new_name 						= 'jamlak_asli_'.$uid.'_'.$index1;
			}else{
				$new_name 						= 'jamlak_asli_'.$uid.'_0'.$upload_ke2;
			}
			$config_upload10['file_name'] 		= $new_name;
			$this->load->library('upload', $config_upload10);
			if($this->upload->do_upload('dok_kelengkapan_jamlak_asli_modal' . $index1)){
				if(isset($_FILES['dok_kelengkapan_jamlak_asli_modal' . $index1])) {
					$this->upload->data();
					$result = $this->lcskbdn->addDetailKelengkapanDokumenJamlakAsli($data, $upload_ke2);
				}
			} else {
				$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok po asli</b>');
			}
		}
		
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detail/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc');
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detail/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc');
		}
	}
	
	function addKontrakAsliLC2(){
		$data = array();
		$id_lc			= $this->input->post('id_lc_edit');
		$uid			= $this->input->post('uid_edit');
		$lc_skbdn		= $this->input->post('lc_atau_skbdn_edit');
		$nomor_surat	= $this->input->post('nomor_surat_edit');
		$nomor_kontrak	= $this->input->post('nomor_kontrak_edit');
		$nomor_po		= $this->input->post('nomor_po_edit');
		$total_detail_doc_kontrak_asli_sdh_upload	= $this->input->post('total_detail_doc_kontrak_asli_sdh_upload');
		$total_doc_kontrak_asli	= $this->input->post('total_doc_kontrak_asli_modal'); //jumlah looping dokumen kontrak asli
		$now 			= date("Y/m/d H:i:s");
		$data = array(	
						'id_lc'			=> $id_lc,
						'uid'			=> $uid,
						'lc_skbdn'		=> $lc_skbdn,
						'nomor_surat'	=> $nomor_surat,
						'nomor_kontrak'	=> $nomor_kontrak,
						'nomor_po'		=> $nomor_po,
						'created_date'	=> $now,
						'created_by'	=> $this->session->userdata('admin_session')->nama_user
					);
		// $jumlahDokKontrakASLI = $this->lcskbdn->getJumlahDokKontrakAsli($uid);
		// $jumlah_doc_kontrak_asli = $total_doc_kontrak_asli + $jumlahDokKontrakASLI;
		// simpan detail & upload kelengkapan dokumen po asli
		for ($index1 = 0; $index1 < $total_doc_kontrak_asli; $index1++) {
			$upload_ke2 = $total_detail_doc_kontrak_asli_sdh_upload + $index1;
			$user_folder = 'assets/upload/trx_lc_skbdn/kontrak_asli/';
			if(!is_dir($user_folder)){
				mkdir($user_folder,0777);
			}
			//upload config
			$config_upload11['upload_path'] 	= $user_folder;
			$config_upload11['allowed_types'] 	= 'pdf';
			$config_upload11['max_size']		= '50000';
			if($index1==0 or $index1=='0'){
				$new_name 						= 'kontrak_asli_'.$uid.'_'.$index1;
			}else{
				$new_name 						= 'kontrak_asli_'.$uid.'_0'.$upload_ke2;
			}
			$config_upload11['file_name'] 		= $new_name;
			$this->load->library('upload', $config_upload11);
			if($this->upload->do_upload('dok_kelengkapan_kontrak_asli_modal' . $index1)){
				if(isset($_FILES['dok_kelengkapan_kontrak_asli_modal' . $index1])) {
					$this->upload->data();
					$result = $this->lcskbdn->addDetailKelengkapanDokumenKontrakAsli($data, $upload_ke2);
				}
			} else {
				$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok po asli</b>');
			}
		}
		
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detail/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc');
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detail/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc');
		}		
	}
	
	function addKontrakJualSoLC2(){
		$data = array();
		$id_lc			= $this->input->post('id_lc_edit');
		$uid			= $this->input->post('uid_edit');
		$lc_skbdn		= $this->input->post('lc_atau_skbdn_edit');
		$nomor_surat	= $this->input->post('nomor_surat_edit');
		$nomor_kontrak	= $this->input->post('nomor_kontrak_edit');
		$nomor_po		= $this->input->post('nomor_po_edit');
		$total_detail_doc_kontrak_jual_so_sdh_upload	= $this->input->post('total_detail_doc_kontrak_jual_so_sdh_upload');
		$total_doc_kontrak_jual_so	= $this->input->post('total_doc_kontrak_jual_so_modal'); //jumlah looping dokumen kontrak jual so
		$now 			= date("Y/m/d H:i:s");
		$data = array(	
						'id_lc'			=> $id_lc,
						'uid'			=> $uid,
						'lc_skbdn'		=> $lc_skbdn,
						'nomor_surat'	=> $nomor_surat,
						'nomor_kontrak'	=> $nomor_kontrak,
						'nomor_po'		=> $nomor_po,
						'created_date'	=> $now,
						'created_by'	=> $this->session->userdata('admin_session')->nama_user
					);
		// $jumlahDokKontrakJualSo = $this->lcskbdn->getJumlahDokKontrakJualSo($uid);
		// $jumlah_doc_kontrak_jual_so = $total_doc_kontrak_jual_so + $jumlahDokKontrakJualSo;
		// simpan detail & upload kelengkapan dokumen po asli
		for ($index1 = 0; $index1 < $total_doc_kontrak_jual_so; $index1++) {
			$upload_ke2 = $total_detail_doc_kontrak_jual_so_sdh_upload + $index1;
			$user_folder = 'assets/upload/trx_lc_skbdn/total_doc_kontrak_jual_so/';
			if(!is_dir($user_folder)){
				mkdir($user_folder,0777);
			}
			//upload config
			$config_upload12['upload_path'] 	= $user_folder;
			$config_upload12['allowed_types'] 	= 'pdf';
			$config_upload12['max_size']		= '50000';
			if($index1==0 or $index1=='0'){
				$new_name 						= 'kontrak_jual_so_'.$uid.'_'.$index1;
			}else{
				$new_name 						= 'kontrak_jual_so_'.$uid.'_0'.$upload_ke2;
			}
			$config_upload12['file_name'] 		= $new_name;
			$this->load->library('upload', $config_upload12);
			if($this->upload->do_upload('dok_kelengkapan_kontrak_jual_so_modal' . $index1)){
				if(isset($_FILES['dok_kelengkapan_kontrak_jual_so_modal' . $index1])) {
					$this->upload->data();
					$result = $this->lcskbdn->addDetailKelengkapanDokumenKontrakJualSo($data, $upload_ke2);
				}
			} else {
				$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok po asli</b>');
			}
		}
		
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detail/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc');
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detail/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc');
		}		
	}
	
	function addKelengkapanPenerbitanLC2(){
		$data = array();
		$id_lc			= $this->input->post('id_lc_edit2');
		$uid			= $this->input->post('uid_edit2');
		$lc_skbdn		= $this->input->post('lc_atau_skbdn_edit2');
		$nomor_surat	= $this->input->post('nomor_surat_edit2');
		$nomor_kontrak	= $this->input->post('nomor_kontrak_edit2');
		$nomor_po		= $this->input->post('nomor_po_edit2');
		$total_detail_doc_kelengkapan_penerbitan_sdh_upload	= $this->input->post('total_detail_doc_kelengkapan_penerbitan_sdh_upload');
		$total_doc_kelengkapan_penerbitan_modal	= $this->input->post('total_doc_kelengkapan_penerbitan_modal'); //jumlah looping dokumen penerbitan
		$now 			= date("Y/m/d H:i:s");
		$data = array(	
						'id_lc'			=> $id_lc,
						'uid'			=> $uid,
						'lc_skbdn'		=> $lc_skbdn,
						'nomor_surat'	=> $nomor_surat,
						'nomor_kontrak'	=> $nomor_kontrak,
						'nomor_po'		=> $nomor_po,
						'created_date'	=> $now,
						'created_by'	=> $this->session->userdata('admin_session')->nama_user
					);
		// simpan detail & upload kelengkapan dokumen penerbitan
		for ($index1 = 0; $index1 < $total_doc_kelengkapan_penerbitan_modal; $index1++) {
			$upload_ke2 = $total_detail_doc_kelengkapan_penerbitan_sdh_upload + $index1;
			$user_folder = 'assets/upload/trx_lc_skbdn/penerbitan_draft/';
			if(!is_dir($user_folder)){
				mkdir($user_folder,0777);
			}
			//upload config
			$config_upload12['upload_path'] 	= $user_folder;
			$config_upload12['allowed_types'] 	= 'pdf';
			$config_upload12['max_size']		= '50000';
			if($index1==0 or $index1=='0'){
				$new_name 						= 'penerbitan_draft_'.$uid.'_'.$index1;
			}else{
				$new_name 						= 'penerbitan_draft_'.$uid.'_0'.$upload_ke2;
			}
			$config_upload12['file_name'] 		= $new_name;
			$this->load->library('upload', $config_upload12);
			if($this->upload->do_upload('dok_kelengkapan_penerbitan_modal' . $index1)){
				if(isset($_FILES['dok_kelengkapan_penerbitan_modal' . $index1])) {
					$this->upload->data();
					$result = $this->lcskbdn->addDetailKelengkapanPenerbitanDraft($data, $upload_ke2);
				}
			} else {
				$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok po asli</b>');
			}
		}
		
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detailPenerbitan/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc#tabs-icons-text-2');
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detailPenerbitan/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc#tabs-icons-text-2');
		}
	}
	
	function addKelengkapanReleaseLC2(){
		$data = array();
		$id_lc			= $this->input->post('id_lc_edit3');
		$uid			= $this->input->post('uid_edit3');
		$lc_skbdn		= $this->input->post('lc_atau_skbdn_edit3');
		$nomor_surat	= $this->input->post('nomor_surat_edit3');
		$nomor_kontrak	= $this->input->post('nomor_kontrak_edit3');
		$nomor_po		= $this->input->post('nomor_po_edit3');
		$total_detail_doc_kelengkapan_release_sdh_upload	= $this->input->post('total_detail_doc_kelengkapan_release_sdh_upload');
		$total_doc_kelengkapan_release_modal	= $this->input->post('total_doc_kelengkapan_release_modal'); //jumlah looping dokumen release
		$now 			= date("Y/m/d H:i:s");
		$data = array(	
						'id_lc'			=> $id_lc,
						'uid'			=> $uid,
						'lc_skbdn'		=> $lc_skbdn,
						'nomor_surat'	=> $nomor_surat,
						'nomor_kontrak'	=> $nomor_kontrak,
						'nomor_po'		=> $nomor_po,
						'created_date'	=> $now,
						'created_by'	=> $this->session->userdata('admin_session')->nama_user
					);
		// simpan detail & upload kelengkapan dokumen release
		for ($index1 = 0; $index1 < $total_doc_kelengkapan_release_modal; $index1++) {
			$upload_ke2 = $total_detail_doc_kelengkapan_release_sdh_upload + $index1;
			$user_folder = 'assets/upload/trx_lc_skbdn/release_dokumen/';
			if(!is_dir($user_folder)){
				mkdir($user_folder,0777);
			}
			//upload config
			$config_upload12['upload_path'] 	= $user_folder;
			$config_upload12['allowed_types'] 	= 'pdf';
			$config_upload12['max_size']		= '50000';
			if($index1==0 or $index1=='0'){
				$new_name 						= 'release_dokumen_'.$uid.'_'.$index1;
			}else{
				$new_name 						= 'release_dokumen_'.$uid.'_0'.$upload_ke2;
			}
			$config_upload12['file_name'] 		= $new_name;
			$this->load->library('upload', $config_upload12);
			if($this->upload->do_upload('dok_kelengkapan_release_modal' . $index1)){
				if(isset($_FILES['dok_kelengkapan_release_modal' . $index1])) {
					$this->upload->data();
					$result = $this->lcskbdn->addDetailReleaseDokumenDraft($data, $upload_ke2);
				}
			} else {
				$this->session->set_flashdata('alert-error', 'Gagal menambah <b>Dok po asli</b>');
			}
		}
		
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detailRelease/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc#tabs-icons-text-3');
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal simpan dokumen <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detailRelease/'.$id_lc.'/'.$uid);
			// redirect('transaksi/lc#tabs-icons-text-3');
		}
	}
	
	function detailSummary($id_lc,$uid){
        $menu = 'lc';
        $data = $this->globalData($menu);
        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'lc';
        $data['user'] = get_object_vars($this->session->userdata('admin_session'));
        $data['hak_akses'] = $this->master->getHakAkses($data['user']['id_role'], $menu);
		$data['divisi'] = $this->master->getDivisi();
		$data['all_lc'] = $this->lcskbdn->getLcSkbdnSummary1($uid);
		$data['detail_release'] = $this->lcskbdn->getReleaseDokDetail($uid);
		$data['detail_barang'] = $this->lcskbdn->getBarangDetail($uid);
		$data['data_lc_penagihan'] = $this->lcskbdn->getLcPenagihan($uid);
		$data['detail_penerbitan'] = $this->lcskbdn->getPenerbitanDetail($uid);
		$data['detail_po_asli'] = $this->lcskbdn->getPoAsliDetail($uid);
		$data['detail_jamlak_asli'] = $this->lcskbdn->getJamlakAsliDetail($uid);
		$data['detail_kontrak_asli'] = $this->lcskbdn->getKontrakAsliDetail($uid);
		$data['konfirmasi_keabsahan_bank_garansi'] = $this->lcskbdn->getKonfirmKeabsahanBGDetail($uid);
		$data['keabsahan_bank_garansi'] = $this->lcskbdn->getKeabsahanBGDetail($uid);
		$data['detail_kontrak_jual_so'] = $this->lcskbdn->getKontrakJualSoDetail($uid);
		$data['detail_doc_release'] = $this->lcskbdn->getReleaseDokDetail($uid);
        $this->load->view('index', $data);
    }
	
	function exportMonitoringLC(){
        $menu = 'lc';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'lc';

        //Search By Date
        $data['search'] = $this->input->get();

        //LC
		$data['data_lc'] = $this->lcskbdn->getLcSkbdnMonitoring();
		// $data['data_lc'] = $this->lcskbdn->getExportLc();

        //Divisi
        $data['divisi'] = $this->master->getDivisi();

        $this->load->view('pages/transaksi/lc/export_lc_monitoring', $data);
    }
	
	function exportMonitoringRefinancingLC(){
        $menu = 'lc';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'lc';

        //Search By Date
        $data['search'] = $this->input->get();

        //LC
		$data['data_lc'] = $this->lcskbdn->getLcSkbdnMonitoringRefinancing();
		// $data['data_lc'] = $this->lcskbdn->getExportLc();

        //Divisi
        $data['divisi'] = $this->master->getDivisi();

        $this->load->view('pages/transaksi/lc/export_lc_monitoring_refinancing', $data);
    }
	
	function exportAllLogLC(){
        $menu = 'lc';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'lc';

        //Search By Date
        $data['search'] = $this->input->get();

        //LC
		$data['data_monitoring_jatuh_tempo'] = $this->lcskbdn->getLcSkbdnMonitoring();
		$data['data_monitoring_jatuh_tempo_refinancing'] = $this->lcskbdn->getLcSkbdnMonitoringRefinancing();
		$data['data_all_lc'] = $this->lcskbdn->getLcSkbdnAllData();
		// $data['data_lc'] = $this->lcskbdn->getExportLc();

        //Divisi
        $data['divisi'] = $this->master->getDivisi();
        $this->load->view('pages/transaksi/lc/export_lc_all', $data);
    }
	
	function tesExportAllLogLC(){
        header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="test.xlsx"');
		
		$spreadsheet = new Spreadsheet();
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'service');
		$spreadsheet->getActiveSheet(0)->setTitle('Service');
		
		$spreadsheet->createSheet();
		$spreadsheet->setActiveSheetIndex(1)->setCellValue('A1', 'new worksheet');
		$spreadsheet->getActiveSheet(0)->setTitle('Product');
		
		$spreadsheet->setActiveSheetIndex(0);

		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
    }
	
	public function getDataStatusPenagihan() {
		$uid = $_POST['uid'];
		$id_penagihan_lc = $_POST['id_penagihan_lc'];
		$data = $this->lcskbdn->getDataStatusPenagihan($uid,$id_penagihan_lc);
		echo json_encode($data);
	}
	
	public function setDataStatusPenagihan() {
		$uid						= $this->input->post('uid_editttt');
		$id_penagihan_lc			= $this->input->post('id_penagihan_lc_editttt');
		$status_penagihan_edit		= $this->input->post('status_penagihan_edit2');
		$tanggal_jatuh_tempo		= $this->input->post('tanggal_jatuh_tempo_modal_edit');
		$lama_refinancing			= $this->input->post('lama_refinancing_modal_edit');
		$bunga_refinancing			= $this->input->post('bunga_refinancing_modal_edit1');
		$nilai_yang_direfinancing	= $this->input->post('nilai_yang_direfinancing_modal_edit1');
		$data = array(
						'uid'						=> $uid,
						'id_penagihan_lc'			=> $id_penagihan_lc,
						'status_penagihan_edit'		=> $status_penagihan_edit,
						'tanggal_jatuh_tempo'		=> $tanggal_jatuh_tempo,
						'lama_refinancing'			=> $lama_refinancing,
						'bunga_refinancing'			=> $bunga_refinancing,
						'nilai_yang_direfinancing'	=> $nilai_yang_direfinancing
					);
		$result = $this->lcskbdn->setDataStatusPenagihan($data);
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil ubah data <b>LC/SKBDN</b>');
			redirect('transaksi/lc#tabs-icons-text-5');
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal ubah data <b>LC/SKBDN</b>');
			redirect('transaksi/lc#tabs-icons-text-5');
		}
	}
	
	public function getDataPenagihan() {
		$uid 			= $_POST['uid'];
		$id_penagihan_lc= $_POST['id_penagihan_lc'];
		$data 			= $this->lcskbdn->getDataPenagihan($uid, $id_penagihan_lc);
		echo json_encode($data);
	}
	
	// public function getDataBarangLc() {
		// $uid 	= $_POST['uid'];
		// $data 	= $this->lcskbdn->getDataBarangLc($uid);
		// echo json_encode($data);
	// }
	
	public function getDataBarangLc() {
		$uid 			= $this->input->post('uid');
		$data 			= $this->lcskbdn->getDataBarangLc($uid);
		if (!empty($data)) {
			echo json_encode($data);
			} else {
			echo "";
		}
	}
	
	function editLcModalPenagihan() {
		$data = array();
		$id_penagihan_lc				= $this->input->post('id_penagihan_lc_modal_edit');
		$uid							= $this->input->post('uid_modal_edit');
		$nomor_surat_akseptasi_isc		= $this->input->post('no_surat_akseptasi_sc_modal');
		$tgl_surat_akseptasi			= $this->input->post('tanggal_surat_akseptasi_modal_edit');
		if($tgl_surat_akseptasi == '' or $tgl_surat_akseptasi==null ){
			$tanggal_surat_akseptasi 	= null;
		}else{
			$tanggal_surat_akseptasi 	= $this->input->post('tanggal_surat_akseptasi_modal_edit');
		}
		$tgl_disposisi_manager			= $this->input->post('tanggal_disposisi_manager_modal_edit');
		if($tgl_disposisi_manager == '' or $tgl_disposisi_manager==null ){
			$tanggal_disposisi_manager 	= null;
		}else{
			$tanggal_disposisi_manager 	= $this->input->post('tanggal_disposisi_manager_modal_edit');
		}
		$tanggal_pengajuan_akseptasi	= $this->input->post('tanggal_pengajuan_akseptasi_ke_modal_edit');
		if($tanggal_pengajuan_akseptasi == '' or $tanggal_pengajuan_akseptasi==null ){
			$tanggal_pengajuan_akseptasi_ke = null;
		}else{
			$tanggal_pengajuan_akseptasi_ke = $this->input->post('tanggal_pengajuan_akseptasi_ke_modal_edit');
		}
		$tanggal_masuk					= $this->input->post('tanggal_masuk_dokumen_modal_edit');
		if($tanggal_masuk == '' or $tanggal_masuk==null ){
			$tanggal_masuk_dokumen 		= null;
		}else{
			$tanggal_masuk_dokumen 		= $this->input->post('tanggal_masuk_dokumen_modal_edit');
		}
		$currency						= $this->input->post('currency_modal_edit');
		$nilai_tagihan					= $this->input->post('nilai_tagihan_modal_edit');
		$bunga_upas						= $this->input->post('bunga_upas_modal_edit');
		$potongan						= $this->input->post('potongan_modal_edit');
		$keterangan_potongan			= $this->input->post('keterangan_potongan_modal_edit');
		$jumlah_volume_barang_quantity	= $this->input->post('jumlah_volume_barang_quantity_modal_edit');
		$jumlah_volume_barang_satuan	= $this->input->post('jumlah_volume_barang_satuan_modal_edit');
		// $nilai_yang_diakseptasi		= $this->input->post('nilai_yang_diakseptasi_modal_edit');
		$nilai_yang_diakseptasi			= $this->input->post('nilai_yang_diakseptasi_modal_edit1');
		$tanggal_jatuh_tempo			= $this->input->post('tanggal_jatuh_tempo_modal_edit');
		$keterangan_penagihan			= $this->input->post('keterangan_penagihan_modal_edit');
		$now 							= date("Y/m/d H:i:s");
		// $status_penagihan			= $this->input->post('status_penagihan');
		// if($status_penagihan == '' or $status_penagihan=='BAYAR' or $status_penagihan==null ){
			// $tanggal_jatuh_tempo_refinancing = null;
		// }else if($status_penagihan=='REFINANCING'){
			// $tanggal_jatuh_tempo_refinancing = $this->input->post('tanggal_jatuh_tempo_refinancingsss');
		// }
		// $lc_skbdn					= $this->input->post('lc_skbdn_ubah');
		// $nomor_surat					= $this->input->post('nomor_surat_ubah');
		// $nomor_kontrak				= $this->input->post('nomor_kontrak_ubah');
		// $nomor_po					= $this->input->post('nomor_po_ubah');
		// $tahapan						= $this->input->post('tahapan_ubah');
		
		$data = array(	
						'id_penagihan_lc'					=>$id_penagihan_lc,
						'uid'								=>$uid,
						'nomor_surat_akseptasi_isc'			=>$nomor_surat_akseptasi_isc,
						'tanggal_surat_akseptasi'			=>$tanggal_surat_akseptasi,
						'tanggal_disposisi_manager'			=>$tanggal_disposisi_manager,
						'tanggal_pengajuan_akseptasi_ke'	=>$tanggal_pengajuan_akseptasi_ke,
						'tanggal_masuk_dokumen'				=>$tanggal_masuk_dokumen,
						'currency'							=>$currency,
						'nilai_tagihan'						=>$nilai_tagihan,
						'bunga_upas'						=>$bunga_upas,
						'potongan'							=>$potongan,
						'keterangan_potongan'				=>$keterangan_potongan,
						'jumlah_volume_barang_quantity'		=>$jumlah_volume_barang_quantity,
						'jumlah_volume_barang_satuan'		=>$jumlah_volume_barang_satuan,
						'nilai_yang_diakseptasi'			=>$nilai_yang_diakseptasi,
						'tanggal_jatuh_tempo'				=>$tanggal_jatuh_tempo,
						'keterangan_penagihan'				=>$keterangan_penagihan,
						'modified_by'						=>$this->session->userdata('admin_session')->nama_user,
						'modified_date'						=>$now,
						// 'status_penagihan'					=>$status_penagihan,
						// 'tanggal_jatuh_tempo_refinancing'	=>$tanggal_jatuh_tempo_refinancing,
						// 'lc_skbdn'							=>$lc_skbdn,
						// 'nomor_surat'						=>$nomor_surat,
						// 'nomor_kontrak'						=>$nomor_kontrak,
						// 'nomor_po'							=>$nomor_po,
						// 'tahapan'							=>$tahapan
					);
		$id_lc = $this->lcskbdn->getIdLC($uid);
		$this->lcskbdn->editLcPenagihanDokumen1($data);
		// $result    = $this->lcskbdn->addLcPenagihanDokumen($data);
		if($result = TRUE){
			$this->session->set_flashdata('alert', 'Berhasil ubah data <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detailPenagihan/'.$id_lc.'/'.$uid);
		} else {
			$this->session->set_flashdata('alert-error', 'Gagal ubah data <b>LC/SKBDN</b>');
			redirect('transaksi/Lc/detailPenagihan/'.$id_lc.'/'.$uid);
		}
	}
	
	function editBarangModal(){
		$data = array();
		$id_lc			= $this->input->post('id_lc_edit3');
		$uid			= $this->input->post('uid_edit3');
		$lc_skbdn		= $this->input->post('lc_atau_skbdn_edit3');
		$nomor_surat	= $this->input->post('nomor_surat_edit3');
		$nomor_po		= $this->input->post('nomor_po_edit3');
		$nomor_kontrak	= $this->input->post('nomor_kontrak_edit3');
		$now 			= date("Y/m/d H:i:s");		
		$total_barang	= $this->input->post('total_doc_kelengkapan_release_modal1'); //jumlah looping barang
		$data = array(	
						'id_lc'			=>$id_lc,
						'uid'			=>$uid,
						'lc_skbdn'		=>$lc_skbdn,
						'nomor_surat'	=>$nomor_surat,
						'nomor_po'		=>$nomor_po,
						'nomor_kontrak'	=>$nomor_kontrak,
						'created_date'	=>$now,
						'created_by'	=>$this->session->userdata('admin_session')->nama_user
					);
		$postdata   	= $this->input->post();
		// simpan detail barang	
		if($total_barang==1 or $total_barang=='1' or $total_barang > 1 or $total_barang > '1'){
			for ($index = 0; $index < $total_barang; $index++) {
				$detail['nama_barang'] 			= $postdata['nama_barang_modal_edit'. $index];
				$detail['quantity_barang'] 		= $postdata['quantity_barang_modal_edit'. $index];
				$detail['satuan_barang'] 		= $postdata['satuan_barang_modal_edit'. $index];
				$detail['tanggal_pengiriman'] 	= $postdata['tanggal_pengiriman_modal_edit'. $index];
				$detail['tolerance'] 			= $postdata['tolerance_modal_edit'. $index];
				$this->lcskbdn->addDetailBarang($data, $detail);
				echo '';
			}
		}
		$this->session->set_flashdata('alert', 'Berhasil simpan data <b>LC/SKBDN</b>');
		redirect('transaksi/Lc/detail/'.$id_lc.'/'.$uid);
	}

}