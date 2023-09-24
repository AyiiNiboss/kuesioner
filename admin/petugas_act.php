<?php 
include '../koneksi/koneksi.php';
$prodi = $_POST['petugas_nama'];
$jenis = $_POST['petugas_jenis'];

mysqli_query($koneksi, "insert into petugas values (NULL,'$prodi', '$jenis')");
header("location:petugas-rs.php");