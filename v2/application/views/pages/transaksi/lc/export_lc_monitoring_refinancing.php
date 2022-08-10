<?php
$date = date("ymd");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Monitoring Jatuh Tempo Refinancing - $date.xls");
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
<h1>Laporan Monitoring LC/SKBDN</h1>
<p><?= date("d/m/Y") ?></p>
<table id="<?= $menu ?>" class="table nowrap table-striped table-bordered table-sm" width="100%">
    <thead>
		<tr>
			<th width='10px'>No.</th>
			<th>Status Penerbitan</th>
			<th>Indikator</th>
			<th>LC/SKBDN</th>
			<th>Issuing Bank</th>
			<th>Status Penagihan</th>
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
			<th>Tanggal Jatuh Tempo Refinancing</th>
			<th>Tenor</th>
			<th>Keterangan Tenor</th>
			<th>Nominal L/C</th>
			<th>Tahapan</th>
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
                <td bgcolor='<?= $lc->tanggal_jatuh_tempo_warna ?>'><?= $lc->tanggal_jatuh_tempo_warna ?></td>
				<td><?= $lc->lc_skbdn ?></td>
				<td><?= $lc->issuing_bank ?></td>
                <td><?= $lc->status_penagihan ?></td>
				<td><?= $lc->no_lc_skbdn ?></td>
				<td><?= date("m-d-Y", strtotime($lc->tanggal_lc_skbdn)) ?></td>                
                <td><?= $lc->nomor_kontrak_jual_so ?></td>
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
                <td><?= $lc->tenor_hari ?></td>
                <td><?= $lc->keterangan_tenor ?></td>
                <td><?= number_format($lc->nilai_lc_atau_skbdn) ?></td>
				<td><?= $lc->desk_tahapan ?></td>
            </tr>
        <?php endforeach; 
		}
		?>
    </tbody>
</table>