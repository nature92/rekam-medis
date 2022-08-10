<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='card-scf-chart' href="#" role="button">
                Grafik Supply Chain Financing
            </a>
        </div>
    </div>
    <div class="card-body show" id='card-scf-chart'>
        <div class="row mb-3 d-flex align-items-center">
            <div class="col-md-6">
                <div class='input-group input-group-sm ml-2 w-25'>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class='fa fa-calendar'></i></span>
                    </div>
                    <input id='year-scf-chart'
                        class='form-control'
                        value="<?= $year_scf ? $year_scf : date("Y") ?>"
                        required>
                </div>
            </div>
        </div>
        <canvas id="scf-chart" style=' min-height:300px; max-height:300px'></canvas>
    </div>
</div>

<script>

    //Year SCF ---------------------------------
    $('#year-scf-chart').datepicker({
        autoclose: true,
        format: " yyyy",
        viewMode: "years",
        minViewMode: "years"
    }).on("changeDate", function (e) {
        window.location = `<?= base_url() ?>dashboard?year-scf=${e.target.value.trim()}#scf-chart`;
    });


    //Chart SCF ---------------------------------
    const chartSCF = <?php echo $chart_scf; ?>;

    let satuan = '';

    function formatNumber(max, num) {
        if (max / (10 ** 3) < 1) {
            return num;
        } else if (max / (10 ** 3) <= 1000) {
            satuan = 'Ribu';
            return num / (10 ** 3);
        } else if (max / (10 ** 6) <= 1000) {
            satuan = 'Juta';
            return num / (10 ** 6);
        } else if (max / (10 ** 9) <= 1000) {
            satuan = 'Miliar';
            return num / (10 ** 9);
        } else if (max / (10 ** 12) <= 1000) {
            satuan = 'Triliun';
            return num / (10 ** 12);
        } else {
            satuan = 'Triliun';
            return num / (10 ** 12);
        }
    }

    const labels = chartSCF.map(data => data.labels);
    const dataNilaiPokok = chartSCF.map(data => data.nilaiPokok);
    const dataBiayaSCFPindad = chartSCF.map(data => data.biayaSCFPindad);
</script>
<script src="<?= base_url() ?>assets/js/chart/scf-chart.js"></script>
