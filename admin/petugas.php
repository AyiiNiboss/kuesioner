<?php include 'header.php'; ?>
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
				<table class="table table-bordered table-striped" id="">
					<thead>
						<tr>
							<th width="1%">NO</th>
							<th class="text-center">NAMA</th>
							<th class="text-center">ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						$data = mysqli_query($koneksi,"SELECT p.polling_petugas, pt.petugas_nama
						FROM polling p
						JOIN petugas pt ON p.polling_petugas = pt.petugas_id
						GROUP BY p.polling_petugas, pt.petugas_nama;
						");
						while($d = mysqli_fetch_array($data)){
							?>
							<tr>
								<td class="text-center"><?php echo $no++; ?></td>
								<td><?php echo $d['petugas_nama']; ?></td>
								<td class="text-center">    
									<a href="grafik.php?id=<?php echo $d['polling_petugas'] ?>" class="btn btn-info btn-sm">
										<i class="fa fa-file"></i> Lihat Grafik
									</a>

								</td>
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
<br>
<br>
<?php include 'footer.php'; ?>