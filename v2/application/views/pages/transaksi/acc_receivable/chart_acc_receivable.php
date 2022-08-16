<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='card-acc-receivable-chart' href="#" role="button">
                Grafik Account Receivable
            </a>
        </div>
    </div>
    <div class="card-body show" id='card-acc-receivable-chart'>
        <div class="row mb-3 d-flex align-items-center">
            <div class="col-md-6">
                <h6>Data : <?= date('d/m/Y', strtotime('-6 days')) ?> - Hari ini</h6>
            </div>
        </div>
        <canvas id="acc-receivable-chart" style=' min-height:300px; max-height:300px'></canvas>
    </div>
</div>

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

    const labels = [<?php $i = 0;
                    foreach ($acc_receivable_chart as $a) {
                        echo "'" . dateTimeToDate($acc_receivable_chart[$i]['tanggal']) . "',";
                        $i++;
                    } ?>];
    const datasets = [<?php $i = 0;
                        foreach ($acc_receivable_chart as $a) {
                            echo $acc_receivable_chart[$i]['total'] . ',';
                            $i++;
                        } ?>];

    const bgColor = [<?php $i = 0;
                        foreach ($acc_receivable_chart as $a) {
                            if (dateTimeToDate($acc_receivable_chart[$i]['tanggal']) === date('Y-m-d'))
                                echo "'rgba(255, 159, 64, 0.2)'";
                            else echo "'rgba(75, 192, 192, 0.2)',";
                            $i++;
                        } ?>];
    const borderColor = [<?php $i = 0;
                            foreach ($acc_receivable_chart as $a) {
                                if (dateTimeToDate($acc_receivable_chart[$i]['tanggal']) === date('Y-m-d'))
                                    echo "'rgb(255, 159, 64)'";
                                else echo "'rgb(75, 192, 192)',";
                                $i++;
                            } ?>];
</script>
<script src="<?= base_url() ?>assets/js/chart/acc-receivable-chart.js"></script>