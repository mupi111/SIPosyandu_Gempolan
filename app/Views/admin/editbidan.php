<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<!-- /page content -->
<?php
    $i = 0;
    foreach ($bidan as $bi) {
        $i++;
    ?>
        <div class="modal fade bs-example-modal-lg" id="editDataIbuModal<?= $bi['idbidan']; ?>"" tabindex=" -1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Form Data Bidan</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="demo-form2" action="<?php echo base_url('/bidan/editbidan') . $bi->idbidan; ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="fotoLama" value="<?= $bidan['foto']; ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="bidannama">Nama Bidan</label>
                                        <div class="col-md-9">
                                            <input type="text" id="bidannama" name="bidannama" required="required" class="form-control" value="<?php $bi->bidannama ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Foto Bidan</label>
                                        <div class="col-md-9 col-sm-9">
                                            <img src="/admin/production/images/foto/<?= $bidan['foto']; ?>" class="img-thumbnail img-preview">
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 
                                            'is-invalid' : ''; ?>" name="foto" id="foto" onchange="previewImg()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('foto'); ?>
                                            </div>
                                            <label for="foto" class="custem-file-label col-md-3 col-sm-3 "><?= $bidan['foto']; ?></label>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat</label>
                                        <div class="col-md-9">
                                            <input type="text" id="alamat" name="alamat" required="required" class="form-control" value="<?php $bi->alamat ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nohp">No WA/Telepon</label>
                                        <div class="col-md-9">
                                            <input type="text" id="nohp" name="nohp" class="form-control" value="<?php $ka->nohp ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button href="<?php base_url('admin') ?>" class="btn btn-info" data-dismiss="modal">Kembali</button> 
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- /page content -->
<?= $this->endSection() ?>

