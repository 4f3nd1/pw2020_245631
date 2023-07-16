<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <meta name="generator" content="">
  <link href="font-awesome.min.css" rel="stylesheet">
  <link href="Untitled2.css" rel="stylesheet">
  <link href="index.css" rel="stylesheet">
  <script src="jquery-3.7.0.min.js"></script>
  <script src="wb.panel.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#PanelMenu1").panel({
        animate: true,
        animationDuration: 200,
        animationEasing: 'linear',
        dismissible: false,
        display: 'push',
        position: 'left',
        toggle: true,
        overlay: true
      });
      $("a[href*='#contact']").click(function(event) {
        event.preventDefault();
        $('html, body').stop().animate({
          scrollTop: $('#wb_contact').offset().top
        }, 600, 'linear');
      });
      $("#FileUpload1 :file").on('change', function() {
        var input = $(this).parents('.input-group').find(':text');
        input.val($(this).val());
      });
    });
  </script>
</head>

<body>

  <div id="wb_PageHeader">
    <div id="PageHeader">
      <div class="row">
        <div class="col-1">
          <div id="wb_PanelMenu1" style="display:inline-block;width:63px;height:70px;z-index:0;">
            <a href="#PanelMenu1_markup" id="PanelMenu1">&nbsp;</a>
            <div id="PanelMenu1_markup">
              <ul role="menu">
                <li role="menuitem"><a href="index.php" class="nav-link PanelMenu1-effect"><i class="fa fa-home fa-fw"></i><span>Home</span></a></li>
                <li role="menuitem"><a href="tambah.php" class="nav-link PanelMenu1-effect"><i class="fa fa-user-plus fa-fw"></i><span>Tambah Data MHS</span></a></li>
                <li role="menuitem"><a href="#" class="nav-link PanelMenu1-effect"><i class="fa fa-camera fa-fw"></i><span>Gallery</span></a></li>
                <li role="menuitem"><a href="#" class="nav-link PanelMenu1-effect"><i class="fa fa-pencil fa-fw"></i><span>Blog</span></a></li>
                <li role="menuitem"><a href="#" class="nav-link PanelMenu1-effect"><i class="fa fa-link fa-fw"></i><span>Links</span></a></li>
              </ul>
            </div>

          </div>
        </div>
        <div class="col-2">
          <div id="wb_Heading1" style="display:inline-block;width:100%;opacity:0.80;z-index:1;">
            <h2 id="Heading1">SELAMAT DATANG</h2>
          </div>
        </div>
        <div class="col-3">
          <div id="wb_FontAwesomeIcon1" style="display:inline-block;width:40px;height:40px;text-align:center;z-index:2;">
            <a href="./index.html#the_end">
              <div id="FontAwesomeIcon1"><i class="fa fa-user-circle-o"></i></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <center>
    <a href="logout.php">Logout</a>
    <p>
    <h3>Daftar Mahasiswa</h3>
    </p>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="POST">
      <input type="text" name="keyword" size="40" placeholder="masukkan keyword pencarian.." autocomplete="off" autofocus class="keyword">
      <button type="submit" name="cari" class="tombol-cari">Cari!</button>
    </form>
    <br>

    <div class="container">

      <table border="1" cellpadding="10" cellspacing="0">
        <tr>
          <th>#</th>
          <th>Gambar</th>
          <th>Nama</th>
          <th>Aksi</th>
        </tr>

        <?php if (empty($mahasiswa)) : ?>
          <tr>
            <td colspan="4">
              <p style="color: red; font-style: italic;">data mahasiswa tidak ditemukan!</p>
            </td>
          </tr>
        <?php endif; ?>

        <?php $i = 1;
        foreach ($mahasiswa as $m) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><img src="img/<?= $m['gambar']; ?>" width="60" height="60"></td>
            <td><?= $m['nama']; ?></td>
            <td>
              <a href="detail.php?ID=<?= $m['ID']; ?>">lihat detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
  </center>
  </div>

  <script src="js/script.js"></script>
</body>

</html>