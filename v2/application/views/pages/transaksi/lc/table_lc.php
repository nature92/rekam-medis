<div class="nav-wrapper">
    <ul class="nav nav-tabs nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Transaksi <br> LC/SKBDN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Proses <br> Penerbitan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Release <br> Dokumen</a>
        </li>
		<li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Penagihan Dan <br> Jatuh Tempo</a>
        </li>
		<li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-5-tab" data-toggle="tab" href="#tabs-icons-text-5" role="tab" aria-controls="tabs-icons-text-5" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Monitoring <br> Jatuh Tempo Bayar</a>
        </li>
		<li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-6-tab" data-toggle="tab" href="#tabs-icons-text-6" role="tab" aria-controls="tabs-icons-text-6" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Monitoring Jatuh Tempo <br> Refinancing</a>
        </li>
		<li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-7-tab" data-toggle="tab" href="#tabs-icons-text-7" role="tab" aria-controls="tabs-icons-text-7" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Log <br> File</a>
        </li>
    </ul>
</div>
<div class="card shadow">
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
					<div class="card-header-tab card-header-tab-animation card-header">
						<div class="card-header-title">
							<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button"> Transaksi LC/SKBDN </a>
						</div>
						<?php if ($hak_akses->can_create === 't') : ?>
							<div class="btn-actions-pane-right">
								<div class="nav">
									<a href="<?= base_url() ?>transaksi/Lc/exportLC" target="_blank" class='btn btn-primary mr-2 text-white'><i class="fa fa-download mr-2"></i> Ekspor Laporan LC/SKBDN</a>
									<button class='btn btn-success' data-toggle="modal" data-target="#modalAdd">+ Tambah LC/SKBDN</button>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="card-body table-responsive collapse show" id='data-table'>
						<table id="<?= $menu ?>" class="table nowrap table-striped table-bordered table-sm" width="100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Aksi</th>
									<th>Vendor</th>
									<th>No. PO</th>
									<th>Status Penerbitan</th>
									<th>Divisi</th>
									<th>Nilai Kurs</th>
									<th>Nominal Kontrak</th>
									<th>LC/SKBDN</th>
									<th>Tahapan</th>
									<th>No. Kontrak</th>
									<th>Nomor surat</th>
									<th>Tgl Ajuan SC</th>
									<th>Tgl SJAN</th>
									<th>Barang</th>
									<th>Alamat Vendor</th>
									<th>SWASTA/BUMN</th>
									<th>Mata Uang</th>
									<th>PPN 10 %</th>
									<th>PPH22</th>
									<th>PPH23</th>
									<th>PPH 4 2</th>
									<th>Nilai LC/SKBDN</th>
									<th>Alasan Belum Release</th>
									<th>Swift Number</th>
									<th>Advising Bank</th>
									<th>Account No</th>
									<th>Kode Proyek</th>
									<th>Nama Proyek</th>
									<th>No Kontrak Jual SO</th>
									<th>Nilai</th>
									<th>Produk Yg Dijual</th>
									<th>Customer</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach($data_lc as $data){
									echo"<tr>
											<td><center>".$i."</center></td>
											<td class='d-flex' style='flex-direction:row;justify-content:center'>                                
												<a href='" . base_url() . "transaksi/Lc/detail/".  ($data['id_lc']) . "/".  ($data['uid']) . "' class='btn btn-sm btn-primary'>Detail</a>&nbsp;
											</td>
											<td><center>".$data['vendor']."</center></td>
											<td><center>".$data['nomor_po']."</center></td>
											<td><center>".$data['desk_status_penerbitan']."</center></td>
											<td><center>".$data['nama_unit']."</center></td>
											<td><center>".number_format($data['nilai_kurs'])."</center></td>
											<td><center>".number_format($data['nominal_kontrak'])."</center></td>
											<td style='flex-direction:row;justify-content:center'>".$data['lc_skbdn']."</td>
											<td><center>".$data['desk_tahapan']."</center></td>
											<td><center>".$data['nomor_kontrak']."</center></td>
											<td><center>".$data['nomor_surat']."</center></td>
											<td><center>".date("m-d-Y", strtotime($data['tanggal_surat_ajuan_isc']))."</center></td>
											<td><center>".date("m-d-Y", strtotime($data['tanggal_sjan']))."</center></td>
											<td class='d-flex' style='flex-direction:row;justify-content:center'>
												<button class='btn btn-sm btn-secondary' title='Detail barang' data-toggle='modal' onclick='showBarang(\"" . $data['uid'] . "\")'> Barang</button>
											</td>
											<td><center>".$data['alamat_vendor']."</center></td>
											<td><center>".$data['swasta_atau_bumn']."</center></td>
											<td><center>".$data['mata_uang']."</center></td>
											<td><center>".number_format($data['ppn_10_persen'])."</center></td>
											<td><center>".number_format($data['pph22'])."</center></td>
											<td><center>".number_format($data['pph23'])."</center></td>
											<td><center>".number_format($data['pph_4_2'])."</center></td>
											<td><center>".number_format($data['nilai_lc_atau_skbdn'])."</center></td>
											<td><center>".$data['keterangan_atau_alasan_belum_release']."</center></td>
											<td><center>".$data['swift_number']."</center></td>
											<td><center>".$data['advising_bank']."</center></td>
											<td><center>".$data['account_no']."</center></td>
											<td><center>".$data['kode_proyek']."</center></td>
											<td><center>".$data['nama_proyek']."</center></td>
											<td><center>".$data['nomor_kontrak_jual_so']."</center></td>
											<td><center>".$data['nilai']."</center></td>
											<td><center>".$data['produk_yang_dijual']."</center></td>
											<td><center>".$data['customer']."</center></td>
										 </tr>";
										 $i++;
								} ?>
							</tbody>
						</table>
					</div>
            </div>
			
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
				<div class="card-header-tab card-header-tab-animation card-header">
					<div class="card-header-title">
						<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button"> Transaksi LC/SKBDN (PROSES PENERBITAN)</a>
					</div>
				</div>
                <div class="card-body table-responsive collapse show" id='data-table'>
					<table id="<?= $menu ?>2" class="table nowrap table-striped table-bordered table-sm" width="100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Aksi</th>
								<th>Vendor</th>
								<th>No. PO</th>
								<th>Status</th>
								<th>Tahapan</th>
								<th>Tipe Dokumen</th>
								<th>No. Kontrak</th>
								<th>Tgl SJAN</th>
								<th>Divisi</th>
								<th>Barang</th>
								<th>Nilai LC/SKBDN</th>
								<th>Advising Bank</th>
								<th>Nama Proyek</th>
								<th>No. Surat Pengajuan Aplikasi</th>
								<th>Tgl. Surat Pengajuan Aplikasi</th>
								<th>Issuing Bank</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i = 1;
							foreach($data_lc_diajukan_bank as $data){
								echo"<tr>
										<td><center>".$i."</center></td>
										<td>
											<a href='" . base_url() . "transaksi/Lc/detailPenerbitan/".  ($data['id_lc']) . "/".  ($data['uid']) . "' class='btn btn-sm btn-primary'>Detail</a>&nbsp;
											<button type='button' style='display:none;' data-main-id='".$data['uid']."' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#modalDetailPenerbitan'>Detail modal</button>&nbsp;
										</td>
										<td><center>".$data['vendor']."</center></td>
										<td><center>".$data['nomor_po']."</center></td>
										<td><center>".$data['desk_status_penerbitan']."</center></td>
										<td><center>".$data['desk_tahapan']."</center></td>
										<td style='flex-direction:row;justify-content:center'>".$data['lc_skbdn']."</td>
										<td><center>".$data['nomor_kontrak']."</center></td>
										<td><center>".date("m-d-Y", strtotime($data['tanggal_sjan']))."</center></td>
										<td><center>".$data['nama_unit']."</center></td>
										<td class='d-flex' style='flex-direction:row;justify-content:center'>
											<button class='btn btn-sm btn-secondary' title='Detail barang' data-toggle='modal' onclick='showBarang(\"" . $data['uid'] . "\")'> Barang</button>
										</td>
										<td><center>".number_format($data['nilai_lc_atau_skbdn'])."</center></td>
										<td><center>".$data['advising_bank']."</center></td>
										<td><center>".$data['nama_proyek']."</center></td>
										<td><center>".$data['no_surat_pengajuan_aplikasi']."</center></td>
										<td><center>".$data['tanggal_surat_pengajuan_aplikasi']."</center></td>
										<td><center>".$data['issuing_bank']."</center></td>
										<td><center>".$data['keterangan']."</center></td>
									 </tr>";
									 $i++;
							} ?>
						</tbody>
					</table>
				</div>
            </div>
			
            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                <div class="card-header-tab card-header-tab-animation card-header">
					<div class="card-header-title">
						<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button"> Transaksi LC/SKBDN (Release Dokumen/On Process Bank)</a>
					</div>
				</div>
                <div class="card-body table-responsive collapse show" id='data-table'>
					<table id="<?= $menu ?>3" class="table nowrap table-striped table-bordered table-sm" width="100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Aksi</th>
								<th>Masa Berlaku Jamlak</th>
								<th>Pengiriman Barang</th>
								<th>Status</th>
								<th>Tahapan</th>
								<th>No. Kontrak Jual (SO)</th>
								<th>Nilai Kontrak</th>
								<th>Issuing Bank</th>
								<th>Tipe Dokumen</th>
								<th>No. Kontrak</th>
								<th>No. PO</th>
								<th>Tanggal SJAN</th>
								<th>Divisi</th>
								<th>Vendor</th>
								<th>Nama Barang</th>
								<th>Nilai LC/SKBDN</th>
								<th>Advising Bank</th>
								<th>Proyek</th>
								<th>Tgl. LC/SKBDN</th>
								<th>Tgl. EXP. LC/SKBDN</th>
								<th>Tenor Hari</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i = 1;
							foreach($data_lc_release_dokumen as $data){
								echo"<tr>
										<td><center>".$i."</center></td>
										<td class='d-flex' style='flex-direction:row;justify-content:center'>                                
											<a href='" . base_url() . "transaksi/Lc/detailRelease/".  ($data['id_lc']) . "/".  ($data['uid']) . "' class='btn btn-sm btn-primary'>Detail</a>&nbsp;
											<button type='button' style='display:none;' data-main-id='".$data['uid']."' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#modalDetailReleaseDokumen'>Detail</button>&nbsp;
										</td>
										<td><center><b><font color='".$data['masa_berlaku_jamlak_warna']."'> ".$data['masa_berlaku_jamlak']." </font></b></center></td>
										<td><center><b><font color='".$data['waktu_pengiriman_barang_warna']."'> ".$data['waktu_pengiriman_barang']." </font></b></center></td>
										<td><center>".$data['desk_status_penerbitan']."</center></td>
										<td><center>".$data['desk_tahapan']."</center></td>
										<td><center>".$data['nomor_kontrak_jual_so']."</center></td>
										<td><center>".$data['nilai']."</center></td>
										<td><center>".$data['issuing_bank']."</center></td>
										<td style='flex-direction:row;justify-content:center'>".$data['lc_skbdn']."</td>
										<td><center>".$data['nomor_kontrak']."</center></td>
										<td><center>".$data['nomor_po']."</center></td>
										<td><center>".date("m-d-Y", strtotime($data['tanggal_sjan']))."</center></td>
										<td><center>".$data['nama_unit']."</center></td>
										<td><center>".$data['vendor']."</center></td>
										<td class='d-flex' style='flex-direction:row;justify-content:center'>
											<button class='btn btn-sm btn-secondary' title='Detail barang' data-toggle='modal' onclick='showBarang(\"" . $data['uid'] . "\")'> Barang</button>
										</td>
										<td><center>".number_format($data['nilai_lc_atau_skbdn'])."</center></td>
										<td><center>".$data['advising_bank']."</center></td>
										<td><center>".$data['nama_proyek']."</center></td>
										<td><center>".$data['tanggal_lc_skbdn']."</center></td>
										<td><center>".$data['tanggal_exp_lc_skbdn']."</center></td>
										<td><center>".$data['tenor_hari']."</center></td>
										<td><center>".$data['keterangan_tenor']."</center></td>
									 </tr>";
									 $i++;
							} ?>
						</tbody>
					</table>
				</div>
            </div>
			
			<div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                <div class="card-header-tab card-header-tab-animation card-header">
					<div class="card-header-title">
						<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button"> Transaksi LC/SKBDN (Jatuh Tempo)</a>
					</div>
				</div>
                <div class="card-body table-responsive collapse show" id='data-table'>
					<table id="<?= $menu ?>4" class="table nowrap table-striped table-bordered table-sm" width="100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Aksi</th>
								<th>Issuing Bank</th>
								<th>Nomor LC/SKBDN</th>
								<th>Tanggal LC/SKBDN</th>
								<th>Vendor</th>
								<th>No. PO</th>
								<th>Tahapan</th>
								<th>Nomor Kontrak Jual (SO)</th>
								<th>Nilai Kontrak</th>
								<th>Proyek</th>
								<th>Nilai LC/SKBDN</th>
								<th>SJAN</th>
								<th>Tanggal SJAN</th>
								<th>Divisi</th>
								<th>Nama Barang</th>
								<th>Nama Suplier</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i = 1;
							foreach($data_lc_jatuh_tempo as $data){
								echo"<tr>
										<td><center>".$i."</center></td>
										<td class='d-flex' style='flex-direction:row;justify-content:center'>                                
											<a href='" . base_url() . "transaksi/Lc/detailPenagihan/".  ($data['id_lc']) . "/".  ($data['uid']) . "' class='btn btn-sm btn-primary'>Detail</a>&nbsp;
										</td>
										<td><center>".$data['issuing_bank']."</center></td>
										<td><center>".$data['no_lc_skbdn']."</center></td>
										<td><center>".$data['tanggal_lc_skbdn']."</center></td>
										<td><center>".$data['vendor']."</center></td>
										<td><center>".$data['nomor_po']."</center></td>
										<td><center>".$data['desk_tahapan']."</center></td>
										<td><center>".$data['nomor_kontrak_jual_so']."</center></td>
										<td><center>".$data['nilai']."</center></td>
										<td><center>".$data['nama_proyek']."</center></td>
										<td><center>".number_format($data['nilai_lc_atau_skbdn'])."</center></td>
										<td><center>".$data['tanggal_sjan']."</center></td>
										<td><center>".$data['tanggal_sjan']."</center></td>
										<td><center>".$data['nama_unit']."</center></td>
										<td class='d-flex' style='flex-direction:row;justify-content:center'>
											<button class='btn btn-sm btn-secondary' title='Detail barang' data-toggle='modal' onclick='showBarang(\"" . $data['uid'] . "\")'> Barang</button>
										</td>										
										<td><center>".$data['vendor']."</center></td>
									 </tr>";
									 $i++;
							} ?>
						</tbody>
					</table>
				</div>
            </div>
			
			<div class="tab-pane fade" id="tabs-icons-text-5" role="tabpanel" aria-labelledby="tabs-icons-text-5-tab">
                <div class="card-header-tab card-header-tab-animation card-header">
					<div class="card-header-title">
						<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button"> Monitoring Jatuh Tempo Bayar</a>
					</div>
					<?php if ($hak_akses->can_create === 't') : ?>
						<div class="btn-actions-pane-right">
							<div class="nav">
								<a href="<?= base_url() ?>transaksi/Lc/exportMonitoringLC" target="_blank" class='btn btn-primary mr-2 text-white'><i class="fa fa-download mr-2"></i> Ekspor Laporan LC/SKBDN</a>
							</div>
						</div>
					<?php endif; ?>
				</div>
                <div class="card-body table-responsive collapse show" id='data-table'>
					<table id="<?= $menu ?>5" class="display table nowrap table-striped table-bordered table-sm " width="100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Indikator</th> <!-- <i class='fa fa-dot-circle icon-gradient bg-mean-fruit'></i>  -->
								<th>LC/SKBDN</th>
								<th>Issuing Bank</th>
								<th>Status Penagihan</th>
								<th>Nama Barang</th>
								<th>Nomor LC/SKBDN</th>
								<th>Tanggal LC/SKBDN</th>
								<th>Nomor Kontrak Jual (SO)</th>
								<th>Nomor PO</th>
								<th>Divisi</th>
								<th>Nama Beneficiary</th>
								<th>Mata uang</th>
								<th>Nilai Pokok</th>
								<th>Bunga Upas</th>
								<th>Potongan</th>
								<th>Nilai yang di akseptasi</th>
								<th>Tanggal Jatuh Tempo</th>
								<th>Tenor</th>
								<th>Keterangan Tenor</th>
								<th>Nominal L/C</th>								
								<th>Tahapan</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i = 1;
							foreach($data_lc_monitor_jatuh_tempo as $data){
								echo"<tr>
										<td><center>".$i."</center></td>
										<td><center> <i class='fa fa-dot-circle icon-gradient bg-".$data['tanggal_jatuh_tempo_warna']."'></i> </center></td>
										<td><center>".$data['lc_skbdn']."</center></td>
										<td><center>".$data['issuing_bank']."</center></td>
										<td>
											<center><button class='btn btn-sm btn-secondary' title='Detail barang' data-toggle='modal' onclick='showStatusPenagihan(\"" . $data['uid'] . "\",\"" . $data['id_penagihan_lc'] . "\")'> ".$data['status_penagihan']."</button></center>
										</td>
										<td>
											<center><button class='btn btn-sm btn-secondary' title='Detail barang' data-toggle='modal' onclick='showBarang(\"" . $data['uid'] . "\")'> Barang</button></center>
										</td>
										<td><center>".$data['no_lc_skbdn']."</center></td>
										<td><center>".date("m-d-Y", strtotime($data['tanggal_lc_skbdn']))."</center></td>
										<td><center>".$data['nomor_kontrak_jual_so']."</center></td>
										<td><center>".$data['nomor_po']."</center></td>
										<td><center>".$data['nama_unit']."</center></td>
										<td><center>".$data['vendor']."</center></td>
										<td><center>".$data['mata_uang']."</center></td>
										<td><center>".number_format($data['nilai_tagihan'])."</center></td>
										<td><center>".number_format($data['bunga_upas'])."</center></td>
										<td><center>".number_format($data['potongan'])."</center></td>
										<td><center>".number_format($data['nilai_yang_diakseptasi'])."</center></td>
										<td><center>".$data['tanggal_jatuh_tempo']."</center></td>
										<td><center>".$data['tenor_hari']."</center></td>
										<td><center>".$data['keterangan_tenor']."</center></td>
										<td><center>".number_format($data['nilai_lc_atau_skbdn'])."</center></td>										
										<td><center>".$data['desk_tahapan']."</center></td>
									 </tr>";
									 $i++;
							} ?>
						</tbody>
					</table>
				</div>
            </div>
			
			<div class="tab-pane fade" id="tabs-icons-text-6" role="tabpanel" aria-labelledby="tabs-icons-text-6-tab">
                <div class="card-header-tab card-header-tab-animation card-header">
					<div class="card-header-title">
						<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button"> Monitoring Jatuh Tempo Refinancing</a>
					</div>
					<?php if ($hak_akses->can_create === 't') : ?>
						<div class="btn-actions-pane-right">
							<div class="nav">
								<a href="<?= base_url() ?>transaksi/Lc/exportMonitoringRefinancingLC" target="_blank" class='btn btn-primary mr-2 text-white'><i class="fa fa-download mr-2"></i> Ekspor Laporan Jatuh Tempo Refinancing</a>
							</div>
						</div>
					<?php endif; ?>
				</div>
                <div class="card-body table-responsive collapse show" id='data-table'>
					<table id="<?= $menu ?>6" class="display table nowrap table-striped table-bordered table-sm " width="100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Indikator</th> <!-- <i class='fa fa-dot-circle icon-gradient bg-mean-fruit'></i>  -->
								<th>Status Penagihan</th>
								<th>Tahapan</th>
								<th>LC/SKBDN</th>
								<th>Nomor Kontrak Jual (SO)</th>
								<th>Nomor LC/SKBDN</th>
								<th>Nomor PO</th>
								<th>Divisi</th>
								<th>Nama Barang</th>
								<th>Nama Beneficiary</th>
								<th>Mata uang</th>
								<th>Nilai Pokok</th>
								<th>Bunga Upas</th>
								<th>Potongan</th>
								<th>Nilai yang di akseptasi</th>
								<th>Tanggal Jatuh Tempo</th>
								<th>Issuing Bank</th>
								<th>Tenor</th>
								<th>Keterangan Tenor</th>
								<th>Nominal L/C</th>
								<th>Lama Refinancing</th>
								<th>Bunga Refinancing</th>
								<th>Nilai Yang Direfinancing</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i = 1;
							foreach($data_lc_monitor_jatuh_tempo_refinancing as $data){
								echo"<tr>
										<td><center>".$i."</center></td>
										<td><center> <i class='fa fa-dot-circle icon-gradient bg-".$data['tanggal_jatuh_tempo_warna']."'></i> </center></td>
										<td><center>".$data['status_penagihan']."</center></td>
										<td><center>".$data['desk_tahapan']."</center></td>
										<td><center>".$data['lc_skbdn']."</center></td>
										<td><center>".$data['nomor_kontrak_jual_so']."</center></td>
										<td><center>".$data['no_lc_skbdn']."</center></td>
										<td><center>".$data['nomor_po']."</center></td>
										<td><center>".$data['nama_unit']."</center></td>
										<td class='d-flex' style='flex-direction:row;justify-content:center'>
											<button class='btn btn-sm btn-secondary' title='Detail barang' data-toggle='modal' onclick='showBarang(\"" . $data['uid'] . "\")'> Barang</button>
										</td>
										<td><center>".$data['vendor']."</center></td>
										<td><center>".$data['mata_uang']."</center></td>
										<td><center>".number_format($data['nilai_tagihan'])."</center></td>
										<td><center>".number_format($data['bunga_upas'])."</center></td>
										<td><center>".number_format($data['potongan'])."</center></td>
										<td><center>".number_format($data['nilai_yang_diakseptasi'])."</center></td>
										<td><center>".$data['tanggal_jatuh_tempo']."</center></td>
										<td><center>".$data['issuing_bank']."</center></td>
										<td><center>".$data['tenor_hari']."</center></td>
										<td><center>".$data['keterangan_tenor']."</center></td>
										<td><center>".number_format($data['nilai_lc_atau_skbdn'])."</center></td>
										<td><center>".$data['lama_refinancing']."</center></td>
										<td><center>".number_format($data['bunga_refinancing'])."</center></td>
										<td><center>".number_format($data['nilai_yang_direfinancing'])."</center></td>
									 </tr>";
									 $i++;
							} ?>
						</tbody>
					</table>
				</div>
            </div>
			
			<div class="tab-pane fade" id="tabs-icons-text-7" role="tabpanel" aria-labelledby="tabs-icons-text-7-tab">
                <div class="card-header-tab card-header-tab-animation card-header">
					<div class="card-header-title">
						<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button"> Log File</a>
					</div>
					<?php if ($hak_akses->can_create === 't') : ?>
						<div class="btn-actions-pane-right">
							<div class="nav">
								<a href="<?= base_url() ?>transaksi/Lc/exportAllLogLC" target="_blank" class='btn btn-primary mr-2 text-white'><i class="fa fa-download mr-2"></i> Ekspor All Laporan LC/SKBDN</a>
								<!--<a href="<?= base_url() ?>transaksi/Lc/tesExportAllLogLC" target="_blank" class='btn btn-primary mr-2 text-white'><i class="fa fa-download mr-2"></i> Test Ekspor</a>-->
							</div>
						</div>
					<?php endif; ?>
				</div>
                <div class="card-body table-responsive collapse show" id='data-table'>
					<table id="<?= $menu ?>7" class="table nowrap table-striped table-bordered table-sm" width="100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Aksi</th>
								<th>Status Penerbitan</th>
								<th>Tahapan</th>
								<th>LC/SKBDN</th>
								<th>No. LC/SKBDN</th>
								<th>Tanggal LC/SKBDN</th>
								<th>Barang</th>
								<th>Issuing Bank</th>
								<th>No Kontrak Jual SO</th>
								<th>Expired LC/SKBDN</th>
								<th>No. Kontrak</th>
								<th>No. PO</th>
								<th>Nomor surat</th>
								<th>Divisi</th>
								<th>Vendor</th>
								<th>Kode proyek</th>
								<th>Nama Proyek</th>
								<th>Nilai Kontrak</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i = 1;
							foreach($data_lc_skbdn_all as $data){
								echo"<tr>
										<td><center>".$i."</center></td>
										<td class='d-flex' style='flex-direction:row;justify-content:center'>                                
											<a href='" . base_url() . "transaksi/Lc/detailSummary/".  ($data['id_lc']) . "/".  ($data['uid']) . "' class='btn btn-sm btn-primary'>Detail</a>&nbsp;
										</td>
										<td><center>".$data['desk_status_penerbitan']."</center></td>
										<td><center>".$data['desk_tahapan']."</center></td>
										<td><center>".$data['lc_skbdn']."</center></td>
										<td><center>".$data['no_lc_skbdn']."</center></td>
										<td><center>".$data['tanggal_lc_skbdn']."</center></td>
										<td class='d-flex' style='flex-direction:row;justify-content:center'>
											<button class='btn btn-sm btn-secondary' title='Detail barang' data-toggle='modal' onclick='showBarang(\"" . $data['uid'] . "\")'> Barang</button>
										</td>
										<td><center>".$data['issuing_bank']."</center></td>
										<td><center>".$data['nomor_kontrak_jual_so']."</center></td>
										<td><center>".$data['tanggal_exp_lc_skbdn']."</center></td>
										<td><center>".$data['nomor_kontrak']."</center></td>
										<td><center>".$data['nomor_po']."</center></td>
										<td><center>".$data['nomor_surat']."</center></td>
										<td><center>".$data['nama_unit']."</center></td>
										<td><center>".$data['vendor']."</center></td>
										<td><center>".$data['kode_proyek']."</center></td>
										<td><center>".$data['nama_proyek']."</center></td>
										<td><center>".number_format($data['nominal_kontrak'])."</center></td>
									 </tr>";
									 $i++;
							} ?>
						</tbody>
					</table>
				</div>
            </div>
			
        </div>
    </div>
</div>
<br>
<script type="text/javascript">
$(document).ready(function() {		
	// datatable ke 1 start
		var new_row1 = $("<tr class='search-header'/>");
		$('#<?= $menu ?> thead th').each(function(j) {
		  var title1 = $(this).text();
		  var new_th1 = $('<th style="' + $(this).attr('style') + '" />');
		  $(new_th1).append('<input type="text" placeholder="' + title1 + '" data-index="'+j+'"/>');
		  $(new_row1).append(new_th1);
		});
		$('#<?= $menu ?> thead').prepend(new_row1);

		// Init DataTable
		var tabless = $('#<?= $menu ?>').DataTable({
			fixedColumns: {
				leftColumns: 2,
			},
			"scrollX": true,
			"searching": true,
			"destroy": true,
		});

		// Filter event handler
		$( tabless.table().container() ).on( 'keyup', 'thead input', function () {
		  tabless
			.column( $(this).data('index') )
			.search( this.value )
			.draw();
		});
	// datatable ke 1 end
	
	
	// datatable ke 2 start
		var new_row2 = $("<tr class='search-header'/>");
		$('#<?= $menu ?>2 thead th').each(function(i) {
			var title2 = $(this).text();
			var new_th2 = $('<th style="' + $(this).attr('style') + '" />');
			$(new_th2).append('<input type="text" placeholder="' + title2 + '" data-index="'+i+'"/>');
			$(new_row2).append(new_th2);
		});
		$('#<?= $menu ?>2 thead').prepend(new_row2);

		// Init DataTable
		var table2 = $('#<?= $menu ?>2').DataTable({
			// "bAutoWidth": false,
			// "bScrollCollapse": true,
			// "bLengthChange": false,
			// "bFilter": false,
			// "sDom": '<"top">rt<"bottom"flp><"clear">',
			// "scrollX": true,
			"searching": true,
			"destroy": true,
		});

		// Filter event handler
		$( table2.table().container() ).on( 'keyup', 'thead input', function () {
			table2
			.column( $(this).data('index') )
			.search( this.value )
			.draw();
		});
	// datatable ke 2 end
	
	
	// datatable ke 3 start
		var new_row3 = $("<tr class='search-header'/>");
		$('#<?= $menu ?>3 thead th').each(function(i) {
			var title3 = $(this).text();
			var new_th3 = $('<th style="' + $(this).attr('style') + '" />');
			$(new_th3).append('<input type="text" placeholder="' + title3 + '" data-index="'+i+'"/>');
			$(new_row3).append(new_th3);
		});
		$('#<?= $menu ?>3 thead').prepend(new_row3);

		// Init DataTable
		var table3 = $('#<?= $menu ?>3').DataTable({
			// "scrollX": true,
			"searching": true,
			"destroy": true,
		});

		// Filter event handler
		$( table3.table().container() ).on( 'keyup', 'thead input', function () {
			table3
			.column( $(this).data('index') )
			.search( this.value )
			.draw();
		});
	// datatable ke 3 end
	
		
	// datatable ke 4 start
		var new_row4 = $("<tr class='search-header'/>");
		$('#<?= $menu ?>4 thead th').each(function(i) {
			var title4 = $(this).text();
			var new_th4 = $('<th style="' + $(this).attr('style') + '" />');
			$(new_th4).append('<input type="text" placeholder="' + title4 + '" data-index="'+i+'"/>');
			$(new_row4).append(new_th4);
		});
		$('#<?= $menu ?>4 thead').prepend(new_row4);

		// Init DataTable
		var table4 = $('#<?= $menu ?>4').DataTable({
			// "scrollX": true,
			"searching": true,
			"destroy": true,
		});

		// Filter event handler
		$( table4.table().container() ).on( 'keyup', 'thead input', function () {
			table4
			.column( $(this).data('index') )
			.search( this.value )
			.draw();
		});
	// datatable ke 4 end	
	
	
	// datatable ke 5 start
		var new_row5 = $("<tr class='search-header'/>");
		$('#<?= $menu ?>5 thead th').each(function(i) {
		  var title5 = $(this).text();
		  var new_th5 = $('<th style="' + $(this).attr('style') + '" />');
		  $(new_th5).append('<input type="text" placeholder="' + title5 + '" data-index="'+i+'"/>');
		  $(new_row5).append(new_th5);
		});
		$('#<?= $menu ?>5 thead').prepend(new_row5);

		// Init DataTable
		var table5 = $('#<?= $menu ?>5').DataTable({
		  // "scrollX": true,
		  "searching": true,
		  "destroy": true,
		});

		// Filter event handler
		$( table5.table().container() ).on( 'keyup', 'thead input', function () {
		  table5
			.column( $(this).data('index') )
			.search( this.value )
			.draw();
		});
	// datatable ke 5 end
	
	
	// datatable ke 6 start
		var new_row6 = $("<tr class='search-header'/>");
		$('#<?= $menu ?>6 thead th').each(function(i) {
		  var title6 = $(this).text();
		  var new_th6 = $('<th style="' + $(this).attr('style') + '" />');
		  $(new_th6).append('<input type="text" placeholder="' + title6 + '" data-index="'+i+'"/>');
		  $(new_row6).append(new_th6);
		});
		$('#<?= $menu ?>6 thead').prepend(new_row6);

		// Init DataTable
		var table6 = $('#<?= $menu ?>6').DataTable({
		  // "scrollX": true,
		  "searching": true,
		  "destroy": true,
		});

		// Filter event handler
		$( table6.table().container() ).on( 'keyup', 'thead input', function () {
		  table6
			.column( $(this).data('index') )
			.search( this.value )
			.draw();
		});
	// datatable ke 6 end
	
	
	// datatable ke 7 start
		var new_row7 = $("<tr class='search-header'/>");
		$('#<?= $menu ?>7 thead th').each(function(i) {
		  var title7 = $(this).text();
		  var new_th7 = $('<th style="' + $(this).attr('style') + '" />');
		  $(new_th7).append('<input type="text" placeholder="' + title7 + '" data-index="'+i+'"/>');
		  $(new_row7).append(new_th7);
		});
		$('#<?= $menu ?>7 thead').prepend(new_row7);

		// Init DataTable
		var table7 = $('#<?= $menu ?>7').DataTable({
		  // "scrollX": true,
		  "searching": true,
		  "destroy": true,
		});

		// Filter event handler
		$( table7.table().container() ).on( 'keyup', 'thead input', function () {
		  table7
			.column( $(this).data('index') )
			.search( this.value )
			.draw();
		});
	// datatable ke 7 end

    //Include search-lc HTML
    $('.search-lc').html($('.search-lc-html').html());

    $('.lc-popover').popover({
        trigger: 'hover',
    })
});

$('#tabs-icons-text a').click(function(e) {
  e.preventDefault();
  $(this).tab('show');
});

// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
  console.log(id);
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#tabs-icons-text a[href="' + hash + '"]').tab('show');
</script>

<!-- Search LC -->
<div class="d-none search-lc-html">
	<form class="d-flex" id="form-search-scf" action="<?= base_url() ?>transaksi/scf">
		<select class="form-control form-control-sm mr-2" id="search-category" name="search-category" placeholder="Cari Berdasarkan" required>
			<option value='' disabled <?php if (empty($search)) echo 'selected'; ?>>Cari Berdasarkan</option>
			<option value='indikator'>Indikator</option>
			<option value='nomor_kontrak'>Nomor Kontrak</option>
			<option value='no_lc_skbdn'>Nomor LC/SKBDN</option>
			<option value='nomor_po'>Nomor PO</option>
			<option value='divisi'>Divisi</option>
		</select>
	</form>
</div>