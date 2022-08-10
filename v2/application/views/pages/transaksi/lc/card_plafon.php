<div class="row">

    <!-- Plafon SCF -->
    <div class="col-md-4">
        <div class="card bg-primary mb-3 widget-content">
            <div class="widget-content-wrapper">
                <div class="widget-content-left text-light">
                    <div class="widget-desc">Plafon SCF</div>
                    <div class="widget-numbers text-light">
                        <span class="scf-popover" data-toggle="popover" data-content="Rp. <?= number_format($plafon->plafonSCF, 2, ",", ".") ?>">
                            Rp. <?= filterNumber($plafon->plafonSCF)['angka'] . " " . filterNumber($plafon->plafonSCF)['satuan'] ?>
                        </span>
                    </div>
                </div>
                <div class="widget-content-right">
                    <div class="icon-card light">
                        <i class="fa fa-minus-square"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Plafon SCF -->
    <div class="col-md-4">
        <div class="card bg-primary mb-3 widget-content">
            <div class="widget-content-wrapper">
                <div class="widget-content-left text-light">
                    <div class="widget-desc">Pemakaian Plafon SCF</div>
                    <div class="widget-numbers text-light">
                        <span class="scf-popover" data-toggle="popover" data-content="Rp. <?= number_format($plafon->pemakaianPlafon, 2, ",", ".") ?>">
                            Rp. <?= filterNumber($plafon->pemakaianPlafon)['angka'] . " " . filterNumber($plafon->pemakaianPlafon)['satuan'] ?>
                        </span>
                    </div>
                </div>
                <div class="widget-content-right">
                    <div class="icon-card light">
                        <i class="fa fa-adjust"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Plafon SCF -->
    <div class="col-md-4">
        <div class="card bg-primary mb-3 widget-content">
            <div class="widget-content-wrapper">
                <div class="widget-content-left text-light">
                    <div class="widget-desc">Sisa Plafon SCF</div>
                    <div class="widget-numbers text-light">
                        <span class="scf-popover" data-toggle="popover" data-content="Rp. <?= number_format($plafon->sisaPlafon, 2, ",", ".") ?>">
                            Rp. <?= filterNumber($plafon->sisaPlafon)['angka'] . " " . filterNumber($plafon->sisaPlafon)['satuan'] ?>
                        </span>
                    </div>
                </div>
                <div class="widget-content-right">
                    <div class="icon-card light">
                        <i class="fa fa-adjust" style="transform: rotate(180deg)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


