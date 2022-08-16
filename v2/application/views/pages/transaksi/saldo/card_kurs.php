<div class="main-card mb-3 card">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='kurs' href="#" role="button">
                Informasi Kurs
            </a>
        </div>
        <div class="btn-actions-pane-right mr-0">
            <!-- <p class='m-0'>Hari Ini (<?= date('d/m/Y')  ?>)</p> -->
        </div>
    </div>
    <div class="card-body p-0 show" id="kurs">
        <div class="no-gutters row">
            <!-- For -->
            <?php foreach ($avail_kurs as $kurs) : ?>
                <div class="col-md-4 border-right border-left border-bottom border-light">
                    <div class="p-0 card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="h5 mb-0"><?= $kurs->kode_currency ?>-IDR</div>
                                                <div class="widget-subheading"><?= filterDiffDate($kurs->tgl_kurs) ?></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-primary font-weight-bold h4">Rp. <?= (number_format($kurs->rasio_kurs, 2, ',', '.')) ?></div>
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