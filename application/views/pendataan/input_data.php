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

                    <?php echo $this->session->flashdata('message'); ?>

                    <!-- form start -->
                    <form action="<?= base_url('pendataan/do_tambah') ?>" role="form" method="post" enctype="multipart/form-data">
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
                                            <input type="file" class="custom-file-input" name="foto_kk" id="customFile" onchange="previewImage();">
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
                                                <label for="desa">Desa</label>
                                                <!-- <select name="desa" class="form-control">
                                                    <option value="">- Pilih -</option>
                                                    <option value="Desa 1">Desa 1</option>
                                                    <option value="Desa 2">Desa 2</option>
                                                    <option value="Desa 3">Desa 3</option>
                                                    <option value="Desa 4">Desa 4</option>
                                                    <option value="Desa 5">Desa 5</option>
                                                    <option value="Desa 6">Desa 6</option>
                                                </select> -->
                                                <?php
                                                $desa = array(
                                                    "" => "- Pilih -",
                                                    "Desa Trajeng" => "Desa Trajeng",
                                                    "Desa Krajan" => "Desa Krajan",
                                                    "Desa Robyong" => "Desa Robyong"
                                                );

                                                echo form_dropdown('desa', $desa, false, 'class="form-control" id="desa" required');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="rw">RW</label>
                                                <?php
                                                $rw = array(
                                                    "" => "- Pilih -",
                                                    "1" => "RW 1",
                                                    "2" => "RW 2",
                                                    "3" => "RW 3",
                                                    "4" => "RW 4",
                                                    "5" => "RW 5",
                                                    "6" => "RW 6",
                                                    "7" => "RW 7",
                                                    "8" => "RW 8",
                                                    "9" => "RW 9",
                                                    "10" => "RW 10",
                                                    "11" => "RW 11",
                                                    "12" => "RW 12",
                                                    "13" => "RW 13",
                                                    "14" => "RW 14",
                                                );

                                                echo form_dropdown('rw', $rw, false, 'class="form-control" id="rw" required');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="rt">RT</label>
                                                <?php
                                                $rt = array(
                                                    "" => "- Pilih -",
                                                    "1" => "RT 1",
                                                    "2" => "RT 2",
                                                    "3" => "RT 3",
                                                    "4" => "RT 4"
                                                );

                                                echo form_dropdown('rt', $rt, false, 'class="form-control" id="rt" required');
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="anggota">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input name="nik[]" type="text" class="form-control" placeholder="Masukkan NIK" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input name="nama[]" type="text" class="form-control" placeholder="Masukkan Nama" required>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label>Umur</label>
                                                <input name="umur[]" type="number" class="form-control" placeholder="Masukkan Umur">
                                            </div>
                                            <div class="col form-group">
                                                <label>Tempat Lahir</label>
                                                <input name="tempatLahir[]" type="text" class="form-control" placeholder="Masukkan Tempat Lahir">
                                            </div>
                                            <div class="col form-group">
                                                <label>Tanggal Lahir</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control tanggalLahir" name="tanggalLahir[]" placeholder="Masukkan Tanggal Lahir">
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
                                                    <input type="radio" id="laki" value="L" name="jenkel0" class="form-check-input">
                                                    <label class="form-check-label" for="laki">
                                                        Laki Laki
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="perempuan" value="P" name="jenkel0" class="form-check-input">
                                                    <label class="form-check-label" for="perempuan">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group">
                                                <label>Agama</label>
                                                <select name="agama[]" class="form-control">
                                                    <option value="">- Pilih -</option>
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
                                                <input name="pendidikan[]" type="text" class="form-control" placeholder="Masukkan Pendidikan Terakhir">
                                            </div>
                                            <div class="col form-group">
                                                <label>Status Perkawinan</label>
                                                <select name="status_kawin[]" class="form-control">
                                                    <option value="">- Pilih -</option>
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
                                                <input name="pekerjaan[]" type="text" class="form-control" placeholder="Masukkan Pekerjaan">
                                            </div>
                                            <div class="col-6 form-group">
                                                <label>Penghasilan Perbulan</label>
                                                <select name="penghasilan[]" class="form-control">
                                                    <option value="">- Pilih -</option>
                                                    <option value="rendah">Rp. 0 - Rp. 1.000.000</option>
                                                    <option value="cukup">Rp. 1.000.000 - Rp. 3.000.000</option>
                                                    <option value="tinggi">Rp. 3.000.000 - Rp. 7.000.000</option>
                                                    <option value="sangat_tinggi">Rp. 7.000.000 - > Rp. 10.000.000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fotoPenghasilan0">Foto Bukti Penghasilan</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="fotoPenghasilan0" id="fotoPenghasilan0">
                                                <label class="custom-file-label" for="fotoPenghasilan0">Masukkan Bukti Penghasilan</label>
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