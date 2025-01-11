<?php
session_start();
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namalengkap = $_POST['namalengkap'];
    $norekammedis = $_POST['norekammedis'];
    $tgl = $_POST['tgl'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $bayar = $_POST['bayar'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO administrasi (namalengkap, norekammedis, tgl, alamat, umur, jk, agama, bayar, kelas)
             VALUES ('$namalengkap', '$norekammedis', '$tgl', '$alamat', '$umur', '$jk', '$agama', '$bayar', '$kelas')";

    if (mysqli_query($conn, $sql)) {
        header('Location: daftar_pasien.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
