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
                                <th>No KK</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>Desa</th>
                                <th>Agama</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            foreach ($data as $row) {
                            ?>
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailModal<?php echo $row->nik; ?>"><i class="fa fa-ellipsis-h" style="color: white;"></i></a><br />
                                        </br><a class="btn btn-sm btn-success" href="<?= base_url('pendataan/edit_anggota/' . $row->nik); ?>"><i class="fa fa-edit" style="color: white;"></i></a><br>
                                        </br><a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $row->nik; ?>"><i class="fa fa-trash" style="color: white;"></i></a>
                                    </td>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->nama; ?></td>
                                    <td><?php echo $row->umur; ?></td>
                                    <td><?php echo $row->jenkel; ?></td>
                                    <td><?php echo $row->status_kawin; ?></td>
                                    <td><?php echo $row->rt; ?></td>
                                    <td><?php echo $row->rw; ?></td>
                                    <td><?php echo $row->no_kk; ?></td>
                                    <td><?php echo $row->nik; ?></td>
                                    <td><?php echo $row->alamat; ?></td>
                                    <td><?php echo $row->pendidikan; ?></td>
                                    <td><?php echo $row->pekerjaan; ?></td>
                                    <td><?php echo $row->penghasilan; ?></td>
                                    <td><?php echo $row->desa; ?></td>
                                    <td><?php echo $row->agama; ?></td>
                                </tr>
                                <!-- Modal DETAIL-->
                                <div class="modal fade" id="detailModal<?= $row->nik ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="">
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
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal HAPUS-->
                                <div class="modal fade" id="hapusModal<?= $row->nik ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Apakah Anda yakin menghapus <b><?php echo $row->nama ; ?></b> dengan Nomor Induk Keluarga <b><?= $row->nik ?> </b>?</div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="<?php echo base_url('pendataan/hapusAnggota/' . $row->nik); ?>">Ya</a>
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
                                <th>No KK</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>Desa</th>
                                <th>Agama</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>