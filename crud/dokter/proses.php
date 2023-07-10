<?php
require_once "../../config/config.php";
// require "../../libs/vendor/autoload.php";

// use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

// echo Uuid::uuid4()->toString();

if (isset($_POST['add'])) {
  $id_dokter     = trim(mysqli_real_escape_string($con, $_POST['id_dokter']));
  $nama_dokter   = trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
  $spesialis     = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
  $jenis_kelamin = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
  $alamat        = trim(mysqli_real_escape_string($con, $_POST['alamat']));
  $no_telp       = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
  mysqli_query($con, "INSERT INTO tb_dokter (id_dokter, nama_dokter, spesialis, jenis_kelamin, alamat, no_telp) VALUES ('$id_dokter', '$nama_dokter', '$spesialis', '$jenis_kelamin', '$alamat', '$no_telp')") or die(mysqli_error($con));
  echo "<script>window.location='dokter.php';</script>";
  // END
} else if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $nama_dokter   = trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
  $spesialis     = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
  $jenis_kelamin = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
  $alamat        = trim(mysqli_real_escape_string($con, $_POST['alamat']));
  $no_telp       = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
  mysqli_query($con, "UPDATE tb_dokter SET nama_dokter = '$nama_dokter', spesialis = '$spesialis', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', no_telp = '$no_telp' WHERE id_dokter = '$id'") or die(mysqli_error($con));
  echo "<script>window.location='dokter.php';</script>";
}

// cek apakah form telah di submit (untuk menghapus data)
if (isset($_POST["hapus"])) {
  // ambil nilai id dokter
  $id_dokter = trim(mysqli_real_escape_string($con, $_POST['id_dokter']));

  mysqli_query($con, "DELETE FROM tb_dokter WHERE id_dokter = '$id_dokter'") or die(mysqli_error($con));
  echo "<script>window.location='dokter.php';</script>";
}
