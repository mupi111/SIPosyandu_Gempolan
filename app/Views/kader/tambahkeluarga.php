<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

    <!-- page content -->        
        <div class="col-md-6 ">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Tambah Data Keluarga</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="/keluarga/save" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">No KK</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nokk')) ? 
                                'is-invalid' : ''; ?>" name="nokk" placeholder="No KK" value="<?= old('nokk'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nokk'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">NIK Suami</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnik')) ? 
                                'is-invalid' : ''; ?>" name="ayahnik" placeholder="NIK Suami" value="<?= old('ayahnik'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnik'); ?>
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
                            <label class="control-label col-md-3 col-sm-3 ">Tempat Lahir Suami</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahtmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="ayahtmptlhr" placeholder="Tempat Lahir Suami" value="<?= old('ayahtmptlhr'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahtmptlhr'); ?>
                                </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3">Tanggal Lahir Suami</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control <?= ($validation->hasError('ayahtgllhr')) ? 
                                'is-invalid' : ''; ?>" class='date' type="date" name="ayahtgllhr" required='required' value="<?= old('ayahtgllhr'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahtgllhr'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Agama Suami</label>
                            <div class="col-md-9 col-sm-9 " name="ayahagama">
                                <select class="form-control <?= ($validation->hasError('ayahagama')) ? 
                                'is-invalid' : ''; ?>">
                                    <option value="Laki-laki">Islam</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahagama'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Pendidikan Terakhir Suami</label>
                            <div class="col-md-9 col-sm-9 " name="ayahpendidikan">
                                <select class="form-control <?= ($validation->hasError('ayahpendidikan')) ? 
                                'is-invalid' : ''; ?>">
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    <option value="Tidak Bersekolah">Tidak Bersekolah</option>
                                </select>
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahpendidikan'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Pekerjaan Suami</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahpekerjaan')) ? 
                                'is-invalid' : ''; ?>" name="ayahpekerjaan" placeholder="Pekerjaan Suami"  value="<?= old('ayahpekerjaan'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahpepekerjaan'); ?>
                                </div>
                        </div>	
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">No HP Suami</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnohp')) ? 
                                'is-invalid' : ''; ?>" name="ayahnohp" placeholder="No HP Suami"  value="<?= old('ayahnohp'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnohp'); ?>
                                </div>
                        </div>	
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">NIK Istri</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunik')) ? 
                                'is-invalid' : ''; ?>" name="ibunik" placeholder="NIK Istri" value="<?= old('ibunik'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunik'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Istri</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunik')) ? 
                                'is-invalid' : ''; ?>" name="ibunama" placeholder="Nama Istri" value="<?= old('ibunama'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunama'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Tempat Lahir Istri</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ibutmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="ibutmptlhr" placeholder="Tempat Lahir Istri" value="<?= old('ibutmptlhr'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibutmptlhr'); ?>
                                </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3">Tanggal Lahir Istri</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control <?= ($validation->hasError('ibutgllhr')) ? 
                                'is-invalid' : ''; ?>" class='date' type="date" name="ibutgllhr" required='required'>
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibutgllhr'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Agama Istri</label>
                            <div class="col-md-9 col-sm-9 " name="ibuagama">
                                <select class="form-control <?= ($validation->hasError('ibuagama')) ? 
                                'is-invalid' : ''; ?>">
                                    <option value="Laki-laki">Islam</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibuagama'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Pendidikan Istri</label>
                            <div class="col-md-9 col-sm-9 " name="ibupendidikan">
                                <select class="form-control <?= ($validation->hasError('ibupendidikan')) ? 
                                'is-invalid' : ''; ?>">
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    <option value="Tidak Bersekolah">Tidak Bersekolah</option>
                                </select>
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibupendidikan'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Golongan Darah Istri</label>
                            <div class="col-md-9 col-sm-9 " name="ibugoldar">
                                <select class="form-control <?= ($validation->hasError('ibugoldar')) ? 
                                'is-invalid' : ''; ?>">
                                    <option value="O">O</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                </select>
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibugoldar'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Pekerjaan Istri</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ibupekerjaan')) ? 
                                'is-invalid' : ''; ?>" name="ibupekerjaan" placeholder="Pekerjaan Istri" value="<?= old('ibupekerjaan'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibupekerjaan'); ?>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">No HP Ibu</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunohp')) ? 
                                'is-invalid' : ''; ?>" name="ibunohp" placeholder="No HP ibu" value="<?= old('ibunohp'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunohp'); ?>
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
                            <label class="control-label col-md-3 col-sm-3 ">Jumlah Anak</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('jmlhanak')) ? 
                                'is-invalid' : ''; ?>" name="jmlhanak" placeholder="Alamat" value="<?= old('jmlhanak'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jmlhanak'); ?>
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