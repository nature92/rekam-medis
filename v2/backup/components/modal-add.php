<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah <?= ucwords(str_replace('_', ' ', $tipe)) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>action/addDetail/<?= $this_menu->id_menu . '/' . $tipe . '/' . $user['id_user'] ?>'>
                <div class="modal-body">
                    <div class="row">
                        <?php
                        $iColumn = 0;
                        foreach ($column as $title) {
                            $colName = ucwords(str_replace('id_', '', $title->column_name));
                            $colName = ucwords(str_replace('_', ' ', $colName));

                            if ($iColumn !== 0 && strpos($colName, ' Date') === False && strpos($colName, ' By') === False && strpos($colName, 'Last ') === False) {
                        ?>

                                <div class="form-group col-md-6 modal-input <?php if ($title->column_name === 'npp') {
                                                                                echo 'order-first';
                                                                            } ?>">
                                    <label for="<?= $title->column_name ?>" class="col-form-label"><?= $colName ?></label>

                                    <?php if (strpos($colName, 'Status') !== False || strpos($colName, 'Can ') !== False) : ?>
                                        <select class="form-control" id="<?= $title->column_name ?>-add" name='<?= $title->column_name ?>'>
                                            <option value='Aktif' selected>Aktif</option>
                                            <option value='Tidak Aktif'>Tidak Aktif</option>
                                        </select>

                                    <?php elseif (strpos($colName, 'Tgl ') !== False) : ?>
                                        <div id='input-<?= $title->column_name ?>'>
                                            <input type="date" class="form-control" id="<?= $title->column_name ?>-add" name='<?= $title->column_name ?>'>
                                        </div>

                                    <?php elseif (strpos($colName, 'Keterangan') !== False) : ?>
                                        <div id='input-<?= $title->column_name ?>'>
                                            <textarea class="form-control" id="<?= $title->column_name ?>-add" name='<?= $title->column_name ?>'></textarea>
                                        </div>

                                    <?php else : ?>
                                        <div id='input-<?= $title->column_name ?>'>
                                            <input <?php if ($title->column_name === 'password') {
                                                        echo 'type="password"';
                                                    } else if ($title->column_name === 'npp') {
                                                        echo 'type="number"';
                                                    } else {
                                                        echo 'type="text"';
                                                    } ?> class="form-control" id="<?= $title->column_name ?>-add" name='<?= $title->column_name ?>' <?php if ($title->column_name === 'npp') echo 'onkeyup="getPersonil(this.value)"'; ?>>

                                            <?php if ($colName === 'Npp' && $tipe === 'user') { ?>
                                                <div class="d-flex" style='justify-content:flex-end;margin-top:-28px;margin-right:35px'>
                                                    <div class='spinner-border spinner-border-sm text-secondary' id='npp-spinner' style='position:absolute' role='status' hidden></div>
                                                </div>
                                                <!-- <input id='tanggal_lahir' name='tanggal_lahir' hidden> -->
                                            <?php } ?>
                                        </div>

                                    <?php endif; ?>



                                </div>

                        <?php
                            }
                            $iColumn++;
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?php if ($hak_akses->can_create === 't') : ?>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    <?php endif; ?>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#modalAdd').on('show.bs.modal', function(event) {
        const button = $(event.relatedTarget) // Button that triggered the modal
        const modal = $(this)

        const dataCol = [<?php
                            $i = 0;
                            foreach ($column as $title) {
                                if (strpos($title->column_name, 'id_') !== False && $i !== 0) {
                                    echo "'" . $title->column_name . "', ";
                                }
                                $i++;
                            } ?>];


        dataCol.map(col => {

            const fKey = new XMLHttpRequest();
            fKey.open('GET', '<?= base_url() ?>dashboard/getForeign/' + col.replace('id_', ''), false);
            fKey.send();

            const dataForeign = JSON.parse(fKey.response);

            const newSelect = [];
            newSelect.push('<select class="form-control" id="' + col + '-add" name="' + col + '">');
            dataForeign.map((fCol) => {
                const dataFKey = Object.keys(fCol);
                const dataFVal = Object.values(fCol);

                if ('<?= $tipe ?>' === 'rekening' && col.includes('id_bank')) {
                    newSelect.push('<option value="' + dataFVal[0] + '">' + dataFVal[1] + ' - ' + dataFVal[2] + '</option>')
                } else {
                    newSelect.push('<option value="' + dataFVal[0] + '">' + dataFVal[1] + '</option>')
                }


            })
            newSelect.push('</select>');
            modal.find('#input-' + col).html(newSelect.join(' '));

        })

    });

    function getPersonil(npp) {
        npp.length == 0 && $('#nama_user-add').val('');
        const xml = new XMLHttpRequest();
        $('#npp-spinner').removeAttr('hidden');
        $('#password-add').removeAttr('disabled');
        $('#password-add').val('');
        $('#password-add').attr('type', 'password');

        if (npp.length > 0) {
            xml.open('GET', '<?= base_url() ?>action/getPersonil/' + npp);
            xml.send();
        }

        xml.onreadystatechange = () => {
            if (xml.readyState == 4 && xml.status == 200) {
                const dataPersonil = JSON.parse(xml.response);

                $('#npp-spinner').attr('hidden', 'hidden');
                dataPersonil && $('#nama_user-add').val(dataPersonil.nama_lengkap) && $('#tanggal_lahir').val(dataPersonil.tanggal_lahir);
                dataPersonil.password === 'ada' && $('#password-add').attr('disabled', 'disabled') && $('#password-add').val('Password otomatis') && $('#password-add').attr('type', 'text');
            }
        }
    }
</script>