<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Kader</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
              <div class="col-md-12 col-sm-12 ">
              <a href="/tambahkader" class="btn btn-info">Tambah</a>
                <div class="x_panel">
                <!-- search -->
                  <div class="row">
                      <div class="col-sm-12">
                      <form action="" method="post">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Search" name="keyword">
                          <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>  
                          </div>
                        </div>
                      </form>
                      </div>
                  </div>
                  <!-- /search -->
                  <div class="x_title">
                    <h2>Tabel Kader</h2>
                    <?php if(session()->getFlashdata('pesan')) : ?>
                      <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?= session()->getFlashdata('pesan'); ?>
                          <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button> -->
                        </div>
                      </div>
                    <?php endif; ?>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kader</th>
                          <th>Jabatan</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach ($kader as $ka) : ?>
                          <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $ka['kadernama']; ?></td>
                            <td><?= $ka['jabatan']; ?></td>
                            <td><?= $ka['alamat']; ?></td>
                            <td>
                              <a href="<?= base_url('/detailkeder'. $ka['idkader']); ?>" class="btn btn-warning btn-sm">Detail</a>
                              <a href="/editkader<?= $ka['idkader']; ?>" class="btn btn-success btn-sm">Edit</a>
                              <form action="/hapuskader<?= $ka['idkader']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin menghapus data ini?');" >Hapus</button>
                              </form>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <!-- /page content -->
<?= $this->endSection() ?>