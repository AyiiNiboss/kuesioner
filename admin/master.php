<?php include 'header.php'; ?>

<style>
  .btn-green {
    background-color: #51bbc6;
  }
  .btn:hover {
    background-color: #1aa0ae;
  }
</style>
<div class="container">

	<div class="mb-4">
		<h4>Data Pertanyaan Untuk Dokter</h4>
		<small>Kelola data pertanyaan.</small>
	</div>

	<div class="row mb-3">
		<div class="col-lg-12">
			<?php if($status == 1) {?>
			<button type="button" class="btn btn-green text-white btn-sm float-right" data-toggle="modal" data-target="#modalTambahPertanyaan">
				<i class="fa fa-plus"></i> &nbsp Tambah Pertanyaan Baru
			</button>
			<?php } ?>
			<!-- Modal -->
			<form action="master_pertanyaan_act.php" method="post">
				<div class="modal fade" id="modalTambahPertanyaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Pertanyaan Baru</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label>Pertanyaan</label>
									<input type="text" name="pertanyaan" required="required" class="form-control" placeholder="Tulis Pertanyaan ..">
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
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			


			<div class="table-responsive">
				<table class="table table-bordered table-striped" id="table-datatable">
					<thead>
						<tr>
							<th class="text-center" width="1%">NO</th>
							<th>Pertanyaan</th>
							<?php if($status == 1) {?>
							<th class="text-center" width="13%">OPSI</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						$data = mysqli_query($koneksi,"SELECT * FROM pertanyaan_dokter ORDER BY pertanyaan_id ASC");
						while($d = mysqli_fetch_array($data)){
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['pertanyaan']; ?></td>
								
								<?php if($status == 1) {?>
								<td>    
									<div class="text-center">
										<div class="btn-group">
											<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_pertanyaan_<?php echo $d['pertanyaan_id'] ?>">
												<i class="fa fa-cog"></i>
											</button>

											<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pertanyaan_<?php echo $d['pertanyaan_id'] ?>">
												<i class="fa fa-trash"></i>
											</button>
										</div>
									</div>

									<form action="master_pertanyaan_update.php" method="post">
										<div class="modal fade" id="edit_pertanyaan_<?php echo $d['pertanyaan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit Pertanyaan</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">

														<div class="form-group" style="width:100%">
															<label>Pertanyaan</label>
															<input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['pertanyaan_id']; ?>">
															<input type="text" name="pertanyaan" required="required" class="form-control" placeholder="Tulis Pertanyaan .." value="<?php echo $d['pertanyaan']; ?>" style="width:100%">
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
									<div class="modal fade" id="hapus_pertanyaan_<?php echo $d['pertanyaan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

													<p>Yakin ingin menghapus pertanyaan ini ?</p>
													<small>Semua jawaban yang terhubung dengan pertanyaan ini akan ikut di hapus</small>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tidak</button>
													<a href="master_pertanyaan_hapus.php?id=<?php echo $d['pertanyaan_id'] ?>" class="btn btn-success btn-sm">Hapus</a>
												</div>
											</div>
										</div>
									</div>


								</td>
								<?php } ?>
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