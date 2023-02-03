<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<!-- /page content -->
<?php
    $i = 0;
    foreach ($users as $user) {
        $i++;
    ?>
        <div class="modal fade bs-example-modal-lg" id="editDataUserModal<?= $users['userid']; ?>"" tabindex=" -1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Form Data User</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="demo-form2" action="/admin/edituser/<?= $users['id']; ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username</label>
                                        <div class="col-md-9">
                                            <input type="text" id="username" name="username" required="required" class="form-control <?= ($validation->hasError('username')) ? 
                                            'is-invalid' : ''; ?>" autofocus value="<?= (old('username')) ? old('username') : $users['username'] ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" id="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 
                                            'is-invalid' : ''; ?>" autofocus value="<?= (old('email')) ? old('email') : $users['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 label-align">Password</label>
										<div class="col-md-9 col-sm-9 ">
											<input type="password" name="password" id="autocomplete-custom-append" class="form-control col-md-10" />
										</div>
									</div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Level User</label>
                                        <div class="col-md-9">
                                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                <option value="Admin">Admin</option>
                                                <option value="Kader">Kader</option>
                                                <option value="Masyarakat">Masyarakat</option>
                                            </select>   
                                            <input type="text" id="name" name="name" class="form-control" value="<?php $users['name'] ?>">
                                        </div>
                                    </div>
                                    <?php if ($users->fullname) : ?>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Nama Lengkap</label>
                                        <div class="col-md-9">
                                            <input type="text" id="fullname" name="fullname" class="form-control <?= ($validation->hasError('fullname')) ? 
                                            'is-invalid' : ''; ?>" autofocus value="<?= (old('fullname')) ? old('fullname') : $users['fullname'] ?>">
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nohp">No WA/Telepon</label>
                                        <div class="col-md-9">
                                            <input type="text" id="nohp" name="nohp" class="form-control <?= ($validation->hasError('nohp')) ? 
                                            'is-invalid' : ''; ?>" autofocus value="<?= (old('nohp')) ? old('nohp') : $users['nohp'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button href="<?php base_url('admin') ?>" class="btn btn-info" data-dismiss="modal">Kembali</button> 
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- /page content -->
<?= $this->endSection() ?>

