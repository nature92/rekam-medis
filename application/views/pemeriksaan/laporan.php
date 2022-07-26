<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1> <?= $judul; ?> </h1>
    </section>
    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<link rel="stylesheet" href="<?php echo base_url('assets/vendor/jquery/jquery-ui.min.css'); ?>" />
						<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
							<form method="get" action="" class="form">
								<div class="form-group">
									<label>Filter Berdasarkan</label>
									<select class="form-control" name="filter" id="filter" style="width: 50%">
										<option value="">Pilih</option>
										<option value="1">Per Tanggal</option>
										<option value="2">Per Kode RM</option>                    
										<option value="3">Per Bulan</option>                    
									</select>
								</div>
								<div class="form-group" id="form-tanggal">
									<label>Dari Tanggal</label>
									<input type="date" name="tanggal" class="form-control input-tanggal" style="width: 50%"/>
								</div>
								<div class="form-group" id="form-tanggal2">
									<label>Sampai Tanggal</label>
									<input type="date" name="tanggal2" class="form-control input-tanggal2" style="width: 50%"/>
								</div>
								<div class="form-group" id="form-kd_rm">
									<label>Pasien</label><br>
									<select name="kd_rm" class="form-control select2" style="width: 50%">
										<option value="">Pilih</option>
										<?php
											foreach($kd_rm as $data){ // Ambil data tahun dari model yang dikirim dari controller
												echo '<option value="'.$data->kd_rm.'">'.$data->kd_rm.' | '.$data->nama_pasien.'</option>';
											}
										?>
									</select>
								</div>
								<div class="form-group" id="form-bulanfilter">
									<label>Bulan</label><br>
									<select name="bulanfilter" class="form-control select2" style="width: 50%">
										<option value="0">Pilih</option>
										<option value="01">JANUARI</option>
										<option value="02">FEBRIARI</option>
										<option value="03">MARET</option>
										<option value="04">APRIL</option>
										<option value="05">MEI</option>
										<option value="06">JUNI</option>
										<option value="07">JULI</option>
										<option value="08">AGUSTUS</option>
										<option value="09">SEPTEMBER</option>
										<option value="10">OKTOBER</option>
										<option value="11">NOPEMBER</option>
										<option value="12">DESEMBER</option>
									</select>
								</div>
								  <!-- <div class="form-group" id="form-kd_pasien">
									<label>Kode Pasien</label>
									<select name="kd_pasien" class="form-control" style="width: 50%">
									  <option value="">Pilih</option>
									  <?php
										foreach($kd_pasien as $data){ // Ambil data tahun dari model yang dikirim dari controller
										  echo '<option value="'.$data->kd_pasien.'">'.$data->nama_pasien.'</option>';
										}
									  ?>
									</select>
								  </div> -->
								<button class="btn btn-primary" type="submit">Tampilkan</button>
								<a href="<?php echo base_url()."pemeriksaan/laporan"; ?>" class="btn btn-warning">Reset Filter</a>
							</form>
						
						<div class="card-body">
							<h3 ><?php echo $ket; ?></h3>
							<a target="_blank" href="<?php echo $url_cetak; ?>" class="btn btn-default" ><i class="fa fa-print"></i> CETAK PDF</a>
								<div class="box-body">
									<table id="example2" class="table table-bordered table-striped ">
										<thead style="text-align: center">
											<tr>
												<th >NO</th>
												<th >Tanggal Pemeriksaan</th>
												<th >Kode RM</th>
												<th >Kode Periksa</th>
												<th >Nama</th>
												<th >Keluhan</th>
												<th >Diagnosis</th>
												<th >Tindakan</th>
												<!-- style="width: 27%;" -->
											</tr>
										</thead>
										<tbody>
										<?php
											if( ! empty($pemeriksaan)){
												$no = 1;
												foreach($pemeriksaan as $data){
										?>    
											<tr>
												<td style="text-align: center;"><?php echo $no++ ?></td>
												<td><?php echo date('d-m-Y', strtotime($data['tanggal'])); ?></td>
												<td><?php echo $data['kd_rm'] ?></td>
												<td><?php echo $data['id_periksa'] ?></td>
												<td><?php echo $data['nama_pasien'] ?></td>
												<td><?php echo $data['keluhan']?></td> 
												<td><?php echo $data['diagnosa'] ?></td>
												<td><?php echo $data['tindakan'] ?></td>
											</tr>
										<?php 	}
											}
										?>
										</tbody>
									<script src="<?php echo base_url('assets/vendor/jquery/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
									<script>
									$(document).ready(function(){ // Ketika halaman selesai di load
										$('#form-tanggal, #form-tanggal2, #form-kd_rm, #form-kd_pasien, #form-bulanfilter').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
										$('#filter').change(function(){ // Ketika user memilih filter
											if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
												$('#form-tanggal2, #form-kd_rm, #form-kd_pasien, #form-bulanfilter').hide();
												$('#form-tanggal').show(); // Tampilkan form tanggal
												$('#form-tanggal2').show(); // Tampilkan form tanggal
											}else if($(this).val() == '2'){ // Jika filter nya 2 (per kode rm)
												$('#form-tanggal, #form-tanggal2, #form-kd_pasien, #form-bulan, #form-bulanfilter').hide();
												$('#form-kd_rm').show(); // Tampilkan form kode rm
											}else if($(this).val() == '3'){ // Jika filter nya 2 (per bulan)
												$('#form-tanggal, #form-tanggal2, #form-kd_rm').hide();
												$('#form-kelas, #form-tahun, #form-bulanfilter').show(); // Tampilkan form bulan dan tahun
											}else{ // Jika filternya 3 (per tahun)
												$('#form-tanggal, #form-tanggal2, #form-nis, #form-kelas, #form-tahun').hide();
											}
											$('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
										})
									})
									</script>
									</table>
								</div>
						</div>
					</div>
				</div>