<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

    <!-- page content -->  
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
            </div>

        <div class="clearfix"></div>
        <?php if(session()->getFlashdata('error')) : ?>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-file-excel"></i>
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-md-12 ">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Form Tambah Data Bidan</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Bidan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('bidannama')) ? 
                                'is-invalid' : ''; ?>" name="bidannama" placeholder="Nama Bidan" value="<?= old('bidannama'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bidannama'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-form-label col-md-3 col-sm-3 ">Foto Bidan</label>
                            <div class="col-md-9 col-sm-9">
                                <img src="/admin/production/images/foto" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 
                                'is-invalid' : ''; ?>" name="foto" id="foto" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto'); ?>
                                </div>
                                <label for="foto" class="custem-file-label col-md-3 col-sm-3">Pilih Foto</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 
                                'is-invalid' : ''; ?>" name="alamat" placeholder="Alamat" value="<?= old('alamat'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">No WA/Telepon</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nohp')) ? 
                                'is-invalid' : ''; ?>" name="nohp" placeholder="No WA/Telepon" value="<?= old('nohp'); ?>">
                            </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nohp'); ?>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="reset" class="btn btn-danger">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/databidan" class="btn btn-primary">Kembali</a>
                            <!-- </div> -->
                        </div>
					</form>    
				</div>
			</div>
		</div>
        </div>
    </div>
	<!-- /page content -->
<?= $this->endSection() ?>								