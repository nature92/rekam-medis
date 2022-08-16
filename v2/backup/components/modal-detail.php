<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail <?= ucwords(str_replace('_', ' ', $tipe)) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>action/editDetail/<?= $this_menu->id_menu . '/' . $tipe . '/' . $user['id_user'] ?>'>
                <div class="modal-body">
                    <div class="row">
                        <?php
                        $iInput = 0;
                        foreach ($column as $title) {
                            $colName = ucwords(str_replace('id_', '', $title->column_name));
                            $colName = ucwords(str_replace('_', ' ', $colName));;

                            if ($colName !== 'Password' && strpos($colName, 'Created ') === False && strpos($colName, 'Modified ') === False) {
                                if ($iInput !== 0) :
                        ?>

                                    <div class="form-group col-md-6 modal-input">
                                        <label for="<?= $title->column_name ?>" class="col-form-label"><?= $colName ?></label>

                                        <?php if (strpos($colName, 'Status') !== False || strpos($colName, 'Can ') !== False) : ?>
                                            <select class="form-control" id="<?= $title->column_name ?>" name='<?= $title->column_name ?>' disabled>
                                                <option value='Aktif' selected>Aktif</option>
                                                <option value='Tidak Aktif'>Tidak Aktif</option>
                                            </select>

                                        <?php elseif (strpos($colName, 'Tgl ') !== False) : ?>
                                            <div id='input-<?= $title->column_name ?>'>
                                                <input type="date" class="form-control" id="<?= $title->column_name ?>" name='<?= $title->column_name ?>' disabled>
                                            </div>

                                        <?php else : ?>
                                            <div id='input-<?= $title->column_name ?>'>
                                                <input type="text" class="form-control" id="<?= $title->column_name ?>" name='<?= $title->column_name ?>' disabled>
                                            </div>

                                        <?php endif; ?>

                                    </div>
                                <?php else : ?>
                                    <input type="text" class="form-control" id="<?= $title->column_name ?>1" name='<?= $title->column_name ?>' hidden>


                                <?php endif; ?>

                        <?php };
                            $iInput++;
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">

                    <?php if ($hak_akses->can_update === 't') : ?>
                        <button type="submit" class="btn btn-success btn-save" hidden>Save</button>
                        <button type="button" class="btn btn-success btn-edit">Edit</button>
                    <?php endif; ?>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    filterDate = (date) => {
        const d = new Date(Date.parse(date));
        return d.getFullYear() + '-' + (d.getMonth() < 10 ? '0' : '') + d.getMonth() + '-' + (d.getDate() < 10 ? '0' : '') + d.getDate();
    }

    $('#modalDetail').on('show.bs.modal', function(event) {
        const xmlhttp = new XMLHttpRequest();
        const button = $(event.relatedTarget) // Button that triggered the modal
        const modal = $(this)

        const id_data = button.data('main-id');

        //Fungsi Select Foreign
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const data = JSON.parse(this.response);

                data.map((col) => {
                    const dataKey = Object.keys(col);
                    const dataVal = Object.values(col);

                    for (let i = 0; i < dataKey.length; i++) {
                        dataVal[i] = dataVal[i] === 't' ? 'Aktif' : dataVal[i] === 'f' ? 'Tidak Aktif' : dataVal[i];
                        if (dataKey[i].includes('_date') || dataKey[i].includes('tgl_') || dataKey[i].includes('last_login')) {
                            dataVal[i] = filterDate(dataVal[i]);
                        };

                        if (dataKey[i].includes('id_') && i !== 0) {
                            const fKey = new XMLHttpRequest();
                            fKey.open('GET', '<?= base_url() ?>dashboard/getForeign/' + dataKey[i].replace('id_', ''), false);
                            fKey.send();

                            const dataForeign = JSON.parse(fKey.response);
                            const newSelect = [];
                            newSelect.push('<select class="form-control" id="' + dataKey[i] + '" name="' + dataKey[i] + '" disabled>');

                            dataForeign.map((fCol) => {
                                const dataFKey = Object.keys(fCol);
                                const dataFVal = Object.values(fCol);

                                newSelect.push('<option value="' + dataFVal[0] + '" >' + dataFVal[1] + '</option>')


                            })

                            newSelect.push('</select>');
                            modal.find('#input-' + dataKey[i]).html(newSelect.join(' '));

                        }

                        modal.find('#' + dataKey[i]).val(dataVal[i]);
                        modal.find('#' + dataKey[i] + '1').val(dataVal[i]);
                    }
                });
            }
        };



        xmlhttp.open('GET', '<?= base_url() ?>dashboard/getDetail/<?= $tipe . '/' ?>' + id_data)
        xmlhttp.send()

    })

    $('#modalDetail').on('hidden.bs.modal', function(event) {
        const modal = $('#modalDetail')
        $('.btn-edit').removeAttr('hidden')
        $('.btn-save').attr('hidden', 'hidden')
        <?php
        foreach ($column as $title) {
            $colName = $title->column_name; ?>
            modal.find('#<?= $colName ?>').attr('disabled', 'disabled')

        <?php }
        ?>
    })

    $('.btn-edit').on('click', function() {
        const modal = $('#modalDetail')
        $(this).attr('hidden', 'hidden')
        $('.btn-save').removeAttr('hidden')
        <?php
        $i = 0;
        foreach ($column as $title) {
            $colName = $title->column_name;
            if ($i !== 0 && strpos($colName, '_date') === false && strpos($colName, '_by') === false && strpos($colName, 'last') === false && $colName !== 'npp') {
        ?>
                modal.find('#<?= $colName ?>').removeAttr('disabled')

        <?php }
            $i++;
        }
        ?>

    })
</script>