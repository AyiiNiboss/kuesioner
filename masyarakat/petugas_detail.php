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
	  <?php 
		$data = mysqli_query($koneksi,"SELECT * FROM tb_spesialis");
		while($d = mysqli_fetch_array($data)){
	   ?>
    <div class="col-lg-4 mb-4">
      <div class="card bg-info text-white">
        <div class="card-body pt-4 d-flex align-items-center justify-content-center">
          <div class="text-center">
            <a href="dokter.php?id=<?=$d['id']?>" class="text-white"><p style="font-size: 14px;text-transform:uppercase;font-weight: bold;"><?php echo $d['nama'] ?></p></a>
            <!-- <small>Isi data diri dan data pertanyaan berikut dengan baik dan benar.</small> -->

          </div>
        </div>
      </div>
    </div>
	<?php } ?>
  </div>
</div>
<br>
<br>
<?php include 'footer.php'; ?>