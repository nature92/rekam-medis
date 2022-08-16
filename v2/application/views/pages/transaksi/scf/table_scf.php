<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button">
                Tabel Supply Chain Financing
            </a>
        </div>
        <div class="btn-actions-pane-right">
            <div class="nav">
                <a href="<?= base_url() ?>transaksi/scf/exportSCF" target="_blank" class='btn btn-primary mr-2 text-white'><i class="fa fa-download mr-2"></i> Ekspor Laporan SCF</a>
                <?php if ($hak_akses->can_create === 't') : ?>
                    <button class='btn btn-success' data-toggle="modal" data-target="#modalAdd">+ Tambah SCF</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive collapse show" id='data-table'>
        <table id="<?= $menu ?>" class="table nowrap table-striped table-bordered table-sm" width="100%">
            <thead>
                <tr>
                    <th width='10px' rowspan="2">No.</th>
                    <th rowspan="2">No. Bukti Kas</th>
                    <th rowspan="2">No. PO</th>
                    <th rowspan="2">BANK</th>
                    <th rowspan="2">Divisi</th>
                    <th rowspan="2">Nama Barang</th>
                    <th rowspan="2">Nama Supplier</th>
                    <th colspan="2">Dokumen Bank</th>
                    <th colspan="2">Nilai (Rp)</th>
                    <th colspan="2">Biaya SCF (Rp)</th>
                    <th colspan="2">Tanggal</th>
                    <th rowspan="2">Status Pembayaran</th>
                    <th style='width:100px' rowspan="2">Aksi</th>
                </tr>
                <tr>
                    <th>Submit</th>
                    <th>Terima</th>
                    <th class="scf-popover" data-toggle="popover" data-content="Nominal Sesuai Bukti Kas">
                        <span class="popover-label">Bukti Kas</span>
                    </th>
                    <th class="scf-popover" data-toggle="popover" data-content="Biaya SCF Vendor + Biaya SCF Pindad">
                        <span class="popover-label">Biaya SCF</span>
                    </th>
                    <th>Vendor</th>
                    <th>Pindad</th>
                    <th>Mulai</th>
                    <th>Jatuh Tempo</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 0;
                foreach ($data_scf as $scf) :
                ?>

                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $scf->nomor_bukti_kas ?></td>
                        <td><?= $scf->nomor_po ?></td>
                        <td><?= $scf->bank ?></td>
                        <td class="scf-popover" data-toggle="popover" data-content="<?= "$scf->nama_divisi" ?>">
                            <span class="popover-label"><?= "DIV $scf->singkatan_divisi" ?></span>
                        </td>
                        <td><?= $scf->nama_barang ?></td>
                        <td><?= $scf->nama_supplier ?></td>
                        <td><?= filterDataTable($scf->bulan_submit_bank, "date-only") ?></td>
                        <td><?= filterDataTable($scf->bulan_penerimaan_bank, "date-only") ?></td>
                        <td style="text-align: right"><?= separateNumber($scf->nominal_bukti_kas) ?></td>
                        <td style="text-align: right"><?= separateNumber(number_format((float)($scf->tenor / 360) * ((85 / 1000) * $scf->nominal_bukti_kas), 2, ',', '.')) ?></td>
                        <td style="text-align: right"><?= separateNumber($scf->biaya_scf_vendor) ?></td>
                        <td style="text-align: right"><?= separateNumber($scf->biaya_scf_pindad) ?></td>
                        <td><?= filterDataTable($scf->tanggal_mulai_scf, "date-only") ?></td>
                        <td><?= addDaysToDate($scf->tanggal_mulai_scf, $scf->tenor) ?></td>
                        <td class="text-center p-2">
                            <span class="scf-popover scf-status scf-status-<?= $scf->status_pembayaran === 't' ? "paid" : "not-paid" ?>" data-toggle="popover" data-content="<?= $scf->status_pembayaran === 't' ? "Sudah Dibayarkan" : "Belum Dibayarkan" ?>">
                                <?php if ($scf->status_pembayaran === 't') : ?> <i class="fa fa-check"></i>
                                <?php else : ?> <i class="fa fa-times"></i>
                                <?php endif; ?>
                            </span>
                        </td>
                        <td class='d-flex' style='flex-direction:row;justify-content:center'>
                            <button type="button" data-main-id='<?= $scf->id_scf ?>' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalDetail">Detail</button>&nbsp;
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>

        </table>

    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        $('#<?= $menu ?>').DataTable({
            fixedColumns: {
                leftColumns: 2,
            },
            scrollX: true,
            scrollCollapse: true,
            dom: '<"row"<"col-sm-6"<"search-scf">><"col-sm-6"f>>rt<"row"<"col-sm-6"l><"col-sm-6"p>>',
            columnDefs: [{
                    type: 'local-date',
                    targets: 6
                },
                {
                    type: 'local-date',
                    targets: 7
                },
                {
                    type: 'numeric-comma',
                    targets: 8
                },
                {
                    type: 'numeric-comma',
                    targets: 9
                },
                {
                    type: 'numeric-comma',
                    targets: 10
                },
                {
                    type: 'numeric-comma',
                    targets: 11
                },
                {
                    type: 'local-date',
                    targets: 12
                },
                {
                    type: 'local-date',
                    targets: 13
                },
            ]
        });

        //Include search-scf HTML
        $('.search-scf').html($('.search-scf-html').html());

        $('.scf-popover').popover({
            trigger: 'hover',
        })

        //Default Select Category Value
        <?php if (!empty($search)) : ?>
            $('#search-category').val("<?= $search['search-category'] ?>");
        <?php endif; ?>


        $('#search-scf-datepicker').daterangepicker({
            showDropdowns: true,
            minDate: "01/01/2019",
            locale: {
                format: 'DD/MM/YYYY'
            },
            autoUpdateInput: false
        }, (start, end, label) => {
            dateStart = start.format('DD/MM/YYYY');
            dateEnd = end.format('DD/MM/YYYY');
            $('#search-scf-datepicker').val(dateStart + ' - ' + dateEnd);
            $('#form-search-scf').submit();
        });
    });
</script>

<!-- Search SCF -->
<div class="d-none search-scf-html">
    <form class="d-flex" id="form-search-scf" action="<?= base_url() ?>transaksi/scf">
        <select class="form-control form-control-sm mr-2" id="search-category" name="search-category" placeholder="Cari Berdasarkan" required>
            <option value='' disabled <?php if (empty($search)) echo 'selected'; ?>>Cari Berdasarkan</option>
            <option value='bulan_penerimaan_bank'>Terima Dokumen Bank</option>
            <option value='bulan_submit_bank'>Submit Dokumen Bank</option>
            <option value='tanggal_mulai_scf'>Tanggal Mulai SCF</option>
            <option value='tanggal_akhir_scf'>Tanggal Jatuh Tempo SCF</option>
        </select>

        <div class='input-group input-group-sm mr-2'>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class='fa fa-calendar'></i></span>
            </div>
            <input id='search-scf-datepicker' class='form-control' name="search-scf-datepicker" <?php if (!empty($search)) : ?> value="<?= $search['search-scf-datepicker'] ?>" <?php endif; ?> required>
        </div>

        <!-- Reset Search -->
        <?php if (!empty($search)) : ?>
            <a class="btn btn-light btn-sm" href="<?= base_url() ?>transaksi/scf">
                Reset
            </a>
        <?php endif; ?>

    </form>
</div>
