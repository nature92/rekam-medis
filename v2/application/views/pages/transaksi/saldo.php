<?php
$icon = '';
$kat_menu = '';
foreach ($navbar['menu'] as $m) {
    $m->nama_menu === $menu && ($icon = $m->icon_menu) && ($kat_menu = $m->nama_kategori_menu);
}
?>


<div class="app-main__inner">

    <!-- Title Menu -->
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa <?= $icon ?> icon-gradient bg-mean-fruit" style='font-size:26px'>
                    </i>
                </div>
                <div>Cash On Hands
                </div>
            </div>
        </div>
    </div>
    <!-- End Title Menu -->

    <?php
    $this->load->view('templates/components/alert-dialog');
    ?>

    <?php

    $maintenance = true;
    foreach ($navbar['menu'] as $m) {
        if ($m->nama_menu === $hak_akses->nama_menu) {
            $maintenance = false;
            break;
        }
    }

    if ($hak_akses->can_read === 't' && !$maintenance) {
        $this->load->view('pages/transaksi/saldo/card_kurs');
        $this->load->view('pages/transaksi/saldo/table_saldo', ['hak_akses' => $hak_akses]);
        $this->load->view('pages/transaksi/saldo/card_rekap_saldo');
        $this->load->view('pages/transaksi/saldo/chart_saldo.php');
    } else if ($hak_akses->can_read === 't' && $maintenance) {
        $this->load->view('misc/maintenance-menu');
    } else {
        redirect(base_url() . "dashboard");
    }
    ?>

</div>