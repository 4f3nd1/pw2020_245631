<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("location: login.php");
  exit;
}

require 'functions.php';

//jika tidak ada id di URL
if (!isset($_GET['ID'])) {
  header("location: index.php");
  exit;
}

//ambil id dari URL
$id = $_GET['ID'];

//query mahasiswa berdasarkan id
$m = query("SELECT * FROM mahasiswa WHERE ID=$id");


//cek apakah tombol ubah sudah di tekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
    alert('data berhasil diubah');
    document.location.href='index.php';
    </script>";
  } else {
    echo "data gagal diubah";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Ubah data mahasiswa</h3>
  <form action="" method="POST">
    <input type="hidden" name="ID" value="<?= $m['ID']; ?>" <ul>
    <li>
      <label>
        Nama :
        <input type="text" name="nama" autofocus required value="<?= $m['nama']; ?>">
      </label>
    </li>
    <li>
      <label>
        NRP :
        <input type="text" name="nrp" required value="<?= $m['nrp']; ?>">
      </label>
    </li>
    <li>
      <label>
        E-Mail :
        <input type="text" name="email" required value="<?= $m['email']; ?>">
      </label>
    </li>
    <li>
      <label>
        Jurusan :
        <input type="text" name="jurusan" required value="<?= $m['jurusan']; ?>">
      </label>
    </li>
    <li>
      <label>
        Gambar :
        <input type="text" name="gambar" required value="<?= $m['gambar']; ?>">
      </label>
    </li>
    <li>
      <button type="submit" name="ubah">Ubah data!</button>
    </li>
    </ul>

  </form>
</body>

</html>