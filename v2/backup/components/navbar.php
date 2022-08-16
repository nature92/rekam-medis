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
                <li <?php if (!isset($tipe)) {
                        echo "class='active'";
                        $tipe = '';
                    } ?>>
                    <a href="<?= base_url() ?>"><span class="fa fa-home mr-3"></span> Dashboard</a>
                </li>

                <?php
                foreach ($list_kategori_menu as $kategori) {
                    $iMenu = 0;
                    foreach ($hak_akses as $hak) {
                        foreach ($list_menu as $menu) {
                            if ($kategori->id_kategori_menu === $menu->id_kategori_menu && $hak->id_menu === $menu->id_menu && $hak->can_read === 't' && $menu->status === 't') {
                                if ($iMenu === 0) header_navbar($kategori->nama_kategori_menu, $kategori->url_kategori_menu, $kategori->icon_kategori_menu);
                                $data['menu'] = $menu;
                                $data['hak_akses'] = $hak;

                                list_navbar($menu->nama_menu, ($menu->id_menu . '/' . $menu->url_menu), $tipe);
                                $iMenu++;
                            }
                        }
                    }

                    if ($iMenu !== 0) echo "</ul></li>";
                }
                ?>
            </ul>

            <div class="footer" style='opacity:0.5'>
                Corporate Finance IS <br>
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

    })(jQuery);
</script>

<?php
function header_navbar($title, $url, $icon = '')
{
?>
    <li><a data-toggle="collapse" href="#<?= $url ?>" role="button"><span class="fa fa-<?= $icon ?> mr-3 fa-fw"></span> <?= $title ?></a></li>
    <li class="collapse" id="<?= $url ?>">
        <ul>
        <?php
    }

    function list_navbar($title, $link, $current)
    {
        ?>
            <li <?php if ($current !== '' && preg_match("/^\d*\/(\w+\/)*$current/", $link)) echo "class='active'"; ?>>
                <a href="<?= base_url() ?><?= $link ?>"><?= $title ?></a>
            </li>

        <?php
    }
        ?>