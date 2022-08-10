<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.png" type="image/x-icon">

    <!-- Bootstrap + Jquery -->
    <script src="<?= base_url() ?>assets/lib/bootstrap/jquery-3.2.1.slim.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-4/css/bootstrap.min.css" />
    <script src="<?= base_url() ?>assets/lib/bootstrap-4/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome Icon -->
    <script src="<?= base_url() ?>assets/lib/fontawesome/js/all.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/fontawesome/css/all.css">

    <!-- Particle JS -->
    <script src="<?= base_url() ?>assets/lib/particles-js/particles.js"></script>

    <!-- Custom Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">
    <title>Login</title>
</head>


<body>
    <div id='particles-js' style='position:absolute;width:100%;height:100vh'></div>
    <div class="container container-login container-admin">
        <div class="card card-login ">
            <div class="logo">
                <img src="<?= base_url() ?>/assets/img/logo.png" />
            </div>
            <div class="text-center">
                <h2>Selamat Datang</h2>
                <p>Masuk dengan akun anda</p>
            </div>
            <?php if ($error) : ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <form class="form-group text-center center" method='post' action='<?= base_url() ?>login/do_login'>
                <input type="number" class="form-control input-login <?php if ($usernameError) echo 'error'; ?>" placeholder="NPP" name='username' value="<?php if ($username) echo $username; ?>" />

                <input class="form-control input-login <?php if ($passwordError) echo 'error'; ?>" type="password" placeholder="Password" name='password' value="<?php if ($password) echo $password; ?>" />
                <input type="submit" class="btn btn-light btn-login" value="Login" />
            </form>
        </div>
    </div>
</body>

</html>

<script>
    particlesJS.load('particles-js', '<?= base_url() ?>assets/lib/particles-js/particlesjs-config.json');
</script>