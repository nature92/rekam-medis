<?php
// $this->load->view('pages/transaksi/components/chart_saldo.php');
?>

<div class="card mb-3" id="card-detail-saldo">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button">
                Detail Cash On Hands
            </a>
        </div>
        <?php if ($hak_akses->can_create === 't' && $column) : ?>
            <div class="btn-actions-pane-right">
                <div class="nav">
                    <button class='btn btn-success' data-toggle="modal" data-target="#modalAdd">+ Tambah <?= ucwords(str_replace('_', ' ', $menu)) ?></button>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="card-body table-responsive collapse show" id='data-table'>
        <div class='tab-bank w-100'>
            <div class="row">
                <?php
                foreach ($column as $col) {
                    $next = next($column);
                    if ($next && $next->nama_bank !== $col->nama_bank || !$next) {
                ?>
                        <div class='item-tab-bank col-md-4' data-id='<?= $col->id_bank ?>' style='vertical-align:middle'>
                            <?php
                            if (file_exists("assets/upload/mst_bank/img/$col->id_bank.png")) {
                            ?>
                                <img class='bank-logo' src="<?= base_url() ?>assets/upload/mst_bank/img/<?= $col->id_bank ?>.png?now=<?= date('YmdHis') ?>">
                            <?php
                            } else {
                                echo 'Bank ' . $col->nama_bank;
                            }
                            ?>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <table id="<?= $menu ?>" width='100%' class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class='w-25' style="vertical-align:middle">Tanggal Input</th>
                    <?php
                    foreach ($column as $col) {
                        $popover_title = "$col->nama_bank ($col->kode_currency)";
                        $popover_content = "No Rek. $col->no_rekening";
                    ?>

                        <th class="rekening-popover th-tab th-<?= $col->id_bank ?>" data-toggle="popover" title="<?= $popover_title ?>" data-html='true' data-content="<?= $popover_content ?>">
                            (<?= ($col->kode_currency) ?>) <?= substr($col->no_rekening, strlen($col->no_rekening) - 3, 3) ?><sup style="opacity: 0.6; padding: 0">?</sup>
                        </th>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $tanggal = array_keys($saldo);
                $now = date("Y-m-d H:i:s");
                $i = 0;
                foreach ($tanggal as $tgl) {
                    $diff = date_diff(date_create($now), date_create($tgl));
                    $editable = false;
                    $hak_akses->can_update === 't' && $diff->format('%a') == 0 && $diff->format('%h') == 0 && ($editable = true);

                ?>
                    <tr <?php
                        if ($editable) {
                        ?> class="editable" id='tr-<?= $i ?>' data-date='<?= $tgl ?>' title="Klik untuk mengedit" <?php } ?>>

                        <td align="center" class='pl-2 pr-2' style='white-space:nowrap'><?= filterDataTable($tgl) ?></td>
                        <?php
                        foreach ($column as $col) {
                            $jumlah_saldo = '-';
                            $konversi_saldo = $jumlah_saldo;
                            if (isset($saldo[$tgl][$col->id_rekening])) {
                                $jumlah_saldo = $saldo[$tgl][$col->id_rekening];
                                $konversi_saldo = $jumlah_saldo;
                                $curr = ($col->kode_currency);

                                if ($curr !== 'IDR' && $konversi_saldo !== '-') {
                                    $konversi_saldo = konversiKurs($mst_kurs, $konversi_saldo, $curr, 'IDR');
                                }
                            }
                        ?>
                            <td class="<?php if (!$editable) echo 'saldo-konversi' ?> td-tab td-<?= $col->id_bank ?>">
                                <!-- <?= print_r($col) ?> -->
                                <div class="saldo-td d-flex justify-content-between">
                                    <span><?= filterCurrency($col->kode_currency) ?></span>
                                    <span><?= separateNumber($jumlah_saldo) ?></span>
                                </div>
                                <div class="saldo-td justify-content-between hidden-saldo">
                                    <span>Rp. </span>
                                    <span><?= separateNumber($konversi_saldo) ?></span>
                                </div>
                            </td>
                        <?php
                        }
                        ?>
                    </tr>

                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#<?= $menu ?>').DataTable({
            // scrollX: true,
            // fixedColumns: {
            //     leftColumns: 1,
            // },
            dom: '<"row"<"col-sm-3"<"datepicker">><"col-sm-9"f>>rt<"row"<"col-sm-6"l><"col-sm-6"p>>',
            order: [
                [0, 'desc']
            ],
            columnDefs: [{
                    sortable: true,
                    type: 'de_datetime',
                    targets: [0]
                }, {
                    sortable: false,
                    targets: '_all'
                }


            ],
        });
        $('.rekening-popover').popover({
            trigger: 'hover',
        })

        $('tr.editable').tooltip();
        $('.DTFC_LeftBodyLiner tr.editable').tooltip('dispose').toggleClass('editable');

        $('.datepicker').html(`
        <div class='input-group input-group-sm'>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class='fa fa-calendar'></i></span>
                </div>
            <input id='datepicker' class='form-control' value='<?= filterDateRange($daterange[0]) ?> - <?= filterDateRange($daterange[1]) ?>'>
        </div>
        `)
        $('#datepicker').daterangepicker({
            showDropdowns: true,
            minDate: "01/01/2019",
            maxDate: "<?= date('d/m/Y', strtotime('+1 days')) ?>",
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, (start, end, label) => {
            const date_start = (start.format('YYYY-MM-DD'));
            const date_end = (end.format('YYYY-MM-DD'));
            window.location = "<?= base_url() ?>transaksi/saldo/" + date_start + '/' + date_end + '#card-detail-saldo';
        });
    });




    function inputNumeric(input) {
        const str = input.value.replace(/\./g, '').replace(/^0+/, '').replace(/[a-zA-Z]+/g, '');
        const newVal = str.replace(/\d{1,3}(?=(\d{3})+(?!\d))/g, '$&.');
        input.value = newVal;
    }

    function separateNumber(num) {
        const str = num.toString().replace(/\d{1,3}(?=(\d{3})+(?!\d))/g, '$&.');
        return str;
    }

    $('tr.editable').click((e) => {
        const this_id = e.currentTarget.id;
        const date = $('#' + this_id).data('date');

        $('#modalEdit').data('date', date);
        $('#modalEdit').modal();
    });

    const dataRekening = [];
    <?php
    foreach (array_keys($saldo) as $tgl) {
    ?>
        dataRekening['<?= $tgl ?>'] = [<?php foreach (array_keys($saldo[$tgl]) as $rek) {
                                            $value = $saldo[$tgl][$rek];
                                            echo "['$rek', '$value'],";
                                        } ?>]
    <?php
    }
    ?>

    $('.saldo-konversi').on('click', (event) => {
        const clicked = event.target;
        $(clicked).parents('td').find('.saldo-td').toggleClass('d-flex hidden-saldo');
    })
</script>

<script>
    $('.item-tab-bank').click((e) => {
        const id = $(e.currentTarget).data('id');
        $('.th-tab, .td-tab').hide();
        $('.th-' + id + ', .td-' + id + '').show();

        $('.item-tab-bank').removeClass('active');
        $(e.currentTarget).addClass('active');
    })

    $('.item-tab-bank').first().addClass('active');
    $('.th-tab, .td-tab').hide();
    $('.th-1, .td-1').show()
</script>