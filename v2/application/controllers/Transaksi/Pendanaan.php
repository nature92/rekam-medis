<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendanaan extends CI_Controller
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

    function index($uid = ''){

        $menu = 'pendanaan';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'pendanaan';
        
        $data['user'] = get_object_vars($this->session->userdata('admin_session'));
        $data['hak_akses'] = $this->master->getHakAkses($data['user']['id_role'], $menu);
        
        $data['jenis_pendanaan'] = $this->master->getAllData('mst_jenis_pendanaan');
        $data['pendanaan'] = $this->pendanaan->getPendanaan();
        $data['currency'] = $this->pendanaan->getCurrency();
        $data['bank'] = $this->pendanaan->getBank();

        $this->load->view('index', $data);
    }

    function detail($uid){

        $menu = 'pendanaan';
        $data = $this->globalData($menu);

        //Data Pages
        $data['pages']['page'] = 'transaksi';
        $data['pages']['menu'] = 'pendanaan';
        
        $data['user'] = get_object_vars($this->session->userdata('admin_session'));
        $data['hak_akses'] = $this->master->getHakAkses($data['user']['id_role'], $menu);
        
        $data['header_pendanaan'] = $this->pendanaan->getPendanaanHeader($uid);            
        $data['detail_pendanaan'] = $this->pendanaan->getPendanaanDetail($uid);            
        $data['total_project'] = $this->pendanaan->getJumlahPendanaan($uid);            
        $data['currency'] = $this->pendanaan->getCurrency();
        $data['bank'] = $this->pendanaan->getBank();
        $data['jenis_pendanaan'] = $this->master->getAllData('mst_jenis_pendanaan');

        $this->load->view('index', $data);
    }

    function getPendanaanDetail()
    {
        $nomor_perjanjian_kontrak = $_POST['nomor_perjanjian_kontrak'];
        $data = $this->pendanaan->getPendanaanDetail($nomor_perjanjian_kontrak);
        echo json_encode($data);
    }

    function editPendanaan()
    {
        $config['upload_path'] = 'assets/upload/trx_pendanaan/file_lampiran/';        
        $config['allowed_types'] = 'pdf';        
        $config['max_size'] = 500000;		
        $config['max_width']  = 300000;
        $config['max_height'] = 300000;
        $config['overwrite']  = true;
        // $nama_file_lampiran = $this->input->post('uid').$_FILES["berkas"]['name'];
        // $config['file_name'] = $nama_file_lampiran;

        $this->load->library('upload', $config);     

        if ($this->upload->do_upload('berkas') && !$this->input->post('berkas_edit')) 
        {
            $file   = $this->upload->data();  
            $post   = $this->input->post();        
            $data   = array(
                'nomor_perjanjian_kontrak'  => $this->input->post('nomor_perjanjian_kontrak'),
                'tanggal_perjanjian_kontrak' => $this->input->post('tanggal_perjanjian_kontrak'),
                'id_bank'       => $this->input->post('id_bank'),
                'tanggal_jatuh_tempo'     => $this->input->post('tanggal_jatuh_tempo'),
                'file'     => $file['file_name'],
                'total_row'     => $this->input->post('total_row'),        
                'uid'     => $this->input->post('uid'),        
                'updated_date'     => date("Y/m/d h:i:s"),        
                'user' => $this->session->userdata('admin_session')->nama_user
                );                        
            $this->pendanaan->deletePendanaan($this->input->post('uid'));            
            for ($i=0; $i < $data['total_row']; $i++) { 
                $detail['plafon'] = $post['plafon'. $i];
                $detail['nama_project'] = $post['nama_project'. $i];
                $detail['currency'] = $post['currency'. $i];
                $detail['nilai'] = $post['nilai'. $i];
                $detail['evidence'] = $post['evidence'. $i];
                $detail['id_project'] = $post['id_project'. $i];
                $detail['uid'] = $post['uid'];                
                $this->pendanaan->editPendanaan($data, $detail);
            }
            $this->session->set_flashdata('alert', 'Berhasil mengubah <b>Pendanaan</b>');
        } 
        else if (!$this->upload->do_upload('berkas') && $this->input->post('berkas_edit')) {
            $file   = $this->upload->data();  
            $post   = $this->input->post();        
            $data   = array(
                'nomor_perjanjian_kontrak'  => $this->input->post('nomor_perjanjian_kontrak'),
                'tanggal_perjanjian_kontrak' => $this->input->post('tanggal_perjanjian_kontrak'),
                'id_bank'       => $this->input->post('id_bank'),
                'tanggal_jatuh_tempo'     => $this->input->post('tanggal_jatuh_tempo'),
                'file'     => $this->input->post('berkas_edit'),
                'total_row'     => $this->input->post('total_row'),        
                'uid'     => $this->input->post('uid'),        
                'updated_date'     => date("Y/m/d h:i:s"),        
                'user' => $this->session->userdata('admin_session')->nama_user
            );                         
            $this->pendanaan->deletePendanaan($this->input->post('uid'));    
            for ($i=0; $i < $data['total_row']; $i++) { 
                $detail['plafon'] = $post['plafon'. $i];
                $detail['nama_project'] = $post['nama_project'. $i];
                $detail['currency'] = $post['currency'. $i];
                $detail['nilai'] = $post['nilai'. $i];
                $detail['evidence'] = $post['evidence'. $i];
                $detail['id_project'] = $post['id_project'. $i];
                $detail['uid'] = $post['uid'];

                //Set Evidence Project
                $upload['upload_path'] = 'assets/upload/trx_pendanaan/evidence/';        
                $upload['allowed_types'] = 'pdf';        
                $upload['max_size'] = 500000;		
                $upload['max_width']  = 300000;
                $upload['max_height'] = 300000;
                $upload['overwrite']  = true;            
                $this->load->library('upload', $upload,'upload_evidence');               
                
                if ($detail['evidence'] == '') {
                    if ($this->upload_evidence->do_upload('berkas_evidence' . $i)) {
                        $upload_data   = $this->upload_evidence->data();                                                   
                        $detail['evidence'] = $upload_data['file_name'];
                        $this->pendanaan->editPendanaan($data, $detail);
                    }                     
                    else {
                        $this->session->set_flashdata('alert-error', 'File Evidence Bermasalah');
                    }         
                } else {                    
                    $detail['evidence'] = $post['evidence'.$i];
                    $this->pendanaan->editPendanaan($data, $detail);                    
                }
            }
            $this->session->set_flashdata('alert', 'Berhasil mengubah <br>Pendanaan</br>');
        } 
        else {   
            $this->session->set_flashdata('alert-error', 'Gagal mengubah <b>Pendanaan</b>');
        } 
                
        redirect('/transaksi/pendanaan');
    }
    function addPendanaan()
    {   
        $config['upload_path'] = 'assets/upload/trx_pendanaan/file_lampiran/';        
        $config['allowed_types'] = 'pdf';        
        $config['max_size'] = 500000;		
        $config['max_width']  = 300000;
        $config['max_height'] = 300000;
        $config['overwrite']  = true;
        // $nama_file_lampiran = $this->input->post('uid').$_FILES["berkas"]['name'];
        // $config['file_name'] = $nama_file_lampiran;

        $this->load->library('upload', $config,'upload_lampiran');             

        if ($this->upload_lampiran->do_upload('berkas')) 
        {
            $data = $this->upload_lampiran->data();                   

            $post   = $this->input->post();        
            $jumlah = $this->input->post('total_project') ;
            $data   = array(
                        'nomor_perjanjian_kontrak'  => $this->input->post('nomor_perjanjian_kontrak'),
                        'tanggal_perjanjian_kontrak' => $this->input->post('tanggal_perjanjian_kontrak'),
                        'id_bank'       => $this->input->post('id_bank'),
                        'tanggal_jatuh_tempo'     => $this->input->post('tanggal_jatuh_tempo'),
                        'file'     => $data['file_name'],
                        'uid'     => $this->input->post('uid'),
                        'user' => $this->session->userdata('admin_session')->nama_user
                        );    
            
            for ($index = 0; $index < $jumlah; $index++) {
                $detail['plafon'] = $post['plafon'. $index];
                $detail['nama_project'] = $post['nama_project'. $index];
                $detail['currency'] = $post['currency'. $index];
                $detail['nilai'] = $post['nilai'. $index];
                $detail['id_project'] = $post['id_project_uid'. $index];
                $this->pendanaan->addPendanaan($data, $detail);                                      
                
                //Set Evidence Project
                $upload['upload_path'] = 'assets/upload/trx_pendanaan/evidence/';        
                $upload['allowed_types'] = 'pdf';        
                $upload['max_size'] = 500000;		
                $upload['max_width']  = 300000;
                $upload['max_height'] = 300000;
                $upload['overwrite']  = true;    
                // $nama_evidence = $detail['id_project'].$_FILES["evidence".$index]['name'];
                // $upload['file_name'] = $nama_evidence;    
                // echo $nama_evidence; 
                
                $this->load->library('upload', $upload,'upload_evidence');     
                
                if ($this->upload_evidence->do_upload('evidence' . $index)) 
                {                    
                    $upload_data   = $this->upload_evidence->data();                   
                    $post    = $this->input->post();        
                    $jumlahs = $this->input->post('total_project') ;
                    $this->pendanaan->setEvidence($upload_data['file_name'], $detail['id_project']); 
                } 
                else {
                    $this->session->set_flashdata('alert-error', 'Gagal menambah <b>Pendanaan</b>');
                }
            }            
            $this->session->set_flashdata('alert', 'Berhasil menambah <b>Pendanaan</b>');
        } else {
            $this->session->set_flashdata('alert-error', 'File Pendanaan Bermasalah');
        } 
        redirect('/transaksi/pendanaan');       
    }    
}
