<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

    <!-- page content -->        
        <div class="col-md-6 ">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Tambah Data Bumil</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="/bumil/save" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">NIK</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 
                                'is-invalid' : ''; ?>" name="nik" placeholder="NIK" value="<?= old('nik'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Bumil</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('bumilnama')) ? 
                                'is-invalid' : ''; ?>" name="bumilnama" placeholder="Nama bumil" value="<?= old('bumilnama'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bumilnama'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Anak ke-</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('anakke')) ? 
                                'is-invalid' : ''; ?>" name="anakke" placeholder="Anak ke-" value="<?= old('anakke'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('anakke'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">No HP Bumil</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunohp')) ? 
                                'is-invalid' : ''; ?>" name="ibunohp" placeholder="No HP Bumil" value="<?= old('ibunohp'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunohp'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Suami</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnama')) ? 
                                'is-invalid' : ''; ?>" name="ayahnama" placeholder="Nama Suami" value="<?= old('ayahnama'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnama'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">No HP Suami</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnohp')) ? 
                                'is-invalid' : ''; ?>" name="ayahnohp" placeholder="No HP Suami" value="<?= old('ayahnohp'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnohp'); ?>
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
	<!-- /page content -->
<?= $this->endSection() ?>								