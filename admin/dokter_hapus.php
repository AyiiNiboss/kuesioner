<?php 
include '../koneksi/koneksi.php';
$id  = $_GET['id'];

// hapus prodi
mysqli_query($koneksi, "delete from tb_dokter where id='$id'");


// ubah prodi prodi ke lainnya
header("location:dokter.php");