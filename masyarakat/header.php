<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>KUESIONER SURVEY KEPUASAN MASYARAKAT</title>
  <?php
  // Memeriksa jika halaman index.php diakses
    if (basename($_SERVER['PHP_SELF']) == 'index.php') { ?>
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugin/datatables/css/dataTables.min.css">
      <link rel="stylesheet" href="assets/plugin/datatables/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="assets/plugin/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/depan.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <?php  
    }else{ ?>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/plugin/datatables/css/dataTables.min.css">
        <link rel="stylesheet" href="../assets/plugin/datatables/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../assets/plugin/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/depan.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <?php  
    }
  ?>
 

  <?php
  // Memeriksa jika halaman index.php diakses
    if (basename($_SERVER['PHP_SELF']) == 'index.php') {
      // Menyertakan file koneksi
      include 'koneksi/koneksi.php';

      // Memulai sesi
    }else{
      include '../koneksi/koneksi.php';

    }

    session_start();
  ?>
</head>

<body>
<style>
  .navbar-brand img {
      width: 200px;
  }
  .navbar-brand {
  float: left;
  margin: 10px 0 0;
  font-size: 18px;
  line-height: 20px;
  -webkit-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
}
img {
  vertical-align: middle;
}
.container {
  position: relative;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
  .container {
    max-width: 1217px;
  }

  .bg-yolo {
  background-color: #51bbc6 !important;
  }
  body{
    /* background-image: url('./gambar/background.jpg'); */
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
  }
  
</style>
  <nav class="navbar navbar-expand-lg navbar-dark bg-yolo border-bottom">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="./gambar/sistem/logo.png" alt="">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <?php 
       if (basename($_SERVER['PHP_SELF']) == 'index.php') { ?>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active mr-3">
                <a class="nav-link" href="./index.php"><i class="fa fa-home"></i> HOME <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active mr-3">
                <a class="nav-link" href="./masyarakat/petugas.php"><i class="fa fa-pencil"></i> SURVEY</a>
              </li>
              <li class="nav-item active">
                <a class="btn btn-light px-4" href="./login/login.php"><i class="fa fa-lock"></i> LOGIN ADMIN</a>
              </li>
            </ul>
          </div>
        <?php }else { ?>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active mr-3">
                <a class="nav-link" href="../index.php"><i class="fa fa-home"></i> HOME <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active mr-3">
                <a class="nav-link" href="./petugas.php"><i class="fa fa-pencil"></i> SURVEY</a>
              </li>
              <li class="nav-item active">
                <a class="btn btn-light px-4" href="../login/login.php"><i class="fa fa-lock"></i> LOGIN ADMIN</a>
              </li>
            </ul>
          </div>
        <?php } ?>
    </div>
  </nav>
  