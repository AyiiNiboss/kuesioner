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
		<h4>Data Petugas</h4>
		<small>Kelola data petugas</small>
	</div>


	<div class="card">
		<div class="card-header">

			Data Petugas
			<?php if($status == 1) {?>
			<button type="button" class="btn btn-green text-white btn-sm float-right" data-toggle="modal" data-target="#modalTambahpetugas">
				<i class="fa fa-plus"></i> &nbsp Tambah Petugas Baru
			</button>
			<?php } ?>
			<form action="petugas_act.php" method="post">
				<div class="modal fade" id="modalTambahpetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h6 class="modal-title" id="exampleModalLabel">Buat Nama Petugas Baru</h6>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label>Nama Petugas</label>
									<input type="text" name="petugas_nama" required="required" class="form-control" placeholder="Tulis nama petugas ..">
								</div>
								<div class="form-group">
									<label for="petugas_jenis">Pekerjaan</label>
										<select class="form-control" id="pekerjaan" name="petugas_jenis">
											<option selected disabled>--SIlahkan Pilih--</option>
											<option value="1">Petugas Pendaftaran</option>
											<option value="2">Perawat / Bidan</option>
											<option value="3">Petugas Farmasi</option>
											<option value="4">Resepsionis / Security</option>
										</select>
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
							<th>NAMA PETUGAS</th>
							<th>BAGIAN</th>
							<?php if($status == 1) {?>
							<th class="text-center" width="10%">OPSI</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						$data = mysqli_query($koneksi,"SELECT * FROM petugas ORDER BY petugas_id ASC");
						while($d = mysqli_fetch_array($data)){
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['petugas_nama']; ?></td>
								<td>
									<?php if($d['petugas_jenis'] == 1){ ?> Petugas Pendaftaran 
									<?php }else if($d['petugas_jenis'] == 2){ ?> Perawat / Bidan
									<?php }else if($d['petugas_jenis'] == 3){ ?> Petugas Farmasi 
									<?php }else{ ?> Resepsionis / Security <?php } ?> 
								</td>
								<?php if($status == 1) {?>
								<td>    
									<div class="text-center">
										<div class="btn-group">
											
											<?php 
											if($d['petugas_id'] != "0"){
												?>
												<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_petugas_<?php echo $d['petugas_id'] ?>">
													<i class="fa fa-cog"></i>
												</button>
												
												<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_petugas_<?php echo $d['petugas_id'] ?>">
													<i class="fa fa-trash"></i>
												</button>
												<?php
											}

											?>
											
										</div>
									</div>

									<form action="petugas_update.php" method="post">
										<div class="modal fade" id="edit_petugas_<?php echo $d['petugas_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
															<label>Nama Petugas</label>
															<input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['petugas_id']; ?>">
															<input type="text" name="petugas_nama" required="required" class="form-control" placeholder="Tulis petugas .." value="<?php echo $d['petugas_nama']; ?>" style="width:100%">
														</div>
														<div class="form-group">
															<label for="petugas_jenis">Pekerjaan</label>
																<select class="form-control" id="pekerjaan" name="petugas_jenis">
																<?php
																	// data yg dipilih sebelumnya
																
																	if ($d['petugas_jenis'] == 1) echo "<option value='1' selected>Petugas Pendaftaran</option>";
																	else echo "<option value='2'>Petugas Pendaftaran</option>";

																	if ($d['petugas_jenis'] == 2) echo "<option value='2' selected>Perawat / Bidan</option>";
																	else echo "<option value='2'>Perawat / Bidan</option>";

																	if ($d['petugas_jenis'] == 3) echo "<option value='3' selected>Petugas Farmasi</option>";
																	else echo "<option value='3'>Petugas Farmasi</option>";

																	if ($d['petugas_jenis'] == 4) echo "<option value='4' selected>Resepsionis / Security</option>";
																	else echo "<option value='4'>Resepsionis / Security</option>";
												
																?>
																</select>
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
									<div class="modal fade" id="hapus_petugas_<?php echo $d['petugas_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
													<a href="petugas_hapus.php?id=<?php echo $d['petugas_id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Hapus</a>
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