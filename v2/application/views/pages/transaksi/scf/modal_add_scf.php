<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah SCF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='post' action='<?= base_url() ?>transaksi/scf/addscf'>
                <div class="modal-body">
                    <div class="row">

                        <!-- Divisi -->
                        <div class="form-group col-md-12 modal-input">
                            <label class="col-form-label">Divisi</label>
                            <div id='input-divisi-add'>
                                <select id="divisi-add" name="divisi" required>
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
                            <div id='input-nomor_bukti_kas-add'>
                                <input type="text" class="form-control" id="nomor_bukti_kas-add" name="nomor_bukti_kas" placeholder="Nomor Bukti Kas">
                            </div>
                        </div>

                        <!-- Nomor PO -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Nomor PO</label>
                            <div id='input-nomor_po-add'>
                                <input type="text" class="form-control" id="nomor_po-add" name="nomor_po" placeholder="Nomor PO">
                            </div>
                        </div>

                        <!-- Nama Barang -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Nama Barang</label>
                            <div id='input-nama_barang-add'>
                                <input type="text" class="form-control" id="nama_barang-add" name="nama_barang" placeholder="Nama Barang">
                            </div>
                        </div>

                        <!-- Nama Supplier -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">Nama Supplier</label>
                            <div id='input-nama_supplier-add'>
                                <input type="text" class="form-control" id="nama_supplier-add" name="nama_supplier" placeholder="Nama Supplier">
                            </div>
                        </div>
						
						<div class="form-group col-md-4 modal-input">
							<label class="col-form-label">BANK</label>
							<div id='input-advising_bank-add'>
                                <select class="form-control" id="bank-add" name="bank"> 
                                    <option value="BRI" selected>BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="BJB">BJB</option>
                                </select>
                            </div>
                        </div>

                        <hr class="col-11 hr-input-modal" />

                        <!-- Bulan Penerimaan BK -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Bulan Penerimaan Bukti Kas</label>
                            <div id='input-bulan_penerimaan_bank-add'>
                                <input type="date" class="form-control" id="bulan_penerimaan_bank-add" name="bulan_penerimaan_bank" value="<?= date("Y-m-d") ?>">
                            </div>
                        </div>

                        <!-- Bulan Submit Bank -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Bulan Submit Dokumen Pada Bank</label>
                            <div id='input-bulan_submit_bank-add'>
                                <input type="date" class="form-control" id="bulan_submit_bank-add" name="bulan_submit_bank" value="<?= date("Y-m-d") ?>">
                            </div>
                        </div>

                        <!-- Nominal SCF Sesuai Kas -->
                        <div class="form-group col-md-5 modal-input">
                            <label class="col-form-label">Nominal SCF Sesuai Bukti Kas</label>
                            <div id='input-nominal_sesuai_bukti_kas-add' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-add number-separator" id="nominal_sesuai_bukti_kas-add" name="nominal_sesuai_bukti_kas" style="text-align: right" value="0" onclick="this.value == 0 && this.select()">
                            </div>
                        </div>

                        <!-- Tenor -->
                        <div class="form-group col-md-2 modal-input">
                            <label class="col-form-label">Tenor (Hari)</label>
                            <div id='input-tenor-add'>
                                <input type="number" class="form-control" id="tenor-add" name="tenor" min="0" value="0" onclick="this.value == 0 && this.select()">
                            </div>
                        </div>

                        <!-- Biaya SCF -->
                        <div class="form-group col-md-5 modal-input">
                            <label class="col-form-label label-popover" data-toggle="popover" data-content="Biaya SCF Vendor + Biaya SCF Pindad">
                                <span class="popover-label">Biaya SCF</span>
                            </label>
                            <div id='input-biaya_scf-add' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-add number-separator" id="biaya_scf-add" name="biaya_scf" style="text-align: right" value="0" disabled>
                            </div>
                        </div>

                        <!-- Biaya SCF Pindad -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Biaya SCF Ditanggung Pindad</label>
                            <div id='input-biaya_scf_pindad-add' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-add number-separator" id="biaya_scf_pindad-add" name="biaya_scf_pindad" style="text-align: right" value="0" onclick="this.value == 0 && this.select()">
                            </div>
                        </div>

                        <!-- Biaya SCF Vendor -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Biaya SCF Ditanggung Vendor</label>
                            <div id='input-biaya_scf_vendor-add' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-add number-separator" id="biaya_scf_vendor-add" name="biaya_scf_vendor" style="text-align: right" value="0" onclick="this.value == 0 && this.select()">
                            </div>
                        </div>

                        <!-- Jumlah Nominal & Biaya SCF -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label label-popover" data-toggle="popover" data-content="Nominal SCF + Biaya SCF">
                                <span class="popover-label">Jumlah Nominal & Biaya SCF</span>
                            </label>
                            <div id='input-jumlah_nominal_biaya_scf-add' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-add number-separator" id="jumlah_nominal_biaya_scf-add" name="jumlah_nominal_biaya_scf" style="text-align: right" value="0" disabled>
                            </div>
                        </div>

                        <!-- Jumlah Nominal & Biaya Ditanggung Pindad -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label label-popover" data-toggle="popover" data-content="Nominal SCF + Biaya SCF Ditanggung Pindad">
                                <span class="popover-label">Jumlah Nominal & Biaya SCF Ditanggung Pindad</span>
                            </label>
                            <div id='input-jumlah_nominal_biaya_scf_pindad-add' class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text justify-content-center" style='min-width:40px'>Rp.</span>
                                </div>
                                <input class="form-control input-number-add number-separator" id="jumlah_nominal_biaya_scf_pindad-add" name="jumlah_nominal_biaya_scf_pindad" style="text-align: right" value="0" disabled>
                            </div>
                        </div>

                        <hr class="col-11 hr-input-modal" />

                        <!-- Tanggal Mulai SCF -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Tanggal Mulai SCF</label>
                            <div id='input-tanggal_mulai_scf-add'>
                                <input type="date" class="form-control" id="tanggal_mulai_scf-add" name="tanggal_mulai_scf" value="<?= date("Y-m-d") ?>">
                            </div>
                        </div>


                        <!-- Tanggal Akhir SCF -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Tanggal Akhir SCF</label>
                            <div id='input-tanggal_akhir_scf-add'>
                                <input type="date" class="form-control" id="tanggal_akhir_scf-add" name="tanggal_akhir_scf" value="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>">
                            </div>
                        </div>

                        <hr class="col-11 hr-input-modal" />

                        <!-- Keterangan -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Keterangan</label>
                            <div id='input-keterangan-add'>
                                <textarea class="form-control" id="keterangan-add" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                        </div>

                        <!-- Status Pembayaran -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">Status Pembayaran</label>
                            <div id='input-status_pembayaran-add'>
                                <select class="form-control" id="status_pembayaran-add" name="status_pembayaran">
                                    <option value="false" selected>Belum Dibayarkan</option>
                                    <option value="true">Sudah Dibayarkan</option>
                                </select>
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
        $('#divisi-add').selectize({
            sortField: 'text'
        });

        //Kalkulasi Biaya SCF -----------------------------------------------

        let biayaScfVendor = toNumberFromLocaleId($("#biaya_scf_vendor-add").val());
        let biayaScfPindad = toNumberFromLocaleId($("#biaya_scf_pindad-add").val());
        let nominalSesuaiBuktiKas = toNumberFromLocaleId($("#nominal_sesuai_bukti_kas-add").val());
        let biayaScf = 0;
        let jumlahBiayaScf = nominalSesuaiBuktiKas;
        let jumlahBiayaScfPindad = nominalSesuaiBuktiKas + biayaScfPindad;

        // Biaya SCF Vendor Listener
        $("#biaya_scf_vendor-add").on("input", function(e) {
            biayaScfVendor = toNumberFromLocaleId(e.target.value);
        })

        // Biaya SCF Pindad Listener
        $("#biaya_scf_pindad-add").on("input", function(e) {
            biayaScfPindad = toNumberFromLocaleId(e.target.value);
        })

        // Nominal SCF Listener
        $("#nominal_sesuai_bukti_kas-add").on("input", function(e) {
            nominalSesuaiBuktiKas = toNumberFromLocaleId(e.target.value);
        })

        // Jumlah Biaya SCF Listener
        $("#nominal_sesuai_bukti_kas-add, #biaya_scf-add").on("input", function(e) {
            jumlahBiayaScf = nominalSesuaiBuktiKas + (+biayaScf);
            $("#jumlah_nominal_biaya_scf-add").val(toStringLocaleId(jumlahBiayaScf)).trigger("input");
        })

        // Jumlah Biaya SCF Pindad Listener
        $("#biaya_scf_pindad-add, #nominal_sesuai_bukti_kas-add").on("input", function(e) {
            jumlahBiayaScfPindad = biayaScfPindad + nominalSesuaiBuktiKas;
            $("#jumlah_nominal_biaya_scf_pindad-add").val(toStringLocaleId(jumlahBiayaScfPindad)).trigger("input");
        })

        // Kalkulasi Tenor & Tanggal SCF ------------------------------------

        let tanggalMulai = new Date($("#tanggal_mulai_scf-add").val() + "T00:00");
        let tanggalAkhir = new Date($("#tanggal_akhir_scf-add").val() + "T00:00");
        let tenor = $("#tenor-add").val()
        biayaScf = ((tenor / 360) * ((85 / 1000) * nominalSesuaiBuktiKas)).toFixed(2);

        //Tanggal Mulai Listener
        $("#tanggal_mulai_scf-add").on("input", function(e) {
            tanggalMulai = new Date($("#tanggal_mulai_scf-add").val() + "T00:00");

            //Ubah Min Date
            $("#tanggal_akhir_scf-add").attr("min", dateToString(tanggalMulai))

            //Shift Tanggal Akhir jika mendahului Tanggal Mulai
            tenor = (tanggalAkhir - tanggalMulai) / 86400000
            if (tenor < 0) {
                tanggalAkhir = tanggalMulai;
                $("#tanggal_akhir_scf-add").val(dateToString(tanggalAkhir));

                tenor = 0;
            }
            $("#tenor-add").val(tenor).trigger("input")

        })

        //Tanggal Akhir Listener
        $("#tanggal_akhir_scf-add").on("input", function(e) {
            tanggalAkhir = new Date($("#tanggal_akhir_scf-add").val() + "T00:00");
            tenor = (tanggalAkhir - tanggalMulai) / 86400000
            $("#tenor-add").val(tenor).trigger("input")
        })

        //Tenor
        $("#tenor-add").on("input", function(e) {
            tenor = +($("#tenor-add").val());
            const getTanggalMulai = new Date(tanggalMulai);
            const newTanggalAkhir = new Date(getTanggalMulai.setDate(getTanggalMulai.getDate() + tenor))

            $("#tanggal_akhir_scf-add").val(dateToString(newTanggalAkhir));
        })

        // Biaya SCF Listener
        $("#nominal_sesuai_bukti_kas-add, #tenor-add").on("input", function(e) {
            biayaScf = ((tenor / 360) * ((85 / 1000) * nominalSesuaiBuktiKas)).toFixed(2);
            $("#biaya_scf-add").val(toStringLocaleId(biayaScf)).trigger("input");
        })

        //Popover
        $('.label-popover').popover({
            trigger: 'hover',
        })
    })
</script>