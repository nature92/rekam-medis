<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button">
                Tabel <?= ucwords(str_replace('_', ' ', $menu))  ?>
            </a>
        </div>
        <?php if ($hak_akses->can_create === 't') : ?>
            <!-- <div class="btn-actions-pane-right">
                <div class="nav">
                    <a class='btn btn-success btn-sm' onclick='setTimeout(()=>{window.location.href = "<?= base_url() ?>transaksi/acc_receivable_success"}, 1000)' href='<?= base_url() ?>csv/RunCSV.php' target="_blank"><i class="fa fa-download"></i> Import Data</a>
                </div>
            </div> -->
        <?php endif; ?>
    </div>
    <div class="card-body table-responsive collapse show" id='data-table'>
        <table id="<?= $menu ?>" class="table nowrap table-striped table-bordered table-sm" width="100%">
            <thead>
                <tr>
                    <th width='10px'>No.</th>
                    <th>Tanggal Penarikan</th>
                    <th>Total</th>
                    <th style='width:100px'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($acc_receivable as $data) {
                    $total = filterNumber($data['total']);

                ?>
                    <tr>
                        <td><?= $i + 1 ?></td>

                        <td><?= filterDataTable($data['tanggal']) ?></td>
                        <td>Rp. <?= $total['angka'] . ' ' . $total['satuan'] ?></td>

                        <td class='d-flex' style='flex-direction:row;justify-content:center'>
                            <a href='<?= base_url() . 'transaksi/acc_receivable/detail/' . ($data['tanggal']) ?>' class="btn btn-sm btn-primary">Detail</a>&nbsp;
                        </td>
                    </tr>
                <?php $i++;
                } ?>

            </tbody>
        </table>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        $('#<?= $menu ?>').DataTable({
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: {
                leftColumns: 1,
            },
        });
    });
</script>