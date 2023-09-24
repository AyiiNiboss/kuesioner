<?php 
include '../koneksi/koneksi.php';
$id  = $_GET['id'];



// hapus pertanyaan
mysqli_query($koneksi, "delete from pertanyaan_dokter where pertanyaan_id='$id'");

// hapus polling
mysqli_query($koneksi, "delete from polling_dokter where polling_pertanyaan='$id'");

header("location:master.php");