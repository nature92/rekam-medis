<div class="modal fade" id="modalDetailPenagihanxxx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Penagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			<form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/editLcModalPenagihan"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="modal-body">
				<div class="card-body table-responsive res-pad">
					<div class="row">					
					
						<!-- No Surat Akseptasi ISC -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">No Surat Akseptasi ISC</label>
							<div>
								<input type="text" class="form-control" id="no_surat_akseptasi_sc_modal" name="no_surat_akseptasi_sc_modal" placeholder="No Surat Akseptasi ISC" required>
								<input type="hidden" class="form-control" id="uid_modal_edit" name="uid_modal_edit" placeholder="uid" required>
								<input type="hidden" class="form-control" id="id_penagihan_lc_modal_edit" name="id_penagihan_lc_modal_edit" placeholder="uid" required>
							</div>
						</div>
						
						<!-- Tanggal Surat Akseptasi -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Tanggal Surat Akseptasi</label>
							<div id='input-tanggal_surat_akseptasi_modal_edit'>
								<input type="date" class="form-control" id="tanggal_surat_akseptasi_modal_edit" name="tanggal_surat_akseptasi_modal_edit" placeholder="Tanggal Surat Akseptasi" required>
							</div>
						</div>
						
						<!-- Tanggal Disposisi Manager -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Tanggal Disposisi Manager</label>
							<div id='input-tanggal_disposisi_manager_modal_edit'>
								<input type="date" class="form-control" id="tanggal_disposisi_manager_modal_edit" name="tanggal_disposisi_manager_modal_edit" placeholder="Tanggal Disposisi Manager" required>
							</div>
						</div>
						
						<!-- Tanggal Pengajuan Akseptasi Ke -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Tanggal Pengajuan Akseptasi Ke Bank</label>
							<div id='input-tanggal_pengajuan_akseptasi_ke_modal_edit'>
								<input type="date" class="form-control" id="tanggal_pengajuan_akseptasi_ke_modal_edit" name="tanggal_pengajuan_akseptasi_ke_modal_edit" placeholder="Tanggal Pengajuan Akseptasi Ke" required>
							</div>
						</div>
						
						<!-- Tanggal Masuk Dokumen -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Tanggal Masuk Dokumen</label>
							<div id='input-tanggal_masuk_dokumen_modal_edit'>
								<input type="date" class="form-control" id="tanggal_masuk_dokumen_modal_edit" name="tanggal_masuk_dokumen_modal_edit" placeholder="Tanggal Masuk Dokumen" required>
							</div>
						</div>

						<!-- Currency -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Currency</label>
							<div id='input-currency_modal_edit'>
								<input type="text" class="form-control" id="currency_modal_edit" name="currency_modal_edit" placeholder="Currency" readonly required>
							</div>
						</div>

						<!-- Nilai Tagihan -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Nilai Tagihan</label>
							<div id='input-nilai_tagihan_modal_edit'>
								<input type="text" class="form-control input-number number-separator" id="nilai_tagihan_modal_edit" name="nilai_tagihan_modal_edit" placeholder="Nilai Tagihan" onkeyup="getDataInput(this.value);" required>
								<!--<input type="text" class="form-control input-number number-separator" id="nilai_tagihan_modal_edit1" name="nilai_tagihan_modal_edit1" placeholder="Nilai Tagihan" onkeyup="getDataAktif2(this.value);" required> -->
							</div>
						</div>
						
						<!-- Bunga Upas -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Bunga Upas</label>
							<div id='input-bunga_upas_modal_edit'>
								<input type="text" class="form-control input-number number-separator" id="bunga_upas_modal_edit" name="bunga_upas_modal_edit" placeholder="Bunga Upas" onkeyup="getDataInput(this.value);" required>
							</div>
						</div>
						
						<!-- Potongan -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Potongan</label>
							<div id='input-potongan_modal_edit'>
								<input type="text" class="form-control input-number number-separator" id="potongan_modal_edit" name="potongan_modal_edit" placeholder="Potongan" onkeyup="getDataInput(this.value);" required>
							</div>
						</div>
						
						<!-- Keterangan Potongan -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Keterangan Potongan</label>
							<div id='input-keterangan_potongan'>
								<input type="text" class="form-control" id="keterangan_potongan_modal_edit" name="keterangan_potongan_modal_edit" placeholder="Keterangan Potongan" required>
							</div>
						</div>
						
						<!-- Quantity Barang -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Quantity Barang</label>
							<div id='input-jumlah_volume_barang_quantity_modal_edit'>
								<input type="text" class="form-control" id="jumlah_volume_barang_quantity_modal_edit" name="jumlah_volume_barang_quantity_modal_edit" placeholder="Quantity Barang" required>
							</div>
						</div>
						
						<!--Satuan Barang -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Satuan Barang</label>
							<div id='input-jumlah_volume_barang_satuan_modal_edit'>
								<input type="text" class="form-control" id="jumlah_volume_barang_satuan_modal_edit" name="jumlah_volume_barang_satuan_modal_edit" placeholder="Satuan Barang" required>
							</div>
						</div>
						
						<!-- Nilai Yang Diakseptasi -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Nilai Yang Diakseptasi</label>
							<div id='input-nilai_yang_diakseptasi_modal_edit'>
								<input type="text" class="form-control input-number number-separator" id="nilai_yang_diakseptasi_modal_edit" name="nilai_yang_diakseptasi_modal_edit" placeholder="Nilai Yang Diakseptasi" readonly required>
								<input type="hidden" class="form-control input-number number-separator" id="nilai_yang_diakseptasi_modal_edit1" name="nilai_yang_diakseptasi_modal_edit1" placeholder="Nilai Yang Diakseptasi" readonly required>
							</div>
						</div>
						
						<!-- Tanggal Jatuh Tempo Bayar -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Tanggal Jatuh Tempo Bayar</label>
							<div id='input-tanggal_jatuh_tempo_modal_edit'>
								<input type="date" class="form-control" id="tanggal_jatuh_tempo_modal_edit" name="tanggal_jatuh_tempo_modal_edit" placeholder="Tanggal Jatuh Tempo Bayar" required >
							</div>
						</div>
						
						<!-- Keterangan Penagihan -->
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Keterangan Penagihan</label>
							<div id='input-keterangan_penagihan_modal_edit'>
								<input type="text" class="form-control" id="keterangan_penagihan_modal_edit" name="keterangan_penagihan_modal_edit" placeholder="Keterangan Penagihan" required>
							</div>
						</div>
						
						<!-- Barang -->
						<!--<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">Barang</label>
							<div id='input-penagihan_barang_modal_edit'>
								<select id="penagihan_barang_modal_edit" name="penagihan_barang_modal_edit" required>
									
								</select>
							</div>
						</div>-->
					
					</div>
                </div>
            </div>
            <div class="modal-footer">
				<button type="submit" id="submit_edit1" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
			</form>
        </div>
    </div>
</div>
<script>
	function showDetailPenagihan(e , f) {
		$.post("<?php echo site_url('Transaksi/Lc/getDataPenagihan'); ?>", {'uid': e, 'id_penagihan_lc': f})
            .done(function (data) {
                data = JSON.parse(data);
                $("input[name='no_surat_akseptasi_sc_modal']").val(data['nomor_surat_akseptasi_isc']);
                $("input[name='uid_modal_edit']").val(data['uid']);
                $("input[name='id_penagihan_lc_modal_edit']").val(data['id_penagihan_lc']);
                $("input[name='id_lc_modal_edit']").val(data['id_lc']);
                $("input[name='tanggal_surat_akseptasi_modal_edit']").val(data['tanggal_surat_akseptasi']);
                $("input[name='tanggal_disposisi_manager_modal_edit']").val(data['tanggal_disposisi_manager']);
                $("input[name='tanggal_pengajuan_akseptasi_ke_modal_edit']").val(data['tanggal_pengajuan_akseptasi_ke']);
                $("input[name='tanggal_masuk_dokumen_modal_edit']").val(data['tanggal_masuk_dokumen']);
                $("input[name='currency_modal_edit']").val(data['currency']);
                // $("input[name='nilai_tagihan_modal_edit']").val(data['nilai_tagihan']); // asli
                $("input[name='nilai_tagihan_modal_edit']").val(data['nilai_tagihan'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
				// $nilai_tagih = addCommas(data['nilai_tagihan']);
				// $nilai_tagih_titik = nilai_tagih.replace(",", ".");
                // $("input[name='nilai_tagihan_modal_edit']").val($nilai_tagih);
                // $("input[name='nilai_tagihan_modal_edit1']").val(data['nilai_tagihan']);
                // $("input[name='bunga_upas_modal_edit']").val(data['bunga_upas']); // asli
				$("input[name='bunga_upas_modal_edit']").val(data['bunga_upas'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                // $("input[name='potongan_modal_edit']").val(data['potongan']); // asli
				$("input[name='potongan_modal_edit']").val(data['potongan'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                $("input[name='keterangan_potongan_modal_edit']").val(data['keterangan_potongan']);
                $("input[name='jumlah_volume_barang_quantity_modal_edit']").val(data['jumlah_volume_barang_quantity']);
                $("input[name='jumlah_volume_barang_satuan_modal_edit']").val(data['jumlah_volume_barang_satuan']);
				// $nilai_akseptasi = addCommas(data['nilai_yang_diakseptasi']);
				// $nilai_akseptasi_titik = nilai_akseptasi.replace(",", ".");
                // $("input[name='nilai_yang_diakseptasi_modal_edit']").val($nilai_akseptasi);
                // $("input[name='nilai_yang_diakseptasi_modal_edit']").val(data['nilai_yang_diakseptasi']); // asli
				$("input[name='nilai_yang_diakseptasi_modal_edit']").val(data['nilai_yang_diakseptasi'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
                $("input[name='nilai_yang_diakseptasi_modal_edit1']").val(data['nilai_yang_diakseptasi']);
                $("input[name='tanggal_jatuh_tempo_modal_edit']").val(data['tanggal_jatuh_tempo']);
                $("input[name='keterangan_penagihan_modal_edit']").val(data['keterangan_penagihan']);
            });
							
			// $.post("<?php echo site_url('Master/Jabatan/getGolonganJabatan'); ?>", {'tipe_jabatan': type_jabatan })
			// .done(function (data) {
				// var body = "<option value='0' >- PILIH GOLONGAN JABATAN -</option>";
				// if(data){
					// data = JSON.parse(data);
					// $.each( data, function( key, value ) {
						// if (value['kode_golongan_jabatan']  == kode_golongan_jabatan){
							// body += "<option selected value='" + value['kode_golongan_jabatan'] + "' >" + value['kode_golongan_jabatan'] + " </option>"; 
						// }else{
							// body += "<option value='" + value['kode_golongan_jabatan'] + "' >" + value['kode_golongan_jabatan'] + " </option>"; 
						// }
					// });
				// }
				// $("select[name='kode_golongan_jabatan']").empty().append(body);
				// $("select[name='kode_golongan_jabatan']").select2().trigger('change.select2');
			// });
			
			// $.post("<?php echo site_url('Transaksi/Lc/getDataBarangLc'); ?>", {'uid': e })
			// .done(function (data) {
				// var body = "<option value='0' >- PILIH -</option>";
				// // body2 = ""
				// if(data){
					// data = JSON.parse(data);
					// $.each( data, function( key, value ) {
						// if (value['id_barang_lc']  == f){
							// body += "<option selected value='" + value['id_barang_lc'] + "' >" + value['nama_barang'] + "</option>";
							// // body2 += "<option " + ((data['penagihan_barang'] == value['id_barang_lc']) ? "selected" : "")+ "selected value='"+ value['id_barang_lc'] +"' >"+ value['nama_barang'] +"</option>"; 
						// }else{
							// body += "<option value='" + value['id_barang_lc'] + "' >" + value['nama_barang'] + "</option>";
							// // body2 += "<option value='" + value['id_barang_lc'] + "' >" + value['nama_barang'] + "</option>";
						// }
					// });
				// }
				// // body2 += "<option value='" + data['id_barang_lc'] + "' >" + data['nama_barang'] + "</option>";
				// $("select[name='penagihan_barang_modal_edit']").empty().append(body);
				// // $("select[name='penagihan_barang_modal_edit']").select().trigger('change.select');
				// // $("select[name='penagihan_barang_modal_edit']").select2().val(data['id_barang_lc']).trigger('change.select2');
			// });			
        $('#modalDetailPenagihanxxx').modal({backdrop: 'static', keyboard: false});
    }
	
	function getDataInput(nilai_tagihan_modal_edit) {
        var nilai_tagihan = $("input[name='nilai_tagihan_modal_edit']").val();
        var bunga_upas = $("input[name='bunga_upas_modal_edit']").val();
        var potongan = $("input[name='potongan_modal_edit']").val();
        var a = nilai_tagihan.replace(".", "");
        var b = bunga_upas.replace(".", "");
        var c = potongan.replace(".", "");
		var a1 = a.replace(".", "");
        var b1 = b.replace(".", "");
        var c1 = c.replace(".", "");
		var a2 = a1.replace(".", "");
        var b2 = b1.replace(".", "");
        var c2 = c1.replace(".", "");
		var a3 = a2.replace(".", "");
        var b3 = b2.replace(".", "");
        var c3 = c2.replace(".", "");
		var nilai_tagihan_float = parseFloat(a3);
		var bunga_upas_float = parseFloat(b3);
		var potongan_float = parseFloat(c3);
		var total = nilai_tagihan_float + bunga_upas_float - potongan_float;
		var numtotal = addCommas(total);
		var numtotal1 = numtotal.replace(",", ".");
		var numtotal2 = numtotal1.replace(",", ".");
		var numtotal3 = numtotal2.replace(",", ".");
		var numtotal4 = numtotal3.replace(",", ".");
        var isExist = false;
        if (!isExist) {
			// $("input[name='nilai_yang_diakseptasi_modal_edit']").val(numtotal); // asli
			$("input[name='nilai_yang_diakseptasi_modal_edit']").val(numtotal4);
            $("input[name='nilai_yang_diakseptasi_modal_edit1']").val(total);
        }
    }
	
	$(document).ready(function() {
		$('#penagihan_barang_modal_edit').selectize({
            sortField: 'text'
        });
	});
</script>