<?php 
include '../koneksi/koneksi.php';
$id  = $_GET['id'];



// hapus pertanyaan
mysqli_query($koneksi, "delete from pertanyaan_petugas where pertanyaan_id='$id'");

// hapus polling
mysqli_query($koneksi, "delete from polling_petugas where polling_pertanyaan='$id'");

header("location:pertanyaan_petugas.php");