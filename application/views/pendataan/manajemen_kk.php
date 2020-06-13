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

                    <table class="table table-bordered" id="table_peminjam" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>No</th>
                                <th>Nomor KK</th>
                                <th>Foto KK</th>
                                <th>Alamat</th>
                                <th>Desa</th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>Tanggal Simpan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = 1;
                            foreach ($kepala as $kpl) {
                                $no_kk = $kpl->no_kk;
                            ?>
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailModal<?php echo $kpl->no_kk; ?>" href="<?php echo base_url('pendataan/detail_data/' . $kpl->no_kk); ?>"><i class="fa fa-ellipsis-h" style="color: white;"></i></a><br />
                                        </br><a class="btn btn-sm btn-success" href="<?= base_url('pendataan/edit_data/' . $kpl->no_kk); ?>"><i class="fa fa-edit" style="color: white;"></i></a><br>
                                        </br><a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $kpl->no_kk; ?>"><i class="fa fa-trash" style="color: white;"></i></a>
                                    </td>
                                    <td><?php echo $num++; ?></td>
                                    <td><?php echo $kpl->no_kk; ?></td>
                                    <td><button class="btn btn-success" data-toggle="modal" data-target="#modal-arsip<?php echo $kpl->no_kk ?>"><i style="color:white;" class="fa fa-image fa-lg "></i></button></td>
                                    <td><?php echo $kpl->alamat; ?></td>
                                    <td><?php echo $kpl->desa; ?></td>
                                    <td><?php echo $kpl->rw; ?></td>
                                    <td><?php echo $kpl->rt; ?></td>
                                    <td><?php echo $kpl->tanggal_simpan; ?></td>
                                </tr>

                                <?php
                                $CI = &get_instance();
                                $CI->load->model('pendataan_model');
                                if ($num > 1) {
                                    $detail = $CI->pendataan_model->getAnggotaKK($no_kk);
                                ?>

                                    <!-- Modal DETAIL-->
                                    <div class="modal fade" id="detailModal<?= $kpl->no_kk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            Nomor KK
                                                        </div>
                                                        <div class="col-8">
                                                            <?= $kpl->no_kk ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            Foto KK
                                                        </div>
                                                        <div class="col-8">
                                                            <img alt="image preview" height="200" src="<?php echo base_url('assets/file/fotoKK/' . $kpl->foto_kk) ?>" />
                                                            <?php
                                                            if (!$kpl->foto_kk == "") {
                                                            ?>
                                                                <br><a href="<?= base_url('assets/file/fotoKK/' . $kpl->foto_kk) ?>" download class="text-primary">download file</a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            Alamat
                                                        </div>
                                                        <div class="col-8">
                                                            <?= $kpl->alamat ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            Dusun </div>
                                                        <div class="col-8">
                                                            <?= $kpl->desa ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            RW
                                                        </div>
                                                        <div class="col-8">
                                                            <?= $kpl->rw ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            RT
                                                        </div>
                                                        <div class="col-8">
                                                            <?= $kpl->rt ?>
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                        <?php
                                                        $no = 1;
                                                        foreach ($detail as $row) {
                                                        ?>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    NIK
                                                                </div>
                                                                <div class="col-8"><?= $row->nik ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Nama
                                                                </div>
                                                                <div class="col-8"><?= $row->nama ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Umur
                                                                </div>
                                                                <div class="col-8"><?= $row->umur ?> tahun </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Tempat Lahir
                                                                </div>
                                                                <div class="col-8"><?= $row->tempat_lahir ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Tanggal Lahir
                                                                </div>
                                                                <div class="col-8"><?= $row->tanggal_lahir ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Jenis Kelamin
                                                                </div>
                                                                <div class="col-8"><?= $row->jenkel ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Agama
                                                                </div>
                                                                <div class="col-8"><?= $row->agama ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Pendidikan
                                                                </div>
                                                                <div class="col-8"><?= $row->pendidikan ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Status Kawin
                                                                </div>
                                                                <div class="col-8"><?= $row->status_kawin ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Pekerjaan
                                                                </div>
                                                                <div class="col-8"><?= $row->pekerjaan ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Penghasilan
                                                                </div>
                                                                <div class="col-8"><?php if ($row->penghasilan == "rendah") {
                                                                                        echo "Rp. 0 - Rp. 1.000.000";
                                                                                    } else if ($row->penghasilan == "cukup") {
                                                                                        echo "Rp. 1.000.000 - Rp. 3.000.000";
                                                                                    } else if ($row->penghasilan == "tinggi") {
                                                                                        echo "Rp. 3.000.000 - Rp. 7.000.000";
                                                                                    } else if ($row->penghasilan == "sangat_tinggi") {
                                                                                        echo "Rp. 7.000.000 - >Rp. 10.000.000";
                                                                                    } ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    Bukti Penghasilan
                                                                </div>
                                                                <div class="col-8">
                                                                    <img alt="Tidak ada foto" height="100" src="<?php echo base_url('assets/file/fotoPenghasilan/' . $row->foto_penghasilan) ?>" />
                                                                    <?php
                                                                    if (!$row->foto_penghasilan == "") {
                                                                    ?>
                                                                        <br><a href="<?= base_url('assets/file/fotoPenghasilan/' . $row->foto_penghasilan) ?>" download class="text-primary">download file</a>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-primary" href="<?= base_url('pendataan/cetakData/' . $kpl->no_kk) ?>" target="_blank">Cetak</a>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                                <!-- MODAL SCAN KK -->
                                <div class="modal fade" id="modal-arsip<?php echo $kpl->no_kk ?>">
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
                                                if ($kpl->foto_kk == null) {
                                                ?>
                                                    <h5>Belum ada Scan KK!</h5>
                                                <?php
                                                } else {
                                                ?>
                                                    <a class="text-primary" href="<?= base_url('assets/file/fotoKK/' . $kpl->foto_kk) ?>"> Klik untuk download file </a>
                                                    <img class="img" style="max-width: 100%;" src="<?= base_url('assets/file/fotoKK/' . $kpl->foto_kk) ?>" />
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
                                <div class="modal fade" id="hapusModal<?= $kpl->no_kk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Apakah Anda yakin menghapus <b><?php echo "Nomor Kartu Keluarga " . $kpl->no_kk; ?> </b>?</div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="<?php echo base_url('pendataan/hapusData/' . $kpl->no_kk); ?>">Ya</a>
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
                                <th>Nomor KK</th>
                                <th>Foto KK</th>
                                <th>Alamat</th>
                                <th>Desa</th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>Tanggal Simpan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>