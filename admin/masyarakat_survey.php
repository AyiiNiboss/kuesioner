<?php include 'header.php'; ?>

<style>
	@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

.rating-box {
  position: relative;
  background: #fff;
  padding: 25px 50px 35px;
  border-radius: 25px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
}
.rating-box header {
  font-size: 22px;
  color: #dadada;
  font-weight: 500;
  margin-bottom: 20px;
  text-align: center;
}
.rating-box .stars {
  display: flex;
  align-items: center;
  gap: 25px;
}
.stars i {
  color: #e6e6e6;
  font-size: 35px;
  cursor: pointer;
  transition: color 0.2s ease;
}
.stars i.active {
  color: #ff9c1a;
}
</style>
<div class="container">

	<div class="mb-4">
		<h4>Data Kuesioner Masyarakat</h4>
		<small>Detail data kuesioner masyarakat.</small>
	</div>

	<div class="row mb-3">
		<div class="col-lg-12">
			<a class="btn btn-primary btn-sm" href="masyarakat.php">
				<i class="fa fa-arrow-left"></i> &nbsp Kembali
			</a>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			
			<div class="row">
				<div class="col-lg-5">
					<h5>Data Masyarakat</h5>
					<?php 
					$id = $_GET['id'];
					$data = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE masyarakat_id ='$id'");
					while($d = mysqli_fetch_array($data)){
						?>
						<table class="table table-bordered table-striped">
							<tr>
								<td>NAMA</td>
								<td><?php echo $d['masyarakat_nama']; ?></td>
							</tr>
							<tr>
								<td>E-MAIL</td>
								<td><?php echo $d['masyarakat_email']; ?></td>
							</tr>
							<tr>
								<td>JENIS KELAMIN</td>
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
							</tr>
							<tr>
								<td>PEKERJAAN</td>
								<td><?php echo $d['masyarakat_pekerjaan']; ?></td>
							</tr>
						</table>
						<table class="table table-bordered table-striped">
							<tr>
								<td>NAMA PETUGAS</td>
								<td><?=$_GET['petugas']?></td>
							</tr>
						</table>
						<br><br>
						<?php 
						$datas = mysqli_query($koneksi,"SELECT * FROM tb_kritik WHERE masyarakat_id ='$id'");
						while($item = mysqli_fetch_array($datas)){
							?>
						<table class="table table-bordered table-striped">
							<tr>
								<td class="text-center">Kritik & Saran</td>
							</tr>
							<tr>
								<td><?php echo $item['kritik'] ?></td>
							</tr>
						</table>
						<?php } ?>
						
				</div>

				<div class="col-lg-7">
					<h5>Data Kuesioner</h5>
					<?php if($d['status'] == 1){ ?>
					<?php 
						$no = 1;
						$polling = mysqli_query($koneksi,"SELECT * FROM polling_dokter,masyarakat,pertanyaan_dokter WHERE masyarakat_id=polling_masyarakat AND masyarakat_id='$id' AND polling_pertanyaan=pertanyaan_id");
					}else{
						$no = 1;
						$polling = mysqli_query($koneksi,"SELECT * FROM polling_petugas,masyarakat,pertanyaan_petugas WHERE masyarakat_id=polling_masyarakat AND masyarakat_id='$id' AND polling_pertanyaan=pertanyaan_id");
						
					}

					while($p = mysqli_fetch_array($polling)){
					?>
						<table class="table table-bordered table-striped">
							<tr>
								<td width="1%"><?php echo $no++ ?></td>
								<td><?php echo $p['pertanyaan']; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<?php if($p['polling_jawaban'] == 1 ){ ?> 
										<div class="stars">
											<i class="fa-solid fa-star active" data-value="1"></i>
											<i class="fa-solid fa-star" data-value="2"></i>
											<i class="fa-solid fa-star" data-value="3"></i>
											<i class="fa-solid fa-star" data-value="4"></i>
											<i class="fa-solid fa-star" data-value="5"></i>
										</div>
										<?php } ?>
									<?php if($p['polling_jawaban'] == 2 ){ ?> 
										<div class="stars">
											<i class="fa-solid fa-star active" data-value="1"></i>
											<i class="fa-solid fa-star active" data-value="2"></i>
											<i class="fa-solid fa-star" data-value="3"></i>
											<i class="fa-solid fa-star" data-value="4"></i>
											<i class="fa-solid fa-star" data-value="5"></i>
										</div>
										<?php } ?>
									<?php if($p['polling_jawaban'] == 3 ){ ?> 
										<div class="stars">
											<i class="fa-solid fa-star active" data-value="1"></i>
											<i class="fa-solid fa-star active" data-value="2"></i>
											<i class="fa-solid fa-star active" data-value="3"></i>
											<i class="fa-solid fa-star" data-value="4"></i>
											<i class="fa-solid fa-star" data-value="5"></i>
										</div>
										<?php } ?>
									<?php if($p['polling_jawaban'] == 4 ){ ?> 
										<div class="stars">
											<i class="fa-solid fa-star active" data-value="1"></i>
											<i class="fa-solid fa-star active" data-value="2"></i>
											<i class="fa-solid fa-star active" data-value="3"></i>
											<i class="fa-solid fa-star active" data-value="4"></i>
											<i class="fa-solid fa-star" data-value="5"></i>
										</div>
										<?php } ?>
									<?php if($p['polling_jawaban'] == 5 ){ ?> 
										<div class="stars">
											<i class="fa-solid fa-star active" data-value="1"></i>
											<i class="fa-solid fa-star active" data-value="2"></i>
											<i class="fa-solid fa-star active" data-value="3"></i>
											<i class="fa-solid fa-star active" data-value="4"></i>
											<i class="fa-solid fa-star active" data-value="5"></i>
										</div>
										<?php } ?>
								</td>
							</tr>
						</table>
						<?php 
					}
				}
					?>
				</div>

			</div>

		</div>
	</div>

</div>


<?php include 'footer.php'; ?>