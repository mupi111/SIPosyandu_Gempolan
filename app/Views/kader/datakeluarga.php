<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Kelurga</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
              <div class="col-md-12 col-sm-12 ">
              <?php if (in_groups('admin')) : ?>
              <?php endif; ?>
              <?php if (in_groups('kader')) : ?>
              <a href="/tambahkeluarga" class="btn btn-info">Tambah</a>
              <?php endif; ?>
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
                    <h2>Tabel Keluarga</h2>
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
                          <th>NO KK</th>
                          <th>NIK Suami</th>
                          <th>Nama Suami</th>
                          <th>NIK Istri</th>
                          <th>Nama Istri</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach($keluarga as $kel) : ?>
                          <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $kel['nokk']; ?></td>
                            <td><?= $kel['ayahnik']; ?></td>
                            <td><?= $kel['ayahnama']; ?></td>
                            <td><?= $kel['ibunik']; ?></td>
                            <td><?= $kel['ibunama']; ?></td>
                            <td>
                            <?php if (in_groups('admin')) : ?>
                              <a href="<?= base_url('/detailkeluarga'. $kel['nokk']); ?>" class="btn btn-warning btn-sm">Detail</a>
                            <?php endif; ?>
                            <?php if (in_groups('kader')) : ?>
                              <a href="<?= base_url('/detailkeluarga'. $kel['nokk']); ?>" class="btn btn-warning btn-sm">Detail</a>
                              <a href="/editkeluarga<?= $kel['nokk']; ?>" class="btn btn-success btn-sm">Edit</a>
                              <a href="/hapuskeluarga<?= $kel['nokk']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                              <?php endif; ?>
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