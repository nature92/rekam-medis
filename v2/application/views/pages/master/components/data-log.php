<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='data-log' href="#" role="button">
                Riwayat Perubahan
            </a>
        </div>

    </div>
    <div class="card-body table-responsive collapse" id='data-log'>
        <table id="log" class="table table-striped table-bordered table-sm" width='100%'>
            <thead>
                <tr>
                    <th width='10px'>No.</th>
                    <th>User</th>
                    <th>IP Address</th>
                    <th>Aksi</th>
                    <th>Waktu</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($data_log as $col) {

                ?>
                    <tr>
                        <td align="center"><?= $i + 1 ?></td>
                        <td><?= ucwords($col->nama_user) ?></td>
                        <td><?= $col->ip_address ?></td>
                        <td class='badge-<?= $col->mod_type ?>'><?= ucwords($col->mod_type) ?></td>
                        <td><?= filterDataTable($col->mod_date) ?></td>

                        <td class='d-flex' style='flex-direction:row;justify-content:center'>
                            <button type="button" data-main-id='<?= $col->id_log ?>' data-nama-user='<?= $col->nama_user ?>' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalLog">Detail</button>&nbsp;
                        </td>
                    </tr>
                <?php $i++;
                } ?>

            </tbody>
        </table>
    </div>
</div>

<script>
    $('#log').DataTable({
        // scrollX: true,
    });
</script>