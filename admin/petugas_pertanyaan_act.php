<?php 
include '../koneksi/koneksi.php';
$pertanyaan  = $_POST['pertanyaan'];

mysqli_query($koneksi, "insert into pertanyaan_petugas values (NULL,'$pertanyaan')");
header("location:pertanyaan_petugas.php");