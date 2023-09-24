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
    <form action="" method="GET">
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
    </form>
  </div>
  </div>
  <div class="row justify-content-center" style="margin-top: 55px;">
    <div class="col-lg-12 mb-4">
      <div class="card">
        <div class="card-body pt-4 d-flex align-items-center justify-content-center">
        <div class="table-responsive">
                  <?php
                      // Variabel untuk menyimpan tanggal awal dan tanggal akhir
                      $tanggalAwal = '';
                      $tanggalAkhir = '';

                      // Cek apakah tombol "Search" telah diklik
                      if (isset($_GET['search'])) {
                          // Ambil tanggal awal dan tanggal akhir dari input form
                          $tanggalAwal = $_GET['tanggal_awal'];
                          $tanggalAkhir = $_GET['tanggal_akhir'];
                      }

                      // Cek apakah tombol "Refresh" telah diklik
                      if (isset($_GET['refresh'])) {
                          // Menghapus tanggal awal dan tanggal akhir
                          $tanggalAwal = '';
                          $tanggalAkhir = '';
                      }

                      // Query data berdasarkan kondisi tanggal
                      $query = "SELECT p.petugas_id, p.petugas_nama, p.petugas_jenis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                                FROM polling_petugas pp
                                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                                WHERE p.petugas_jenis = '1'";

                      if (!empty($tanggalAwal)) {
                          $query .= " AND pp.tgl >= '$tanggalAwal'";
                      }

                      if (!empty($tanggalAkhir)) {
                          $query .= " AND pp.tgl <= '$tanggalAkhir'";
                      }

                      $query .= " GROUP BY pp.polling_petugas";

                      $data = mysqli_query($koneksi, $query);
                      
                      ?>
            
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="7">Petugas Pendaftaran</th>
                </tr>
                <tr>
                  <th class="text-center bg-info text-white">NO</th>
                  <th class="text-center bg-info text-white">NAMA</th>
                  <th class="text-center bg-info text-white">TOTAL JAWABAN</th>
                  <th class="text-center bg-info text-white">TOTAL RESPONDEN</th>
                  <th class="text-center bg-info text-white">Rata-rata</th>
                  <th class="text-center bg-info text-white">Keterangan</th>
                  <th class="text-center bg-info text-white">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php if (mysqli_num_rows($data) > 0) : ?>
              <?php $no = 1;
               while ($row = mysqli_fetch_assoc($data)) : ?>
                  <tr>
					          <td class="text-center"><?php echo $no++ ?></td>
                    <td><?php echo $row['petugas_nama']; ?></td>
                    <td class="text-center"><?php echo $row['jumlah'] ?></td>
                    <td class="text-center"><?php echo $row['jumlah_petugas_masyarakat'] ?></td>
                    <td class="text-center"><?php echo ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) ?></td>
                    <td class="text-center">
                    <?php if(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 16){ ?>
                              Sangat Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 11){ ?>
                              Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 8){ ?>
                              Cukup
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 5){ ?>
                              Buruk
                      <?php }else{ ?> Sangat Buruk  <?php } ?>                      
                    </td>
                    <td class="text-center">
                      <a href="hasil_kuesioner_perorang.php?id=<?= $row['petugas_id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&tgl1=<?= $tanggalAwal?>&tgl2=<?= $tanggalAkhir?>&petugas_jenis=<?=$row['petugas_jenis']?>" class="btn btn-warning text-white" title="Detail"><i class="fa fa-eye"></i></a>
                      <a href="rekapan.php?id=<?= $row['petugas_id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&petugas_jenis=<?=$row['petugas_jenis']?>&petugas_kritik=2" class="btn btn-danger" title="Export PDF"><i class="fa fa-file-pdf"></i></a>
                    </td>
                  </tr>
              <?php endwhile; ?>
              <?php else : ?>
                <tr>
                  <td class="text-center" colspan="7">Tidak ada data yang ditemukan.</td>
                </tr>
              <?php endif; ?>
              </tbody>
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
                      // Variabel untuk menyimpan tanggal awal dan tanggal akhir
                      $tanggalAwal = '';
                      $tanggalAkhir = '';

                      // Cek apakah tombol "Search" telah diklik
                      if (isset($_GET['search'])) {
                          // Ambil tanggal awal dan tanggal akhir dari input form
                          $tanggalAwal = $_GET['tanggal_awal'];
                          $tanggalAkhir = $_GET['tanggal_akhir'];
                      }

                      // Cek apakah tombol "Refresh" telah diklik
                      if (isset($_GET['refresh'])) {
                          // Menghapus tanggal awal dan tanggal akhir
                          $tanggalAwal = '';
                          $tanggalAkhir = '';
                      }

                      // Query data berdasarkan kondisi tanggal
                      $query = "SELECT p.petugas_id,p.petugas_nama, p.petugas_jenis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                                FROM polling_petugas pp
                                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                                WHERE p.petugas_jenis = '2'";

                      if (!empty($tanggalAwal)) {
                          $query .= " AND pp.tgl >= '$tanggalAwal'";
                      }

                      if (!empty($tanggalAkhir)) {
                          $query .= " AND pp.tgl <= '$tanggalAkhir'";
                      }

                      $query .= " GROUP BY pp.polling_petugas";

                      $data = mysqli_query($koneksi, $query);
                      ?>
            
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="7">Petugas Farmasi</th>
                </tr>
                <tr>
                  <th class="text-center bg-info text-white">NO</th>
                  <th class="text-center bg-info text-white">NAMA</th>
                  <th class="text-center bg-info text-white">TOTAL JAWABAN</th>
                  <th class="text-center bg-info text-white">TOTAL RESPONDEN</th>
                  <th class="text-center bg-info text-white">Rata-rata</th>
                  <th class="text-center bg-info text-white">Keterangan</th>
                  <th class="text-center bg-info text-white">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php if (mysqli_num_rows($data) > 0) : ?>
              <?php $no = 1;
               while ($row = mysqli_fetch_assoc($data)) : ?>
                  <tr>
					          <td><?php echo $no++ ?></td>
                    <td><?php echo $row['petugas_nama']; ?></td>
                    <td class="text-center"><?php echo $row['jumlah'] ?></td>
                    <td class="text-center"><?php echo $row['jumlah_petugas_masyarakat'] ?></td>
                    <td class="text-center"><?php echo ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) ?></td>
                    <td class="text-center">
                    <!-- <a href="hasil_kuesioner_perorang.php?id=<?= $row['petugas_id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&tgl1=<?= $tanggalAwal?>&tgl2=<?= $tanggalAkhir?>" class="btn btn-info">Detail</a> -->
                    <?php if(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 16){ ?>
                              Sangat Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 11){ ?>
                              Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 8){ ?>
                              Cukup
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 5){ ?>
                              Buruk
                      <?php }else{ ?> Sangat Buruk  <?php } ?>
                  </td>
                    <td class="text-center">
                      <a href="hasil_kuesioner_perorang.php?id=<?= $row['petugas_id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&tgl1=<?= $tanggalAwal?>&tgl2=<?= $tanggalAkhir?>&petugas_jenis=<?=$row['petugas_jenis']?>" class="btn btn-warning text-white" title="Detail"><i class="fa fa-eye"></i></a>
                      <a href="rekapan.php?id=<?= $row['petugas_id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&petugas_jenis=<?=$row['petugas_jenis']?>&petugas_kritik=2" class="btn btn-danger" title="Export PDF"><i class="fa fa-file-pdf"></i></a>
                    </td>
                  </tr>
              <?php endwhile; ?>
              <?php else : ?>
                <tr>
                  <td class="text-center" colspan="7">Tidak ada data yang ditemukan.</td>
                </tr>
              <?php endif; ?>
              </tbody>
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
                      // Variabel untuk menyimpan tanggal awal dan tanggal akhir
                      $tanggalAwal = '';
                      $tanggalAkhir = '';

                      // Cek apakah tombol "Search" telah diklik
                      if (isset($_GET['search'])) {
                          // Ambil tanggal awal dan tanggal akhir dari input form
                          $tanggalAwal = $_GET['tanggal_awal'];
                          $tanggalAkhir = $_GET['tanggal_akhir'];
                      }

                      // Cek apakah tombol "Refresh" telah diklik
                      if (isset($_GET['refresh'])) {
                          // Menghapus tanggal awal dan tanggal akhir
                          $tanggalAwal = '';
                          $tanggalAkhir = '';
                      }

                      // Query data berdasarkan kondisi tanggal
                      $query = "SELECT p.petugas_id, p.petugas_nama, p.petugas_jenis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                                FROM polling_petugas pp
                                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                                WHERE p.petugas_jenis = '3'";

                      if (!empty($tanggalAwal)) {
                          $query .= " AND pp.tgl >= '$tanggalAwal'";
                      }

                      if (!empty($tanggalAkhir)) {
                          $query .= " AND pp.tgl <= '$tanggalAkhir'";
                      }

                      $query .= " GROUP BY pp.polling_petugas";

                      $data = mysqli_query($koneksi, $query);
                      ?>
            
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="7">Perawat / Bidan</th>
                </tr>
                <tr>
                  <th class="text-center bg-info text-white">NO</th>
                  <th class="text-center bg-info text-white">NAMA</th>
                  <th class="text-center bg-info text-white">TOTAL JAWABAN</th>
                  <th class="text-center bg-info text-white">TOTAL RESPONDEN</th>
                  <th class="text-center bg-info text-white">Rata-rata</th>
                  <th class="text-center bg-info text-white">Keterangan</th>
                  <th class="text-center bg-info text-white">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php if (mysqli_num_rows($data) > 0) : ?>
              <?php $no = 1;
               while ($row = mysqli_fetch_assoc($data)) : ?>
                  <tr>
					          <td><?php echo $no++ ?></td>
                    <td><?php echo $row['petugas_nama']; ?></td>
                    <td class="text-center"><?php echo $row['jumlah'] ?></td>
                    <td class="text-center"><?php echo $row['jumlah_petugas_masyarakat'] ?></td>
                    <td class="text-center"><?php echo ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) ?></td>
                    <td class="text-center">
                    <?php if(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 16){ ?>
                              Sangat Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 11){ ?>
                              Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 8){ ?>
                              Cukup
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 5){ ?>
                              Buruk
                      <?php }else{ ?> Sangat Buruk  <?php } ?>
                    </td>
                    <td class="text-center">
                      <a href="hasil_kuesioner_perorang.php?id=<?= $row['petugas_id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&tgl1=<?= $tanggalAwal?>&tgl2=<?= $tanggalAkhir?>&petugas_jenis=<?=$row['petugas_jenis']?>" class="btn btn-warning text-white" title="Detail"><i class="fa fa-eye"></i></a>
                      <a href="rekapan.php?id=<?= $row['petugas_id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&petugas_jenis=<?=$row['petugas_jenis']?>&petugas_kritik=2" class="btn btn-danger" title="Export PDF"><i class="fa fa-file-pdf"></i></a>
                    </td>
                  </tr>
              <?php endwhile; ?>
              <?php else : ?>
                <tr>
                  <td class="text-center" colspan="7">Tidak ada data yang ditemukan.</td>
                </tr>
              <?php endif; ?>
              </tbody>
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
                      // Variabel untuk menyimpan tanggal awal dan tanggal akhir
                      $tanggalAwal = '';
                      $tanggalAkhir = '';

                      // Cek apakah tombol "Search" telah diklik
                      if (isset($_GET['search'])) {
                          // Ambil tanggal awal dan tanggal akhir dari input form
                          $tanggalAwal = $_GET['tanggal_awal'];
                          $tanggalAkhir = $_GET['tanggal_akhir'];
                      }

                      // Cek apakah tombol "Refresh" telah diklik
                      if (isset($_GET['refresh'])) {
                          // Menghapus tanggal awal dan tanggal akhir
                          $tanggalAwal = '';
                          $tanggalAkhir = '';
                      }

                      // Query data berdasarkan kondisi tanggal
                      $query = "SELECT p.petugas_id, p.petugas_nama, p.petugas_jenis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                                FROM polling_petugas pp
                                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                                WHERE p.petugas_jenis = '4'";

                      if (!empty($tanggalAwal)) {
                          $query .= " AND pp.tgl >= '$tanggalAwal'";
                      }

                      if (!empty($tanggalAkhir)) {
                          $query .= " AND pp.tgl <= '$tanggalAkhir'";
                      }

                      $query .= " GROUP BY pp.polling_petugas";

                      $data = mysqli_query($koneksi, $query);
                      ?>
            
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="7">Resepsionis / Security</th>
                </tr>
                <tr>
                  <th class="text-center bg-info text-white">NO</th>
                  <th class="text-center bg-info text-white">NAMA</th>
                  <th class="text-center bg-info text-white">TOTAL JAWABAN</th>
                  <th class="text-center bg-info text-white">TOTAL RESPONDEN</th>
                  <th class="text-center bg-info text-white">Rata-rata</th>
                  <th class="text-center bg-info text-white">Keterangan</th>
                  <th class="text-center bg-info text-white">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php if (mysqli_num_rows($data) > 0) : ?>
              <?php $no = 1;
               while ($row = mysqli_fetch_assoc($data)) : ?>
                  <tr>
					          <td><?php echo $no++ ?></td>
                    <td><?php echo $row['petugas_nama']; ?></td>
                    <td class="text-center"><?php echo $row['jumlah'] ?></td>
                    <td class="text-center"><?php echo $row['jumlah_petugas_masyarakat'] ?></td>
                    <td class="text-center"><?php echo ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) ?></td>
                    <td class="text-center">
                    <?php if(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 16){ ?>
                              Sangat Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 11){ ?>
                              Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 8){ ?>
                              Cukup
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 5){ ?>
                              Buruk
                      <?php }else{ ?> Sangat Buruk  <?php } ?>
                    </td>
                    <td class="text-center">
                      <a href="hasil_kuesioner_perorang.php?id=<?= $row['petugas_id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&tgl1=<?= $tanggalAwal?>&tgl2=<?= $tanggalAkhir?>&petugas_jenis=<?=$row['petugas_jenis']?>" class="btn btn-warning text-white" title="Detail"><i class="fa fa-eye"></i></a>
                      <a href="rekapan.php?id=<?= $row['petugas_id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&petugas_jenis=<?=$row['petugas_jenis']?>&petugas_kritik=2" class="btn btn-danger" title="Export PDF"><i class="fa fa-file-pdf"></i></a>
                    </td>
                  </tr>
              <?php endwhile; ?>
              <?php else : ?>
                <tr>
                  <td class="text-center" colspan="7">Tidak ada data yang ditemukan.</td>
                </tr>
              <?php endif; ?>
              </tbody>
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
                      // Variabel untuk menyimpan tanggal awal dan tanggal akhir
                      $tanggalAwal = '';
                      $tanggalAkhir = '';

                      // Cek apakah tombol "Search" telah diklik
                      if (isset($_GET['search'])) {
                          // Ambil tanggal awal dan tanggal akhir dari input form
                          $tanggalAwal = $_GET['tanggal_awal'];
                          $tanggalAkhir = $_GET['tanggal_akhir'];
                      }

                      // Cek apakah tombol "Refresh" telah diklik
                      if (isset($_GET['refresh'])) {
                          // Menghapus tanggal awal dan tanggal akhir
                          $tanggalAwal = '';
                          $tanggalAkhir = '';
                      }

                      // Query data berdasarkan kondisi tanggal
                      $query = "SELECT p.id, p.nama, s.nama AS nama_spesialis, SUM(pp.polling_jawaban) AS jumlah, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                      FROM polling_dokter pp
                      JOIN tb_dokter p ON pp.polling_petugas = p.id
                      JOIN tb_spesialis s ON p.spesialis_id = s.id
                      ";

                      if (!empty($tanggalAwal)) {
                          $query .= " AND pp.tgl >= '$tanggalAwal'";
                      }

                      if (!empty($tanggalAkhir)) {
                          $query .= " AND pp.tgl <= '$tanggalAkhir'";
                      }

                      $query .= " GROUP BY p.id, p.nama, s.nama";

                      $data = mysqli_query($koneksi, $query);
                      ?>
            
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="8">Dokter</th>
                </tr>
                <tr>
                  <th class="text-center bg-info text-white">NO</th>
                  <th class="text-center bg-info text-white">NAMA</th>
                  <th class="text-center bg-info text-white">SPESIALIS</th>
                  <th class="text-center bg-info text-white">TOTAL JAWABAN</th>
                  <th class="text-center bg-info text-white">TOTAL RESPONDEN</th>
                  <th class="text-center bg-info text-white">Rata-rata</th>
                  <th class="text-center bg-info text-white">Keterangan</th>
                  <th class="text-center bg-info text-white">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php if (mysqli_num_rows($data) > 0) : ?>
              <?php $no = 1;
               while ($row = mysqli_fetch_assoc($data)) : ?>
                  <tr>
					          <td><?php echo $no++ ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td class="text-center"><?php echo $row['nama_spesialis']; ?></td>
                    <td class="text-center"><?php echo $row['jumlah'] ?></td>
                    <td class="text-center"><?php echo $row['jumlah_petugas_masyarakat'] ?></td>
                    <td class="text-center"><?php echo ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) ?></td>
                    <td class="text-center">
                      <?php if(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 16){ ?>
                              Sangat Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 11){ ?>
                              Baik
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 8){ ?>
                              Cukup
                      <?php }elseif(ROUND($row['jumlah']/$row['jumlah_petugas_masyarakat'], 2) >= 5){ ?>
                              Buruk
                      <?php }else{ ?> Sangat Buruk  <?php } ?>
                    </td>
                    <td class="text-center">
                      <a href="hasil_kuesioner_perorang_dokter.php?id=<?= $row['id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&tgl1=<?= $tanggalAwal?>&tgl2=<?= $tanggalAkhir?>" class="btn btn-warning text-white" title="Detail"><i class="fa fa-eye"></i></a>
                      <a href="rekapan-dokter.php?id=<?= $row['id'];?>&orang=<?= $row['jumlah_petugas_masyarakat']?>&petugas_kritik=1" class="btn btn-danger" title="Export PDF"><i class="fa fa-file-pdf"></i></a>
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

    
</div>
<br>
<br><br><br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>