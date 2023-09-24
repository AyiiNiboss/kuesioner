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
						<?php 
						 	$id = $_GET['id'];
							$data = mysqli_query($koneksi,"SELECT MAX(petugas_id) AS petugas_id, MAX(petugas_nama) AS petugas_nama, petugas_jenis
							FROM petugas
							WHERE petugas_jenis = $id
							GROUP BY petugas_jenis;");
							while($d = mysqli_fetch_array($data)){
						?>
							<th class="text-center bg-info text-white" style="text-transform: uppercase;" colspan="2">
								NAMA-NAMA 
								<?php if($d['petugas_jenis'] == 1){ ?> Petugas Pendaftaran 
								<?php }else if($d['petugas_jenis'] == 2){ ?> Perawat / Bidan
								<?php }else if($d['petugas_jenis'] == 3){ ?> Petugas Farmasi 
								<?php }else{ ?> Resepsionis / Security <?php } ?>  
							</th>
						</tr>
						<?php } ?>
					</thead>
					<tbody>
						<?php 
						$no=1;
                        $id = $_GET['id'];
						$datay = mysqli_query($koneksi,"SELECT * FROM petugas WHERE petugas_jenis = '$id'");
						while($e = mysqli_fetch_array($datay)){
							?>
							<tr>
								<td width="50%" style="text-transform: uppercase;"><?php echo $e['petugas_nama']; ?></td>
								<td class="text-center">    
									<a href="survey_petugas.php?id=<?php echo $e['petugas_id'] ?>&nama=<?= $e['petugas_nama']?>" class="btn btn-info btn-sm">
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
					<a href="./petugas.php" class="btn btn-info my-5">Kembali</a>
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