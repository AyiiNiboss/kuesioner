<?php 
include '../koneksi/koneksi.php';
$id  = $_POST['id'];
$pertanyaan  = $_POST['pertanyaan'];
$jawaban  = $_POST['jawaban'];

mysqli_query($koneksi, "update jawaban set jawaban='$jawaban' where jawaban_id='$id'");
header("location:master_jawaban.php?pertanyaan=$pertanyaan");