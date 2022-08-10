<!--<button class='btn btn-primary' onclick="javascript:history.go(-1)"> <i class="fa fa-arrow-left"></i> Kembali </button> -->
<a href="<?= base_url() ?>transaksi/lc#tabs-icons-text-2" class='btn btn-primary'><i class="fa fa-arrow-left"></i> Kembali</a>
<button class='btn btn-success' onclick="unlockEdit1()" id="unlockedit1"> <i class="fa fa-unlock"></i> Edit </button>
<button class='btn btn-danger' onclick="lockEdit1()" id="lockedit1"> <i class="fa fa-lock"></i> Edit </button>
<?php  foreach($penerbitan_lc as $row) { ?>
<a href="<?php echo base_url(); ?>transaksi/lc/hapusLcSkbdn/<?php echo $row->uid; ?>" class="btn btn-danger" onclick="javascript: return confirm('Yakin hapus transaksi LC/SKBDN ?')" href="#"><i class='fa fa-trash'></i> Hapus</a>
<?php  } ?>
<br><br>
<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" href="#data-table" role="button"> Detail Proses Penerbitan LC/SKBDN </a>
        </div>
    </div>
	<form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/editLcPenerbitan"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="card-body table-responsive res-pad">
		<div class="row">

            <!-- Id SCF -->
			<?php  foreach($penerbitan_lc as $row) { ?>
            <input hidden id="uid_edit" name="uid" value="<?php echo $row->uid; ?>"/>
            <input hidden id="id_lc_edit" name="id_lc" value="<?php echo $row->id_lc; ?>"/>
			<?php  } ?>
	
            <!-- Kode Proyek -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Kode Proyek</label>
                <div id='input-kode_proyek_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="kode_proyek_edit" name="kode_proyek_edit" placeholder="Kode Proyek_edit" value="<?php echo $row->kode_proyek; ?>" readonly >
                <?php  } ?>
				</div>
            </div>
			
			<!-- Nomor Kontrak Jual (SO) -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nomor Kontrak Jual (SO)</label>
                <div id='input-nomor_kontrak_jual_so_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="nomor_kontrak_jual_so_edit" name="nomor_kontrak_jual_so_edit" placeholder="Nomor Kontrak Jual (SO)" value="<?php echo $row->nomor_kontrak_jual_so; ?>" readonly >
                <?php  } ?>
				</div>
            </div>
			
			<!-- Tipe Dokumen -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tipe Dokumen</label>
                <div id='input-lc_skbdn_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="lc_skbdn_edit" name="lc_skbdn_edit" placeholder="Tipe Dokumen" value="<?php echo $row->lc_skbdn; ?>" readonly >
                <?php  } ?>
				</div>
            </div>
			
			<!-- No Kontrak -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">No Kontrak</label>
                <div id='input-nomor_kontrak_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="nomor_kontrak_edit" name="nomor_kontrak_edit" placeholder="No Kontrak" value="<?php echo $row->nomor_kontrak; ?>" readonly >
                <?php  } ?>
				</div>
            </div>
			
			<!-- No PO -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">No PO</label>
                <div id='input-nomor_po_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="nomor_po_edit" name="nomor_po_edit" placeholder="No PO" value="<?php echo $row->nomor_po; ?>" readonly >
				<?php  } ?>
                </div>
            </div>
			
			<!-- Tanggal SJAN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal SJAN</label>
                <div id='input-tanggal_sjan_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="tanggal_sjan_edit" name="tanggal_sjan_edit" placeholder="Tanggal SJAN" value="<?php echo $row->tanggal_sjan; ?>" readonly >
                <?php  } ?>
				</div>
            </div>
			
			<!-- Divisi -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Divisi</label>
                <div id='input-divisi_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="divisi_edit" name="divisi_edit" placeholder="Divisi" value="<?php echo $row->nama_unit; ?>" readonly >
                <?php  } ?>
				</div>
            </div>
			
			<!-- Vendor -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Vendor</label>
                <div id='input-vendor_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="vendor_edit" name="vendor_edit" placeholder="Vendor" value="<?php echo $row->vendor; ?>" readonly >
                <?php  } ?>
				</div>
            </div>
			
			<!-- Nilai SKBDN/LC -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nilai SKBDN/LC</label>
                <div id='input-nilai_lc_atau_skbdn_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control number-separator" id="nilai_lc_atau_skbdn_edit" name="nilai_lc_atau_skbdn_edit" placeholder="Nilai SKBDN/LC" value="<?php echo number_format($row->nilai_lc_atau_skbdn); ?>" readonly >
                <?php  } ?>
				</div>
            </div>
			
			<!-- ADVISING BANK -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">ADVISING BANK</label>
                <div id='input-advising_bank_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="advising_bank_edit" name="advising_bank_edit" placeholder="ADVISING BANK" value="<?php echo $row->advising_bank; ?>" readonly >
                <?php  } ?>
				</div>
            </div>
			
			<!-- PROYEK -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">PROYEK</label>
                <div id='input-nama_proyek_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="nama_proyek_edit" name="nama_proyek_edit" placeholder="PROYEK" value="<?php echo $row->nama_proyek; ?>" readonly >
                <?php  } ?>
				</div>
            </div>
			
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
			
			<!-- Nomor Surat Pengajuan Aplikasi -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nomor Surat Pengajuan Aplikasi</label>
                <div id='input-no_surat_pengajuan_aplikasi'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="no_surat_pengajuan_aplikasi" name="no_surat_pengajuan_aplikasi" placeholder="Nomor Surat Pengajuan Aplikasi" value="<?php echo $row->no_surat_pengajuan_aplikasi; ?>">
                <?php  } ?>
				</div>
            </div>

            <!-- Tgl Surat Pengajuan Aplikasi -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal Surat Pengajuan Aplikasi</label>
                <div id='input-tanggal_surat_pengajuan_aplikasi1'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="date" class="form-control" id="tanggal_surat_pengajuan_aplikasi1" name="tanggal_surat_pengajuan_aplikasi1" placeholder="Tanggal Surat Pengajuan Aplikasi" value="<?php echo $row->tanggal_surat_pengajuan_aplikasi; ?>">
                <?php  } ?>
				</div>
            </div>

            <!-- Issuing Bank -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Issuing Bank</label>
                <div id='input-issuing_bank'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="issuing_bank" name="issuing_bank" placeholder="Issuing Bank" value="<?php echo $row->issuing_bank; ?>">
                <?php  } ?>
				</div>
            </div>

            <!-- Keterangan -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Keterangan</label>
                <div id='input-keterangan'>
				<?php  foreach($penerbitan_lc as $row) { ?>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?php echo $row->keterangan; ?>">
                <?php  } ?>
				</div>
            </div>
			
			<!-- Status -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Status</label>
                <div id='input-status_penerbitan_edit'>
				<?php  foreach($penerbitan_lc as $row) { ?>
					<select class="form-control" id="status_penerbitan_edit" name="status_penerbitan_edit"> 
						 <option value="AJ" <?php if($row->status_transaksi_lc_skbdn=='AJ') echo 'selected' ?> >PROSES DRAFT</option>
						 <option value="AJTERBIT" <?php if($row->status_transaksi_lc_skbdn=='AJTERBIT') echo 'selected' ?> >TERBIT DRAFT</option>
						 <option value="AJKOREKSI" <?php if($row->status_transaksi_lc_skbdn=='AJKOREKSI') echo 'selected' ?> >KOREKSI DRAFT</option>
						 <option value="RL" <?php if($row->status_transaksi_lc_skbdn=='RL') echo 'selected' ?> >PROSES RELEASE</option>
					 </select>
				<?php  } ?>
                </div>
            </div>
			
			<!-- Dok kelengkapan -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Dok kelengkapan</label>
                <div id='input-dok_kelengkapan_penerbitan_draft-add'>					
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
									<!--<input class='form-control' type="file" id='<?php echo 'dok_kelengkapan_penerbitan_draft'. $id1; ?>' name='<?php echo 'dok_kelengkapan_penerbitan_draft'. $id1; ?>' accept="application/pdf"> --> File hasil upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/penerbitan_draft/".$row7->dokumen_lc.".pdf' target='_blank'>".$row7->dokumen_lc; ?>
								</td>                                                                 
							</tr>
							<tr id='<?php echo 'dokKelengkapan'. $no1; ?>'></tr>
							<?php
								$id1++;
								$no1++;
								}
							}else{ ?>
							<tr id='dokKelengkapan0'>
								<td>
									<!--<input class='form-control' type="file" id='dok_kelengkapan_penerbitan_draft0' name='dok_kelengkapan_penerbitan_draft0' accept="application/pdf"> -->
								</td>   
							</tr>
							<tr id='dokKelengkapan1'></tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a id="add_row_doc_kelengkapan1" class="pull-left btn btn-success" style="color:white">Tambah Upload</a>
					<a id="add_row_doc_kelengkapan1_edit1" type="button" class="btn btn-success" data-toggle="modal" style="color:white" data-target="#exampleModalEditPenerbitan">Upload File Pendukung</a>
					<a id='delete_row_doc_kelengkapan1' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
					<input type="hidden" class="form-control" id="total_doc_kelengkapan" name="total_doc_kelengkapan" value="<?php echo count($detail_penerbitan); ?>"/>
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
		$('#add_row_doc_kelengkapan1').hide();
		$('#delete_row_doc_kelengkapan1').hide();
		$('#add_row_doc_kelengkapan1_edit1').hide();
		// document.getElementById("kode_proyek_edit").disabled = true;
		// document.getElementById("nomor_kontrak_jual_so_edit").disabled = true;
		// document.getElementById("lc_skbdn_edit").disabled = true;
		// document.getElementById("nomor_kontrak_edit").disabled = true;
		// document.getElementById("nomor_po_edit").disabled = true;
		// document.getElementById("tanggal_sjan_edit").disabled = true;
		// document.getElementById("divisi_edit").disabled = true;	
		// document.getElementById("vendor_edit").disabled = true;
		// document.getElementById("nilai_lc_atau_skbdn_edit").disabled = true;
		// document.getElementById("advising_bank_edit").disabled = true;
		// document.getElementById("nama_proyek_edit").disabled = true;
		document.getElementById("no_surat_pengajuan_aplikasi").disabled = true;
		document.getElementById("tanggal_surat_pengajuan_aplikasi1").disabled = true;
		document.getElementById("issuing_bank").disabled = true;
		document.getElementById("keterangan").disabled = true;
		document.getElementById("status_penerbitan_edit").disabled = true;
    });
	
	function unlockEdit1() {
		$('#lockedit1').show();
        $('#unlockedit1').hide();
		$('#submit_edit1').show();
		$('#add_row_doc_kelengkapan1').hide();
		$('#delete_row_doc_kelengkapan1').hide();
		$('#add_row_doc_kelengkapan1_edit1').show();
		document.getElementById("no_surat_pengajuan_aplikasi").disabled = false;
		document.getElementById("tanggal_surat_pengajuan_aplikasi1").disabled = false;
		document.getElementById("issuing_bank").disabled = false;
		document.getElementById("keterangan").disabled = false;
		document.getElementById("status_penerbitan_edit").disabled = false;
    }
	
	function lockEdit1() {
		$('#lockedit1').hide();
        $('#unlockedit1').show();
		$('#submit_edit1').hide();
		$('#add_row_doc_kelengkapan1').hide();
		$('#delete_row_doc_kelengkapan1').hide();
		$('#add_row_doc_kelengkapan1_edit1').hide();
		document.getElementById("no_surat_pengajuan_aplikasi").disabled = true;
		document.getElementById("tanggal_surat_pengajuan_aplikasi1").disabled = true;
		document.getElementById("issuing_bank").disabled = true;
		document.getElementById("keterangan").disabled = true;
		document.getElementById("status_penerbitan_edit").disabled = true;
    }
	
	var doc = $("input[name='total_doc_kelengkapan']").val();
	var o = parseFloat(doc);
	// $("input[name='total_doc_kelengkapan']").val(1);
	$("#add_row_doc_kelengkapan1").click(function(){
        $('#dokKelengkapan'+o).html(
									"<td><input class='form-control' type='file' id='dok_kelengkapan_penerbitan_draft"+o+"' name='dok_kelengkapan_penerbitan_draft"+o+"' accept='application/pdf'>       </td>" 
							   );           
        $('#tab_logic_doc_kelengkapan').append('<tr id="dokKelengkapan'+(o+1)+'"></tr>');
        $("input[name='total_doc_kelengkapan']").val(o + 1);
        o++; 
    });
	$("#delete_row_doc_kelengkapan1").click(function(){
        if(o>1){
			$("#dokKelengkapan"+(o-1)).html('');
			$("input[name='total_doc_kelengkapan']").val($("input[name='total_doc_kelengkapan']").val() - 1);
			o--;
        }
    });
	
	$(document).ready(function() {
		$('#divisi-edit').selectize({});
		$('#mata_uang-edit').selectize({});
	});
</script>