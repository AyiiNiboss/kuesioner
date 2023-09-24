<?php 
include '../koneksi/koneksi.php';
$nama = $_POST['nama'];
$spesialis = $_POST['spesialis_id'];

mysqli_query($koneksi, "insert into tb_dokter values (NULL, '$spesialis','$nama')");
header("location:dokter.php");