<?php
include_once "../../header_atas.php";
include_once "nav_item.php";
include_once "../../header_bawah.php";

?>

<!-- CONTAINER -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Tambah Data Poliklinik</h1>

  <div class="row">
    <div class="col-lg-12">
      <!-- FORM -->
      <form action="proses.php" method="POST">
        <div class="form-row">
          <div class="form-group col-md-6">

            <?php
            $query = mysqli_query($con, "SELECT max(id_poli) as maxKode FROM tb_poliklinik");
            $data = mysqli_fetch_array($query);
            $maxKode = $data['maxKode'];

            $nourut = (int) substr($maxKode, 3, 4);
            $nourut++;

            $char = "POL";
            $kodeauto = $char . sprintf("%03s", $nourut);
            ?>

            <label for="id_poli">ID Poliklinik</label>
            <input type="text" name="id_poli" id="id_poli" class="form-control" value="<?= $kodeauto; ?>" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="nama_ruang">Nama Ruang</label>
            <input type="text" name="nama_ruang" id="nama_ruang" class="form-control" placeholder="masukkan nama" required autofocus>
          </div>
          <div class="form-group col-md-6">
            <label for="ket_ruang">Keterangan Ruang</label>
            <input type="text" name="ket_ruang" id="ket_ruang" class="form-control" placeholder="masukkan keterangan" required>
          </div>
        </div>

        <button type="submit" name="add" class="btn btn-info">Kirim</button>
        <a href="poliklinik.php" class="btn btn-warning">Kembali</a>
      </form>
    </div>
  </div>
</div>
<!-- END CONTAINER -->

<?php include_once "../../footer.php" ?>