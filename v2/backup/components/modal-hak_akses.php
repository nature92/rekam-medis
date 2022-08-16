<div class="modal fade" id="modalHakAkses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hakAksesTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>action/editHakAkses/<?= $hak_akses->id_menu . '/' . $user['nama_user'] ?>'>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class='table table-bordered' id='listAkses'>
                            <input id='id_role' name='id_role' value='' hidden>
                            <tr>
                                <th>Nama Menu</th>
                                <th>Create</th>
                                <th>Read</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            <?php
                            foreach ($list_kategori_menu as $kategori) { ?>
                                <tr style='background-color: #fafafa'>
                                    <td colspan="5" class='thead-dark'><a data-toggle="collapse" href="#menu<?= $kategori->id_kategori_menu ?>" role="button">+ <b><?= $kategori->nama_kategori_menu ?></b></a></td>
                                </tr>
                                <tbody class='reset_tbody collapse show' id='menu<?= $kategori->id_kategori_menu ?>'>

                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">

                    <?php if ($hak_akses->can_update === 't') : ?>
                        <button type="submit" class="btn btn-success btn-save-akses" hidden>Save</button>
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
        xml.open('GET', "<?= base_url() ?>dashboard/getHakAkses/" + id_role, false);
        xml.send();

        const dataAkses = JSON.parse(xml.response);

        dataAkses.map(col => {
            const menu = new XMLHttpRequest();

            menu.open('GET', "<?= base_url() ?>dashboard/getSpecForeign/menu/" + col['id_menu'], false);
            menu.send();

            const dataMenu = JSON.parse(menu.response)[0];

            // const list = modal.find('#listAkses').html();
            const c = col['can_create'] === 't' ? 'checked' : '';
            const r = col['can_read'] === 't' ? 'checked' : '';
            const u = col['can_update'] === 't' ? 'checked' : '';
            const d = col['can_delete'] === 't' ? 'checked' : '';

            const all = c && r && u && d ? 'checked' : '';

            const newList = [];
            // newList.push(list);
            newList.push("<tr>");
            newList.push("<td><input " + all + " type='checkbox' class='checkAll' onchange='checkAll(this, " + dataMenu['id_menu'] + ")' disabled /> " + dataMenu['nama_menu'].toUpperCase() + "</td>");
            newList.push("<td class='text-center'><input class='checkboxAkses input" + dataMenu['id_menu'] + "' name='can_create-" + col['id_menu'] + "x' type='checkbox' " + c + " value='t' disabled></td>");
            newList.push("<td class='text-center'><input class='checkboxAkses input" + dataMenu['id_menu'] + "' name='can_read-" + col['id_menu'] + "x' type='checkbox' " + r + " value='t' disabled></td>");
            newList.push("<td class='text-center'><input class='checkboxAkses input" + dataMenu['id_menu'] + "' name='can_update-" + col['id_menu'] + "x' type='checkbox' " + u + " value='t' disabled></td>");
            newList.push("<td class='text-center'><input class='checkboxAkses input" + dataMenu['id_menu'] + "' name='can_delete-" + col['id_menu'] + "x' type='checkbox' " + d + " value='t' disabled></td>");
            newList.push("</tr>");

            const url_menu = 'menu' + dataMenu['id_kategori_menu'];
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
    });

    $('.btn-edit-akses').on('click', function() {
        const modal = $('#modalHakAkses')
        $(this).attr('hidden', 'hidden')
        $('.btn-save-akses').removeAttr('hidden')
        modal.find('.checkboxAkses').removeAttr('disabled')
        modal.find('.checkAll').removeAttr('disabled')
    })

    function checkAll(cbox, id) {
        console.log(cbox);
        if (cbox.checked === true) {
            $('.input' + id).prop('checked', true)
        } else {
            $('.input' + id).prop('checked', false)
        }
    }
</script>