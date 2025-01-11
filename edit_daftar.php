<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM administrasi WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_rekam_medis = $_POST['no_rekam_medis'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $cara_bayar = $_POST['cara_bayar'];
    $kelas = $_POST['kelas'];

    $update_query = "UPDATE administrasi SET 
                      namalengkap = '$nama_lengkap', 
                      norekammedis = '$no_rekam_medis', 
                      tgl = '$tanggal', 
                      alamat = '$alamat', 
                      umur = '$umur', 
                      jk = '$jenis_kelamin', 
                      agama = '$agama', 
                      bayar = '$cara_bayar', 
                      kelas = '$kelas' 
                    WHERE id = $id";
    mysqli_query($conn, $update_query);

    header('Location: daftar_pasien.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pasien</title>
    <link rel="stylesheet" href="./Css/style_edit.css"> 
</head>
<body>
    <div class="container">
        <h2>Edit Data Pasien</h2>
        <form method="POST">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row['namalengkap']; ?>" required>
            
            <label for="no_rekam_medis">No Rekam Medis</label>
            <input type="text" id="no_rekam_medis" name="no_rekam_medis" value="<?php echo $row['norekammedis']; ?>" required>
            
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" value="<?php echo $row['tgl']; ?>" required>
            
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required>
            
            <label for="umur">Umur</label>
            <input type="text" id="umur" name="umur" value="<?php echo $row['umur']; ?>" required>
                        
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" value="<?php echo $row['jk']; ?>" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label for="agama">Agama</label>
            <input type="text" id="agama" name="agama" value="<?php echo $row['agama']; ?>" required>
                                
            <label for="bayar">Cara Bayar:</label>
            <select name="kelas" id="kelas" value="<?php echo $row['bayar']; ?>" required>
                <option value="bpjs">BPJS</option>
                <option value="kis">KIS</option>
                <option value="mandiri">MANDIRI</option>
            </select>

            <label for="kelas">Kelas:</label>
            <select name="kelas" id="kelas" value="<?php echo $row['kelas']; ?>" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="vip">VIP</option>
            </select>

            <button type="submit">Update</button>
            <a href="daftar_pasien.php" class="kembali">Kembali</a> 
        </form>
    </div>
</body>
</html>
