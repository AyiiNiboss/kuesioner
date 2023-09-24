<?php include 'header.php'; ?>

<div class="container">

	<div class="text-center">
		<?php 
			$id = $_GET['id'];
			$polling = mysqli_query($koneksi, "SELECT * FROM petugas WHERE petugas_id = $id");
        	$row = mysqli_fetch_assoc($polling);
			$nama = $row['petugas_nama'];
		?>
		<h5 class="text-bold">Rekapan data <?php echo $nama ?> </h5>
	</div>
		<br>
		

	<br>
	<div class="text-center">
		<h5>Grafik Polling</h5>
	</div>
	<br>
	<div class="row">
		<?php 
		$id = $_GET['id'];

		function stringToColorCode($str) {
			$code = dechex(crc32($str));
			$code = substr($code, 0, 6);
			return "#".$code;
		}

		$pertanyaan = mysqli_query($koneksi,"SELECT * FROM pertanyaan");
		while($p = mysqli_fetch_array($pertanyaan)){
			?>

			<div class="col-lg-4">
				
				<div class="text-center">
					<div class="card mb-4">
						<div class="card-body">

							<h6><?php echo $p['pertanyaan'] ?></h6>
							<br>
							<div class="chart-container" style="position: relative; height:auto; width:100%">
								<canvas id="grafik<?php echo $p['pertanyaan_id']; ?>"></canvas>
							</div>


							<?php 
							$id_pertanyaan = $p['pertanyaan_id'];
							$jawaban = mysqli_query($koneksi,"SELECT * FROM jawaban WHERE jawaban_pertanyaan='$id_pertanyaan'");
							while($j = mysqli_fetch_array($jawaban)){
								$id_jawaban = $j['jawaban_id'];
								$jj = mysqli_query($koneksi,"SELECT * FROM polling WHERE polling_jawaban='$id_jawaban' AND polling_petugas = $id");
								$jjj = mysqli_num_rows($jj);
								echo "<small class='badge badge-primary' style='background:".stringToColorCode($id_jawaban)."'>".$j['jawaban'] . ' = ' . $jjj."</small>";
								?>
								<?php 
							}
							?>


						</div>
					</div>
				</div>
				
			</div>

			<?php
		}
		?>
	</div> <br><br>
		<div class="card mb-4">
			<div class="card-body">
				<p class="text-center">GRAFIK MASYARAKAT BERDASARKAN PENDIDIKAN</p>
				
			<br>
			<div class="chart-container" style="position: relative; height:auto; width:100%">
				<canvas id="grafik_prodi"></canvas>
			</div>

		</div>
		</div>
</div>


<?php include 'footer.php'; ?>