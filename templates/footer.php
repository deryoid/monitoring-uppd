  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="https://uniska-bjm.ac.id/">UPPL UNISKA Banjarmasin</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- jQuery -->
  <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url() ?>/assets/plugins/chart.js/Chart.min.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url() ?>/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url() ?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url() ?>/assets/plugins/moment/moment.min.js"></script>
  <!-- ekko lightbox -->
  <script src="<?= base_url() ?>/assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <script src="<?= base_url() ?>/assets/alert/sweetalert.min.js"></script>
  <script src="<?= base_url() ?>/assets/alert/qunit-1.18.0.js"></script>

  <script src="<?= base_url() ?>/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="<?= base_url() ?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>  

  <!-- JQUERY MASK -->
  <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.mask.js"></script>

  <!-- Load File jquery.form.js yang ada di folder js -->
  <script type="text/javascript" src="<?= base_url() ?>/assets/dist/js/jquery.form.js"></script>

  <!-- Load File main.js yang ada di folder js -->
  <script type="text/javascript" src="<?= base_url() ?>/assets/dist/js/main.js"></script>

  <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.media.js"></script>

  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>/assets/dist/js/demo.js"></script>

<!-- Summernote -->
<script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });

      $('.select2').select2();

      bsCustomFileInput.init();

      // FORMAT RUPIAH
      $(".rupiah").mask("000.000.000.000.000", {
        reverse: true
      });

      setTimeout(function() {
        $(".success-alert").slideUp();
      }, 2800);


      // NOTIF SEBELUM LOGOUT
      $('.alert-logout').on('click', function() {
        var getLink = $(this).attr('href');
        swal({
            title: '',
            text: 'Anda Akan Keluar Dari Aplikasi, Lanjutkan ?',
            type: "warning",
            html: true,
            confirmButtonColor: '#87CEFA',
            showCancelButton: true,
          },
          function() {
            window.location.href = getLink
          });
        return false;
      });


      // NOTIF SEBELUM HAPUS
      $('.alert-hapus').on('click', function() {
        var getLink = $(this).attr('href');
        swal({
            title: '',
            text: 'Data Akan Dihapus, Lanjutkan ?',
            type: "warning",
            html: true,
            confirmButtonColor: '#87CEFA',
            showCancelButton: true,
          },
          function() {
            window.location.href = getLink
          });
        return false;
      });      




    });

    function Angkasaja(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }

  </script>

  </body>

  </html>