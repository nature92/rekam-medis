<?php if ($this->session->flashdata('alert') || $this->session->flashdata('alert-error')) :
    if (($this->session->flashdata('alert'))) {
        $alert = $this->session->flashdata('alert');
        $type = 'success';
    } else {
        $alert = $this->session->flashdata('alert-error');
        $type = 'danger';
    }
?>
    <div class="alert alert-<?= $type ?>" role="alert" id='auto-hidden'>
        <?= $alert ?>
    </div>
<?php endif; ?>