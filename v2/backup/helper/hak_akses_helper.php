<?php
function cek_hak_akses($data, $list_menu, $menu)
{
    $redir = true;
    foreach ($data['list_hak_akses'] as $hak_akses) {
        if ($hak_akses->id_role === $data['user']['id_role'] && $hak_akses->id_menu === $menu && $list_menu[0]->status === 't') {
            $data['hak_akses'] = $hak_akses;
            $data['this_menu'] = $list_menu[0];
            $redir = false;
            return $data;
            break;
        }
    };
    if ($redir === true) {
        $data = [];
        redirect('dashboard');
    };
}
