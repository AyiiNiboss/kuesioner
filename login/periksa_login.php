<?php
// menghubungkan dengan koneksi
include '../koneksi/koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
$status = $_POST['admin_status'];

$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password' AND admin_status='$status'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['admin_id'];
	$_SESSION['nama'] = $data['admin_nama'];
	$_SESSION['username'] = $data['admin_username'];
	$_SESSION['status'] = "administrator_logedin";
	$_SESSION['yeah'] = $data['admin_status'];
	header("location:../admin/hasil_kuesioner.php");
} else {
	header("location:login.php?alert=gagal");
}
