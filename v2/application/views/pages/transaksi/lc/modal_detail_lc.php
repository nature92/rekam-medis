<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail LC/SKBDN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>transaksi/lc/editscf/'>
                <div class="modal-body">
                    <div class="row">

                        <!-- Id SCF -->
                        <input hidden id="id_scf-ubah" name="id_scf" />

                        <!-- Divisi -->
                        <div class="form-group col-md-12 modal-input">
                            <label class="col-form-label">Divisi</label>
                            <div id='input-divisi-ubah'>
                                <select id="divisi-ubah" name="divisi" required disabled>
                                    <option value="" disabled selected>Pilih Divisi</option>
                                    <?php foreach ($divisi as $div) : ?>
                                        <option value="<?= $div->kode_unit ?>"><?= $div->nama_unit ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <hr class="col-11 hr-input-modal" />

                        <!-- Nomor Bukti Kas -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Nomor Bukti Kas</label>
                            <div id='input-nomor_bukti_kas-ubah'>
                                <input type="text" class="form-control" id="nomor_bukti_kas-ubah" name="nomor_bukti_kas" placeholder="Nomor Bukti Kas" disabled>
                            </div>
                        </div>

                        <!-- Nomor PO -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Nomor PO</label>
                            <div id='input-nomor_po-ubah'>
                                <input type="text" class="form-control" id="nomor_po-ubah" name="nomor_po" placeholder="Nomor PO" disabled>
                            </div>
                        </div>

                        <!-- Nama Barang -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Nama Barang</label>
                            <div id='input-nama_barang-ubah'>
                                <input type="text" class="form-control" id="nama_barang-ubah" name="nama_barang" placeholder="Nama Barang" disabled>
                            </div>
                        </div>

                        <!-- Nama Supplier -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Nama Supplier</label>
                            <div id='input-nama_supplier-ubah'>
                                <input type="text" class="form-control" id="nama_supplier-ubah" name="nama_supplier" placeholder="Nama Supplier" disabled>
                            </div>
                        </div>

                        <hr class="col-11 hr-input-modal" />

                        <!-- Bulan Penerimaan BK -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Bulan Penerimaan Bank</label>
                            <div id='input-bulan_penerimaan_bank-ubah'>
                                <input type="date" class="form-control" id="bulan_penerimaan_bank-ubah" name="bulan_penerimaan_bank" value="<?= date("Y-m-d") ?>" disabled>
                            </div>
                        </div>

                        <!-- Bulan Submit Bank -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Bulan Submit Dokumen Pada Bank</label>
                            <div id='input-bulan_submit_bank-ubah'>
                                <input type="date" class="form-control" id="bulan_submit_bank-ubah" name="bulan_submit_bank" value="<?= date("Y-m-d") ?>" disabled>
                            </div>
                        </div>

                        <!-- Nominal SCF Sesuai Kas -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Nominal SCF Sesuai Bukti Kas</label>
                            <div id='input-nominal_sesuai_bukti_kas-ubah' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-ubah number-separator" id="nominal_sesuai_bukti_kas-ubah" name="nominal_sesuai_bukti_kas" style="text-align: right" value="0" disabled>
                            </div>
                        </div>

                        <!-- Biaya SCF Vendor -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Biaya SCF Ditanggung Vendor</label>
                            <div id='input-biaya_scf_vendor-ubah' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-ubah number-separator" id="biaya_scf_vendor-ubah" name="biaya_scf_vendor" style="text-align: right" value="0" disabled>
                            </div>
                        </div>

                        <!-- Biaya SCF Pindad -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Biaya SCF Ditanggung Pindad</label>
                            <div id='input-biaya_scf_pindad-ubah' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-ubah number-separator" id="biaya_scf_pindad-ubah" name="biaya_scf_pindad" style="text-align: right" value="0" disabled>
                            </div>
                        </div>

                        <!-- Biaya SCF -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label label-popover" data-toggle="popover" data-content="Biaya SCF Vendor + Biaya SCF Pindad">
                                <span class="popover-label">Biaya SCF</span>
                            </label>
                            <div id='input-biaya_scf-ubah' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-ubah number-separator" id="biaya_scf-ubah" name="biaya_scf" style="text-align: right" value="0" disabled>
                            </div>
                        </div>

                        <!-- Jumlah Nominal & Biaya SCF -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label label-popover" data-toggle="popover" data-content="Nominal SCF + Biaya SCF">
                                <span class="popover-label">Jumlah Nominal & Biaya SCF</span>
                            </label>
                            <div id='input-jumlah_nominal_biaya_scf-ubah' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-ubah number-separator" id="jumlah_nominal_biaya_scf-ubah" name="jumlah_nominal_biaya_scf" style="text-align: right" value="0" disabled>
                            </div>
                        </div>

                        <hr class="col-11 hr-input-modal" />

                        <!-- Tanggal Mulai SCF -->
                        <div class="form-group col-md-5 modal-input">
                            <label class="col-form-label">Tanggal Mulai SCF</label>
                            <div id='input-tanggal_mulai_scf-ubah'>
                                <input type="date" class="form-control" id="tanggal_mulai_scf-ubah" name="tanggal_mulai_scf" value="<?= date("Y-m-d") ?>" disabled>
                            </div>
                        </div>

                        <!-- Tenor -->
                        <div class="form-group col-md-2 modal-input">
                            <label class="col-form-label">Tenor (Hari)</label>
                            <div id='input-tenor-ubah'>
                                <input type="number" class="form-control" id="tenor-ubah" name="tenor" min="0" value="0" disabled>
                            </div>
                        </div>

                        <!-- Tanggal Akhir SCF -->
                        <div class="form-group col-md-5 modal-input">
                            <label class="col-form-label">Tanggal Akhir SCF</label>
                            <div id='input-tanggal_akhir_scf-ubah'>
                                <input type="date" class="form-control" id="tanggal_akhir_scf-ubah" name="tanggal_akhir_scf" value="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>" disabled>
                            </div>
                        </div>

                        <hr class="col-11 hr-input-modal" />

                        <!-- Keterangan -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Keterangan</label>
                            <div id='input-keterangan-ubah'>
                                <textarea class="form-control" id="keterangan-ubah" name="keterangan" placeholder="Keterangan" disabled></textarea>
                            </div>
                        </div>

                        <!-- Status Pembayaran -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Status Pembayaran</label>
                            <div id='input-status_pembayaran-ubah'>
                                <select class="form-control" id="status_pembayaran-ubah" name="status_pembayaran" disabled>
                                    <option value="false" selected>Belum Dibayarkan</option>
                                    <option value="true">Sudah Dibayarkan</option>
                                </select>
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
    //Divisi Select Searchable ------------------------------------------
    const $divisiUbahSelectize = $('#divisi-ubah').selectize({
        sortField: 'text'
    });
    const divisiUbahSelectize = $divisiUbahSelectize[0].selectize;

    //Handle Toggle Edit
    function handleDisabled() {
        $('#modalDetail input, #modalDetail select, #modalDetail textarea').removeAttr('disabled');
        divisiUbahSelectize.enable();
        $('#modalDetail #simpan').removeAttr('hidden');
        $('#modalDetail #edit').attr('hidden', 'hidden');

        //Exception
        const except = ['biaya_scf', 'jumlah_nominal_biaya_scf'];

        except.map((col) => {
            $('#' + col + '-ubah').attr('disabled', 'disabled');
        })
    }

    //Reset State Saat Tutup Modal
    $('#modalDetail').on('hidden.bs.modal', function(event) {
        $('#modalDetail input, #modalDetail select, #modalDetail textarea').attr('disabled', 'disabled');
        divisiUbahSelectize.disable();
        $('#modalDetail #simpan').attr('hidden', 'hidden');
        $('#modalDetail #edit').removeAttr('hidden');

        $('#modalDetail .input-error').html('');
    })

    //XML Detail LC
    $('#modalDetail').on('show.bs.modal', function(event) {
        const xml = new XMLHttpRequest();
        const payloadKey = $(event.relatedTarget);
        const modal = $(this);

        const id = payloadKey.data('main-id');

        xml.open('GET', `<?= base_url() ?>transaksi/lc/getDetailLC/${id}`, false);
        xml.send();

        const data = JSON.parse(xml.response);

        //Assign Value Pada Field

        //Id LC
        $("#id_scf-ubah").val(id);

        //Informasi LC
        divisiUbahSelectize.setValue(data['id_divisi']);
        $("#nomor_bukti_kas-ubah").val(data['nomor_bukti_kas']);
        $("#nomor_po-ubah").val(data['nomor_po']);
        $("#nama_barang-ubah").val(data['nama_barang']);
        $("#nama_supplier-ubah").val(data['nama_supplier']);
        $("#nama_supplier-ubah").val(data['nama_supplier']);

        //Bulan Penerimaan & Submit
        $("#bulan_penerimaan_bank-ubah").val(data['bulan_penerimaan_bank'].replace(/T.+$/, ''));
        $("#bulan_submit_bank-ubah").val(data['bulan_submit_bank'].replace(/T.+$/, ''));

        //Biaya LC
        $("#biaya_scf_vendor-ubah").val(toStringLocaleId(data['biaya_scf_vendor'])).trigger('input');
        $("#biaya_scf_pindad-ubah").val(toStringLocaleId(data['biaya_scf_pindad'])).trigger('input');
        $("#nominal_sesuai_bukti_kas-ubah").val(toStringLocaleId(data['nominal_bukti_kas'])).trigger('input');

        //Tanggal LC
        let tenor = +data['tenor'];
        let tglMulai = new Date(data['tanggal_mulai_scf'].replace(/T.+$/, "") + "T00:00");
        let tglAkhir = new Date(tglMulai.setDate(tglMulai.getDate() + tenor));

        $("#tanggal_mulai_scf-ubah").val(data['tanggal_mulai_scf'].replace(/T.+$/, ""));
        $("#tenor-ubah").val(data['tenor']);
        $("#tanggal_akhir_scf-ubah").attr("min", data['tanggal_mulai_scf'].replace(/T.+$/, ""));
        $("#tanggal_akhir_scf-ubah").val(dateToString(tglAkhir));

        //Keterangan & Status
        $("#keterangan-ubah").val(data['keterangan']);
        $("#status_pembayaran-ubah").val(data['status_pembayaran'] == 'Aktif' ? "true" : "false");

        //Attribute Modal Delete
        $('#hapus').data("main-id", data['id_scf']).data("name", data['nomor_bukti_kas']);

    });

    $(document).ready(function() {

        //Kalkulasi Biaya SCF -----------------------------------------------

        let biayaScfVendor = toNumberFromLocaleId($("#biaya_scf_vendor-ubah").val());
        let biayaScfPindad = toNumberFromLocaleId($("#biaya_scf_pindad-ubah").val());
        let nominalSesuaiBuktiKas = toNumberFromLocaleId($("#nominal_sesuai_bukti_kas-ubah").val());
        let biayaScf = biayaScfVendor + biayaScfPindad;
        let jumlahBiayaScf = nominalSesuaiBuktiKas = biayaScf;

        // Biaya SCF Vendor Listener
        $("#biaya_scf_vendor-ubah").on("input", function(e) {
            biayaScfVendor = toNumberFromLocaleId(e.target.value);
        })

        // Biaya SCF Pindad Listener
        $("#biaya_scf_pindad-ubah").on("input", function(e) {
            biayaScfPindad = toNumberFromLocaleId(e.target.value);
        })

        // Nominal SCF Listener
        $("#nominal_sesuai_bukti_kas-ubah").on("input", function(e) {
            nominalSesuaiBuktiKas = toNumberFromLocaleId(e.target.value);
        })

        // Biaya SCF Listener
        $("#biaya_scf_vendor-ubah, #biaya_scf_pindad-ubah").on("input", function(e) {
            biayaScf = biayaScfVendor + biayaScfPindad;
            $("#biaya_scf-ubah").val(toStringLocaleId(biayaScf)).trigger("input");
        })

        // Jumlah Biaya SCF Listener
        $("#nominal_sesuai_bukti_kas-ubah, #biaya_scf-ubah").on("input", function(e) {
            jumlahBiayaScf = nominalSesuaiBuktiKas + biayaScf;
            $("#jumlah_nominal_biaya_scf-ubah").val(toStringLocaleId(jumlahBiayaScf)).trigger("input");
        })

        // Kalkulasi Tenor & Tanggal SCF ------------------------------------

        let tanggalMulai = new Date($("#tanggal_mulai_scf-ubah").val() + "T00:00");
        let tanggalAkhir = new Date($("#tanggal_akhir_scf-ubah").val() + "T00:00");
        let tenor = $("#tenor-ubah").val()

        //Tanggal Mulai Listener
        $("#tanggal_mulai_scf-ubah").on("input", function(e) {
            tanggalMulai = new Date($("#tanggal_mulai_scf-ubah").val() + "T00:00");

            //Ubah Min Date
            $("#tanggal_akhir_scf-ubah").attr("min", dateToString(tanggalMulai))

            //Shift Tanggal Akhir jika mendahului Tanggal Mulai
            tenor = (tanggalAkhir - tanggalMulai) / 86400000
            if (tenor < 0) {
                tanggalAkhir = tanggalMulai;
                $("#tanggal_akhir_scf-ubah").val(dateToString(tanggalAkhir));

                tenor = 0;
            }
            $("#tenor-ubah").val(tenor)

        })

        //Tanggal Akhir Listener
        $("#tanggal_akhir_scf-ubah").on("input", function(e) {
            tanggalAkhir = new Date($("#tanggal_akhir_scf-ubah").val() + "T00:00");
            tenor = (tanggalAkhir - tanggalMulai) / 86400000
            $("#tenor-ubah").val(tenor)
        })

        //Tenor
        $("#tenor-ubah").on("input", function(e) {
            tenor = +($("#tenor-ubah").val());
            const getTanggalMulai = new Date(tanggalMulai);
            const newTanggalAkhir = new Date(getTanggalMulai.setDate(getTanggalMulai.getDate() + tenor))

            $("#tanggal_akhir_scf-ubah").val(dateToString(newTanggalAkhir));
        })


        //Popover
        $('.label-popover').popover({
            trigger: 'hover',
        })
    })
</script>