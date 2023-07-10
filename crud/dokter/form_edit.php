<?php
include_once "../../header_atas.php";
include_once "nav_item.php";
include_once "../../header_bawah.php";

$nama_dokter   = '';
$spesialis     = '';
$jenis_kelamin = '';
$alamat        = '';
$no_telp       = '';

$id = $_GET['id'];
$sql_obat = mysqli_query($con, "SELECT * FROM tb_dokter WHERE id_dokter = '$id'") or die(mysqli_error($con));

$data = mysqli_fetch_assoc($sql_obat);

$nama_dokter   = $data['nama_dokter'];
$spesialis     = $data['spesialis'];
$jenis_kelamin = $data['jenis_kelamin'];
$alamat        = $data['alamat'];
$no_telp       = $data['no_telp'];
?>

<!-- CONTAINER -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Edit Data Dokter</h1>

  <div class="row">
    <div class="col-lg-12">
      <!-- FORM -->
      <form action="proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $id; ?>">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="id_dokter">Nama Dokter</label>
            <input type="text" name="id_dokter" id="id_dokter" class="form-control" value="<?= $data['id_dokter']; ?>" required readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="nama_dokter">Nama Dokter</label>
            <input type="text" name="nama_dokter" id="nama_dokter" class="form-control" placeholder="masukkan nama" value="<?= $data['nama_dokter']; ?>" required autofocus>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="spesialis">Spesialis</label>
            <select name="spesialis" id="spesialis" class="form-control">
              <option <?php if ($spesialis == 'Dokter Umum') {
                        echo "selected";
                      } ?> value="Dokter Umum">Dokter Umum</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
              <option>Pilih...</option>
              <option <?php if ($jenis_kelamin == 'Laki-Laki') {
                        echo "selected";
                      } ?> value="Laki-Laki">Laki-Laki</option>
              <option <?php if ($jenis_kelamin == 'Perempuan') {
                        echo "selected";
                      } ?> value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="masukkan alamat" value="<?= $data['alamat']; ?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="no_telp">No Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="masukkan no telepon" value="<?= $data['no_telp']; ?>" required>
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