<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];
$delete_query = "DELETE FROM administrasi WHERE id = $id";
mysqli_query($conn, $delete_query);

header('Location: daftar_pasien.php');
exit();
?>
