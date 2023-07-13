<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("location: login.php");
  exit;
}

require 'functions.php';

//ambil id dari URL
$id = $_GET['ID'];

//query mahasiswa berdasarkan id
$m = query("SELECT * FROM mahasiswa WHERE ID = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>Detail Mahasiswa</h3>
  <ul>
    <li><img src="img/<?= $m['gambar']; ?>" width="85"></li>
    <li>NRP : <?= $m['nrp']; ?></li>
    <li>Nama : <?= $m['nama']; ?></li>
    <li>Email : <?= $m['email']; ?></li>
    <li>Jurusan : <?= $m['jurusan']; ?></li>
    <li><a href="ubah.php?ID=<?= $m['ID']; ?>">ubah</a> | <a href="hapus.php?ID=<?= $m['ID']; ?>" onclick="return confirm('apakah anda yakin?');">hapus</a></li>
    <li><a href="index.php">Kembali ke halaman utama</li>
</body>

</html>