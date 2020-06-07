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

                    <table class="table table-bordered" id="table_peminjam" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>No</th>
                                <th>Nomor KK</th>
                                <th>Foto KK</th>
                                <th>Alamat</th>
                                <th>Desa</th>
                                <th>RT</th>
                                <th>RW</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kepala as $kpl) {
                                $no_kk = $kpl->no_kk;
                            ?>
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailModal<?php echo $kpl->no_kk; ?>" href="<?php echo base_url('pendataan/detail_data/' . $kpl->no_kk); ?>"><i class="fa fa-ellipsis-h" style="color: white;"></i></a><br />
                                        </br><a class="btn btn-sm btn-success" href="<?= base_url('pendataan/edit_data/' . $kpl->no_kk); ?>"><i class="fa fa-edit" style="color: white;"></i></a><br>
                                        </br><a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $kpl->no_kk; ?>"><i class="fa fa-trash" style="color: white;"></i></a>
                                    </td>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $kpl->no_kk; ?></td>
                                    <td><button class="btn btn-success" data-toggle="modal" data-target="#modal-arsip<?php echo $kpl->no_kk ?>"><i style="color:white;" class="fa fa-image fa-lg "></i></button></td>
                                    <td><?php echo $kpl->alamat; ?></td>
                                    <td><?php echo $kpl->desa; ?></td>
                                    <td><?php echo $kpl->rt; ?></td>
                                    <td><?php echo $kpl->rw; ?></td>
                                </tr>

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
                                                    <h2>Belum ada scan arsip!</h2>
                                                <?php
                                                } else {
                                                ?>
                                                    <a class="text-primary" href="<?= base_url('assets/file/scanKK/' . $kpl->foto_kk) ?>"> Klik untuk download file </a>
                                                    <img class="img" style="max-width: 100%;" src="<?= base_url('assets/file/scanKK/' . $kpl->foto_kk) ?>" />
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$CI = &get_instance();
$CI->load->model('pendataan_model');
$kpl = $CI->pendataan_model->getUserKK($no_kk);
$detail = $CI->pendataan_model->getAnggotaKK($no_kk);
?>

<!-- Modal DETAIL-->
<div class="modal fade" id="detailModal<?= $kpl['no_kk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr class="table-success">
                        <td colspan="2">Data Kartu Keluarga</td>
                    </tr>
                    <tr>
                        <td>Nomor KK</td>
                        <td><?= $kpl['no_kk'] ?></td>
                    </tr>
                    <tr>
                        <td>Foto KK</td>
                        <td>
                            <img alt="image preview" height="200" src="<?php echo base_url('assets/file/fotoKK/' . $kpl['foto_kk']) ?>" />
                            <?php
                            if (!$kpl['foto_kk'] == "") {
                            ?>
                                <br><a href="<?= base_url('assets/file/fotoKK/' . $kpl['foto_kk']) ?>" download class="text-primary">download file</a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?= $kpl['alamat']  ?></td>
                    </tr>
                    <tr>
                        <td>Desa</td>
                        <td><?= $kpl['desa'] ?></td>
                    </tr>
                    <tr>
                        <td>RW</td>
                        <td><?= $kpl['rw'] ?></td>
                    </tr>
                    <tr>
                        <td>RT</td>
                        <td><?= $kpl['rt'] ?></td>
                    </tr>
                </table>
                <hr>
                <table class="table table-sm">
                    <?php
                    $no = 1;
                    foreach ($detail as $row) {
                    ?>
                        <tr class="table-active">
                            <td colspan="2">
                                Data Anggota Keluarga <?= $no++ ?>
                            </td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td><?= $row->nik ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><?= $row->nama ?></td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td><?= $row->umur ?> tahun </td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td><?= $row->tempat_lahir ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><?= $row->tanggal_lahir ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <?php if ($row->jenkel == "L") {
                                    echo "Laki - Laki";
                                } else {
                                    echo "Perempuan";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td><?= $row->agama ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan</td>
                            <td><?= $row->pendidikan ?></td>
                        </tr>
                        <tr>
                            <td>Status Kawin</td>
                            <td><?= $row->status_kawin ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td><?= $row->pekerjaan ?></td>
                        </tr>
                        <tr>
                            <td>Penghasilan</td>
                            <td>
                                <?php if ($row->penghasilan == "rendah") {
                                    echo "Rp. 0 - Rp. 1.000.000";
                                } else if ($row->penghasilan == "cukup") {
                                    echo "Rp. 1.000.000 - Rp. 3.000.000";
                                } else if ($row->penghasilan == "tinggi") {
                                    echo "Rp. 3.000.000 - Rp. 7.000.000";
                                } else if ($row->penghasilan == "sangat_tinggi") {
                                    echo "Rp. 7.000.000 - > Rp. 10.000.000";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Bukti Penghasilan</td>
                            <td>
                                <img alt="Tidak ada foto" height="100" src="<?php echo base_url('assets/file/fotoPenghasilan/' . $row->foto_penghasilan) ?>" />
                                <?php
                                if (!$row->foto_penghasilan == "") {
                                ?>
                                    <br><a href="<?= base_url('assets/file/fotoPenghasilan/' . $row->foto_penghasilan) ?>" download class="text-primary">download file</a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="<?= base_url('pendataan/cetakData/'.$kpl['no_kk']) ?>" target="_blank">Cetak</a>
                <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>