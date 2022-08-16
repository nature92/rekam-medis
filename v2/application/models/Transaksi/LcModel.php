<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LcModel extends CI_Model
{
    function __construct()
    {
        $this->load->database();
		
		// Access Model Lain
        // $CI = &get_instance();
        // $this->CI = $CI;
        // $this->CI->load->model('master');
    }
	
	function getLc(){
        $data_lc = $this->db->query("SELECT *,
											CASE WHEN tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN tahapan != 'ALL' THEN tahapan
												END desk_tahapan,
											CASE WHEN status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan
									FROM trx_lc 
									where status_penerbitan!='DL'
									ORDER BY id_lc DESC ")->result_array();
        return $data_lc;
    }
	
	function getPendanaan()
    {
        return $this->db->query("SELECT
                                    dana.uid,
                                    dana.nomor_perjanjian_kontrak,
                                    dana.tanggal_perjanjian_kontrak,
                                    dana.tanggal_jatuh_tempo,
                                    mb.nama_bank AS id_bank,
                                    dana.file 
                                FROM
                                    trx_pendanaan dana
                                    LEFT JOIN mst_bank mb ON mb.id_bank = dana.id_bank 
                                GROUP BY
                                    dana.uid,
                                    dana.nomor_perjanjian_kontrak,
                                    dana.tanggal_perjanjian_kontrak,
                                    dana.tanggal_jatuh_tempo,
                                    dana.id_bank,
                                    dana.file,
                                    mb.nama_bank
                                    ")->result_array();
    
    }
	
	function getExportLc(){
        // $data_lc = $this->db->query("SELECT *,
											// CASE WHEN tahapan = 'ALL' THEN 'SEKALIGUS'
												 // WHEN tahapan != 'ALL' THEN tahapan
												// END desk_tahapan,
											// CASE WHEN status_penerbitan = 'CR' THEN 'MENUNGGU'
												 // WHEN status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 // WHEN status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 // WHEN status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 // WHEN status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 // WHEN status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 // WHEN status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 // WHEN status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												// END desk_status_penerbitan
									// FROM trx_lc 
									// where status_penerbitan!='DL'
									// ORDER BY id_lc DESC")->result();
        // return $data_lc;
		$data_lc = $this->db->query("SELECT trx_lc.id_lc,trx_lc.lc_skbdn,trx_lc.nomor_surat,trx_lc.tanggal_surat_ajuan_isc,trx_lc.tanggal_sjan,trx_lc.nama_unit,trx_lc.vendor,trx_lc.alamat_vendor,trx_lc.swasta_atau_bumn,trx_lc.mata_uang,trx_lc.nilai_kurs,trx_lc.nominal_kontrak,trx_lc.ppn_10_persen,trx_lc.pph22,trx_lc.pph23,trx_lc.pph_4_2,trx_lc.nilai_lc_atau_skbdn,trx_lc.keterangan_atau_alasan_belum_release,trx_lc.swift_number,trx_lc.advising_bank,trx_lc.account_no,trx_lc.kode_proyek,trx_lc.nama_proyek,trx_lc.nomor_kontrak_jual_so,trx_lc.nilai,trx_lc.produk_yang_dijual,trx_lc.customer,
											CASE WHEN trx_lc.tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN trx_lc.tahapan != 'ALL' THEN tahapan
												END desk_tahapan,
											CASE WHEN trx_lc.status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN trx_lc.status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN trx_lc.status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN trx_lc.status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN trx_lc.status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN trx_lc.status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN trx_lc.status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN trx_lc.status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan,
												min(trx_lc_detail_barang.id_barang_lc) as id_barang_lc,
												min(trx_lc_detail_barang.nama_barang) as nama_barang,
												min(trx_lc_detail_barang.quantity) as quantity,
												min(trx_lc_detail_barang.satuan) as satuan
									FROM trx_lc 
									INNER JOIN trx_lc_detail_barang on trx_lc.uid = trx_lc_detail_barang.uid
									where status_penerbitan!='DL'
									group by trx_lc.id_lc,trx_lc.lc_skbdn,trx_lc.nomor_surat,trx_lc.tanggal_surat_ajuan_isc,trx_lc.tanggal_sjan,trx_lc.nama_unit,trx_lc.vendor,trx_lc.alamat_vendor,trx_lc.swasta_atau_bumn,trx_lc.mata_uang,trx_lc.nilai_kurs,trx_lc.nominal_kontrak,trx_lc.ppn_10_persen,trx_lc.pph22,trx_lc.pph23,trx_lc.pph_4_2,trx_lc.nilai_lc_atau_skbdn,trx_lc.keterangan_atau_alasan_belum_release,trx_lc.swift_number,trx_lc.advising_bank,trx_lc.account_no,trx_lc.kode_proyek,trx_lc.nama_proyek,trx_lc.nomor_kontrak_jual_so,trx_lc.nilai,trx_lc.produk_yang_dijual,trx_lc.customer,trx_lc.tahapan,trx_lc.status_penerbitan
									ORDER BY trx_lc.id_lc,id_barang_lc ASC
									")->result();
        return $data_lc;
    }
	
	function getExportBarangLc(){
        $data_barang = $this->db->query("SELECT *, quantity as jumlah, satuan as persatuan FROM trx_lc_detail_barang ORDER BY lc_skbdn, nomor_surat ASC")->result();
        return $data_barang;
    }
	
	function getLcSkbdnMonitoring(){
		$now = date("Y-m-d");
		$sartdate = date('Y-m-d', strtotime($now . ' -0 day'));
		$stopdate = date('Y-m-d', strtotime($now . ' +7 day'));
        $data_lc = $this->db->query("SELECT trx_lc.uid,trx_lc_detail_penagihan.status_penagihan,trx_lc.lc_skbdn,trx_lc.nomor_kontrak_jual_so,trx_lc.no_lc_skbdn,trx_lc.nomor_po,
										trx_lc.nama_unit,trx_lc.vendor,trx_lc_detail_penagihan.currency as mata_uang,trx_lc_detail_penagihan.nilai_tagihan,
										trx_lc_detail_penagihan.bunga_upas,trx_lc_detail_penagihan.potongan,trx_lc_detail_penagihan.nilai_yang_diakseptasi,
										trx_lc_detail_penagihan.tanggal_jatuh_tempo,trx_lc.tenor_hari,trx_lc.keterangan_tenor,trx_lc.nilai_lc_atau_skbdn,trx_lc.issuing_bank,
											CASE WHEN trx_lc.tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN trx_lc.tahapan != 'ALL' THEN trx_lc.tahapan
												END desk_tahapan,
											CASE WHEN trx_lc.status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN trx_lc.status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN trx_lc.status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN trx_lc.status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN trx_lc.status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN trx_lc.status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN trx_lc.status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN trx_lc.status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan,
											CASE WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo between '$sartdate' and '$stopdate' then 'red'
												 WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo > '$sartdate' then 'green'
												 WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo < '$stopdate' then 'green'
												END tanggal_jatuh_tempo_warna,
											trx_lc.tanggal_lc_skbdn
									FROM trx_lc
									right join trx_lc_detail_penagihan on trx_lc_detail_penagihan.uid = trx_lc.uid
									where trx_lc_detail_penagihan.status_penagihan = 'BAYAR'
									ORDER BY trx_lc.id_lc DESC")->result();
        return $data_lc;
    }
	
	function getLcSkbdnMonitoringRefinancing(){
		$now = date("Y-m-d");
		$sartdate = date('Y-m-d', strtotime($now . ' -0 day'));
		$stopdate = date('Y-m-d', strtotime($now . ' +7 day'));
        $data_lc = $this->db->query("SELECT trx_lc.uid,trx_lc_detail_penagihan.status_penagihan,trx_lc.lc_skbdn,trx_lc.nomor_kontrak_jual_so,trx_lc.no_lc_skbdn,trx_lc.nomor_po,
										trx_lc.nama_unit,trx_lc.vendor,trx_lc_detail_penagihan.currency as mata_uang,trx_lc_detail_penagihan.nilai_tagihan,
										trx_lc_detail_penagihan.bunga_upas,trx_lc_detail_penagihan.potongan,trx_lc_detail_penagihan.nilai_yang_diakseptasi,
										trx_lc_detail_penagihan.tanggal_jatuh_tempo,trx_lc.tenor_hari,trx_lc.keterangan_tenor,trx_lc.nilai_lc_atau_skbdn,trx_lc.issuing_bank,
											CASE WHEN trx_lc.tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN trx_lc.tahapan != 'ALL' THEN trx_lc.tahapan
												END desk_tahapan,
											CASE WHEN trx_lc.status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN trx_lc.status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN trx_lc.status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN trx_lc.status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN trx_lc.status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN trx_lc.status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN trx_lc.status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN trx_lc.status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan,
											CASE WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo between '$sartdate' and '$stopdate' then 'red'
												 WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo > '$sartdate' then 'green'
												 WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo < '$stopdate' then 'green'
												END tanggal_jatuh_tempo_warna,
											trx_lc.tanggal_lc_skbdn
									FROM trx_lc
									right join trx_lc_detail_penagihan on trx_lc_detail_penagihan.uid = trx_lc.uid
									where trx_lc_detail_penagihan.status_penagihan = 'REFINANCING'
									ORDER BY trx_lc.id_lc DESC")->result();
        return $data_lc;
    }
	
	function getLcPengajuanBank(){
        $data_lc = $this->db->query("SELECT *,
											CASE WHEN tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN tahapan != 'ALL' THEN tahapan
												END desk_tahapan,
											CASE WHEN status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN status_penerbitan = 'RL' THEN 'PROSES RELEASE'
												 WHEN status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan
									FROM trx_lc 
									WHERE status_penerbitan='AJ' or status_penerbitan='AJTERBIT' or status_penerbitan='AJKOREKSI'
									ORDER BY id_lc DESC")->result_array();;
        return $data_lc;
    }
    
    function getCurrency() {
        return $this->db->query("SELECT * FROM mst_currency   ")->result();
    }	
	
	function simpanDataLc($data){
		if($data['lc_skbdn']=='LC' or $data['lc_skbdn']=='LC_PMN'){
			$data = array(
						'uid' 									=> $data['uid'],
						'lc_skbdn' 								=> $data['lc_skbdn'],
						'tahapan' 								=> $data['tahapan'],
						'nomor_surat' 							=> $data['nomor_surat'],						
						'tanggal_surat_ajuan_isc' 				=> $data['tanggal_surat_ajuan_isc'],
						'nomor_po' 								=> $data['nomor_po'],
						'nominal_pembukaan' 					=> $data['nominal_pembukaan'],
						'nomor_kontrak' 						=> $data['nomor_kontrak'],
						'tanggal_sjan' 							=> $data['tanggal_sjan'],
						'divisi' 								=> $data['divisi'],
						'vendor' 								=> $data['nama_vendor'],
						'id_vendor' 							=> $data['id_vendor'],
						'alamat_vendor' 						=> $data['alamat_vendor'],
						'mata_uang' 							=> $data['mata_uang'],
						'nilai_kurs' 							=> $data['nilai_kurs'],
						'nominal_kontrak' 						=> $data['nominal_kontrak'],
						'prosentase_ppn' 						=> 0,
						'ppn_10_persen' 						=> 0,
						'pph22' 								=> 0,
						'pph23'	 								=> 0,
						'pph_4_2' 								=> 0,
						'swasta_atau_bumn' 						=> $data['swasta_atau_bumn'],
						'nilai_lc_atau_skbdn' 					=> $data['nilai_lc_atau_skbdn'],
						'masa_berlaku_jamlak' 					=> $data['masa_berlaku_jamlak'],
						'surat_konfirmasi_keabsahan_bank_garansi' 				=> $data['surat_konfirmasi_keabsahan_bank_garansi'],
						// 'berkas_surat_konfirmasi_keabsahan_bank_garansi' 	=> $data['berkas_surat_konfirmasi_keabsahan_bank_garansi'],
						'keabsahan_bank_garansi' 				=> $data['keabsahan_bank_garansi'],
						'nomor_surat_keabsahan' 				=> $data['no_surat_keabsahan'],
						'tanggal_surat_keabsahan' 				=> $data['tanggal_surat_keabsahan'],
						'keterangan_atau_alasan_belum_release' 	=> $data['keterangan_atau_alasan_belum_release'],
						'swift_number' 							=> $data['swift_number'],
						'advising_bank' 						=> $data['advising_bank'],
						'alamat_bank' 							=> $data['alamat_bank'],
						'account_no' 							=> $data['account_no'],
						'waktu_pengiriman_barang' 				=> $data['waktu_pengiriman_barang'],
						'kode_proyek' 							=> $data['kode_proyek'],
						'nama_proyek' 							=> $data['nama_proyek'],
						'nomor_kontrak_jual_so' 				=> $data['nomor_kontrak_jual_so'],
						'nilai' 								=> $data['nilai'],
						'produk_yang_dijual' 					=> $data['produk_yang_dijual'],
						'customer' 								=> $data['customer'],
						'status_penerbitan' 					=> $data['status_penerbitan'],
						'status_transaksi_lc_skbdn' 			=> 'CR',
						'created_by' 							=> $data['created_by'],
						'created_date' 							=> $data['created_date'],
						'nama_unit' 							=> $data['nama_divisi'],
					);
		}else{
			$data = array(
						'uid' 									=> $data['uid'],
						'lc_skbdn' 								=> $data['lc_skbdn'],
						'tahapan' 								=> $data['tahapan'],
						'nomor_surat' 							=> $data['nomor_surat'],						
						'tanggal_surat_ajuan_isc' 				=> $data['tanggal_surat_ajuan_isc'],
						'nomor_po' 								=> $data['nomor_po'],
						'nominal_pembukaan' 					=> $data['nominal_pembukaan'],
						'nomor_kontrak' 						=> $data['nomor_kontrak'],
						'tanggal_sjan' 							=> $data['tanggal_sjan'],
						'divisi' 								=> $data['divisi'],
						'vendor' 								=> $data['nama_vendor'],
						'id_vendor' 							=> $data['id_vendor'],
						'alamat_vendor' 						=> $data['alamat_vendor'],
						'mata_uang' 							=> $data['mata_uang'],
						'nilai_kurs' 							=> $data['nilai_kurs'],
						'nominal_kontrak' 						=> $data['nominal_kontrak'],
						'prosentase_ppn' 						=> $data['prosentase_ppn'],
						'ppn_10_persen' 						=> $data['ppn_10_persen'],
						'pph22' 								=> $data['pph_22'],
						'pph23'	 								=> $data['pph_23'],
						'pph_4_2' 								=> $data['pph_4_2'],
						'swasta_atau_bumn' 						=> $data['swasta_atau_bumn'],
						'nilai_lc_atau_skbdn' 					=> $data['nilai_lc_atau_skbdn'],
						'masa_berlaku_jamlak' 					=> $data['masa_berlaku_jamlak'],
						'surat_konfirmasi_keabsahan_bank_garansi' 				=> $data['surat_konfirmasi_keabsahan_bank_garansi'],
						// 'berkas_surat_konfirmasi_keabsahan_bank_garansi' 	=> $data['berkas_surat_konfirmasi_keabsahan_bank_garansi'],
						'keabsahan_bank_garansi' 				=> $data['keabsahan_bank_garansi'],
						'nomor_surat_keabsahan' 				=> $data['no_surat_keabsahan'],
						'tanggal_surat_keabsahan' 				=> $data['tanggal_surat_keabsahan'],
						'keterangan_atau_alasan_belum_release' 	=> $data['keterangan_atau_alasan_belum_release'],
						'swift_number' 							=> $data['swift_number'],
						'advising_bank' 						=> $data['advising_bank'],
						'alamat_bank' 							=> $data['alamat_bank'],
						'account_no' 							=> $data['account_no'],
						'waktu_pengiriman_barang' 				=> $data['waktu_pengiriman_barang'],
						'kode_proyek' 							=> $data['kode_proyek'],
						'nama_proyek' 							=> $data['nama_proyek'],
						'nomor_kontrak_jual_so' 				=> $data['nomor_kontrak_jual_so'],
						'nilai' 								=> $data['nilai'],
						'produk_yang_dijual' 					=> $data['produk_yang_dijual'],
						'customer' 								=> $data['customer'],
						'status_penerbitan' 					=> $data['status_penerbitan'],
						'status_transaksi_lc_skbdn' 			=> 'CR',
						'created_by' 							=> $data['created_by'],
						'created_date' 							=> $data['created_date'],
						'nama_unit' 							=> $data['nama_divisi'],
					);
		}
        		
        $this->db->insert('trx_lc', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	// public function simpanDataLc($data)
    // {
        // $sql = $this->db->query(
            // "INSERT INTO trx_lc (lc_skbdn, tahapan, nomor_surat, tanggal_surat_ajuan_isc, nomor_po, nomor_kontrak, tanggal_sjan, divisi, vendor, alamat_vendor, mata_uang, nilai_kurs, nominal_kontrak,
									// ppn_10_persen, pph_22, pph_23, pph_4_2, swasta_atau_bumn, nilai_lc_atau_skbdn, masa_berlaku_jamlak, surat_konfirmasi_keabsahan_bank_garansi, berkas_surat_konfirmasi_keabsahan_bank_garansi,
									// keabsahan_bank_garansi, no_surat_keabsahan, tanggal_surat_keabsahan, keterangan_atau_alasan_belum_release, swift_number, advising_bank, account_no, waktu_pengiriman_barang, 
									// kode_proyek, nama_proyek, nomor_kontrak_jual_so, nilai, produk_yang_dijual, customer, status_penerbitan, created_by, created_date)
						 // VALUES ('" . $data['lc_skbdn'] . "', '" . $data['tahapan'] . "', '" . $data['nomor_surat'] . "', '" . $data['tanggal_surat_ajuan_isc'] . "', '" . $data['nomor_po'] . "', '" . $data['nomor_kontrak'] . "', '" . $data['tanggal_sjan'] . "', 
								 // '" . $data['divisi'] . "','" . $data['vendor'] . "','" . $data['alamat_vendor'] . "','" . $data['mata_uang'] . "','" . $data['nilai_kurs'] . "','" . $data['nominal_kontrak'] . "',
								 // '" . $data['ppn_10_persen'] . "','" . $data['pph_22'] . "','" . $data['pph_23'] . "','" . $data['pph_4_2'] . "','" . $data['swasta_atau_bumn'] . "','" . $data['nilai_lc_atau_skbdn'] . "' ,
								 // '" . $data['masa_berlaku_jamlak'] . "','" . $data['surat_konfirmasi_keabsahan_bank_garansi'] . "','" . $data['berkas_surat_konfirmasi_keabsahan_bank_garansi'] . "','" . $data['keabsahan_bank_garansi'] . "',
								 // '" . $data['no_surat_keabsahan'] . "','" . $data['tanggal_surat_keabsahan'] . "','" . $data['keterangan_atau_alasan_belum_release'] . "','" . $data['swift_number'] . "','" . $data['advising_bank'] . "',
								 // '" . $data['account_no'] . "','" . $data['waktu_pengiriman_barang'] . "','" . $data['kode_proyek'] . "','" . $data['nama_proyek'] . "','" . $data['nomor_kontrak_jual_so'] . "','" . $data['nilai'] . "',
								 // '" . $data['produk_yang_dijual'] . "','" . $data['customer'] . "','" . $data['status_penerbitan'] . "','" . $data['created_by'] . "','" . $data['created_date'] . "'  )"
        // );
        // if ($this->db->affected_rows() > 0) {
            // $result = TRUE;
        // } else {
            // $result = FALSE;
        // }
        // return $result;
    // }
	
	function addDetailBarang($data, $detail){
		$str =$detail['quantity_barang'];
		$quantity = str_replace('.', '', $str);
		$quantity1 = str_replace('.', '', $quantity);
		$quantity2 = str_replace('.', '', $quantity1);
		$quantity3 = str_replace('.', '', $quantity2);
		
		$str2 =$detail['satuan_barang'];
		$satuan = str_replace('.', '', $str2); 
		$satuan1 = str_replace('.', '', $satuan); 
		$satuan2 = str_replace('.', '', $satuan1); 
		$satuan3 = str_replace('.', '', $satuan2); 
        $data = array(
						'uid' 				=> $data['uid'],
						'lc_skbdn' 			=> $data['lc_skbdn'],
						'nomor_surat' 		=> $data['nomor_surat'],
						'nomor_po' 			=> $data['nomor_po'],
						'nomor_kontrak' 	=> $data['nomor_kontrak'],
						'nama_barang' 		=> $detail['nama_barang'],
						'tanggal_pengiriman'=> $detail['tanggal_pengiriman'],
						'tolerance_barang' 	=> $detail['tolerance'],
						'quantity' 			=> $quantity3,
						'satuan' 			=> $satuan3,
						'created_date' 		=> date("Y/m/d h:i:s"),
						'created_by' 		=> $data['created_by']        
					);
        $this->db->insert('trx_lc_detail_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function addDetailAdditionalCost($data, $detail){
		if($detail['nilai'] == '' or $detail['nilai'] == null){
			$n1 = 0;
		}else{
			$n1 = $detail['nilai'];
		}
		$n =$n1;
		$ni = str_replace('.', '', $n);
		$nil = str_replace('.', '', $ni);
		$nila = str_replace('.', '', $nil);
		$nilai = str_replace('.', '', $nila);
        $data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_surat' 	=> $data['nomor_surat'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'additional_cost' 	=> $detail['additional_cost'],
						'nilai' 		=> $nilai,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['created_by']        
					);
        $this->db->insert('trx_lc_additional_cost', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function addDetailBarangEdit($data, $detail){
		$str = $detail['quantity_barang'];
		$quantity = str_replace(',', '', $str);
		$quantity1 = str_replace(',', '', $quantity);
		$quantity2 = str_replace(',', '', $quantity1);
		$quantity3 = str_replace(',', '', $quantity2);
		
		$str2 = $detail['satuan_barang'];
		$satuan = str_replace(',', '', $str2); 
		$satuan1 = str_replace(',', '', $satuan); 
		$satuan2 = str_replace(',', '', $satuan1); 
		$satuan3 = str_replace(',', '', $satuan2); 
        $data = array(
						'uid' 				=> $data['uid'],
						'lc_skbdn' 			=> $data['lc_skbdn'],
						'nomor_surat' 		=> $data['nomor_surat'],
						'nomor_po' 			=> $data['nomor_po'],
						'nomor_kontrak' 	=> $data['nomor_kontrak'],
						'nama_barang' 		=> $detail['nama_barang'],
						'tanggal_pengiriman'=> $detail['tanggal_pengiriman'],
						'tolerance_barang' 	=> $detail['tolerance_barang'],
						'quantity' 			=> $quantity3,
						'satuan' 			=> $satuan3,
						'created_date' 		=> date("Y/m/d h:i:s"),
						'created_by' 		=> $data['created_by']        
					);
        $this->db->insert('trx_lc_detail_barang', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function addDetailAdditionalCostEdit($data, $detail){
		$n = $detail['nilai'];
		$ni = str_replace(',', '', $n);
		$nil = str_replace(',', '', $ni);
		$nila = str_replace(',', '', $nil);
		$nilai = str_replace(',', '', $nila);
        $data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_surat' 	=> $data['nomor_surat'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'additional_cost' 	=> $detail['additional_cost'],
						'nilai' 		=> $nilai,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['created_by']        
					);
        $this->db->insert('trx_lc_additional_cost', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function addDetailKelengkapanDokumenPoAsli($data, $index){
		if($index==0 or $index=='0'){
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_surat' 	=> $data['nomor_surat'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_dokumen' => 'PO_ASLI',
						'dokumen_lc' 	=> 'po_asli_'.$data['uid'].'_'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['created_by']       
					);
		}else{
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_surat' 	=> $data['nomor_surat'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_dokumen' => 'PO_ASLI',
						'dokumen_lc' 	=> 'po_asli_'.$data['uid'].'_0'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['created_by']       
					);
		}
        $this->db->insert('trx_lc_detail_dokumen', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function setEvidencePoAsli($evidence, $data)
    {   
        return $this->db->query("UPDATE trx_lc_detail_dokumen
                                    SET dokumen_lc = '" . $evidence . "'                                     
                                    WHERE lc_skbdn = '" . $data['lc_skbdn'] . "' and nomor_surat = '" . $data['nomor_surat'] . "' and nomor_po = '" . $data['nomor_po'] . "'
										  and nomor_kontrak = '" . $data['nomor_kontrak'] . "'
                                ");        
    }
	
	function addDetailKelengkapanDokumenJamlakAsli($data, $index){
		if($index==0 or $index=='0'){
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_surat' 	=> $data['nomor_surat'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_dokumen' => 'JAMLAK_ASLI',
						'dokumen_lc' 	=> 'jamlak_asli_'.$data['uid'].'_'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['created_by']       
					);
		}else{
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_surat' 	=> $data['nomor_surat'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_dokumen' => 'JAMLAK_ASLI',
						// 'dokumen_lc' 	=> $detail['dok_kelengkapan_jamlak_asli'],
						// 'dokumen_lc' 	=> 'jamlak_asli'.$detail['dok_kelengkapan_jamlak_asli'].'_'.$data['uid'].'_'.$index,
						'dokumen_lc' 	=> 'jamlak_asli_'.$data['uid'].'_0'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['created_by']        
					);
		}
        $this->db->insert('trx_lc_detail_dokumen', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function addDetailKelengkapanDokumenKontrakAsli($data, $index){
		if($index==0 or $index=='0'){
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_surat' 	=> $data['nomor_surat'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_dokumen' => 'KONTRAK_ASLI',
						'dokumen_lc' 	=> 'kontrak_asli_'.$data['uid'].'_'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['created_by']       
					);
		}else{
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_surat' 	=> $data['nomor_surat'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_dokumen' => 'KONTRAK_ASLI',
						// 'dokumen_lc' 	=> $detail['dok_kelengkapan_kontrak_asli'],
						'dokumen_lc' 	=> 'kontrak_asli_'.$data['uid'].'_0'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['created_by']        
					);
		}
        $this->db->insert('trx_lc_detail_dokumen', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function addDetailKelengkapanDokumenKontrakJualSo($data, $index) 
    {
		if($index==0 or $index=='0'){
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_surat' 	=> $data['nomor_surat'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_kontrak_jual' 	=> 'KONTRAK_JUAL_SO',
						'dokumen_kontrak_jual_lc' 			=> 'kontrak_jual_so_'.$data['uid'].'_'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['created_by']       
					);
		}else{
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_surat' 	=> $data['nomor_surat'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_kontrak_jual'=> 'KONTRAK_JUAL_SO',
						'dokumen_kontrak_jual_lc' 		=> 'kontrak_jual_so_'.$data['uid'].'_0'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['created_by']        
					);
		}
        $this->db->insert('trx_lc_detail_dokumen_kontrak_jual', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function getTotalLC()
    {
        //Get Total SCF
        $data_total_scf = $this->db->query("SELECT SUM(nominal_bukti_kas) as nominal_bukti_kas, SUM(biaya_scf_vendor) as biaya_scf_vendor,
                                            SUM(biaya_scf_pindad) as biaya_scf_pindad, SUM(tenor) as tenor
											FROM trx_scf ")->row();
        $data_untuk_biaya_scf = $this->db->query("SELECT tenor, nominal_bukti_kas FROM trx_scf ")->result();

        $total_biaya_scf = 0;
        foreach ($data_untuk_biaya_scf as $data) {
            $total_biaya_scf += ($data->tenor / 360) * ((85 / 1000) * $data->nominal_bukti_kas);
        }

        $total_scf = [
						[
							"nama" => "Nominal Bukti Kas",
							"nilai" => $data_total_scf->nominal_bukti_kas,
							"format" => "Currency",
						],
						[
							"nama" => "Biaya SCF Vendor",
							"nilai" => $data_total_scf->biaya_scf_vendor,
							"format" => "Currency",
						],
						[
							"nama" => "Biaya SCF Pindad",
							"nilai" => $data_total_scf->biaya_scf_pindad,
							"format" => "Currency",
						],
						[
							"nama" => "Total Biaya SCF",
							"nilai" => $total_biaya_scf,
							"format" => "Currency",
						],
						[
							"nama" => "Total Nominal Bukti Kas + Biaya SCF Ditanggung Pindad",
							"nilai" => $total_biaya_scf + $data_total_scf->nominal_bukti_kas,
							"format" => "Currency",
						],
					];

        return $total_scf;
    }
	
	function getDetailLC($id){
        $data_lc = $this->db->query("SELECT * FROM trx_lc WHERE uid = ?", [$id])->result();
        return $data_lc;
    }
	
	function getLcHeader($id_lc, $uid){
        return $this->db->query("	SELECT * FROM trx_lc WHERE id_lc = '".$id_lc."' and uid = '".$uid."'	")->result();    
    }
	
	function getJumlahBarang($uid){
        return $this->db->query("SELECT * FROM trx_lc_detail_barang WHERE uid = '".$uid."'  ")->result();
    }
	
	function getJumlahAdditionalCost($uid){
        return $this->db->query("SELECT * FROM trx_lc_additional_cost WHERE uid = '".$uid."'  ")->result();
    }
	
	function addDetailKonfirmasiKeabsahanDokumenBankGaransi($data) 
    {
		$data = array(
					'uid' 			=> $data['uid'],
					'lc_skbdn' 		=> $data['lc_skbdn'],
					'nomor_surat' 	=> $data['nomor_surat'],
					'nomor_po' 		=> $data['nomor_po'],
					'nomor_kontrak' => $data['nomor_kontrak'],
					'jenis_kelengkapan_dokumen'=> 'KONFIRMASI_KEABSAHAN_BANK_GARANSI',
					'dokumen_lc' 	=> 'konfirmasi_keabsahan_bank_garansi_'.$data['uid'],
					'created_date' 	=> date("Y/m/d h:i:s"),
					'created_by' 	=> $data['created_by']        
				);
        $this->db->insert('trx_lc_detail_dokumen', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function addDetailKeabsahanDokumenBankGaransi($data) 
    {
		$data = array(
					'uid' 			=> $data['uid'],
					'lc_skbdn' 		=> $data['lc_skbdn'],
					'nomor_surat' 	=> $data['nomor_surat'],
					'nomor_po' 		=> $data['nomor_po'],
					'nomor_kontrak' => $data['nomor_kontrak'],
					'jenis_kelengkapan_dokumen'=> 'KEABSAHAN_BANK_GARANSI',
					'dokumen_lc' 	=> 'keabsahan_bank_garansi_'.$data['uid'],
					'created_date' 	=> date("Y/m/d h:i:s"),
					'created_by' 	=> $data['created_by']        
				);
        $this->db->insert('trx_lc_detail_dokumen', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function getBarangDetail($uid){
        return $this->db->query("SELECT * FROM trx_lc_detail_barang WHERE uid = '".$uid."'  ")->result();
    }
	
	function getAdditionalCostDetail($uid){
        return $this->db->query("SELECT * FROM trx_lc_additional_cost WHERE uid = '".$uid."'  ")->result();
    }
	
	function getPoAsliDetail($uid){
        return $this->db->query("SELECT * FROM trx_lc_detail_dokumen WHERE jenis_kelengkapan_dokumen='PO_ASLI' and uid = '".$uid."'  ")->result();
    }
	
	function getJamlakAsliDetail($uid){
        return $this->db->query("SELECT * FROM trx_lc_detail_dokumen WHERE jenis_kelengkapan_dokumen='JAMLAK_ASLI' and uid = '".$uid."'  ")->result();
    }
	
	function getKontrakAsliDetail($uid){
        return $this->db->query("SELECT * FROM trx_lc_detail_dokumen WHERE jenis_kelengkapan_dokumen='KONTRAK_ASLI' and uid = '".$uid."'  ")->result();
    }
	
	function getKonfirmKeabsahanBGDetail($uid){
        return $this->db->query("SELECT * FROM trx_lc_detail_dokumen WHERE jenis_kelengkapan_dokumen='KONFIRMASI_KEABSAHAN_BANK_GARANSI' and uid = '".$uid."'  ")->result();
    }
	
	function getKeabsahanBGDetail($uid){
        return $this->db->query("SELECT * FROM trx_lc_detail_dokumen WHERE jenis_kelengkapan_dokumen='KEABSAHAN_BANK_GARANSI' and uid = '".$uid."'  ")->result();
    }
	
	function getKontrakJualSoDetail($uid){
        return $this->db->query("SELECT * FROM trx_lc_detail_dokumen_kontrak_jual WHERE jenis_kelengkapan_kontrak_jual='KONTRAK_JUAL_SO' and uid = '".$uid."'  ")->result();
    }
	
	function simpanEditDataLc($data){
		if($data['nilai_kurs'] == '' or $data['nilai_kurs'] == null){
			$nilai_kurs = 0;
		}else{
			$nilai_kurs = $data['nilai_kurs'];
		}
		
		if($data['nominal_pembukaan'] == '' or $data['nominal_pembukaan'] == null){
			$nominal_pembukaan = 0;
		}else{
			$nominal_pembukaan = $data['nominal_pembukaan'];
		}
		
		$nom = $nominal_pembukaan;
		$nominal = str_replace(',', '', $nom);
		$pembukaan = str_replace(',', '', $nominal);
		$nom_pembukaan = str_replace(',', '', $pembukaan);
		$nominal_pembukaan = str_replace(',', '', $nom_pembukaan);
		
		$kurs = $nilai_kurs;
		$kurs1 = str_replace(',', '', $kurs);
		$kurs2 = str_replace(',', '', $kurs1);
		$kurs3 = str_replace(',', '', $kurs2);
		$nilai_kurs1 = str_replace(',', '', $kurs3);
		
		if($data['nominal_kontrak'] == '' or $data['nominal_kontrak'] == null){
			$nominal_kontrak = 0;
		}else{
			$nominal_kontrak = $data['nominal_kontrak'];
		}
		$nomor = $nominal_kontrak;
		$nomor1 = str_replace(',', '', $nomor);
		$nomor2 = str_replace(',', '', $nomor1);
		$nomor3 = str_replace(',', '', $nomor2);
		$nominal_kontrak = str_replace(',', '', $nomor3);
		
		if($data['prosentase_ppn'] == '' or $data['prosentase_ppn'] == null){
			$prosentase_ppn = 0;
		}else{
			$prosentase_ppn = $data['prosentase_ppn'];
		}
		
		if($data['ppn_10_persen'] == '' or $data['ppn_10_persen'] == null){
			$ppn_10_persen1 = 0;
		}else{
			$ppn_10_persen1 = $data['ppn_10_persen'];
		}
		$ppn_10 = $ppn_10_persen1;
		$ppn_101 = str_replace(',', '', $ppn_10);
		$ppn_102 = str_replace(',', '', $ppn_101);
		$ppn_103 = str_replace(',', '', $ppn_102);
		$ppn_10_persen = str_replace(',', '', $ppn_103);
		
		if($data['pph_22'] == '' or $data['pph_22'] == null){
			$pph_221 = 0;
		}else{
			$pph_221 = $data['pph_22'];
		}
		$pph = $pph_221;
		$pph1 = str_replace(',', '', $pph);
		$pph2 = str_replace(',', '', $pph1);
		$pph3 = str_replace(',', '', $pph2);
		$pph_22 = str_replace(',', '', $pph3);
		
		if($data['pph_23'] == '' or $data['pph_23'] == null){
			$pph_231 = 0;
		}else{
			$pph_231 = $data['pph_23'];
		}
		$pph23 = $pph_231;
		$pph231 = str_replace(',', '', $pph23);
		$pph232 = str_replace(',', '', $pph231);
		$pph233 = str_replace(',', '', $pph232);
		$pph_23 = str_replace(',', '', $pph233);
		
		if($data['pph_4_2'] == '' or $data['pph_4_2'] == null){
			$pph_4_21 = 0;
		}else{
			$pph_4_21 = $data['pph_4_2'];
		}
		$pph_4 = $pph_4_21;
		$pph_41 = str_replace(',', '', $pph_4);
		$pph_42 = str_replace(',', '', $pph_41);
		$pph_43 = str_replace(',', '', $pph_42);
		$pph_4_2 = str_replace(',', '', $pph_43);
		
		if($data['nilai_lc_atau_skbdn'] == '' or $data['nilai_lc_atau_skbdn'] == null){
			$nilai_lc_atau_skbdn1 = 0;
		}else{
			$nilai_lc_atau_skbdn1 = $data['nilai_lc_atau_skbdn'];
		}
		$nilai_lc = $nilai_lc_atau_skbdn1;
		$nilai_lc_atau = str_replace(',', '', $nilai_lc);
		$nilai_lc_atau_ = str_replace(',', '', $nilai_lc_atau);
		$nilai_lc_atau_l = str_replace(',', '', $nilai_lc_atau_);
		$nilai_lc_atau_skbdn = str_replace(',', '', $nilai_lc_atau_l);
		
		if($data['nilai'] == '' or $data['nilai'] == null){
			$nilai1 = 0;
		}else{
			$nilai1 = $data['nilai'];
		}
		$nilai1 = $nilai1;
		$nilai2 = str_replace(',', '', $nilai1);
		$nilai3 = str_replace(',', '', $nilai2);
		$nilai4 = str_replace(',', '', $nilai3);
		$nilai = str_replace(',', '', $nilai4);
		
		IF($data['status_penerbitan'] == 'X'){
			$data = array(
						'uid' 									=> $data['uid'],
						'lc_skbdn' 								=> $data['lc_skbdn'],
						'tahapan' 								=> $data['tahapan'],
						'nomor_surat' 							=> $data['nomor_surat'],
						'tanggal_surat_ajuan_isc' 				=> $data['tanggal_surat_ajuan_isc'],
						'nomor_po' 								=> $data['nomor_po'],
						'nominal_pembukaan' 					=> $nominal_pembukaan,
						'nomor_kontrak' 						=> $data['nomor_kontrak'],
						'tanggal_sjan' 							=> $data['tanggal_sjan'],
						'divisi' 								=> $data['divisi'],
						'vendor' 								=> $data['vendor'],
						'alamat_vendor' 						=> $data['alamat_vendor'],
						'mata_uang' 							=> $data['mata_uang'],
						'nilai_kurs' 							=> $nilai_kurs1,
						'nominal_kontrak' 						=> $nominal_kontrak,
						'prosentase_ppn' 						=> $prosentase_ppn,
						'ppn_10_persen' 						=> $ppn_10_persen,
						'pph22' 								=> $pph_22,
						'pph23'	 								=> $pph_23,
						'pph_4_2' 								=> $pph_4_2,
						'swasta_atau_bumn' 						=> $data['swasta_atau_bumn'],
						'nilai_lc_atau_skbdn' 					=> $nilai_lc_atau_skbdn,
						'masa_berlaku_jamlak' 					=> $data['masa_berlaku_jamlak'],
						'surat_konfirmasi_keabsahan_bank_garansi' 	=> $data['surat_konfirmasi_keabsahan_bank_garansi'],
						'keabsahan_bank_garansi' 				=> $data['keabsahan_bank_garansi'],
						'nomor_surat_keabsahan' 				=> $data['no_surat_keabsahan'],
						'tanggal_surat_keabsahan' 				=> $data['tanggal_surat_keabsahan'],
						'keterangan_atau_alasan_belum_release' 	=> $data['keterangan_atau_alasan_belum_release'],
						'swift_number' 							=> $data['swift_number'],
						'advising_bank' 						=> $data['advising_bank'],
						'account_no' 							=> $data['account_no'],
						'waktu_pengiriman_barang' 				=> $data['waktu_pengiriman_barang'],
						'kode_proyek' 							=> $data['kode_proyek'],
						'nama_proyek' 							=> $data['nama_proyek'],
						'nomor_kontrak_jual_so' 				=> $data['nomor_kontrak_jual_so'],
						'nilai' 								=> $nilai,
						'produk_yang_dijual' 					=> $data['produk_yang_dijual'],
						'customer' 								=> $data['customer'],
						// 'status_penerbitan' 					=> $data['status_penerbitan'],
						// 'status_transaksi_lc_skbdn' 			=> $data['status_penerbitan'],
						// 'status_transaksi_lc_skbdn' 			=> 'AJ',
						'modified_by' 							=> $data['created_by'],
						'modified_date' 						=> $data['created_date'],
					);	
		}else{
			$data = array(
						'uid' 									=> $data['uid'],
						'lc_skbdn' 								=> $data['lc_skbdn'],
						'tahapan' 								=> $data['tahapan'],
						'nomor_surat' 							=> $data['nomor_surat'],
						'tanggal_surat_ajuan_isc' 				=> $data['tanggal_surat_ajuan_isc'],
						'nomor_po' 								=> $data['nomor_po'],
						'nominal_pembukaan' 					=> $nominal_pembukaan,
						'nomor_kontrak' 						=> $data['nomor_kontrak'],
						'tanggal_sjan' 							=> $data['tanggal_sjan'],
						'divisi' 								=> $data['divisi'],
						'vendor' 								=> $data['vendor'],
						'alamat_vendor' 						=> $data['alamat_vendor'],
						'mata_uang' 							=> $data['mata_uang'],
						'nilai_kurs' 							=> $nilai_kurs1,
						'nominal_kontrak' 						=> $nominal_kontrak,
						'prosentase_ppn' 						=> $prosentase_ppn,
						'ppn_10_persen' 						=> $ppn_10_persen,
						'pph22' 								=> $pph_22,
						'pph23'	 								=> $pph_23,
						'pph_4_2' 								=> $pph_4_2,
						'swasta_atau_bumn' 						=> $data['swasta_atau_bumn'],
						'nilai_lc_atau_skbdn' 					=> $nilai_lc_atau_skbdn,
						'masa_berlaku_jamlak' 					=> $data['masa_berlaku_jamlak'],
						'surat_konfirmasi_keabsahan_bank_garansi' 	=> $data['surat_konfirmasi_keabsahan_bank_garansi'],
						'keabsahan_bank_garansi' 				=> $data['keabsahan_bank_garansi'],
						'nomor_surat_keabsahan' 				=> $data['no_surat_keabsahan'],
						'tanggal_surat_keabsahan' 				=> $data['tanggal_surat_keabsahan'],
						'keterangan_atau_alasan_belum_release' 	=> $data['keterangan_atau_alasan_belum_release'],
						'swift_number' 							=> $data['swift_number'],
						'advising_bank' 						=> $data['advising_bank'],
						'account_no' 							=> $data['account_no'],
						'waktu_pengiriman_barang' 				=> $data['waktu_pengiriman_barang'],
						'kode_proyek' 							=> $data['kode_proyek'],
						'nama_proyek' 							=> $data['nama_proyek'],
						'nomor_kontrak_jual_so' 				=> $data['nomor_kontrak_jual_so'],
						'nilai' 								=> $nilai,
						'produk_yang_dijual' 					=> $data['produk_yang_dijual'],
						'customer' 								=> $data['customer'],
						'status_penerbitan' 					=> $data['status_penerbitan'],
						'status_transaksi_lc_skbdn' 			=> $data['status_penerbitan'],
						'modified_by' 							=> $data['created_by'],
						'modified_date' 						=> $data['created_date'],
					);
			}
        $this->db->where('uid', $data['uid']);
		$this->db->update('trx_lc', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	public function delDetailBarang($data){
        $data = array(
            'uid' => $data['uid']
        );
        $this->db->where('uid', $data['uid']);
        $this->db->delete('trx_lc_detail_barang');
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	public function delDetailAdditionalCost($data){
        $data = array(
            'uid' => $data['uid']
        );
        $this->db->where('uid', $data['uid']);
        $this->db->delete('trx_lc_additional_cost');
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	public function delDetailKelengkapanDokumenPoAsli($data){
        $data = array(
            'uid' => $data['uid']
        );
        $this->db->where('uid', $data['uid']);
        $this->db->where('jenis_kelengkapan_dokumen', 'PO_ASLI');
        $this->db->delete('trx_lc_detail_dokumen');
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	public function delDetailKelengkapanDokumenJamlakAsli($data){
        $data = array(
            'uid' => $data['uid']
        );
        $this->db->where('uid', $data['uid']);
        $this->db->where('jenis_kelengkapan_dokumen', 'JAMLAK_ASLI');
        $this->db->delete('trx_lc_detail_dokumen');
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	public function delDetailKelengkapanDokumenKontrakAsli($data){
        $data = array(
            'uid' => $data['uid']
        );
        $this->db->where('uid', $data['uid']);
        $this->db->where('jenis_kelengkapan_dokumen', 'KONTRAK_ASLI');
        $this->db->delete('trx_lc_detail_dokumen');
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	public function delDetailKelengkapanDokumenKontrakJualSo($data){
        $data = array(
            'uid' => $data['uid']
        );
        $this->db->where('uid', $data['uid']);
        $this->db->where('jenis_kelengkapan_kontrak_jual', 'KONTRAK_JUAL_SO');
        $this->db->delete('trx_lc_detail_dokumen_kontrak_jual');
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	public function delDetailKonfirmasiKeabsahanDokumenBankGaransi($data){
        $data = array(
            'uid' => $data['uid']
        );
        $this->db->where('uid', $data['uid']);
        $this->db->where('jenis_kelengkapan_dokumen', 'KONFIRMASI_KEABSAHAN_BANK_GARANSI');
        $this->db->delete('trx_lc_detail_dokumen');
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	public function delDetailKeabsahanDokumenBankGaransi($data){
        $data = array(
            'uid' => $data['uid']
        );
        $this->db->where('uid', $data['uid']);
        $this->db->where('jenis_kelengkapan_dokumen', 'KEABSAHAN_BANK_GARANSI');
        $this->db->delete('trx_lc_detail_dokumen');
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	public function hapusLcSkbdn($uid){
        $user = $this->session->userdata('admin_session')->nama_user;
		$now  = date("Y/m/d H:i:s");
        return $sql = $this->db->query( "	UPDATE trx_lc SET status_penerbitan='DL', status_transaksi_lc_skbdn='DL', 
													modified_date='" . $now . "', modified_by='" . $user . "'
												WHERE uid='" . $uid . "'
										");
    }
	
	function getLcReleaseDokumen(){
		$now = date("Y-m-d");
		$sartdate = date('Y-m-d', strtotime($now . ' -0 day'));
		$stopdate = date('Y-m-d', strtotime($now . ' +7 day'));
        $data_lc = $this->db->query("SELECT *,
											CASE WHEN tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN tahapan != 'ALL' THEN tahapan
												END desk_tahapan,
											CASE WHEN status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan,
											--CASE WHEN masa_berlaku_jamlak < '$stopdate' THEN 'green'
											--	 WHEN masa_berlaku_jamlak >= '$stopdate' THEN 'red'
											--	END masa_berlaku_jamlak_warna,
											CASE WHEN masa_berlaku_jamlak between '$sartdate' and '$stopdate' then 'red'
												 WHEN masa_berlaku_jamlak > '$sartdate' then 'green'
												 WHEN masa_berlaku_jamlak < '$stopdate' then 'green'
												END masa_berlaku_jamlak_warna,
											--CASE WHEN waktu_pengiriman_barang < '$stopdate' THEN 'green'
											--	 WHEN waktu_pengiriman_barang >= '$stopdate' THEN 'red'
											--	END waktu_pengiriman_barang_warna
											CASE WHEN waktu_pengiriman_barang between '$sartdate' and '$stopdate' then 'red'
												 WHEN waktu_pengiriman_barang > '$sartdate' then 'green'
												 WHEN waktu_pengiriman_barang < '$stopdate' then 'green'
												END waktu_pengiriman_barang_warna
									FROM trx_lc 
									WHERE status_penerbitan='RL'
									ORDER BY id_lc DESC")->result_array();
        return $data_lc;
    }
	
	function getLcJatuhTempo(){
		$now = date("Y-m-d");
		$stopdate = date('Y-m-d', strtotime($now . ' -1 day'));
        $data_lc = $this->db->query("SELECT *,
											CASE WHEN tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN tahapan != 'ALL' THEN tahapan
												END desk_tahapan,
											CASE WHEN status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan,
											CASE WHEN tanggal_jatuh_tempo < '$stopdate' THEN 'green'
												 WHEN tanggal_jatuh_tempo >= '$stopdate' THEN 'red'
												END tanggal_jatuh_tempo_warna
									FROM trx_lc 
									WHERE status_penerbitan='LC'
									ORDER BY id_lc DESC")->result_array();
        return $data_lc;
    }
	
	// function getLcSkbdnMonitoringJatuhTempo(){
		// $now = date("Y-m-d");
		// $sartdate = date('Y-m-d', strtotime($now . ' -0 day'));
		// $stopdate = date('Y-m-d', strtotime($now . ' +7 day'));
        // $data_lc = $this->db->query("SELECT *,
											// CASE WHEN tahapan = 'ALL' THEN 'SEKALIGUS'
												 // WHEN tahapan != 'ALL' THEN tahapan
												// END desk_tahapan,
											// CASE WHEN status_penerbitan = 'CR' THEN 'MENUNGGU'
												 // WHEN status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 // WHEN status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 // WHEN status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 // WHEN status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 // WHEN status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 // WHEN status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 // WHEN status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												// END desk_status_penerbitan,
											// --CASE WHEN tanggal_jatuh_tempo < '$stopdate' THEN 'success'
											// --	 WHEN tanggal_jatuh_tempo >= '$stopdate' THEN 'danger'
											// --	END tanggal_jatuh_tempo_warna,
											// CASE WHEN tanggal_jatuh_tempo between '$sartdate' and '$stopdate' then 'danger'
												 // WHEN tanggal_jatuh_tempo > '$sartdate' then 'success'
												 // WHEN tanggal_jatuh_tempo < '$stopdate' then 'success'
												// END tanggal_jatuh_tempo_warna
									// FROM trx_lc
									// ORDER BY id_lc DESC")->result_array();
        // return $data_lc;
    // }
	
	function getLcSkbdnMonitoringJatuhTempo(){
		$now = date("Y-m-d");
		$sartdate = date('Y-m-d', strtotime($now . ' -0 day'));
		$stopdate = date('Y-m-d', strtotime($now . ' +7 day'));
        $data_lc = $this->db->query("SELECT trx_lc_detail_penagihan.uid,trx_lc_detail_penagihan.status_penagihan,trx_lc.lc_skbdn,trx_lc.nomor_kontrak_jual_so,trx_lc.no_lc_skbdn,trx_lc.nomor_po,
										trx_lc.nama_unit,trx_lc.vendor,trx_lc_detail_penagihan.currency as mata_uang,trx_lc_detail_penagihan.nilai_tagihan,
										trx_lc_detail_penagihan.bunga_upas,trx_lc_detail_penagihan.potongan,trx_lc_detail_penagihan.nilai_yang_diakseptasi,
										trx_lc_detail_penagihan.tanggal_jatuh_tempo,trx_lc.tenor_hari,trx_lc.keterangan_tenor,trx_lc.nilai_lc_atau_skbdn,trx_lc_detail_penagihan.id_penagihan_lc,trx_lc.issuing_bank,
											CASE WHEN trx_lc.tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN trx_lc.tahapan != 'ALL' THEN trx_lc.tahapan
												END desk_tahapan,
											CASE WHEN trx_lc.status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN trx_lc.status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN trx_lc.status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN trx_lc.status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN trx_lc.status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN trx_lc.status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN trx_lc.status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN trx_lc.status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan,
											CASE WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo between '$sartdate' and '$stopdate' then 'danger'
												 WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo > '$sartdate' then 'success'
												 WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo < '$stopdate' then 'success'
												END tanggal_jatuh_tempo_warna,
											trx_lc.tanggal_lc_skbdn
									FROM trx_lc
									right join trx_lc_detail_penagihan on trx_lc_detail_penagihan.uid = trx_lc.uid
									where trx_lc_detail_penagihan.status_penagihan = 'BAYAR'
									ORDER BY trx_lc.id_lc DESC")->result_array();
        return $data_lc;
    }
	
	function getLcSkbdnMonitoringJatuhTempoRefinancing(){
		$now = date("Y-m-d");
		$sartdate = date('Y-m-d', strtotime($now . ' -0 day'));
		$stopdate = date('Y-m-d', strtotime($now . ' +7 day'));
        $data_lc = $this->db->query("SELECT trx_lc.uid,trx_lc_detail_penagihan.status_penagihan,trx_lc.lc_skbdn,trx_lc.nomor_kontrak_jual_so,trx_lc.no_lc_skbdn,trx_lc.nomor_po,
										trx_lc.nama_unit,trx_lc.vendor,trx_lc_detail_penagihan.currency as mata_uang,trx_lc_detail_penagihan.nilai_tagihan,
										trx_lc_detail_penagihan.bunga_upas,trx_lc_detail_penagihan.potongan,trx_lc_detail_penagihan.nilai_yang_diakseptasi,
										trx_lc_detail_penagihan.tanggal_jatuh_tempo,trx_lc.tenor_hari,trx_lc.keterangan_tenor,trx_lc.nilai_lc_atau_skbdn,trx_lc.issuing_bank,
											CASE WHEN trx_lc.tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN trx_lc.tahapan != 'ALL' THEN trx_lc.tahapan
												END desk_tahapan,
											CASE WHEN trx_lc.status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN trx_lc.status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN trx_lc.status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN trx_lc.status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN trx_lc.status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN trx_lc.status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN trx_lc.status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN trx_lc.status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan,
											CASE WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo between '$sartdate' and '$stopdate' then 'danger'
												 WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo > '$sartdate' then 'success'
												 WHEN trx_lc_detail_penagihan.tanggal_jatuh_tempo < '$stopdate' then 'success'
												END tanggal_jatuh_tempo_warna,
											trx_lc_detail_penagihan.lama_refinancing, trx_lc_detail_penagihan.bunga_refinancing, trx_lc_detail_penagihan.nilai_yang_direfinancing
									FROM trx_lc
									right join trx_lc_detail_penagihan on trx_lc_detail_penagihan.uid = trx_lc.uid
									where trx_lc_detail_penagihan.status_penagihan = 'REFINANCING'
									ORDER BY trx_lc.id_lc DESC")->result_array();
        return $data_lc;
    }
	
	function getLcSkbdnSummary(){
		$now = date("Y-m-d");
		$stopdate = date('Y-m-d', strtotime($now . ' -1 day'));
        $data_lc = $this->db->query("SELECT *,
											CASE WHEN tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN tahapan != 'ALL' THEN tahapan
												END desk_tahapan,
											CASE WHEN status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan,
											CASE WHEN tanggal_jatuh_tempo < '$stopdate' THEN 'green'
												 WHEN tanggal_jatuh_tempo >= '$stopdate' THEN 'red'
												END tanggal_jatuh_tempo_warna
									FROM trx_lc
									ORDER BY id_lc DESC")->result_array();
        return $data_lc;
    }
	
	function getLcSkbdnSummary1($uid){
		$now = date("Y-m-d");
		$stopdate = date('Y-m-d', strtotime($now . ' -1 day'));
        $data_lc = $this->db->query("SELECT *,
											CASE WHEN tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN tahapan != 'ALL' THEN tahapan
												END desk_tahapan,
											CASE WHEN status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan,
											CASE WHEN tanggal_jatuh_tempo < '$stopdate' THEN 'green'
												 WHEN tanggal_jatuh_tempo >= '$stopdate' THEN 'red'
												END tanggal_jatuh_tempo_warna
									FROM trx_lc
									where uid='".$uid."'
									ORDER BY id_lc DESC")->result();
        return $data_lc;
    }
	
	function editLcPenerbitan($data){
        $data = array(
						'uid' 									=> $data['uid'],
						'no_surat_pengajuan_aplikasi' 			=> $data['no_surat_pengajuan_aplikasi'],
						'tanggal_surat_pengajuan_aplikasi' 		=> $data['tanggal_surat_pengajuan_aplikasi'],
						'issuing_bank' 							=> $data['issuing_bank'],
						'keterangan' 							=> $data['keterangan'],
						'status_penerbitan' 					=> $data['status_penerbitan'],
						'status_transaksi_lc_skbdn' 			=> $data['status_penerbitan'],
						'modified_by' 							=> $data['modified_by'],
						'modified_date' 						=> $data['modified_date'],
					);		
        $this->db->where('uid', $data['uid']);
		$this->db->update('trx_lc', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function addDetailKelengkapanPenerbitanDraft($data, $index) 
    {
		if($index==0 or $index=='0'){
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_dokumen' => 'PENERBITAN_DRAFT',
						'dokumen_lc' 	=> 'penerbitan_draft_'.$data['uid'].'_'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['modified_by']       
					);
		}else{
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_dokumen' => 'PENERBITAN_DRAFT',
						'dokumen_lc' 	=> 'penerbitan_draft_'.$data['uid'].'_0'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['modified_by']       
					);
		}
        $this->db->insert('trx_lc_detail_dokumen', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function getDataDetailBarang($uid) {
        $sql = $this->db->query(" select * from trx_lc_detail_barang where uid='".$uid."' ");
		return $sql->result();
    }
	
	function editLcReleaseDokumen($data){
        $data = array(
						'uid' 						=> $data['uid'],
						'no_lc_skbdn' 				=> $data['no_lc_skbdn'],
						'tanggal_lc_skbdn' 			=> $data['tanggal_lc_skbdn'],
						'tanggal_exp_lc_skbdn' 		=> $data['tanggal_exp_lc_skbdn'],
						'tenor_hari' 				=> $data['tenor_hari'],
						'keterangan_tenor' 			=> $data['keterangan_tenor'],
						'status_penerbitan' 		=> $data['status_penerbitan'],
						'status_transaksi_lc_skbdn' => $data['status_penerbitan'],
						'modified_by' 				=> $data['modified_by'],
						'modified_date' 			=> $data['modified_date'],
					);		
        $this->db->where('uid', $data['uid']);
		$this->db->update('trx_lc', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function addDetailReleaseDokumenDraft($data, $index){
		if($index==0 or $index=='0'){
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_dokumen' => 'RELEASE_DOKUMEN',
						'dokumen_lc' 	=> 'release_dokumen_'.$data['uid'].'_'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['modified_by']       
					);
		}else{
			$data = array(
						'uid' 			=> $data['uid'],
						'lc_skbdn' 		=> $data['lc_skbdn'],
						'nomor_po' 		=> $data['nomor_po'],
						'nomor_kontrak' => $data['nomor_kontrak'],
						'jenis_kelengkapan_dokumen' => 'RELEASE_DOKUMEN',
						'dokumen_lc' 	=> 'release_dokumen_'.$data['uid'].'_0'.$index,
						'created_date' 	=> date("Y/m/d h:i:s"),
						'created_by' 	=> $data['modified_by']       
					);
		}
        $this->db->insert('trx_lc_detail_dokumen', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
            } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function getDataDetailUploadPenerbitan($uid) {
       $sql = $this->db->query(" select * from trx_lc_detail_dokumen where uid='".$uid."' and jenis_kelengkapan_dokumen='PENERBITAN_DRAFT' ");								
		$num = $sql->num_rows();
		if($num>0){
			return $query->row();
		} else {
			return 0;
		}
	}
	
	function getLcHeaderPenerbitan($uid){
        $data_lc = $this->db->query("SELECT *,
											CASE WHEN tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN tahapan != 'ALL' THEN tahapan
												END desk_tahapan,
											CASE WHEN status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan
									FROM trx_lc 
									where uid = '".$uid."' and (status_penerbitan='AJ' or status_penerbitan='AJTERBIT' or status_penerbitan='AJKOREKSI' or status_penerbitan='RL')
									ORDER BY id_lc DESC ")->result();
        return $data_lc;
    }
	
	function getPenerbitanDetail($uid){
        return $this->db->query("SELECT * FROM trx_lc_detail_dokumen WHERE jenis_kelengkapan_dokumen='PENERBITAN_DRAFT' and uid = '".$uid."'  ")->result();
    }
	
	public function delDetailKelengkapanDokumenPenerbitan($data){
        $data = array(
            'uid' => $data['uid']
        );
        $this->db->where('uid', $data['uid']);
        $this->db->where('jenis_kelengkapan_dokumen', 'PENERBITAN_DRAFT');
        $this->db->delete('trx_lc_detail_dokumen');
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function getLcHeaderRelease($uid){
        $data_lc = $this->db->query("SELECT *,
											CASE WHEN tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN tahapan != 'ALL' THEN tahapan
												END desk_tahapan,
											CASE WHEN status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan
									FROM trx_lc 
									where uid = '".$uid."' and (status_penerbitan='RL' or status_penerbitan='LC')
									ORDER BY id_lc DESC ")->result();
        return $data_lc;
    }
	
	public function delDetailReleaseDokumen($data){
        $data = array(
            'uid' => $data['uid']
        );
        $this->db->where('uid', $data['uid']);
        $this->db->where('jenis_kelengkapan_dokumen', 'RELEASE_DOKUMEN');
        $this->db->delete('trx_lc_detail_dokumen');
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function getReleaseDokDetail($uid){
        return $this->db->query("SELECT * FROM trx_lc_detail_dokumen WHERE jenis_kelengkapan_dokumen='RELEASE_DOKUMEN' and uid = '".$uid."'  ")->result();
    }
	
	function getLcHeaderPenagihan($uid){
        $data_lc = $this->db->query("SELECT *,
											CASE WHEN tahapan = 'ALL' THEN 'SEKALIGUS'
												 WHEN tahapan != 'ALL' THEN tahapan
												END desk_tahapan,
											CASE WHEN status_penerbitan = 'CR' THEN 'MENUNGGU'
												 WHEN status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
												 WHEN status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
												 WHEN status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
												 WHEN status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
												 WHEN status_penerbitan = 'LC' THEN 'JATUH TEMPO'
												 WHEN status_penerbitan = 'BAYAR' THEN 'BAYAR'
												 WHEN status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan
									FROM trx_lc 
									where uid = '".$uid."' and status_penerbitan='LC'
									ORDER BY id_lc DESC ")->result();
        return $data_lc;
    }
	
	function editLcPenagihanDokumen($data){
		$tagih = $data['nilai_tagihan'];
		$tagihan = str_replace(',', '', $tagih);
		$nilai_tagih = str_replace(',', '', $tagihan);
		$nilai_tagiha = str_replace(',', '', $nilai_tagih);
		$nilai_tagihan = str_replace(',', '', $nilai_tagiha);
		
		$up = $data['bunga_upas'];
		$upas = str_replace(',', '', $up);
		$bunga = str_replace(',', '', $upas);
		$bunga_up = str_replace(',', '', $bunga);
		$bunga_upas = str_replace(',', '', $bunga_up);
		
		$po = $data['potongan'];
		$pot = str_replace(',', '', $po);
		$potong = str_replace(',', '', $pot);
		$potonga = str_replace(',', '', $potong);
		$potongan = str_replace(',', '', $potonga);
		
		$nilai_akseptasi = $data['nilai_yang_diakseptasi'];
		$diakseptasi = str_replace(',', '', $nilai_akseptasi);
		$nilai_diakseptasi = str_replace(',', '', $diakseptasi);
		$nilai_yg_diakseptasi = str_replace(',', '', $nilai_diakseptasi);
		$nilai_yang_diakseptasi = str_replace(',', '', $nilai_yg_diakseptasi);
		
        $data = array(
						'uid' 							=> $data['uid'],
						'nomor_surat_akseptasi_isc' 	=> $data['nomor_surat_akseptasi_isc'],
						'tanggal_surat_akseptasi' 		=> $data['tanggal_surat_akseptasi'],
						'tanggal_disposisi_manager' 	=> $data['tanggal_disposisi_manager'],
						'tanggal_pengajuan_akseptasi_ke'=> $data['tanggal_pengajuan_akseptasi_ke'],
						'tanggal_masuk_dokumen' 		=> $data['tanggal_masuk_dokumen'],
						'currency' 						=> $data['currency'],
						'nilai_tagihan' 				=> $nilai_tagihan,
						'bunga_upas' 					=> $bunga_upas,
						'potongan' 						=> $potongan,
						'keterangan_potongan' 			=> $data['keterangan_potongan'],
						'jumlah_volume_barang_quantity' => $data['jumlah_volume_barang_quantity'],
						'jumlah_volume_barang_satuan' 	=> $data['jumlah_volume_barang_satuan'],
						'nilai_yang_diakseptasi' 		=> $nilai_yang_diakseptasi,
						'tanggal_jatuh_tempo' 			=> $data['tanggal_jatuh_tempo'],
						'keterangan_penagihan' 			=> $data['keterangan_penagihan'],
						'status_penagihan' 				=> $data['status_penagihan'],
						'created_by' 					=> $data['modified_by'],
						'modified_date' 				=> $data['modified_date'],
						'lc_skbdn' 						=> $data['lc_skbdn'],
						'nomor_surat' 					=> $data['nomor_surat'],
						'nomor_kontrak' 				=> $data['nomor_kontrak'],
						'nomor_po' 						=> $data['nomor_po'],
						'tahapan' 						=> $data['tahapan'],
					);
        $this->db->where('uid', $data['uid']);
		$this->db->update('trx_lc', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
		// $this->db->insert('trx_lc_detail_penagihan', $data);
        // if ($this->db->affected_rows() > 0) {
            // $result = TRUE;
        // } else {
            // $result = FALSE;
        // }
        // return $result;
    }
	
	function editLcPenagihanDokumen1($data){
		$tagih = $data['nilai_tagihan'];
		$tagihan = str_replace(',', '', $tagih);
		$nilai_tagih = str_replace(',', '', $tagihan);
		$nilai_tagiha = str_replace(',', '', $nilai_tagih);
		$nilai_tagihan = str_replace(',', '', $nilai_tagiha);
		
		$up = $data['bunga_upas'];
		$upas = str_replace(',', '', $up);
		$bunga = str_replace(',', '', $upas);
		$bunga_up = str_replace(',', '', $bunga);
		$bunga_upas = str_replace(',', '', $bunga_up);
		
		$po = $data['potongan'];
		$pot = str_replace(',', '', $po);
		$potong = str_replace(',', '', $pot);
		$potonga = str_replace(',', '', $potong);
		$potongan = str_replace(',', '', $potonga);
		
		$nilai_akseptasi = $data['nilai_yang_diakseptasi'];
		$diakseptasi = str_replace(',', '', $nilai_akseptasi);
		$nilai_diakseptasi = str_replace(',', '', $diakseptasi);
		$nilai_yg_diakseptasi = str_replace(',', '', $nilai_diakseptasi);
		$nilai_yang_diakseptasi = str_replace(',', '', $nilai_yg_diakseptasi);
		
        $data = array(
						'id_penagihan_lc' 				=> $data['id_penagihan_lc'],
						'uid' 							=> $data['uid'],
						'nomor_surat_akseptasi_isc' 	=> $data['nomor_surat_akseptasi_isc'],
						'tanggal_surat_akseptasi' 		=> $data['tanggal_surat_akseptasi'],
						'tanggal_disposisi_manager' 	=> $data['tanggal_disposisi_manager'],
						'tanggal_pengajuan_akseptasi_ke'=> $data['tanggal_pengajuan_akseptasi_ke'],
						'tanggal_masuk_dokumen' 		=> $data['tanggal_masuk_dokumen'],
						'currency' 						=> $data['currency'],
						'nilai_tagihan' 				=> $nilai_tagihan,
						'bunga_upas' 					=> $bunga_upas,
						'potongan' 						=> $potongan,
						'keterangan_potongan' 			=> $data['keterangan_potongan'],
						'jumlah_volume_barang_quantity' => $data['jumlah_volume_barang_quantity'],
						'jumlah_volume_barang_satuan' 	=> $data['jumlah_volume_barang_satuan'],
						'nilai_yang_diakseptasi' 		=> $nilai_yang_diakseptasi,
						'tanggal_jatuh_tempo' 			=> $data['tanggal_jatuh_tempo'],
						'keterangan_penagihan' 			=> $data['keterangan_penagihan'],
						'modified_by' 					=> $data['modified_by'],
						'modified_date' 				=> $data['modified_date'],
						// 'status_penagihan' 			=> $data['status_penagihan'],
						// 'lc_skbdn' 					=> $data['lc_skbdn'],
						// 'nomor_surat' 				=> $data['nomor_surat'],
						// 'nomor_kontrak' 				=> $data['nomor_kontrak'],
						// 'nomor_po' 					=> $data['nomor_po'],
						// 'tahapan' 					=> $data['tahapan'],
					);
        $this->db->where('id_penagihan_lc', $data['id_penagihan_lc']);
        $this->db->where('uid', $data['uid']);
		$this->db->update('trx_lc_detail_penagihan', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
		// $this->db->insert('trx_lc_detail_penagihan', $data);
        // if ($this->db->affected_rows() > 0) {
            // $result = TRUE;
        // } else {
            // $result = FALSE;
        // }
        // return $result;
    }
	
	function addLcPenagihanDokumen($data){
		$tagih = $data['nilai_tagihan'];
		$tagihan = str_replace('.', '', $tagih);
		$nilai_tagih = str_replace('.', '', $tagihan);
		$nilai_tagiha = str_replace('.', '', $nilai_tagih);
		$nilai_tagihan = str_replace('.', '', $nilai_tagiha);
		
		$up = $data['bunga_upas'];
		$upas = str_replace('.', '', $up);
		$bunga = str_replace('.', '', $upas);
		$bunga_up = str_replace('.', '', $bunga);
		$bunga_upas = str_replace('.', '', $bunga_up);
		
		$po = $data['potongan'];
		$pot = str_replace('.', '', $po);
		$potong = str_replace('.', '', $pot);
		$potonga = str_replace('.', '', $potong);
		$potongan = str_replace('.', '', $potonga);
		
		$nilai_akseptasi = $data['nilai_yang_diakseptasi'];
		$diakseptasi = str_replace(',', '', $nilai_akseptasi);
		$nilai_diakseptasi = str_replace(',', '', $diakseptasi);
		$nilai_yg_diakseptasi = str_replace(',', '', $nilai_diakseptasi);
		$nilai_yang_diakseptasi = str_replace(',', '', $nilai_yg_diakseptasi);
		
        $data = array(
						'uid' 							=> $data['uid'],
						'nomor_surat_akseptasi_isc' 	=> $data['nomor_surat_akseptasi_isc'],
						'tanggal_surat_akseptasi' 		=> $data['tanggal_surat_akseptasi'],
						'tanggal_disposisi_manager' 	=> $data['tanggal_disposisi_manager'],
						'tanggal_pengajuan_akseptasi_ke'=> $data['tanggal_pengajuan_akseptasi_ke'],
						'tanggal_masuk_dokumen' 		=> $data['tanggal_masuk_dokumen'],
						'currency' 						=> $data['currency'],
						'nilai_tagihan' 				=> $nilai_tagihan,
						'bunga_upas' 					=> $bunga_upas,
						'potongan' 						=> $potongan,
						'keterangan_potongan' 			=> $data['keterangan_potongan'],
						'penagihan_barang' 				=> $data['penagihan_barang'],
						'jumlah_volume_barang_quantity' => $data['jumlah_volume_barang_quantity'],
						'jumlah_volume_barang_satuan' 	=> $data['jumlah_volume_barang_satuan'],
						'nilai_yang_diakseptasi' 		=> $nilai_yang_diakseptasi,
						'tanggal_jatuh_tempo' 			=> $data['tanggal_jatuh_tempo'],
						'keterangan_penagihan' 			=> $data['keterangan_penagihan'],
						'status_penagihan' 				=> $data['status_penagihan'],
						'tanggal_jatuh_tempo_refinancing' 	=> $data['tanggal_jatuh_tempo_refinancing'],
						'created_by' 					=> $data['modified_by'],
						'created_date' 					=> $data['modified_date'],
						'lc_skbdn' 						=> $data['lc_skbdn'],
						'nomor_surat' 					=> $data['nomor_surat'],
						'nomor_kontrak' 				=> $data['nomor_kontrak'],
						'nomor_po' 						=> $data['nomor_po'],
						'tahapan' 						=> $data['tahapan'],
					);
        // $this->db->where('uid', $data['uid']);
		// $this->db->update('trx_lc', $data);
        // if ($this->db->affected_rows() > 0) {
            // $result = TRUE;
        // } else {
            // $result = FALSE;
        // }
        // return $result;
		$this->db->insert('trx_lc_detail_penagihan', $data);
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function getLcPenagihan($uid){
        $data_lc = $this->db->query("SELECT *
									FROM trx_lc_detail_penagihan
									WHERE uid='".$uid."' ")->result_array();
        return $data_lc;
    }
	
	public function getTotalNilaiDiakseptasi($uid) {
        $sql = $this->db->query( " select sum(nilai_yang_diakseptasi) as nilai_yang_diakseptasi from trx_lc_detail_penagihan where uid='".$uid."' and status_penagihan='BAYAR' ");
        $obj = $sql->row_object();
        $num = $sql->num_rows();
        if ($num > 0) {
            return $obj->nilai_yang_diakseptasi;
        } else {
            return '';
        }
    }
	
	public function getJumlahDokPOAsli($uid) {
        $sql = $this->db->query( " SELECT count(lc_skbdn) as lc_skbdn FROM trx_lc_detail_dokumen WHERE uid='".$uid."' and jenis_kelengkapan_dokumen='PO_ASLI'  ");
        $obj = $sql->row_object();
        $num = $sql->num_rows();
        if ($num > 0) {
            return $obj->lc_skbdn;
        } else {
            return '';
        }
    }
	
	public function getJumlahDokJamlakAsli($uid) {
        $sql = $this->db->query( " SELECT count(lc_skbdn) as lc_skbdn FROM trx_lc_detail_dokumen WHERE uid='".$uid."' and jenis_kelengkapan_dokumen='JAMLAK_ASLI'  ");
        $obj = $sql->row_object();
        $num = $sql->num_rows();
        if ($num > 0) {
            return $obj->lc_skbdn;
        } else {
            return '';
        }
    }
	
	public function getJumlahDokKontrakAsli($uid) {
        $sql = $this->db->query( " SELECT count(lc_skbdn) as lc_skbdn FROM trx_lc_detail_dokumen WHERE uid='".$uid."' and jenis_kelengkapan_dokumen='KONTRAK_ASLI'  ");
        $obj = $sql->row_object();
        $num = $sql->num_rows();
        if ($num > 0) {
            return $obj->lc_skbdn;
        } else {
            return '';
        }
    }
	
	public function getJumlahDokKontrakJualSo($uid) {
        $sql = $this->db->query( " SELECT count(lc_skbdn) as lc_skbdn FROM trx_lc_detail_dokumen_kontrak_jual WHERE uid='".$uid."' and jenis_kelengkapan_kontrak_jual='KONTRAK_JUAL_SO'  ");
        $obj = $sql->row_object();
        $num = $sql->num_rows();
        if ($num > 0) {
            return $obj->lc_skbdn;
        } else {
            return '';
        }
    }
	
	function getLcSkbdnAllData(){
        $data_lc = $this->db->query("SELECT *, CASE WHEN trx_lc.tahapan = 'ALL' THEN 'SEKALIGUS'
													WHEN trx_lc.tahapan != 'ALL' THEN trx_lc.tahapan
												END desk_tahapan,
												CASE WHEN trx_lc.status_penerbitan = 'CR' THEN 'MENUNGGU'
													WHEN trx_lc.status_penerbitan = 'AJ' THEN 'PROSES DRAFT'
													WHEN trx_lc.status_penerbitan = 'AJTERBIT' THEN 'TERBIT DRAFT'
													WHEN trx_lc.status_penerbitan = 'AJKOREKSI' THEN 'KOREKSI DRAFT'
													WHEN trx_lc.status_penerbitan = 'RL' THEN 'RELEASE DOKUMEN'
													WHEN trx_lc.status_penerbitan = 'LC' THEN 'JATUH TEMPO'
													WHEN trx_lc.status_penerbitan = 'BAYAR' THEN 'BAYAR'
													WHEN trx_lc.status_penerbitan = 'REFINANCING' THEN 'REFINANCING'
												END desk_status_penerbitan
									FROM trx_lc
									ORDER BY trx_lc.id_lc DESC")->result();
        return $data_lc;
    }
	
	public function getDataStatusPenagihan($uid,$id_penagihan_lc) {
        $sql = $this->db->query(" select * from trx_lc_detail_penagihan where uid='".$uid."' and id_penagihan_lc='".$id_penagihan_lc."'  ");
        return $sql->row();
    }
	
	public function setDataStatusPenagihan($data) {
        $sql = $this->db->query("   UPDATE trx_lc_detail_penagihan
									SET status_penagihan = '" . $data['status_penagihan_edit'] . "', tanggal_jatuh_tempo = '" . $data['tanggal_jatuh_tempo'] . "', lama_refinancing = '" . $data['lama_refinancing'] . "', 
									bunga_refinancing = '" . $data['bunga_refinancing'] . "', nilai_yang_direfinancing = '" . $data['nilai_yang_direfinancing'] . "'
									WHERE uid = '" . $data['uid'] . "' and id_penagihan_lc = '" . $data['id_penagihan_lc'] . "'; 
								");
        if ($this->db->affected_rows() > 0) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }
	
	function getPenagihanBarang($uid){
        $data_lc = $this->db->query("SELECT  * FROM trx_lc_detail_barang WHERE uid = '".$uid."' ")->result();
		return $data_lc;
    }
	
	public function getDataPenagihan($uid, $id_penagihan_lc) {
        $sql = $this->db->query(" select * from trx_lc_detail_penagihan where uid='".$uid."' and id_penagihan_lc='".$id_penagihan_lc."' ");
        return $sql->row();
    }
	
	// public function getDataBarangLc($uid) {
        // $sql = $this->db->query(" select * from trx_lc_detail_barang where uid='".$uid."'  ");
        // return $sql->row();
    // }
	
	public function getDataBarangLc($uid){
		$query = $this->db->query( " select * from trx_lc_detail_barang where uid='".$uid."';  ");
        return $query->result();
    }
	
	public function getIdLC($uid) {
        $sql = $this->db->query( " select id_lc from trx_lc where uid='".$uid."'  ");
        $obj = $sql->row_object();
        $num = $sql->num_rows();
        if ($num > 0) {
            return $obj->id_lc;
        } else {
            return '';
        }
    }
	
}
?>