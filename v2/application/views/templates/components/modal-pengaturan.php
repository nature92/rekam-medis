<div class="modal fade" id="modalPengaturan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card-body table-responsive collapse show" id='ganti-password'>
                    <form method='post' action='<?= base_url() ?>action/changePassword/<?= $user['id_user'] . '/' . $pages['page'] . '/' . (isset($menu) ? $menu : 'dashboard') ?>'>
                        <div class="row">
                            <div class="form-group col-md-6 modal-input">
                                <label for="old_pass" class="col-form-label">Password Lama</label>
                                <input type="password" class="form-control" id="old_pass" name='old_pass'>
                            </div>
                            <div class="form-group col-md-6 modal-input">
                            </div>
                            <div class="form-group col-md-6 modal-input">
                                <label for="new_pass" class="col-form-label">Password Baru</label>
                                <input type="password" class="form-control" id="new_pass" name='new_pass'>
                            </div>
                            <div class="form-group col-md-6 modal-input">
                                <label for="conf_pass" class="col-form-label">Ulangi Password Baru</label>
                                <input type="password" class="form-control" id="conf_pass" name='conf_pass'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex" style='justify-content:flex-end'>
                                <button type="submit" class="btn btn-dark">Ganti Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>