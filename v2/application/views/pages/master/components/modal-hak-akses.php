<div class="modal fade" id="modalHakAkses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hakAksesTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>action/editHakAkses/<?= $user['nama_user'] ?>'>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class='table table-bordered' id='listAkses'>
                            <input id='id_role' name='id_role' value='' hidden>
                            <input id='aksesChanged' name='aksesChanged' value='' hidden>
                            <tr>
                                <th>Nama Menu</th>
                                <th>Create</th>
                                <th>Read</th>
                                <th>Update</th>
                                <th>Flag</th>
                            </tr>
                            <?php
                            foreach ($list_kategori_menu as $kategori) { ?>
                                <tr style='background-color: #fafafa'>
                                    <td colspan="5" class='thead-dark'><b class='text-primary'><?= $kategori->nama_kategori_menu ?></b></td>
                                </tr>
                                <tbody class='reset_tbody' id='menu<?= $kategori->id_kategori_menu ?>'>

                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">

                    <?php if ($hak_akses->can_update === 't') : ?>
                        <button type="submit" class="btn btn-success btn-save-akses" hidden disabled>Simpan</button>
                        <button type="button" class="btn btn-success btn-edit-akses">Edit</button>
                    <?php endif; ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#modalHakAkses').on('show.bs.modal', function(event) {
        const button = $(event.relatedTarget) // Button that triggered the modal
        const modal = $(this)

        const nama_role = button.data('nama-role');
        const id_role = button.data('main-id');
        $('#hakAksesTitle').text("Hak Akses : " + nama_role.toUpperCase());

        const xml = new XMLHttpRequest();
        xml.open('GET', "<?= base_url() ?>master/getHakAkses/" + id_role, false);
        xml.send();

        const dataAkses = JSON.parse(xml.response);

        dataAkses.map(col => {
            const menu = new XMLHttpRequest();

            // const list = modal.find('#listAkses').html();
            const c = col['can_create'] === 't' ? 'checked' : '';
            const r = col['can_read'] === 't' ? 'checked' : '';
            const u = col['can_update'] === 't' ? 'checked' : '';
            const d = col['can_delete'] === 't' ? 'checked' : '';

            const all = c && r && u && d ? 'checked' : '';

            const newList = [];
            // newList.push(list);
            newList.push("<tr>");
            newList.push("<td><input " + all + " type='checkbox' id='all" + col['id_menu'] + "' class='checkAll' onchange='checkAll(this, " + col['id_menu'] + ")' disabled /> " + col['nama_menu'].toUpperCase().replace(/\_/g, ' ') + "</td>");

            pushInput = (type, selected) => {
                newList.push("<td class='text-center'><input class='checkboxAkses input" + col['id_menu'] + "' name='" + col['id_menu'] + "-" + type + "' type='checkbox' " + selected + " value='t' onchange='checkOne(this)' disabled></td>");
            }

            pushInput('create', c);
            pushInput('read', r);
            pushInput('update', u);
            pushInput('delete', d);
            newList.push("</tr>");

            const url_menu = 'menu' + col['id_kategori_menu'];
            const exist = modal.find('#' + url_menu).html();

            modal.find('#' + url_menu).html(exist + newList.join(' '));
            modal.find('#id_role').val(id_role);
        });


    });

    $('#modalHakAkses').on('hidden.bs.modal', function(event) {
        const modal = $(this)
        $('.btn-edit-akses').removeAttr('hidden')
        $('.btn-save-akses').attr('hidden', 'hidden')

        modal.find('.reset_tbody').html('');

        modal.find('.checkboxAkses').attr('disabled', 'disabled');
        modal.find('.checkAll').attr('disabled', 'disabled');

        aksesChanged = [];
    });

    $('.btn-edit-akses').on('click', function() {
        const modal = $('#modalHakAkses')
        $(this).attr('hidden', 'hidden')
        $('.btn-save-akses').removeAttr('hidden')
        modal.find('.checkboxAkses').removeAttr('disabled')
        modal.find('.checkAll').removeAttr('disabled')
    })


    let aksesChanged = [];

    function checkOne(cbox) {
        const found = aksesChanged.find(item => item === cbox.name);
        found ? (aksesChanged = aksesChanged.filter(item => item !== cbox.name)) : aksesChanged.push(cbox.name);

        $('#aksesChanged').val(aksesChanged.join(','));

        let getClass = $(cbox).attr('class');
        getIdMenu = getClass.match(/(\s)([a-z0-9]+)/)[0].replace(' input', '');
        getClass = getClass.match(/(\s)([a-z0-9]+)/)[0].replace(' ', '');

        let check = true;
        $('.' + getClass).map((i) => {
            const input = $('.' + getClass)[i];
            $(input).prop('checked') === false && (check = false);
        })
        check ? $('#all' + getIdMenu).prop('checked', true) : $('#all' + getIdMenu).prop('checked', false);
        handleSubmit($('#aksesChanged').val());
    }

    function checkAll(cbox, id) {
        if (cbox.checked === true) {
            $('.input' + id).map(i => {
                const input = $('.input' + id)[i];
                if ($(input).prop('checked') === false) {
                    $(input).prop('checked', true);
                    $(input).change();
                }
            })
        } else {
            $('.input' + id).map(i => {
                const input = $('.input' + id)[i];
                if ($(input).prop('checked') === true) {
                    $(input).prop('checked', false);
                    $(input).change();
                }
            })
        }
    }

    function handleSubmit(input) {
        input ? $('.btn-save-akses').removeAttr('disabled') : $('.btn-save-akses').attr('disabled', 'disabled');
    };
</script>