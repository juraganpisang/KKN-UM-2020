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
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            foreach ($data as $row) {
                            ?>
                                <tr>
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
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>