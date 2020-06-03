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
              <a class="btn btn-danger" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Custom scripts for all pages-->
      <script src="<?php echo base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

      <!-- Bootstrap core JavaScript-->
      <script src="<?php echo base_url('assets/'); ?>js/jquery-3.4.1.min.js"></script>

      <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery.dataTables.min.js"></script>

      <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/datatables.min.js"></script>
      
      <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/bootstrap.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="<?php echo base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- date picker -->
      <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

      <!-- currency formatter -->
      <script src="<?php echo base_url('assets/'); ?>js/pcsFormatNumber.jquery.js"></script>

      <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/all.min.js"></script>

      <script>
        $(document).ready(function() {
          $('#table_peminjam').DataTable({
            "scrollX": true
          });

          $('#table_arsip').DataTable();
        });

        $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $('#goal_date').datepicker({
          format: 'yyyy-mm-dd',
          startDate: '+1d'
        });

        $('#est_cost').pcsFormatNumber({
          decimal_separator: ".",
          currency: "Rp."
        });

        $('#save_flexible_amount').pcsFormatNumber({
          decimal_separator: ".",
          currency: "Rp."
        });
      </script>

      </body>

      </html>