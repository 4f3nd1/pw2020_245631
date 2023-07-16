<?php
session_start();
require 'functions.php';

if (isset($_SESSION['login'])) {
  header("location: index.php");
  exit;
}


//ketika tombol login ditekan
if (isset($_POST['login'])) {
  $login = login($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>

  <h3>Form Login</h3>
  <?php if (isset($login['error'])) : ?>
    <p style="color: red; font-style:italic;"><?= $login['pesan']; ?></P>
  <?php endif; ?>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Username :
          <input type="username" name="username" autofocus autocomplete="off" required>
        </label>
      <li>
        <label>
          Password :
          <input type="password" name="password" required>
        </label>
      </li>
      </li>
      <button type="submit" name="login">Login</button>
      </li>
      <li>
        <a href="registrasi.php">Tambah User Baru</a>
      </li>
    </ul>
  </form>

</body>

</html>