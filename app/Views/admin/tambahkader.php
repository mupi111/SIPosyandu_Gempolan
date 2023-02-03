<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

    <!-- page content -->  
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tambah Data Kader</h3>
              </div>
            </div>

        <div class="clearfix"></div>

        <div class="col-md-12 ">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Form Tambah Data Kader</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="/kader/save" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Kader</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('kadernama')) ? 
                                'is-invalid' : ''; ?>" name="kadernama" placeholder="Nama Kader" value="<?= old('kadernama'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kadernama'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Jabatan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('jabatan')) ? 
                                'is-invalid' : ''; ?>" name="jabatan" placeholder="Jabatan" value="<?= old('jabatan'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jabatan'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 
                                'is-invalid' : ''; ?>" name="alamat" placeholder="Alamat" value="<?= old('alamat'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">No WA/Telepon</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nohp')) ? 
                                'is-invalid' : ''; ?>" name="nohp" placeholder="No WA/Telepon" value="<?= old('nohp'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nohp'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Username</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 
                                'is-invalid' : ''; ?>" name="username" placeholder="Username" value="<?= old('username'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Email</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 
                                'is-invalid' : ''; ?>" name="email" placeholder="Email" value="<?= old('email'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 ">Password</label>
							<div class="col-md-9 col-sm-9 ">
								<input type="password" class="form-control <?= ($validation->hasError('password')) ? 
                                'is-invalid' : ''; ?>" name="password">
							</div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
						</div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                <button type="button" class="btn btn-primary">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="button" class="btn btn-info">Kembali</button>
                            </div>
                        </div>
					</form>    
				</div>
			</div>
		</div>
    </div>
</div>
	<!-- /page content -->
<?= $this->endSection() ?>								