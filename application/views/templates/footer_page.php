</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SUPERSIP 2020</span>
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
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah Anda yakin ingin mengakhiri sesi saat ini? <br>Pilih "Logout" untuk mengakhiri sesi.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/js/jquery-3.5.1.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables.searchPanes.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/dataTables.select.min.js'); ?>"></script>

<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js'); ?>"></script>
<script>
    //desa rt rw
    function desaChange() {
        if (document.getElementById("desa").value == "Dusun Trajeng") {
            $("#rw").replaceWith('<select name="rw" class="form-control" id="rw" required onChange="rwChange()">' +
                '<option value="" selected="selected">- Pilih -</option>' +
                '<option value="1">RW 01</option>' +
                '<option value="2">RW 02</option>' +
                '<option value="3">RW 03</option>' +
                '<option value="4">RW 04</option>' +
                '<option value="5">RW 05</option>' +
                '<option value="14">RW 14</option>' +
                '</select>');
        } else if (document.getElementById("desa").value == "Dusun Krajan") {
            $("#rw").replaceWith('<select name="rw" class="form-control" id="rw" required onChange="rwChange()">' +
                '<option value="" selected="selected">- Pilih -</option>' +
                '<option value="6">RW 06</option>' +
                '<option value="7">RW 07</option>' +
                '<option value="8">RW 08</option>' +
                '<option value="9">RW 09</option>' +
                '<option value="13">RW 13</option>' +
                '</select>');
        } else if (document.getElementById("desa").value == "Dusun Robyong") {
            $("#rw").replaceWith('<select name="rw" class="form-control" id="rw" required onChange="rwChange()">' +
                '<option value="" selected="selected">- Pilih -</option>' +
                '<option value="10">RW 10</option>' +
                '<option value="11">RW 11</option>' +
                '<option value="12">RW 12</option>' +
                '</select>');
        }
    }

    function rwChange() {
        if (document.getElementById("desa").value == "Dusun Trajeng") {
            if ($("#rw").val() == "1" || $("#rw").val() == "2" || $("#rw").val() == "3" || $("#rw").val() == "4" || $("#rw").val() == "5") {
                $("#rt").replaceWith('<select name="rt" class="form-control" id="rt" required>' +
                    '<option value="" selected="selected">- Pilih -</option>' +
                    '<option value="1">RT 01</option>' +
                    '<option value="2">RT 02</option>' +
                    '<option value="3">RT 03</option>' +
                    '<option value="4">RT 04</option>' +
                    '<option value="5">RT 05</option>' +
                    '<option value="6">RT 06</option>' +
                    '</select>');
            } else if($("#rw").val() == "14" ) {
                $("#rt").replaceWith('<select name="rt" class="form-control" id="rt" required>' +
                    '<option value="" selected="selected">- Pilih -</option>' +
                    '<option value="1">RT 01</option>' +
                    '<option value="2">RT 02</option>' +
                    '<option value="3">RT 03</option>' +
                    '<option value="4">RT 04</option>' +
                    '<option value="5">RT 05</option>' +
                    '<option value="6">RT 06</option>' +
                    '<option value="7">RT 07</option>' +
                    '</select>');
            }
        } else if (document.getElementById("desa").value == "Dusun Krajan") {
            if (document.getElementById("rw").value == "6" || $("#rw").val() == "7" || $("#rw").val() == "8" || $("#rw").val() == "9") {
                $("#rt").replaceWith('<select name="rt" class="form-control" id="rt" required>' +
                    '<option value="" selected="selected">- Pilih -</option>' +
                    '<option value="1">RT 01</option>' +
                    '<option value="2">RT 02</option>' +
                    '<option value="3">RT 03</option>' +
                    '<option value="4">RT 04</option>' +
                    '</select>');
            } else {
                $("#rt").replaceWith('<select name="rt" class="form-control" id="rt" required>' +
                    '<option value="" selected="selected">- Pilih -</option>' +
                    '<option value="1">RT 01</option>' +
                    '<option value="2">RT 02</option>' +
                    '</select>');
            }
        } else if (document.getElementById("desa").value == "Dusun Robyong") {
            if (document.getElementById("rw").value == 10 || $("#rw").val() == 12) {
                $("#rt").replaceWith('<select name="rt" class="form-control" id="rt" required>' +
                    '<option value="" selected="selected">- Pilih -</option>' +
                    '<option value="1">RT 01</option>' +
                    '<option value="2">RT 02</option>' +
                    '<option value="3">RT 03</option>' +
                    '<option value="4">RT 04</option>' +
                    '<option value="5">RT 05</option>' +
                    '</select>');
            } else {
                $("#rt").replaceWith('<select name="rt" class="form-control" id="rt" required>' +
                    '<option value="" selected="selected">- Pilih -</option>' +
                    '<option value="1">RT 01</option>' +
                    '<option value="2">RT 02</option>' +
                    '<option value="3">RT 03</option>' +
                    '<option value="4">RT 04</option>' +
                    '</select>');
            }
        }
    }

    $(document).ready(function() {

        $('#table_manajemen').DataTable({
            'scrollX': true,
            searchPane: {
                dtOpts: {
                    dom: 'tp',
                    paging: 'true',
                    pagingType: 'numbers',
                    searching: false
                }
            },
            dom: 'Pfrtip',
            columnDefs: [{
                searchPanes: {
                    header: 'Aksi',
                    show: 'false'
                },
                targets: [0]
            }]
        });


        //bedoooo
        $('#table_peminjam').DataTable({
            "scrollX": true
        });

        $('#table_arsip').DataTable({
            "scrollX": true
        });

        var i = 0;
        $('.tambah').click(function() {

            i++;
            $('#anggota').append(
                '<div id="row' + i + '">' +
                '<hr>' +
                '<div class="row">' +
                '<div class="col">' +
                '<h5>Anggota Keluarga</h5>' +
                '</div>' +
                '<div class="col text-right">' +
                '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label>NIK</label>' +
                '<input name="nik[]" type="text" class="form-control" placeholder="Masukkan NIK" required>' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Nama</label>' +
                '<input name="nama[]" type="text" class="form-control" placeholder="Masukkan Nama" required>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col form-group">' +
                '<label>Umur</label>' +
                '<input name="umur[]" type="number" class="form-control" placeholder="Masukkan Umur" >' +
                '</div>' +
                '<div class="col form-group">' +
                '<label>Tempat Lahir</label>' +
                '<input name="tempatLahir[]" type="text" class="form-control" placeholder="Masukkan Tempat Lahir" >' +
                '</div>' +
                '<div class="col form-group">' +
                '<label>Tanggal Lahir</label>' +
                '<div class="input-group">' +
                '<input name="tanggalLahir[]" type="text" class="form-control tanggalLahir" placeholder="Masukkan Tanggal Lahir">' +
                '<div class="input-group-prepend">' +
                '<span class="input-group-text"><i class="fa fa-calendar"></i></span>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col form-group">' +
                '<label>Jenis Kelamin</label>' +
                '<div class="form-check">' +
                '<input type="radio" id="laki' + i + '" value="Laki-Laki" name="jenkel' + i + '" class="form-check-input">' +
                '<label class="form-check-label" for="laki' + i + '">' +
                'Laki Laki' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input type="radio" id="perempuan' + i + '" value="Perempuan" name="jenkel' + i + '" class="form-check-input">' +
                '<label class="form-check-label" for="perempuan' + i + '">' +
                'Perempuan' +
                '</label>' +
                '</div>' +
                '</div>' +
                '<div class="col form-group">' +
                '<label>Agama</label>' +
                '<select name="agama[]" class="form-control">' +
                '<option value="">- Pilih -</option>' +
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
                '<div class="col form-group">' +
                '<label>Pendidikan Terakhir</label>' +
                '<input name="pendidikan[]" type="text" class="form-control" placeholder="Masukkan Pendidikan Terakhir" >' +
                '</div>' +
                '<div class="col form-group">' +
                '<label>Status Perkawinan</label>' +
                '<select name="status_kawin[]" class="form-control" >' +
                '<option value="">- Pilih -</option>' +
                '<option value="Belum Kawin">Belum Kawin</option>' +
                '<option value="Kawin">Kawin</option>' +
                '<option value="Cerai Hidup">Cerai Hidup</option>' +
                '<option value="Cerai Mati">Cerai Mati</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col form-group">' +
                '<label>Pekerjaan</label>' +
                '<input name="pekerjaan[]" type="text" class="form-control" placeholder="Masukkan Pekerjaan" >' +
                '</div>' +
                '<div class="col form-group">' +
                '<label>Penghasilan Perbulan</label>' +
                '<select name="penghasilan[]" class="form-control" >' +
                '<option value="">- Pilih -</option>' +
                '<option value="rendah">Rp. 0 - Rp. 1.000.000</option>' +
                '<option value="cukup">Rp. 1.000.000 - Rp. 3.000.000</option>' +
                '<option value="tinggi">Rp. 3.000.000 - Rp. 7.000.000</option>' +
                '<option value="sangat_tinggi">Rp. 7.000.000 - > Rp. 10.000.000</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="fotoPenghasilan' + i + '">Foto Bukti Penghasilan</label>' +
                '<div class="custom-file">' +
                '<input type="file" class="custom-file-input" name="fotoPenghasilan' + i + '" id="fotoPenghasilan' + i + '" >' +
                '<label class="custom-file-label" for="fotoPenghasilan' + i + '">Masukkan Bukti Penghasilan</label>' +
                '</div>' +
                '<small class="text-danger">*Ukuran maksimal 5 MB</small>' +
                '</div>' +
                '</div>' +
                '</div>');


            //upload file
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            //Date picker
            $('.tanggalLahir').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
            });
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });

        //Date picker
        $('.tanggalLahir').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });
    });

    function getText() {
        var x = document.getElementById("indeks");
        var y = document.getElementById("kdSurat");
        y.value = x.value.substr(0, 2);
    };

    function getTextEdit() {
        var x = document.getElementById("indeksEdit");
        var y = document.getElementById("kdSuratEdit");
        y.value = x.value.substr(0, 2);
    }

    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("customFile").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
        };
    };

    //upload file
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>

</html>