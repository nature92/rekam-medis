            <!-- /.box-header -->
            <!-- form start -->
    <div class="box-body">
		<form action="<?= base_url('pemeriksaan/tambah_aksi'); ?>" method="post">
			<?php foreach ($pasien as $u) { } ?>
				<div class="form-group row">
					<label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pemeriksaan </label>
					<div class="col-sm-4">
						<input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>" >
					</div>
					<label for="id_periksa" class="col-sm-2 col-form-label">No. Pemeriksaan </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="id_periksa" name="id_periksa" value="<?= $kodeperiksa; ?>" readonly>
						<?php foreach ($pasien as $p) { ?>
							<input type="hidden"  name="kd_rm" value="<?= $p->kd_rm ?>">
						<?php } ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label> 
					<div class="col-sm-4"> 
						<!--<textarea class="form-control" id="keluhan" name="keluhan" rows="2" required="keluhan"></textarea> -->
						<textarea id="keluhan" name="keluhan" rows="3" cols="51" class="form-control" required="keluhan"> </textarea>
					</div>  
					<label for="diagnosa" class="col-sm-2 col-form-label">Diagnosis</label>
					<div class="col-sm-4">
						<!--<textarea class="form-control" id="diagnosa" name="diagnosa" rows="2" required="diagnosa">
						</textarea> -->
						<textarea id="diagnosa" name="diagnosa" rows="3" cols="51" required="diagnosa" class="form-control"> </textarea>
					</div>
				</div>
				<div class="form-group row">
					<!--<label for="terapi" class="col-sm-2 col-form-label">Terapi</label>
					<div class="col-sm-4">
						<textarea id="terapi" name="terapi" rows="3" cols="51" required="terapi" class="form-control"> </textarea>
					</div>-->
					<!--<label class="col-form-label col-sm-2">Tindakan</label>
					<div class="col-sm-4">
						<div class="form-check">
						  <?php foreach ($tarif as $r) : ?>
						<div class="form-check">
						  <input class="minimal" type="checkbox" multiple name="tindakan[]" value="<?= $r['nama_tarif']?>" >
						  <label class="form-check-label" >
									<?= $r['nama_tarif'] ?>
						  </label>
						</div>
						<?php endforeach; ?>
						</div> 
					</div>-->
					<?php if($this->session->userdata('status') == 'admin'){ ?>
					<label  class="col-form-label col-sm-2">Dokter Jaga</label>
					<div class="col-sm-4">
						<select class="form-control select2" name="dokter_jaga" style="width: 100%;" required data-placeholder="Pilih Dokter Jaga">
							<?php
								foreach ($datadokter as $row) {
									echo '<option value="' . $row['id_dokter'] . '">' . $row['nama'] . '</option>';
								}
							?>
						</select>
					</div>
					<?php }else{ ?>
						<label class="col-form-label col-sm-2">Tindakan</label>
						<div class="col-sm-4">
							<select class="form-control select2" name="tindakan[]" style="width: 100%;" required multiple="multiple" data-placeholder="Pilih Tindakan">
								<?php
									foreach ($tarif as $row) {
										echo '<option value="' . $row['nama_tarif'] . '">' . $row['nama_tarif'] . '</option>';
									}
								?>
							</select>
						</div>
					<?php } ?>
				</div>
				<hr>
				<h4>Pemeriksaan Fisik :</h4>
				<div class="form-group row">
					<label for="keluhan" class="col-sm-2 col-form-label">Tinggi Badan</label> 
					<div class="col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan">
							<span class="input-group-addon">cm</span>
						</div>
					</div>
					<label for="diagnosa" class="col-sm-2 col-form-label">Berat Badan</label>
					<div class="col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control" id="berat_badan" name="berat_badan">
							<span class="input-group-addon">kg</span>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="keluhan" class="col-sm-2 col-form-label">Lingkar Perut</label> 
					<div class="col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control" id="lingkar_perut" name="lingkar_perut">
							<span class="input-group-addon">cm</span>
						</div>
					</div>
					<label for="diagnosa" class="col-sm-2 col-form-label">IMT</label>
					<div class="col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control" id="imt" name="imt">
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
							<input type="text" class="form-control" id="sistole" name="sistole">
							<span class="input-group-addon">mmHg</span>
						</div>
					</div>
					<label for="diagnosa" class="col-sm-2 col-form-label">Diastole</label>
					<div class="col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control" id="diastole" name="diastole">
							<span class="input-group-addon">mmHg</span>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="keluhan" class="col-sm-2 col-form-label">Respiratory Rate</label> 
					<div class="col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control" id="respiratory_rate" name="respiratory_rate">
							<span class="input-group-addon">/ minute</span>
						</div>
					</div>
					<label for="diagnosa" class="col-sm-2 col-form-label">Heartrate</label>
					<div class="col-sm-4">
						<div class="input-group">
							<input type="text" class="form-control" id="heartrate" name="heartrate">
							<span class="input-group-addon">bpm</span>
						</div>
					</div>
				</div>
				<div class="box-footer">
					  <button type="submit" name="tambah" class="btn btn-success">Simpan</button>
				</div>
		</form>
    </div>

              </div>
        <div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Data Pemeriksaan</h3>
            </div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped ">
                    <thead>
						<tr>
							<th>No.</th>
							<th>Tanggal</th>
							<th>Kode Pemeriksaan</th>
							<th>Diagnosa</th>
							<th>Keluhan</th>
							<th>Tindakan</th>
							<!--<th>Terapi</th>-->
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							  $no_rm = 1;
							  foreach($pemeriksaan as $r) {
						 ?> 
						<tr>
							<td><?= $no_rm ++ ?></td>
							<td><?= $r->tanggal ?></td>
							<td><?= $r->id_periksa ?></td>
							<td><?= $r->diagnosa ?></td> 
							<td><?= $r->keluhan ?></td>
							<td><?= $r->tindakan ?></td>
							<!--<td><?= $r->terapi ?></td>-->
							<td>							
								<a href="<?= base_url('pemeriksaan/ubah/'.$r->id_periksa) ?>" class="btn btn-info float-right">Ubah</a>
								<a href="<?= base_url('pemeriksaan/hapus/'.$r->id_periksa) ?>" class="btn btn-danger float-right" onclick="return confirm('yakin dok, mau dihapus?');">Hapus</a>
							</td>
						</tr> 
						 <?php } ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
          					
            	</div>           	
            </div>
        </div>
    </div>
</div>