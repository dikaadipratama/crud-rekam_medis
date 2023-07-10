<?php include_once "header_atas.php" ?>
<?php include_once "nav_item.php" ?>
<?php include_once "header_bawah.php" ?>

<?php
// DOKTER
$queryJmlDokter = "SELECT * FROM tb_dokter";
$jmlDokter = mysqli_num_rows(mysqli_query($con, $queryJmlDokter));
// PASIEN
$queryJmlPasien = "SELECT * FROM tb_pasien";
$jmlPasien = mysqli_num_rows(mysqli_query($con, $queryJmlPasien));
// POLIKLINIK
$queryJmlPoli = "SELECT * FROM tb_poliklinik";
$jmlPoli = mysqli_num_rows(mysqli_query($con, $queryJmlPoli));
// PENDAFTARAN
$queryJmlPendaftaran = "SELECT * FROM tb_pendaftaran";
$jmlPendaftaran = mysqli_num_rows(mysqli_query($con, $queryJmlPendaftaran));

?>

<!-- CONTAINER -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- ROW -->
  <div class="row">
    <!-- DOKTER -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Data Dokter
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= $jmlDokter; ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- PASIEN -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Data Pasien
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= $jmlPasien; ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- POLIKLINIK -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Data Poliklinik
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?= $jmlPoli; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- PENDAFTARAN -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Data Pendaftaran
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= $jmlPendaftaran; ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- END ROW -->
</div>
<!-- END CONTAINER -->

<?php include_once "footer.php" ?>