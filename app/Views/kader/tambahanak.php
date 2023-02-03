<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

    <!-- page content -->        
        <div class="col-md-6 ">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Tambah Data Anak</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="/anak/save" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">NIK</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 
                                'is-invalid' : ''; ?>" name="nik" placeholder="NIK" value="<?= old('nik'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Anak</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('anaknama')) ? 
                                'is-invalid' : ''; ?>" name="anaknama" placeholder="Nama Anak" value="<?= old('anaknama'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('anaknama'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Tempat Lahir</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('tmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="tmptlhr" placeholder="Tempat Lahir" value="<?= old('tmptlhr'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tmptlhr'); ?>
                                </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3">Tanggal Lahir</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control <?= ($validation->hasError('tmptlhr')) ? 
                                'is-invalid' : ''; ?>" class='date' type="date" name="tgllhr" required='required' value="<?= old('tgllhr'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgllhr'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Jenis Kelamin</label>
                            <div class="col-md-9 col-sm-9 <?= ($validation->hasError('tgllhr')) ? 
                                'is-invalid' : ''; ?>" name="jk">
                                <select class="form-control">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jk'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Tempat Lahir (Rumah/RS/Puskesmas)</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('namatmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="namatmptlhr" placeholder="Nama Tempat Lahir (Rumah/RS/Puskesmas)" value="<?= old('namatmptlhr'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namatmptlhr'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Ayah</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnama')) ? 
                                'is-invalid' : ''; ?>" name="ayahnama" placeholder="Nama Ayah" value="<?= old('ayahnama'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnama'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Ibu</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunama')) ? 
                                'is-invalid' : ''; ?>" name="ibunama" placeholder="Nama Ibu" value="<?= old('ibunama'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunama'); ?>
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