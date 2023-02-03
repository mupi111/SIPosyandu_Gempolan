<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

    <!-- page content -->   
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tambah Data Bumil</h3>
              </div>
            </div>

            <div class="clearfix"></div>

        <div class="col-md-12 ">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Form Tambah Data User</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="/admin/save" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Username</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Email</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 ">Password</label>
							<div class="col-md-9 col-sm-9 ">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Level User</label>
                            <div class="col-md-9 col-sm-9 " name="name">
                                <select class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="Kader">Kader</option>
                                    <!-- <option value="Bidan">Bidan</option> -->
                                    <option value="Masyarakat">Masyarakat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Lengkap</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">No WA/Telepon</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="nohp" placeholder="No WA/Telepon">
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