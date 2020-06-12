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
                <img alt="image preview" height="300" src="<?php echo base_url('assets/file/fotoKK/' . $kpl['foto_kk']) ?>" />
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?= $kpl['alamat']  ?></td>
        </tr>
        <tr>
            <td>Dusun</td>
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
                    <?= $row->jenkel ?>
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
                    <img alt="Tidak ada foto" height="200" src="<?php echo base_url('assets/file/fotoPenghasilan/' . $row->foto_penghasilan) ?>" />
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<script>
    window.print();
</script>