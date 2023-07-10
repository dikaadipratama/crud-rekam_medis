</div>
<!-- end main content -->

<!-- footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Lintang Ayu Nugraheni 2023</span>
    </div>
  </div>
</footer>
<!-- end footer -->
</div>
<!-- End Content Wrapper -->
</div>
<!-- End Page Wrapper -->

<!-- logout modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Logout?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        Pilih "Logout" dibawah ini jika kamu ingin mengakhiri sesi masuk.
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">
          Batal
        </button>
        <a class="btn btn-primary" href="auth/logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>
<!-- end logout modal -->

<!-- Bootstrap JavaScript-->
<script src="<?= base_url('vendor/jquery/jquery.js'); ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('js/sb-admin-2.js'); ?>"></script>
<script src="<?= base_url('libs/DataTables/datatables.min.js'); ?>"></script>
<script src="<?= base_url('js/data-tables.js'); ?>"></script>

</body>

</html>