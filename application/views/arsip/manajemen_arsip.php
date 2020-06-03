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
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered" id="table_arsip" width="100%" cellspacing="0">
                            <thead>
                                <tr>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($arsip as $ars) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $ars->status; ?></td>
                                        <td><?php echo $ars->dr_kpd; ?></td>
                                        <td><?php echo $ars->alamat; ?></td>
                                        <td><?php echo $ars->kota; ?></td>
                                        <td><?php echo $ars->scan_arsip; ?></td>
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
                                        <td>
                                            <a class="btn btn-sm btn-success" href="<?php echo base_url('auth/edit/' . $ars->id); ?>"><i class="fa fa-edit" style="color: white;"></i></a><br />
                                            </br><a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#editModal<?php echo $ars->id; ?>"><i class="fa fa-trash" style="color: white;"></i></a>
                                        </td>
                                    </tr>
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