<div class="modal fade" id="modalFlag" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Flag <?= ucwords(str_replace('_', ' ', $menu)) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>action/flagDetail/<?= $menu . '/' . $user['id_user'] ?>'>
                <div class="modal-body">
                    <h6>Anda yakin ingin mengubah status <b><?= str_replace('_', ' ', $menu) ?> <span id='spanTitle'></span></b></h6>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <?php if ($hak_akses->can_delete === 't') : ?>
                        <input name="id_<?= $menu ?>" id="inputDelete" hidden>
                        <button type="submit" class="btn btn-danger">Ubah</button>
                    <?php endif; ?>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#modalFlag').on('show.bs.modal', function(event) {
        const button = $(event.relatedTarget)
        const modal = $(this)

        const id_data = button.data('main-id');
        const name = button.data('name').replace(/\_/g, " ");

        modal.find('#inputDelete').val(id_data);
        name && modal.find('#spanTitle').text(' : ' + name);
    });
</script>