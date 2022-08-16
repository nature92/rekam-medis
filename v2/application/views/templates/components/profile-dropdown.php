<div class="dropdown">
    <a class="dropdown-toggle" type="button" data-toggle="dropdown">
        <div class='text'>
            <h5><?= ucwords($user['nama_user']) ?></h5>
            <p><?= ucwords($user['nama_role']) ?></p>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <div style='display:flex;width:100%;flex-direction:column;align-items:center'>
            <div class='profile-pic'>
                <span><?= substr(ucwords($user['nama_user']), 0, 1) ?></span>
            </div>
            <div class="profile-button">
                <hr>
                <button disabled href="#" data-toggle="modal" data-target="#modalPengaturan" class="dropdown-item"><span class="fa fa-cog mr-3"></span>Pengaturan</button>
                <a href="<?= base_url() ?>logout" class="dropdown-item"><span class="fa fa-sign-out-alt mr-3"></span>Log Out</a>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('templates/components/modal-pengaturan');
?>