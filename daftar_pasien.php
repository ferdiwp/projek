<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
require 'koneksi.php';

$query = "SELECT * FROM administrasi";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pasien Administrasi</title>
    <link rel="stylesheet" href="./Css/style_daftar.css">
</head>
<body>
    <div class="wrapper">
        <div class="title"><span>Daftar Data Administrasi</span></div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>No Rekam Medis</th>
                    <th>Tanggal</th>
                    <th>Alamat</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Cara Bayar</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['namalengkap']}</td>
                                <td>{$row['norekammedis']}</td>
                                <td>{$row['tgl']}</td>
                                <td>{$row['alamat']}</td>
                                <td>{$row['umur']}</td>
                                <td>{$row['jk']}</td>
                                <td>{$row['agama']}</td>
                                <td>{$row['bayar']}</td>
                                <td>{$row['kelas']}</td>
                                <td>
                                    <a href='edit_daftar.php?id={$row['id']}'>Edit</a> |
                                    <a href='delete_pasien.php?id={$row['id']}'>Delete</a>
                                </td> <!-- Tambahkan tombol Edit dan Delete -->
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="back-button">Kembali</a>
    </div>
</body>
</html>
