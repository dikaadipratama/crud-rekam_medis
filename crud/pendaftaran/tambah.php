<?php
include_once "../../header_atas.php";
include_once "nav_item.php";
include_once "../../header_bawah.php";

?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Tambah Data Pendaftaran</h1>

  <div class="row">
    <div class="col-lg-12">
      <form action="proses.php" method="post">

        <div class="form-row">
          <div class="form-group col-md-6">
            <?php
            $query = mysqli_query($con, "SELECT max(no_pendaftaran) as maxKode FROM tb_pendaftaran");
            $data = mysqli_fetch_array($query);
            $maxKode = $data['maxKode'];

            $nourut = (int) substr($maxKode, 3, 4);

            $nourut++;

            $char = "REG";
            $kodeauto = $char . sprintf("%03s", $nourut);
            ?>

            <label for="no_pendaftaran">No Pendaftaran</label>
            <input type="text" name="no_pendaftaran" id="no_pendaftaran" class="form-control" value="<?= $kodeauto; ?>" readonly>
          </div>
          <div class="form-group col-md-6">
            <?php
            $query = mysqli_query($con, "SELECT max(no_rm) as maxKode FROM tb_pasien");
            $data = mysqli_fetch_array($query);
            $maxKode = $data['maxKode'];

            $nourut = (int) substr($maxKode, 3, 4);

            $nourut++;

            $char = "010";
            $kodeauto = $char . sprintf("%03s", $nourut);
            ?>

            <label for="no_rm">No Rekam Medis</label>
            <input type="text" name="no_rm" id="no_rm" class="form-control" value="<?= $kodeauto; ?>" readonly>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="tgl_pendaftaran">Tanggal Pendaftaran</label>
            <input type="date" name="tgl_pendaftaran" id="tgl_pendaftaran" class="form-control" placeholder="masukkan nama" value="<?= date('Y-m-d'); ?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" placeholder="masukkan nik" required autofocus>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nama_pasien">Nama Pasien</label>
            <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="masukkan nama" required>
          </div>
          <div class="form-group col-md-6">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="masukkan tempat lahir" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= date('Y-m-d'); ?>" class="form-control" required>
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
            <label for="agama">Agama</label>
            <select name="agama" id="agama" class="form-control">
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Budha">Budha</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="masukkan alamat" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="no_telp">No Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="masukkan no telepon" required>
          </div>
          <div class="form-group col-md-6">
            <label for="nama_dokter">Nama Dokter</label>
            <select name="nama_dokter" id="nama_dokter" class="form-control">
              <?php
              // $query = "SELECT * FROM tb_dokter";
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
              <option value="Umum">Umum</option>
            </select>
          </div>
        </div>

        <button type="submit" name="add" class="btn btn-info">Kirim</button>
        <a href="pendaftaran.php" class="btn btn-warning">Kembali</a>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php include_once "../../footer.php" ?>