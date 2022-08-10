<?php
$date = date("ymd");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan LC_SKBDN - $date.xls");

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
<h1>Laporan LC/SKBDN</h1>
<p><?= date("d/m/Y") ?></p>
<table id="<?= $menu ?>" class="table nowrap table-striped table-bordered table-sm" width="100%">
    <thead>
        <tr>
            <th width='10px'>No.</th>
            <th>Status Penerbitan</th>
            <th>LC/SKBDN</th>
            <th>Nomor surat</th>
            <th>Tgl Ajuan SC</th>
            <th>Tgl SJAN</th>
            <th>Divisi</th>
            <th>Vendor</th>
            <th>Barang</th>
            <th>Quantity</th>
            <th>Satuan</th>
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
        $i = 0;
		if ($data_lc) {
        foreach ($data_lc as $lc) :
        ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= $lc->desk_status_penerbitan ?></td>
                <td><?= $lc->lc_skbdn ?></td>
                <td><?= $lc->nomor_surat ?></td>
                <td><?= date("m-d-Y", strtotime($lc->tanggal_surat_ajuan_isc)) ?></td>
                <td><?= date("m-d-Y", strtotime($lc->tanggal_sjan)) ?></td>
                <td><?= $lc->nama_unit ?></td>
                <td><?= $lc->vendor ?></td>
                <td><?= $lc->nama_barang ?></td>
                <td><?= $lc->quantity ?></td>
                <td><?= $lc->satuan ?></td>
                <td><?= $lc->alamat_vendor ?></td>
                <td><?= $lc->swasta_atau_bumn ?></td>
                <td><?= $lc->mata_uang ?></td>
                <td><?= number_format($lc->nilai_kurs) ?></td>
                <!--<td><?= number_format($lc->nominal_kontrak, 2) ?></td>-->
                <!--<td><?php preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->nominal_kontrak)  ?></td> -->
                <!--<td><?= number_format($lc->ppn_10_persen) ?></td>
				<td><?= preg_replace("/\B(?=(\d{3})+(?!\d))/", ".", $lc->ppn_10_persen) ?></td>
				<td><?= preg_replace("/\B(?=(\d{3})+(?!\d))/", ".", $lc->pph22) ?></td>
				<td><?= preg_replace("/\B(?=(\d{3})+(?!\d))/", ".", $lc->pph23) ?></td>
				<td><?= number_format($lc->pph_4_2,2,',','.') ?></td>-->
				<td><?= $lc->mata_uang=='IDR' ? preg_replace("/\B(?=(\d{3})+(?!\d))/", ".", $lc->nominal_kontrak) : preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", $lc->nominal_kontrak) ?></td>
				<td><?= $lc->mata_uang=='IDR' ? number_format($lc->ppn_10_persen,2,',','.') : number_format($lc->ppn_10_persen,2,'.',',') ?></td>
				<td><?= $lc->mata_uang=='IDR' ? number_format($lc->pph22,2,',','.') : number_format($lc->pph22,2,'.',',') ?></td>
				<td><?= $lc->mata_uang=='IDR' ? number_format($lc->pph23,2,',','.') : number_format($lc->pph23,2,'.',',') ?></td>
				<td><?= $lc->mata_uang=='IDR' ? number_format($lc->pph_4_2,2,',','.') : number_format($lc->pph_4_2,2,'.',',') ?></td>
				<td><?= $lc->mata_uang=='IDR' ? number_format($lc->nilai_lc_atau_skbdn,2,',','.') : number_format($lc->nilai_lc_atau_skbdn,2,'.',',') ?></td>
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
            </tr>
        <?php endforeach; 
		}
		?>
    </tbody>
</table>
<br><br>
<h1>Detail Barang :</h1>
<table id="<?= $menu ?>aaa" class="table nowrap table-striped table-bordered table-sm" width="100%">
    <thead>
        <tr>
            <th width='10px'>No.</th>
            <th>LC/SKBDN</th>
            <th>Nomor surat</th>
            <th>Nomor PO</th>
            <th>Nomor Kontrak</th>
            <th>Nama Barang</th>
            <th>Quantity</th>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
		if ($data_barang) {
        foreach ($data_barang as $barang) :
        ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= $barang->lc_skbdn ?></td>
                <td><?= $barang->nomor_surat ?></td>
                <td><?= $barang->nomor_po ?></td>
                <td><?= $barang->nomor_kontrak ?></td>
                <td><?= $barang->nama_barang ?></td>
                <td><?= $barang->quantity ?></td>
                <td><?= $barang->satuan ?></td>
            </tr>
        <?php endforeach; 
		}
		?>
    </tbody>
</table>

