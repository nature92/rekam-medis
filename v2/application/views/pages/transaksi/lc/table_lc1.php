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
				<div class="card-header-tab card-header-tab-animation card-header">
					<div class="card-header-title">
						<a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button">
							Tabel <?= ucwords(str_replace('_', ' ', $menu))  ?>/SKBDN
						</a>
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
							?>
							<?php foreach($data_lc as $data){
								echo"<tr>
										<td><center>".$i."</center></td>
										<td>                                
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
			
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
    $(document).ready(function() {
        $('#<?= $menu ?>').DataTable({
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: {
                leftColumns: 1,
            },
        });
		
		$('#<?= $menu ?>2').DataTable({
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: {
                leftColumns: 1,
            },
        });
    });
</script>