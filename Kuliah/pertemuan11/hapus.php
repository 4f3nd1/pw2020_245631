<?php

require 'functions.php';

//jika tidak ada id di URL
if (!isset($_GET['ID'])) {
  header("location: index.php");
  exit;
}

//mengambil id dari URL
$id = $_GET['ID'];

if (hapus($id) > 0) {
  echo "<script>
  alert('data berhasil dihapus');
  document.location.href='index.php';
  </script>";
} else {
  echo "data gagal dihapus";
}
