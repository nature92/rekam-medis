<div class="nav-wrapper">
    <ul class="nav nav-tabs nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Transaksi LC/SKBDN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Proses Penerbitan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Release Dokumen</a>
        </li>
		<li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Penagihan & Jatuh Tempo</a>
        </li>
		<li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-5-tab" data-toggle="tab" href="#tabs-icons-text-5" role="tab" aria-controls="tabs-icons-text-5" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Monitoring Jatuh Tempo</a>
        </li>
		<li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-6-tab" data-toggle="tab" href="#tabs-icons-text-6" role="tab" aria-controls="tabs-icons-text-6" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Log File</a>
        </li>
    </ul>
</div>
<div class="card shadow">
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
				<!--<div class="card mb-3"> -->
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
									<th>Status Penerbitan</th>
									<th>Tahapan</th>
									<th>LC/SKBDN</th>
									<th>No. Kontrak</th>
									<th>No. PO</th>
									<th>Nomor surat</th>
									<th>Tgl Ajuan SC</th>
									<th>Tgl SJAN</th>
									<th>Divisi</th>
									<th>Vendor</th>
									<th>Barang</th>
									<th>Alamat Vendor</th>
									<th>SWASTA/BUMN</th>
									<th>Mata Uang</th>
									<th>Nilai Kurs</th>
									<th>Nominal Kontrak</th>
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
											<td><center>".$data['desk_status_penerbitan']."</center></td>
											<td><center>".$data['desk_tahapan']."</center></td>
											<td style='flex-direction:row;justify-content:center'>".$data['lc_skbdn']."</td>
											<td><center>".$data['nomor_kontrak']."</center></td>
											<td><center>".$data['nomor_po']."</center></td>
											<td><center>".$data['nomor_surat']."</center></td>
											<td><center>".date("m-d-Y", strtotime($data['tanggal_surat_ajuan_isc']))."</center></td>
											<td><center>".date("m-d-Y", strtotime($data['tanggal_sjan']))."</center></td>
											<td><center>".$data['nama_unit']."</center></td>
											<td><center>".$data['vendor']."</center></td>
											<td class='d-flex' style='flex-direction:row;justify-content:center'>
												<button class='btn btn-sm btn-secondary' title='Detail barang' data-toggle='modal' onclick='showBarang(\"" . $data['uid'] . "\")'> Barang</button>
											</td>
											<td><center>".$data['alamat_vendor']."</center></td>
											<td><center>".$data['swasta_atau_bumn']."</center></td>
											<td><center>".$data['mata_uang']."</center></td>
											<td><center>".number_format($data['nilai_kurs'])."</center></td>
											<td><center>".number_format($data['nominal_kontrak'])."</center></td>
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
											<td><center>".number_format($data['nilai'])."</center></td>
											<td><center>".$data['produk_yang_dijual']."</center></td>
											<td><center>".$data['customer']."</center></td>
										 </tr>";
										 $i++;
								} ?>
								<?php
									// $i = 0;
									// foreach($data_lc as $lc):
								?>
									<!--<tr>
										<td><?= ++$i ?></td>
										<td><?= $lc->lc_skbdn ?></td>
										<td><?= $lc->nomor_kontrak ?></td>
										<td><?= $lc->nomor_po ?></td>
										<td><?= $lc->nomor_surat ?></td>
										<td><?= $lc->tanggal_surat_ajuan_isc ?></td>
										<td><?= $lc->tanggal_sjan ?></td>
										<td><?= $lc->nama_unit ?></td>
										<td><?= $lc->vendor ?></td>
										<td><?= $lc->alamat_vendor ?></td>
										<td><?= $lc->swasta_atau_bumn ?></td>
										<td><?= $lc->mata_uang ?></td>
										<td><?= $lc->nilai_kurs ?></td>
										<td><?= $lc->nominal_kontrak ?></td>
										<td><?= $lc->ppn_10_persen ?></td>
										<td><?= $lc->pph22 ?></td>
										<td><?= $lc->pph23 ?></td>
										<td><?= $lc->pph_4_2 ?></td>
										<td><?= $lc->nilai_lc_atau_skbdn ?></td>
										<td><?= $lc->keterangan_atau_alasan_belum_release ?></td>
										<td><?= $lc->swift_number ?></td>
										<td><?= $lc->advising_bank ?></td>
										<td><?= $lc->account_no ?></td>
										<td><?= $lc->kode_proyek ?></td>
										<td><?= $lc->nama_proyek ?></td>
										<td><?= $lc->nomor_kontrak_jual_so ?></td>
										<td><?= $lc->nilai ?></td>
										<td><?= $lc->produk_yang_dijual ?></td>
										<td><?= $lc->customer ?></td>
										<td><?= $lc->status_penerbitan ?></td>
										<td><?= $lc->tahapan ?></td>
										<td class='d-flex' style='flex-direction:row;justify-content:center'>
											<button type="button" data-main-id='<?= $lc->id_lc ?>' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalDetail">Detail</button>&nbsp;
											<a href="<?= base_url() ?>transaksi/Pendanaan/detail/"<?= $lc->id_lc ?>"/"<?= $lc->uid ?>"" class='btn btn-sm btn-primary'>Detail</a>&nbsp;
										</td>
									</tr> -->
								<?php //endforeach; ?>
							</tbody>
						</table>
					</div>
				<!--</div> -->
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
								<th>Status</th>
								<th>Tahapan</th>
								<th>Tipe Dokumen</th>
								<th>No. Kontrak</th>
								<th>No. PO</th>
								<th>Tgl SJAN</th>
								<th>Divisi</th>
								<th>Vendor</th>
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
										<td class='d-flex' style='flex-direction:row;justify-content:center'>
											<a href='" . base_url() . "transaksi/Lc/detailPenerbitan/".  ($data['id_lc']) . "/".  ($data['uid']) . "' class='btn btn-sm btn-primary'>Detail</a>&nbsp;
											<button type='button' style='display:none;' data-main-id='".$data['uid']."' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#modalDetailPenerbitan'>Detail modal</button>&nbsp;
										</td>
										<td><center>".$data['desk_status_penerbitan']."</center></td>
										<td><center>".$data['desk_tahapan']."</center></td>
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
								<th width='10px' rowspan="2">No.</th>
								<th style='width:100px' rowspan="2">Aksi</th>
								<th rowspan="2">Masa Berlaku Jamlak</th>
								<th rowspan="2">Pengiriman Barang</th>
								<th rowspan="2">Status</th>
								<th rowspan="2">Tahapan</th>
								<th rowspan="2">No. Kontrak Jual (SO)</th>
								<th rowspan="2">Nilai Kontrak</th>
								<th rowspan="2">Issuing Bank</th>
								<th rowspan="2">Tipe Dokumen</th>
								<th rowspan="2">No. Kontrak</th>
								<th rowspan="2">No. PO</th>
								<th rowspan="2">Tanggal SJAN</th>
								<th rowspan="2">Divisi</th>
								<th rowspan="2">Vendor</th>
								<th rowspan="2">Nama Barang</th>
								<th rowspan="2">Nilai LC/SKBDN</th>
								<th rowspan="2">Advising Bank</th>
								<th rowspan="2">Proyek</th>
								<th rowspan="2">Tgl. LC/SKBDN</th>
								<th rowspan="2">Tgl. EXP. LC/SKBDN</th>
								<th rowspan="2">Tenor Hari</th>
								<th rowspan="2">Keterangan</th>
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
										<td><center>".number_format($data['nilai'])."</center></td>
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
								<th width='10px' rowspan="2">No.</th>
								<th style='width:100px' rowspan="2">Aksi</th>
								<!--<th rowspan="2">Status</th> -->
								<th rowspan="2">Tahapan</th>
								<th rowspan="2">Nomor Kontrak Jual (SO)</th>
								<th rowspan="2">Nilai Kontrak</th>
								<th rowspan="2">Issuing Bank</th>
								<th rowspan="2">Proyek</th>
								<th rowspan="2">Nomor LC/SKBDN</th>
								<th rowspan="2">Tanggal LC/SKBDN</th>
								<th rowspan="2">Nilai LC/SKBDN</th>
								<th rowspan="2">SJAN</th>
								<th rowspan="2">Tanggal SJAN</th>
								<th rowspan="2">Divisi</th>
								<th rowspan="2">Nama Barang</th>
								<th rowspan="2">Nama Suplier</th>
								<!--<th rowspan="2">No Surat Akseptasi ISC</th>
								<th rowspan="2">Tanggal Surat Akseptasi</th>
								<th rowspan="2">Tanggal Disposisi Manager</th>
								<th rowspan="2">Tanggal Pengajuan Akseptasi Ke</th>
								<th rowspan="2">Tanggal Masuk Dokumen</th>
								<th rowspan="2">Currency</th>
								<th rowspan="2">Nilai Tagihan</th>
								<th rowspan="2">Bunga Upas</th>
								<th rowspan="2">Potongan</th>
								<th rowspan="2">Keterangan Potongan</th>
								<th rowspan="2">Jumlah Volume Barang Quantity</th>
								<th rowspan="2">Jumlah Volume Barang Satuan</th>
								<th rowspan="2">Nilai Yang Diakseptasi</th>
								<th rowspan="2">Tanggal Jatuh Tempo</th>
								<th rowspan="2">Keterangan Penagihan</th>
								<th rowspan="2">Status Penagihan</th>-->
							</tr>
						</thead>
						<tbody>
							<?php 
							// $i = 1;
							// foreach($data_lc_jatuh_tempo as $data){
								// echo"<tr>
										// <td><center>".$i."</center></td>
										// <td class='d-flex' style='flex-direction:row;justify-content:center'>                                
											// <a href='" . base_url() . "transaksi/Lc/detailPenagihan/".  ($data['id_lc']) . "/".  ($data['uid']) . "' class='btn btn-sm btn-primary'>Detail</a>&nbsp;
										// </td>
										// <td><center>".$data['desk_tahapan']."</center></td>
										// <td><center>".$data['nomor_kontrak_jual_so']."</center></td>
										// <td><center>".number_format($data['nilai'])."</center></td>
										// <td><center>".$data['issuing_bank']."</center></td>
										// <td><center>".$data['nama_proyek']."</center></td>
										// <td><center>".$data['tanggal_lc_skbdn']."</center></td>
										// <td><center>".$data['tanggal_lc_skbdn']."</center></td>
										// <td><center>".number_format($data['nilai_lc_atau_skbdn'])."</center></td>
										// <td><center>".$data['tanggal_sjan']."</center></td>
										// <td><center>".$data['tanggal_sjan']."</center></td>
										// <td><center>".$data['nama_unit']."</center></td>
										// <td class='d-flex' style='flex-direction:row;justify-content:center'>
											// <button class='btn btn-sm btn-secondary' title='Detail barang' data-toggle='modal' onclick='showBarang(\"" . $data['uid'] . "\")'> Barang</button>
										// </td>										
										// <td><center>".$data['vendor']."</center></td>
										// <td><center>".$data['nomor_surat_akseptasi_isc']."</center></td>
										// <td><center>".$data['tanggal_surat_akseptasi']."</center></td>
										// <td><center>".$data['tanggal_disposisi_manager']."</center></td>
										// <td><center>".$data['tanggal_pengajuan_akseptasi_ke']."</center></td>
										// <td><center>".$data['tanggal_masuk_dokumen']."</center></td>
										// <td><center>".$data['currency']."</center></td>
										// <td><center>".number_format($data['nilai_tagihan'])."</center></td>
										// <td><center>".number_format($data['bunga_upas'])."</center></td>
										// <td><center>".number_format($data['potongan'])."</center></td>
										// <td><center>".$data['keterangan_potongan']."</center></td>
										// <td><center>".$data['jumlah_volume_barang_quantity']."</center></td>
										// <td><center>".$data['jumlah_volume_barang_satuan']."</center></td>
										// <td><center>".number_format($data['nilai_yang_diakseptasi'])."</center></td>
										// <td><center><b><font color='".$data['tanggal_jatuh_tempo_warna']."'> ".$data['tanggal_jatuh_tempo']." </font></b></center></td>
										// <td><center>".$data['keterangan_penagihan']."</center></td>
										// <td><center>".$data['status_penagihan']."</center></td>
									 // </tr>";
									 // $i++;
							// } ?>
							<?php 
							$i = 1;
							foreach($data_lc_jatuh_tempo as $data){
								echo"<tr>
										<td><center>".$i."</center></td>
										<td class='d-flex' style='flex-direction:row;justify-content:center'>                                
											<a href='" . base_url() . "transaksi/Lc/detailPenagihan/".  ($data['id_lc']) . "/".  ($data['uid']) . "' class='btn btn-sm btn-primary'>Detail</a>&nbsp;
										</td>
										<td><center>".$data['desk_tahapan']."</center></td>
										<td><center>".$data['nomor_kontrak_jual_so']."</center></td>
										<td><center>".number_format($data['nilai'])."</center></td>
										<td><center>".$data['issuing_bank']."</center></td>
										<td><center>".$data['nama_proyek']."</center></td>
										<td><center>".$data['tanggal_lc_skbdn']."</center></td>
										<td><center>".$data['tanggal_lc_skbdn']."</center></td>
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
						<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button"> Monitoring Jatuh Tempo</a>
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
					<table id="test" class="table nowrap table-striped table-bordered table-sm" width="100%">
						<thead>
							<tr>
								<th width='10px' rowspan="2">No.</th>
								<th rowspan="2">Indikator</th> <!-- <i class='fa fa-dot-circle icon-gradient bg-mean-fruit'></i>  -->
								<th rowspan="2">Status Penagihan</th>
								<th rowspan="2">Tahapan</th>
								<th rowspan="2">LC/SKBDN</th>
								<th rowspan="2">Nomor Kontrak Jual (SO)</th>
								<th rowspan="2">Nomor LC/SKBDN</th>
								<th rowspan="2">Nomor PO</th>
								<th rowspan="2">Divisi</th>
								<th rowspan="2">Nama Barang</th>
								<th rowspan="2">Nama Beneficiary</th>
								<th rowspan="2">Mata uang</th>
								<th rowspan="2">Nilai Pokok</th>
								<th rowspan="2">Bunga Upas</th>
								<th rowspan="2">Potongan</th>
								<th rowspan="2">Nilai yang di akseptasi</th>
								<th rowspan="2">Tanggal Jatuh Tempo</th>
								<th rowspan="2">Tenor</th>
								<th rowspan="2">Keterangan Tenor</th>
								<th rowspan="2">Nominal L/C</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i = 1;
							foreach($data_lc_monitor_jatuh_tempo as $data){
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
										<td><center>".$data['tenor_hari']."</center></td>
										<td><center>".$data['keterangan_tenor']."</center></td>
										<td><center>".number_format($data['nilai_lc_atau_skbdn'])."</center></td>
									 </tr>";
									 $i++;
							} ?>
						</tbody>
					</table>
					
					
					<br>
					<table id="test12" class="table nowrap table-striped table-bordered table-sm" width="100%">
						<thead>
							<tr>
								<th width='10px' rowspan="2">No.</th>
							</tr>
							<tr>
								<th width='10px' rowspan="2">kolom 1.</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><center>coba</center></td><td><center>coba 1</center></td>
							</tr>
						</tbody>
					</table>
				</div>
            </div>
			<div class="tab-pane fade" id="tabs-icons-text-6" role="tabpanel" aria-labelledby="tabs-icons-text-6-tab">
                <div class="card-header-tab card-header-tab-animation card-header">
					<div class="card-header-title">
						<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button"> Log File</a>
					</div>
				</div>
                <div class="card-body table-responsive collapse show" id='data-table'>
					<table id="<?= $menu ?>6" class="table nowrap table-striped table-bordered table-sm" width="100%">
						<thead>
							<tr>
								<th width='10px' rowspan="2">No.</th>
								<th style='width:100px' rowspan="2">Aksi</th>
								<th rowspan="2">Status Penerbitan</th>
								<th rowspan="2">Tahapan</th>
								<th rowspan="2">LC/SKBDN</th>
								<th rowspan="2">No. Kontrak</th>
								<th rowspan="2">No. PO</th>
								<th rowspan="2">Nomor surat</th>
								<th rowspan="2">Divisi</th>
								<th rowspan="2">Vendor</th>
								<th rowspan="2">Kode proyek</th>
								<th rowspan="2">Nama Proyek</th>
								<th rowspan="2">Nilai Kontrak</th>
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
        $('#<?= $menu ?>').DataTable({
            fixedColumns: {
                leftColumns: 2,
            },
            scrollX: true,
            scrollCollapse: true,
            dom: '<"row"<"col-sm-6"<"search-lc">><"col-sm-6"f>>rt<"row"<"col-sm-6"l><"col-sm-6"p>>',
            // columnDefs: [
                // { type: 'local-date', targets: 6 },
                // { type: 'local-date', targets: 7 },
                // { type: 'numeric-comma', targets: 8 },
                // { type: 'numeric-comma', targets: 9 },
                // { type: 'numeric-comma', targets: 10 },
                // { type: 'numeric-comma', targets: 11 },
                // { type: 'local-date', targets: 12 },
                // { type: 'local-date', targets: 13 },
            // ]
        });
		
		// $('#<?= $menu ?>2').DataTable({
            // fixedColumns: {
                // leftColumns: 2,
            // },
            // scrollX: true,
            // scrollCollapse: true,
            // dom: '<"row"<"col-sm-6"<"search-lc">><"col-sm-6"f>>rt<"row"<"col-sm-6"l><"col-sm-6"p>>',
        // });

        //Include search-lc HTML
        $('.search-lc').html($('.search-lc-html').html());

        $('.lc-popover').popover({
            trigger: 'hover',
        })

        //Default Select Category Value
        <?php if (!empty($search)): ?>
            $('#search-category').val("<?= $search['search-category'] ?>");
        <?php endif; ?>
        
        $('#search-lc-datepicker').daterangepicker({
            showDropdowns: true,
            minDate: "01/01/2019",
            locale: {
                format: 'DD/MM/YYYY'
            },
            autoUpdateInput: false
        }, (start, end, label) => {
            dateStart = start.format('DD/MM/YYYY');
            dateEnd = end.format('DD/MM/YYYY');
            $('#search-lc-datepicker').val(dateStart + ' - ' + dateEnd);
            $('#form-search-lc').submit();
        });
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
    <form class="d-flex" id="form-search-lc" action="<?= base_url() ?>transaksi/lc">
        <select class="form-control form-control-sm mr-2" id="search-category" name="search-category" placeholder="Cari Berdasarkan" required>
            <option value='' disabled <?php if (empty($search)) echo 'selected'; ?>>Cari Berdasarkan</option>
            <option value='bulan_penerimaan_bank'>Terima Dokumen Bank</option>
            <option value='bulan_submit_bank'>Submit Dokumen Bank</option>
            <option value='tanggal_mulai_lc'>Tanggal Mulai LC</option>
            <option value='tanggal_akhir_lc'>Tanggal Jatuh Tempo LC</option>
        </select>

        <div class='input-group input-group-sm mr-2'>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class='fa fa-calendar'></i></span>
            </div>
            <input id='search-lc-datepicker' class='form-control' name="search-lc-datepicker" <?php if (!empty($search)): ?> value = "<?= $search['search-lc-datepicker'] ?>" <?php endif; ?> required>
        </div>

        <!-- Reset Search -->
        <?php if (!empty($search)): ?>
            <a class="btn btn-light btn-sm" href="<?= base_url() ?>transaksi/lc"> Reset </a>
        <?php endif; ?>
    </form>
</div>
