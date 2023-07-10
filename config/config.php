<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'klinik');

/* konek ke MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Cek koneksi
if ($con === false) {
    die("Koneksi dengan database gagal. " . mysqli_connect_error());
}

// 
function base_url($url = null)
{
    $base_url = "http://localhost/asdf";
    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }
}
