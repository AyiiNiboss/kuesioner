<?php 
include '../koneksi/koneksi.php';
$pertanyaan = $_POST['pertanyaan'];
$jawaban = $_POST['jawaban'];

mysqli_query($koneksi, "insert into jawaban values (NULL,'$jawaban','$pertanyaan')");
header("location:master_jawaban.php?pertanyaan=$pertanyaan");