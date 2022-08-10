<?php
switch ($menu->nama_menu) {
    case 'admin':
        echo '<li><a data-toggle="collapse" href="#admin" role="button"><span class="fa fa-user mr-3 fa-fw"></span> Manajemen Role & User</a></li>';
        echo '<li class="collapse" id="admin"><ul>';
        list_navbar('Role & Hak Akses', $menu->id_menu . '/role');
        list_navbar('User', $menu->id_menu . '/user');
        echo '</ul></li>';
        break;

    case 'rekening':
        echo '<li><a data-toggle="collapse" href="#bank" role="button"><span class="fa fa-credit-card mr-3 fa-fw"></span> Manajemen Rekening</a></li>';
        echo '<li class="collapse" id="bank"><ul>';
        list_navbar('Bank', $menu->id_menu . '/bank', 'bank');
        list_navbar('Currency', $menu->id_menu . '/currency', 'dollar');
        list_navbar('Jenis Rekening', $menu->id_menu . '/jenis_rekening', 'credit-card');
        list_navbar('Rekening', $menu->id_menu . '/rekening', 'id-card');
        echo '</ul></li>';
        break;

    case 'transaksi':
        echo '<li><a data-toggle="collapse" href="#transaksi" role="button"><span class="fa fa-dollar-sign mr-3 fa-fw"></span> Transaksi</a></li>';
        echo '<li class="collapse" id="transaksi"><ul>';
        list_navbar('Account Receivable', $menu->id_menu . '/transaksi/acc_receivable');
        echo '</ul></li>';
        break;

    default:
        null;
        break;
}
