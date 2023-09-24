<?php include 'header.php'; ?>
<style>
	.btn-green {
    background-color: #51bbc6;
	}
	.btn:hover {
		background-color: #1aa0ae;
	}
</style>

<div class="container-fluid">

	<div class="mb-4">
		<h4>Data Masyarakat & Kuesioner</h4>
		<small>Masyarakat yang sudah mendaftar & mengisi kuesioner</small>
	</div>

	<div class="row mb-3">
		<div class="col-lg-12">
			<a class="btn btn-green text-white btn-sm" target="_blank" href="gabungan.php">
				<i class="fa fa-print"></i> &nbsp Print
			</a>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			
			<div class="table-responsive">
				<table class="table table-bordered table-striped" id="table-datatable">
					<thead>
						<tr>
							<th width="1%">NO</th>
							<th>NAMA</th>
							<th>E-MAIL</th>
							<th>JENIS KELAMIN</th>
							<th>PENDIDIKAN</th>
							<th>PEKERJAAN</th>
							<th>NAMA PETUGAS</th>
							<th width="15%" class="text-center">ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						$data = mysqli_query($koneksi,"SELECT * FROM masyarakat ");
						while($d = mysqli_fetch_array($data)){
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['masyarakat_nama']; ?></td>
								<td><?php echo $d['masyarakat_email']; ?></td>
								<td>
									<?php 
										if ($d['masyarakat_jk'] == 'L') { ?>
											Laki-Laki
										<?php } else { 	
										?>
											Perempuan
										<?php } 
										?>	
								</td>
								<td><?php echo $d['masyarakat_pendidikan']; ?></td>
								<td><?php echo $d['masyarakat_pekerjaan']; ?></td>
								<td><?php echo $d['petugas']; ?></td>
								<td class="text-center">    
									<a href="masyarakat_survey.php?id=<?php echo $d['masyarakat_id'] ?>&petugas=<?=$d['petugas']?>" class="btn btn-info btn-sm">
										<i class="fa fa-file"></i> Lihat Kuesioner
									</a>
									<?php if($status == 1) {?>
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_masyarakat_<?php echo $d['masyarakat_id'] ?>">
										<i class="fa fa-trash"></i>
									</button>
									<?php } ?>
									<!-- modal hapus -->
									<div class="modal fade" id="hapus_masyarakat_<?php echo $d['masyarakat_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">

													<p>Yakin ingin menghapus data ini ?</p>
													<small>Semua data yang terhubung dengan data ini akan ikut di hapus</small>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Tidak</button>
													<a href="masyarakat_hapus.php?id=<?php echo $d['masyarakat_id'] ?>&status=<?php echo $d['status'] ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i>  Hapus</a>
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