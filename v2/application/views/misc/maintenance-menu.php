<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url() ?>assets/lib/bootstrap/jquery-3.2.1.slim.min.js"></script>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-4/css/bootstrap.min.css" />
    <script src="<?= base_url() ?>assets/lib/bootstrap-4/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="<?= base_url() ?>assets/lib/fontawesome/js/all.js"></script> -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/fontawesome/css/all.css">
    <title>Maintenance</title>
</head>


<body>
    <div class="content  ">
        <div class='card col-10'>
            <div class="bg-round"></div>
            <div class='logo'>
                <img src="<?= base_url() ?>assets/img/logo.png">
            </div>
            <div class="title">
                <h2>Menu Ini Sedang Dalam Perbaikan</h2>
            </div>
            <div class="sub-title">Kami sedang menyiapkan website demi performa yang lebih baik.</div>
            <div class="icon i-bottom">
                <img src="<?= base_url() ?>assets/img/svg/cog.svg">
            </div>
        </div>
    </div>
</body>

<style>
    .content {
        width: 100%;
        /* height: 100vh; */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        width: 100%;
        min-height: 400px;
        display: flex;
        justify-content: center;
        padding: 0 50px;
        align-items: center;
        overflow: hidden;
        border: 0;
        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        z-index: -2;
        color: #34495E;
    }

    .bg-round {
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 150px;
        opacity: 0.15;
        z-index: -1;
        background-color: #aaa;
    }

    .title h2 {
        font-weight: bold;
    }

    .logo {
        position: absolute;
        top: 40px;
    }

    .logo img {
        height: 80px;
    }

    .icon img {
        width: 100%;
        height: 100%;
        fill: #0C3659;
    }

    .icon {
        position: absolute;
        width: 180px;
        height: 180px;
        /* background-color: red; */

        animation-name: spin;
        animation-duration: 5000ms;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    .i-bottom {
        bottom: -25%;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);

        }
    }
</style>

</html>