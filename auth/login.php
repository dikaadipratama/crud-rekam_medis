<?php
require_once "../config/config.php";

session_start();

if (isset($_SESSION['nama'])) {
  echo "<script>window.location='" . base_url() . "';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/util.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/login.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/sb-admin-2.css'); ?>" />
</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-form-title" style="background-image: url(../img/login.jpg)">
          <span class="login100-form-title-1"> Login </span>
        </div>

        <?php
        if (isset($_POST['login'])) {
          $username = trim(mysqli_real_escape_string($con, $_POST['user']));
          $password = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
          // cek autentikasi login
          $sql_login = mysqli_query($con, "SELECT * FROM tb_admin WHERE username='$username' AND password ='$password'") or die(mysqli_error($con));
          // echo mysqli_num_rows($sql_login);
          // jika berhasil jalankan fungsi dibawah ini
          if (mysqli_num_rows($sql_login) > 0) {
            $_SESSION['nama'] = $username;
            echo "<script>window.location='" . base_url('') . "';</script>";
          } else { ?>
            <div class="row justify-content-center mt-4 ">
              <div class="col-lg-6 col-lg-offset-3">
                <div class="alert alert-danger alert-dismissable mb-0" role="alert">
                  <a href="login.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <strong>LOGIN GAGAL!</strong> username dan password salah!
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>
        <!-- form -->
        <form action="" class="login100-form validate-form" method="POST">

          <!-- username -->
          <div class="wrap-input100 validate-input m-b-26">
            <label for="username" class="label-input100">Username :</label>
            <input class="input100" type="text" name="user" placeholder="Enter username" required autofocus />
            <span class="focus-input100"></span>
          </div>

          <!-- password -->
          <div class="wrap-input100 validate-input m-b-26">
            <label for="password" class="label-input100">Password : </label>
            <input class="input100" type="password" name="pass" id="password" placeholder="Enter password" required />
            <span class="focus-input100"></span>
            <div id="toggle" onclick="showHide();"></div>
          </div>

          <div class="mb-2"></div>

          <!-- tombol login -->
          <div class="container-login100-form-btn">
            <input type="submit" name="login" class="login100-form-btn" value="Login">
          </div>
        </form>
        <!-- end form -->
      </div>
    </div>
  </div>

  <!-- menampilkan dan menyembunyikan password -->
  <script type="text/javascript">
    const password = document.getElementById("password");
    const toggle = document.getElementById("toggle");

    function showHide() {
      if (password.type === "password") {
        password.setAttribute("type", "text");
        toggle.classList.add("hide");
      } else {
        password.setAttribute("type", "password");
        toggle.classList.remove("hide");
      }
    }
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.js"></script>
</body>

</html>