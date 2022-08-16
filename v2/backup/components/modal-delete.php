<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus <?= ucwords(str_replace('_', ' ', $tipe)) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>action/hapusDetail/<?= $this_menu->id_menu . '/' . $tipe . '/' . $user['id_user'] ?>'>
                <div class="modal-body">
                    <h6>Anda yakin ingin menghapus <b><?= str_replace('_', ' ', $tipe) ?> : <span id='spanTitle'></span></b></h6>
                </div>
                <div class="modal-footer">

                    <?php if ($hak_akses->can_delete === 't') : ?>
                        <input name="id_<?= $tipe ?>" id="inputDelete" hidden>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    <?php endif; ?>

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#modalDelete').on('show.bs.modal', function(event) {
        const button = $(event.relatedTarget)
        const modal = $(this)

        const id_data = button.data('main-id');
        const <?= $keyNama ?> = button.data('<?= $keyNama ?>');

        modal.find('#inputDelete').val(id_data);
        modal.find('#spanTitle').text(<?= $keyNama ?>);
    });
</script>