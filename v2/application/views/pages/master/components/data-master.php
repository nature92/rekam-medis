<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button">
                Tabel <?= toTitle($menu)  ?>
            </a>
        </div>
        <?php if ($hak_akses->can_create === 't') : ?>
            <div class="btn-actions-pane-right">
                <div class="nav">
                    <button class='btn btn-success' data-toggle="modal" data-target="#modalAdd">+ Tambah <?= toTitle($menu) ?></button>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="collapse show" id='data-table'>
        <div class="card-body table-responsive">
            <table id="table" class="table table-master table-striped table-bordered " width='100%'>
                <thead>
                    <tr>
                        <th width='5px'>No.</th>
                        <?php
                        foreach (filterColumn($column) as $col) {
                            $th = $col->name === 'npp'
                                ? strtoupper($col->name)
                                : toTitle($col->name);

                            $th = preg_match('/nama_/', $col->name)
                                ? toTitle(preg_replace('/nama_/', '', $col->name))
                                : $th;
                        ?>
                            <th><?= $th ?></th>
                        <?php
                        }
                        ?>
                        <th style='width:200px'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    $id = 'id_' . $menu;
                    $name = 'nama_' . $menu;

                    foreach ($data as $row) {
                    ?>
                        <tr>
                            <td align="center"><?= $index ?></td>

                            <?php
                            foreach (filterColumn($column) as $col) {
                                $col_name = $col->name;
                            ?>
                                <td><?= filterDataTable($row->$col_name, 'table') ?></td>
                            <?php
                            }
                            ?>

                            <td class='d-flex' style='flex-direction:row;justify-content:center'>
                                <button type="button" data-main-id='<?= $row->$id ?>' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalDetail">Detail</button>&nbsp;
                                <?php if ($menu === 'role') : ?>
                                    <button type="button" data-main-id='<?= $row->$id ?>' data-nama-role<?= " = '" . $row->$name . "'" ?> class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalHakAkses">Hak Akses</button>
                                    &nbsp;
                                <?php endif; ?>
                                <?php if ($hak_akses->can_delete === 't') : ?>
                                    <button type="button" data-main-id='<?= $row->$id ?>' data-name='<?php if (isset($row->$name)) echo $row->$name; ?>' class="btn btn-sm btn-<?= $row->status === 't' ? 'danger' : 'secondary' ?>" data-toggle="modal" title="Saat ini : <?= $row->status === 't' ? 'Aktif' : 'Nonaktif' ?>" data-target="#modalFlag"><i class='fa fa-flag'></i></button>
                                    &nbsp;
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php
                        $index++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        const exportColumn = [];
        $('#table thead tr th').map(col => {
            if (col < $('#table thead tr th').length - 1) exportColumn.push(col);
        });

        $('#table').DataTable({
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: {
                leftColumns: 1,
            },
            // dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>rt<"row"<"col-sm-6"B><"col-sm-6"p>>',
            buttons: [{
                extend: 'pdf',
                text: '<span class="fa fa-book"></span> Export as PDF',
                className: 'btn btn-light mr-1 btn-sm',
                title: "Detail <?= toTitle($menu) ?>",
                exportOptions: {
                    columns: exportColumn,
                }
            }, {
                extend: 'print',
                text: '<span class="fa fa-print"></span> Print',
                className: 'btn btn-light btn-sm',
                title: "Detail <?= toTitle($menu) ?>",
                exportOptions: {
                    columns: exportColumn,
                },
            }]
        });
    });
</script>