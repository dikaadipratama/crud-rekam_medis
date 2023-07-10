<?php include_once "../../header_atas.php" ?>
<?php include_once "nav_item.php" ?>
<?php include_once "../../header_bawah.php" ?>

<!-- CONTAINER -->
<div class="container-fluid">
  <h1 class="h3 mb-3 text-gray-800">Data Pendaftaran</h1>
  <ul class="ul_tombol">
    <li><a class="btn btn-primary mr-3" href="pendaftaran.php">Tampil</a></li>
    <li><a class="btn btn-primary mr-3" href="tambah.php">Tambah Data Pasien Baru</a>
    <li><a class="btn btn-primary mr-3" href="tambah_lama.php">Tambah Data Pasien Lama</a>
    <li><a class="btn btn-primary mr-3" href="edit.php">Edit</a>
    <li><a class="btn btn-primary mr-3" href="hapus.php">Hapus</a></li>
    <li><a class="btn btn-success mr-3" data-toggle="modal" data-target="#modalFilter">Filter Data Tanggal</a></li>
  </ul>

  <br><br>

  <div class=" row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">

        <?php
        if (isset($_POST['filter'])) {
          $tgl_awal  = strip_tags($_POST['tgl_awal']);
          $tgl_akhir = strip_tags($_POST['tgl_akhir']);

          // filter data
          $sql = "SELECT * FROM tb_pendaftaran 
          INNER JOIN tb_pasien ON tb_pendaftaran.no_rm = tb_pasien.no_rm
          INNER JOIN tb_dokter ON tb_pendaftaran.id_dokter = tb_dokter.id_dokter
          INNER JOIN tb_poliklinik ON tb_pendaftaran.id_poli = tb_poliklinik.id_poli
          WHERE tb_pendaftaran.tgl_pendaftaran BETWEEN '$tgl_awal' AND '$tgl_akhir'
          ";
        } else {
          // Attempt select query execution
          $sql = "SELECT * FROM tb_pendaftaran
          INNER JOIN tb_pasien ON tb_pendaftaran.no_rm = tb_pasien.no_rm
          INNER JOIN tb_dokter ON tb_pendaftaran.id_dokter = tb_dokter.id_dokter
          INNER JOIN tb_poliklinik ON tb_pendaftaran.id_poli = tb_poliklinik.id_poli
          ";
        }
        $no = 1;
        if ($result = mysqli_query($con, $sql)) {
          // echo mysqli_num_rows($result);
          if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-bordered table-striped text-center' id='pendaftaran'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th class='text-center'>NO PENDAFTARAN</th>";
            echo "<th class='text-center'>NO RM</th>";
            echo "<th class='text-center'>NIK</th>";
            echo "<th class='text-center'>NAMA PASIEN</th>";
            echo "<th class='text-center'>TANGGAL PENDAFTARAN</th>";
            echo "<th class='text-center'>NAMA DOKTER</th>";
            echo "<th class='text-center'>NAMA RUANG</th>";
            echo "<th class='text-center'>KETERANGAN RUANG</th>";
            echo "<th class='text-center'>JENIS PEMBAYARAN</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['no_pendaftaran'] . "</td>";
              echo "<td>" . $row['no_rm'] . "</td>";
              echo "<td>" . $row['nik'] . "</td>";
              echo "<td>" . $row['nama_pasien'] . "</td>";
              echo "<td>" . $row['tgl_pendaftaran'] . "</td>";
              echo "<td>" . $row['nama_dokter'] . "</td>";
              echo "<td>" . $row['nama_ruang'] . "</td>";
              echo "<td>" . $row['ket_ruang'] . "</td>";
              echo "<td>" . $row['jenis_pembayaran'] . "</td>";
              echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
          } else {
            echo "<p class='lead'><em>Tidak ada data yang ditemukan.</em></p>";
          }
        } else {
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        ?>

      </div>
    </div>
  </div>
</div>
<!-- END CONTAINER -->

<!-- MODAL FILTER -->
<div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-white" id="exampleModalLabel">Filter Data Berdasarkan Tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="tgl_awal">Tanggal Awal</label>
            <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" value="<?= date('Y-m-d'); ?>">
          </div>
          <div class="form-group">
            <label for="tgl_akhir">Tanggal Akhir</label>
            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" value="<?= date('Y-m-d'); ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success" name="filter">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL FILTER -->

<?php include_once "../../footer.php" ?>