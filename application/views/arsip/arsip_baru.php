<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
    </div>

    <div class="row">
        <div class="col">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <!-- form start -->
                    <?= form_open_multipart('arsip/tambah_arsip'); ?>
                        <div class="row" style="margin-bottom:20px;">
                            <div class="col-lg-6 col-xs-6">
                                <!-- small box -->
                                <div class="card bg-info p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="inner">
                                                <h3>3</h3>
                                                <p>Surat Masuk</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="icon">
                                                <i class="fas fa-sign-in-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <label>
                                        <input type="radio" name="status" class="minimal" checked value="0"> Surat Masuk
                                    </label>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-6 col-xs-6">
                                <!-- small box -->
                                <div class="card bg-success p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="inner">
                                                <h3>3</h3>
                                                <p>Surat Keluar</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="icon">
                                                <i class="fas fa-sign-out-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <label>
                                        <input type="radio" name="status" class="minimal" value="1"> Surat Keluar
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- BEDA KONTEN -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Dari / Kepada</label>
                                            <input name="dariKepada" type="text" class="form-control" placeholder="Masukkan Nama Perusahaan">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <input name="kota" type="text" class="form-control" placeholder="Masukkan Kota">
                                        </div>
                                        <div class="box box-primary">
                                        </div>
                                        <div class="form-group">
                                            <label>No Surat</label>
                                            <input name="noSurat" type="text" class="form-control" placeholder="Masukkan Nomor Surat">
                                        </div>
                                        <div class="form-group">
                                            <label>No Urut</label>
                                            <input name="noUrut" type="number" class="form-control" placeholder="Masukkan Nomor Urut">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Indeks</label>
                                                <input onkeyup="getText()" id="indeks" name="indeks" type="text" class="form-control" placeholder="Masukkan Indeks">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Kode Surat</label>
                                                <input id="kdSurat" name="kodeSurat" type="text" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Tanggal Surat</label>
                                                <div class="input-group" style="position: relative;">
                                                    <input type="text" class="form-control" name="tanggalSurat" id="datepicker" placeholder="Tanggal Surat" required="">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar" id="eyePass"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Tanggal Simpan</label>
                                                <input name="tanggalSimpan" type="text" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Perihal</label>
                                            <input name="perihal" type="text" class="form-control" placeholder="Masukkan Perihal">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Surat</label>
                                            <input name="jenisSurat" type="text" class="form-control" placeholder="Masukkan Jenis Surat">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>B/R/SR</label>
                                                <input name="bssr" type="text" class="form-control" placeholder="Masukkan B/R/SR">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>No Laci</label>
                                                <select name="noLaci" class="form-control">
                                                    <option value="A-G">A-G</option>
                                                    <option value="H-N">H-N</option>
                                                    <option value="O-S">O-S</option>
                                                    <option value="T-Z">T-Z</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Sistem Simpan</label>
                                                <input name="sistemSimpan" type="text" class="form-control" placeholder="Sistem Simpan">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Unit</label>
                                                <input name="unit" type="text" class="form-control" placeholder="Masukkan Unit">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Isi Ringkas</label>
                                            <textarea name="isiRingkas" class="form-control" placeholder="Masukkan Isi Ringkas"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="customFile">Scan Arsip</label>
                                            <img id="image-preview" alt="image preview" />
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="scanArsip" id="customFile" onchange="previewImage();" required>
                                                <label class="custom-file-label" for="customFile">Masukkan Arsip Disini</label>
                                            </div>
                                            <small class="text-danger">*Ukuran maksimal 5 MB</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Arsiparis</label>
                                            <input name="arsiparis" type="text" class="form-control" placeholder="Masukkan Nama Arsiparis">
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <button name="submit" type="submit" class="btn btn-primary pull-right">Simpan</button>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- awas kari -->
</div>