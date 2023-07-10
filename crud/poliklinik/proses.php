<?php
require_once "../../config/config.php";
// require "../../libs/vendor/autoload.php";

// use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
    $id_poli    = trim(mysqli_real_escape_string($con, $_POST['id_poli']));
    $nama_ruang = trim(mysqli_real_escape_string($con, $_POST['nama_ruang']));
    $ket_ruang  = trim(mysqli_real_escape_string($con, $_POST['ket_ruang']));
    mysqli_query($con, "INSERT INTO tb_poliklinik (id_poli, nama_ruang, ket_ruang) VALUES ('$id_poli', '$nama_ruang', '$ket_ruang')") or die(mysqli_error($con));
    echo "<script>window.location='poliklinik.php';</script>";
    // END

} else if (isset($_POST['edit'])) {
    $id         = $_POST['id'];
    $nama_ruang = trim(mysqli_real_escape_string($con, $_POST['nama_ruang']));
    $ket_ruang  = trim(mysqli_real_escape_string($con, $_POST['ket_ruang']));
    mysqli_query($con, "UPDATE tb_poliklinik SET nama_ruang = '$nama_ruang', ket_ruang = '$ket_ruang' WHERE id_poli = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='poliklinik.php';</script>";
}

// cek apakah form telah di submit (untuk menghapus data)
if (isset($_POST["hapus"])) {
    // ambil nilai id dokter
    $id_poli = trim(mysqli_real_escape_string($con, $_POST['id_poli']));

    mysqli_query($con, "DELETE FROM tb_poliklinik WHERE id_poli = '$id_poli'") or die(mysqli_error($con));
    echo "<script>window.location='poliklinik.php';</script>";
}
