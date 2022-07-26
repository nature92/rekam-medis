<header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('admin');?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>R</b>M</span>
		<!-- logo for regular state and mobile devices -->
		<!--<span class="logo-lg"><b>REKAM</b> MEDIS</span> -->
		<span class="logo-lg"><img class="img-responsive login-logo" src="<?php echo base_url();?>assets/img/logo_rhj.png" alt="No Available picture" width="130px"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="hidden-xs"><?= $petugas_obat['nama'] ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<img src="<?php echo base_url();?>assets/img/user.png" onerror="this.src='<?php echo base_url() ?>assets/img/user.png';" class="img-circle" alt="User Image">
                            <p class="text-center">
                                <b><?= $petugas_obat['nama'] ?></b>
                                <br>
                                <small><?php //echo $this->session->userdata('jabatan'); ?></small>
                                <small><?php //echo $this->session->userdata('divisi'); ?></small>
                            </p>
						<li class="user-footer">
							<!--<div class="pull-left">
								<a href="#<?php //echo site_url('User/profile') ?>" class="btn btn-default btn-flat">Profil</a>
							</div>-->
							<div class="pull-right">
								<a href="<?php echo site_url('auth/logout') ?>" class="btn btn-default btn-flat">Keluar</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>