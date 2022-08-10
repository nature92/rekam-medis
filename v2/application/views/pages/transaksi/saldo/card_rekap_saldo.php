<div class="main-card mb-3 card">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='rekap_saldo' href="#" role="button">
                Rekap Cash On Hands
            </a>
        </div>
        <div class="btn-actions-pane-right mr-0">
        <p class='m-0'><?= filterDiffDate(($rekap_saldo) ? $rekap_saldo[0]->tgl_saldo : 'Data Kosong') ?> (<?= filterDataTable(($rekap_saldo) ? $rekap_saldo[0]->tgl_saldo : '') ?>)</p>
        </div>
    </div>
    <div class="card-body p-0 show" id="rekap_saldo">
        <div class="row">
            <div class="col-12 d-flex align-items-center border-bottom border-light">
                <div class="p-0 card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-primary text-white">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="h5">Total Ekuivalen</div>
                                        </div>
                                        <div class="widget-content-right ">
                                            <?php
                                            for ($i = -1; $i < count($avail_kurs); $i++) :
                                                $currency = $i == -1 ? 'IDR' : $avail_kurs[$i]->kode_currency;

                                                $sum = 0;
                                                foreach ($rekap_saldo as $saldo) {
                                                    $sum += konversiKurs($mst_kurs, $saldo->jumlah_saldo, $saldo->kode_currency, $currency);
                                                }

                                                $sum_filter = filterNumber($sum);
                                            ?>
                                                <div class="
                                                <?php if ($currency === 'IDR') : ?>
                                                    font-weight-bold h3 mb-2
                                                <?php else : ?>
                                                    h5 mx-0 mb-1 pl-2 pr-2 d-md-inline border-right border-white
                                                <?php endif; ?>
                                                     text-right rekap-saldo-popover" data-toggle="popover" title='Total EKV - <?= $currency ?>' data-content='<?= filterCurrency($currency) . ' ' . separateNumber($sum) ?>'>

                                                    <?= filterCurrency($currency) . ' ' . $sum_filter['angka'] . ' ' . $sum_filter['satuan'] ?>
                                                </div>

                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- For -->
            <?php foreach ($rekap_saldo as $saldo) : ?>
                <div class="col-md-6 d-flex align-items-center border-right border-left border-bottom border-light">
                    <div class="p-0 card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="h5">Total <?= $saldo->kode_currency ?></div>
                                            </div>
                                            <div class="widget-content-right ">
                                                <?php
                                                $jml_saldo = filterNumber($saldo->jumlah_saldo);
                                                ?>

                                                <div class="text-primary font-weight-bold h4 mb-1 text-right rekap-saldo-popover" data-toggle="popover" title="Total <?= $saldo->kode_currency ?>" data-content="<?= filterCurrency($saldo->kode_currency) ?> <?= separateNumber($saldo->jumlah_saldo) ?>">
                                                    <?= filterCurrency($saldo->kode_currency) ?> <?= $jml_saldo['angka'] . ' ' . $jml_saldo['satuan'] ?>
                                                </div>

                                                <?php if ($saldo->kode_currency !== 'IDR') :
                                                    $konversi = konversiKurs($mst_kurs, $saldo->jumlah_saldo, $saldo->kode_currency, 'IDR');
                                                    $jml_saldo = filterNumber($konversi);
                                                ?>
                                                    <div class="text-secondary h5 text-right rekap-saldo-popover" data-toggle="popover" title="Total <?= $saldo->kode_currency ?> dalam IDR" data-content="Rp. <?= separateNumber($konversi) ?>">
                                                        Rp. <?= $jml_saldo['angka'] . ' ' . $jml_saldo['satuan'] ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- For -->
        </div>
    </div>
</div>

<script>
    $('.rekap-saldo-popover').popover({
        trigger: 'hover',
    })

    $('#rekap_saldo').css('cursor', 'pointer').on('click', () => {
        window.location = "<?= base_url() ?>transaksi/saldo#card-detail-saldo";
    })
</script>