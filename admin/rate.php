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
    <h3 style="font-weight:600;text-transform: uppercase;">Hasil Kuesioner Kepuasan Masyarakat</h3>
    
    <hr class="mb-4">
  </div>
  <div style="margin-left: 250px;">
    <!-- <form action="" method="GET">
    <div class="row">
        <div class="col-md-4">
            <input class="form-control" type="date" name="tanggal_awal" value="<?php echo $tanggalAwal; ?>" placeholder="Tanggal Awal">
        </div>
        <div class="col-md-4">
            <input class="form-control" type="date" name="tanggal_akhir" value="<?php echo $tanggalAkhir; ?>" placeholder="Tanggal Akhir">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-info" name="search">Cari</button>
            <button type="submit" class="btn btn-info" name="refresh">Refresh</button>
        </div>
    </div>
    </form> -->
  </div>
  </div>
  <div class="row justify-content-center" style="margin-top: 55px;">
    <div class="col-lg-12 mb-4">
      <div class="card">
        <div class="card-body pt-4 d-flex align-items-center justify-content-center">
        <div class="table-responsive">
                  <?php
                      $totalJawaban = 0;
                      $query = "SELECT p.petugas_id, p.petugas_nama, p.petugas_jenis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                                FROM polling_petugas pp
                                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                                WHERE p.petugas_jenis = '1'";
                      $query .= " GROUP BY pp.polling_petugas";

                      $data = mysqli_query($koneksi, $query);
                      $count = mysqli_num_rows($data);
                      
                      while ($row = mysqli_fetch_assoc($data)) {

                        $jumlahJawaban = ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2); // Get the number of answers for the current person
                        // Add the number of answers to the total
                        $totalJawaban += $jumlahJawaban;
                      }

                      $totalJawaban1 = 0;
                      $query1 = "SELECT p.petugas_id, p.petugas_nama, p.petugas_jenis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                                FROM polling_petugas pp
                                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                                WHERE p.petugas_jenis = '2'";
                      $query1 .= " GROUP BY pp.polling_petugas";

                      $data1 = mysqli_query($koneksi, $query1);
                      $count1 = mysqli_num_rows($data1);
                      
                      while ($row1 = mysqli_fetch_assoc($data1)) {

                        $jumlahJawaban1 = ROUND($row1['jumlah']/$row1['jumlah_petugas_masyarakat'], 2); // Get the number of answers for the current person
                        // Add the number of answers to the total
                        $totalJawaban1 += $jumlahJawaban1;
                      }

                      $totalJawaban2 = 0;
                      $query2 = "SELECT p.petugas_id, p.petugas_nama, p.petugas_jenis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                                FROM polling_petugas pp
                                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                                WHERE p.petugas_jenis = '3'";
                      $query2 .= " GROUP BY pp.polling_petugas";

                      $data2 = mysqli_query($koneksi, $query2);
                      $count2 = mysqli_num_rows($data2);
                      
                      while ($row2 = mysqli_fetch_assoc($data2)) {

                        $jumlahJawaban2 = ROUND($row2['jumlah']/$row2['jumlah_petugas_masyarakat'], 2); // Get the number of answers for the current person
                        // Add the number of answers to the total
                        $totalJawaban2 += $jumlahJawaban2;
                      }

                      $totalJawaban3 = 0;
                      $query3 = "SELECT p.petugas_id, p.petugas_nama, p.petugas_jenis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                                FROM polling_petugas pp
                                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                                WHERE p.petugas_jenis = '4'";
                      $query3 .= " GROUP BY pp.polling_petugas";

                      $data3 = mysqli_query($koneksi, $query3);
                      $count3 = mysqli_num_rows($data3);
                      
                      while ($row3 = mysqli_fetch_assoc($data3)) {

                        $jumlahJawaban3 = ROUND($row3['jumlah']/$row3['jumlah_petugas_masyarakat'], 2); // Get the number of answers for the current person
                        // Add the number of answers to the total
                        $totalJawaban3 += $jumlahJawaban3;
                      }
                      ?>
            
            <table class="table table-bordered table-striped">
              <thead>
                <tr class="text-center bg-info text-white">
                  <th>PETUGAS</th>
                  <th>NILAI</th>
                  <th>ACTION</th>
                </tr>
                <tr>
                  <th class="text-center" style="width: 40%;">PETUGAS PENDAFTARAN</th>
                  <th class="text-center"><?php echo ROUND($totalJawaban/$count, 2) ?></th>
                  <th class="text-center"><a href="hasil_kuesioner_petugas.php?id=1" class="btn btn-warning text-white" title="Detail"><i class="fa fa-eye"></i></a></th>
                </tr>
                <tr>
                  <th class="text-center">PETUGAS FARMASI</th>
                  <th class="text-center"><?php echo ROUND($totalJawaban1/$count1, 2) ?></th>
                  <th class="text-center"><a href="hasil_kuesioner_petugas.php?id=2" class="btn btn-warning text-white" title="Detail"><i class="fa fa-eye"></i></a></th>
                </tr>
                <tr>
                  <th class="text-center" style="text-transform: uppercase;">Perawat / Bidan</th>
                  <th class="text-center"><?php echo ROUND($totalJawaban2/$count2, 2) ?></th>
                  <th class="text-center"><a href="hasil_kuesioner_petugas.php?id=3" class="btn btn-warning text-white" title="Detail"><i class="fa fa-eye"></i></a></th>
                </tr>
                <tr>
                  <th class="text-center" style="text-transform: uppercase;">Resepsionis / Security</th>
                  <th class="text-center"><?php echo ROUND($totalJawaban3/$count3, 2) ?></th>
                  <th class="text-center"><a href="hasil_kuesioner_petugas.php?id=4" class="btn btn-warning text-white" title="Detail"><i class="fa fa-eye"></i></a></th>
                </tr>
              </thead>
            </table>
            
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 mb-4">
      <div class="card">
        <div class="card-body pt-4 d-flex align-items-center justify-content-center">
        <div class="table-responsive">
                  <?php

                      // Query data berdasarkan kondisi tanggal
                      $query = "SELECT p.id, p.nama, s.nama AS nama_spesialis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                      FROM polling_dokter pp
                      JOIN tb_dokter p ON pp.polling_petugas = p.id
                      JOIN tb_spesialis s ON p.spesialis_id = s.id
                      ";
                      $query .= " GROUP BY p.id, p.nama, s.nama";

                      $data = mysqli_query($koneksi, $query);
                      ?>
            
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="8">Dokter</th>
                </tr>
                <tr>
                  <th class="text-center bg-info text-white">NAMA</th>
                  <th class="text-center bg-info text-white">SPESIALIS</th>
                  <th class="text-center bg-info text-white">NILAI-rata</th>
                  <th class="text-center bg-info text-white">ACTION</th>
                </tr>
              </thead>
              <tbody>
              <?php if (mysqli_num_rows($data) > 0) : ?>
              <?php $no = 1;
               while ($row = mysqli_fetch_assoc($data)) : ?>
                  <tr>
                    <td><?php echo $row['nama']; ?></td>
                    <td class="text-center"><?php echo $row['nama_spesialis']; ?></td>
                    <td class="text-center"><?php echo ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) ?></td>
                    <!-- <td class="text-center">
                      <?php if(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 16){ ?>
                              Sangat Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 11){ ?>
                              Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 8){ ?>
                              Cukup
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 5){ ?>
                              Buruk
                      <?php }else{ ?> Sangat Buruk  <?php } ?>
                    </td> -->
                    <td class="text-center">
                    <a href="hasil_kuesioner_perorang_dokter.php?id=<?= $row['id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>" class="btn btn-warning text-white" title="Detail"><i class="fa fa-eye"></i></a>
                      <!-- <a href="rekapan-dokter.php?id=<?= $row['id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&petugas_kritik=1" class="btn btn-danger" title="Export PDF"><i class="fa fa-file-pdf"></i></a> -->
                    </td>
                  </tr>
              <?php endwhile; ?>
              <?php else : ?>
                <tr>
                  <td class="text-center" colspan="8">Tidak ada data yang ditemukan.</td>
                </tr>
              <?php endif; ?>
              </tbody>
            </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>