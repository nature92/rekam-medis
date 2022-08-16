<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit <?= ucwords($menu) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>transaksi/saldo/editsaldo/<?= $user['id_user'] ?>'>
                <input name='date' class='date-ubah' hidden>
                <div class="modal-body">
                    <h6>Tanggal : <span class='date-ubah'></span></h6>
                    <?php
                    $bank = '';
                    foreach ($column as $col) {
                        if ($col->nama_bank !== $bank) {
                            $bank = $col->nama_bank;
                            $id_bank = $col->id_bank;
                    ?>
                            <div class="card mb-2">
                                <div class="card-header p-0 pl-1">
                                    <h2 class="mb-0" width='100%'>
                                        <a class="btn btn-link trigger-collapse" style='width:100%;text-align:left' data-toggle="collapse" href='#' data-target="bank-<?= $col->id_bank ?>-ubah">
                                            <?php
                                            if (file_exists("assets/upload/mst_bank/img/$id_bank.png")) {
                                            ?>
                                                <img class='bank-logo' src="<?= base_url() ?>assets/upload/mst_bank/img/<?= $id_bank ?>.png?now=<?= date('YmdHis') ?>">
                                            <?php
                                            } else {
                                                echo 'Bank ' . $bank;
                                            }
                                            ?>
                                        </a>
                                    </h2>
                                </div>
                                <div id="bank-<?= $col->id_bank ?>-ubah" class="bank-collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                        <?php
                                    }

                                        ?>
                                        <div class="col-lg-6 form-group modal-input">
                                            <div class="form-row">
                                                <label class="col-5 col-form-label">
                                                    Rek.
                                                    <?= substr($col->no_rekening, 0, strlen($col->no_rekening) - 3) ?>
                                                    <b><?= substr($col->no_rekening, strlen($col->no_rekening) - 3, strlen($col->no_rekening)) ?></b>
                                                </label>
                                                <div class="col-7 input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text justify-content-center" style='min-width:40px'><?= filterCurrency($col->kode_currency) ?></span>
                                                    </div>
                                                    <input class="form-control input-number number-separator" id="rek-<?= $col->id_rekening ?>-ubah" name='rek-<?= $col->id_rekening ?>' style='text-align:right' required>
                                                </div>
                                            </div>
                                        </div>
                                        <?php

                                        $next = next($column);
                                        if (($next && $next->nama_bank !== $bank) || !$next) {
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                                        }
                        ?>
                    <?php
                    }

                    ?>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?php if ($hak_akses->can_create === 't') : ?>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    <?php endif; ?>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#modalEdit').on('show.bs.modal', function(event) {
        const modal = $(this);
        const date = modal.data('date');

        $('.date-ubah').val(date).html(date);
        dataRekening[date].map((data) => {
            $('#rek-' + data[0] + '-ubah').val(data[1] + 'first');
            $('#rek-' + data[0] + '-ubah').trigger('input');
        })

    });

    $('.trigger-collapse').on('click', (event) => {
        const button = event.currentTarget;
        const target = $(button).data('target');

        $('#' + target).collapse('toggle');
    })
</script>