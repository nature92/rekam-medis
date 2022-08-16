<?php
$date = date("ymd");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan All LC_SKBDN - $date.xls");
?>
<style>
    p {
        margin-top: 0;
    }

    h1 {
        margin: 0;
        font-size: 24px;
    }

    table {
        border-collapse: collapse;
    }

    td,
    th {
        padding: 5px;
        border: 1px solid black;
    }
</style>
<h1>Laporan All LC/SKBDN</h1>
<p><?= date("d/m/Y") ?></p>
<table id="<?= $menu ?>" class="table nowrap table-striped table-bordered table-sm" width="100%">
    <thead>
		<tr>
			<th width='10px'>No.</th>
			<th>Status Penerbitan</th>
			<th>LC/SKBDN</th>
			<th>Issuing Bank</th>
			<th>No. LC/SKBDN</th>
			<th>Tanggal LC/SKBDN</th>
			<th>Tanggal Exp LC/SKBDN</th>
			<th>Kode Proyek</th>
			<th>Nama Proyek</th>
			<th>Nomor Kontrak Jual SO</th>
			<th>Nilai</th>
			<th>Produk Yang Dijual</th>
			<th>Customer</th>
			<th>Nomor Surat</th>
			<th>Tanggal Surat Pengajuan ISC</th>
			<th>Nomor PO</th>
			<th>Nomor Kontrak</th>
			<th>Tanggal SJAN</th>
			<th>Divisi</th>
			<th>Vendor</th>
			<th>Alamat Vendor</th>
			<th>Swasta / BUMN</th>
			<th>Mata Uang</th>
			<th>Nilai Kurs</th>
			<th>Nominal Kontrak</th>
			<th>Nominal Pembukaan</th>
			<th>PPN 10%</th>
			<th>PPH22</th>
			<th>PPH23</th>
			<th>PPH 4 2</th>
			<th>Nilai LC/SKBDN</th>
			<th>Nomor Surat Pengajuan Aplikasi</th>
			<th>Tanggal Surat Pengajuan Aplikasi</th>
			<th>Keterangan/Alasan Belum Release</th>
			<th>Swift Bank</th>
			<th>Advising Bank</th>
			<th>Account No</th>
			<th>Waktu Pengiriman Barang</th>
			<th>Tahapan</th>			
			<th>Masa Berlaku Jamlak</th>
			<th>Nomor Surat Keabsahan</th>
			<th>Tanggal Surat Keabsahan</th>
			<th>Surat Konfirmasi Keabsahan Bank Garansi</th>
			<th>Keabsahan Bank Garansi</th>
			<th>Keterangan</th>
			<th>Tenor Hari</th>
			<th>Keterangan Tenor</th>
			<th>Nomor Surat Akseptasi ISC</th>
			<th>Tanggal Surat Akseptasi</th>
			<th>Tanggal Disposisi Manager</th>
			<th>Tanggal Pengajuan Akseptasi Ke Bank</th>
			<th>Tanggal Masuk Dokumen</th>
			<th>Currency</th>
			<th>Nilai Tagihan</th>
			<th>Bunga Upas</th>
			<th>Potongan</th>
			<th>Keterangan Potongan</th>
			<th>Jumlah Volume Barang Quantity</th>
			<th>Jumlah Volume Barang Satuan</th>
			<th>Nilai Yang Diakseptasi</th>
			<th>Tanggal Jatuh Tempo</th>
			<th>Keterangan Penagihan</th>
			<th>Status Penagihan</th>
			<th>Alamat Bank</th>
		</tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
		if ($data_all_lc) {
        foreach ($data_all_lc as $lc) :
        ?>
            <tr>
                <td><?= ++$i ?></td>
				<td><?= $lc->desk_status_penerbitan ?></td>
                <td><?= $lc->lc_skbdn ?></td>
				<td><?= $lc->issuing_bank ?></td>
				<td><?= $lc->no_lc_skbdn ?></td>
				<td><?= (($lc->tanggal_lc_skbdn) ? date("d-m-Y", strtotime($lc->tanggal_lc_skbdn)) : '-') ?></td>
				<td><?= (($lc->tanggal_exp_lc_skbdn) ? date("d-m-Y", strtotime($lc->tanggal_exp_lc_skbdn)) : '-') ?></td>
				<td><?= $lc->kode_proyek ?></td>
				<td><?= $lc->nama_proyek ?></td>
				<td><?= $lc->nomor_kontrak_jual_so ?></td>
				<td><?= $lc->nilai ?></td>
				<td><?= $lc->produk_yang_dijual ?></td>
				<td><?= $lc->customer ?></td>
                <td><?= $lc->nomor_surat ?></td>
				<td><?= (($lc->tanggal_surat_ajuan_isc) ? date("d-m-Y", strtotime($lc->tanggal_surat_ajuan_isc)) : '-') ?></td>
                <td><?= $lc->nomor_po ?></td>
                <td><?= $lc->nomor_kontrak ?></td>
				<td><?= (($lc->tanggal_sjan) ? date("d-m-Y", strtotime($lc->tanggal_sjan)) : '-') ?></td>
                <td><?= $lc->nama_unit ?></td>
                <td><?= $lc->vendor ?></td>
                <td><?= $lc->alamat_vendor ?></td>
                <td><?= $lc->swasta_atau_bumn ?></td>
                <td><?= $lc->mata_uang ?></td>
				<td><?= number_format($lc->nilai_kurs) ?></td>
				<td><?= $lc->mata_uang=='IDR' ? preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->nominal_kontrak) : preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->nominal_kontrak) ?></td>
				<td><?= $lc->mata_uang=='IDR' ? preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->nominal_pembukaan) : preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->nominal_pembukaan) ?></td>
				<td><?= $lc->mata_uang=='IDR' ? preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->ppn_10_persen) : preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->ppn_10_persen) ?></td>
				<td><?= $lc->mata_uang=='IDR' ? preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->pph22) : preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->pph22) ?></td>
				<td><?= $lc->mata_uang=='IDR' ? preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->pph23) : preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->pph23) ?></td>
				<td><?= $lc->mata_uang=='IDR' ? preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->pph_4_2) : preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->pph_4_2) ?></td>
				<td><?= $lc->mata_uang=='IDR' ? preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->nilai_lc_atau_skbdn) : preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->nilai_lc_atau_skbdn) ?></td>
				<td><?= $lc->no_surat_pengajuan_aplikasi ?></td>
				<td><?= $lc->tanggal_surat_pengajuan_aplikasi ?></td>
				<td><?= $lc->keterangan_atau_alasan_belum_release ?></td>
                <td><?= $lc->swift_number ?></td>
                <td><?= $lc->advising_bank ?></td>
                <td><?= $lc->account_no ?></td>
				<td><?= (($lc->waktu_pengiriman_barang) ? date("d-m-Y", strtotime($lc->waktu_pengiriman_barang)) : '-') ?></td>
				<td><?= $lc->desk_tahapan ?></td>
                <td><?= (($lc->masa_berlaku_jamlak) ? date("d-m-Y", strtotime($lc->masa_berlaku_jamlak)) : '-') ?></td>
                <td><?= $lc->nomor_surat_keabsahan ?></td>
				<td><?= (($lc->tanggal_surat_keabsahan) ? date("d-m-Y", strtotime($lc->tanggal_surat_keabsahan)) : '-') ?></td>
				<td><?= $lc->surat_konfirmasi_keabsahan_bank_garansi ?></td>
				<td><?= $lc->keabsahan_bank_garansi ?></td>
				<td><?= $lc->keterangan ?></td>
				<td><?= $lc->tenor_hari ?></td>
				<td><?= $lc->keterangan_tenor ?></td>
				<td><?= $lc->nomor_surat_akseptasi_isc ?></td>
				<td><?= (($lc->tanggal_surat_akseptasi) ? date("d-m-Y", strtotime($lc->tanggal_surat_akseptasi)) : '-') ?></td>
				<td><?= (($lc->tanggal_disposisi_manager) ? date("d-m-Y", strtotime($lc->tanggal_disposisi_manager)) : '-') ?></td>
				<td><?= (($lc->tanggal_pengajuan_akseptasi_ke) ? date("d-m-Y", strtotime($lc->tanggal_pengajuan_akseptasi_ke)) : '-') ?></td>
				<td><?= (($lc->tanggal_masuk_dokumen) ? date("d-m-Y", strtotime($lc->tanggal_masuk_dokumen)) : '-') ?></td>
				<td><?= $lc->currency ?></td>
				<td><?= number_format($lc->nilai_tagihan) ?></td>
				<td><?= number_format($lc->bunga_upas) ?></td>
				<td><?= number_format($lc->potongan) ?></td>
				<td><?= $lc->keterangan_potongan ?></td>
				<td><?= number_format($lc->jumlah_volume_barang_quantity) ?></td>
				<td><?= number_format($lc->jumlah_volume_barang_satuan) ?></td>
				<td><?= number_format($lc->nilai_yang_diakseptasi) ?></td>
				<td><?= (($lc->tanggal_jatuh_tempo) ? date("d-m-Y", strtotime($lc->tanggal_jatuh_tempo)) : '-') ?></td>
				<td><?= $lc->keterangan_penagihan ?></td>
				<td><?= $lc->status_penagihan ?></td>
				<td><?= $lc->alamat_bank ?></td>
            </tr>
        <?php endforeach; 
		}
		?>
    </tbody>
</table>

<br><br>

<table id="<?= $menu ?>q" class="table nowrap table-striped table-bordered table-sm" width="100%">
    <thead>
		<tr>
			<th width='10px'>No.</th>
			<th>Indikator</th>
			<th>Status Penagihan</th>
			<th>Tahapan</th>
			<th>LC/SKBDN</th>
			<th>Nomor Kontrak Jual (SO)</th>
			<th>Nomor LC/SKBDN</th>
			<th>Nomor PO</th>
			<th>Divisi</th>
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
		</tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
		if ($data_monitoring_jatuh_tempo) {
        foreach ($data_monitoring_jatuh_tempo as $lc) :
        ?>
            <tr>
                <td><?= ++$i ?></td>
                <td bgcolor='<?= $lc->tanggal_jatuh_tempo_warna ?>'><?= $lc->tanggal_jatuh_tempo_warna ?></td>
                <td><?= $lc->status_penagihan ?></td>
                <td><?= $lc->desk_tahapan ?></td>
                <td><?= $lc->lc_skbdn ?></td>
                <td><?= $lc->nomor_kontrak_jual_so ?></td>
                <td><?= $lc->no_lc_skbdn ?></td>
                <td><?= $lc->nomor_po ?></td>
                <td><?= $lc->nama_unit ?></td>
                <td><?= $lc->vendor ?></td>
                <td><?= $lc->mata_uang ?></td>
				<!--<td><?= number_format($lc->nilai_tagihan) ?></td>-->
				<td><?= $lc->mata_uang=='IDR' ? preg_replace("/\B(?=(\d{3})+(?!\d))/", ".", $lc->nilai_tagihan) : preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->nilai_tagihan) ?></td>
				<td><?= number_format($lc->bunga_upas) ?></td>
				<td><?= number_format($lc->potongan) ?></td>
				<td><?= number_format($lc->nilai_yang_diakseptasi) ?></td>
                <td><?= date("m-d-Y", strtotime($lc->tanggal_jatuh_tempo)) ?></td>
                <td><?= $lc->issuing_bank ?></td>
                <td><?= $lc->tenor_hari ?></td>
                <td><?= $lc->keterangan_tenor ?></td>
                <td><?= number_format($lc->nilai_lc_atau_skbdn) ?></td>
            </tr>
        <?php endforeach;
		}
		?>
    </tbody>
</table>

<br><br>

<table id="<?= $menu ?>r" class="table nowrap table-striped table-bordered table-sm" width="100%">
    <thead>
		<tr>
			<th width='10px'>No.</th>
			<th>Indikator</th>
			<th>Status Penagihan</th>
			<th>Tahapan</th>
			<th>LC/SKBDN</th>
			<th>Nomor Kontrak Jual (SO)</th>
			<th>Nomor LC/SKBDN</th>
			<th>Nomor PO</th>
			<th>Divisi</th>
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
		</tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
		if ($data_monitoring_jatuh_tempo_refinancing) {
        foreach ($data_monitoring_jatuh_tempo_refinancing as $lc) :
        ?>
            <tr>
                <td><?= ++$i ?></td>
                <td bgcolor='<?= $lc->tanggal_jatuh_tempo_warna ?>'><?= $lc->tanggal_jatuh_tempo_warna ?></td>
                <td><?= $lc->status_penagihan ?></td>
                <td><?= $lc->desk_tahapan ?></td>
                <td><?= $lc->lc_skbdn ?></td>
                <td><?= $lc->nomor_kontrak_jual_so ?></td>
                <td><?= $lc->no_lc_skbdn ?></td>
                <td><?= $lc->nomor_po ?></td>
                <td><?= $lc->nama_unit ?></td>
                <td><?= $lc->vendor ?></td>
                <td><?= $lc->mata_uang ?></td>
				<!--<td><?= number_format($lc->nilai_tagihan) ?></td>-->
				<td><?= $lc->mata_uang=='IDR' ? preg_replace("/\B(?=(\d{3})+(?!\d))/", ".", $lc->nilai_tagihan) : preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->nilai_tagihan) ?></td>
				<td><?= number_format($lc->bunga_upas) ?></td>
				<td><?= number_format($lc->potongan) ?></td>
				<td><?= number_format($lc->nilai_yang_diakseptasi) ?></td>
                <td><?= date("m-d-Y", strtotime($lc->tanggal_jatuh_tempo)) ?></td>
                <td><?= $lc->issuing_bank ?></td>
                <td><?= $lc->tenor_hari ?></td>
                <td><?= $lc->keterangan_tenor ?></td>
                <td><?= number_format($lc->nilai_lc_atau_skbdn) ?></td>
            </tr>
        <?php endforeach;
		}
		?>
    </tbody>
</table>