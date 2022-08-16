<div class="modal fade" id="modalDetailStatusPenagihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!--<div class="modal-dialog modal-sm" role="document">-->
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Status Penagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			<form role="form" method="post" action="<?php echo base_url(); ?>transaksi/lc/setDataStatusPenagihan">
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-12 modal-input">
							<div class="row">
								<input type="hidden" class="form-control" name="uid_editttt" id="uid_editttt" placeholder="uid" readonly />
								<input type="hidden" class="form-control" name="id_penagihan_lc_editttt" id="id_penagihan_lc_editttt" placeholder="uid" readonly />
							</div>
							<!-- Status Penagihan -->
							<div class="row">
								<div class="form-group col-md-12 modal-input">
									<label class="col-form-label">Status Penagihan :</label>
									<div id='input-status_penagihan-edit2'>
										<select class="form-control" id="status_penagihan_edit2" name="status_penagihan_edit2" required > 
											<!--<option value="" disabled selected>Pilih Status Penagihan</option>-->
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6 modal-input">
									<label class="col-form-label">Tanggal Jatuh Tempo :</label>
									<div id='input-tanggal_jatuh_tempo_modal_edit-edit2'>
										<input type="date" class="form-control" name="tanggal_jatuh_tempo_modal_edit" id="tanggal_jatuh_tempo_modal_edit" placeholder="Tanggal Jatuh Tempo" required />
									</div>
								</div>
								<div class="form-group col-md-6 modal-input">
									<label class="col-form-label">Lama Refinancing (Satuan hari) :</label>
									<div id='input-lama_refinancing_modal_edit-edit2'>
										<input type="number" class="form-control input-number number-separator" name="lama_refinancing_modal_edit" id="lama_refinancing_modal_edit" placeholder="Lama Refinancing" required />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6 modal-input">
									<label class="col-form-label">Bunga Refinancing :</label>
									<div id='input-bunga_refinancing_modal_edit-edit2'>
										<input type="text" class="form-control input-number number-separator" name="bunga_refinancing_modal_edit" id="bunga_refinancing_modal_edit" placeholder="Bunga Refinancing" required onkeyup="getDataInputan(this.value);" />
										<input type="hidden" class="form-control" name="bunga_refinancing_modal_edit1" id="bunga_refinancing_modal_edit1" placeholder="Bunga Refinancing" required />
									</div>
								</div>
								<div class="form-group col-md-6 modal-input">
									<label class="col-form-label">Nilai Yang Refinancing :</label>
									<div id='input-nilai_yang_direfinancing_modal_edit-edit2'>
										<input type="text" class="form-control input-number number-separator" name="nilai_yang_direfinancing_modal_edit" id="nilai_yang_direfinancing_modal_edit" placeholder="Nilai Yang Direfinancing" required onkeyup="getDataInputanNilai(this.value);" />
										<input type="hidden" class="form-control input-number number-separator" name="nilai_yang_direfinancing_modal_edit1" id="nilai_yang_direfinancing_modal_edit1" placeholder="Nilai Yang Direfinancing" required />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
        </div>
    </div>
</div>
<script>
	function showStatusPenagihan(e,f) {
        $.post("<?php echo site_url('transaksi/Lc/getDataStatusPenagihan'); ?>", {'uid': e, 'id_penagihan_lc':f})
            .done(function (data) {
                data = JSON.parse(data);
				$("input[name='uid_editttt']").val(data['uid']);
				$("input[name='id_penagihan_lc_editttt']").val(data['id_penagihan_lc']);
				$("input[name='tanggal_jatuh_tempo_modal_edit']").val(data['tanggal_jatuh_tempo']);
				body = ""
				body += "<option " + ((data['status_penagihan'] == 'BAYAR') ? "selected" : "")+ "selected value='BAYAR' >BAYAR</option>"; 
				body += "<option value='REFINANCING' >REFINANCING</option>";
				$("select[name='status_penagihan_edit2']").empty().append(body);
				$("select[name='status_penagihan_edit2']").select2().val(data['status_penagihan'] ).trigger('change.select2');
            });
        $('#modalDetailStatusPenagihan').modal({backdrop: 'static', keyboard: false});
    }
	
	function getDataInputan(bunga_refinancing_modal_edit) {
        var bunga_refinancing = $("input[name='bunga_refinancing_modal_edit']").val();
        var a = bunga_refinancing.replace(".", "");
		var a1 = a.replace(".", "");
		var a2 = a1.replace(".", "");
		var a3 = a2.replace(".", "");
        var isExist = false;
        if (!isExist) {
            $("input[name='bunga_refinancing_modal_edit1']").val(a3);
        }
    }
	
	function getDataInputanNilai(nilai_yang_direfinancing_modal_edit) {
        var nilai = $("input[name='nilai_yang_direfinancing_modal_edit']").val();
        var a = nilai.replace(".", "");
		var a1 = a.replace(".", "");
		var a2 = a1.replace(".", "");
		var a3 = a2.replace(".", "");
        var isExist = false;
        if (!isExist) {
            $("input[name='nilai_yang_direfinancing_modal_edit1']").val(a3);
        }
    }
</script>