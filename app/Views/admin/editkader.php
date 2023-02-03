<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<!-- /page content -->
<?php
    $i = 0;
    foreach ($kader as $ka) {
        $i++;
    ?>
        <div class="modal fade bs-example-modal-lg" id="editDataIbuModal<?= $ka['idkader']; ?>"" tabindex=" -1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Form Data Kader</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="demo-form2" action="<?php echo base_url('admin/') . $ka->idkader; ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kadernama">Nama Kader</label>
                                        <div class="col-md-9">
                                            <input type="text" id="kadernama" name="kadernama" required="required" class="form-control" value="<?php $ka->kadernama ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="jabatan">Jabatan</label>
                                        <div class="col-md-9">
                                            <input type="text" id="jabatan" name="jabatan" required="required" class="form-control" value="<?php $ka->jabatan ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat</label>
                                        <div class="col-md-9">
                                            <input type="text" id="alamat" name="alamat" required="required" class="form-control" value="<?php $ka->alamat ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username</label>
                                        <div class="col-md-9">
                                            <input type="text" id="username" name="username" required="required" class="form-control" value="<?php $ka->username ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" id="email" name="email" class="form-control" value="<?php $ka->email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 label-align">Password</label>
										<div class="col-md-9 col-sm-9 ">
											<input type="password" name="password" id="autocomplete-custom-append" class="form-control col-md-10" />
										</div>
									</div>
                                    <?php if ($ka->fullname) : ?>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Nama Lengkap</label>
                                        <div class="col-md-9">
                                            <input type="text" id="fullname" name="fullname" class="form-control" value="<?php $ka->fullname ?>">
                                        </div>
                                    </div>
                                    <?php endif; ?>
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

