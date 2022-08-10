<div class="modal fade" id="modalDetailReleaseDokumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Release Dokumen LC/SKBDN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>transaksi/lc/editLcReleaseDokumen/' accept-charset="utf-8" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">

                        <!-- Id SCF -->
                        <input hidden id="uid_edit1" name="uid" />

                        <!-- No Kontrak Jual (SO) -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">No Kontrak Jual (SO)</label>
                            <div id='input-nomor_kontrak_jual_so_ubah'>
                                <input type="text" class="form-control" id="nomor_kontrak_jual_so_ubah" name="nomor_kontrak_jual_so_ubah" placeholder="No Kontrak Jual (SO)" disabled>
                            </div>
                        </div>
						
						<!-- Nilai kontrak -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Nilai kontrak</label>
                            <div id='input-nilai_ubah'>
                                <input type="text" class="form-control" id="nilai_ubah" name="nilai_ubah" placeholder="Nilai kontrak" disabled>
                            </div>
                        </div>
						
						<!-- Issuing Bank -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Issuing Bank</label>
                            <div id='input-issuing_bank_ubah'>
                                <input type="text" class="form-control" id="issuing_bank_ubah" name="issuing_bank_ubah" placeholder="Issuing Bank" disabled>
                            </div>
                        </div>
						
						<!-- Tipe Dokumen -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Tipe Dokumen</label>
                            <div id='input-lc_skbdn_ubah'>
                                <input type="text" class="form-control" id="lc_skbdn_ubah" name="lc_skbdn_ubah" placeholder="Tipe Dokumen" disabled>
                            </div>
                        </div>
						
						<!-- No Kontrak -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">No Kontrak</label>
                            <div id='input-nomor_kontrak_ubah'>
                                <input type="text" class="form-control" id="nomor_kontrak_ubah" name="nomor_kontrak_ubah" placeholder="No Kontrak" disabled>
                            </div>
                        </div>
						
						<!-- No PO -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">No PO</label>
                            <div id='input-nomor_po_ubah'>
                                <input type="text" class="form-control" id="nomor_po_ubah" name="nomor_po_ubah" placeholder="No PO" disabled>
                            </div>
                        </div>
						
						<!-- Tanggal SJAN -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Tanggal SJAN</label>
                            <div id='input-tanggal_sjan_ubah'>
                                <input type="date" class="form-control" id="tanggal_sjan_ubah" name="tanggal_sjan_ubah" placeholder="Tanggal SJAN" disabled>
                            </div>
                        </div>
						
						<!-- Divisi -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Divisi</label>
                            <div id='input-divisi_ubah'>
                                <input type="text" class="form-control" id="divisi_ubah" name="divisi_ubah" placeholder="Divisi" disabled>
                            </div>
                        </div>
						
						<!-- Vendor -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Vendor</label>
                            <div id='input-vendor_ubah'>
                                <input type="text" class="form-control" id="vendor_ubah" name="vendor_ubah" placeholder="Vendor" disabled>
                            </div>
                        </div>
						
						<!-- Nama Barang -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Nama Barang</label>
                            <div id='input-nama_barang_ubah'>
                                <input type="text" class="form-control" id="nama_barang_ubah" name="nama_barang_ubah" placeholder="Nama Barang" disabled>
                            </div>
                        </div>
						
						<!-- Nilai LC/SKBDN -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Nilai LC/SKBDN</label>
                            <div id='input-nilai_lc_atau_skbdn_ubah'>
                                <input type="text" class="form-control" id="nilai_lc_atau_skbdn_ubah" name="nilai_lc_atau_skbdn_ubah" placeholder="Nilai LC/SKBDN" disabled>
                            </div>
                        </div>
						
						<!-- Advising Bank -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Advising Bank</label>
                            <div id='input-advising_bank_ubah'>
                                <input type="text" class="form-control" id="advising_bank_ubah" name="advising_bank_ubah" placeholder="Advising Bank" disabled>
                            </div>
                        </div>
						
						<hr class="col-11 hr-input-modal" />						
						
						<!-- Tanggal LC/SKBDN -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Tanggal LC/SKBDN</label>
                            <div id='input-tanggal_lc_skbdn'>
                                <input type="text" class="form-control" id="tanggal_lc_skbdn" name="tanggal_lc_skbdn" placeholder="Tanggal LC/SKBDN" disabled>
                            </div>
                        </div>

                        <!-- Tanggal Exp. LC/SKBDN -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Tanggal Exp. LC/SKBDN</label>
                            <div id='input-tanggal_exp_lc_skbdn'>
                                <input type="text" class="form-control" id="tanggal_exp_lc_skbdn" name="tanggal_exp_lc_skbdn" placeholder="Tanggal Exp. LC/SKBDN" disabled>
                            </div>
                        </div>

                        <!-- Tenor Hari -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Tenor Hari</label>
                            <div id='input-tenor_hari'>
                                <input type="text" class="form-control" id="tenor_hari" name="tenor_hari" placeholder="Tenor Hari" disabled>
                            </div>
                        </div>

                        <!-- Keterangan Tenor -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Keterangan Tenor</label>
                            <div id='input-keterangan_tenor'>
                                <input type="text" class="form-control" id="keterangan_tenor" name="keterangan_tenor" placeholder="Keterangan Tenor" disabled>
                            </div>
                        </div>
						
						<!-- Status -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Status</label>
                            <div id='input-status_penerbitan_ubah'>
								<select class="form-control" id="status_penerbitan_ubah" name="status_penerbitan_ubah"> 
									 <option value="RL" <?php if($row->status_transaksi_lc_skbdn=='RL') echo 'selected' ?> >TERBIT DRAFT</option>
									 <option value="LC" <?php if($row->status_transaksi_lc_skbdn=='LC') echo 'selected' ?> >RELEASE / JATUH TEMPO</option>
								 </select>
                            </div>
                        </div>
						
						<!-- Dok kelengkapan -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Dok kelengkapan</label>
                            <div id='input-release_dokumen-add'>
								<table class="table table-bordered table-hover" id="tab_logic_doc_release_dok">
									<tbody>
										<tr id='releaseDokumen0'>
											<td>
												<input class='form-control' type="file" id='release_dokumen_draft0' name='release_dokumen_draft0' accept="application/pdf">
											</td>                                                                 
										</tr>
										<tr id='releaseDokumen1'></tr>
									</tbody>
								</table>
								<a id="add_row_release_dokumen" class="pull-left btn btn-success " style="color:white">Tambah Upload</a>
								<a id='delete_row_release_dokumen' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
								<input type="hidden" class="form-control" id="total_release_dokumen" name="total_release_dokumen" value="<?php echo set_value('total_release_dokumen'); ?>"/>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <?php if ($hak_akses->can_update === 't') : ?>
                        <button type="button" class="btn btn-success" id='edit1' onclick='handleDisabled1()'>Edit</button>
                        <button type="submit" class="btn btn-success" id='simpan1' hidden>Simpan</button>
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
    function handleDisabled1() {
		document.getElementById("tanggal_lc_skbdn").disabled = false;
		document.getElementById("tanggal_exp_lc_skbdn").disabled = false;
		document.getElementById("tenor_hari").disabled = false;
		document.getElementById("keterangan_tenor").disabled = false;
        $('#modalDetailReleaseDokumen #simpan1').removeAttr('hidden');
        $('#modalDetailReleaseDokumen #edit1').attr('hidden', 'hidden');
		$('#add_row_release_dokumen').show();
		$('#delete_row_release_dokumen').show();
		// var tes = $("input[name='tanggal_lc_skbdn1']").val();
		// $('#tanggal_lc_skbdn').attr('type', 'text');
		// $('#tanggal_exp_lc_skbdn').attr('type', 'date');		
    }
	
	function handleClosed() {
		$('#modalDetailReleaseDokumen #edit1').removeAttr('hidden');
		$('#modalDetailReleaseDokumen #simpan1').attr('hidden', 'hidden');
		$('#add_row_release_dokumen').hide();
		$('#delete_row_release_dokumen').hide();
		$('#tanggal_lc_skbdn').val("");
		document.getElementById("tanggal_lc_skbdn").disabled = true;
		$('#tanggal_exp_lc_skbdn').val("");
		document.getElementById("tanggal_exp_lc_skbdn").disabled = true;
		$('#tenor_hari').val("");
		document.getElementById("tenor_hari").disabled = true;
		$('#keterangan_tenor').val("");
		document.getElementById("keterangan_tenor").disabled = true;
		$('#tanggal_lc_skbdn').attr('type', 'text');
		$('#tanggal_exp_lc_skbdn').attr('type', 'text');
    }
	
	var k=1;
	$("input[name='total_release_dokumen']").val(1);
	$("#add_row_release_dokumen").click(function(){
        $('#releaseDokumen'+k).html(
									"<td><input class='form-control' type='file' id='release_dokumen_draft"+k+"' name='release_dokumen_draft"+k+"' accept='application/pdf'> </td>" 
							   );           
        $('#tab_logic_doc_release_dok').append('<tr id="releaseDokumen'+(k+1)+'"></tr>');
        $("input[name='total_release_dokumen']").val(k + 1);
        k++; 
    });
	$("#delete_row_release_dokumen").click(function(){
        if(k>1){
			$("#releaseDokumen"+(k-1)).html('');
			$("input[name='total_release_dokumen']").val($("input[name='total_release_dokumen']").val() - 1);
			k--;
        }
    });

    //XML Detail LC
    $('#modalDetailReleaseDokumen').on('show.bs.modal', function(event) {
        const xml = new XMLHttpRequest();
        const payloadKey = $(event.relatedTarget);
        const modal = $(this);

        const id = payloadKey.data('main-id');

        xml.open('GET', `<?= base_url() ?>transaksi/lc/getDetailLC/${id}`, false);
        xml.send();

        const data = JSON.parse(xml.response);

        //Assign Value Pada Field
        //Id LC
        $("#uid_edit1").val(id);

        //Informasi LC
        $("#nomor_kontrak_jual_so_ubah").val(data['nomor_kontrak_jual_so']);
        $("#nilai_ubah").val(data['nilai']);
        $("#issuing_bank_ubah").val(data['issuing_bank']);
        $("#lc_skbdn_ubah").val(data['lc_skbdn']);
        $("#nomor_kontrak_ubah").val(data['nomor_kontrak']);
        $("#nomor_po_ubah").val(data['nomor_po']);
        $("#tanggal_sjan_ubah").val(data['tanggal_sjan']);
        $("#divisi_ubah").val(data['nama_unit']);
        $("#vendor_ubah").val(data['vendor']);
        $("#nama_barang_ubah").val(data['nama_barang']);
        $("#nilai_lc_atau_skbdn_ubah").val(data['nilai_lc_atau_skbdn']);
        $("#advising_bank_ubah").val(data['advising_bank']);
        $("#tanggal_lc_skbdn").val(data['tanggal_lc_skbdn']);
        $("#tanggal_exp_lc_skbdn").val(data['tanggal_exp_lc_skbdn']);
        $("#tenor_hari").val(data['tenor_hari']);
        $("#keterangan_tenor").val(data['keterangan_tenor']);
        //Attribute Modal Delete
        // $('#hapus').data("main-id", data['id_scf']).data("name", data['nomor_bukti_kas']);
    });

    $(document).ready(function() {
		$('#add_row_release_dokumen').hide();
		$('#delete_row_release_dokumen').hide();
		// $( "#tanggal_lc_skbdn" ).datepicker({dateFormat: 'dd/mm/yy'});
		// $( "#tanggal_exp_lc_skbdn" ).datepicker({dateFormat: 'dd/mm/yy'});
    })
</script>
