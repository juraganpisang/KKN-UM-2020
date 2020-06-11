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
                            <i class="fa fa-ellipsis-h fa-lg text-success"></i> : <small>Untuk melihat Detail Data</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <i class="fa fa-edit fa-lg text-success"></i> : <small>Jika Ada Perubahan Data</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <i class="fa fa-trash fa-lg text-danger "></i> : <small>Jika Data ingin Dihapus</small>
                        </div>
                    </div>

                    <?php echo $this->session->flashdata('message'); ?>
                    <!-- <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" />
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="umur" id="umur" placeholder="Masukkan Umur" />
                            </div>
                            <div class="form-group">
                                <select name="jenkel" id="jenkel" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="status_kawin" id="status_kawin" class="form-control">
                                    <option value="">- Pilih Status -</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <?php
                                $rt = array(
                                    "" => "- Pilih RT -",
                                    "1" => "RT 1",
                                    "2" => "RT 2",
                                    "3" => "RT 3",
                                    "4" => "RT 4",
                                    "5" => "RT 5"
                                );

                                echo form_dropdown('rt', $rt, false, 'class="form-control" id="rt"');
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                $rw = array(
                                    "" => "- Pilih RW -",
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

                                echo form_dropdown('rw', $rw, false, 'class="form-control" id="rw"');
                                ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Masukkan Pendidikan Terakhir" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Pekerjaan" />
                                </div>
                            </div>
                            <div class="form-group">
                                <?php
                                $penghasilan = array(
                                    "" => "- Pilih Penghasilan -",
                                    "rendah" => "Rp. 0 - Rp. 1.000.000",
                                    "cukup" => "Rp. 1.000.000 - Rp. 3.000.000",
                                    "tinggi" => "Rp. 3.000.000 - Rp. 7.000.000",
                                    "sangat_tinggi" => "Rp. 7.000.000 - >Rp. 10.000.000"
                                );

                                echo form_dropdown('penghasilan', $penghasilan, false, 'class="form-control" id="penghasilan"');
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                $desa = array(
                                    "" => "- Pilih Desa -",
                                    "Desa Trajeng" => "Desa Trajeng",
                                    "Desa Krajan" => "Desa Krajan",
                                    "Desa Robyong" => "Desa Robyong"
                                );

                                echo form_dropdown('desa', $desa, false, 'class="form-control" id="desa"');
                                ?>
                            </div>
                            <div class="form-group">
                                <select name="agama" id="agama" class="form-control">
                                    <option value="">- Pilih Agama -</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="LastName" class="col-sm-2 control-label"></label>
                                <div class="col-sm-4">
                                    <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                                    <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <table class="table table-striped display" id="table_manajemen" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Status Perkawinan</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>NIK</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>Desa</th>
                                <th>Agama</th>
                                <th>Tanggal Simpan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            foreach ($data as $row) {
                                $no_kk = $row->no_kk;
                            ?>
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailModal<?php echo $row->no_kk; ?>" href="<?php echo base_url('pendataan/detail_data/' . $row->no_kk); ?>"><i class="fa fa-ellipsis-h" style="color: white;"></i></a><br />
                                        </br><a class="btn btn-sm btn-success" href="<?= base_url('pendataan/edit_data/' . $row->no_kk); ?>"><i class="fa fa-edit" style="color: white;"></i></a><br>
                                        </br><a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $row->no_kk; ?>"><i class="fa fa-trash" style="color: white;"></i></a>
                                    </td>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->nama; ?></td>
                                    <td><?php echo $row->umur; ?></td>
                                    <td><?php echo $row->jenkel; ?></td>
                                    <td><?php echo $row->status_kawin; ?></td>
                                    <td><?php echo $row->rt; ?></td>
                                    <td><?php echo $row->rw; ?></td>
                                    <td><?php echo $row->nik; ?></td>
                                    <td><?php echo $row->pendidikan; ?></td>
                                    <td><?php echo $row->pekerjaan; ?></td>
                                    <td><?php echo $row->penghasilan; ?></td>
                                    <td><?php echo $row->desa; ?></td>
                                    <td><?php echo $row->agama; ?></td>
                                    <!-- <td><button class="btn btn-success" data-toggle="modal" data-target="#modal-arsip<?php echo $kpl->no_kk ?>"><i style="color:white;" class="fa fa-image fa-lg "></i></button></td> -->
                                    <td><?php echo $row->tanggal_simpan; ?></td>
                                </tr>
                                <!-- MODAL SCAN KK -->
                                <div class="modal fade" id="modal-arsip<?php echo $row->no_kk ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Scan Kartu Keluarga</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                if ($row->foto_kk == null) {
                                                ?>
                                                    <h2>Belum ada scan arsip!</h2>
                                                <?php
                                                } else {
                                                ?>
                                                    <a class="text-primary" href="<?= base_url('assets/file/fotoKK/' . $row->foto_kk) ?>"> Klik untuk download file </a>
                                                    <img class="img" style="max-width: 100%;" src="<?= base_url('assets/file/fotoKK/' . $row->foto_kk) ?>" />
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                </div>

                                <!-- Modal HAPUS-->
                                <div class="modal fade" id="hapusModal<?= $row->no_kk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Apakah Anda yakin menghapus <b><?php echo "Nomor Kartu Keluarga " . $row->no_kk; ?> </b>?</div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="<?php echo base_url('pendataan/hapusData/' . $row->no_kk); ?>">Ya</a>
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Aksi</th>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Status Perkawinan</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>NIK</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>Desa</th>
                                <th>Agama</th>
                                <th>Tanggal Simpan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>