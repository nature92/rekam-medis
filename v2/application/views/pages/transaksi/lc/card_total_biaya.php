<div class="main-card mb-3 card">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='kurs' href="#" role="button">
                Total Biaya & Tenor
            </a>
        </div>
        <div class="btn-actions-pane-right mr-0">
            <!-- <p class='m-0'>Hari Ini (<?= date('d/m/Y')  ?>)</p> -->
        </div>
    </div>
    <div class="card-body p-0 show" id="total_biaya">
        <div class="no-gutters row">
            <!-- For -->
            <?php foreach ($total_scf as $key_scf) : ?>
                <div class="col-md-6 border-right border-left border-bottom border-light">
                    <div class="p-0 card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="h5 mb-0"><?= $key_scf['nama'] ?></div>
                                                <!-- <div class="widget-subheading">Tanggal</div> -->
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-primary font-weight-bold h4 scf-popover" data-toggle="popover" data-content="<?= (number_format($key_scf['nilai'], 2, ',', '.')) ?>">
                                                    <?php if ($key_scf['format'] == "Currency"): ?>
                                                        Rp. <?= filterNumber($key_scf['nilai'])['angka'] ." ". filterNumber($key_scf['nilai'])['satuan'] ?>
                                                    <?php else: ?>
                                                        <?= $key_scf['nilai'] ?>
                                                    <?php endif; ?>
                                                </div>
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
