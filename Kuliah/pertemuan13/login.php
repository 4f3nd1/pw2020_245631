<?php
session_start();

if (isset($_SESSION['login'])) {
  header("location: index.php");
  exit;
}

require 'functions.php';

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
    <p><?= $login['pesan']; ?></P>
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
    </ul>
  </form>

</body>

</html>