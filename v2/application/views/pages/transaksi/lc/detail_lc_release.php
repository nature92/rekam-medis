<!--<button class='btn btn-primary' onclick="javascript:history.go(-1)"> <i class="fa fa-arrow-left"></i> Kembali </button>-->
<a href="<?= base_url() ?>transaksi/lc#tabs-icons-text-3" class='btn btn-primary'><i class="fa fa-arrow-left"></i> Kembali</a>
<button class='btn btn-success' onclick="unlockEdit1()" id="unlockedit1"> <i class="fa fa-unlock"></i> Edit </button>
<button class='btn btn-danger' onclick="lockEdit1()" id="lockedit1"> <i class="fa fa-lock"></i> Edit </button>
<?php  foreach($release_lc as $row) { ?>
<a href="<?php echo base_url(); ?>transaksi/lc/hapusLcSkbdn/<?php echo $row->uid; ?>" class="btn btn-danger" onclick="javascript: return confirm('Yakin hapus transaksi LC/SKBDN ?')" href="#"><i class='fa fa-trash'></i> Hapus</a>
<?php  } ?>
<br><br>
<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" href="#data-table" role="button"> Detail Release Dokumen LC/SKBDN </a>
        </div>
    </div>
	<form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/editLcReleaseDokumen"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="card-body table-responsive res-pad">
		<div class="row">

            <!-- Id SCF -->
			<?php  foreach($release_lc as $row) { ?>
            <input hidden id="uid_edit" name="uid" value="<?php echo $row->uid; ?>"/>
			<input hidden id="id_lc_edit" name="id_lc" value="<?php echo $row->id_lc; ?>"/>
			<?php  } ?>
			
			<!-- Kode Proyek -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Kode Proyek</label>
                <div id='input-kode_proyek_ubah'>
                    <input type="text" class="form-control" id="kode_proyek_ubah" name="kode_proyek_ubah" placeholder="Kode Proyek" value="<?php echo $row->kode_proyek; ?>" readonly >
                </div>
            </div>
			
			<!-- NAMA PROYEK -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nama Proyek</label>
                <div id='input-nama_proyek_ubah'>
                    <input type="text" class="form-control" id="nama_proyek_ubah" name="nama_proyek_ubah" placeholder="Nama Proyek" value="<?php echo $row->nama_proyek; ?>" readonly >
                </div>
            </div>
	
            <!-- No Kontrak Jual (SO) -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">No Kontrak Jual (SO)</label>
                <div id='input-nomor_kontrak_jual_so_ubah'>
                    <input type="text" class="form-control" id="nomor_kontrak_jual_so_ubah" name="nomor_kontrak_jual_so_ubah" placeholder="No Kontrak Jual (SO)" value="<?php echo $row->nomor_kontrak_jual_so; ?>" readonly >
                </div>
            </div>
			
			<!-- Nilai kontrak -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nilai kontrak</label>
                <div id='input-nilai_ubah'>
                    <input type="text" class="form-control" id="nilai_ubah" name="nilai_ubah" placeholder="Nilai kontrak" value="<?php echo $row->nilai; ?>" readonly >
                </div>
            </div>
			
			<!-- Issuing Bank -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Issuing Bank</label>
                <div id='input-issuing_bank_ubah'>
                    <input type="text" class="form-control" id="issuing_bank_ubah" name="issuing_bank_ubah" placeholder="Issuing Bank" value="<?php echo $row->issuing_bank; ?>" readonly >
                </div>
            </div>
			
			<!-- Tipe Dokumen -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tipe Dokumen</label>
                <div id='input-lc_skbdn_ubah'>
                    <input type="text" class="form-control" id="lc_skbdn_ubah" name="lc_skbdn_ubah" placeholder="Tipe Dokumen" value="<?php echo $row->lc_skbdn; ?>" readonly >
                </div>
            </div>
			
			<!-- No Kontrak -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">No Kontrak</label>
                <div id='input-nomor_kontrak_ubah'>
                    <input type="text" class="form-control" id="nomor_kontrak_ubah" name="nomor_kontrak_ubah" placeholder="No Kontrak" value="<?php echo $row->nomor_kontrak; ?>" readonly >
                </div>
            </div>
			
			<!-- No PO -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">No PO</label>
                <div id='input-nomor_po_ubah'>
                    <input type="text" class="form-control" id="nomor_po_ubah" name="nomor_po_ubah" placeholder="No PO" value="<?php echo $row->nomor_po; ?>" readonly >
                </div>
            </div>
			
			<!-- Tanggal SJAN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal SJAN</label>
                <div id='input-tanggal_sjan_ubah'>
                    <input type="date" class="form-control" id="tanggal_sjan_ubah" name="tanggal_sjan_ubah" placeholder="Tanggal SJAN" value="<?php echo $row->tanggal_sjan; ?>" readonly >
                </div>
            </div>
			
			<!-- Divisi -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Divisi</label>
                <div id='input-divisi_ubah'>
                    <input type="text" class="form-control" id="divisi_ubah" name="divisi_ubah" placeholder="Divisi" value="<?php echo $row->nama_unit; ?>" readonly >
                </div>
            </div>
			
			<!-- Vendor -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Vendor</label>
                <div id='input-vendor_ubah'>
                    <input type="text" class="form-control" id="vendor_ubah" name="vendor_ubah" placeholder="Vendor" value="<?php echo $row->vendor; ?>" readonly >
                </div>
            </div>
			
			<!-- Nilai LC/SKBDN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nilai LC/SKBDN</label>
                <div id='input-nilai_lc_atau_skbdn_ubah'>
                    <input type="text" class="form-control" id="nilai_lc_atau_skbdn_ubah" name="nilai_lc_atau_skbdn_ubah" placeholder="Nilai LC/SKBDN" value="<?php echo number_format($row->nilai_lc_atau_skbdn); ?>" readonly >
                </div>
            </div>
			
			<!-- Advising Bank -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Advising Bank</label>
                <div id='input-advising_bank_ubah'>
                    <input type="text" class="form-control" id="advising_bank_ubah" name="advising_bank_ubah" placeholder="Advising Bank" value="<?php echo $row->advising_bank; ?>" readonly >
                </div>
            </div>
			
			<!-- Masa Berlaku Jamlak -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Masa Berlaku Jamlak</label>
                <div id='input-masa_berlaku_jamlak_ubah'>
                    <input type="text" class="form-control" id="masa_berlaku_jamlak_ubah" name="masa_berlaku_jamlak_ubah" placeholder="Masa Berlaku Jamlak" value="<?php echo $row->masa_berlaku_jamlak; ?>" readonly >
                </div>
            </div>
			
			<!-- Waktu Pengiriman Barang -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Waktu Pengiriman Barang</label>
                <div id='input-waktu_pengiriman_barang_ubah'>
                    <input type="text" class="form-control" id="waktu_pengiriman_barang_ubah" name="waktu_pengiriman_barang_ubah" placeholder="Waktu Pengiriman Barang" value="<?php echo $row->waktu_pengiriman_barang; ?>" readonly >
                </div>
            </div>

			<!-- Nama Barang -->
            <!--<div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nama Barang</label>
                <div id='input-nama_barang_ubah'>
                    <input type="text" class="form-control" id="nama_barang_ubah" name="nama_barang_ubah" placeholder="Nama Barang" value="<?php echo $row->nama_barang; ?>">
                </div>
            </div>-->
			
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
									<td><center>".number_format($data->quantity)."</center></td>
									<td><center>".$data->satuan."</center></td>
								 </tr>";
								 $i++;
						} ?>
					</tbody>
				</table>
			</div>
			
			<hr class="col-11 hr-input-modal" />						
			
			<!-- NO LC/SKBDN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">NO LC/SKBDN</label>
                <div id='input-no_lc_skbdn'>
                    <input type="text" class="form-control" id="input_no_lc_skbdn" name="input_no_lc_skbdn" placeholder="NO LC/SKBDN" value="<?php echo $row->no_lc_skbdn; ?>" required >
                </div>
            </div>
			
			<!-- Tanggal LC/SKBDN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal LC/SKBDN</label>
                <div id='input-tanggal_lc_skbdn'>
                    <input type="date" class="form-control" id="tanggal_lc_skbdn" name="tanggal_lc_skbdn" placeholder="Tanggal LC/SKBDN" value="<?php echo $row->tanggal_lc_skbdn; ?>" required >
                </div>
            </div>

            <!-- Tanggal Exp. LC/SKBDN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal Exp. LC/SKBDN</label>
                <div id='input-tanggal_exp_lc_skbdn'>
                    <input type="date" class="form-control" id="tanggal_exp_lc_skbdn" name="tanggal_exp_lc_skbdn" placeholder="Tanggal Exp. LC/SKBDN" value="<?php echo $row->tanggal_exp_lc_skbdn; ?>" required >
                </div>
            </div>

            <!-- Tenor Hari -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tenor Hari</label>
                <div id='input-tenor_hari'>
                    <input type="text" class="form-control input-number number-separator" id="tenor_hari" name="tenor_hari" placeholder="Tenor Hari" value="<?php echo $row->tenor_hari; ?>" required >
                </div>
            </div>

            <!-- Keterangan Tenor -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Keterangan Tenor</label>
                <div id='input-keterangan_tenor'>
                    <input type="text" class="form-control" id="keterangan_tenor" name="keterangan_tenor" placeholder="Keterangan Tenor" value="<?php echo $row->keterangan_tenor; ?>" required >
                </div>
            </div>
			
			<!-- Status -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Status</label>
                <div id='input-status_penerbitan_ubah'>
					<select class="form-control" id="status_penerbitan_ubah" name="status_penerbitan_ubah"> 
						 <option value="RL" <?php if($row->status_transaksi_lc_skbdn=='RL') echo 'selected' ?> >PROSES RELEASE</option>
						 <option value="LC" <?php if($row->status_transaksi_lc_skbdn=='LC') echo 'selected' ?> >RELEASE / JATUH TEMPO</option>
					 </select>
                </div>
            </div>
			
			<!-- Dok kelengkapan -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">Dok kelengkapan</label>
                <div id='input-release_dokumen-add'>					
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
									<!--<input class='form-control' type="file" id='<?php echo 'release_dokumen_draft'. $id1; ?>' name='<?php echo 'release_dokumen_draft'. $id1; ?>' accept="application/pdf"> --> File hasil upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/release_dokumen/".$row8->dokumen_lc.".pdf' target='_blank'>".$row8->dokumen_lc; ?>
								</td>                                                                 
							</tr>
							<tr id='<?php echo 'releaseDokumen'. $no1; ?>'></tr>
							<?php
								$id1++;
								$no1++;
								}
							}else{ ?>
							<tr id='releaseDokumen0'>
								<td>
									<!--<input class='form-control' type="file" id='release_dokumen_draft0' name='release_dokumen_draft0' accept="application/pdf">-->
								</td>   
							</tr>
							<tr id='releaseDokumen1'></tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a id="add_row_release_dokumen1" class="pull-left btn btn-success " style="color:white">Tambah Upload</a>
					<a id="add_row_release_dokumen1_edit1" type="button" class="btn btn-success" data-toggle="modal" style="color:white" data-target="#exampleModalEditRelease">Upload File Pendukung</a>
					<a id='delete_row_release_dokumen1' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
					<input type="hidden" class="form-control" id="total_release_dokumen" name="total_release_dokumen" value="<?php echo count($detail_doc_release); ?>"/>
                </div>
            </div>
			
        </div>
	</div>
</div>
<div class="row">
    <div class="form-group col-md-6">
    <?php if ($hak_akses->can_create === 't') : ?>
        <button type="submit" id="submit_edit1" class="btn btn-primary">Simpan Perubahan</button>
    <?php endif; ?>
    </div>
</div>
</form>
<script>
    $(document).ready(function() {
		$('#lockedit1').hide();
        $('#unlockedit1').show();
		$('#submit_edit1').hide();
		$('#add_row_release_dokumen1').hide();
		$('#delete_row_release_dokumen1').hide();
		$('#add_row_release_dokumen1_edit1').hide();
		// document.getElementById("kode_proyek_ubah").disabled = true;
		// document.getElementById("nama_proyek_ubah").disabled = true;
		// document.getElementById("nomor_kontrak_jual_so_ubah").disabled = true;
		// document.getElementById("nilai_ubah").disabled = true;
		// document.getElementById("issuing_bank_ubah").disabled = true;
		// document.getElementById("lc_skbdn_ubah").disabled = true;
		// document.getElementById("nomor_kontrak_ubah").disabled = true;	
		// document.getElementById("nomor_po_ubah").disabled = true;
		// document.getElementById("tanggal_sjan_ubah").disabled = true;
		// document.getElementById("divisi_ubah").disabled = true;
		// document.getElementById("vendor_ubah").disabled = true;
		// document.getElementById("nama_barang_ubah").disabled = true;
		// document.getElementById("nilai_lc_atau_skbdn_ubah").disabled = true;
		// document.getElementById("advising_bank_ubah").disabled = true;
		// document.getElementById("masa_berlaku_jamlak_ubah").disabled = true;
		// document.getElementById("waktu_pengiriman_barang_ubah").disabled = true;
		document.getElementById("no_lc_skbdn").disabled = true;
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
		$('#add_row_release_dokumen1').hide();
		$('#delete_row_release_dokumen1').hide();
		$('#add_row_release_dokumen1_edit1').show();
		document.getElementById("no_lc_skbdn").disabled = false;
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
		$('#add_row_release_dokumen1').hide();
		$('#delete_row_release_dokumen1').hide();
		$('#add_row_release_dokumen1_edit1').hide();
		document.getElementById("no_lc_skbdn").disabled = true;
		document.getElementById("tanggal_lc_skbdn").disabled = true;
		document.getElementById("tanggal_exp_lc_skbdn").disabled = true;
		document.getElementById("tenor_hari").disabled = true;
		document.getElementById("keterangan_tenor").disabled = true;
		document.getElementById("status_penerbitan_ubah").disabled = true;
    }
	
	var release = $("input[name='total_release_dokumen']").val();
	var p = parseFloat(release);
	// $("input[name='total_release_dokumen']").val(1);
	$("#add_row_release_dokumen1").click(function(){
        $('#releaseDokumen'+p).html(
									"<td><input class='form-control' type='file' id='release_dokumen_draft"+p+"' name='release_dokumen_draft"+p+"' accept='application/pdf'>       </td>" 
							   );           
        $('#tab_logic_doc_release_dok').append('<tr id="releaseDokumen'+(p+1)+'"></tr>');
        $("input[name='total_release_dokumen']").val(p + 1);
        p++; 
    });
	$("#delete_row_release_dokumen1").click(function(){
        if(p>1){
			$("#releaseDokumen"+(p-1)).html('');
			$("input[name='total_release_dokumen']").val($("input[name='total_release_dokumen']").val() - 1);
			p--;
        }
    });
	
	$(document).ready(function() {
		$('#divisi-edit').selectize({});
		$('#mata_uang-edit').selectize({});
	});
</script>