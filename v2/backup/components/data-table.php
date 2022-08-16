<div class="card mb-3">
    <div class="card-header" style="display:flex; justify-content: space-between; align-items: flex-end">
        <a data-toggle="collapse" href="#data-table" role="button">
            <h6><strong class="card-title">+ Table <?= ucwords(str_replace('_', ' ', $tipe))  ?></strong></h6>
        </a>
        <?php if ($hak_akses->can_create === 't') : ?>
            <button class='btn btn-success btn-sm' data-toggle="modal" data-target="#modalAdd">Tambah <?= ucwords(str_replace('_', ' ', $tipe)) ?></button>
        <?php endif; ?>
    </div>
    <div class="collapse show" id='data-table'>
        <div class="card-body table-responsive">
            <table id="<?= $table ?>" class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th width='10px'>No.</th>
                        <?php
                        $i = 0;
                        foreach ($column as $title) {
                            $colName = ucwords(str_replace('id_', '', $title->column_name));
                            $colName = ucwords(str_replace('_', ' ', $colName));
                            if ($i !== 0 && $colName !== 'Password' && strpos($colName, ' Date') === False && strpos($colName, ' By') === False) echo "<th>" . $colName . "</th>";
                            $i++;
                        }
                        ?>
                        <th style='width:200px'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($data); $i++) {
                    ?>
                        <tr>
                            <td align="center"><?= $i + 1 ?></td>
                            <?php
                            $iIdData = 0;
                            $keyNama = '';
                            $valNama = '';
                            foreach ($column as $col) {
                                $colName = $col->column_name;

                                if ($iIdData === 0) $id_data = $data[$i]->$colName;
                                if (strpos($colName, 'nama_' . $tipe) !== False || strpos($colName, 'no_' . $tipe) !== False) {
                                    $keyNama = $colName;
                                    $valNama = $data[$i]->$colName;
                                }

                                $namaForeign = '';
                                if ($iIdData !== 0 && strpos($colName, 'id_') !== False) {
                                    $name = str_replace('id_', 'nama_', $colName);
                                    $specForeign = ($model->getSpecForeign(str_replace('id_', '', $colName), $data[$i]->$colName));
                                    $namaForeign = ($specForeign[0]->$name);
                                } else {
                                    $namaForeign = filterDataTable($data[$i]->$colName);
                                }

                                if ($iIdData !== 0 && $colName !== 'password' && strpos($colName, '_date') === False && strpos($colName, '_by') === False) {
                                    echo "<td>" .  $namaForeign . "</td>";
                                };
                                $iIdData++;
                            }
                            ?>
                            <td class='d-flex' style='flex-direction:row;justify-content:center'>
                                <button type="button" data-main-id='<?= $id_data ?>' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalDetail">Detail</button>&nbsp;
                                <?php if ($tipe === 'role') : ?>
                                    <button type="button" data-main-id='<?= $id_data ?>' data-nama-role<?= " = '" . $valNama . "'" ?> class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalHakAkses">Hak Akses</button>
                                    &nbsp;
                                <?php endif; ?>
                                <?php if ($hak_akses->can_delete === 't') : ?>
                                    <button type="button" data-main-id='<?= $id_data ?>' <?= 'data-' . $keyNama . " = '" . $valNama . "'" ?> class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete"><i class='fa fa-trash'></i></button>
                                    &nbsp;
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$this->load->view('components/modal-add');
if (count($data) > 0) {
    $this->load->view('components/modal-detail');
    $this->load->view('components/modal-hak_akses');
    $this->load->view('components/modal-delete', ['keyNama' => $keyNama]);
}
?>

<script type="text/javascript">
    $(document).ready(function() {
        const exportColumn = [];
        $('thead tr th').map(col => {
            if (col < $('thead tr th').length - 1) exportColumn.push(col);
        });

        $('#<?= $table ?>').DataTable();
    });
</script>

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