
<?php
$date = date("ymd");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan - Penerimaan - Kas $date.xls");
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

<h1>Laporan Penerimaan Kas</h1>
<p><?= date("d/m/Y") ?></p>
<table id="<?= $menu ?>" class="table nowrap table-striped table-bordered table-sm" width="100%">
    <thead>
        <tr>
            <th>No.</th>
                    <th>Tanggal Posting</th>
                    <th>Divisi</th>
                    <th>Jenis Transaksi</th>
                    <th>Kode Bank</th>
                    <th>Nominal (Rp.)</th>
                    <th>Keterangan</th>
        </tr>
    </thead>

    <tbody>
  <?php
                $i = 0;
                foreach ($data_penerimaan_kas as $kas) :
                ?>
                    <tr>
                        <td class="text-center"><?= ++$i ?></td>
                        <td><?= filterDataTable($kas->tanggal_posting, "date-only") ?></td>
                        <td class="penerimaan_kas-popover" data-toggle="popover" data-content="<?= "$kas->nama_divisi" ?>">
                            <span class="popover-label"><?= "DIV $kas->singkatan_divisi" ?></span>
                        </td>
                        <td><?= $kas->nama_jenis_transaksi_arus_kas ?></td>
                        <td><?= $kas->kode_bank ?></td>
                        <td style="text-align: right"><?= separateNumber($kas->nominal_penerimaan_kas) ?></td>
                        <td><?= $kas->keterangan ?></td>
                        
                    </tr>

                <?php endforeach; ?>
    </tbody>

</table>
