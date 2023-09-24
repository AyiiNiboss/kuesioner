<?php 
include '../koneksi/koneksi.php';
$nama = $_POST['nama'];

mysqli_query($koneksi, "insert into tb_spesialis values (NULL,'$nama')");
header("location:spesialis.php");