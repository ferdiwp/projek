<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
require 'koneksi.php'; 
$query = "SELECT * FROM administrasi"; 
$result = mysqli_query($conn, $query); 
$total_data = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administrasi Rumah Sakit Bhakti Husada</title>
  <link rel="stylesheet" href="./Css/style_sidebar.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
  <section class="sidebar">
    <div class="nav-header">
      <p class="logo">Bhakti Husada</p>
      <i class="bx bx-menu-alt-right btn-menu"></i>
    </div>
    <ul class="nav-links">
    <li> 
      <a href="index.php"> 
        <i class="bx bx-home"></i> 
        <span class="title">Home</span> 
        </a> 
      <span class="tooltip">Home</span>
      <li>
        <a href="pendaftaran_pasien.php">
          <i class="bx bx-file"></i>
          <span class="title">Pendaftaran Pasien</span>
         </a>
        <span class="tooltip">Pendaftaran Pasien</span>
      </li>
      <li>
         <a href="daftar_pasien.php">
             <i class="bx bx-list-ul"></i>
             <span class="title">Daftar Data Pasien</span>
           </a>
        <span class="tooltip">Daftar Data Pasien</span>
      </li>
      <li>
        <a href="logout.php">
          <i class="bx bx-log-out"></i>
          <span class="title">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
      </li>
    </ul>
  </section>
  <section class="home">
    <p>Administrasi Rumah Sakit Bhakti Husada</p><br>
    <p class="total-data">Total Data Pasien: <?php echo $total_data; ?></p>
  </section>
  
 
  <script>
    const btn_menu = document.querySelector(".btn-menu");
    const side_bar = document.querySelector(".sidebar");
5
    btn_menu.addEventListener("click", function () {
      side_bar.classList.toggle("expand");
      changebtn();
    });

    function changebtn() {
      if (side_bar.classList.contains("expand")) {
        btn_menu.classList.replace("bx-menu", "bx-menu-alt-right");
      } else {
        btn_menu.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    }
  </script>
</body>
</html>
