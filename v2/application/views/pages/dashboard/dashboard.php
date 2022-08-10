<div class="app-main__inner">

    <!-- Title Menu -->
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Dashboard
                    <div class="page-title-subheading">Update Terakhir : <?= translateBulan(date('j F Y ( G:i ') . 'WIB )') ?>.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Title Menu -->

    <?php
    $this->load->view('templates/components/alert-dialog');
    ?>

    <!-- Content -->
    <div class="row">

        <div class="col-12 mt-2">
            <?php $this->load->view('pages/transaksi/saldo/card_kurs'); ?>
        </div>

        <div class="col-12 mt-2">
            <?php $this->load->view('pages/transaksi/saldo/card_rekap_saldo'); ?>
        </div>

        <?php foreach ($list_card as $card) {
            $this->load->view('pages/dashboard/components/dashboard-card', ['card' => $card]);
        } ?>

        <div class="col-12 mt-2">
            <?php $this->load->view('pages/transaksi/scf/chart_scf'); ?>
        </div>
    </div>
    <!-- EndContent -->

</div>