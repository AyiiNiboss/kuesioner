<?php 
include '../koneksi/koneksi.php';
$id  = $_GET['id'];

// hapus prodi
mysqli_query($koneksi, "delete from petugas where petugas_id='$id'");


// ubah prodi prodi ke lainnya
header("location:petugas-rs.php");