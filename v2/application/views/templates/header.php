<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.png" type="image/x-icon">

    <!-- Templates -->
    <link href="<?= base_url() ?>assets/templates/main.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/templates/custom.css" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url() ?>/assets/templates/assets/scripts/main.js"></script>

    <!-- Bootstrap + Jquery -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="<?= base_url() ?>assets/lib/bootstrap/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/bootstrap-4/js/bootstrap.bundle.min.js"></script>


    <!-- Datatables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/datatables/datatables.css">
    <script src="<?= base_url() ?>assets/lib/datatables/datatables.js"></script>

    <!-- Datatables Sort Plugin -->
    <script src="<?= base_url() ?>assets/lib/datatables/plugin/numeric-comma-sort.plugin.js"></script>
    <script src="<?= base_url() ?>assets/lib/datatables/plugin/local-date-sort.plugin.js"></script>

    <!-- Javascript Validation -->
    <script src="<?= base_url() ?>assets/js/validation/validation.js"></script>
    <script src="<?= base_url() ?>assets/js/validation/validation-engine.js"></script>

    <!-- Moment.js -->
    <script src="<?= base_url() ?>assets/lib/moment-js/moment.js"></script>

    <!-- DateRangePicker.js -->
    <script src="<?= base_url() ?>assets/lib/daterangepicker/daterangepicker.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/daterangepicker/daterangepicker.css" />

    <!-- Chart.js -->
    <script src="<?= base_url() ?>assets/lib/chart-js/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/chart-js/Chart-datalabels.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/chart-js/Chart.css" />

    <!-- Color-Picker.js -->
    <script src="<?= base_url() ?>assets/lib/colorpicker-js/colorpicker.js"></script>

    <!-- Number Separator -->
    <script src="<?= base_url() ?>assets/lib/number-separator/number-separator.js"></script>

    <!-- Auto Complete Input -->
    <script src="<?= base_url() ?>assets/lib/autocomplete/autocomplete.js"></script>

    <!-- Chart.js -->
    <script src="<?= base_url() ?>assets/lib/chart-js/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/chart-js/Chart-datalabels.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/chart-js/Chart.css" />
    
    <!-- Selectize JS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/selectize-js/selectize.min.css" />
    <script src="<?= base_url() ?>assets/lib/selectize-js/selectize.min.js"></script>
    
    <!-- Selectize JS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <script src="<?= base_url() ?>assets/lib/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

    <!-- Filter Utilities -->
    <script src="<?= base_url() ?>assets/js/filter.util.js"></script>


    <title><?= $title ?> | CORFIN-IS</title>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="profile-responsive ml-3">
                        <div class="h5 mb-0 font-weight-bold">
                            <?= ucwords($user['nama_user']) ?>
                        </div>
                        <div class="widget-subheading">
                            <?= ucwords($user['nama_role']) ?>
                        </div>
                    </div>

                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group dropdown">
                                        <a id="dropdown-trigger" class="p-0 btn" style='display: flex; align-items: center'>

                                            <?php
                                            $default = base_url("assets/templates/assets/images/avatars/user.jpg");
                                            $profilePic = $user['npp'] != '00000' ? "https://ess.pindad.com/assets/images/foto_pegawai_bumn/" . $user['npp'] . ".jpg" : $default;
                                            ?>

                                            <div style='width: 42px; height: 42px; overflow: hidden' class='rounded-circle'>
                                                <img width="42" src="<?= $profilePic  ?>" onerror="this.onerror=null; this.src='<?= $default ?>'" alt="">
                                            </div>

                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right" id="user-dropdown">
                                            <h6 tabindex="-1" class="dropdown-header">Akun User</h6>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <?php if ($user['password'] === 'local') : ?><a type="button" href="#" data-toggle="modal" data-target="#modalPengaturan" class="dropdown-item">Ganti Password</a> <?php endif; ?>
                                            <a type="button" href="<?= base_url() ?>logout" tabindex="0" class="dropdown-item">Log Out</a>
                                        </div>
                                        <script>
                                            $('#dropdown-trigger').on('click', () => {
                                                console.log('clicked');
                                                $('.dropdown-menu').toggleClass('show');
                                            })
                                        </script>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?= ucwords($user['nama_user']) ?>
                                    </div>
                                    <div class="widget-subheading">
                                        <?= ucwords($user['nama_role']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar overflow-auto">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">

                            <!-- List Navbar Menu -->

                            <li class="app-sidebar__heading">Dashboard</li>
                            <li class='mb-2'>
                                <a href="<?= base_url() ?>">
                                    <i class="icon-round metismenu-icon fa fa-home" style='text-align:center'></i>
                                    <span class='ml-2'>Dashboard</span>
                                </a>
                            </li>

                            <li class="app-sidebar__heading">Menu Utama</li>

                            <?php
                            $kategori = '';
                            $url_kategori = '';
                            $index = 0;
                            $active = '';
                            $activeMenu = isset($menu) ? $menu : "";
                            foreach ($navbar['menu'] as $menu) {
                                if ($kategori !== $menu->nama_kategori_menu) {
                                    $kategori = $menu->nama_kategori_menu;
                                    $url_kategori = $menu->url_kategori_menu;

                                    if ($index > 0){ ?>
                                        
                                        </ul>
                                    </li>

                                    <?php }
                            ?>
                                    <li class='mb-2 '>
                                        <a href="#" class="pr-2">
                                            <i class="icon-round metismenu-icon fa fa-<?= $menu->icon_kategori_menu ?>" style='text-align:center'></i>
                                            <div class="app-sidebar__parent">
                                                <span class='ml-2 app-sidebar__parent-title'><?= $kategori ?></span>
                                                <i class="fa fa-caret-down app-sidebar__caret-icon"></i>
                                            </div>
                                        </a>
                                        <ul>

                            <?php
                                }
                            ?>
                                <li class='mb-2 <?php if ($activeMenu == $menu->nama_menu) echo "app-sidebar__active-children"; ?> '>
                                    <a href="<?= base_url() . $menu->url_menu ?>" class="d-flex align-items-center ">
                                        <i class="fa fa-circle app-sidebar__round-icon"></i>
                                        <span class='ml-2'><?= $menu->judul_menu ?></span>
                                    </a>
                                </li>
                            <?php
                            $index++;
                            }
                            ?>
                                        </ul>
                                    </li>

                            <!-- End List Navbar Menu -->

                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="loader">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!-- Content  -->