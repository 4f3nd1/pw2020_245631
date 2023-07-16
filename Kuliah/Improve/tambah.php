<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal ditambahkan!";
  }
}

?>
<!DOCTYPE html>
<html lang="en" style="background-color:#f8f8f8">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
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
        dismissible: true,
        display: 'push',
        position: 'left',
        toggle: true,
        overlay: true
      });
    });
  </script>

</head>

<body style="background-color:#f8f8f8">

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
  <br><br><br><br>
  <div id="wb_contact" style="background-color:#f8f8f8">
    <div id="contact">
      <div class="row">
        <div class="col-1">
          <div id="wb_Text2">
            <span style="color:#000000;font-family:Arial;font-size:24px;"><strong>Form Tambah Data Mahasiswa<br></strong></span><span style="color:#000000;font-family:Arial;font-size:17px;"><em>Silahkan isi dengan benar.</em></span>
          </div>
          <form action="" method="POST" enctype="multipart/form-data">
            <div id="wb_LayoutGrid4">
              <div id="LayoutGrid4">
                <div class="row">
                  <div class="col-1">
                    <input type="text" id="nama" style="display:block;width: 100%;height:38px;z-index:3;" name="nama" value="" spellcheck="false" placeholder="Nama" autofocus required>
                    <input type="text" id="nrp" style="display:block;width: 100%;height:38px;z-index:4;" name="nrp" value="" spellcheck="false" placeholder="NRP" required>
                    <input type="text" id="email" style="display:block;width: 100%;height:38px;z-index:5;" name="email" value="" spellcheck="false" placeholder="E-mail" required>
                    <input type="text" id="jurusan" style="display:block;width: 100%;height:38px;z-index:6;" name="jurusan" value="" spellcheck="false" placeholder="Jurusan" required>
                  </div>
                  <div class="col-2">
                    <div id="FileUpload1" class="input-group" style="display:table;width: 0%;height:26px;z-index:7;">
                      <label>
                        <input type="file" name="gambar" class="gambar" style="color: gray" onchange="previewImage()">
                      </label>
                    </div>
                    <div id="gambar1" style="display:inline-block;width:100%;height:auto;z-index:8;" class="gambar1">
                      <img src="img/nophoto.png" width="120" style="display: block;" class="img-preview">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input type="submit" id="tambah" name="tambah" value="TAMBAH DATA" style="display:inline-block;width:140px;height:43px;z-index:11;font-weight:bold">
        </div>
      </div>
      <p></p>
    </div>
  </div>
  </form>
  <script src="js/script.js"></script>
  <!-- <center>
    <h3>Form Tambah Data Mahasiswa</h3>
    <form action="" method="POST" enctype="multipart/form-data">
      <ul>
        <li>
          <label>
            Nama :
            <input type="text" name="nama" autofocus required>
          </label>
        </li>
        <li>
          <label>
            NRP :
            <input type="text" name="nrp" required>
          </label>
        </li>
        <li>
          <label>
            Email :
            <input type="text" name="email" required>
          </label>
        </li>
        <li>
          <label>
            Jurusan :
            <input type="text" name="jurusan" required>
          </label>
        </li>
        <li>
          <label>
            Gambar :
            <input type="file" name="gambar" class="gambar" onchange="previewImage()">
          </label>
          <img src="img/nophoto.png" width="120" style="display: block;" class="img-preview">
        </li>
        <li>
          <button type="submit" name="tambah">Tambah Data!</button>
        </li>
      </ul>
    </form>

    <script src="js/script.js"></script> -->
  </center>
</body>

</html>