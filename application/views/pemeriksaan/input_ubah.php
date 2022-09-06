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
					<label  class="col-form-label col-sm-2">Tindakan</label>
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
					</div>
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
					  <a href="<?= base_url('pemeriksaan/periksa/'.$per->kd_rm) ?>" class="btn btn-primary">Kembali</a>
				</div>
			<?php } ?>
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