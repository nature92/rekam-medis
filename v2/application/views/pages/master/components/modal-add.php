<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah <?= ucwords($menu) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart("Action/addDetail/" . $menu . "/" . $user['id_user']) ?>
            <div class="modal-body">
                <div class="row">
                    <?php foreach (filterInputColumn($column, $menu, 'add') as $col) {
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
                            <label class="col-form-label"><?= $title ?></label>
                            <?php filterInput($col->name, $fk_array, 'tambah', $this->agent->browser(), $col->enum_value) ?>
                            <span class='input-error' id='error-<?= $col->name ?>'></span>
                        </div>
                    <?php
                    }

                    // If Has Image Folder
                    if (file_exists('assets/upload/mst_' . $menu)) {
                    ?>
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Gambar/Icon <?= ucwords($menu) ?> (Opsional)</label>
                            <img class='img-master' id='gambar-tambah' src="">
                            <input class='form-control' type="file" name='file-gambar' accept="image/x-png" onchange='previewGambarTambah(this)'>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php if ($hak_akses->can_create === 't') : ?>
                    <button type="submit" class="btn btn-primary" disabled>Tambah</button>
                <?php endif; ?>

            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewGambarTambah(input) {
        const reader = new FileReader();
        reader.onload = (e) => {
            $('#gambar-tambah').attr('src', e.target.result)
        }

        reader.readAsDataURL(input.files[0]);
    }

    $('.datepicker-single').daterangepicker({
        singleDatePicker: true,
        locale: {
            format: 'Y-MM-DD'
        }
    }).val('');
</script>

<?php if ($menu === 'user') { ?>
    <script>
        function getPersonil(npp) {
            npp.length == 0 && $('#nama_user-tambah').val('');
            const xml = new XMLHttpRequest();
            $('#npp-spinner').removeAttr('hidden');
            $('#password-tambah').removeAttr('disabled');
            $('#password-tambah').val('');
            $('#password-tambah').attr('type', 'password');

            if (npp.length > 0) {
                xml.open('GET', '<?= base_url() ?>master/getPersonil/' + npp);
                xml.send();
            }

            xml.onreadystatechange = () => {
                if (xml.readyState == 4 && xml.status == 200) {
                    const dataPersonil = JSON.parse(xml.response);

                    $('#npp-spinner').attr('hidden', 'hidden');
                    dataPersonil && $('#nama_user-tambah').val(dataPersonil.nama_lengkap);
                    dataPersonil.password === 'ada' && $('#password-tambah').attr('disabled', 'disabled') && $('#password-tambah').val('Password otomatis') && $('#password-tambah').attr('type', 'text');

                    $('#nama_user-tambah').keyup();
                    $('#password-tambah').keyup();
                }
            }
        }

        let nama_user_array = [];
        let npp_array = [];

        function getUser(nama_user) {
            if (!nama_user) return null;
            // if ($('.autocomplete-items').length) $('.autocomplete-items').remove();

            const xml = new XMLHttpRequest();
            xml.open('GET', '<?= base_url() ?>master/getNamaPersonil/' + encodeURI(nama_user));
            xml.send();

            nama_user_array = [];
            npp_array = [];
            xml.onreadystatechange = () => {
                if (xml.readyState == 4 && xml.status == 200) {

                    const dataPersonil = JSON.parse(xml.response);
                    dataPersonil.map(personil => {
                        nama_user_array.push(personil.nama_lengkap + (personil.div ? ' - ' + personil.div : ''));
                        npp_array.push(personil.npp);
                    })

                    autocomplete(document.getElementById("nama_user-tambah"), nama_user_array, npp_array);
                }
            }
        }
    </script>
<?php
}
?>