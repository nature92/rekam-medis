<button class='btn btn-primary' onclick="javascript:history.go(-1)">
    <i class="fa fa-arrow-left"></i> Kembali
</button>
<br><br>
<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" href="#data-table" role="button">
                Detail Account Receivable
            </a>
        </div>
    </div>
    <div class="card-body table-responsive res-pad">
        <p>Data Per Tanggal : <?= convertRegularDate($tanggal) ?></p>
        <table class="table table-bordered res-fsize">
            <thead class='thead-light'>
                <th>Divisi/Business Area</th>
                <th>Realisasi</th>
            </thead>

            <?php
            $total = 0;
            foreach ($kategori_produksi as $kategori) {
                $subtotal = 0;
                foreach ($detail_acc_receivable as $data) {
                    if ($data->nama_kategori_produksi === $kategori->nama_kategori_produksi) {
                        $subtotal += $data->piutang_divisi;
            ?>
                        <tr>
                            <td><?= $data->nama_divisi ?></td>
                            <td class='d-flex justify-content-between'>
                                <span>Rp.</span>
                                <span><?= separateNumber($data->piutang_divisi) ?></span>
                            </td>
                        </tr>
                <?php
                    }
                }
                $total += $subtotal;
                ?>
                <thead class='thead-light'>
                    <th>Sub Total <?= $kategori->nama_kategori_produksi ?></th>
                    <th class='d-flex justify-content-between'>
                        <span>Rp.</span>
                        <span><?= separateNumber($subtotal) ?></span>
                    </th>
                </thead>
            <?php
            }
            ?>
            <thead class='thead-light'>
                <th>Total</th>
                <th class='d-flex justify-content-between'>
                    <span>Rp.</span>
                    <span><?= separateNumber($total) ?></span>
                </th>
            </thead>
        </table>
    </div>
</div>



<link rel="stylesheet" href="<?= base_url() ?>assets/css/data-table.css">

<script src="<?= base_url() ?>assets/js/data-table/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/buttons.colVis.min.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/datatables-init.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/js/data-table/vfs_fonts.js"></script>