<?php 
include '../koneksi/koneksi.php';
$id  = $_POST['id'];
$pertanyaan  = $_POST['pertanyaan'];

mysqli_query($koneksi, "update pertanyaan_petugas set pertanyaan='$pertanyaan' where pertanyaan_id='$id'");
header("location:pertanyaan_petugas.php");