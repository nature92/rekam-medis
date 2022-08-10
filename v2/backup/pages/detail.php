<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url() ?>assets/lib/bootstrap/jquery-3.2.1.slim.min.js"></script>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-4/css/bootstrap.min.css" />
    <script src="<?= base_url() ?>assets/lib/bootstrap-4/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>assets/lib/fontawesome/js/all.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/fontawesome/css/all.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/nav-admin.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
    <title>Detail <?= ucwords(str_replace('_', ' ', $tipe)) ?> | CORFIN-IS</title>
</head>

<body>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="wrapper d-flex align-items-stretch">
        <!-- Side Navbar -->
        <?php $controller->getNavbar(); ?>

        <!-- Page Content  -->

        <div id="content" class="p-4 p-md-5 pt-5 content-active">
            <div class="main-container">
                <div class="top-header">
                    <h2 class="top-title">Detail <?= ucwords(str_replace('_', ' ', $tipe)) ?></h2>
                    <?php $this->load->view('components/profile-dropdown');  ?>
                </div>
                <hr>

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




                <?php
                if ($hak_akses->can_read === 't') {
                    $this->load->view('components/data-table', ['hak_akses' => $hak_akses, 'table' => 'table-' . $hak_akses->id_menu]);
                    $this->load->view('components/data-log');
                } else {
                    redirect(base_url() . "dashboard");
                }
                ?>

            </div>
        </div>
    </div>

    <script>
        document.onreadystatechange = () => {
            $('.loader').removeAttr('hidden');
            if (document.readyState === 'complete') {
                $('.loader').attr('hidden', 'hidden');

                setTimeout(() => {
                    $('#auto-hidden').attr('hidden', 'hidden');
                }, 15000)
            }
        };
    </script>
</body>


</html>