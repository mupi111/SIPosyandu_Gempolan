<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Data Bidan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown"></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        
                        <div class="col-md-3">
                            <img src="/admin/production/images/foto/<?= $bidan['foto']; ?>" class="card-img" alt="foto">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Nama Bidan</b></h5>
                                <b class="media-body"><?= $bidan['bidannama']; ?></b><br><br>
                                <h5 class="media-body"><b>Alamat</b></h5>
                                <b class="media-body"><?= $bidan['alamat']; ?></b> <br><br>
                                <h5 class="media-body"><b>No HP</b></h5>
                                <b class="media-body"><?= $bidan['nohp']; ?></b>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <a href="/databidan" class="btn btn-primary">Kembali</a>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
            
