<?php 
include '../koneksi/koneksi.php';
$id  = $_POST['id'];
$prodi  = $_POST['petugas_nama'];
$jenis  = $_POST['petugas_jenis'];

mysqli_query($koneksi, "update petugas set petugas_nama='$prodi', petugas_jenis='$jenis' where petugas_id='$id'");
header("location:petugas-rs.php");