<?php 
include '../koneksi/koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$spesialis  = $_POST['spesialis_id'];

mysqli_query($koneksi, "update tb_dokter set nama='$nama', spesialis_id='$spesialis' where id='$id'");
header("location:dokter.php");