<?php
include_once "../../header_atas.php";
include_once "nav_item.php";
include_once "../../header_bawah.php";
?>


<!-- CONTAINER -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Data Poliklinik</h1>
  <ul class="ul_tombol">
    <li><a class="btn btn-primary mr-3" href="poliklinik.php">Tampil</a></li>
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
        $sql = "SELECT * FROM tb_poliklinik";
        $no = 1;
        if ($result = mysqli_query($con, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-bordered table-striped text-center' id='poliklinik'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th class='text-center'>NO</th>";
            echo "<th class='text-center'>ID POLI</th>";
            echo "<th class='text-center'>NAMA RUANG</th>";
            echo "<th class='text-center'>KETERANGAN RUANG</th>";
            echo "<th class='text-center'>AKSI</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>$no";
              $no++;
              "</td>";
              echo "<td>" . $row['id_poli'] . "</td>";
              echo "<td>" . $row['nama_ruang'] . "</td>";
              echo "<td>" . $row['ket_ruang'] . "</td>";
              echo "<td>";
        ?>

              <form action="proses.php" method="POST">
                <input type="hidden" name="id_poli" value="<?php echo "$row[id_poli]"; ?>">
                <input type="submit" name="hapus" class="btn btn-sm btn-danger btn-edit" value="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
              </form>

        <?php
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