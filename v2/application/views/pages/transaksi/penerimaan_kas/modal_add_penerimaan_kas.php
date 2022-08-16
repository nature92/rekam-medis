<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penerimaan Kas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>transaksi/penerimaan_kas/addPenerimaanKas'>
                <div class="modal-body">
                    <div class="row">

                        <!-- Divisi -->
                        <div class="form-group col-md-12 modal-input">
                            <label class="col-form-label">Divisi</label>
                            <div id='input-divisi-add'>
                                <select class="selectize-add" id="divisi-add" name="divisi" required>
                                    <option value="" disabled selected>Pilih Divisi</option>
                                    <?php foreach ($divisi as $div) : ?>
                                        <option value="<?= $div->kode_unit ?>"><?= $div->nama_unit ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Tanggal Posting -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Tanggal Posting</label>
                            <div id='input-tanggal_posting-add'>
                                <input type="date" class="form-control" id="tanggal_posting-add" name="tanggal_posting" value="<?= date("Y-m-d") ?>">
                            </div>
                        </div>

                        <!-- Bank -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Bank</label>
                            <div id='input-bank-add'>
                                <select class="selectize-add" id="bank-add" name="bank" required>
                                    <option value="" disabled selected>Pilih Bank</option>
                                    <?php foreach ($bank as $b) : ?>
                                        <option value="<?= $b->kode_bank ?>"><?= $b->kode_bank." | ".$b->nama_bank ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Jenis Transaksi Arus Kas -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Jenis Transaksi Arus Kas</label>
                            <div id='input-jenis_transaksi-add'>
                                <select class="selectize-add" id="jenis_transaksi-add" name="jenis_transaksi" required>
                                    <option value="" disabled selected>Pilih Jenis Transaksi</option>
                                    <?php foreach ($jenis_transaksi_arus_kas as $jenis_transaksi) : 
                                    if($jenis_transaksi->tipe_jenis_transaksi_arus_kas=="Cash In"){ ?>
                                        <option value="<?= $jenis_transaksi->id_jenis_transaksi_arus_kas ?>">
                                            <?=$jenis_transaksi->nama_jenis_arus_kas . " - " . $jenis_transaksi->nama_jenis_transaksi_arus_kas ?>
                                        </option>
                                    <?php }
                                    ?>
                                        
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Nominal Transaksi -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Nominal Transaksi</label>
                            <div id='input-nominal_transaksi-add' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-add number-separator" id="nominal_transaksi-add" name="nominal_transaksi" style="text-align: right" value="0">
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="form-group col-md-12 modal-input">
                            <label class="col-form-label">Keterangan (Opsional)</label>
                            <div id='input-keterangan-add'>
                                <textarea class="form-control" id="keterangan-add" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                        </div>


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
    $(document).ready(function() {

        //Divisi Select Searchable ------------------------------------------
        $('.selectize-add').selectize({
            sortField: 'text'
        });

    })
</script>
