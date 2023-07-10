<?php
include_once "../../header_atas.php";
include_once "nav_item.php";
include_once "../../header_bawah.php";

$id_poli    = '';
$nama_ruang = '';
$ket_ruang  = '';

$id = $_GET['id'];
$sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik WHERE id_poli = '$id'") or die(mysqli_error($con));

$data = mysqli_fetch_assoc($sql_poli);
// var_dump($data);
// die();

$nama_ruang = $data['nama_ruang'];
$ket_ruang = $data['ket_ruang'];
?>

<!-- CONTAINER -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Edit Data Poliklinik</h1>
  <div class="row">
    <div class="col-lg-12">
      <!-- FORM -->
      <form action="proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $id; ?>">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="id_poli">ID Poliklinik</label>
            <input type="text" name="id_poli" id="id_poli" class="form-control" placeholder="masukkan nama" value="<?= $data['id_poli']; ?>" required readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="nama_poli">Nama Ruang</label>
            <input type="text" name="nama_ruang" id="nama_ruang" class="form-control" placeholder="masukkan nama" value="<?= $data['nama_ruang']; ?>" required autofocus>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nama_dokter">Keterangan Ruang</label>
            <input type="text" name="ket_ruang" id="ket_ruang" class="form-control" placeholder="masukkan keterangan" value="<?= $data['ket_ruang']; ?>" required>
          </div>
        </div>

        <button type="submit" name="edit" class="btn btn-primary">Kirim</button>
        <a href="edit.php" class="btn btn-info">Kembali</a>
      </form>
    </div>
  </div>
</div>
<!-- END CONTAINER -->

<?php include_once "../../footer.php" ?>