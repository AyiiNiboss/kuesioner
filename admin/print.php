<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>KUESIONER SURVEY KEPUASAN MASYARAKAT (SKM)</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

  <?php 
 include '../koneksi/koneksi.php';
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../index.php?alert=belum_login");
  }
  ?>

</head>
<body>

  <center><h5>Data Kuesioner Masyarakat</h5></center>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th width="1%">NO</th>
        <th>NAMA</th>
        <th>E-MAIL</th>
        <th>JENIS KELAMIN</th>
        <th>PEKERJAAN</th>
        <th>SURVEY</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no=1;
      $data = mysqli_query($koneksi,"SELECT * FROM masyarakat");
      while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $d['masyarakat_nama']; ?></td>
          <td><?php echo $d['masyarakat_email']; ?></td>
          <td>
            <?php 
              if ($d['masyarakat_jk'] == 'L') { ?>
                Laki-laki
            <?php  } else { ?>
                Perempuan
             <?php } ?>
          </td>
          <td><?php echo $d['masyarakat_pekerjaan']; ?></td>
          <td>
            <?php 
            $no2 = 1;
            $id = $d['masyarakat_id'];
            if($d['status'] == 1){
            $polling = mysqli_query($koneksi,"SELECT * FROM polling,masyarakat,pertanyaan WHERE masyarakat_id=polling_masyarakat AND masyarakat_id='$id' AND polling_pertanyaan=pertanyaan_id");
            }else{
              $polling = mysqli_query($koneksi,"SELECT * FROM polling_petugas,masyarakat,pertanyaan_petugas WHERE masyarakat_id=polling_masyarakat AND masyarakat_id='$id' AND polling_pertanyaan=pertanyaan_id");
            }
            while($p = mysqli_fetch_array($polling)){
              ?>
              <table class="table">
                <tr>
                  <td class="p-1"><?php echo $p['pertanyaan']; ?></td>
                </tr>
                <tr>
                  <td class="p-1"><?php echo $p['polling_jawaban']; ?></td>
                </tr>
              </table>
              <?php 
            }
            ?>
          </td>
        </tr>
        <?php 
      }
      ?>
    </tbody>
  </table>

  <script type="text/javascript">
    window.print();
  </script>
</body>
</html>
