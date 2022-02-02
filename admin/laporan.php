<?php include '../src/header.php'; ?>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="export-excel.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
        <i class="fas fa-sm text-white-50"></i>Export to Excel
      </a>
      <a href="export-pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
        <i class="fas fa-sm text-white-50"></i>Export to PDF
      </a>
    </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable">
              <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Hasil</th>
                <th>Rangking</th>
              </tr>
            <?php
              $no1 = 1;
              $sql3 = mysqli_query($koneksi, "SELECT * FROM siswa");
              while ($data2 = mysqli_fetch_array($sql3)) {
              }
              $rank = 1;
              $queryT = mysqli_query($koneksi, "SELECT * FROM hasil ORDER BY hasil DESC");
              while($dataT = mysqli_fetch_array($queryT)){
            ?>
            <tbody>
              <tr>
                 <td><?= $no1++ ?></td>
                <td><?= $dataT['nama_siswa'] ?></td>
                <td><?= $dataT['hasil'] ?></td>
                <td><?= $rank++ ?></td>
              </tr>
              <?php }

              $maxHasil = mysqli_query($koneksi, "SELECT max(hasil) as hasil FROM hasil");
              $hasilMax = mysqli_fetch_array($maxHasil);
              ?> 

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../src/footer.php'; ?>