<?php include './header.php'; ?>
<style>
    .form-check {
    position: relative;
    display: block;
    padding-left: 35px;
  }
</style>
<?php 
    $petugas_jenis = $_GET['petugas_jenis'];
?>
<br>
<div class="container">
  <div class="text-center">
    <h3 style="font-weight:600;text-transform: uppercase;">Detail Hasil Kuesioner Kepuasan Masyarakat</h3>
    
    <hr class="mb-4">
  </div>
  </div>
  <div class="row justify-content-center" style="margin-top: 55px;">
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-body pt-4 d-flex align-items-center justify-content-center">
        <div class="table-responsive">
            <?php 
                $id = $_GET['id'];
                $query = "SELECT p.petugas_id, p.petugas_nama, p.petugas_jenis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                FROM polling_petugas pp
                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                WHERE p.petugas_id = '$id'";
                $query .= " GROUP BY pp.polling_petugas";
                $data = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_assoc($data)) :
            ?>
            
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="3">
                <?php 
                  if ($petugas_jenis == '1') { ?>
                      Petugas Pendaftaran
                <?php } elseif ($petugas_jenis == '2') { ?>
                      Petugas Farmasi
                <?php } elseif ($petugas_jenis == '3') { ?>
                      Perawat / Bidan 
                <?php } else { ?>
                    Resepsionis / Security
                <?php } ?>
                
                : <?php  echo $row['petugas_nama'] ?></th>
                </tr>
                <?php endwhile; ?>
                <tr>
                  <th class="text-center bg-info text-white">NO</th>
                  <th class="text-center bg-info text-white">NAMA</th>
                  <th class="text-center bg-info text-white">TOTAL JAWABAN PERORANG</th>
                </tr>
              </thead>
              <tbody>
              <?php 
               $tanggalAwal = $_GET['tgl1'];
               $tanggalAkhir = $_GET['tgl2'];
               $banyakOrang = $_GET['orang'];
               $no = 1;
               $totalJawaban = 0;
               $query = "SELECT p.petugas_id, p.petugas_nama, p.petugas_jenis, m.masyarakat_nama, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                FROM polling_petugas pp
                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                JOIN masyarakat m ON pp.polling_masyarakat = m.masyarakat_id
                WHERE p.petugas_id = '$id'
                ";
                if (!empty($tanggalAwal)) {
                    $query .= " AND pp.tgl >= '$tanggalAwal'";
                }

                if (!empty($tanggalAkhir)) {
                    $query .= " AND pp.tgl <= '$tanggalAkhir'";
                }

                $query .= " GROUP BY p.petugas_id, p.petugas_nama, p.petugas_jenis, m.masyarakat_nama";

               $data = mysqli_query($koneksi, $query);
               while ($row = mysqli_fetch_assoc($data)) : 
                $jumlahJawaban = $row['jumlah']; // Get the number of answers for the current person
                // Add the number of answers to the total
                $totalJawaban += $jumlahJawaban;
               ?>
                  <tr>
					<td><?php echo $no++ ?></td>
                    <td><?php echo $row['masyarakat_nama']; ?></td>
                    <td class="text-center"><?php echo $row['jumlah'] ?></td>
                  </tr>
              <?php endwhile; ?>
              <tr>
                <td colspan="2" class="text-center" style="font-weight: 600;">TOTAL</td>
                <td class="text-center" style="font-weight: 600;"><?php echo $totalJawaban ?></td>
              </tr>
              <tr>
                <td class="text-center" colspan="2" style="font-weight: 600;">Rata-rata</td>
                <td class="text-center" style="font-weight: 600;"><?php echo ROUND($totalJawaban/$banyakOrang, 2) ?></td>
              </tr>
              </tbody>
            </table>
            
          </div>
        </div>
        <div>
            <a href="hasil_kuesioner.php" class="btn btn-info ml-4 mb-4">KEMBALI</a>
        </div>
      </div>
    </div>
   </div>

    
</div>
<br>
<br><br><br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>