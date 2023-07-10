<?php
include_once "../../header_atas.php";
include_once "nav_item.php";
include_once "../../header_bawah.php";

?>

<!-- CONTAINER -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Data Pendaftaran</h1>
  <ul class="ul_tombol">
    <li><a class="btn btn-primary mr-3" href="pendaftaran.php">Tampil</a></li>
    <li><a class="btn btn-primary mr-3" href="tambah.php">Tambah</a>
    <li><a class="btn btn-primary mr-3" href="edit.php">Edit</a>
    <li><a class="btn btn-primary" href="hapus.php">Hapus</a></li>
  </ul>

  <br>
  <br>

  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <?php
        // Attempt select query execution
        $sql = "SELECT * FROM tb_pendaftaran
                INNER JOIN tb_pasien ON tb_pendaftaran.no_rm = tb_pasien.no_rm
                INNER JOIN tb_dokter ON tb_pendaftaran.id_dokter = tb_dokter.id_dokter
                INNER JOIN tb_poliklinik ON tb_pendaftaran.id_poli = tb_poliklinik.id_poli
                ";
        $no = 1;
        if ($result = mysqli_query($con, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-bordered table-striped text-center' id='pendaftaran'>";
            echo "<thead class='align-items-center'>";
            echo "<tr>";
            echo "<th class='text-center'>NO</th>";
            echo "<th class='text-center'>NO PENDAFTARAN</th>";
            echo "<th class='text-center'>NO RM</th>";
            echo "<th class='text-center'>NIK</th>";
            echo "<th class='text-center'>NAMA PASIEN</th>";
            echo "<th class='text-center'>TGL PENDAFTARAN</th>";
            echo "<th class='text-center'>NAMA DOKTER</th>";
            echo "<th class='text-center'>NAMA RUANG</th>";
            echo "<th class='text-center'>JENIS PEMBAYARAN</th>";
            echo "<th class='text-center'>AKSI</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>$no";
              $no++;
              "</td>";
              echo "<td>" . $row['no_pendaftaran'] . "</td>";
              echo "<td>" . $row['no_rm'] . "</td>";
              echo "<td>" . $row['nik'] . "</td>";
              echo "<td>" . $row['nama_pasien'] . "</td>";
              echo "<td>" . $row['tgl_pendaftaran'] . "</td>";
              echo "<td>" . $row['nama_dokter'] . "</td>";
              echo "<td>" . $row['nama_ruang'] . "</td>";
              echo "<td>" . $row['jenis_pembayaran'] . "</td>";
              echo "<td>";

              echo "<a class='btn btn-sm ml-1 mb-1 btn-success btn-edit' href='form_edit.php?id=" . $row['no_pendaftaran'] . "' title='Edit Pendaftaran' data-toggle='tooltip'>Edit</a>";
              echo "</td>";
              echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
          } else {
            echo "<p class='lead'><em>No records were found.</em></p>";
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