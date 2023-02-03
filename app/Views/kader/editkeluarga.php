<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<!-- /page content -->
<?php
    $i = 0;
    foreach ($keluarga as $ka) {
        $i++;
    ?>
        <div class="modal fade bs-example-modal-lg" id="editDataIbuModal<?= $ka['idkeluarga']; ?>"" tabindex=" -1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Form Data Keluarga</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="demo-form2" action="<?php echo base_url('/keluarga/editkeluarga') . $ka->idkeluarga; ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nokk">No KK</label>
                                        <div class="col-md-9">
                                            <input type="text" id="nokk" name="nokk" required="required" class="form-control" value="<?php $ka->nokk ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ayahnik">NIK Suami</label>
                                        <div class="col-md-9">
                                            <input type="text" id="ayahnik" name="ayahnik" required="required" class="form-control" value="<?php $ka->ayahnik ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ayahnama">Nama Suami</label>
                                        <div class="col-md-9">
                                            <input type="text" id="ayahnama" name="ayahnama" required="required" class="form-control" value="<?php $ka->ayahnama ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ayahtmptlhr">Tempat Lahir Suami</label>
                                        <div class="col-md-9">
                                            <input type="text" id="ayahtmptlhr" name="ayahtmptlhr" required="required" class="form-control" value="<?php $ka->ayahtmptlhr ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ayahtgllhr">Tanggal Lahir Suami</label>
                                        <div class="col-md-9">
                                            <input type="date" id="ayahtgllhr" name="ayahtgllhr" class="form-control" value="<?php $ka->ayahtgllhr ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 label-align">Agama Suami</label>
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
										<label class="control-label col-md-3 col-sm-3 label-align">Pendidikan Terakhir Suami</label>
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
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ayahpekerjaan">Pekerjaan Suami</label>
                                        <div class="col-md-9">
                                            <input type="text" id="ayahpekerjaan" name="ayahpekerjaan" class="form-control" value="<?php $ka->ayahpekerjaan ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ayahnohp">No HP Suami</label>
                                        <div class="col-md-9">
                                            <input type="text" id="ayahnohp" name="ayahnohp" class="form-control" value="<?php $ka->ayahnohp ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ibunik">NIK Istri</label>
                                        <div class="col-md-9">
                                            <input type="text" id="ibunik" name="ibunik" required="required" class="form-control" value="<?php $ka->ibunik ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ibunama">Nama Istri</label>
                                        <div class="col-md-9">
                                            <input type="text" id="ibunama" name="ibunama" required="required" class="form-control" value="<?php $ka->ibunama ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ibutmptlhr">Tempat Lahir Istri</label>
                                        <div class="col-md-9">
                                            <input type="text" id="ibutmptlhr" name="ibutmptlhr" required="required" class="form-control" value="<?php $ka->ibutmptlhr ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ibutgllhr">Tanggal Lahir Istri</label>
                                        <div class="col-md-9">
                                            <input type="date" id="ibutgllhr" name="ibutgllhr" class="form-control" value="<?php $ka->ibutgllhr ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 label-align">Agama Istri</label>
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
										<label class="control-label col-md-3 col-sm-3 label-align">Pendidikan Terakhir Istri</label>
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
										<label class="control-label col-md-3 col-sm-3 label-align">Golda Istri</label>
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
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ibupekerjaan">Pekerjaan Istri</label>
                                        <div class="col-md-9">
                                            <input type="text" id="ibupekerjaan" name="ibupekerjaan" class="form-control" value="<?php $ka->ibupekerjaan ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ibunohp">No HP Istri</label>
                                        <div class="col-md-9">
                                            <input type="text" id="ibunohp" name="ibunohp" class="form-control" value="<?php $ka->ibunohp ?>">
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

