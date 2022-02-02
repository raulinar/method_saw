<?php include '../src/header.php'; ?>

<div class="container-fluid">
  <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>NO.</th>
                <th>ID Kriteria</th>
                <th>Nama Kriteria</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $ambil = mysqli_query($koneksi, "SELECT * FROM kriteria");
              while($data = mysqli_fetch_array($ambil)){
              ?> 
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['id_kriteria'] ?></td>
                <td><?= $data['nama_kriteria'] ?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../src/footer.php'; ?>