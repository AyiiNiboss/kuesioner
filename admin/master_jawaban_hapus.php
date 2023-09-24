<?php 
include '../koneksi/koneksi.php';
$jawaban  = $_GET['jawaban'];
$pertanyaan  = $_GET['pertanyaan'];

// hapus jawaban
mysqli_query($koneksi, "delete from jawaban where jawaban_id='$jawaban'");

// hapus polling
mysqli_query($koneksi, "delete from polling where polling_jawaban='$jawaban'");

header("location:master_jawaban.php?pertanyaan=$pertanyaan");