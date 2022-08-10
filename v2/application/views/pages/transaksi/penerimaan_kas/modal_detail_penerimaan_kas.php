<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Penerimaan Kas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>transaksi/penerimaan_kas/editPenerimaanKas'>
                <div class="modal-body">
                    <div class="row">

                        <!-- Id SCF -->
                        <input hidden id="id_penerimaan_kas-ubah" name="id_penerimaan_kas" />

                        <!-- Divisi -->
                        <div class="form-group col-md-12 modal-input">
                            <label class="col-form-label">Divisi</label>
                            <div id='input-divisi-ubah'>
                                <select class="selectize-ubah" id="divisi-ubah" name="divisi" required disabled>
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
                            <div id='input-tanggal_posting-ubah'>
                                <input type="date" class="form-control" id="tanggal_posting-ubah" name="tanggal_posting" value="<?= date("Y-m-d") ?>" disabled>
                            </div>
                        </div>

                        <!-- Bank -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Bank</label>
                            <div id='input-bank-ubah'>
                                <select class="selectize-ubah" id="bank-ubah" name="bank" required disabled>
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
                            <div id='input-jenis_transaksi-ubah'>
                                <select class="selectize-ubah" id="jenis_transaksi-ubah" name="jenis_transaksi" required disabled>
                                    <option value="" disabled selected>Pilih Jenis Transaksi</option>
                                    <?php foreach ($jenis_transaksi_arus_kas as $jenis_transaksi) : 
                                    if($jenis_transaksi->tipe_jenis_transaksi_arus_kas=="Cash In"){ ?>
                                        <option value="<?= $jenis_transaksi->id_jenis_transaksi_arus_kas ?>">
                                            <?= $jenis_transaksi->nama_jenis_arus_kas . " - " .    $jenis_transaksi->nama_jenis_transaksi_arus_kas ?>
                                        </option>
                                    <?php } ?>
                                        
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Nominal Transaksi -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Nominal Transaksi</label>
                            <div id='input-nominal_transaksi-ubah' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-ubah number-separator" id="nominal_transaksi-ubah" name="nominal_transaksi" style="text-align: right" value="0" disabled>
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="form-group col-md-12 modal-input">
                            <label class="col-form-label">Keterangan (Opsional)</label>
                            <div id='input-keterangan-ubah'>
                                <textarea class="form-control" id="keterangan-ubah" name="keterangan" placeholder="Keterangan" disabled></textarea>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">

                    <?php if ($hak_akses->can_update === 't') : ?>
                        <button type="button" class="btn btn-success" id='edit' onclick='handleDisabled()'>Edit</button>
                        <button type="submit" class="btn btn-success" id='simpan' hidden>Simpan</button>
                    <?php endif; ?>

                    <?php if ($hak_akses->can_delete === 't') : ?>
                        <button type="button" class="btn btn-danger" id='hapus' data-toggle="modal" data-target="#modalDelete">Hapus</button>
                    <?php endif; ?>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>


<script>
    //Select Searchable ------------------------------------------
    const selectize = $('.selectize-ubah').selectize({
        sortField: 'text'
    });

    //Handle Toggle Edit
    function handleDisabled() {
        $('#modalDetail input, #modalDetail select, #modalDetail textarea').removeAttr('disabled');
        selectize.map(item => selectize[item].selectize.enable());
        $('#modalDetail #simpan').removeAttr('hidden');
        $('#modalDetail #edit').attr('hidden', 'hidden');
    }

    //Reset State Saat Tutup Modal
    $('#modalDetail').on('hidden.bs.modal', function(event) {
        $('#modalDetail input, #modalDetail select, #modalDetail textarea').attr('disabled', 'disabled');
        selectize.map(item => selectize[item].selectize.disable());
        $('#modalDetail #simpan').attr('hidden', 'hidden');
        $('#modalDetail #edit').removeAttr('hidden');

        $('#modalDetail .input-error').html('');
    })

    //XML Detail SCF
    $('#modalDetail').on('show.bs.modal', function(event) {
        const xml = new XMLHttpRequest();
        const payloadKey = $(event.relatedTarget);
        const modal = $(this);

        const id = payloadKey.data('main-id');

        xml.open('GET', `<?= base_url() ?>transaksi/penerimaan_kas/getDetailPenerimaanKas/${id}`, false);
        xml.send();

        const data = JSON.parse(xml.response);

        //Assign Value Pada Field ---------------------------------------------------------------------

        //Id Penerimaan Kas
        $("#id_penerimaan_kas-ubah").val(id);

        //Selectize Penerimaan Kas
        selectize[0].selectize.setValue(data['id_divisi']);
        selectize[1].selectize.setValue(data['kode_bank']);
        selectize[2].selectize.setValue(data['id_jenis_transaksi_arus_kas']);

        //Input Penerimaan Kas
        $("#tanggal_posting-ubah").val(data['tanggal_posting'].replace(/T.+$/, ''));
        $("#nominal_transaksi-ubah").val(toStringLocaleId(data['nominal_penerimaan_kas'])).trigger('input');
        $("#keterangan-ubah").val(data['keterangan']);

        //Attribute Modal Delete
        $('#hapus').data("main-id", data['id_penerimaan_kas']);
    });

    $(document).ready(function() {



    })
</script>

<style>
    #modalDetail .selectize-ubah.single .selectize-input.disabled {
        background-color: rgb(247, 248, 255);
        border: 1px solid #ced4da;
        opacity: 1;
    }
</style>
