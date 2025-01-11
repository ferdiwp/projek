<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Administrasi</title>
  <link rel="stylesheet" href="./Css/style_pasien.css">
</head>
<body>
  <div class="wrapper">
    <div class="title"><span>Administrasi Pasien</span></div>
    <form action="proses_pendaftaran.php" method="POST">
      <div class="row">
        <label for="namalengkap">Nama Lengkap:</label>
        <input type="text" name="namalengkap" id="namalengkap" required>
      </div>
      <div class="row">
        <label for="norekammedis">No Rekam Medis:</label>
        <input type="text" name="norekammedis" id="norekammedis" required>
      </div>
      <div class="row">
        <label for="tgl">Tanggal:</label>
        <input type="date" name="tgl" id="tgl" required>
      </div>
      <div class="row">
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" required>
      </div>
      <div class="row">
        <label for="umur">Umur:</label>
        <input type="number" name="umur" id="umur" required>
      </div>
      <div class="row">
        <label for="jk">Jenis Kelamin:</label>
        <select name="jk" id="jk" required>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="row">
        <label for="agama">Agama:</label>
        <input type="text" name="agama" id="agama" required>
      </div>
      <div class="row">
        <label for="bayar">Cara Bayar:</label>
        <select name="kelas" id="kelas" required>
            <option value="bpjs">BPJS</option>
            <option value="kis">KIS</option>
            <option value="mandiri">MANDIRI</option>
        </select>
      </div>
      <div class="row">
        <label for="kelas">Kelas:</label>
        <select name="kelas" id="kelas" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="vip">VIP</option>
        </select>
      </div>
      <div class="row button">
        <input type="submit" value="Daftar">
      </div>
      <a href="index.php" class="kembali">Kembali</a>
    </form>
  </div>
</body>
</html>
