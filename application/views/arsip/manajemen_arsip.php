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
                            <i class="fa fa-edit fa-lg text-success"></i> : <small>Jika Ada Perubahan Data</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <i class="fa fa-trash fa-lg text-danger"></i> : <small>Jika Surat ingin Dihapus</small>
                        </div>
                    </div>

                    <!-- <div class="table-responsive"> -->
                    <table class="table table-bordered" id="table_arsip" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>No</th>
                                <th>Status</th>
                                <th>Dari/Kepada</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Arsip Surat</th>
                                <th>No Surat</th>
                                <th>No Urut</th>
                                <th>Indeks</th>
                                <th>Kode Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Tanggal Simpan</th>
                                <th>Perihal</th>
                                <th>Jenis Surat</th>
                                <th>B/R/SR</th>
                                <th>No Laci</th>
                                <th>Sistem Simpan</th>
                                <th>Unit</th>
                                <th>Isi Ringkas</th>
                                <th>Arsiparis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($arsip as $ars) {
                            ?>
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="<?php echo base_url('arsip/editArsip/' . $ars->id); ?>"><i class="fa fa-edit" style="color: white;"></i></a><br />
                                        </br><a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $ars->id; ?>"><i class="fa fa-trash" style="color: white;"></i></a>
                                    </td>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $ars->status; ?></td>
                                    <td><?php echo $ars->dr_kpd; ?></td>
                                    <td><?php echo $ars->alamat; ?></td>
                                    <td><?php echo $ars->kota; ?></td>
                                    <td><button class="btn btn-success" data-toggle="modal" data-target="#modal-arsip<?php echo $ars->id ?>"><i style="color:white;" class="fa fa-image fa-lg "></i></button></td>
                                    <td><?php echo $ars->no_surat; ?></td>
                                    <td><?php echo $ars->no_urut; ?></td>
                                    <td><?php echo $ars->indeks; ?></td>
                                    <td><?php echo $ars->kode_surat; ?></td>
                                    <td><?php echo $ars->tanggal_surat; ?></td>
                                    <td><?php echo $ars->tanggal_simpan; ?></td>
                                    <td><?php echo $ars->perihal; ?></td>
                                    <td><?php echo $ars->jenis_surat; ?></td>
                                    <td><?php echo $ars->b_s_sr; ?></td>
                                    <td><?php echo $ars->no_laci; ?></td>
                                    <td><?php echo $ars->sistem_simpan; ?></td>
                                    <td><?php echo $ars->unit; ?></td>
                                    <td><?php echo $ars->isi_ringkas; ?></td>
                                    <td><?php echo $ars->arsiparis; ?></td>
                                </tr>

                                <!-- MODAL Arsip -->
                                <div class="modal fade" id="modal-arsip<?php echo $ars->id ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Scan Arsip</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                if ($ars->scan_arsip == null) {
                                                ?>
                                                    <h2>Belum ada scan arsip!</h2>
                                                <?php
                                                } else {
                                                ?>
                                                <a class="text-primary" href="<?= base_url('assets/file/scanArsip/' . $ars->scan_arsip) ?>"> Klik untuk download file </a>
                                                    <img class="img" style="max-width: 100%;" src="<?= base_url('assets/file/scanArsip/' . $ars->scan_arsip) ?>" />
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
                                <div class="modal fade" id="hapusModal<?= $ars->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Apakah Anda yakin menghapus <b><?php echo "Nomor surat " . $ars->no_surat; ?> </b>?</div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="<?php echo base_url('arsip/hapusArsip/' . $ars->id); ?>">Ya</a>
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
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>