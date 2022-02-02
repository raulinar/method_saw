<?php include '../src/header.php'; 
$hapus = mysqli_query($koneksi, "TRUNCATE TABLE hasil");?>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <H4>NILAI BOBOT SISWA</H4>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="0%" cellspacing="0" border="1">
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nilai Matematika</th>
                <th>Nilai Bahasa Inggris</th>
                <th>Nilai Bahasa Indonesia</th>
                <th>Nilai Kimia</th>
                <th>Nilai Fisika</th>
                <th>Nilai Biologi</th>
              </tr>
            <?php
            $no = 1;
            $ambil = mysqli_query($koneksi, "SELECT * FROM siswa");
            while($data = mysqli_fetch_array($ambil)){
              include "nilai/nilai_bobot.php";
            ?>
            <tbody>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama_siswa'] ?></td>
                <td><?= $data['c1'] ?></td>
                <td><?= $data['c2'] ?></td>
                <td><?= $data['c3'] ?></td>
                <td><?= $data['c4'] ?></td>
                <td><?= $data['c5'] ?></td>
                <td><?= $data['c6'] ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <H4>TAHAP NORMALISASI</H4>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="0%" cellspacing="0" border="1">
               <?php
                $crMax = mysqli_query($koneksi, "SELECT max(c1) as maxC1, max(c2) as maxC2, max(c3) as maxC3, max(c4) as maxC4, max(c5) as maxC5, max(c6) as maxC6 FROM siswa");
                $max = mysqli_fetch_array($crMax);
              ?>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>C4</th>
                <th>C5</th>
                <th>C6</th>
              </tr>
            <?php
              $sql2 = mysqli_query($koneksi, "SELECT * FROM siswa");
              $no = 1;
              while ($data1 = mysqli_fetch_array($sql2)) {
            ?>
            <tbody>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data1['nama_siswa'] ?></td>
                <td><?= round($data1['c1']/$max['maxC1'],2) ?></td>
                <td><?= round($data1['c2']/$max['maxC2'],2) ?></td>
                <td><?= round($data1['c3']/$max['maxC3'],2) ?></td>
                <td><?= round($data1['c4']/$max['maxC4'],2) ?></td>
                <td><?= round($data1['c5']/$max['maxC5'],2) ?></td>
                <td><?= round($data1['c6']/$max['maxC6'],2) ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <H4>TAHAP PERANKINGAN</H4>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="0%" cellspacing="0" border="1">
               <?php
                $bobot = array(0.20, 0.15, 0.15, 0.15, 0.20, 0.15);

                $crMax = mysqli_query($koneksi, "SELECT max(c1) as maxC1, max(c2) as maxC2, max(c3) as maxC3, max(c4) as maxC4, max(c5) as maxC5, max(c6) as maxC6 FROM siswa");
                $max = mysqli_fetch_array($crMax);
              ?>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Hasil</th>
                <th>Rank</th>
              </tr>
            <?php
              $no1 = 1;
              $sql3 = mysqli_query($koneksi, "SELECT * FROM siswa");
              while ($data2 = mysqli_fetch_array($sql3)) {
                $rangking = round((($data2['c1']/$max['maxC1'])*$bobot[0])+
                  (($data2['c2']/$max['maxC2'])*$bobot[1])+
                  (($data2['c3']/$max['maxC3'])*$bobot[2])+
                  (($data2['c4']/$max['maxC4'])*$bobot[3])+
                  (($data2['c5']/$max['maxC5'])*$bobot[4])+
                  (($data2['c6']/$max['maxC6'])*$bobot[5]),3);

                $input1 = mysqli_query($koneksi, "INSERT INTO hasil VALUES('$no1','$data2[nama_siswa]','$data2[c1]','$data2[c2]','$data2[c3]','$data2[c4]','$data2[c5]','$data2[c6]','$rangking')")or die(mysqli_error($koneksi));
                $no1++;
              }
              $rank = 1;
              $queryT = mysqli_query($koneksi, "SELECT * FROM hasil ORDER BY hasil DESC");
              while($dataT = mysqli_fetch_array($queryT)){
            ?>
            <tbody>
              <tr>
                <td><?= "S".$dataT['id_hasil'] ?></td>
                <td><?= $dataT['nama_siswa'] ?></td>
                <td><?= $dataT['hasil'] ?></td>
                <td><?= $rank++ ?></td>
              </tr>
              <?php }

              $maxHasil = mysqli_query($koneksi, "SELECT max(hasil) as hasil FROM hasil");
              $hasilMax = mysqli_fetch_array($maxHasil);
              ?> 
              <tr align="center">
                <th colspan="3"><?= "Nilai Terbesar adalah : ".$hasilMax['hasil'] ?></th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
<?php include '../src/footer.php'; ?>