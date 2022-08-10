<div class="row">
    <?php
    switch ($menu->nama_menu) {
        case 'admin':
            $color = 'tomato';
            $this->load->view('components/dashboard-card', ['title' => 'Role User', 'num_row' => count($list_role), 'link' => $menu->id_menu . '/role', 'icon' => 'briefcase', 'color' => $color]);
            $this->load->view('components/dashboard-card', ['title' => 'Data User', 'num_row' => count($list_user), 'link' => $menu->id_menu . '/user', 'icon' => 'user', 'color' => $color]);
            break;

        case 'rekening':
            $color = 'deepskyblue';
            $this->load->view('components/dashboard-card', ['title' => 'Bank', 'num_row' => count($list_bank), 'link' => $menu->id_menu . '/bank', 'icon' => 'money-bill', 'color' => $color]);
            $this->load->view('components/dashboard-card', ['title' => 'Currency', 'num_row' => count($list_currency), 'link' => $menu->id_menu . '/currency', 'icon' => 'dollar-sign', 'color' => $color]);
            $this->load->view('components/dashboard-card', ['title' => 'Jenis Rek.', 'num_row' => count($list_jenis_rekening), 'link' => $menu->id_menu . '/jenis_rekening', 'icon' => 'credit-card', 'color' => $color]);
            $this->load->view('components/dashboard-card', ['title' => 'Rekening', 'num_row' => count($list_rekening), 'link' => $menu->id_menu . '/rekening', 'icon' => 'id-card', 'color' => $color]);
            break;

        default:
            null;
            break;
    }
    ?>
</div>