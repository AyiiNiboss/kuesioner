<?php include 'header.php'; ?>


<div class="container">

	<div class="mb-4">
		<h4>Data Jawaban</h4>
		<small>Kelola data pilihan jawaban kuesioner</small>
	</div>

	<div class="row mb-3">
		<div class="col-lg-12">
			<a class="btn btn-primary btn-sm" href="master.php">
				<i class="fa fa-arrow-left"></i> &nbsp Kembali
			</a>
		</div>
	</div>

	<div class="card">
		<div class="card-body">

			<h5>Pertanyaan :</h5>

			<?php 
			$pertanyaan = $_GET['pertanyaan'];
			$p = mysqli_query($koneksi,"SELECT * FROM pertanyaan_dokter WHERE pertanyaan_id='$pertanyaan'");
			$pp = mysqli_fetch_assoc($p);
			?>

			<div class="alert alert-info my-4">
				<?php echo $pp['pertanyaan']; ?>
			</div>

			<button type="button" class="btn btn-primary btn-sm float-right mb-3" data-toggle="modal" data-target="#modalTambahJawaban">
				<i class="fa fa-plus"></i> &nbsp Tambah Jawaban Baru
			</button>
			<!-- Modal -->
			<form action="master_jawaban_act.php" method="post">
				<div class="modal fade" id="modalTambahJawaban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Jawaban Baru Untuk Pertanyaan Ini</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label>Jawaban</label>
									<input type="hidden" name="pertanyaan" required="required" value="<?php echo $pertanyaan ?>">
									<input type="text" name="jawaban" required="required" class="form-control" placeholder="Tulis Jawaban ..">
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
								<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</form>

			<br>

			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>JAWABAN</th>
							<th class="text-center" width="10%">OPSI</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$data = mysqli_query($koneksi,"SELECT * FROM jawaban WHERE jawaban_pertanyaan='$pertanyaan'");
						while($d = mysqli_fetch_array($data)){
							?>
							<tr>
								<td><?php echo $d['jawaban']; ?></td>
								<td>    
									
									<center>
										<div class="btn-group">
											<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_jawaban_<?php echo $d['jawaban_id'] ?>">
												<i class="fa fa-cog"></i>
											</button>

											<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_jawaban_<?php echo $d['jawaban_id'] ?>">
												<i class="fa fa-trash"></i>
											</button>
										</div>
									</center>

									<form action="master_jawaban_update.php" method="post">
										<div class="modal fade" id="edit_jawaban_<?php echo $d['jawaban_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit Jawaban</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">

														<div class="form-group" style="width:100%">
															<label>Jawaban</label>
															<input type="hidden" name="pertanyaan" value="<?php echo $pertanyaan; ?>">
															<input type="hidden" name="id" value="<?php echo $d['jawaban_id']; ?>" style="width:100%">
															<input type="text" name="jawaban" required="required" class="form-control" placeholder="Tulis Jawaban .." value="<?php echo $d['jawaban']; ?>" style="width:100%">
														</div>

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
														<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Simpan</button>
													</div>
												</div>
											</div>
										</div>
									</form>

									<!-- modal hapus -->
									<div class="modal fade" id="hapus_jawaban_<?php echo $d['jawaban_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

													<p>Yakin ingin menghapus jawaban ini ?</p>
													<small>Semua data yang terhubung dengan jawaban ini akan ikut di hapus</small>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
													<a href="master_jawaban_hapus.php?jawaban=<?php echo $d['jawaban_id'] ?>&pertanyaan=<?php echo $pertanyaan ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Hapus</a>
												</div>
											</div>
										</div>
									</div>

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


<?php include 'footer.php'; ?>