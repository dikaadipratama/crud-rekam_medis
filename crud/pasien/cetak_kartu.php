<?php
require '../../vendor/autoload.php';
require_once "../../config/config.php";

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new DOMPDF();

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

$html = '
<style>
table, th, td {
  border-collapse: collapse;
  padding:5px;
}
.section {
  background-color: #d0e9d6;
  padding:25px;
}
.container-table {
  border: 2px solid black;
  background-color: #d0e9d6;
}
.teksAtas {
text-align: center;
font-size: 20px;
text-transform: uppercase;
font-weight: 800;
padding: 10px;
font-family: "Open Sans",
}
.container-judul {
  margin-top:4px;
  margin-bottom:10px;
  background-color: #0f857f;
}
.judul {
text-align: center;
font-size: 36px;
text-transform: uppercase;
font-weight: 800;
padding: 10px;
color: white;
}
.dataKartu {
font-size: 18px;
text-transform: uppercase;
font-weight: 800;
}
.container-footer {
  border: 2px solid black;
  margin-top:10px;
  background-color: #d0e9d6;
}
.col {
  width: 50%;
  padding: 10px;
}
.row:after {
  content: "";
  clear: both;
}
.teksFoot1 {
  font-size: 20px;
  text-transform: uppercase;
  font-weight: 800;
  font-family: "Open Sans",
  margin-left:50px;
}
.teksFoot {
  font-size: 20px;
  text-transform: uppercase;
  font-weight: 800;
  padding: 10px;
  font-family: "Open Sans",
}
.mg-tbl {
margin-right:-80px;
}
</style>

<div class="section">
  <div class="container-table">
    <div class="teksAtas">Klinik Pratama Rahmat Sehat</div>
    <div class="teksAtas">Gedongan, Kec. Baki, Kab. Sukoharjo</div>
    <div class="teksAtas">Telp. 0895-1818-1864</div>
  </div>

  <div class="container-judul">
    <div class="judul">Kartu Berobat</div>
  </div>

  <table width="80%" align="center" border="0" class="mg-tbl">
    <tr>
        <td width="24%" class="dataKartu">No</td>
        <td width="1%" class="dataKartu">:</td>
        <td width="55%" class="dataKartu">' . $id . '</td>
    </tr>
    <tr>
        <td class="dataKartu">Nama</td>
        <td class="dataKartu">:</td>
        <td class="dataKartu">' . $data['nama_pasien'] . '</td>
    </tr>
    <tr>
        <td class="dataKartu">Tempat Lahir</td>
        <td class="dataKartu">:</td>
        <td class="dataKartu">' . $data['tempat_lahir'] . '</td>
    </tr>
    <tr>
        <td class="dataKartu">Tanggal Lahir</td>
        <td class="dataKartu">:</td>
        <td class="dataKartu">' . $data['tgl_lahir'] . '</td>
    </tr>
    <tr>
        <td class="dataKartu">Jenis Kelamin</td>
        <td class="dataKartu">:</td>
        <td class="dataKartu">' . $data['jenis_kelamin'] . '</td>
    </tr>
    <tr>
        <td class="dataKartu">Alamat</td>
        <td class="dataKartu">:</td>
        <td class="dataKartu">' . $data['alamat'] . '</td>
    </tr>
  </table>

  <div class="container-footer">
    <div class="row">
      <div class="col">
        <div class="teksFoot1">Perhatian :</div>
      </div>
      <div class="col">
        <div class="teksFoot">- Kartu ini tidak boleh hilang</div>
        <div class="teksFoot">- Setiap berobat kartu harus dibawa</div>
      </div>
    </div>
  </div>
</div>
';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("kartuPasien.pdf", array("Attachment" => 0));
