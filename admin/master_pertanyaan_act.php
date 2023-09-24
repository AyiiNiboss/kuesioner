<?php 
include '../koneksi/koneksi.php';
$pertanyaan  = $_POST['pertanyaan'];

mysqli_query($koneksi, "insert into pertanyaan_dokter values (NULL,'$pertanyaan')");
header("location:master.php");