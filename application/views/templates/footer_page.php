</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; KKN UM 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $('#table_peminjam').DataTable({
            "scrollX": true
        });

        $('#table_arsip').DataTable({
            "scrollX": true
        });

        var i = 1;
        $('.tambah').click(function() {
            i++;
            $('#anggota').append(
                '<div id="row'+i+'">'+
                '<hr>'+
                '<div class="row">'+
                '<div class="col">'+
                '<h5>Anggota Keluarga</h5>'+
                '</div>'+
                '<div class="col text-right">'+
                '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>'+
                '</div>'+
                '</div>'+
                '<div class="form-group">' +
                '<label>NIK</label>' +
                '<input name="nik" type="text" class="form-control" placeholder="Masukkan NIK" required>' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Nama</label>' +
                '<input name="nama" type="text" class="form-control" placeholder="Masukkan Nama" required>' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Umur</label>' +
                '<input name="umur" type="number" class="form-control" placeholder="Masukkan Umur" required>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-6 form-group">' +
                '<label>Tempat Lahir</label>' +
                '<input name="tempatLahir" type="text" class="form-control" placeholder="Masukkan Tempat Lahir" required>' +
                '</div>' +
                '<div class="col-6 form-group">' +
                '<label>Tanggal Lahir</label>' +
                '<input name="tanggalLahir" type="text" class="form-control" placeholder="Masukkan Tanggal Lahir" required>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-6 form-group">' +
                '<label>Jenis Kelamin</label>' +
                '<div class="form-check">' +
                '<input type="radio" id="laki" value="Laki-Laki" name="jenkel" class="form-check-input" required>' +
                '<label class="form-check-label" for="laki">' +
                'Laki Laki' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input type="radio" id="perempuan" value="Perempuan" name="jenkel" class="form-check-input" required>' +
                '<label class="form-check-label" for="perempuan">' +
                'Perempuan' +
                '</label>' +
                '</div>' +
                '</div>' +
                '<div class="col-6 form-group">' +
                '<label>Agama</label>' +
                '<select class="form-control" required>' +
                '<option value="Islam">Islam</option>' +
                '<option value="Hindu">Hindu</option>' +
                '<option value="Kristen">Kristen</option>' +
                '<option value="Katolik">Katolik</option>' +
                '<option value="Budha">Budha</option>' +
                '<option value="Konghucu">Konghucu</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-6 form-group">' +
                '<label>Pendidikan Terakhir</label>' +
                '<input name="pendidikan" type="text" class="form-control" placeholder="Masukkan Pendidikan Terakhir" required>' +
                '</div>' +
                '<div class="col-6 form-group">' +
                '<label>Status Perkawinan</label>' +
                '<input name="status" type="text" class="form-control" placeholder="Masukkan Status Perkawinan" required>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-6 form-group">' +
                '<label>Pekerjaan</label>' +
                '<input name="pendidikan" type="text" class="form-control" placeholder="Masukkan Pekerjaan" required>' +
                '</div>' +
                '<div class="col-6 form-group">' +
                '<label>Penghasilan Perbulan</label>' +
                '<select class="form-control" required>' +
                '<option value="rendah">Rp. 0 - Rp. 1.000.000</option>' +
                '<option value="cukup">Rp. 1.000.000 - Rp. 3.000.000</option>' +
                '<option value="tinggi">Rp. 3.000.000 - Rp. 7.000.000</option>' +
                '<option value="sangat_tinggi">Rp. 7.000.000 - > Rp. 10.000.000</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '</div>'+
                '</div>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>
</body>

</html>