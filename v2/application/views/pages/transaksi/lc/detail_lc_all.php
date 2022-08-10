<a href="<?= base_url() ?>transaksi/lc#tabs-icons-text-5" class='btn btn-primary'><i class="fa fa-arrow-left"></i> Kembali</a>
<br><br>
<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" href="#data-table" role="button"> Detail PENGAJUAN LC/SKBDN </a>
        </div>
    </div>
	<div class="card-body table-responsive res-pad">
		<div class="row">
            <!-- Id SCF -->
			<?php foreach($all_lc as $row12) { ?>
            <input hidden id="uid_edit" name="uid" value="<?php echo $row12->uid; ?>" />
			<input hidden id="id_lc_edit" name="id_lc" value="<?php echo $row12->id_lc; ?>"/>
			<input type="hidden" class="form-control" id="nomor_kontrak_ubah" name="nomor_kontrak_ubah" placeholder="No Kontrak" value="<?php echo $row12->nomor_kontrak; ?>" >
			<input type="hidden" class="form-control" id="tahapan_ubah" name="tahapan_ubah" placeholder="Tahapan" value="<?php echo $row12->tahapan; ?>" >
			<input type="hidden" class="form-control" id="nomor_po_ubah" name="nomor_po_ubah" placeholder="Nomor PO" value="<?php echo $row12->nomor_po; ?>" >
			<?php  } ?>
			
			<!-- Status Penerbitan -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Status Penerbitan</label>
                <div id='input-desk_status_penerbitan'>
				<?php foreach($all_lc as $row12) { ?>
                    <input type="text" class="form-control" value="<?php echo $row12->desk_status_penerbitan; ?>" readonly >
					<?php  } ?>
                </div>
            </div>
			
			<!-- Tahapan -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tahapan</label>
                <div id='input-desk_tahapan'>
				<?php foreach($all_lc as $row12) { ?>
                    <input type="text" class="form-control" value="<?php echo $row12->desk_tahapan; ?>" readonly >
				<?php  } ?>
                </div>
            </div>
			
			<!-- LC/SKBDN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">LC/SKBDN</label>
                <div id='input-lc_skbdn'>
				<?php foreach($all_lc as $row12) { ?>
                    <input type="text" class="form-control" value="<?php echo $row12->lc_skbdn; ?>" readonly >
				<?php  } ?>
                </div>
            </div>
			
			<!-- No. Kontrak -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">No. Kontrak</label>
                <div id='input-nomor_kontrak'>
				<?php foreach($all_lc as $row12) { ?>
                    <input type="text" class="form-control" value="<?php echo $row12->nomor_kontrak; ?>" readonly >
				<?php  } ?>
                </div>
            </div>
			
			<!-- No. PO -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">No. PO</label>
                <div id='input-nomor_po'>
				<?php foreach($all_lc as $row12) { ?>
                    <input type="text" class="form-control" value="<?php echo $row12->nomor_po; ?>" readonly >
				<?php  } ?>
                </div>
            </div>
			
			<!-- Nomor surat -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nomor surat</label>
                <div id='input-nomor_surat'>
				<?php foreach($all_lc as $row12) { ?>
                    <input type="text" class="form-control" value="<?php echo $row12->nomor_surat; ?>" readonly >
				<?php  } ?>
                </div>
            </div>
			
			<!-- Divisi -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Divisi</label>
                <div id='input-nama_unit'>
				<?php foreach($all_lc as $row12) { ?>
                    <input type="text" class="form-control" value="<?php echo $row12->nama_unit; ?>" readonly >
				<?php  } ?>
                </div>
            </div>
			
			<!-- Vendor -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Vendor</label>
                <div id='input-vendor'>
				<?php foreach($all_lc as $row12) { ?>
                    <input type="text" class="form-control" value="<?php echo $row12->vendor; ?>" readonly >
				<?php  } ?>
                </div>
            </div>
			
			<!-- Kode proyek -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Kode proyek</label>
                <div id='input-kode_proyek'>
				<?php foreach($all_lc as $row12) { ?>
                    <input type="text" class="form-control" value="<?php echo $row12->kode_proyek; ?>" readonly >
				<?php  } ?>
                </div>
            </div>
			
			<!-- Nama proyek -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nama proyek</label>
                <div id='input-nama_proyek'>
				<?php foreach($all_lc as $row12) { ?>
                    <input type="text" class="form-control" value="<?php echo $row12->nama_proyek; ?>" readonly >
				<?php  } ?>
                </div>
            </div>
			
			<!-- Nilai Kontrak -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nilai Kontrak</label>
                <div id='input-nominal_kontrak'>
				<?php foreach($all_lc as $row12) { ?>
                    <input type="text" class="form-control" value="<?php echo number_format($row12->nominal_kontrak); ?>" readonly >
				<?php  } ?>
                </div>
            </div>

			<!-- Nama Barang -->
			<div class="card-body table-responsive collapse show" id='data-table'>
				<table class="table nowrap table-striped table-bordered table-sm" width="100%">
					<thead>
						<tr>
							<th width='10px' rowspan="2">No.</th>
							<th rowspan="2">Nama Barang</th>
							<th rowspan="2">Quantity</th>
							<th rowspan="2">Satuan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						foreach($detail_barang as $data){
							echo"<tr>
									<td><center>".$i."</center></td>
									<td><center>".$data->nama_barang."</center></td>
									<td><center>". number_format($data->quantity)."</center></td>
									<td><center>". $data->satuan."</center></td>
								 </tr>";
								 $i++;
						} ?>
					</tbody>
				</table>
			</div>			
			<hr class="col-11 hr-input-modal" />			
        </div>
	</div>
</div>

	<div class="card mb-3">
		<div class="card-header-tab card-header-tab-animation card-header">
			<div class="card-header-title">
				<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button"> DOKUMEN LC/SKBDN</a>
			</div>
		</div>
        <div class="card-body table-responsive collapse show" id='data-table'>
			<div class="nav-wrapper">
				<ul class="nav nav-tabs nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
					<li class="nav-item">
						<a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-a-tab" data-toggle="tab" href="#tabs-icons-text-a" role="tab" aria-controls="tabs-icons-text-a" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Dok Pengajuan LC/SKBDN</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-b-tab" data-toggle="tab" href="#tabs-icons-text-b" role="tab" aria-controls="tabs-icons-text-b" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Dok Penerbitan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-c-tab" data-toggle="tab" href="#tabs-icons-text-c" role="tab" aria-controls="tabs-icons-text-c" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Dok Release</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-d-tab" data-toggle="tab" href="#tabs-icons-text-d" role="tab" aria-controls="tabs-icons-text-d" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Detail Penagihan & Jatuh Tempo</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="tabs-icons-text-a" role="tabpanel" aria-labelledby="tabs-icons-text-a-tab">
						<label class="col-form-label">A. Dokumen Pengajuan - PO ASLI :</label>
						<table class="table table-bordered table-hover" id="tab_logic_doc_po_asli_edit">
							<tbody>
								<?php
									$id1 = 0;
									$no1 = 1;
								if($detail_po_asli){
									foreach ($detail_po_asli as $row1) {
								?>
								<tr id='<?php echo 'dokPoAsliEdit'. $id1; ?>'>
									<td>
										File upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/po_asli/".$row1->dokumen_lc.".pdf' target='_blank'>".$row1->dokumen_lc; ?>
									</td>                                                                
								</tr>
								<tr id='<?php echo 'dokPoAsliEdit'. $no1; ?>'></tr>
								<?php
									$id1++;
									$no1++;
									}
								}else{ ?>
								<tr id='dokPoAsliEdit0'>
									<td>No Files</td>   
								</tr>
								<tr id='dokPoAsliEdit1'></tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<label class="col-form-label">B. Dokumen Pengajuan - JAMLAK ASLI :</label>
						<table class="table table-bordered table-hover" id="tab_logic_doc_jamlak_asli_edit">
							<tbody>
								<?php
									$id2 = 0;
									$no2 = 1;
								if($detail_jamlak_asli){
									foreach ($detail_jamlak_asli as $row2) {
								?>
								<tr id='<?php echo 'dokJamlakAsliEdit'. $id2; ?>'>
									<td>
										File upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/jamlak_asli/".$row2->dokumen_lc.".pdf' target='_blank'>".$row2->dokumen_lc; ?> 
									</td>                                                                 
								</tr>
								<tr id='<?php echo 'dokJamlakAsliEdit'. $no2; ?>'></tr>
								<?php
									$id2++;
									$no2++;
									}
								}else{ ?>
								<tr id='dokJamlakAsliEdit0'>
									<td>No Files</td>   
								</tr>
								<tr id='dokJamlakAsliEdit1'></tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<label class="col-form-label">C. Dokumen Pengajuan - KONTRAK ASLI :</label>
						<table class="table table-bordered table-hover" id="tab_logic_doc_kontrak_asli_edit">
							<tbody>
								<?php
									$id3 = 0;
									$no3 = 1;
								if($detail_kontrak_asli){
									foreach ($detail_kontrak_asli as $row3) {
								?>
								<tr id='<?php echo 'dokKontrakAsliEdit'. $id3; ?>'>
									<td>
										File upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/kontrak_asli/".$row3->dokumen_lc.".pdf' target='_blank'>".$row3->dokumen_lc; ?>
									</td>
								</tr>
								<tr id='<?php echo 'dokKontrakAsliEdit'. $no3; ?>'></tr>
								<?php
									$id3++;
									$no3++;
									}
								}else{ ?>
								<tr id='dokKontrakAsliEdit0'>
									<td>No Files</td>   
								</tr>
								<tr id='dokKontrakAsliEdit1'></tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<label class="col-form-label">D. Dokumen Pengajuan - Surat Konfirmasi Keabsahan Bank Garansi :</label>
						<div id='input-berkas_surat_konfirmasi_keabsahan_bank_garansi-edit'>
							<?php
							if($konfirmasi_keabsahan_bank_garansi){
								foreach ($konfirmasi_keabsahan_bank_garansi as $row4) {
							?>File hasil upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/keabsahan_bank_garansi/".$row4->dokumen_lc.".pdf' target='_blank'>".$row4->dokumen_lc; ?></a>
							<?php
								}
							}else{ echo 'No Files';}?>
						</div>
						<br>
						<label class="col-form-label">E. Dokumen Pengajuan - Keabsahan Bank Garansi :</label>
						<div id='input-berkas_keabsahan_bank_garansi-edit'>
							<?php
							if($keabsahan_bank_garansi){
								foreach ($keabsahan_bank_garansi as $row5) {
							?>
								File hasil upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/keabsahan_bank_garansi/".$row5->dokumen_lc.".pdf' target='_blank'>".$row5->dokumen_lc; ?></a>
							<?php
								} 
							}else{ echo 'No Files';}?>
						</div>
						<br>
						<label class="col-form-label">F. Dokumen Pengajuan - Kontrak Jual SO :</label>
						<table class="table table-bordered table-hover" id="tab_logic_doc_kontrak_jual_so_edit">
							<tbody>
								<?php
									$id4 = 0;
									$no4 = 1;
								if($detail_kontrak_jual_so){
									foreach ($detail_kontrak_jual_so as $row6) { 
								?>
								<tr id='<?php echo 'dokKontrakJualSoEdit'. $id4; ?>'>
									<td>
										File upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/total_doc_kontrak_jual_so/".$row6->dokumen_kontrak_jual_lc.".pdf' target='_blank'>".$row6->dokumen_kontrak_jual_lc; ?> 
									</td>                                                                 
								</tr>
								<tr id='<?php echo 'dokKontrakJualSoEdit'. $no4; ?>'></tr>
								<?php
									$id4++;
									$no4++;
									}
								}else{ ?>
								<tr id='dokKontrakJualSoEdit0'>
									<td>No Files</td>   
								</tr>
								<tr id='dokKontrakJualSoEdit1'></tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>			
					<div class="tab-pane fade" id="tabs-icons-text-b" role="tabpanel" aria-labelledby="tabs-icons-text-b-tab">
						<label class="col-form-label">Dokumen Penerbitan</label>
						<table class="table table-bordered table-hover" id="tab_logic_doc_kelengkapan">
							<tbody>
								<?php
									$id1 = 0;
									$no1 = 1;
								if($detail_penerbitan){
									foreach ($detail_penerbitan as $row7) {
								?>
								<tr id='<?php echo 'dokKelengkapan'. $id1; ?>'>
									<td>
										File upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/penerbitan_draft/".$row7->dokumen_lc.".pdf' target='_blank'>".$row7->dokumen_lc; ?>
									</td>                                                                 
								</tr>
								<tr id='<?php echo 'dokKelengkapan'. $no1; ?>'></tr>
								<?php
									$id1++;
									$no1++;
									}
								}else{ ?>
								<tr id='dokKelengkapan0'>
									<td>No Files</td>   
								</tr>
								<tr id='dokKelengkapan1'></tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>			
					<div class="tab-pane fade" id="tabs-icons-text-c" role="tabpanel" aria-labelledby="tabs-icons-text-c-tab">
						<label class="col-form-label">Dokumen Release</label>
						<table class="table table-bordered table-hover" id="tab_logic_doc_release_dok">
							<tbody>
								<?php
									$id1 = 0;
									$no1 = 1;
								if($detail_doc_release){
									foreach ($detail_doc_release as $row8) {
								?>
								<tr id='<?php echo 'releaseDokumen'. $id1; ?>'>
									<td>
										File upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/release_dokumen/".$row8->dokumen_lc.".pdf' target='_blank'>".$row8->dokumen_lc; ?>
									</td>                                                                 
								</tr>
								<tr id='<?php echo 'releaseDokumen'. $no1; ?>'></tr>
								<?php
									$id1++;
									$no1++;
									}
								}else{ ?>
								<tr id='releaseDokumen0'>
									<td>No Files</td>   
								</tr>
								<tr id='releaseDokumen1'></tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>			
					<div class="tab-pane fade" id="tabs-icons-text-d" role="tabpanel" aria-labelledby="tabs-icons-text-d-tab">
						<label class="col-form-label">Detail Penagihan & Jatuh Tempo</label>
						<table id="<?= $menu ?>" class="table nowrap table-striped table-bordered table-sm" width="100%">
							<thead>
								<tr>
									<th width='10px' rowspan="2">No.</th>
									<th rowspan="2">Status Penagihan</th>
									<th rowspan="2">Nomor Surat Akseptasi ISC</th>
									<th rowspan="2">Tanggal Surat Akseptasi</th>
									<th rowspan="2">Tanggal Disposisi Manager</th>
									<th rowspan="2">Tanggal Pengajuan Akseptasi</th>
									<th rowspan="2">Tanggal Masuk Dokumen</th>
									<th rowspan="2">Currency</th>
									<th rowspan="2">Nilai Tagihan</th>
									<th rowspan="2">Bunga Upas</th>
									<th rowspan="2">Potongan</th>
									<th rowspan="2">Keterangan Potongan</th>
									<th rowspan="2">Volume Barang</th>
									<th rowspan="2">Satuan Barang</th>
									<th rowspan="2">Nilai Yang Diakseptasi</th>
									<th rowspan="2">Tanggal Jatuh Tempo</th>
									<th rowspan="2">Keterangan Penagihan</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach($data_lc_penagihan as $data){
									echo"<tr>
											<td><center>".$i."</center></td>
											<td><center>".$data['status_penagihan']."</center></td>
											<td><center>".$data['nomor_surat_akseptasi_isc']."</center></td>
											<td><center>".$data['tanggal_surat_akseptasi']."</center></td>
											<td><center>".$data['tanggal_disposisi_manager']."</center></td>
											<td><center>".$data['tanggal_pengajuan_akseptasi_ke']."</center></td>
											<td><center>".$data['tanggal_masuk_dokumen']."</center></td>
											<td><center>".$data['currency']."</center></td>
											<td><center>".number_format($data['nilai_tagihan'])."</center></td>
											<td><center>".number_format($data['bunga_upas'])."</center></td>
											<td><center>".number_format($data['potongan'])."</center></td>
											<td><center>".$data['keterangan_potongan']."</center></td>
											<td><center>".$data['jumlah_volume_barang_quantity']."</center></td>
											<td><center>".$data['jumlah_volume_barang_satuan']."</center></td>
											<td><center>".number_format($data['nilai_yang_diakseptasi'])."</center></td>
											<td><center>".$data['tanggal_jatuh_tempo']."</center></td>
											<td><center>".$data['keterangan_penagihan']."</center></td>
										 </tr>";
										 $i++;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
    $(document).ready(function() {
		$('#lockedit1').hide();
        $('#unlockedit1').show();
		$('#submit_edit1').hide();
		document.getElementById("nama_barang_ubah").disabled = true;
		document.getElementById("advising_bank_ubah").disabled = true;
		document.getElementById("tanggal_lc_skbdn").disabled = true;
		document.getElementById("tanggal_exp_lc_skbdn").disabled = true;
		document.getElementById("tenor_hari").disabled = true;
		document.getElementById("keterangan_tenor").disabled = true;
		document.getElementById("status_penerbitan_ubah").disabled = true;
    });
	
	function unlockEdit1() {
		$('#lockedit1').show();
        $('#unlockedit1').hide();
		$('#submit_edit1').show();
		document.getElementById("tanggal_lc_skbdn").disabled = false;
		document.getElementById("tanggal_exp_lc_skbdn").disabled = false;
		document.getElementById("tenor_hari").disabled = false;
		document.getElementById("keterangan_tenor").disabled = false;
		document.getElementById("status_penerbitan_ubah").disabled = false;
    }
	
	function lockEdit1() {
		$('#lockedit1').hide();
        $('#unlockedit1').show();
		$('#submit_edit1').hide();
		document.getElementById("tanggal_lc_skbdn").disabled = true;
		document.getElementById("tanggal_exp_lc_skbdn").disabled = true;
		document.getElementById("tenor_hari").disabled = true;
		document.getElementById("keterangan_tenor").disabled = true;
		document.getElementById("status_penerbitan_ubah").disabled = true;
    }
	
	function getDataAktif(nilai_tagihan) {
        var nilai_tagihan = $("input[name='nilai_tagihan']").val();
        var bunga_upas = $("input[name='bunga_upas']").val();
        var potongan = $("input[name='potongan']").val();
        var a = nilai_tagihan.replace(".", "");
        var b = bunga_upas.replace(".", "");
        var c = potongan.replace(".", "");
		var a1 = a.replace(".", "");
        var b1 = b.replace(".", "");
        var c1 = c.replace(".", "");
		var a2 = a1.replace(".", "");
        var b2 = b1.replace(".", "");
        var c2 = c1.replace(".", "");
		var nilai_tagihan_float = parseFloat(a2);
		var bunga_upas_float = parseFloat(b2);
		var potongan_float = parseFloat(c2);
		var total = nilai_tagihan_float + bunga_upas_float + potongan_float;
		var numtotal = addCommas(total);
        var isExist = false;
        if (!isExist) {
            $("input[name='nilai_yang_diakseptasi']").val(numtotal);
        }
    }
	
	function addCommas(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}
	
	$(document).ready(function() {
		$('#divisi-edit').selectize({});
		$('#mata_uang-edit').selectize({});
	});
</script>