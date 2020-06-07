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
                    <form action="<?= base_url('pendataan/do_edit/' . $kk['no_kk']) ?>" role="form" method="post" enctype="multipart/form-data">
                        <!-- BEDA KONTEN -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <!-- /.box-header -->
                                    <h5><b>Kepala Keluarga</b></h5>
                                    <div class="form-group">
                                        <label>No KK</label>
                                        <input name="noKK" type="text" class="form-control" placeholder="Masukkan Nomor KK" value="<?= $kk['no_kk']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">Foto KK</label>
                                        <img id="image-preview" style="display: block;" alt="image preview" height="200" src="<?php echo base_url('assets/file/fotoKK/') . ($this->input->post('foto_kk') ? $this->input->post('foto_kk') : $kk['foto_kk']); ?>" />
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto_kk" id="customFile" onchange="previewImage();">
                                            <label class="custom-file-label" for="customFile">Masukkan Arsip Disini</label>
                                        </div>
                                        <small class="text-danger">*Ukuran maksimal 5 MB</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat"><?= $kk['alamat']; ?></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Desa</label>
                                                <select name="desa" class="form-control">
                                                    <option <?php if ($kk['desa'] == "") {
                                                                echo "selected";
                                                            } ?> value="">- Pilih -</option>
                                                    <option <?php if ($kk['desa'] == "Desa 1") {
                                                                echo "selected";
                                                            } ?> value="Desa 1">Desa 1</option>
                                                    <option <?php if ($kk['desa'] == "Desa 2") {
                                                                echo "selected";
                                                            } ?> value="Desa 2">Desa 2</option>
                                                    <option <?php if ($kk['desa'] == "Desa 3") {
                                                                echo "selected";
                                                            } ?> value="Desa 3">Desa 3</option>
                                                    <option <?php if ($kk['desa'] == "Desa 4") {
                                                                echo "selected";
                                                            } ?> value="Desa 4">Desa 4</option>
                                                    <option <?php if ($kk['desa'] == "Desa 5") {
                                                                echo "selected";
                                                            } ?> value="Desa 5">Desa 5</option>
                                                    <option <?php if ($kk['desa'] == "Desa 6") {
                                                                echo "selected";
                                                            } ?> value="Desa 6">Desa 6</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>RW</label>
                                                <select name="rw" class="form-control">
                                                    <option <?php if ($kk['rw'] == "") {
                                                                echo "selected";
                                                            } ?> value="">- Pilih -</option>
                                                    <option <?php if ($kk['rw'] == 1) {
                                                                echo "selected";
                                                            } ?> value="1">1</option>
                                                    <option <?php if ($kk['rw'] == "2") {
                                                                echo "selected";
                                                            } ?> value="2">2</option>
                                                    <option <?php if ($kk['rw'] == "3") {
                                                                echo "selected";
                                                            } ?> value="3">3</option>
                                                    <option <?php if ($kk['rw'] == "4") {
                                                                echo "selected";
                                                            } ?> value="4">4</option>
                                                    <option <?php if ($kk['rw'] == "5") {
                                                                echo "selected";
                                                            } ?> value="5">5</option>
                                                    <option <?php if ($kk['rw'] == "6") {
                                                                echo "selected";
                                                            } ?> value="6">6</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>RT</label>
                                                <select name="rt" class="form-control">
                                                    <option <?php if ($kk['rt'] == "") {
                                                                echo "selected";
                                                            } ?> value="">- Pilih -</option>
                                                    <option <?php if ($kk['rt'] == "1") {
                                                                echo "selected";
                                                            } ?> value="1">1</option>
                                                    <option <?php if ($kk['rt'] == "2") {
                                                                echo "selected";
                                                            } ?> value="2">2</option>
                                                    <option <?php if ($kk['rt'] == "3") {
                                                                echo "selected";
                                                            } ?> value="3">3</option>
                                                    <option <?php if ($kk['rt'] == "4") {
                                                                echo "selected";
                                                            } ?> value="4">4</option>
                                                    <option <?php if ($kk['rt'] == "5") {
                                                                echo "selected";
                                                            } ?> value="5">5</option>
                                                    <option <?php if ($kk['rt'] == "6") {
                                                                echo "selected";
                                                            } ?> value="6">6</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="anggota">

                                        <?php
                                        foreach ($anggota as $agt) {
                                        ?>
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input name="nik[]" type="text" class="form-control" placeholder="Masukkan NIK" value="<?= $agt->nik; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input name="nama[]" type="text" class="form-control" placeholder="Masukkan Nama" value="<?= $agt->nama; ?>">
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label>Umur</label>
                                                    <input name="umur[]" type="number" class="form-control" placeholder="Masukkan Umur" value="<?= $agt->umur; ?>">
                                                </div>
                                                <div class="col form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input name="tempatLahir[]" type="text" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?= $agt->tempat_lahir; ?>">
                                                </div>
                                                <div class="col form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control tanggalLahir" name="tanggalLahir[]" placeholder="Masukkan Tanggal Lahir" value="<?= $agt->tanggal_lahir; ?>">
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
                                                        <input type="radio" id="laki0" value="L" name="jenkel0" class="form-check-input" <?php if ($agt->jenkel == "L") {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                                        <label class="form-check-label" for="laki0">
                                                            Laki Laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" id="perempuan0" value="P" name="jenkel0" class="form-check-input" <?php if ($agt->jenkel == "P") {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                                        <label class="form-check-label" for="perempuan0">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label>Agama</label>
                                                    <select name="agama[]" class="form-control">
                                                        <option <?php if ($agt->agama == "") {
                                                                    echo "selected";
                                                                } ?> value="">- Pilih -</option>
                                                        <option <?php if ($agt->agama == "Islam") {
                                                                    echo "selected";
                                                                } ?> value="Islam">Islam</option>
                                                        <option <?php if ($agt->agama == "Hindu") {
                                                                    echo "selected";
                                                                } ?> value="Hindu">Hindu</option>
                                                        <option <?php if ($agt->agama == "Kristen") {
                                                                    echo "selected";
                                                                } ?> value="Kristen">Kristen</option>
                                                        <option <?php if ($agt->agama == "Katolik") {
                                                                    echo "selected";
                                                                } ?> value="Katolik">Katolik</option>
                                                        <option <?php if ($agt->agama == "Budha") {
                                                                    echo "selected";
                                                                } ?> value="Budha">Budha</option>
                                                        <option <?php if ($agt->agama == "Konghucu") {
                                                                    echo "selected";
                                                                } ?> value="Konghucu">Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <input name="pendidikan[]" type="text" class="form-control" placeholder="Masukkan Pendidikan Terakhir" value="<?= $agt->pendidikan; ?>">
                                                </div>
                                                <div class="col form-group">
                                                    <label>Status Perkawinan</label>
                                                    <select name="status_kawin[]" class="form-control">
                                                        <option <?php if ($agt->status_kawin == "") {
                                                                    echo "selected";
                                                                } ?> value="">- Pilih -</option>
                                                        <option <?php if ($agt->status_kawin == "Belum Kawin") {
                                                                    echo "selected";
                                                                } ?> value="Belum Kawin">Belum Kawin</option>
                                                        <option <?php if ($agt->status_kawin == "Kawin") {
                                                                    echo "selected";
                                                                } ?> value="Kawin">Kawin</option>
                                                        <option <?php if ($agt->status_kawin == "Cerai Hidup") {
                                                                    echo "selected";
                                                                } ?> value="Cerai Hidup">Cerai Hidup</option>
                                                        <option <?php if ($agt->status_kawin == "Cerai Mati") {
                                                                    echo "selected";
                                                                } ?> value="Cerai Mati">Cerai Mati</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 form-group">
                                                    <label>Pekerjaan</label>
                                                    <input name="pekerjaan[]" type="text" class="form-control" placeholder="Masukkan Pekerjaan" value=<?= $agt->pekerjaan; ?>>
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label>Penghasilan Perbulan</label>
                                                    <select name="penghasilan[]" class="form-control">
                                                        <option <?php if ($agt->penghasilan == "") {
                                                                    echo "selected";
                                                                } ?> value="">- Pilih -</option>
                                                        <option <?php if ($agt->penghasilan == "rendah") {
                                                                    echo "selected";
                                                                } ?> value="rendah">Rp. 0 - Rp. 1.000.000</option>
                                                        <option <?php if ($agt->penghasilan == "cukup") {
                                                                    echo "selected";
                                                                } ?> value="cukup">Rp. 1.000.000 - Rp. 3.000.000</option>
                                                        <option <?php if ($agt->penghasilan == "tinggi") {
                                                                    echo "selected";
                                                                } ?> value="tinggi">Rp. 3.000.000 - Rp. 7.000.000</option>
                                                        <option <?php if ($agt->penghasilan == "sangat_tinggi") {
                                                                    echo "selected";
                                                                } ?> value="sangat_tinggi">Rp. 7.000.000 - > Rp. 10.000.000</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="fotoPenghasilan0">Foto Bukti Penghasilan</label>
                                                <img id="image-preview" style="display: block;" alt="image preview" height="200" src="<?php echo base_url('assets/file/fotoPenghasilan/').($this->input->post('foto_penghasilan') ? $this->input->post('scan_arsip') : $agt->foto_penghasilan); ?>"/>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="fotoPenghasilan0" id="fotoPenghasilan0">
                                                    <label class="custom-file-label" for="fotoPenghasilan0">Masukkan Bukti Penghasilan</label>
                                                </div>
                                                <small class="text-danger">*Ukuran maksimal 5 MB</small>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button name="tambah" id="tambah" type="button" class="btn btn-success tambah"><i class="fa fa-plus"></i>Tambah Anggota Keluarga</button>
                                        <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>