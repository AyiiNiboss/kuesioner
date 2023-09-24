<?php 
include '../koneksi/koneksi.php';
$nama_petugas = $_POST['petugas'];
$nama = $_POST['masyarakat_nama'];
$email = $_POST['masyarakat_email'];
$jk = $_POST['masyarakat_jk'];
$pendidikan = $_POST['masyarakat_pendidikan'];
$pekerjaan = $_POST['masyarakat_pekerjaan'];
$pertanyaan = $_POST['pertanyaan'];
$jawaban = $_POST['rating'];
$petugas = $_POST['polling_id'];
$kritik = $_POST['kritik'];
$tgl = date('Y-m-d');

// cek sudah isi
$cek = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE masyarakat_email='$email'");
$c = mysqli_num_rows($cek);
if($c > 0){
	// jika sudah
	header("location:survey_petugas.php?alert=sudah&id=$petugas&nama=$nama_petugas");
}else{
	// jika belum
	mysqli_query($koneksi, "insert into masyarakat values (NULL,'$nama','$email','$jk','$pendidikan','$pekerjaan','$nama_petugas','2')");
	$last_id = mysqli_insert_id($koneksi);

	mysqli_query($koneksi, "insert into tb_kritik values (NULL,'$last_id','$petugas','2','$kritik')");
    $kritik = mysqli_insert_id($koneksi);

	$jumlah = count($pertanyaan);
	for($a = 1; $a <= $jumlah; $a++){
		$p = $pertanyaan[$a];
		$j = $jawaban[$a];
		mysqli_query($koneksi, "insert into polling_petugas values (NULL,'$last_id','$p','$j','$petugas','$tgl')");
	}

	header("location:survey_petugas.php?alert=selesai&id=$petugas&nama=$nama_petugas");

	//setelah ke halamn survey ingin membawa ke halaman petugas.php
}
