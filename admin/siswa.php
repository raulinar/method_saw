<?php include '../src/header.php'; ?>
    
<!-- Modal Aksi -->
<?php  
include "../src/koneksi.php";
if(isset($_POST['simpan'])){
  $id=$_POST['id_siswa'];
  $nama=$_POST['nama_siswa'];
  $c1=$_POST['c1'];
  $c2=$_POST['c2'];
  $c3=$_POST['c3'];
  $c4=$_POST['c4'];
  $c5=$_POST['c5'];
  $c6=$_POST['c6'];

  $query=mysqli_query($koneksi, "INSERT INTO siswa VALUES ('$id','$nama','$c1','$c2','$c3','$c4','$c5','$c6')") or die(mysqli_error($koneksi));
    if($query):
      echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
      echo '<meta http-equiv="Refresh" content="0; URL=siswa.php">';
    else:
      echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
      echo '<meta http-equiv="Refresh" content="0; URL=siswa.php">';
    endif;             
}elseif(isset($_POST['update'])){
  $id=$_POST['id_siswa'];
  $nama=$_POST['nama_siswa'];
  $c1=$_POST['c1'];
  $c2=$_POST['c2'];
  $c3=$_POST['c3'];
  $c4=$_POST['c4'];
  $c5=$_POST['c5'];
  $c6=$_POST['c6'];

  $query=mysqli_query($koneksi, "UPDATE siswa SET nama_siswa='$nama',c1='$c1',c2='$c2',c3='$c3',c4='$c4',c5='$c5',c6='$c6' WHERE id_siswa='$id'") or die(mysqli_error($koneksi));
    if($query):
      echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
      echo '<meta http-equiv="Refresh" content="0; URL=siswa.php">';
    else:
      echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
      echo '<meta http-equiv="Refresh" content="0; URL=siswa.php">';
    endif;
}elseif(isset($_POST['hapus'])){
  $id=$_POST['id_siswa'];
  $query=mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa='$id'") or die(mysqli_error($koneksi));
    if($query):
      echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di hapus!', 'success');</script>" ;
      echo '<meta http-equiv="Refresh" content="0; URL=siswa.php">';
    else:
      echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
      echo '<meta http-equiv="Refresh" content="0; URL=siswa.php">';
    endif;
}
?>
<!-- Tutup Modal Aksi -->

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <!-- Modal Tambah -->
      <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm' data-toggle="modal" data-target="#myModal"><span aria-hidden="true"></span>Tambah Data</button>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
              </div>
              <div class="modal-body">
                <form action="" method="POST" role="form">
                  <div class="form-group">
                    <?php
                    $amil1 = mysqli_query($koneksi, "SELECT max(id_siswa) as Maxid FROM siswa") or die(mysqli_error($koneksi));
                    $no1 = mysqli_fetch_array($amil1);
                    $baru = $no1['Maxid'] + 1;
                    ?>
                    <label for="id_siswa">Id Siswa</label>
                    <input type="text" name="id_siswa" class="form-control" value="<?php echo $baru; ?>" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" placeholder="input Nama Siswa" required="">
                  </div>
                  <div class="form-group">
                    <label for="c1">Nilai Matematika</label>
                    <select name="c1" class="form-control" required>
                      <option value="">--- Pilih ---</option>
                      <option value="5">90 s/d 100</option>
                      <option value="4">80 s/d 89</option>
                      <option value="3">70 s/d 79</option>
                      <option value="2">60 s/d 69</option>
                      <option value="1">50 s/d 59</option>
                      <option value="0">0 s/d 49</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="c2">Nilai Bahasa Inggris</label>
                    <select name="c2" class="form-control" required>
                      <option value="">--- Pilih ---</option>
                      <option value="5">90 s/d 100</option>
                      <option value="4">80 s/d 89</option>
                      <option value="3">70 s/d 79</option>
                      <option value="2">60 s/d 69</option>
                      <option value="1">50 s/d 59</option>
                      <option value="0">0 s/d 49</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="c3">Nilai Bahasa Indonesia</label>
                    <select name="c3" class="form-control" required>
                      <option value="">--- Pilih ---</option>
                       <option value="5">90 s/d 100</option>
                      <option value="4">80 s/d 89</option>
                      <option value="3">70 s/d 79</option>
                      <option value="2">60 s/d 69</option>
                      <option value="1">50 s/d 59</option>
                      <option value="0">0 s/d 49</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="c4">Nilai Kimia</label>
                    <select name="c4" class="form-control" required>
                      <option value="">--- Pilih ---</option>
                       <option value="5">90 s/d 100</option>
                      <option value="4">80 s/d 89</option>
                      <option value="3">70 s/d 79</option>
                      <option value="2">60 s/d 69</option>
                      <option value="1">50 s/d 59</option>
                      <option value="0">0 s/d 49</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="c5">Nilai Fisika</label>
                    <select name="c5" class="form-control" required>
                      <option value="">--- Pilih ---</option>
                      <option value="5">90 s/d 100</option>
                      <option value="4">80 s/d 89</option>
                      <option value="3">70 s/d 79</option>
                      <option value="2">60 s/d 69</option>
                      <option value="1">50 s/d 59</option>
                      <option value="0">0 s/d 49</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="c6">Nilai Biologi</label>
                    <select name="c6" class="form-control" required>
                      <option value="">--- Pilih ---</option>
                      <option value="5">90 s/d 100</option>
                      <option value="4">80 s/d 89</option>
                      <option value="3">70 s/d 79</option>
                      <option value="2">60 s/d 69</option>
                      <option value="1">50 s/d 59</option>
                      <option value="0">0 s/d 49</option>
                    </select>
                  </div>
                 
                  <div class="modal-footer">
                    <button type="reset" name="simpan" class="btn btn-primary">Reset</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="simpan" class="btn btn-primary">Tambah Data</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Tutup Modal Tambah -->
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable">
            <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Nilai Matematika</th>
              <th>Nilai Bahasa Inggris</th>
              <th>Nilai Bahasa Indonesia</th>
              <th>Nilai Kimia</th>
              <th>Nilai Fisika</th>
              <th>Nilai Biologi</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            $page = (isset($_GET['page']))? $_GET['page'] : 1;
            $limit = 50;
            $limit_start = ($page - 1) * $limit;

            $ambil = mysqli_query($koneksi, "SELECT * FROM siswa LIMIT ".$limit_start.",".$limit);
            $no = $limit_start + 1;
            while($data = mysqli_fetch_array($ambil)){
            include "nilai/nilai_bobot.php";
            ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama_siswa'] ?></td>
                <td><?= $bobot_raport ?></td>
                <td><?= $bobot_ranking ?></td>
                <td><?= $bobot_absensi ?></td>
                <td><?= $bobot_lomba ?></td>
                <td><?= $bobot_ekstra ?></td>
                <td><?= $bobot_jabatan ?></td>
            
                      
                <!-- aksi modal edit -->
                <td class="align-middle text-center">
                  <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' data-toggle="modal" data-target="#my<?php echo $data['id_siswa'];?>"><span aria-hidden="true"></span>Edit</button>
                    <div class="modal fade" id="my<?php echo $data['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST" role="form">
                              <div class="phAnimate">
                                <label for="id_siswa">Id Siswa</label>
                                <input name="id_siswa" class="form-control" placeholder="Input Id" value="<?php echo $data['id_siswa']; ?>" readonly="">
                              </div>
                              <div class="phAnimate">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" value="<?php echo $data['nama_siswa']; ?>">
                              </div>
                              <div class="phAnimate">
                                <label for="c1">Nilai Matematika</label>
                                <select name="c1" class="form-control" required>
                                  <option value="">--- Pilih ---</option>
                                  <option value="5">90 s/d 100</option>
                                  <option value="4">80 s/d 89</option>
                                  <option value="3">70 s/d 79</option>
                                  <option value="2">60 s/d 69</option>
                                  <option value="1">50 s/d 59</option>
                                  <option value="0">0 s/d 49</option>
                                </select>
                              </div>
                              <div class="phAnimate">
                                <label for="c2">Nilai Bahasa Inggris</label>
                                <select name="c2" class="form-control" required>
                                  <option value="">--- Pilih ---</option>
                                  <option value="5">90 s/d 100</option>
                                  <option value="4">80 s/d 89</option>
                                  <option value="3">70 s/d 79</option>
                                  <option value="2">60 s/d 69</option>
                                  <option value="1">50 s/d 59</option>
                                  <option value="0">0 s/d 49</option>
                                </select>
                              </div>
                              <div class="phAnimate">
                                <label for="c3">Nilai Bahasa Indonesia</label>
                                <select name="c3" class="form-control" required>
                                  <option value="">--- Pilih ---</option>
                                  <option value="5">90 s/d 100</option>
                                  <option value="4">80 s/d 89</option>
                                  <option value="3">70 s/d 79</option>
                                  <option value="2">60 s/d 69</option>
                                  <option value="1">50 s/d 59</option>
                                  <option value="0">0 s/d 49</option>
                                </select>
                              </div>
                              <div class="phAnimate">
                                <label for="c4">Nilai Kimia</label>
                                <select name="c4" class="form-control" required>
                                  <option value="">--- Pilih ---</option>
                                  <option value="5">90 s/d 100</option>
                                  <option value="4">80 s/d 89</option>
                                  <option value="3">70 s/d 79</option>
                                  <option value="2">60 s/d 69</option>
                                  <option value="1">50 s/d 59</option>
                                  <option value="0">0 s/d 49</option>
                                </select>
                              </div>
                              <div class="phAnimate">
                                <label for="c5">Nilai Fisika</label>
                                <select name="c5" class="form-control" required>
                                  <option value="">--- Pilih ---</option>
                                  <option value="5">90 s/d 100</option>
                                  <option value="4">80 s/d 89</option>
                                  <option value="3">70 s/d 79</option>
                                  <option value="2">60 s/d 69</option>
                                  <option value="1">50 s/d 59</option>
                                  <option value="0">0 s/d 49</option>
                                </select>
                              </div>
                              <div class="phAnimate">
                                <label for="c6">Nilai Biologi</label>
                                <select name="c6" class="form-control" required>
                                  <option value="">--- Pilih ---</option>
                                  <option value="5">90 s/d 100</option>
                                  <option value="4">80 s/d 89</option>
                                  <option value="3">70 s/d 79</option>
                                  <option value="2">60 s/d 69</option>
                                  <option value="1">50 s/d 59</option>
                                  <option value="0">0 s/d 49</option>
                                </select>
                              </div>
                  
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Reset</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="update" class="btn btn-primary">Edit Data</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--tutup modal edit -->

                  <!-- Modal Hapus -->
                  <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-success shadow-sm' data-toggle="modal" data-target="#myy<?php echo $data['id_siswa']; ?>"><span aria-hidden="true"></span>Hapus</button>
                    <div class="modal fade" id="myy<?php echo $data['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST" role="form">
                              <div class="phAnimate">
                                <label for="id_siswa">Id Siswa</label>
                                <input name="id_siswa" class="form-control" placeholder="Input Id" value="<?php echo $data['id_siswa']; ?>" readonly="">
                              </div>
                              <div class="phAnimate">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" value="<?php echo $data['nama_siswa']; ?>" readonly="">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class=" btn btn-primary btn-danger" name="hapus">Hapus Data</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- Tutup Modal Hapus -->
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
          <!-- Pagging -->
              <hr>
                <ul class="pagination">
                  <?php
                  if($page == 1){
                  ?>
                    <li class="disabled"><a href="#">First</a></li>
                    <li class="disabled"><a href="#">&laquo;</a></li>
                  <?php
                  }else{
                    $link_prev = ($page > 1)? $page - 1 : 1;
                  ?>
                    <li><a href="siswa.php?page=1">First</a></li>
                    <li><a href="siswa.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                  <?php } ?>
                  <?php
                  $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM siswa");
                  $get_jumlah = mysqli_fetch_array($sql2);
                              
                  $jumlah_page = ceil($get_jumlah['jumlah'] / $limit);
                  $jumlah_number = 3;
                  $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
                  $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
                              
                  for($i = $start_number; $i <= $end_number; $i++){
                    $link_active = ($page == $i)? ' class="active"' : '';
                  ?>
                  <li<?php echo $link_active; ?>><a href="siswa.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php } ?>
                  <?php
                  if($page == $jumlah_page){
                  ?>
                    <li class="disabled"><a href="#">&raquo;</a></li>
                    <li class="disabled"><a href="#">Last</a></li>
                  <?php
                  }else{
                    $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                  ?>
                    <li><a href="siswa.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                    <li><a href="siswa.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                  <?php } ?>
                </ul>
              <hr>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../src/footer.php'; ?>
