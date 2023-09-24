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
		<h4>Data Dokter</h4>
		<small>Kelola data dokter</small>
	</div>


	<div class="card">
		<div class="card-header">

			Data Dokter
			<?php if($status == 1) {?>
			<button type="button" class="btn btn-green text-white btn-sm float-right" data-toggle="modal" data-target="#modalTambahpetugas">
				<i class="fa fa-plus"></i> &nbsp Tambah Dokter Baru
			</button>
			<?php } ?>
			<form action="dokter_act.php" method="post">
				<div class="modal fade" id="modalTambahpetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h6 class="modal-title" id="exampleModalLabel">Buat Nama Dokter Baru</h6>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label>Nama Dokter</label>
									<input type="text" name="nama" required="required" class="form-control" placeholder="Tulis nama dokter ..">
								</div>
                                
								<div class="form-group">
                                    <label for="exampleFormControlSelect1">Spesialis</label>
                                    <select class="form-control" id="pekerjaan" name="spesialis_id">
                                    <option selected disabled>--Lampiran--</option>
                                    <?php 
                                        $spesialis = mysqli_query($koneksi,"SELECT * FROM tb_spesialis");
                                        while($j = mysqli_fetch_array($spesialis)){?>
                                        <option value="<?=$j['id']?>"><?=$j['nama']?></option>
                                    <?php } ?>
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
							<th>SPESIALIS</th>
							<?php if($status == 1) {?>
							<th class="text-center" width="10%">OPSI</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						$data = mysqli_query($koneksi,"SELECT tb_dokter.id, tb_dokter.spesialis_id, tb_dokter.nama, tb_spesialis.id AS id_spesialis, tb_spesialis.nama AS nama_spesialis
                        FROM tb_dokter
                        JOIN tb_spesialis ON tb_dokter.spesialis_id = tb_spesialis.id;
                        ");
						while($d = mysqli_fetch_array($data)){
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['nama']; ?></td>
								<td><?php echo $d['nama_spesialis']; ?></td>
								<?php if($status == 1) {?>
								<td>    
									<div class="text-center">
										<div class="btn-group">
											
											<?php 
											if($d['id'] != "0"){
												?>
												<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_dokter_<?php echo $d['id'] ?>">
													<i class="fa fa-cog"></i>
												</button>
												
												<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_dokter_<?php echo $d['id'] ?>">
													<i class="fa fa-trash"></i>
												</button>
												<?php
											}

											?>
											
										</div>
									</div>

									<form action="dokter_update.php" method="post">
										<div class="modal fade" id="edit_dokter_<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
															<label>Nama Dokter</label>
															<input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['id']; ?>">
															<input type="text" name="nama" required="required" class="form-control" placeholder="Tulis nama dokter .." value="<?php echo $d['nama']; ?>" style="width:100%">
														</div>
														<div class="form-group" style="width:100%">
                                                        <label for="exampleFormControlSelect1">Spesialis</label>
                                                            <select class="form-control" id="pekerjaan" name="spesialis_id">
                                                            <option value="<?=$d['spesialis_id']?>" <?= $d['spesialis_id'] == $d['id_spesialis'] ? 'selected' : ''?> ><?=$d['nama_spesialis']?></option>
                                                            <?php 
                                                                $spesialis = mysqli_query($koneksi,"SELECT * FROM tb_spesialis");
                                                                while($j = mysqli_fetch_array($spesialis)){?>
                                                                <option value="<?=$j['id']?>"><?=$j['nama']?></option>
                                                            <?php } ?>
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
									<div class="modal fade" id="hapus_dokter_<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
													<a href="dokter_hapus.php?id=<?php echo $d['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Hapus</a>
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