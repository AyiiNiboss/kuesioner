<?php include 'header.php'; ?>
<?php 
  $petugas = $_GET['id'];
?>
<style>
    .form-check {
    position: relative;
    display: block;
    padding-left: 35px;
  }
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
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card" style="min-height: 500px">
        <div class="card-body pt-4">

          <div class="text-center">

            <h4>KUESIONER SURVEY KEPUASAN MASYARAKAT (SKM)</h4>
            <small>Isi data diri dan data pertanyaan berikut dengan baik dan benar.</small>

          </div>

          <br>

          <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert'] == "sudah"){
              echo "<div class='text-center alert alert-danger'><b>MAAF!</b> <br> ANDA SUDAH PERNAH MENGISI KUESIONER SEBELUMNYA!</div>";
            }else if($_GET['alert'] == "selesai"){
              echo "<div class='text-center alert alert-success'><b>DATA JAWABAN KUESIONER ANDA TELAH TERSIMPAN</b> <br> TERIMA KASIH TELAH MELUANGKAN WAKTU</div>";
            }
          }
          ?>


          <form action="petugas_kuesioner_act.php" method="post">

            <h5>PROFIL</h5>
            <hr>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="masyarakat_nama" class="form-control" required="required" placeholder="masukan nama lengkap anda">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" name="masyarakat_email" class="form-control" required="required" placeholder="Masukan alamat email anda">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="jenis-kelamin">Jenis Kelamin</label>
                  <select class="form-control" id="jenis-kelamin" name="masyarakat_jk">
                    <option selected disabled>--SIlahkan Pilih--</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="jenis-kelamin">Pendidikan</label>
                  <select class="form-control" id="jenis-kelamin" name="masyarakat_pendidikan">
                    <option selected disabled>--SIlahkan Pilih--</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D3 / D4">D3 / D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="jenis-kelamin">Pekerjaan</label>
                  <select class="form-control" id="pekerjaan" name="masyarakat_pekerjaan">
                    <option selected disabled>--SIlahkan Pilih--</option>
                    <option value="PNS">PNS</option>
                    <option value="POLRI">POLRI</option>
                    <option value="TNI">TNI</option>
                    <option value="SWASTA">SWASTA</option>
                    <option value="WIRAUSAHA">WIRAUSAHA</option>
                    <option value="LAINNYA">LAINNYA</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="hidden" name="polling_id" class="form-control" value="<?php echo $petugas?>" required="required" placeholder="masukan nama lengkap anda">
                  <input type="hidden" name="petugas" class="form-control" value="<?php echo $_GET['nama']?>" required="required" placeholder="masukan nama lengkap anda">
                </div>
              </div>
            </div>
            
            <br>

            <h5>Isi Kuesioner</h5>
            <hr>

            <?php 
            $no = 1;
            $pertanyaan = mysqli_query($koneksi,"SELECT * FROM pertanyaan_petugas");
            while($p = mysqli_fetch_array($pertanyaan)){
              $nox = $no++;
              ?>
              <div class="form-group" data-pertanyaan-id="<?php echo $p['pertanyaan_id'] ?>">
                <?php echo $nox; ?>.
                <label><?php echo $p['pertanyaan'] ?></label>
                <input type="hidden" name="pertanyaan[<?php echo $nox ?>]" value="<?php echo $p['pertanyaan_id'] ?>">
                <br>
                <div class="rating-box">
                  <div class="stars">
                    <i class="fa-solid fa-star" data-value="1"></i>
                    <i class="fa-solid fa-star" data-value="2"></i>
                    <i class="fa-solid fa-star" data-value="3"></i>
                    <i class="fa-solid fa-star" data-value="4"></i>
                    <i class="fa-solid fa-star" data-value="5"></i>
                  </div>
                </div>
                <input type="hidden" class="rating" name="rating[<?php echo $nox ?>]">
              </div>
            <?php 
            }
            ?>
            <div class="form-group">
              <label for="kritik" style="font-weight: 600;">Kritik & Saran</label>
              <textarea class="form-control" name="kritik" id="kritik" rows="3"></textarea>
            </div>
            <br>
            <div class="text-center">
              <small class="text-muted"><i>Pastikan semua jawaban sudah benar sebelum menyelesaikan kuesioner.</i></small>
              <br>
              <br>
              <input type="checkbox" name="setuju" required="required"> Ya, kuesioner telah diisi dengan benar
            </div>

            <br>
            <br>
            
            <input type="submit" value="SELESAI" class="btn btn-primary btn-block">
            <br>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<script>
  const stars = document.querySelectorAll(".stars i");
  const ratings = document.querySelectorAll(".rating");
  const submitButton = document.querySelector('input[type="submit"]');

  stars.forEach((star) => {
    star.addEventListener("click", () => {
      const ratingValue = star.getAttribute("data-value");
      const pertanyaanId = star.parentNode.parentNode.parentNode.getAttribute("data-pertanyaan-id");
      const ratingInput = document.querySelector(`[data-pertanyaan-id="${pertanyaanId}"] .rating`);
      ratingInput.value = ratingValue;

      stars.forEach((s) => {
        const sPertanyaanId = s.parentNode.parentNode.parentNode.getAttribute("data-pertanyaan-id");
        if (pertanyaanId === sPertanyaanId) {
          const starValue = s.getAttribute("data-value");
          if (starValue <= ratingValue) {
            s.classList.add("active");
          } else {
            s.classList.remove("active");
          }
        }
      });
    });
  });

  submitButton.addEventListener("click", (event) => {
    // Periksa apakah semua jawaban bintang telah diisi
    let isAllRatingsFilled = true;
    ratings.forEach((rating) => {
      if (rating.value === "") {
        isAllRatingsFilled = false;
      }
    });

    if (!isAllRatingsFilled) {
      event.preventDefault(); // Mencegah pengiriman formulir jika ada jawaban bintang yang kosong
      alert("Maaf, Anda harus mengisi semua pertanyaan.");
    }
  });
</script>




<?php include 'footer.php'; ?>