<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>KUESIONER SURVEY KEPUASAN MASYARAKAT (SKM)</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/plugin/datatables/css/dataTables.min.css">
  <link rel="stylesheet" href="../assets/plugin/datatables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugin/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/depan.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <?php 
  include '../koneksi/koneksi.php';
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../index.php?alert=belum_login");
  }

  $status = $_SESSION['yeah'];
  ?>

  <style>
    #table-datatable {
      width: 100% !important;
    }
    #table-datatable .sorting_disabled{
      border: 1px solid #f4f4f4;
    }
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
  </style>

</head>
<body>

  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow"> -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-yolo border-bottom" style="margin-bottom: 50px;">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        
        <img src="../gambar/sistem/logo.png" alt="">
      </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav" style="margin-left: 180px;">
        <li class="nav-item active">
          <a class="nav-link" href="rate.php"><i class="fa fa-bullhorn"></i> Home <span class="sr-only">(current)</span></a>
        </li>
        <!-- <li class="nav-item active">
          <a class="nav-link" href="prodi.php"><i class="fa fa-graduation-cap"></i> Data Prodi</a>
        </li> -->
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-cog"></i> Pertanyaan</a>
          <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="master.php">Dokter</a>
            <a class="dropdown-item" href="pertanyaan_petugas.php">Petugas</a>
          </div>
        </li>
        <!-- <li class="nav-item active">
          <a class="nav-link" href="petugas-rs.php"><i class="fa fa-cog"></i> Data Petugas</a>
        </li> -->
        <li class="nav-item active">
          <a class="nav-link" href="masyarakat.php"><i class="fa fa-users"></i> Data Masyarakat & Kuesioner</a>
        </li>
        <!-- <li class="nav-item active">
          <a class="nav-link" href="hasil_kuesioner.php"><i class="fa fa-users"></i> Hasil Kuesioner</a>
        </li> -->
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-cog"></i> Data-data</a>
          <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="dokter.php">Data Dokter</a>
            <a class="dropdown-item" href="spesialis.php">Data Spesialis</a>
            <a class="dropdown-item" href="petugas-rs.php">Data Petugas</a>
          </div>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Halo, <?php 
            $id_admin = $_SESSION['id'];
            $profil = mysqli_query($koneksi,"select * from admin where admin_id='$id_admin'");
            $profil = mysqli_fetch_assoc($profil);
            ?>
            <?php if($status == 2) {?>
            <img src="../gambar/pimpinan.png" class="user-image img-fluid" style="width: 25px;margin-top: -5px">
            <?php } ?>
            <?php if($status == 1) {?>
            <img src="../gambar/user.png" class="user-image img-fluid" style="width: 25px;margin-top: -5px">
            <?php } ?>
            <span class="hidden-xs" style=""><?php echo $profil['admin_nama']; ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="ganti_password.php">Ganti Password</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
      </ul>

    </div>
  </nav>

  <div class="badan">