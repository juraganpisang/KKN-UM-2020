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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_peminjam" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Indeks</th>
                                    <th>Kode Surat</th>
                                    <th>No Surat</th>
                                    <th>No Laci</th>
                                    <th>Perihal</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($peminjam as $pnj) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $pnj->nama_peminjam; ?></td>
                                        <td><?php echo $pnj->indeks; ?></td>
                                        <td><?php echo $pnj->kode_surat; ?></td>
                                        <td><?php echo $pnj->no_surat; ?></td>
                                        <td><?php echo $pnj->no_laci; ?></td>
                                        <td><?php echo $pnj->perihal; ?></td>
                                        <td><?php echo $pnj->tanggal_pinjam; ?></td>
                                        <td><?php echo $pnj->tanggal_kembali; ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="<?php echo base_url('auth/edit/' . $pnj->id); ?>"><i class="fa fa-check" style="color: white;"></i></a><br />
                                            </br><a class="btn btn-sm btn-success" data-toggle="modal" data-target="#editModal<?php echo $pnj->id; ?>"><i class="fa fa-edit" style="color: white;"></i></a>
                                        </td>
                                    </tr>
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
</div>