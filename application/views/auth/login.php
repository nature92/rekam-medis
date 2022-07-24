<div class="login-box">
  <div class="login-logo">
    <!--<i><b>Klinik Pratama Rahardja</b></i> -->
    <!--<li class="fa fa-heartbeat"> </li>-->
	<img class="img-responsive login-logo" src="<?php echo base_url();?>assets/img/logo_rhj.png" alt="No Available picture" width="650px">
  </div>
        <!-- /.login-logo -->
  <div class="login-box-body">
      <h4 class="login-box-msg">Login Dokter</h4>
               <?= $this->session->flashdata('message'); ?>
                <form class="user" method="post" action="<?= base_url('auth') ?>">
                    <div class="form-group">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username..." value="<?= set_value('username') ?>">
                      <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password...">
                      <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                     <div class="box-footer">
                    <button type="submit" class="btn btn-info btn-user btn-block">
                      Masuk
                    </button>
                  </div>
                    
                  </form>
                   <hr>
                  <div class="text-center">
                    <a class="btn btn-primary" href="<?= base_url('auth/login_admin'); ?>">Masuk sebagai <b>Admin</b></a>
                    <hr>  
                    <a class="btn btn-success" href="<?= base_url('auth/login_apoteker'); ?>">Masuk sebagai <b>Apoteker</b></a>
                    </div>
                </div>
              </div>
          