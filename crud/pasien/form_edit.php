<?php
include_once "../../header_atas.php";
include_once "nav_item.php";
include_once "../../header_bawah.php";

$nama_pasien    = '';
$tempat_lahir   = '';
$tgl_lahir      = '';
$jenis_kelamin  = '';
$agama          = '';
$alamat         = '';
$no_telp        = '';

$id = $_GET['id'];
$sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien WHERE no_rm = '$id'") or die(mysqli_error($con));

$data = mysqli_fetch_assoc($sql_pasien);

$nama_pasien   = $data['nama_pasien'];
$tempat_lahir  = $data['tempat_lahir'];
$tgl_lahir     = $data['tgl_lahir'];
$jenis_kelamin = $data['jenis_kelamin'];
$agama         = $data['agama'];
$alamat        = $data['alamat'];
$no_telp       = $data['no_telp'];

?>

<!-- CONTAINER -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Edit Data Pasien</h1>

  <div class="row">
    <div class="col-lg-12">
      <!-- FORM -->
      <form action="proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $id; ?>">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="no_rm">No Rekam Medis</label>
            <input type="hidden" name="no_rm" value="<?= $data['no_rm']; ?>">
            <input type="text" name="no_rm" id="no_rm" class="form-control" value="<?= $data['no_rm']; ?>" required readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" value="<?= $data['nik']; ?>" required readonly>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nama Pasien</label>
            <input type="hidden" name="nama_pasien" value="<?= $data['no_rm']; ?>">
            <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="masukkan nama" value="<?= $data['nama_pasien']; ?>" required autofocus>
          </div>
          <div class="form-group col-md-6">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="masukkan tempat lahir" value="<?= $data['tempat_lahir']; ?>" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $data['tgl_lahir']; ?>" required>
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
            <label for="agama">Agama</label>
            <select name="agama" id="agama" class="form-control">
              <option>Pilih...</option>
              <option <?php if ($agama == 'Islam') {
                        echo "selected";
                      } ?> value="Islam">Islam</option>
              <option <?php if ($agama == 'Kristen') {
                        echo "selected";
                      } ?> value="Kristen">Kristen</option>
              <option <?php if ($agama == 'Katolik') {
                        echo "selected";
                      } ?> value="Katolik">Katolik</option>
              <option <?php if ($agama == 'Hindu') {
                        echo "selected";
                      } ?> value="Hindu">Hindu</option>
              <option <?php if ($agama == 'Budha') {
                        echo "selected";
                      } ?> value="Budha">Budha</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="masukkan alamat" value="<?= $data['alamat']; ?>" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">No Telepon</label>
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