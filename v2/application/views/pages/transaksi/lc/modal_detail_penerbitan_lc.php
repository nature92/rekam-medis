<div class="modal fade" id="modalDetailPenerbitan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Penerbitan LC/SKBDN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>transaksi/lc/editLcPenerbitan/' accept-charset="utf-8" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">

                        <!-- Id SCF -->
                        <input hidden id="uid_edit" name="uid" />

                        <!-- Tipe Dokumen -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Tipe Dokumen</label>
                            <div id='input-lc_skbdn_edit'>
                                <input type="text" class="form-control" id="lc_skbdn_edit" name="lc_skbdn_edit" placeholder="Tipe Dokumen" disabled>
                            </div>
                        </div>
						
						<!-- No Kontrak -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">No Kontrak</label>
                            <div id='input-nomor_kontrak_edit'>
                                <input type="text" class="form-control" id="nomor_kontrak_edit" name="nomor_kontrak_edit" placeholder="No Kontrak" disabled>
                            </div>
                        </div>
						
						<!-- No PO -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">No PO</label>
                            <div id='input-no_po_edit'>
                                <input type="text" class="form-control" id="no_po_edit" name="no_po_edit" placeholder="No PO" disabled>
                            </div>
                        </div>
						
						<!-- Tanggal SJAN -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Tanggal SJAN</label>
                            <div id='input-tanggal_sjan_edit'>
                                <input type="text" class="form-control" id="tanggal_sjan_edit" name="tanggal_sjan_edit" placeholder="Tanggal SJAN" disabled>
                            </div>
                        </div>
						
						<!-- Divisi -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Divisi</label>
                            <div id='input-divisi_edit'>
                                <input type="text" class="form-control" id="divisi_edit" name="divisi_edit" placeholder="Divisi" disabled>
                            </div>
                        </div>
						
						<!-- Vendor -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Vendor</label>
                            <div id='input-vendor_edit'>
                                <input type="text" class="form-control" id="vendor_edit" name="vendor_edit" placeholder="Vendor" disabled>
                            </div>
                        </div>
						
						<!-- Nilai SKBDN/LC -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Nilai SKBDN/LC</label>
                            <div id='input-nilai_lc_atau_skbdn_edit'>
                                <input type="text" class="form-control number-separator" id="nilai_lc_atau_skbdn_edit" name="nilai_lc_atau_skbdn_edit" placeholder="Nilai SKBDN/LC" disabled>
                            </div>
                        </div>
						
						<!-- ADVISING BANK -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">ADVISING BANK</label>
                            <div id='input-advising_bank_edit'>
                                <input type="text" class="form-control" id="advising_bank_edit" name="advising_bank_edit" placeholder="ADVISING BANK" disabled>
                            </div>
                        </div>
						
						<!-- PROYEK -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">PROYEK</label>
                            <div id='input-nama_proyek_edit'>
                                <input type="text" class="form-control" id="nama_proyek_edit" name="nama_proyek_edit" placeholder="PROYEK" disabled>
                            </div>
                        </div>
						
						<hr class="col-11 hr-input-modal" />						
						
						<!-- Nomor Surat Pengajuan Aplikasi -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Nomor Surat Pengajuan Aplikasi</label>
                            <div id='input-no_surat_pengajuan_aplikasi'>
                                <input type="text" class="form-control" id="no_surat_pengajuan_aplikasi" name="no_surat_pengajuan_aplikasi" placeholder="Nomor Surat Pengajuan Aplikasi" disabled>
                            </div>
                        </div>

                        <!-- Tgl Surat Pengajuan Aplikasi -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Tanggal Surat Pengajuan Aplikasi</label>
                            <div id='input-tanggal_surat_pengajuan_aplikasi1'>
                                <input type="text" class="form-control" id="tanggal_surat_pengajuan_aplikasi1" name="tanggal_surat_pengajuan_aplikasi1" placeholder="Tanggal Surat Pengajuan Aplikasi" disabled>
                            </div>
                        </div>

                        <!-- Issuing Bank -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Issuing Bank</label>
                            <div id='input-issuing_bank'>
                                <input type="text" class="form-control" id="issuing_bank" name="issuing_bank" placeholder="Issuing Bank" disabled>
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Keterangan</label>
                            <div id='input-keterangan'>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" disabled>
                            </div>
                        </div>
						
						<!-- Status -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Status</label>
                            <div id='input-status_penerbitan_edit'>
								<select class="form-control" id="status_penerbitan_edit" name="status_penerbitan_edit"> 
									 <option value="AJ" <?php if($row->status_transaksi_lc_skbdn=='AJ') echo 'selected' ?> >PROSES BANK</option>
									 <option value="RL" <?php if($row->status_transaksi_lc_skbdn=='RL') echo 'selected' ?> >TERBIT DRAFT</option>
								 </select>
                            </div>
                        </div>
						
						<!-- Dok kelengkapan -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Dok kelengkapan</label>
                            <div id='input-dok_kelengkapan_penerbitan_draft-add'>							
								<table class="table table-bordered table-hover" id="tab_logic_doc_kelengkapan">
									<tbody>
										<tr id='dokKelengkapan0'>
											<td>
												<input class='form-control' type="file" id='dok_kelengkapan_penerbitan_draft0' name='dok_kelengkapan_penerbitan_draft0' accept="application/pdf">
											</td>                                                                 
										</tr>
										<tr id='dokKelengkapan1'></tr>
									</tbody>
								</table>
								<a id="add_row_doc_kelengkapan" class="pull-left btn btn-success " style="color:white">Tambah Upload</a>
								<a id='delete_row_doc_kelengkapan' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
								<input type="hidden" class="form-control" id="total_doc_kelengkapan" name="total_doc_kelengkapan" value="<?php echo set_value('total_doc_kelengkapan'); ?>"/>
                            </div>
                        </div>
						
						<div class="form-group col-md-12 modal-input">
							<label class="col-form-label">Dok Kelengkapan</label>
							<div id='input-dok_kelengkapan_penerbitan_draft-add'>	
								<table id="tabel_dok_penerbitan" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Dokumen</th>
										</tr>
									</thead>
									<tbody id="detail_dok_penerbitan"></tbody>
								</table>
							</div>
						</div>
						
                    </div>
                </div>
                <div class="modal-footer">
                    <?php if ($hak_akses->can_update === 't') : ?>
                        <button type="button" class="btn btn-success" id='edit' onclick='handleDisabled()'>Edit</button>
                        <button type="submit" class="btn btn-success" id='simpan' hidden>Simpan</button>
                    <?php endif; ?>
                    <?php if ($hak_akses->can_delete === 't') : ?>
                        <!--<button type="button" class="btn btn-danger" id='hapus' data-toggle="modal" data-target="#modalDelete">Hapus</button> -->
                    <?php endif; ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick='handleClosed()'>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    //Handle Toggle Edit
    function handleDisabled() {
		document.getElementById("no_surat_pengajuan_aplikasi").disabled = false;
		document.getElementById("tanggal_surat_pengajuan_aplikasi1").disabled = false;
		$('#tanggal_surat_pengajuan_aplikasi1').attr('type', 'date');
		document.getElementById("issuing_bank").disabled = false;
		document.getElementById("keterangan").disabled = false;
        $('#modalDetailPenerbitan #simpan').removeAttr('hidden');
        $('#modalDetailPenerbitan #edit').attr('hidden', 'hidden');
		$('#add_row_doc_kelengkapan').show();
		$('#delete_row_doc_kelengkapan').show();
    }
	
	function handleClosed() {
		$('#modalDetailPenerbitan #edit').removeAttr('hidden');
		$('#modalDetailPenerbitan #simpan').attr('hidden', 'hidden');
		$('#add_row_doc_kelengkapan').hide();
		$('#delete_row_doc_kelengkapan').hide();
		$('#no_surat_pengajuan_aplikasi').val("");
		document.getElementById("no_surat_pengajuan_aplikasi").disabled = true;
		$('#tanggal_surat_pengajuan_aplikasi1').val("");
		document.getElementById("tanggal_surat_pengajuan_aplikasi1").disabled = true;
		$('#tanggal_surat_pengajuan_aplikasi1').attr('type', 'text');
		$('#issuing_bank').val("");
		document.getElementById("issuing_bank").disabled = true;
		$('#keterangan').val("");
		document.getElementById("keterangan").disabled = true;
    }
	
	var j=1;
	$("input[name='total_doc_kelengkapan']").val(1);
	$("#add_row_doc_kelengkapan").click(function(){
        $('#dokKelengkapan'+j).html(
									"<td><input class='form-control' type='file' id='dok_kelengkapan_penerbitan_draft"+j+"' name='dok_kelengkapan_penerbitan_draft"+j+"' accept='application/pdf'>       </td>" 
							   );           
        $('#tab_logic_doc_kelengkapan').append('<tr id="dokKelengkapan'+(j+1)+'"></tr>');
        $("input[name='total_doc_kelengkapan']").val(j + 1);
        j++; 
    });
	$("#delete_row_doc_kelengkapan").click(function(){
        if(j>1){
			$("#dokKelengkapan"+(j-1)).html('');
			$("input[name='total_doc_kelengkapan']").val($("input[name='total_doc_kelengkapan']").val() - 1);
			j--;
        }
    });

    //XML Detail LC
    $('#modalDetailPenerbitan').on('show.bs.modal', function(event) {
        const xml = new XMLHttpRequest();
        const payloadKey = $(event.relatedTarget);
        const modal = $(this);

        const id = payloadKey.data('main-id');

        xml.open('GET', `<?= base_url() ?>transaksi/lc/getDetailLC/${id}`, false);
        xml.send();

        const data = JSON.parse(xml.response);

        //Assign Value Pada Field
        //Id LC
        $("#uid_edit").val(id);

        //Informasi LC
        $("#lc_skbdn_edit").val(data['lc_skbdn']);
        $("#nomor_kontrak_edit").val(data['nomor_kontrak']);
        $("#no_po_edit").val(data['nomor_po']);
        $("#tanggal_sjan_edit").val(data['tanggal_sjan']);
        $("#divisi_edit").val(data['nama_unit']);
        $("#vendor_edit").val(data['vendor']);
		nilai_lc_atau_skbdn = data['nilai_lc_atau_skbdn'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $("#nilai_lc_atau_skbdn_edit").val(nilai_lc_atau_skbdn);
        $("#advising_bank_edit").val(data['advising_bank']);
        $("#nama_proyek_edit").val(data['nama_proyek']);
        $("#no_surat_pengajuan_aplikasi").val(data['no_surat_pengajuan_aplikasi']);
        $("#tanggal_surat_pengajuan_aplikasi1").val(data['tanggal_surat_pengajuan_aplikasi']);
        $("#issuing_bank").val(data['issuing_bank']);
        $("#keterangan").val(data['keterangan']);

        //Attribute Modal Delete
        // $('#hapus').data("main-id", data['id_scf']).data("name", data['nomor_bukti_kas']);		
		
		var detailPenerbitanTable;
		$.post("<?php echo site_url('Transaksi/Lc/getDataDetailUploadPenerbitan'); ?>", {'uid': '614c4004c2560'})
		.done(function (data) {
			var body = "";
			data = JSON.parse(data);				
			for (var k in data) {
				// dok = <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/penerbitan_draft/".data[k]['dokumen_lc'].".pdf' target='_blank'>".data[k]['dokumen_lc']; ?>
				// quantity = data[k]['quantity'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				// body += "<tr><td>" + data[k]['dokumen_lc'] + "</td></tr>";
				body += "<tr><td>" + data[k]['created_by'] + "</td></tr>";
				// body += "<tr><td>dsdsdsd</td></tr>";
			}
			if (detailPenerbitanTable) {
				detailPenerbitanTable.destroy();
			}
			$('#detail_dok_penerbitan').html(body);
			detailPenerbitanTable = $("#tabel_dok_penerbitan").DataTable({});
		});
		
    });
	
	

    $(document).ready(function() {
		$('#add_row_doc_kelengkapan').hide();
		$('#delete_row_doc_kelengkapan').hide();
    })
</script>
