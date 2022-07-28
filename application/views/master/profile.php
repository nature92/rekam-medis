		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>Profile User</h1>
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<?php //foreach ($admin as $u) {
								?>
								<?php echo $this->session->flashdata('msg'); ?>
								<form action="<?= base_url('master/updatePassword'); ?>" method="post">
									<div class="form-group row">
										<input type="hidden" name="id_admin" value="<?php //$u->id_admin?>"> 
										<label for="username" class="col-sm-2 col-form-label">Username</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="username" name="username" value="<?php echo $this->session->userdata('username'); ?>" readonly >
										</div>
									</div>
									<div class="form-group row">
										<label for="password" class="col-sm-2 col-form-label">Password Baru</label>
										<div class="col-sm-4">
											<input type="password" class="form-control" id="password" name="password" value="<?php //$u->username?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="passwordconfirm" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
										<div class="col-sm-4">
											<input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm" value="<?php //$u->username?>">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-10">
											<button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
										</div>
									</div>
								</form>
							</div>						
						</div>
					</div>
				</div>
		</div>
	</div>
</div>