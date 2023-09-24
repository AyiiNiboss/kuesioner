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
		<h4>Data Spesialis</h4>
		<small>Kelola data Spesialis</small>
	</div>


	<div class="card">
		<div class="card-header">

			Data Spesialis
			<?php if($status == 1) {?>
			<button type="button" class="btn btn-green text-white btn-sm float-right" data-toggle="modal" data-target="#modalTambahpetugas">
				<i class="fa fa-plus"></i> &nbsp Tambah Spesialis Baru
			</button>
			<?php } ?>
			<form action="spesialis_act.php" method="post">
				<div class="modal fade" id="modalTambahpetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h6 class="modal-title" id="exampleModalLabel">Buat Nama Spesialis Baru</h6>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" required="required" class="form-control" placeholder="Tulis nama spesialis ..">
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
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped" id="table-datatable">
					<thead>
						<tr>
							<th class="text-center" width="1%">NO</th>
							<th>SPESIALIS</th>
							<?php if($status == 1) {?>
							<th class="text-center" width="10%">OPSI</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						$data = mysqli_query($koneksi,"SELECT * FROM tb_spesialis");
						while($d = mysqli_fetch_array($data)){
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['nama']; ?></td>
								<?php if($status == 1) {?>
								<td>    
									<div class="text-center">
										<div class="btn-group">
											
											<?php 
											if($d['id'] != "0"){
												?>
												<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_spesialis_<?php echo $d['id'] ?>">
													<i class="fa fa-cog"></i>
												</button>
												
												<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_spesialis_<?php echo $d['id'] ?>">
													<i class="fa fa-trash"></i>
												</button>
												<?php
											}

											?>
											
										</div>
									</div>

									<form action="spesialis_update.php" method="post">
										<div class="modal fade" id="edit_spesialis_<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h6 class="modal-title" id="exampleModalLabel">Edit Nama Petugas</h6>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">

														<div class="form-group" style="width:100%">
															<label>Nama spesialis</label>
															<input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['id']; ?>">
															<input type="text" name="nama" required="required" class="form-control" placeholder="Tulis nama spesialis .." value="<?php echo $d['nama']; ?>" style="width:100%">
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
									<div class="modal fade" id="hapus_spesialis_<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h6 class="modal-title" id="exampleModalLabel">Peringatan!</h6>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

													<p>Yakin ingin menghapus petugas ini ?</p>
													<small>Semua mahasiswa yang terhubung dengan petugas ini akan di pindah ke petugas "lainnya"</small>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
													<a href="spesialis_hapus.php?id=<?php echo $d['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Hapus</a>
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