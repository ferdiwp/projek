<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "rumahsakit");

// Cek koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
