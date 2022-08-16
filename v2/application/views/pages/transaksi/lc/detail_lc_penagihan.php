<!--<button class='btn btn-primary' onclick="javascript:history.go(-1)"> <i class="fa fa-arrow-left"></i> Kembali </button>-->
<a href="<?= base_url() ?>transaksi/lc#tabs-icons-text-4" class='btn btn-primary'><i class="fa fa-arrow-left"></i> Kembali</a>
<button class='btn btn-success' onclick="unlockEdit1()" id="unlockedit1"> <i class="fa fa-unlock"></i> Tambah Shipment </button>
<button class='btn btn-danger' onclick="lockEdit1()" id="lockedit1"> <i class="fa fa-lock"></i> Tambah Shipment </button>
<?php  foreach($penagihan_lc as $row) { ?>
<a href="<?php echo base_url(); ?>transaksi/lc/hapusLcSkbdn/<?php echo $row->uid; ?>" class="btn btn-danger" onclick="javascript: return confirm('Yakin hapus transaksi LC/SKBDN ?')" href="#"><i class='fa fa-trash'></i> Hapus</a>
<?php  } ?>
<br><br>
<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" href="#data-table" role="button"> Detail Penagihan/Jatuh Tempo LC/SKBDN </a>
        </div>
    </div>
	<form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/editLcPenagihanDokumen"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="card-body table-responsive res-pad">
		<div class="row">

            <!-- Id SCF -->
			<?php  foreach($penagihan_lc as $row) { ?>
            <input hidden id="uid_edit" name="uid" value="<?php echo $row->uid; ?>"/>
			<input hidden id="id_lc_edit" name="id_lc" value="<?php echo $row->id_lc; ?>"/>
			<input type="hidden" class="form-control" id="nomor_kontrak_ubah" name="nomor_kontrak_ubah" placeholder="No Kontrak" value="<?php echo $row->nomor_kontrak; ?>" >
			<input type="hidden" class="form-control" id="tahapan_ubah" name="tahapan_ubah" placeholder="Tahapan" value="<?php echo $row->tahapan; ?>" >
			<input type="hidden" class="form-control" id="nomor_po_ubah" name="nomor_po_ubah" placeholder="Nomor PO" value="<?php echo $row->nomor_po; ?>" >
			<?php  } ?>
			
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
			
			<!-- No LC/SKBDN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">No LC/SKBDN</label>
                <div id='input-nomor_surat_ubah'>
                    <input type="text" class="form-control" id="nomor_surat_ubah" name="nomor_surat_ubah" placeholder="No Surat" value="<?php echo $row->no_lc_skbdn; ?>" readonly >
                </div>
            </div>
			
			<!-- Tanggal LC/SKBDN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal LC/SKBDN</label>
                <div id='input-tanggal_lc_skbdn_ubah'>
                    <input type="date" class="form-control" id="tanggal_lc_skbdn_ubah" name="tanggal_lc_skbdn_ubah" placeholder="Tanggal LC/SKBDN" value="<?php echo $row->tanggal_lc_skbdn; ?>" readonly >
                </div>
            </div>
			
			<!-- Tanggal Exp. LC/SKBDN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal Exp. LC/SKBDN</label>
                <div id='input-tanggal_exp_lc_skbdn_ubah'>
                    <input type="text" class="form-control" id="tanggal_exp_lc_skbdn_ubah" name="tanggal_exp_lc_skbdn_ubah" placeholder="Tanggal Exp. LC/SKBDN" value="<?php echo $row->tanggal_exp_lc_skbdn; ?>" readonly >
                </div>
            </div>
			
			<!-- Tenor Hari -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tenor Hari</label>
                <div id='input-tenor_hari_ubah'>
                    <input type="text" class="form-control" id="tenor_hari_ubah" name="tenor_hari_ubah" placeholder="Tenor Hari" value="<?php echo $row->tenor_hari; ?>" readonly >
                </div>
            </div>
			
			<!-- Keterangan Tenor -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Keterangan Tenor</label>
                <div id='input-keterangan_tenor_ubah'>
                    <input type="text" class="form-control" id="keterangan_tenor_ubah" name="keterangan_tenor_ubah" placeholder="Keterangan Tenor" value="<?php echo $row->keterangan_tenor; ?>" readonly >
                </div>
            </div>
			
			<!-- Nilai LC/SKBDN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nilai LC/SKBDN</label>
                <div id='input-nilai_lc_atau_skbdn_ubah'>
                    <input type="text" class="form-control input-number number-separator" id="nilai_lc_atau_skbdn_ubah" name="nilai_lc_atau_skbdn_ubah" placeholder="Nilai LC/SKBDN" value="<?php echo  number_format($row->nilai_lc_atau_skbdn); ?>" readonly >
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
                <label class="col-form-label">Supplier</label>
                <div id='input-vendor_ubah'>
                    <input type="text" class="form-control" id="vendor_ubah" name="vendor_ubah" placeholder="Vendor" value="<?php echo $row->vendor; ?>" readonly >
                </div>
            </div>
			
			<!-- Issuing Bank -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Issuing Bank</label>
                <div id='input-issuing_bank_ubah3'>
                    <input type="text" class="form-control" id="issuing_bank_ubah3" name="issuing_bank_ubah3" placeholder="Issuing Bank" value="<?php echo $row->issuing_bank; ?>" readonly >
                </div>
            </div>

			<!-- Nama Barang -->
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
									<td><center>". number_format($data->quantity)."</center></td>
									<td><center>". $data->satuan."</center></td>
								 </tr>";
								 $i++;
						} ?>
					</tbody>
				</table>
			</div>
			
			<hr class="col-11 hr-input-modal" />						
			
			<!-- No Surat Akseptasi ISC -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">No Surat Akseptasi ISC</label>
                <div id='input-nomor_surat_akseptasi_isc'>
                    <input type="text" class="form-control" id="nomor_surat_akseptasi_isc" name="nomor_surat_akseptasi_isc" placeholder="No Surat Akseptasi ISC" value="<?php //echo $row->nomor_surat_akseptasi_isc; ?>" required>
                </div>
            </div>
			
			<!-- Tanggal Surat Akseptasi -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal Surat Akseptasi</label>
                <div id='input-tanggal_surat_akseptasi'>
                    <input type="date" class="form-control" id="tanggal_surat_akseptasi" name="tanggal_surat_akseptasi" placeholder="Tanggal Surat Akseptasi" value="<?php //echo $row->tanggal_surat_akseptasi; ?>" >
                </div>
            </div>

            <!-- Tanggal Disposisi Manager -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal Disposisi Manager</label>
                <div id='input-tanggal_disposisi_manager'>
                    <input type="date" class="form-control" id="tanggal_disposisi_manager" name="tanggal_disposisi_manager" placeholder="Tanggal Disposisi Manager" value="<?php //echo $row->tanggal_disposisi_manager; ?>" >
                </div>
            </div>
			
			<!-- Tanggal Pengajuan Akseptasi Ke -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal Pengajuan Akseptasi Ke Bank</label>
                <div id='input-tanggal_pengajuan_akseptasi_ke'>
                    <input type="date" class="form-control" id="tanggal_pengajuan_akseptasi_ke" name="tanggal_pengajuan_akseptasi_ke" placeholder="Tanggal Pengajuan Akseptasi Ke" value="<?php //echo $row->tanggal_pengajuan_akseptasi_ke; ?>" required >
                </div>
            </div>
			
			<!-- Tanggal Masuk Dokumen -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal Masuk Dokumen</label>
                <div id='input-tanggal_masuk_dokumen'>
                    <input type="date" class="form-control" id="tanggal_masuk_dokumen" name="tanggal_masuk_dokumen" placeholder="Tanggal Masuk Dokumen" value="<?php //echo $row->tanggal_masuk_dokumen; ?>" required >
                </div>
            </div>

            <!-- Currency -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Currency</label>
                <div id='input-currency'>
                    <input type="text" class="form-control" id="currency" name="currency" placeholder="Currency" value="<?php echo $row->mata_uang; ?>" readonly required>
                </div>
            </div>

            <!-- Nilai Tagihan -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nilai Tagihan</label>
                <div id='input-nilai_tagihan'>
                    <input type="text" class="form-control input-number number-separator" id="nilai_tagihan" name="nilai_tagihan" placeholder="Nilai Tagihan" value="<?php //echo number_format($row->nilai_tagihan); ?>" onkeyup="getDataAktif(this.value);" required>
                </div>
            </div>
			
			<!-- Bunga Upas -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Bunga Upas</label>
                <div id='input-bunga_upas'>
                    <input type="text" class="form-control input-number number-separator" id="bunga_upas" name="bunga_upas" placeholder="Bunga Upas" value="<?php //echo number_format($row->bunga_upas); ?>" onkeyup="getDataAktif(this.value);" required>
                </div>
            </div>
			
			<!-- Potongan -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Potongan</label>
                <div id='input-potongan'>
                    <input type="text" class="form-control input-number number-separator" id="potongan" name="potongan" placeholder="Potongan" value="<?php //echo number_format($row->potongan); ?>" onkeyup="getDataAktif(this.value);" required>
                </div>
            </div>
			
			<!-- Keterangan Potongan -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Keterangan Potongan</label>
                <div id='input-keterangan_potongan'>
                    <input type="text" class="form-control" id="keterangan_potongan" name="keterangan_potongan" placeholder="Keterangan Potongan" value="<?php //echo $row->keterangan_potongan; ?>" required>
                </div>
            </div>
			
			<!-- Barang -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Barang</label>
                <div id='input-penagihan_barang'>
                    <select id="penagihan_barang-add" name="penagihan_barang" required> 
                        <option value="" disabled selected>Pilih Barang</option>
                        <?php foreach ($penagihan_barang as $barang): ?>
                            <option value="<?= $barang->id_barang_lc ?>"><?= $barang->nama_barang ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
			
			<!-- Quantity Barang -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Quantity Barang</label>
                <div id='input-jumlah_volume_barang_quantity'>
                    <input type="text" class="form-control" id="jumlah_volume_barang_quantity" name="jumlah_volume_barang_quantity" placeholder="Quantity Barang" value="<?php //echo $row->jumlah_volume_barang_quantity; ?>" required>
                </div>
            </div>
			
			<!--Satuan Barang -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Satuan Barang</label>
                <div id='input-jumlah_volume_barang_satuan'>
                    <input type="text" class="form-control" id="jumlah_volume_barang_satuan" name="jumlah_volume_barang_satuan" placeholder="Satuan Barang" value="<?php //echo $row->jumlah_volume_barang_satuan; ?>" required>
                </div>
            </div>
			
			<!-- Nilai Yang Diakseptasi -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Nilai Yang Diakseptasi</label>
                <div id='input-nilai_yang_diakseptasi'>
                    <input type="text" class="form-control input-number number-separator" id="nilai_yang_diakseptasi" name="nilai_yang_diakseptasi" placeholder="Nilai Yang Diakseptasi" value="<?php echo number_format($row->nilai_yang_diakseptasi); ?>" readonly required>
                    <input type="hidden" class="form-control input-number number-separator" id="nilai_yang_diakseptasi_edit1" name="nilai_yang_diakseptasi_edit1" placeholder="Nilai Yang Diakseptasi" readonly required>
                </div>
            </div>
			
			<!-- Tanggal Jatuh Tempo Bayar -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Tanggal Jatuh Tempo Bayar</label>
                <div id='input-tanggal_jatuh_tempo'>
                    <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" placeholder="Tanggal Jatuh Tempo Bayar" value="<?php //echo $row->tanggal_jatuh_tempo; ?>" required >
                </div>
            </div>
			
			<!-- Keterangan Penagihan -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Keterangan Penagihan</label>
                <div id='input-keterangan_penagihan'>
                    <input type="text" class="form-control" id="keterangan_penagihan" name="keterangan_penagihan" placeholder="Keterangan Penagihan" value="<?php //echo $row->keterangan_penagihan; ?>" required>
                </div>
            </div>
			
			<!-- Status Penagihan -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Status Penagihan</label>
                <div id='input-status_penagihan'>
					<select class="form-control" id="status_penagihan" name="status_penagihan" onchange="getRefinancing(0, this.value);"> 
						 <option value="BAYAR" <?php if($row->status_penagihan=='BAYAR') echo 'selected' ?> >BAYAR</option>
						 <option value="REFINANCING" <?php if($row->status_penagihan=='REFINANCING') echo 'selected' ?> >REFINANCING</option>
					 </select>
                </div>
            </div>
			
			<!-- Tanggal Jatuh Tempo Refinancing -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label" id="label_tanggal_jatuh_tempo_refinancing-add">Tanggal Jatuh Tempo Refinancing</label>
                <div id='input-tanggal_jatuh_tempo_refinancingsss'>
                    <input type="date" class="form-control" id="tanggal_jatuh_tempo_refinancingsss" name="tanggal_jatuh_tempo_refinancingsss" placeholder="Tanggal Jatuh Tempo Refinancing" value="<?php //echo $row->tanggal_jatuh_tempo; ?>" >
                </div>
            </div>
			
			<!-- Dok kelengkapan -->
            <!--<div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Dok kelengkapan</label>
                <div id='input-release_dokumen-add'>					
					<table class="table table-bordered table-hover" id="tab_logic_doc_release_dok">
						<tbody>
							<?php
								$id1 = 0;
								$no1 = 1;
							if($detail_release){
								foreach ($detail_release as $row8) {
							?>
							<tr id='<?php echo 'releaseDokumen'. $id1; ?>'>
								<td>
									<input class='form-control' type="file" id='<?php echo 'release_dokumen_draft'. $id1; ?>' name='<?php echo 'release_dokumen_draft'. $id1; ?>' accept="application/pdf">File hasil upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/release_dokumen/".$row8->dokumen_lc.".pdf' target='_blank'>".$row8->dokumen_lc; ?>
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
									<input class='form-control' type="file" id='release_dokumen_draft0' name='release_dokumen_draft0' accept="application/pdf">
								</td>   
							</tr>
							<tr id='releaseDokumen1'></tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a id="add_row_release_dokumen1" class="pull-left btn btn-success " style="color:white">Tambah Upload</a>
					<a id='delete_row_release_dokumen1' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
					<input type="hidden" class="form-control" id="total_release_dokumen" name="total_release_dokumen" value="<?php echo count($detail_release); ?>"/>
                </div>
            </div> -->
			
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

	<div class="card mb-3">
		<div class="card-header-tab card-header-tab-animation card-header">
			<div class="card-header-title">
				<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button"> PENAGIHAN</a>
			</div>
		</div>
			<div class="card-body table-responsive collapse show" id='data-table'>
			<!-- Keterangan Penagihan -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">Total Nilai yang Diakseptasi : <?php echo number_format($total_diakseptasi); ?></label><br>
                <label class="col-form-label">Nilai Outstanding : <?php echo number_format($row->nilai_lc_atau_skbdn - $total_diakseptasi); ?></label>
            </div>
				<table id="tabelpenagihan" class="table nowrap table-striped table-bordered table-sm" width="100%">
					<thead>
						<tr>
							<th width='10px' rowspan="2">No.</th>
							<th rowspan="2">Aksi</th>
							<th rowspan="2">Status Penagihan</th>
							<th rowspan="2">Nomor Surat Akseptasi ISC</th>
							<th rowspan="2">Tanggal Surat Akseptasi</th>
							<th rowspan="2">Tanggal Disposisi Manager</th>
							<th rowspan="2">Tanggal Pengajuan Akseptasi</th>
							<th rowspan="2">Tanggal Masuk Dokumen</th>
							<th rowspan="2">Currency</th>
							<th rowspan="2">Nilai Tagihan</th>
							<th rowspan="2">Bunga Upas</th>
							<th rowspan="2">Potongan</th>
							<th rowspan="2">Keterangan Potongan</th>
							<th rowspan="2">Quantity Barang</th>
							<th rowspan="2">Satuan Barang</th>
							<th rowspan="2">Nilai Yang Diakseptasi</th>
							<th rowspan="2">Tanggal Jatuh Tempo</th>
							<th rowspan="2">Keterangan Penagihan</th>
							<th rowspan="2">Tanggal Jatuh Tempo Refinancing</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						foreach($data_lc_penagihan as $data){
							echo"<tr>
									<td><center>".$i."</center></td>
									<td class='d-flex' style='flex-direction:row;justify-content:center'>
										<button class='btn btn-sm btn-primary' title='Detail barang' data-toggle='modal' onclick='showDetailPenagihan(\"" . $data['uid'] . "\",\"" . $data['id_penagihan_lc'] . "\")'> Detail</button>
									</td>
									<td><center>".$data['status_penagihan']."</center></td>
									<td><center>".$data['nomor_surat_akseptasi_isc']."</center></td>
									<td><center>".$data['tanggal_surat_akseptasi']."</center></td>
									<td><center>".$data['tanggal_disposisi_manager']."</center></td>
									<td><center>".$data['tanggal_pengajuan_akseptasi_ke']."</center></td>
									<td><center>".$data['tanggal_masuk_dokumen']."</center></td>
									<td><center>".$data['currency']."</center></td>
									<td><center>".number_format($data['nilai_tagihan'])."</center></td>
									<td><center>".number_format($data['bunga_upas'])."</center></td>
									<td><center>".number_format($data['potongan'])."</center></td>
									<td><center>".$data['keterangan_potongan']."</center></td>
									<td><center>".$data['jumlah_volume_barang_quantity']."</center></td>
									<td><center>".$data['jumlah_volume_barang_satuan']."</center></td>
									<td><center>".number_format($data['nilai_yang_diakseptasi'])."</center></td>
									<td><center>".$data['tanggal_jatuh_tempo']."</center></td>
									<td><center>".$data['keterangan_penagihan']."</center></td>
									<td><center>".$data['tanggal_jatuh_tempo_refinancing']."</center></td>
								 </tr>";
								 $i++;
						} ?>
					</tbody>
				</table>
		</div>
	</div>

<script>
    $(document).ready(function() {
		$('#lockedit1').hide();
        $('#unlockedit1').show();
		$('#submit_edit1').hide();
		$('#label_tanggal_jatuh_tempo_refinancing-add').hide(); //tambahan : muncul saat Status Penagihan dipilih Refinancing
		$('#tanggal_jatuh_tempo_refinancingsss').hide(); //tambahan : muncul saat Status Penagihan dipilih Refinancing
		// document.getElementById("nomor_kontrak_jual_so_ubah").disabled = true;
		// document.getElementById("nilai_ubah").disabled = true;
		// document.getElementById("issuing_bank_ubah").disabled = true;
		// document.getElementById("lc_skbdn_ubah").disabled = true;
		// document.getElementById("nomor_surat_ubah").disabled = true;
		// document.getElementById("tanggal_lc_skbdn_ubah").disabled = true;
		// document.getElementById("tanggal_exp_lc_skbdn_ubah").disabled = true;
		// document.getElementById("tenor_hari_ubah").disabled = true;
		// document.getElementById("keterangan_tenor_ubah").disabled = true;
		// document.getElementById("nomor_kontrak_ubah").disabled = true;	
		// document.getElementById("nomor_po_ubah").disabled = true;
		// document.getElementById("tanggal_sjan_ubah").disabled = true;
		// document.getElementById("divisi_ubah").disabled = true;
		// document.getElementById("vendor_ubah").disabled = true;
		document.getElementById("nama_barang_ubah").disabled = true;
		// document.getElementById("nilai_lc_atau_skbdn_ubah").disabled = true;
		document.getElementById("advising_bank_ubah").disabled = true;
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
		document.getElementById("tanggal_lc_skbdn").disabled = true;
		document.getElementById("tanggal_exp_lc_skbdn").disabled = true;
		document.getElementById("tenor_hari").disabled = true;
		document.getElementById("keterangan_tenor").disabled = true;
		document.getElementById("status_penerbitan_ubah").disabled = true;
    }
	
	// var release = $("input[name='total_release_dokumen']").val();
	// var p = parseFloat(release);
	// // $("input[name='total_release_dokumen']").val(1);
	// $("#add_row_release_dokumen1").click(function(){
        // $('#releaseDokumen'+p).html(
									// "<td><input class='form-control' type='file' id='release_dokumen_draft"+p+"' name='release_dokumen_draft"+p+"' accept='application/pdf'>       </td>" 
							   // );           
        // $('#tab_logic_doc_release_dok').append('<tr id="releaseDokumen'+(p+1)+'"></tr>');
        // $("input[name='total_release_dokumen']").val(p + 1);
        // p++; 
    // });
	// $("#delete_row_release_dokumen1").click(function(){
        // if(p>1){
			// $("#releaseDokumen"+(p-1)).html('');
			// $("input[name='total_release_dokumen']").val($("input[name='total_release_dokumen']").val() - 1);
			// p--;
        // }
    // });
	
	function getDataAktif(nilai_tagihan) {
        var nilai_tagihan = $("input[name='nilai_tagihan']").val();
        var bunga_upas = $("input[name='bunga_upas']").val();
        var potongan = $("input[name='potongan']").val();
        var a = nilai_tagihan.replace(".", "");
        var b = bunga_upas.replace(".", "");
        var c = potongan.replace(".", "");
		var a1 = a.replace(".", "");
        var b1 = b.replace(".", "");
        var c1 = c.replace(".", "");
		var a2 = a1.replace(".", "");
        var b2 = b1.replace(".", "");
        var c2 = c1.replace(".", "");
		var nilai_tagihan_float = parseFloat(a2);
		var bunga_upas_float = parseFloat(b2);
		var potongan_float = parseFloat(c2);
		var total = nilai_tagihan_float + bunga_upas_float - potongan_float;
		var numtotal = addCommas(total);
		// var numtotal1	 		= numtotal.replace(",", "");
		// var numtotal2			= numtotal1.replace(",", "");
		// var numtotal3 			= numtotal2.replace(",", "");
		// var numtotal4 			= numtotal3.replace(",", "");
		// var numtotal5			= numtotal4.replace(".", ",");
        var isExist = false;
        if (!isExist) {
            $("input[name='nilai_yang_diakseptasi_edit1']").val(total);
            $("input[name='nilai_yang_diakseptasi']").val(numtotal);
        }
    }
	
	function addCommas(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}
	
	function getRefinancing(no, status_penagihan) {
        var status_penagihan_add = $("select[name='status_penagihan']").val();
		if(status_penagihan_add == 'REFINANCING'){
			$('#tanggal_jatuh_tempo_refinancingsss').show();
			$('#label_tanggal_jatuh_tempo_refinancing-add').show();
			$('#tanggal_jatuh_tempo_refinancingsss').prop('required',true);
		}else{
			$('#tanggal_jatuh_tempo_refinancingsss').hide();
			$('#label_tanggal_jatuh_tempo_refinancing-add').hide();
		}
    }
	
	$(document).ready(function() {
		$('#divisi-edit').selectize({});
		$('#mata_uang-edit').selectize({});
		$('#penagihan_barang-add').selectize({
            sortField: 'text'
        });
		
	
	});
</script>