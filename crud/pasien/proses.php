<?php
require_once "../../config/config.php";

if (isset($_POST['add'])) {
    $no_rm = trim(mysqli_real_escape_string($con, $_POST['no_rm']));
    $nik            = trim(mysqli_real_escape_string($con, $_POST['nik']));
    $nama_pasien    = trim(mysqli_real_escape_string($con, $_POST['nama_pasien']));
    $tempat_lahir   = trim(mysqli_real_escape_string($con, $_POST['tempat_lahir']));
    $tgl_lahir      = trim(mysqli_real_escape_string($con, $_POST['tgl_lahir']));
    $jenis_kelamin  = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $agama          = trim(mysqli_real_escape_string($con, $_POST['agama']));
    $alamat         = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp        = trim(mysqli_real_escape_string($con, $_POST['no_telp']));

    $cek_no_rm = mysqli_query($con, "SELECT * FROM tb_pasien WHERE no_rm = '$no_rm'") or die(mysqli_error($con));

    if (mysqli_num_rows($cek_no_rm) > 0) {
        echo "<script>alert('Nomor ID rekam medis sudah ada'); window.location='tambah.php';</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_pasien (no_rm, nik, nama_pasien, tempat_lahir, tgl_lahir, jenis_kelamin, agama, alamat, no_telp) VALUES ('$no_rm', '$nik', '$nama_pasien', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$alamat', '$no_telp')") or die(mysqli_error($con));
        echo "<script>window.location='pasien.php';</script>";
    }
    // END

} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nik            = trim(mysqli_real_escape_string($con, $_POST['nik']));
    $nama_pasien    = trim(mysqli_real_escape_string($con, $_POST['nama_pasien']));
    $tempat_lahir   = trim(mysqli_real_escape_string($con, $_POST['tempat_lahir']));
    $tgl_lahir      = trim(mysqli_real_escape_string($con, $_POST['tgl_lahir']));
    $jenis_kelamin  = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $agama          = trim(mysqli_real_escape_string($con, $_POST['agama']));
    $alamat         = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp        = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    mysqli_query($con, "UPDATE tb_pasien SET nik = '$nik', nama_pasien = '$nama_pasien', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', alamat = '$alamat', no_telp = '$no_telp' WHERE no_rm = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='pasien.php';</script>";
}

// cek apakah form telah di submit (untuk menghapus data)
if (isset($_POST["hapus"])) {
    // ambil nilai id dokter
    $no_rm = htmlentities(strip_tags(trim($_POST["no_rm"])));

    mysqli_query($con, "DELETE FROM tb_pasien WHERE no_rm = '$no_rm'") or die(mysqli_error($con));
    echo "<script>window.location='pasien.php';</script>";
}
