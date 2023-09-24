<?php 
include '../koneksi/koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];

mysqli_query($koneksi, "update tb_spesialis set nama='$nama' where id='$id'");
header("location:spesialis.php");