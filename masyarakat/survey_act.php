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

if ($c > 0) {
    // jika sudah
    header("location:survey.php?alert=sudah&id=$petugas");
} else {
    $jumlah = count($pertanyaan);
    $jawabanLengkap = true; // Menyimpan status jawaban bintang lengkap atau tidak

    // Memeriksa apakah semua jawaban bintang telah diisi
    for ($a = 1; $a <= $jumlah; $a++) {
        if (empty($jawaban[$a])) {
            $jawabanLengkap = false;
            break;
        }
    }

    if ($jawabanLengkap) {
        

        // Jika jawaban bintang lengkap, tambahkan data masyarakat baru
        mysqli_query($koneksi, "insert into masyarakat values (NULL,'$nama','$email','$jk','$pendidikan','$pekerjaan','$nama_petugas','1')");
        $last_id = mysqli_insert_id($koneksi);

        mysqli_query($koneksi, "insert into tb_kritik values (NULL,'$last_id','$petugas','1','$kritik')");
        $kritik = mysqli_insert_id($koneksi);

        for ($a = 1; $a <= $jumlah; $a++) {
            $p = $pertanyaan[$a];
            $j = $jawaban[$a];
            mysqli_query($koneksi, "insert into polling_dokter values (NULL,'$last_id','$p','$j','$petugas','$tgl')");
        }

        header("location:survey.php?alert=selesai&id=$petugas");
    } else {
        // Jika jawaban bintang belum lengkap, tampilkan pesan kesalahan
        header("location:survey.php?alert=error&id=$petugas");
    }
}
