<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='card-saldo-chart' href="#" role="button">
                Grafik Cash On Hands
            </a>
        </div>
    </div>
    <div class="card-body show" id='card-saldo-chart'>
        <div class="row mb-3 d-flex align-items-center">
            <div class="col-md-6">
                <h6>Data : <?= date('d/m/Y', strtotime('-1 week')) ?> - Hari ini</h6>
            </div>
            <form class="col-md-6" method='post' action="<?= base_url($_SERVER['REQUEST_URI']) ?>#card-saldo-chart">
                <div class="form-row">
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rekening</span>
                            </div>
                            <select name='chart_currency' class='form-control'>
                                <option value="any" <?php if ($chart_currency === 'all') echo 'selected'; ?>>Semua</option>
                                <?php
                                foreach ($currency as $c) {
                                ?>
                                    <option value="<?= $c->id_currency ?>" <?php if ($c->id_currency === $chart_currency) echo 'selected'; ?>><?= $c->kode_currency ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Konversi</span>
                            </div>
                            <select name='convert_currency' class='form-control'>
                                <?php
                                foreach ($currency as $c) {
                                ?>
                                    <option value="<?= $c->kode_currency ?>" <?php if ($c->kode_currency === $convert_currency) echo 'selected'; ?>><?= $c->kode_currency ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary form-control" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <canvas id="saldo-chart" style=' min-height:300px; max-height:300px'></canvas>
    </div>
</div>


<!-- Saldo Chart -->
<script>
    function separateNumber(num) {
        const str1 = num.toString().split('.');
        const str2 = str1[1] ? ',' + str1[1].substring(0, 3) : '';
        const str = str1[0].replace(/\d{1,3}(?=(\d{3})+(?!\d))/g, '$&.');
        return str + str2;
    }

    let satuan = '';

    function formatNumber(max, num) {
        if (max / (10 ** 3) < 1) {
            return num;
        } else if (max / (10 ** 3) <= 500) {
            satuan = 'Ribu';
            return num / (10 ** 3);
        } else if (max / (10 ** 6) <= 500) {
            satuan = 'Juta';
            return num / (10 ** 6);
        } else if (max / (10 ** 9) <= 500) {
            satuan = 'Miliar';
            return num / (10 ** 9);
        } else if (max / (10 ** 12) <= 500) {
            satuan = 'Triliun';
            return num / (10 ** 12);
        } else {
            return num;
        }
    }

    const label = [<?php
                    foreach ($tgl_saldo as $t) {
                    ?> "<?= filterDataTable($t->tgl_saldo) ?>",
        <?php } ?>
    ];
    const dataset = [<?php
                        foreach (array_keys($saldo_chart) as $bank) {
                        ?> {
                label: "Total <?= $bank ?>",
                backgroundColor: '<?= $warna_label[$bank] ?>',
                data: [<?php echo implode(',', $saldo_chart[$bank]) ?>]
            },
        <?php  } ?>
    ]

    let currency = "<?= filterCurrency($convert_currency) ?>";
</script>
<script src="<?= base_url() ?>assets/js/chart/saldo-chart.js"></script>