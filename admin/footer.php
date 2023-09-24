</div>
<nav class="p-3 bg-white border mt-5" style="text-align: center;">

  <small><?php echo date('Y') ?> - KUESIONER SURVEY KEPUASAN MASYARAKAT (SKM)</small>

</nav>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/plugin/datatables/js/jquery.dataTables.min.js"></script>
<script src="../assets/plugin/datatables/js/dataTables.bootstrap4.min.js"></script>

<script src="../assets/plugin/chart.js/Chart.min.js"></script>


<script>
  $(document).ready(function() {

    $('#table-datatable').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
      "pageLength": 20
    });

  });
  $(document).ready(function() {

    $('#table-datatable2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
      "pageLength": 20
    });

  });
  $(document).ready(function() {

    $('#table-datatable3').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
      "pageLength": 20
    });

  });

  $(document).ready(function() {

    $('#table-datatable4').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
      "pageLength": 20
    });

  });
  $(document).ready(function() {

    $('#table-datatable5').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': true,
      "pageLength": 20
    });

  });
</script>

<script type="text/javascript">
  var randomScalingFactor = function() {
    return Math.round(Math.random() * 100)
  };

  var barChartData = {
  labels: [
    <?php
    $polling = mysqli_query($koneksi, "SELECT DISTINCT polling_masyarakat FROM polling WHERE polling_petugas = $id");
    $labels = array(); // Buat array untuk menyimpan label
    while ($y = mysqli_fetch_array($polling)) {
      $polling_masyarakat = $y['polling_masyarakat'];
      $query = mysqli_query($koneksi, "SELECT masyarakat_pendidikan, COUNT(*) as jumlah FROM masyarakat WHERE masyarakat_id = '$polling_masyarakat' GROUP BY masyarakat_pendidikan");
      
      while ($p = mysqli_fetch_array($query)) {
        $masyarakat_pendidikan = $p['masyarakat_pendidikan'];
        
        if (!in_array($masyarakat_pendidikan, $labels)) {
          $labels[] = $masyarakat_pendidikan; // Tambahkan label ke dalam array jika belum ada
        }
      }
    }
    
    echo "'" . implode("','", $labels) . "'"; // Gabungkan label dengan koma dan kutip, dan cetak
    ?>
  ],
  datasets: [{
    label: 'Masyarakat',
    fillColor: "rgba(51, 240, 113, 0.61)",
    strokeColor: "rgba(11, 246, 88, 0.61)",
    highlightFill: "rgba(220,220,220,0.75)",
    highlightStroke: "rgba(220,220,220,1)",

    data: [
      <?php
      $polling = mysqli_query($koneksi, "SELECT DISTINCT polling_masyarakat FROM polling WHERE polling_petugas = $id");
      $data = array(); // Buat array untuk menyimpan data
      
      while ($pi = mysqli_fetch_array($polling)) {
        $polling_masyarakat = $pi['polling_masyarakat'];
        $query = mysqli_query($koneksi, "SELECT masyarakat_pendidikan, COUNT(*) as jumlah FROM masyarakat WHERE masyarakat_id IN (SELECT polling_masyarakat FROM polling WHERE polling_petugas = $id) GROUP BY masyarakat_pendidikan");
        
        $labelData = array(); // Buat array untuk menyimpan data label
        
        while ($p = mysqli_fetch_array($query)) {
          $masyarakat_pendidikan = $p['masyarakat_pendidikan'];
          $jumlah = $p['jumlah'];
          
          $labelData[$masyarakat_pendidikan] = $jumlah; // Tambahkan data ke dalam array
        }
        
        // Tambahkan data dari labelData ke dalam array data
        foreach ($labels as $label) {
          if (isset($labelData[$label])) {
            $data[] = $labelData[$label];
          } else {
            $data[] = 0; // Jika data tidak ada untuk label tertentu, isi dengan 0
          }
        }
      }
      
      echo implode(',', $data); // Gabungkan data dengan koma dan cetak
      ?>
    ]
  }]
};


  window.onload = function() {
    var ctx = document.getElementById("grafik_prodi").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
      responsive: true,
      animation: true,
      barValueSpacing: 5,
      barDatasetSpacing: 1,
      tooltipFillColor: "rgba(0,0,0,0.8)",
      multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
    });

    <?php
    $pertanyaan = mysqli_query($koneksi, "SELECT * FROM pertanyaan");
    while ($pp = mysqli_fetch_array($pertanyaan)) {
    ?>
      var ctx = document.getElementById("grafik<?php echo $pp['pertanyaan_id'] ?>").getContext("2d");
      window.myPie = new Chart(ctx).Pie(pollingPieData_<?php echo $pp['pertanyaan_id']; ?>);
    <?php
    }
    ?>

  }


  <?php
  $pertanyaan = mysqli_query($koneksi, "SELECT * FROM pertanyaan");
  while ($pp = mysqli_fetch_array($pertanyaan)) {
    $id_pertanyaan = $pp['pertanyaan_id'];
  ?>
    var pollingPieData_<?php echo $pp['pertanyaan_id']; ?> = [

      <?php
      $jawaban = mysqli_query($koneksi, "SELECT * FROM jawaban WHERE jawaban_pertanyaan='$id_pertanyaan'");
      while ($j = mysqli_fetch_array($jawaban)) {
        $id_jawaban = $j['jawaban_id'];
        $jj = mysqli_query($koneksi, "SELECT * FROM polling WHERE polling_jawaban='$id_jawaban' AND polling_petugas = $id");
        $jjj = mysqli_num_rows($jj);
      ?> {
          value: <?php echo $jjj ?>,
          color: "<?php echo stringToColorCode($id_jawaban); ?>",
          highlight: "<?php echo stringToColorCode($id_jawaban); ?>",
          label: "<?php echo $j['jawaban'] ?>"
        },
      <?php
      }
      ?>

    ];
  <?php
  }
  ?>
</script>

</body>

</html>