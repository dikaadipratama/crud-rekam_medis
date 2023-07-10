<?php include_once "../../header_atas.php" ?>
<?php include_once "nav_item.php" ?>
<?php include_once "../../header_bawah.php" ?>

<!-- CONTAINER -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Data Pasien</h1>
  <ul class="ul_tombol">
    <li><a class="btn btn-primary mr-3" href="pasien.php">Tampil</a></li>
    <li><a class="btn btn-primary mr-3" href="tambah.php">Tambah</a>
    <li><a class="btn btn-primary mr-3" href="edit.php">Edit</a>
    <li><a class="btn btn-primary mr-3" href="hapus.php">Hapus</a></li>
    <li><a class="btn btn-primary" href="cetak.php">Cetak Kartu</a></li>
  </ul>

  <br>
  <br>

  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">

        <?php
        // Attempt select query execution
        $sql = "SELECT * FROM tb_pasien";
        $no = 1;
        if ($result = mysqli_query($con, $sql)) {
          // echo mysqli_num_rows($result);
          if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-bordered table-striped text-center' id='pasien'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th class='text-center'>NO</th>";
            echo "<th class='text-center'>NO REKAM MEDIS</th>";
            echo "<th class='text-center'>NIK</th>";
            echo "<th class='text-center'>NAMA PASIEN</th>";
            echo "<th class='text-center'>TEMPAT LAHIR</th>";
            echo "<th class='text-center'>TGL LAHIR</th>";
            echo "<th class='text-center'>JENIS KELAMIN</th>";
            echo "<th class='text-center'>AGAMA</th>";
            echo "<th class='text-center'>ALAMAT</th>";
            echo "<th class='text-center'>NO TELP</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>$no";
              $no++;
              "</td>";
              echo "<td>" . $row['no_rm'] . "</td>";
              echo "<td>" . $row['nik'] . "</td>";
              echo "<td>" . $row['nama_pasien'] . "</td>";
              echo "<td>" . $row['tempat_lahir'] . "</td>";
              echo "<td>" . $row['tgl_lahir'] . "</td>";
              echo "<td>" . $row['jenis_kelamin'] . "</td>";
              echo "<td>" . $row['agama'] . "</td>";
              echo "<td>" . $row['alamat'] . "</td>";
              echo "<td>" . $row['no_telp'] . "</td>";
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

<?php include_once "../../footer.php" ?>