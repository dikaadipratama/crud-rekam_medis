<?php
include_once "../../header_atas.php";
include_once "nav_item.php";
include_once "../../header_bawah.php";
?>

<!-- CONTAINER -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Tambah Data Dokter</h1>

  <div class="row">
    <div class="col-lg-12">
      <!-- FORM -->
      <form action="proses.php" method="POST">
        <div class="form-row">

          <?php
          $query = mysqli_query($con, "SELECT max(id_dokter) as maxKode FROM tb_dokter");
          $data = mysqli_fetch_array($query);
          $maxKode = $data['maxKode'];

          $nourut = (int) substr($maxKode, 2, 3);

          $nourut++;

          $char = "DR";
          $kodeauto = $char . sprintf("%03s", $nourut);
          ?>

          <div class="form-group col-md-6">
            <label for="id_dokter">ID Dokter</label>
            <input type="text" name="id_dokter" id="id_dokter" class="form-control" value="<?= $kodeauto; ?>" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="nama_dokter">Nama Dokter</label>
            <input type="text" name="nama_dokter" id="nama_dokter" class="form-control" placeholder="masukkan nama" required autofocus>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="spesialis">Spesialis</label>
            <select name="spesialis" id="spesialis" class="form-control">
              <option value="Dokter Umum">Dokter Umum</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="masukkan alamat" required>
          </div>
          <div class="form-group col-md-6">
            <label for="no_telp">No Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="masukkan no telepon" required>
          </div>
        </div>

        <button type="submit" name="add" class="btn btn-info">Simpan</button>
        <a href="dokter.php" class="btn btn-warning">Kembali</a>
      </form>
    </div>
  </div>
</div>
<!-- END CONTAINER -->

<?php include_once "../../footer.php" ?>