<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw_2020245631');
}

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  //jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $type_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  //ketika tidak aga gambar yg dipilih
  if ($error == 4) {
    echo "<script>
  alert('pilih gambar dulu');
</script>";
    return false;
  }

  //cek extensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
  alert('yang anda pilih bukan gambar!');
</script>";
    return false;
  }

  //cek type file
  if ($type_file != 'image/jpeg' && $type_file != 'image/png' && $type_file = 'image/jpg') {
    echo "<script>
  alert('yang anda pilih bukan gambar!');
</script>";
    return false;
  }

  //cek ukuran file
  //maks 5mb = 5000000
  if ($ukuran_file > 500000) {
    echo "<script>
  alert('ukuran gambar terlalu besar!');
</script>";
    return false;
  }

  //lolos pengecekan
  //siap upload
  //generate na file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);
  return $nama_file_baru;
}

function tambah($data)
{
  $conn = koneksi();
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  // $gambar = htmlspecialchars($data['gambar']);

  //upload gambar
  $gambar = upload();

  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO mahasiswa VALUES(null, '$nama','$nrp','$email','$jurusan','$gambar');";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE ID = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();
  $id = $data['ID'];
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE mahasiswa SET 
  nama = '$nama',
   nrp= '$nrp', 
   email= '$email',
   jurusan = '$jurusan',
   gambar ='$gambar' 
   WHERE ID=$id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();
  $query = "SELECT * FROM mahasiswa
          WHERE 
          nama LIKE '%$keyword%' OR
          jurusan LIKE '%$keyword%' OR
          nrp LIKE '%$keyword%'
          ";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);


  if (query("SELECT * FROM user WHERE username= '$username' && password = '$password'")) {
    //set session
    $_SESSION['login'] = true;

    header("location:index.php");
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'Username / Password salah!'
    ];
  }
}
