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
							<th class="text-center bg-info text-white" colspan="2">NAMA-NAMA DOKTER</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
                        $id = $_GET['id'];
						$data = mysqli_query($koneksi,"SELECT * FROM tb_dokter WHERE spesialis_id = '$id'");
						while($d = mysqli_fetch_array($data)){
							?>
							<tr>
								<td width="50%"><?php echo $d['nama']; ?></td>
								<td class="text-center">    
									<a href="survey.php?id=<?php echo $d['id'] ?>" class="btn btn-info btn-sm">
										<i class="fa fa-file"></i> Isi Kuesioner
									</a>

								</td>
							</tr>
							<?php 
						}
						?>
					</tbody>
				</table>
				<div>
					<a href="./petugas_detail.php" class="btn btn-info my-5">Kembali</a>
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