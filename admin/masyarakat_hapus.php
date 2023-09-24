<?php 
include '../koneksi/koneksi.php';
$id  = $_GET['id'];
$status  = $_GET['status'];

// hapus mahasiswa
mysqli_query($koneksi, "delete from masyarakat where masyarakat_id='$id'");

// hapus polling
if($status == 1){
    mysqli_query($koneksi, "delete from polling_dokter where polling_masyarakat='$id'");
}else{
    mysqli_query($koneksi, "delete from polling_petugas where polling_masyarakat='$id'");
}

header("location:masyarakat.php");