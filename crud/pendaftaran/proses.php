<?php
require_once "../../config/config.php";

if (isset($_POST['add'])) {
    $no_pendaftaran   = trim(mysqli_real_escape_string($con, $_POST['no_pendaftaran']));
    $no_rm            = trim(mysqli_real_escape_string($con, $_POST['no_rm']));
    $tgl_pendaftaran  = trim(mysqli_real_escape_string($con, $_POST['tgl_pendaftaran']));
    $nik              = trim(mysqli_real_escape_string($con, $_POST['nik']));
    $nama_dokter      = trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
    $nama_ruang       = trim(mysqli_real_escape_string($con, $_POST['nama_ruang']));
    $jenis_pembayaran = trim(mysqli_real_escape_string($con, $_POST['jenis_pembayaran']));

    mysqli_query($con, "INSERT INTO tb_pendaftaran (no_pendaftaran, no_rm, tgl_pendaftaran, nik, id_dokter, id_poli, jenis_pembayaran) VALUES ('$no_pendaftaran', '$no_rm', '$tgl_pendaftaran', '$nik', '$nama_dokter', '$nama_ruang', '$jenis_pembayaran')") or die(mysqli_error($con));

    $no_rm = trim(mysqli_real_escape_string($con, $_POST['no_rm']));
    $nik            = trim(mysqli_real_escape_string($con, $_POST['nik']));
    $nama_pasien    = trim(mysqli_real_escape_string($con, $_POST['nama_pasien']));
    $tempat_lahir   = trim(mysqli_real_escape_string($con, $_POST['tempat_lahir']));
    $tgl_lahir      = trim(mysqli_real_escape_string($con, $_POST['tgl_lahir']));
    $jenis_kelamin  = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $agama          = trim(mysqli_real_escape_string($con, $_POST['agama']));
    $alamat         = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp        = trim(mysqli_real_escape_string($con, $_POST['no_telp']));

    mysqli_query($con, "INSERT INTO tb_pasien (no_rm, nik, nama_pasien, tempat_lahir, tgl_lahir, jenis_kelamin, agama, alamat, no_telp) VALUES ('$no_rm', '$nik', '$nama_pasien', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$alamat', '$no_telp')") or die(mysqli_error($con));
    echo "<script>window.location='pendaftaran.php';</script>";
    // END
} else if (isset($_POST['edit'])) {
    $no_pendaftaran   = trim(mysqli_real_escape_string($con, $_POST['no_pendaftaran']));
    $no_rm            = trim(mysqli_real_escape_string($con, $_POST['no_rm']));
    $tgl_pendaftaran  = trim(mysqli_real_escape_string($con, $_POST['tgl_pendaftaran']));
    $nik              = trim(mysqli_real_escape_string($con, $_POST['nik']));
    $nama_dokter      = trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
    $nama_ruang       = trim(mysqli_real_escape_string($con, $_POST['nama_ruang']));
    $jenis_pembayaran = trim(mysqli_real_escape_string($con, $_POST['jenis_pembayaran']));

    mysqli_query($con, "UPDATE tb_pendaftaran SET no_pendaftaran = '$no_pendaftaran', no_rm = '$no_rm', tgl_pendaftaran = '$tgl_pendaftaran', nik = '$nik', id_dokter = '$nama_dokter', id_poli = '$nama_ruang', jenis_pembayaran = '$jenis_pembayaran' WHERE no_pendaftaran = '$no_pendaftaran'") or die(mysqli_error($con));

    $no_rm          = trim(mysqli_real_escape_string($con, $_POST['no_rm']));
    $nama_pasien    = trim(mysqli_real_escape_string($con, $_POST['nama_pasien']));
    $tempat_lahir   = trim(mysqli_real_escape_string($con, $_POST['tempat_lahir']));
    $tgl_lahir      = trim(mysqli_real_escape_string($con, $_POST['tgl_lahir']));
    $jenis_kelamin  = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $agama          = trim(mysqli_real_escape_string($con, $_POST['agama']));
    $alamat         = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp        = trim(mysqli_real_escape_string($con, $_POST['no_telp']));

    mysqli_query($con, "UPDATE tb_pasien SET no_rm = '$no_rm', nama_pasien = '$nama_pasien', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', alamat = '$alamat', no_telp = '$no_telp' WHERE no_rm = '$no_rm'") or die(mysqli_error($con));
    echo "<script>window.location='pendaftaran.php';</script>";
}

// cek apakah form telah di submit (untuk menghapus data)
if (isset($_POST["hapus"])) {
    // ambil nilai id dokter
    $no_pendaftaran = trim(mysqli_real_escape_string($con, $_POST['no_pendaftaran']));
    $no_rm = trim(mysqli_real_escape_string($con, $_POST['no_rm']));

    mysqli_query($con, "DELETE FROM tb_pendaftaran
    WHERE no_pendaftaran = '$no_pendaftaran'") or die(mysqli_error($con));
    mysqli_query($con, "DELETE FROM tb_pasien
    WHERE no_rm = '$no_rm'") or die(mysqli_error($con));
    echo "<script>window.location='pendaftaran.php';</script>";
}

if (isset($_POST['add_old'])) {
    $no_pendaftaran   = trim(mysqli_real_escape_string($con, $_POST['no_pendaftaran']));
    $no_rm            = trim(mysqli_real_escape_string($con, $_POST['no_rm']));
    $tgl_pendaftaran  = trim(mysqli_real_escape_string($con, $_POST['tgl_pendaftaran']));
    $nik              = trim(mysqli_real_escape_string($con, $_POST['nik']));
    $nama_dokter      = trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
    $nama_ruang       = trim(mysqli_real_escape_string($con, $_POST['nama_ruang']));
    $jenis_pembayaran = trim(mysqli_real_escape_string($con, $_POST['jenis_pembayaran']));

    mysqli_query($con, "INSERT INTO tb_pendaftaran (no_pendaftaran, no_rm, tgl_pendaftaran, nik, id_dokter, id_poli, jenis_pembayaran) VALUES ('$no_pendaftaran', '$no_rm', '$tgl_pendaftaran', '$nik', '$nama_dokter', '$nama_ruang', '$jenis_pembayaran')") or die(mysqli_error($con));

    $no_rm          = trim(mysqli_real_escape_string($con, $_POST['no_rm']));
    $nik            = trim(mysqli_real_escape_string($con, $_POST['nik']));
    $nama_pasien    = trim(mysqli_real_escape_string($con, $_POST['nama_pasien']));
    $tempat_lahir   = trim(mysqli_real_escape_string($con, $_POST['tempat_lahir']));
    $tgl_lahir      = trim(mysqli_real_escape_string($con, $_POST['tgl_lahir']));
    $jenis_kelamin  = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $agama          = trim(mysqli_real_escape_string($con, $_POST['agama']));
    $alamat         = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp        = trim(mysqli_real_escape_string($con, $_POST['no_telp']));

    mysqli_query($con, "INSERT INTO tb_pasien (no_rm, nik, nama_pasien, tempat_lahir, tgl_lahir, jenis_kelamin, agama, alamat, no_telp) VALUES ('$no_rm', '$nik', '$nama_pasien', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$alamat', '$no_telp')") or die(mysqli_error($con));
    echo "<script>window.location='pendaftaran.php';</script>";
    // END
}
