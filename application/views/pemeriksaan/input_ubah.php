							<div class="box-body">
								<!--<form action="<?= base_url('pemeriksaan/tambah_aksi'); ?>" method="post">-->
								<form action="<?= base_url('pemeriksaan/ubah_aksi'); ?>" method="post">
									<?php foreach ($pemeriksaan as $per) { ?>
										<div class="form-group row">
											<label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pemeriksaan </label>
											<div class="col-sm-4">
												<input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $per->tanggal; ?>" >
											</div>
											<label for="id_periksa" class="col-sm-2 col-form-label">No. Pemeriksaan </label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="id_periksa" name="id_periksa" value="<?php echo $per->id_periksa; ?>" readonly >
												<input type="hidden"  name="kd_rm" value="<?= $per->kd_rm ?>">
											</div>
										</div>
										<div class="form-group row">
											<label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label> 
											<div class="col-sm-4">
												<textarea id="keluhan" name="keluhan" rows="3" cols="51" class="form-control" required="keluhan"><?php echo $per->keluhan; ?></textarea>
											</div>  
											<label for="diagnosa" class="col-sm-2 col-form-label">Diagnosis</label>
											<div class="col-sm-4">
												<textarea id="diagnosa" name="diagnosa" rows="3" cols="51" required="diagnosa" class="form-control"> <?php echo $per->diagnosa; ?> </textarea>
											</div>
										</div>
										<div class="form-group row">
											<!--<label  class="col-form-label col-sm-2">Tindakan</label>
											<div class="col-sm-4">
												<select class="form-control select2" name="tindakan[]" style="width: 100%;" required multiple="multiple" data-placeholder="Pilih Tindakan">
													<?php
														// $result = explode(",", $per->tindakan);
														// foreach ($tarif as $row) {
															// echo '<option value="' . $row['nama_tarif'] . '">' . $row['nama_tarif'] . '</option>';
														// }
														foreach ($tarif as $row) {
															echo '<option value="' . $row['nama_tarif'] . '">' . $row['nama_tarif'] . '</option>';
														}
													?>
												</select>
											</div> -->
											<label  class="col-form-label col-sm-2">Dokter Jaga</label>
											<div class="col-sm-4">
												<select class="form-control select2" name="dokter_jaga" style="width: 100%;" required data-placeholder="Pilih Dokter Jaga">
													<?php
														foreach ($datadokter as $row) {
															echo '<option value="'.$row['id_dokter'].'"   '.(($per->id_dokter==$row['id_dokter'])?'selected="selected"':'').'  >'.$row['nama'].'</option>';
														}
													?>
												</select>
											</div>
										</div>
										<hr>
										<h4>Pemeriksaan Fisik :</h4>
										<div class="form-group row">
											<label for="keluhan" class="col-sm-2 col-form-label">Tinggi Badan</label> 
											<div class="col-sm-4">
												<div class="input-group">
													<input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" value="<?php echo $per->tinggi_badan; ?>" onkeyup="functionKeyUp()" required >
													<span class="input-group-addon">cm</span>
												</div>
											</div>
											<label for="diagnosa" class="col-sm-2 col-form-label">Berat Badan</label>
											<div class="col-sm-4">
												<div class="input-group">
													<input type="text" class="form-control" id="berat_badan" name="berat_badan" value="<?php echo $per->berat_badan; ?>" onkeyup="functionKeyUp()" required >
													<span class="input-group-addon">kg</span>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="keluhan" class="col-sm-2 col-form-label">Lingkar Perut</label> 
											<div class="col-sm-4">
												<div class="input-group">
													<input type="text" class="form-control" id="lingkar_perut" name="lingkar_perut" value="<?php echo $per->lingkar_perut; ?>">
													<span class="input-group-addon">cm</span>
												</div>
											</div>
											<label for="diagnosa" class="col-sm-2 col-form-label">IMT</label>
											<div class="col-sm-4">
												<div class="input-group">
													<input type="text" class="form-control" id="imt" name="imt" value="<?php echo $per->imt; ?>" readonly >
													<span class="input-group-addon">kg/m2</span>
												</div>
											</div>
										</div>
										<hr>
										<h4>Tekanan Darah :</h4>
										<div class="form-group row">
											<label for="keluhan" class="col-sm-2 col-form-label">Sistole</label> 
											<div class="col-sm-4">
												<div class="input-group">
													<input type="text" class="form-control" id="sistole" name="sistole" value="<?php echo $per->sistole; ?>">
													<span class="input-group-addon">mmHg</span>
												</div>
											</div>
											<label for="diagnosa" class="col-sm-2 col-form-label">Diastole</label>
											<div class="col-sm-4">
												<div class="input-group">
													<input type="text" class="form-control" id="diastole" name="diastole" value="<?php echo $per->diastole; ?>">
													<span class="input-group-addon">mmHg</span>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="keluhan" class="col-sm-2 col-form-label">Respiratory Rate</label> 
											<div class="col-sm-4">
												<div class="input-group">
													<input type="text" class="form-control" id="respiratory_rate" name="respiratory_rate" value="<?php echo $per->respiratory_rate; ?>">
													<span class="input-group-addon">/ minute</span>
												</div>
											</div>
											<label for="diagnosa" class="col-sm-2 col-form-label">Heartrate</label>
											<div class="col-sm-4">
												<div class="input-group">
													<input type="text" class="form-control" id="heartrate" name="heartrate" value="<?php echo $per->heartrate; ?>">
													<span class="input-group-addon">bpm</span>
												</div>
											</div>
										</div>
										<div class="box-footer">
											<button type="submit" name="tambah" class="btn btn-success">Simpan</button>
											<!--<a href="<?= base_url('pemeriksaan/periksa/'.$per->kd_rm) ?>" class="btn btn-primary">Kembali</a>-->
											<!--<a href="<?= base_url('pemeriksaan') ?>" class="btn btn-primary">Kembali</a> -->
										</div>
									<?php } ?>
								</form>
							</div>
							
							
						</div>
							
							
							<h3> Resep Obat </h3>
							<div class="box box-success">
								<div class="box-body">
									<form action="<?= base_url('resep_obat/tambah_aksi_pemeriksaan'); ?>" method="post">
										<?php foreach ($data_pemeriksaan as $u) { ?>
											<!--<input type="hidden" class="form-control" id="kd_resep" name="kd_resep" value="<?= $koderesep ?>" readonly>-->
											<input type="hidden" class="form-control" id="kd_rm" name="kd_rm" value="<?= $u->kd_rm ?>" readonly>
											<input type="hidden" class="form-control" id="id_periksa" name="id_periksa" value="<?= $u->id_periksa ?>" readonly>
											<input type="hidden" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $u->nama_pasien ?>" readonly>
											<input type="hidden" class="form-control" id="kd_resep" name="kd_resep" value="<?= $u->kd_resep ?>" readonly>
											<input type="hidden" class="form-control" id="kd_resep" name="pengobatan" value="<?= $u->pengobatan ?>" readonly>
											<input type="hidden" class="form-control" id="tanggal_resep" name="tanggal_resep" value="<?= date('Y-m-d')?>" >
										<?php } ?>
										<div class="form-group row">
											<label  class="col-sm-2 col-form-label">Nama Obat </label>
											<div class="col-sm-3">
												<select class="form-control select2" id="id_obat" name="id_obat" >
													<option selected="selected">Pilih Obat</option>
														<?php foreach ($obat as $r) : ?>
														<option value="<?= $r->id_obat ?>" value="<?= $r->id_obat ?>"><?= $r->nama_obat ?></option>
														<?php endforeach; ?>
												</select>
											</div>
											<label for="harga" class="col-sm-1 col-form-label">Harga </label>
											<div class="col-sm-2">
												<input type="text" class="form-control" id="harga" name="harga" readonly >         
											</div>
											<label for="stok" class="col-sm-1 col-form-label">Stok </label>
											<div class="col-sm-1">
												<input type="text" class="form-control" id="stok" name="stok" readonly >         
											</div>
											<label for="stok_out" class="col-sm-1 col-form-label">Stok Keluar </label>
											<div class="col-sm-1">
												<input type="number" class="form-control" name="stok_out" id="stok_out" >         
											</div>
										</div>
										<div class="form-group row">
											<label for="aturan_pakai" class="col-sm-2 control-label">Aturan Pakai</label>
											<div class="col-sm-10">
												<!--<select class="form-control select2" multiple="multiple" id="aturan_pakai" name="aturan_pakai[]"><option value=''>Pilih Aturan Pakai</option>
													<?php foreach ($aturan as $r) : ?>
														<option value="<?= $r->nama_aturan ?>"><?= $r->nama_aturan ?></option>
													<?php endforeach; ?>
												</select> -->
												<textarea id="aturan_pemakaian" name="aturan_pemakaian" rows="3" cols="51" required="aturan_pakai" class="form-control"> </textarea>
											</div>
										</div>
										<div class="box-footer">
											<input type="submit" name="tambah" class="btn btn-primary" id="simpandata" value="Tambah List Obat">
										</div>
										<hr>
										<h3 class="box-title">Data Resep Obat</h3>
										<table id="example2" class="table table-bordered table-striped ">
											<thead>
												<tr>
													<th>No.</th>
													<th>Nama Obat</th>
													<th>Aturan Pakai</th> 
													<th>Harga</th>
													<th>Stok</th>
													<th>Stok Keluar</th> 
													<th>Total Stok</th>
													<th>Total</th>
													<th>Kode Pemeriksaan</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													  $no_rm = 1;
													  foreach($resep as $r) {
												 ?> 
												<tr>
													<td><?= $no_rm ++ ?></td>
													<td><?= $r->nama_obat ?></td>
													<td><?= $r->aturan_pakai ?></td>
													<td><?= 'Rp. '.number_format($r->harga,0,',','.') ?></td>
													<td><?= $r->stok ?></td>
													<td><?= $r->stok_out ?></td>
													<td><?= $r->stok_tot ?></td>
													<td><?= 'Rp. '.number_format($r->total,0,',','.') ?></td>
													<td><?= $r->id_pemeriksaan ?></td>
													<td>
														<!--<a href="<?= base_url('resep_obat/hapus/'.$r->id_detail.'/'.$r->id_pemeriksaan) ?>" class="btn btn-danger btn-xs float-right">Hapus</a> -->
														<a href="<?= base_url('pemeriksaan/hapus_resep/'.$r->id_detail.'/'.$r->id_pemeriksaan.'/'.$r->kd_resep.'/'.$r->stok_out.'/'.$r->id_obat) ?>" class="btn btn-danger btn-xs float-right">Hapus</a>
													</td>
												</tr> 
												<?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="7" style="text-align: center;">Subtotal</td>
													<td><?= "Rp. ".number_format($subtotal,0,',','.')." ,00" ?></td>
													<td>
														<center>
															<div class="box-footer">
																<a class="btn btn-warning" href="<?= base_url().'cetak/cetak_resep/'.$koderesep ?>">Cetak</a> 
																<!--<a class="btn btn-primary" href="<?= base_url().'resep_obat/hapus_detail_resep/'.$koderesep ?>">Batal</a>-->
															</div>
														</center>
													</td>
												</tr>
											</tfoot>
										</table>
										<input type="submit" class="btn btn-success" value="Simpan" name="simpan">
									</form>
								</div>
							</div>
							
							<h3> Tindakan </h3>
							<div class="box box-success">
								<div class="box-body">
									<form action="<?= base_url('pembayaran/tambah_aksi_pembayaran'); ?>" method="post">
										<input type="hidden" class="form-control" id="kd_bayar" name="kd_bayar" value="<?= $kodebayar ?>" readonly>
										<?php foreach ($data_pemeriksaan as $b){ ?>
										<input type="hidden" class="form-control" id="kd_resep" name="kd_resep" value="<?php echo  $b->kd_resep ?>" readonly>
										<input type="hidden" class="form-control" id="id_periksa" name="id_periksa" value="<?php echo  $b->id_periksa ?>" readonly>
										<?php } ?>
										<div class="form-group row">
											<label for="kode_bayar" class="col-sm-1 col-form-label">Tanggal </label>
											<div class="col-sm-2">
												<input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" value="<?= date('Y-m-d')?>" >
											</div>
											<label for="nama_tarif" class="col-sm-1 col-form-label">Tindakan</label> 
											<div class="col-sm-4">
												<select class="form-control select2"  id="id_tarif" name="id_tarif"><option value=''>Pilih Tindakan</option>
													<?php foreach ($tarif as $r) : ?>
														<option value="<?= $r['id_tarif'] ?>"><?= $r['nama_tarif'] ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<label for="harga" class="col-sm-1 col-form-label">Harga </label>
											<div class="col-sm-2">
												<input type="text" class="form-control" id="hargatarif" name="hargatarif" readonly>         
											</div>  
										</div>
										<div class="box-footer">
											<input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
										</div>
										
										<div class="box-header">
											<h3 class="box-title">Data Pembayaran</h3>
										</div>
										<div class="box-body">
											<table id="example2" class="table table-bordered table-hover ">
												<thead>
													<tr>
														<th>No.</th>
														<th>Jasa</th>
														<th>Harga</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
														  $no_rm = 1;
														  foreach($bayar as $r) {
													 ?> 
														<tr>
														  <td><?php echo $no_rm ++ ?></td>
														  <td><?php echo $r->nama_tarif ?> </td>
														  <td style="text-align: right;"><?php echo 'Rp. '.number_format($r->total,0,',','.') ?></td>
														  <td> <!--<a href="<?= base_url('pembayaran/hapus_pembayaran/'.$r->id_detail.'/'.$r->kd_bayar.'/'.$r->id_tarif) ?>" class="btn btn-danger btn-xs float-right">Hapus</a> --> </td>
														</tr> 
													<?php } ?>
												</tbody>
												<tfoot>
													<tr>
														<td colspan="2" style="font-weight: bold; text-align: center; ">Sub Total Tindakan</td>
														<td style="text-align: right;"><?php echo "Rp. ".number_format($subtotalbayar,0,',','.') ?></td>
														<td> </td>
													</tr>
													<tr>
														<td colspan="2" style="font-weight: bold; text-align:center;"> Biaya Obat </td>
														<?php foreach ($kode as $b) { ?>
														<td style="text-align: right;"><?php echo "Rp. ".number_format($b->subtotal,0,',','.') ?>  </td>
														<?php } ?>
														<td></td>
													</tr>
													<tr>
														<td colspan="2" style="font-weight: bold; text-align: center;">Total Bayar</td>
														<td style="text-align: right;"><?php echo "Rp. ".number_format($totalbayar,0,',','.') ?></td>
														<td><!--<center> <a class="btn btn-warning" href="<?php echo base_url().'Pembayaran/hapus_detail_bayar/'.$kodebayar; ?>">Batal</a> </center> --></td>
													</tr>
												</tfoot>
											</table>
										</div>
										<input type="submit" class="btn btn-success" value="Simpan" name="save">
									</form>
								</div>
							</div>
						
						
					</div>
            	</div>           	
            </div>
        </div>
    </div>
</div>
<script>
// $(document).ready(function() {
	function functionKeyUp() {
		var t = $("input[name='tinggi_badan']").val();
		var tinggi = t/100; // ukuran dalam meter
		var berat = $("input[name='berat_badan']").val();
		var tinggibadan = parseFloat(tinggi);
		var beratbadan = parseFloat(berat);
		var nilaiimt = beratbadan/(tinggibadan * tinggibadan);
		var imt = nilaiimt.toFixed(2);
		$("input[name='imt']").val(imt);
	}
// });	
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#id_obat").chosen();
    $("#id_tarif").chosen();
})
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#id_obat').change(function() {
		var id = $(this).val();
		$.ajax({
			type : 'POST',
			url : '<?= base_url('resep_obat/cek_obat') ?>',
			Cache : false,
			dataType: "json",
			data : 'id_obat='+id,
			success : function(resp) {
										$('#id_obat').val(resp.id_obat);
										$('#stok').val(resp.stok);
										$('#harga').val(resp.harga);  
									}
		});
      // alert(id);
    });
	
	$('#id_tarif').change(function() {
		var id1 = $(this).val();
		$.ajax({
			type : 'POST',
			url : '<?= base_url('resep_obat/cek_tarif') ?>',
			Cache : false,
			dataType: "json",
			data : 'id_tarif='+id1,
			success : function(resp) {
										$('#id_tarif').val(resp.id_tarif);
										$('#hargatarif').val(resp.harga);
									}
		});
		// alert(id1);
    });
	
	$("#simpandata").click(function(){
		$('#stok_out').prop('required',true);
		$('#aturan_pakai').prop('required',true);
	});
});
</script>