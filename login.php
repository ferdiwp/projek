<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //cari di database
    $cekdatabase = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    //hitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);

    if ($hitung > 0) {
        $_SESSION['login'] = 'True';
        header('Location: index.php');
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="in">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administrasi Rumah Sakit</title>
  <link rel="stylesheet" href="./Css/style_login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
  <div class="wrapper">
    <div class="title"><span>Login Bhakti Husada</span></div>
    <form method="POST">
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" name="username" placeholder="Username" />
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" />
      </div>
      <div class="row button">
        <input type="submit" name="login" value="Login" />
      </div>
      <?php if (isset($error)) { ?>
        <div class="peringatan" role="alert">
            <?= $error; ?>
        </div>
    <?php } ?>
    </form>
  </div>
</body>
</html>
