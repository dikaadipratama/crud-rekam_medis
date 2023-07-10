<?php
include_once "../../header_atas.php";
include_once "nav_item.php";
include_once "../../header_bawah.php";

$query = mysqli_query($con, "SELECT max(no_pendaftaran) as maxKode FROM tb_pendaftaran");
$data = mysqli_fetch_array($query);
$maxKode = $data['maxKode'];

$nourut = (int) substr($maxKode, 3, 4);

$nourut++;

$char = "REG";
$kodeauto = $char . sprintf("%03s", $nourut);

$no_rm            = '';
$nik              = '';
$nama_pasien      = '';
$tempat_lahir     = '';
$tgl_lahir        = '';
$jenis_kelamin    = '';
$agama            = '';
$alamat           = '';
$no_telp          = '';
$nama_dokter      = '';
$nama_ruang       = '';
$jenis_pembayaran = '';

$id = $_GET['id'];
$sql_pendaftaran = mysqli_query($con, "SELECT * FROM tb_pendaftaran
  INNER JOIN tb_dokter ON tb_pendaftaran.id_dokter = tb_dokter.id_dokter
  INNER JOIN tb_poliklinik ON tb_pendaftaran.id_poli = tb_poliklinik.id_poli
  INNER JOIN tb_pasien ON tb_pendaftaran.no_rm = tb_pasien.no_rm
WHERE no_pendaftaran = '$id'") or die(mysqli_error($con));

$data = mysqli_fetch_assoc($sql_pendaftaran);

$no_rm            = $data['no_rm'];
$nik              = $data['nik'];
$nama_pasien      = $data['nama_pasien'];
$tempat_lahir     = $data['tempat_lahir'];
$tgl_lahir        = $data['tgl_lahir'];
$jenis_kelamin    = $data['jenis_kelamin'];
$agama            = $data['agama'];
$alamat           = $data['alamat'];
$no_telp          = $data['no_telp'];
$nama_dokter      = $data['nama_dokter'];
$nama_ruang       = $data['nama_ruang'];
$jenis_pembayaran = $data['jenis_pembayaran'];

?>

<!-- CONTAINER -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Tambah Data Pendaftaran Lama</h1>

  <div class="row">
    <div class="col-lg-12">
      <form action="proses.php" method="post">
        <input type="hidden" name="no_pendaftaran" value="<?= $id; ?>">

        <div class="form-row">
          <div class="form-group col-md-6">

            <label for="no_pendaftaran">No Pendaftaran</label>
            <input type="text" name="no_pendaftaran" id="no_pendaftaran" class="form-control" value="<?= $kodeauto; ?>" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="no_rm">NO RM</label>
            <input type="text" name="no_rm" id="no_rm" class="form-control" value="<?= $data['no_rm']; ?>" required readonly>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="tgl_pendaftaran">Tgl Pendaftaran</label>
            <input type="date" name="tgl_pendaftaran" id="tgl_pendaftaran" value="<?= date('Y-m-d'); ?>" class="form-control" required>
          </div>
          <div class="form-group col-md-6">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" placeholder="masukkan nama" value="<?= $data['nik']; ?>" required readonly>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nama_pasien">Nama Pasien</label>
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
            <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" class="form-control" required>
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
            <label for="no_telp">No Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="masukkan no telepon" value="<?= $data['no_telp']; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="nama_dokter">Nama Dokter</label>
            <select name="nama_dokter" id="nama_dokter" class="form-control">
              <?php
              $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die(mysqli_error($con));
              while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                echo '<option value="' . $data_dokter['id_dokter'] . '">' . $data_dokter['nama_dokter'] . '</option>';
              }
              ?>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nama_ruang">Nama Ruang</label>
            <select name="nama_ruang" id="nama_ruang" class="form-control">
              <?php
              $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik") or die(mysqli_error($con));
              while ($data_poli = mysqli_fetch_array($sql_poli)) {
                echo '<option value="' . $data_poli['id_poli'] . '">' . $data_poli['nama_ruang'] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="jenis_pembayaran">Jenis Pembayaran</label>
            <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control">
              <option>Pilih...</option>
              <option <?php if ($jenis_pembayaran == 'Umum') {
                        echo "selected";
                      } ?> value="Umum">Umum</option>
            </select>
          </div>
        </div>
        <button type="submit" name="add_old" class="btn btn-info">Kirim</button>
        <a href="tambah_lama.php" class="btn btn-warning">Kembali</a>
      </form>
    </div>
  </div>
</div>
<!-- END CONTAINER -->

<?php include_once "../../footer.php" ?>