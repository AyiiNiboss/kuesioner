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
    <hr>
  </div>
  <div class="row justify-content-center" style="margin-top: 55px;">
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-body pt-4 d-flex align-items-center justify-content-center">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable1">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="3">RATING Petugas Pendaftaran</th>
                </tr>
                <tr>
                  <th class="text-center bg-info text-white">NAMA</th>
                  <th class="text-center bg-info text-white">RATING</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                $data = mysqli_query($koneksi,"SELECT p.petugas_nama, p.petugas_jenis, ROUND(AVG(pp.polling_jawaban), 2) AS rata_rata, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                FROM polling_petugas pp
                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                WHERE p.petugas_jenis = '1'
                GROUP BY pp.polling_petugas;    
                ");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $d['petugas_nama']; ?></td>
                    <td class="text-center"><p style="font-size: 16px;"><?php echo $d['rata_rata'] ?><span style="font-size: 13px;"> dari <?php echo $d['jumlah_petugas_masyarakat'] ?> ulasan</span></p> </td>
                  </tr>
                  <?php 
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-body pt-4 d-flex align-items-center justify-content-center">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable2">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="3">Petugas Farmasi</th>
                </tr>
                <tr>
                  <th class="text-center bg-info text-white">NAMA</th>
                  <th class="text-center bg-info text-white">RATING</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                $data = mysqli_query($koneksi,"SELECT p.petugas_nama, p.petugas_jenis, ROUND(AVG(pp.polling_jawaban), 2) AS rata_rata, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                FROM polling_petugas pp
                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                WHERE p.petugas_jenis = '2'
                GROUP BY pp.polling_petugas;    
                ");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $d['petugas_nama']; ?></td>
                    <td class="text-center"><p style="font-size: 16px;"><?php echo $d['rata_rata'] ?><span style="font-size: 13px;"> dari <?php echo $d['jumlah_petugas_masyarakat'] ?> ulasan</span></p> </td>
                  </tr>
                  <?php 
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-body pt-4 d-flex align-items-center justify-content-center">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable3">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="3">RATING Perawat / Bidan</th>
                </tr>
                <tr>
                  <th class="text-center bg-info text-white">NAMA</th>
                  <th class="text-center bg-info text-white">RATING</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                $data = mysqli_query($koneksi,"SELECT p.petugas_nama, p.petugas_jenis, ROUND(AVG(pp.polling_jawaban), 2) AS rata_rata, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                FROM polling_petugas pp
                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                WHERE p.petugas_jenis = '3'
                GROUP BY pp.polling_petugas;    
                ");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $d['petugas_nama']; ?></td>
                    <td class="text-center"><p style="font-size: 16px;"><?php echo $d['rata_rata'] ?><span style="font-size: 13px;"> dari <?php echo $d['jumlah_petugas_masyarakat'] ?> ulasan</span></p> </td>
                  </tr>
                  <?php 
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card">
        <div class="card-body pt-4 d-flex align-items-center justify-content-center">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable4">
              <thead>
                <tr>
                <th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="3">Resepsionis / Security</th>
                </tr>
                <tr>
                  <th class="text-center bg-info text-white">NAMA</th>
                  <th class="text-center bg-info text-white">RATING</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                $data = mysqli_query($koneksi,"SELECT p.petugas_nama, p.petugas_jenis, ROUND(AVG(pp.polling_jawaban), 2) AS rata_rata, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                FROM polling_petugas pp
                JOIN petugas p ON pp.polling_petugas = p.petugas_id
                WHERE p.petugas_jenis = '4'
                GROUP BY pp.polling_petugas;    
                ");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $d['petugas_nama']; ?></td>
                    <td class="text-center"><p style="font-size: 16px;"><?php echo $d['rata_rata'] ?><span style="font-size: 13px;"> dari <?php echo $d['jumlah_petugas_masyarakat'] ?> ulasan</span></p> </td>
                  </tr>
                  <?php 
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-12 mb-4">
      <div class="card" style="min-height: 500px">
        <div class="card-body pt-4">

          <div class="text-center">

            <!-- <h4>Silahkan Pilih Petugas yang Ingin Anda Nilai </h4> -->
            <!-- <small>Isi data diri dan data pertanyaan berikut dengan baik dan benar.</small> -->

          </div>

          <br>
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable5">
              <thead>
                <tr>
                  <th class="text-center bg-info text-white" colspan="3">RATING DOKTER</th>
                </tr>
                <tr>
                  <th class="text-center bg-info text-white">NAMA DOKTER</th>
                  <th class="text-center bg-info text-white">SPESIALIS</th>
                  <th class="text-center bg-info text-white">RATING</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                $data = mysqli_query($koneksi,"SELECT p.nama, s.nama AS nama_spesialis, ROUND(AVG(pp.polling_jawaban), 2) AS rata_rata, COUNT(DISTINCT pp.polling_masyarakat) AS jumlah_petugas_masyarakat
                FROM polling_dokter pp
                JOIN tb_dokter p ON pp.polling_petugas = p.id
                JOIN tb_spesialis s ON p.spesialis_id = s.id
                GROUP BY p.nama, s.nama;
                ");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['nama_spesialis']; ?></td>
                    <td class="text-center"><p style="font-size: 16px;"><?php echo $d['rata_rata'] ?><span style="font-size: 13px;"> dari <?php echo $d['jumlah_petugas_masyarakat'] ?> ulasan</span></p> </td>
                  </tr>
                  <?php 
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
</div>
    
</div>
<br>
<br><br><br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>