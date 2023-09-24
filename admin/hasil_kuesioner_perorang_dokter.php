<?php include './header.php'; ?>
<style>
    .form-check {
    position: relative;
    display: block;
    padding-left: 35px;
  }
</style>
<?php 
    
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
                $query = "SELECT p.id, p.nama, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                FROM polling_dokter pp
                JOIN tb_dokter p ON pp.polling_petugas = p.id
                WHERE p.id = '$id'
                ";
                $query .= " GROUP BY p.id, p.nama";
                $data = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_assoc($data)) :
            ?>
            
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="3">Petugas Pendaftaran : <?php  echo $row['nama'] ?></th>
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
               $banyakOrang = $_GET['orang'];
               $no = 1;
               $totalJawaban = 0;
               $query = "SELECT p.id, p.nama, s.nama AS nama_spesialis, SUM(pp.polling_jawaban) AS jumlah, ROUND(AVG(pp.polling_jawaban), 2) AS rata_rata, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat, m.masyarakat_nama
               FROM polling_dokter pp
               JOIN tb_dokter p ON pp.polling_petugas = p.id
               JOIN tb_spesialis s ON p.spesialis_id = s.id
               JOIN masyarakat m ON pp.polling_masyarakat = m.masyarakat_id
               WHERE p.id = '$id'
                ";

                $query .= " GROUP BY p.nama, s.nama, m.masyarakat_id, m.masyarakat_nama";

               $data = mysqli_query($koneksi, $query);
               while ($row = mysqli_fetch_assoc($data)) : 
                $jumlahJawaban = $row['jumlah']; // Get the number of answers for the current person
                // Add the number of answers to the total
                $totalJawaban += $jumlahJawaban;
               ?>
                  <tr>
					<td class="text-center"><?php echo $no++ ?></td>
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
            <a href="rate.php" class="btn btn-info ml-4 mb-4">KEMBALI</a>
        </div>
      </div>
    </div>
   </div>

    
</div>
<br>
<br><br><br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>