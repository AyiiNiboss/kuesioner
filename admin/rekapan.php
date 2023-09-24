<?php
// Panggil autoloader DOMPDF
include '../koneksi/koneksi.php';
require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$id = $_GET['id'];
$petugas_jenis = $_GET['petugas_jenis'];
$petugas_kritik = $_GET['petugas_kritik'];
// Membuat objek DOMPDF
$dompdf = new Dompdf();

// Menambahkan halaman

// Set font (optional)
$dompdf->setBasePath(''); // Jika menggunakan CSS yang merujuk ke file, tentukan jalur basis di sini
// $dompdf->setFontFamily('Helvetica');

$query = "SELECT p.petugas_id, p.petugas_nama, p.petugas_jenis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
FROM petugas p
JOIN polling_petugas pp ON pp.polling_petugas = p.petugas_id
WHERE p.petugas_jenis = '$petugas_jenis' AND pp.polling_petugas = '$id'";
          
$query .= " GROUP BY p.petugas_id, p.petugas_nama, p.petugas_jenis";

// Eksekusi query untuk mengambil data dari database
$data = mysqli_query($koneksi, $query);

// Kritik dan saran
$query2 = "SELECT * FROM tb_kritik WHERE petugas_id = '$id' AND petugas_jenis = '$petugas_kritik'";
$data2 = mysqli_query($koneksi, $query2);

// Menambahkan konten laporan dalam bentuk HTML
$html = '<style type="text/css">
@page {
    margin-top: 1cm;
    margin-left: 1.5cm;
    margin-right: 1.5cm;
    margin-bottom: 0.1cm;
}
body {
  font-family: Arial, sans-serif;
}

table {
  width: 100%;
  border-collapse: collapse;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}
th, td {
  padding: 8px;
  text-align: left;
  border: 1px solid #2b2a2a;
}
</style>

<body>
<br><br>
<table>
    <tr style="border: none;">
        <td style="text-align: center;font-weight:600;border: none;">REKAPAN HASIL KUESIONER</td>
    </tr>
</table>
<br><br><br>
            <table style="">
                <tr style="border: none;">
                    <th style="width: 30%;text-align:center;text-transform: uppercase;" colspan="6">';
                    if ($petugas_jenis == '1') {
                        $html .= 'Petugas Pendaftaran';
                    } elseif ($petugas_jenis == '2') {
                        $html .= 'Petugas Farmasi';
                    } elseif ($petugas_jenis == '3') {
                        $html .= 'Perawat / Bidan';
                    } else {
                        $html .= 'Resepsionis / Security';
                    }
                    
                    $html .='</th>
                </tr>
                <tr style="">
                    <th style="">No</th>
                    <th style="">Nama</th>
                    <th style="">TOTAL JAWABAN</th>
                    <th style="">TOTAL RESPONDEN</th>
                    <th style="">Rata-rata</th>
                    <th style="">Keterangan</th>
                </tr>';
                $no = 1;
                while ($row = mysqli_fetch_assoc($data)) {
                $html .= '<tr>
                <td>' . $no++ . '</td>
                <td>' . $row['petugas_nama'] . '</td>
                <td style="text-align:center">' . $row['jumlah'] . '</td>
                <td style="text-align:center">' . $row['jumlah_petugas_masyarakat'] . '</td>
                <td style="text-align:center">' . ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) . '</td>
                <td>';
                    $nilaiRasio = round($row['jumlah'] / $row['jumlah_petugas_masyarakat'], 2);
                    if ($nilaiRasio >= 16) {
                        $html .= 'Sangat Baik';
                    } elseif ($nilaiRasio >= 11) {
                        $html .= 'Baik';
                    } elseif ($nilaiRasio >= 8) {
                        $html .= 'Cukup';
                    } elseif ($nilaiRasio >= 5) {
                        $html .= 'Buruk';
                    } else {
                        $html .= 'Sangat Buruk';
                    }
                $html .= '</td>
            </tr>';
                }
            $html .='</table>
            <br><br>
            <table style="">
            <tr style="">
                <th style="text-align: center">NOMOR</th>
                <th style="text-align: center">KRITIK & SARAN</th>
            </tr>';
            $no = 1;
            while ($row2 = mysqli_fetch_assoc($data2)) {
            $html .= '<tr>
                        <td style="text-align: center">' . $no++ . '</td>
                        <td>' . $row2['kritik'] . '</td>
                    </tr>';
            }
            $html .='</table>';
$dompdf->loadHtml($html);

// Render PDF
$dompdf->render();

// Output PDF
$dompdf->stream("Rekapan.pdf", array("Attachment" => false));
?>
