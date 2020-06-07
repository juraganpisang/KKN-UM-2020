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
                    <div class="row">
                        <div class="col">
                            <i class="fa fa-check fa-lg text-success"></i> : <small>Jika Surat Sudah Dikembalikan</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <i class="fa fa-edit fa-lg text-primary"></i> : <small>Jika Ada Perubahan Data</small>
                        </div>
                    </div>
                    
                    <?php echo $this->session->flashdata('message'); ?>
                    
                    <table class="table table-bordered" id="table_peminjam" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>Indeks</th>
                                <th>Kode Surat</th>
                                <th>No Surat</th>
                                <th>No Laci</th>
                                <th>Perihal</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($peminjam as $pnj) {
                            ?>
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#hapusModal<?php echo $pnj->id; ?>"><i class="fa fa-check" style="color: white;"></i></a>
                                        <br>
                                        <br>
                                        <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $pnj->id; ?>"><i style="color:white;" class="fa fa-edit"></i></a>
                                    </td>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $pnj->nama_peminjam; ?></td>
                                    <td><?php echo $pnj->indeks; ?></td>
                                    <td><?php echo $pnj->kode_surat; ?></td>
                                    <td><?php echo $pnj->no_surat; ?></td>
                                    <td><?php echo $pnj->no_laci; ?></td>
                                    <td><?php echo $pnj->perihal; ?></td>
                                    <td><?php echo $pnj->tanggal_pinjam; ?></td>
                                    <td><?php echo $pnj->tanggal_kembali; ?></td>
                                </tr>
                                <script>
                                    function getTextEdit() {
                                        var x = document.getElementById("indeksEdit");
                                        var y = document.getElementById("kdSuratEdit");
                                        y.value = x.value.substr(0, 2);
                                    }
                                </script>
                                <!-- Modal HAPUS-->
                                <div class="modal fade" id="hapusModal<?= $pnj->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengembalian</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Apakah Anda yakin mengonfirmasi <b><?php echo $pnj->nama_peminjam; ?> </b>?</div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="<?php echo base_url('arsip/hapusPeminjam/' . $pnj->id); ?>">Ya</a>
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal edit -->
                                <div class="modal fade" id="modal-edit<?php echo $pnj->id; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Peminjam</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('arsip/editPeminjam') ?>" role="form" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $pnj->id; ?>">
                                                    <div class="form-group">
                                                        <label>Nama Peminjam</label>
                                                        <input type="text" name="nama_peminjam" class="form-control" placeholder="Masukkan Nama Peminjam" value="<?php echo $pnj->nama_peminjam; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Indeks</label>
                                                        <input onkeyup="getTextEdit()" id="indeksEdit" name="indeks" type="text" class="form-control" placeholder="Masukkan Indeks" value="<?php echo $pnj->indeks; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kode Surat</label>
                                                        <input id="kdSuratEdit" name="kode_surat" type="text" class="form-control" placeholder="Masukkan Kode Surat" value="<?php echo $pnj->kode_surat; ?>" readonly>
                                                    </div>
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>No Surat</label>
                                                        <select class="form-control" name="no_surat">
                                                            <?php
                                                            foreach ($noSurat as $row) {
                                                            ?>
                                                                <option value="<?php echo $pnj->no_surat; ?>"><?php echo $pnj->no_surat; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No Laci</label>
                                                        <select name="no_laci" class="form-control">
                                                            <option value="A-G" <?php if ($pnj->no_laci == "A-G") {
                                                                                    echo "selected";
                                                                                } ?>>A-G</option>
                                                            <option value="H-N" <?php if ($pnj->no_laci == "H-N") {
                                                                                    echo "selected";
                                                                                } ?>>H-N</option>
                                                            <option value="O-S" <?php if ($pnj->no_laci == "O-S") {
                                                                                    echo "selected";
                                                                                } ?>>O-S</option>
                                                            <option value="T-Z" <?php if ($pnj->no_laci == "T-Z") {
                                                                                    echo "selected";
                                                                                } ?>>T-Z</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Perihal</label>
                                                        <input type="text" name="perihal" class="form-control" placeholder="Masukkan Perihal" value="<?php echo $pnj->perihal; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Pinjam</label>
                                                        <input type="text" name="tanggal_pinjam" class="form-control" value="<?php echo $pnj->tanggal_pinjam ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Kembali</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control tanggalLahir" name="tanggal_kembali" id="tanggalLahir" value="<?= $pnj->tanggal_kembali; ?>" placeholder="Tanggal Kembali" required="">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <button style="margin-top:20px;" type="button" href="#" label="Tambah" data-toggle="modal" data-target="#modal-tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Peminjam</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjam</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- form start -->
            <form action="<?= base_url('arsip/tambahPeminjam') ?>" role="form" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Peminjam</label>
                        <input name="nama_peminjam" type="text" class="form-control" placeholder="Masukkan Nama Peminjam">
                    </div>
                    <div class="form-group">
                        <label>Indeks</label>
                        <input onkeyup="getText()" id="indeks" name="indeks" type="text" class="form-control" placeholder="Masukkan Indeks">
                    </div>
                    <div class="form-group">
                        <label>Kode Surat</label>
                        <input id="kdSurat" name="kode_surat" type="text" class="form-control" placeholder="Masukkan Kode Surat" readonly>
                    </div>
                    <!-- select -->
                    <div class="form-group">
                        <label>No Surat</label>
                        <select class="form-control" name="no_surat">
                            <?php
                            foreach ($noSurat as $row) {
                            ?>
                                <option value="<?php echo $row->no_surat; ?>"><?php echo $row->no_surat; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No Laci</label>
                        <select name="no_laci" class="form-control">
                            <option value="A-G">A-G</option>
                            <option value="H-N">H-N</option>
                            <option value="O-S">O-S</option>
                            <option value="T-Z">T-Z</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Perihal</label>
                        <input type="text" class="form-control" name="perihal" placeholder="Masukkan Perihal">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="text" name="tanggal_pinjam" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="tanggal_kembali" id="datepicker" placeholder="Tanggal Kembali" required="">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>