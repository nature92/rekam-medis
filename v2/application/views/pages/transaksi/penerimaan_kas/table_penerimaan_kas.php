<?php  
if(!isset($_GET['search-category'])){
    $k_bank = null;
}else{
    $k_bank = $_GET['search-category'];
}
if(!isset($_GET['search-penerimaan_kas-datepicker'])){
    $range_tgl = null;
}else{
    $range_tgl = $_GET['search-penerimaan_kas-datepicker'];
}

?>
<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button">
                Tabel Penerimaan Kas
            </a>
        </div>
        <?php if ($hak_akses->can_create === 't') : ?>
            <div class="btn-actions-pane-right">
                <div class="nav">
<form class="d-flex" action="<?= base_url() ?>transaksi/penerimaan_kas/export"> 
<?php if($k_bank != "" OR $range_tgl!=""){ ?>
<input name="search-category" type="hidden" value="<?=$k_bank?>" readonly>	
<input name="search-penerimaan_kas-datepicker" type="hidden" value="<?=$range_tgl?>" readonly>
<?php } ?>
<button class='btn btn-primary mr-2 text-white' type="submit"><i class="fa fa-download mr-2"></i> Ekspor Laporan</button>       
                
</form>
                    <button class='btn btn-success' data-toggle="modal" data-target="#modalAdd">+ Tambah Penerimaan Kas</button>
                </div>
            </div>
        <?php endif; ?>
        <a href="<?= base_url() ?>transaksi/penerimaan_kas/laporan" class='ml-2 btn btn-primary' style="text-transform:none">
            <i class="fa fa-file fa-sm mr-1"></i> Laporan Arus Kas Konsolidasi
        </a>
    </div>
    <div class="card-body table-responsive collapse show" id='data-table'>
        <table id="<?= $menu ?>" class="table nowrap table-striped table-bordered table-sm" width="100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal Posting</th>
                    <th>Divisi</th>
                    <th>Jenis Transaksi</th>
                    <th>Kode Bank</th>
                    <th>Nominal (Rp.)</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 0;
                foreach ($data_penerimaan_kas as $kas) :
                ?>
                    <tr>
                        <td class="text-center"><?= ++$i ?></td>
                        <td><?= filterDataTable($kas->tanggal_posting, "date-only") ?></td>
                        <td class="penerimaan_kas-popover" data-toggle="popover" data-content="<?= "$kas->nama_divisi" ?>">
                            <span class="popover-label"><?= "DIV $kas->singkatan_divisi" ?></span>
                        </td>
                        <td><?= $kas->nama_jenis_transaksi_arus_kas ?></td>
                        <td><?= $kas->kode_bank ?></td>
                        <td style="text-align: right"><?= separateNumber($kas->nominal_penerimaan_kas) ?></td>
                        <td><?= $kas->keterangan ?></td>
                        <td class='d-flex' style='flex-direction:row;justify-content:center'>
                            <button type="button" data-main-id='<?= $kas->id_penerimaan_kas ?>' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalDetail">Detail</button>&nbsp;
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
            dom: '<"row"<"col-sm-5"<"search-penerimaan_kas">><"col-sm-7"f>>rt<"row"<"col-sm-6"l><"col-sm-6"p>>',
            columnDefs: [{
                    type: 'local-date',
                    targets: 1
                },
                {
                    type: 'numeric-comma',
                    targets: 4
                },
            ]
        });

        //Include search-penerimaan_kas HTML
        $('.search-penerimaan_kas').html($('.search-penerimaan_kas-html').html());

        //Popover
        $('.penerimaan_kas-popover').popover({
            trigger: 'hover',
        })
                //Default Select Category Value
        <?php if (!empty($search)) : ?>
            $('#search-category').val("<?= $search['search-category'] ?>");
        <?php endif; ?>


        $('#search-penerimaan_kas-datepicker').daterangepicker({
            showDropdowns: true,
            minDate: "01/01/2019",
            locale: {
                format: 'DD/MM/YYYY'
            },
            autoUpdateInput: false
        }, (start, end, label) => {
            dateStart = start.format('DD/MM/YYYY');
            dateEnd = end.format('DD/MM/YYYY');
            $('#search-penerimaan_kas-datepicker').val(dateStart + ' - ' + dateEnd);
            $('#form-search-penerimaan_kas').submit();
        });

    });
</script>


<!-- Search SCF -->
<div class="d-none search-penerimaan_kas-html">
    <form class="d-flex" id="form-search-penerimaan_kas" action="<?= base_url() ?>transaksi/penerimaan_kas">
    <select class="form-control form-control-sm mr-2" id="search-category" name="search-category" placeholder="Cari Berdasarkan" required>
                                    <option value="" selected>Pilih Bank</option>
                                    <?php foreach ($bank as $b) : ?>
                                        <option value="<?= $b->kode_bank ?>"><?= $b->kode_bank." | ".$b->nama_bank ?></option>
                                    <?php endforeach; ?>
                                </select>
        <div class='input-group input-group-sm mr-2'>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class='fa fa-calendar'></i></span>
            </div>
            <input id='search-penerimaan_kas-datepicker' class='form-control' name="search-penerimaan_kas-datepicker" <?php if (!empty($search)) : ?> value="<?= $search['search-penerimaan_kas-datepicker'] ?>" <?php endif; ?> required>
        </div>

        <!-- Reset Search -->
        <?php if (!empty($search)) : ?>
            <a class="btn btn-light btn-sm" href="<?= base_url() ?>transaksi/penerimaan_kas">
                Reset
            </a>
        <?php endif; ?>

    </form>
</div>
