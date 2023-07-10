<?php
require_once "../config/config.php";

session_start();

// hapus session login
unset($_SESSION['nama']);
echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
