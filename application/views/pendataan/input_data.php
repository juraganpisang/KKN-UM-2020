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
                    <form action="proses/insert.php" role="form" method="post" enctype="multipart/form-data">
                        <!-- BEDA KONTEN -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <!-- /.box-header -->
                                    <h5><b>Kepala Keluarga</b></h5>
                                    <div class="form-group">
                                        <label>No KK</label>
                                        <input name="noKK" type="text" class="form-control" placeholder="Masukkan Nomor KK" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">Foto KK</label>
                                        <img id="image-preview" alt="image preview" />
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="fotoKK" id="customFile" onchange="previewImage();" required>
                                            <label class="custom-file-label" for="customFile">Masukkan Arsip Disini</label>
                                        </div>
                                        <small class="text-danger">*Ukuran maksimal 5 MB</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" required></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Desa</label>
                                                <select class="form-control" required>
                                                    <option value="1">Desa 1</option>
                                                    <option value="2">Desa 2</option>
                                                    <option value="3">Desa 3</option>
                                                    <option value="4">Desa 4</option>
                                                    <option value="5">Desa 5</option>
                                                    <option value="6">Desa 6</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>RW</label>
                                                <select class="form-control" required>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group" required>
                                                <label>RT</label>
                                                <select class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="anggota">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input name="nik" type="text" class="form-control" placeholder="Masukkan NIK" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama" required>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label>Umur</label>
                                                <input name="umur" type="number" class="form-control" placeholder="Masukkan Umur" required>
                                            </div>
                                            <div class="col form-group">
                                                <label>Tempat Lahir</label>
                                                <input name="tempatLahir" type="text" class="form-control" placeholder="Masukkan Tempat Lahir" required>
                                            </div>
                                            <div class="col form-group">
                                                <label>Tanggal Lahir</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control tanggalLahir" name="tanggalLahir" placeholder="Masukkan Tanggal Lahir" required="">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label>Jenis Kelamin</label>
                                                <div class="form-check">
                                                    <input type="radio" id="laki" value="Laki-Laki" name="jenkel" class="form-check-input" required>
                                                    <label class="form-check-label" for="laki">
                                                        Laki Laki
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="perempuan" value="Perempuan" name="jenkel" class="form-check-input" required>
                                                    <label class="form-check-label" for="perempuan">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group">
                                                <label>Agama</label>
                                                <select class="form-control" required>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label>Pendidikan Terakhir</label>
                                                <input name="pendidikan" type="text" class="form-control" placeholder="Masukkan Pendidikan Terakhir" required>
                                            </div>
                                            <div class="col form-group">
                                                <label>Status Perkawinan</label>
                                                <select name="status_kawin" class="form-control">
                                                    <option value="Belum Kawin">Belum Kawin</option>
                                                    <option value="Kawin">Kawin</option>
                                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                                    <option value="Cerai Mati">Cerai Mati</option>
                                                </select>    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label>Pekerjaan</label>
                                                <input name="pendidikan" type="text" class="form-control" placeholder="Masukkan Pekerjaan" required>
                                            </div>
                                            <div class="col-6 form-group">
                                                <label>Penghasilan Perbulan</label>
                                                <select class="form-control" required>
                                                    <option value="rendah">Rp. 0 - Rp. 1.000.000</option>
                                                    <option value="cukup">Rp. 1.000.000 - Rp. 3.000.000</option>
                                                    <option value="tinggi">Rp. 3.000.000 - Rp. 7.000.000</option>
                                                    <option value="sangat_tinggi">Rp. 7.000.000 - > Rp. 10.000.000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fotoPenghasilan">Foto Bukti Penghasilan</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="fotoPenghasilan" id="fotoPenghasilan" required>
                                                <label class="custom-file-label" for="fotoPenghasilan">Masukkan Bukti Penghasilan</label>
                                            </div>
                                            <small class="text-danger">*Ukuran maksimal 5 MB</small>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button name="tambah" id="tambah" type="button" class="btn btn-success tambah"><i class="fa fa-plus"></i>Tambah Anggota Keluarga</button>
                                        <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- awas kari -->
</div>