<?php
$date = date("ymd");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan SCF - $date.xls");
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

<h1>Laporan SCF</h1>
<p><?= date("d/m/Y") ?></p>
<table id="<?= $menu ?>" class="table nowrap table-striped table-bordered table-sm" width="100%">
    <thead>
        <tr>
            <th width='10px' rowspan="2">No.</th>
            <th rowspan="2">No. Bukti Kas</th>
            <th rowspan="2">No. PO</th>
            <th rowspan="2">Divisi</th>
            <th rowspan="2">Nama Barang</th>
            <th rowspan="2">Nama Supplier</th>
            <th colspan="2">Dokumen Bank</th>
            <th colspan="2">Nilai (Rp)</th>
            <th colspan="2">Biaya SCF (Rp)</th>
            <th colspan="2">Tanggal</th>
            <th rowspan="2">Status Pembayaran</th>
        </tr>
        <tr>
            <th>Submit</th>
            <th>Terima</th>
            <th class="scf-popover" data-toggle="popover" data-content="Nominal Sesuai Bukti Kas">
                <span class="popover-label">Bukti Kas</span>
            </th>
            <th class="scf-popover" data-toggle="popover" data-content="Biaya SCF Vendor + Biaya SCF Pindad">
                <span class="popover-label">Biaya SCF</span>
            </th>
            <th>Vendor</th>
            <th>Pindad</th>
            <th>Mulai</th>
            <th>Jatuh Tempo</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $i = 0;
        foreach ($data_scf as $scf) :
        ?>

            <tr>
                <td><?= ++$i ?></td>
                <td><?= $scf->nomor_bukti_kas ?></td>
                <td><?= $scf->nomor_po ?></td>
                <td class="scf-popover" data-toggle="popover" data-content="<?= "$scf->nama_divisi" ?>">
                    <span class="popover-label"><?= "DIV $scf->singkatan_divisi" ?></span>
                </td>
                <td><?= $scf->nama_barang ?></td>
                <td><?= $scf->nama_supplier ?></td>
                <td><?= filterDataTable($scf->bulan_submit_bank, "date-only") ?></td>
                <td><?= filterDataTable($scf->bulan_penerimaan_bank, "date-only") ?></td>
                <td style="text-align: right"><?= separateNumber($scf->nominal_bukti_kas) ?></td>
                <td style="text-align: right"><?= separateNumber(number_format((float)($scf->tenor / 360) * ((85 / 1000) * $scf->nominal_bukti_kas), 2, ',', '.')) ?></td>
                <td style="text-align: right"><?= separateNumber($scf->biaya_scf_vendor) ?></td>
                <td style="text-align: right"><?= separateNumber($scf->biaya_scf_pindad) ?></td>
                <td><?= filterDataTable($scf->tanggal_mulai_scf, "date-only") ?></td>
                <td><?= addDaysToDate($scf->tanggal_mulai_scf, $scf->tenor) ?></td>
                <td class="text-center p-2">
                    <span class="scf-popover scf-status scf-status-<?= $scf->status_pembayaran === 't' ? "paid" : "not-paid" ?>" data-toggle="popover" data-content="<?= $scf->status_pembayaran === 't' ? "Sudah Dibayarkan" : "Belum Dibayarkan" ?>">
                        <?php if ($scf->status_pembayaran === 't') : ?> <span>Sudah Dibayarkan</span>
                        <?php else : ?> <span>Belum Dibayarkan</span>
                        <?php endif; ?>
                    </span>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>

</table>