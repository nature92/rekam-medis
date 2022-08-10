<style>
    #sidebar {
        position: fixed;
        box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
        z-index: 9;
    }

    .content-menu {
        display: flex;
        flex-direction: column;
        height: 100vh;
        overflow-y: auto;
    }

    .content-menu li {
        font-size: 15px !important;
    }

    .content-menu li .caret {
        margin-top: 8px;
        margin-right: 10px;
        float: right;
    }

    .content-menu::-webkit-scrollbar {
        width: 10px;
    }

    .content-menu::-webkit-scrollbar-track {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .content-menu::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.5);
        width: 80%;
        border-radius: 100px;
    }

    .content-menu::-webkit-scrollbar-thumb:hover {
        background-color: rgba(255, 255, 255, 0.3);
    }

    .content-menu .logo {
        background-color: white;
        padding: 10px 20px;
    }

    .content-menu .content-list {
        padding: 20px;
    }

    .content-menu .logo img {
        width: 60%;
    }
</style>


<nav id="sidebar" class="sidebar-scroll">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="content-menu">
        <a href="<?= base_url() ?>" class="logo">
            <img src="<?= base_url() ?>assets/img/logo.png">
        </a>
        <div class="content-list">
            <ul class="list-unstyled components mb-5">
                <li <?php if (!isset($menu)) {
                        echo "class='active'";
                        $tipe = '';
                    } else
                        $current = $menu; ?>>
                    <a href="<?= base_url() ?>"><span class="fa fa-home mr-3"></span> Dashboard</a>
                </li>

                <div class="accordion" id="navbarAccordion">
                    <?php
                    $kategori = '';
                    $url_kategori = '';
                    $index = 0;
                    $active = '';
                    foreach ($navbar['menu'] as $menu) {
                        if ($kategori !== $menu->nama_kategori_menu) {
                            $kategori = $menu->nama_kategori_menu;
                            $url_kategori = $menu->url_kategori_menu;
                    ?>
                            <li id="menu-<?= $url_kategori ?>">
                                <a data-toggle="collapse" href="#<?= $menu->url_kategori_menu ?>" role="button">
                                    <span class="fa fa-<?= $menu->icon_kategori_menu ?> mr-3 fa-fw"></span> <?= $kategori ?>
                                    <i class='caret fa fa-caret-down fa-sm'></i>
                                </a>
                            </li>
                            <li class="collapse" id="<?= $menu->url_kategori_menu ?>" data-parent="#navbarAccordion">
                                <ul>
                                <?php }
                                ?>

                                <li class="<?php
                                            if (isset($current) && $current === $menu->nama_menu) {
                                                echo 'active';
                                                $active = $url_kategori;
                                            } ?>">
                                    <a href="<?= base_url() . $menu->url_menu ?>"><?= $menu->judul_menu ?></a>
                                </li>

                                <?php
                                $next = next($navbar['menu']);
                                if (!$next || $next->nama_kategori_menu !== $menu->nama_kategori_menu) {
                                ?>

                                </ul>
                            </li>

                    <?php
                                }
                                $index++;
                            }
                    ?>
                </div>
            </ul>

            <div class="footer" style='opacity:0.5'>
                Corfin Information System <br>
                &#169; <?php if (date('Y') === '2020') {
                            echo '2020';
                        } else {
                            echo '2020 - ' . date('Y');
                        } ?>
            </div>
        </div>

    </div>
</nav>


<script>
    (function($) {

        "use strict";

        var fullHeight = function() {

            $('.js-fullheight').css('height', $(window).height());
            $(window).resize(function() {
                $('.js-fullheight').css('height', $(window).height());
            });

        };
        fullHeight();

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('content-active content-active-responsive');
        });

        $('#menu-<?= $active ?>').toggleClass('active');

    })(jQuery);
</script>