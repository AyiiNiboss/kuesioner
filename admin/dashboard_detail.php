<?php include './header.php'; ?>
<style>
    .form-check {
    position: relative;
    display: block;
    padding-left: 35px;
  }
</style>
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card" style="min-height: 500px">
        <div class="card-body pt-4">

          <div class="text-center">

            <!-- <h4>Silahkan Pilih Petugas yang Ingin Anda Nilai </h4> -->
            <!-- <small>Isi data diri dan data pertanyaan berikut dengan baik dan benar.</small> -->

          </div>

          <br>
          <div class="table-responsive">
				<table class="table table-bordered table-striped" id="table-datatable">
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
								<td class="text-center"><p style="font-size: 16px;"><?php echo $d['rata_rata'] ?><span style="font-size: 13px;"> dari <?php echo $d['jumlah_petugas_masyarakat'] ?> orang</span></p> </td>
							</tr>
							<?php 
						}
						?>
					</tbody>
				</table>
        <div>
          <a href="./dashboard.php" class="btn btn-info my-5">Kembali</a>
        </div>
			</div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<?php include 'footer.php'; ?>