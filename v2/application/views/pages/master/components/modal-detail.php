<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah <?= ucwords($menu) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Action/editDetail/' . $menu . '/' . $user['id_user']) ?>
            <div class="modal-body">
                <input type="text" class="form-control" id="id" name='id_<?= $menu ?>' hidden>
                <div class="row">
                    <?php foreach (filterInputColumn($column) as $col) {
                        $title = $col->name === 'npp'
                            ? strtoupper($col->name)
                            : ucwords(str_replace('_', ' ', $col->name));
                        $fk_name = str_replace('nama_', '', $col->name);
                        $fk_array = [];
                        if (isset($foreign[$fk_name])) {
                            $fk_array = $foreign[$fk_name];
                            $title = str_replace('Nama ', '', $title);
                        }
                    ?>
                        <div class="form-group col-md-6 modal-input">
                            <label for="<?= $col->name ?>" class="col-form-label"><?= $title ?></label>
                            <?php filterInput($col->name, $fk_array, 'ubah', $this->agent->browser(), $col->enum_value) ?>
                            <span class='input-error' id='error-<?= $col->name ?>'></span>
                        </div>
                    <?php
                    }

                    // If Has Image Folder
                    if (file_exists('assets/upload/mst_' . $menu)) {
                    ?>
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Gambar/Icon <?= ucwords($menu) ?></label>
                            <img class='img-master' id='gambar-ubah' src="" onerror="changeImg()" alt=' Tidak ada gambar'>
                            <input class='form-control' type="file" name='file-gambar' accept="image/x-png,image/jpeg" onchange='previewGambarUbah(this)'>
                        </div>
                    <?php
                    }


                    ?>
                </div>
            </div>
            <div class="modal-footer">

                <?php if ($hak_akses->can_update === 't') : ?>
                    <button type="button" class="btn btn-success" id='edit' onclick='handleDisabled()'>Edit</button>
                    <button type="submit" class="btn btn-success" id='simpan' hidden>Simpan</button>
                <?php endif; ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function handleDisabled() {
        $('#modalDetail input, #modalDetail select, #modalDetail textarea').removeAttr('disabled');
        $('#modalDetail #simpan').removeAttr('hidden');
        $('#modalDetail #edit').attr('hidden', 'hidden');

        //Exception
        const except = ['npp'];

        except.map((col) => {
            $('#' + col + '-ubah').attr('disabled', 'disabled');
        })
    }

    $('#modalDetail').on('hidden.bs.modal', function(event) {
        $('#modalDetail input, #modalDetail select, #modalDetail textarea').attr('disabled', 'disabled');
        $('#modalDetail #simpan').attr('hidden', 'hidden');
        $('#modalDetail #edit').removeAttr('hidden');

        $('#modalDetail .input-error').html('');
    })

    let id = '';
    $('#modalDetail input, #modalDetail select, #modalDetail textarea').attr('disabled', 'disabled');
    $('#modalDetail').on('show.bs.modal', function(event) {

        const xml = new XMLHttpRequest();
        const button = $(event.relatedTarget);
        const modal = $(this);

        id = button.data('main-id');

        xml.open('GET', '<?= base_url() ?>master/getDetail/<?= $menu ?>/' + id, false);
        xml.send();

        const data = JSON.parse(xml.response);

        Object.keys(data).map((col, index) => {
            const browser = "<?= $this->agent->browser() ?>";
            let value = data[col];
            modal.find('#' + col + '-ubah').val(value);

            // Color Picker
            col.includes('warna') && modal.find('#' + col + '-ubah').css('background', "linear-gradient(to right, " + value + " 0%, " + value + " 30px, rgba(0, 0, 0, 0) 31px, rgba(0, 0, 0, 0) 100%)");

            // Datepicker
            value && value.match(/T\d{2}:\d{2}/) && (value = value.replace(/T\d{2}:\d{2}/, '')) && modal.find('#' + col + '-ubah').val(value);

        })
        modal.find('#id').val(data['id_<?= $menu ?>']);


        i = 0;
        modal.find('#gambar-ubah').attr('src', '<?= base_url() ?>assets/upload/mst_<?= $menu ?>/img/' + id + '.' + allowed[i] + '?now=<?= date('YmdHis') ?>');

    })

    const allowed = ['png'];
    let i = 0;

    function changeImg() {
        if (i < allowed.length) {
            $('#gambar-ubah').attr('src', '<?= base_url() ?>assets/upload/mst_<?= $menu ?>/img/' + id + '.' + allowed[i] + '?now=<?= date('YmdHis') ?>');
            i++;
        }
    }

    function previewGambarUbah(input) {
        const reader = new FileReader();
        reader.onload = (e) => {
            $('#gambar-ubah').attr('src', e.target.result)
        }

        reader.readAsDataURL(input.files[0]);
    }
</script>