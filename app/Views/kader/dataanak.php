<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Anak</h3>
              </div>
            </div>

            <div class="clearfix">

            </div>
            <div class="row">
              <div class="col-md-12">
              <div class="col-md-12 col-sm-12 ">
              <?php if (in_groups('admin')) : ?>
              <?php endif; ?>
              <?php if (in_groups('kader')) : ?>
                <a href="tambahanak" class="btn btn-info">Tambah</a>
              <?php endif; ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Anak</h2>
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
                          <th>NIK</th>
                          <th>Nama Anak</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Jenis kelamin</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach($anak as $nak) : ?>
                          <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $nak->nik; ?></td>
                            <td><?= $nak->anaknama; ?></td>
                            <td><?= $nak->tmptlhr; ?></td>
                            <td><?= $nak->tgllhr; ?></td>
                            <td><?= $nak->jk; ?></td>
                            <td>
                            <?php if (in_groups('admin')) : ?>
                              <a href="<?= base_url('/detailanak'. $nak->nik); ?>" class="btn btn-warning btn-sm">Detail</a>
                            <?php endif; ?>
                            <?php if (in_groups('kader')) : ?>
                              <a href="<?= base_url('/detailanak'. $nak->nik); ?>" class="btn btn-warning btn-sm">Detail</a>
                              <a href="/editanak<?= $nak->nik; ?>" class="btn btn-success btn-sm">Edit</a>
                              <a href="/hapusanak<?= $nak->nik; ?>" class="btn btn-danger btn-sm">Hapus</a>
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