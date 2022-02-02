<?php include '../src/header.php'; ?>
    
<!-- Modal Aksi -->
<?php  
include "../src/koneksi.php";
if(isset($_POST['simpan'])){
  $id=$_POST['id_user'];
  $user=$_POST['user'];
  $pass=md5($_POST['pass']);
  $query=mysqli_query($koneksi, "INSERT INTO user VALUES ('$id','$user','$pass')") or die(mysqli_error($koneksi));
    if($query):
      echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
      echo '<meta http-equiv="Refresh" content="0; URL=user.php">';
    else:
      echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
      echo '<meta http-equiv="Refresh" content="0; URL=user.php">';
    endif;             
}elseif(isset($_POST['update'])){
  $id=$_POST['id_user'];
  $user=$_POST['user'];
  $pass=md5($_POST['pass']);
  $query=mysqli_query($koneksi, "UPDATE user SET user='$user',pass='$pass' WHERE id_user='$id'") or die(mysqli_error($koneksi));
    if($query):
      echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
      echo '<meta http-equiv="Refresh" content="0; URL=user.php">';
    else:
      echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
      echo '<meta http-equiv="Refresh" content="0; URL=user.php">';
    endif;
}elseif(isset($_POST['hapus'])){
  $id=$_POST['id_user'];
  $query=mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id'") or die(mysqli_error($koneksi));
    if($query):
      echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di hapus!', 'success');</script>" ;
      echo '<meta http-equiv="Refresh" content="3; URL=user.php">';
    else:
      echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
      echo '<meta http-equiv="Refresh" content="0; URL=user.php">';
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
                    $amil1 = mysqli_query($koneksi, "SELECT max(id_user) AS hasil FROM user") or die(mysqli_error($koneksi));
                    $no = mysqli_fetch_array($amil1);
                    $noBaru = $no['hasil'] + 1;
                    ?>
                    <label for="id_user">Id user </label>
                    <input type="text" name="id_user" class="form-control" value="<?php echo $noBaru; ?>" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="user">Username</label>
                    <input type="text" name="user" class="form-control" placeholder="input username">
                  </div>
                  <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="text" name="pass" class="form-control" placeholder="input password">
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
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            $ambil = mysqli_query($koneksi, "SELECT * FROM user");
            while($data = mysqli_fetch_array($ambil)){
            ?>
            
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['user'] ?></td>
                <td><?= $data['pass'] ?></td>
                      
                <!-- aksi modal edit -->
                <td class="align-middle text-center">
                  <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' data-toggle="modal" data-target="#my<?php echo $data['id_user'];?>"><span aria-hidden="true"></span>Edit</button>
                    <div class="modal fade" id="my<?php echo $data['id_user'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST" role="form">
                              <div class="phAnimate">
                                <label for="id_user">Id user</label>
                                <input name="id_user" class="form-control" placeholder="Input Id" value="<?php echo $data['id_user']; ?>" readonly="">
                              </div>
                              <div class="phAnimate">
                                <label for="user">Username</label>
                                <input type="text" name="user" class="form-control" value="<?php echo $data['user']; ?>">
                              </div>
                              <div class="phAnimate">
                                <label for="pass">Password</label>
                                <input type="text" name="pass" class="form-control" value="<?php echo $data['pass']; ?>">
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
                  <button type="button" class='d-none d-sm-inline-block btn btn-sm btn-success shadow-sm' data-toggle="modal" data-target="#myy<?php echo $data['id_user']; ?>"><span aria-hidden="true"></span>Hapus</button>
                    <div class="modal fade" id="myy<?php echo $data['id_user'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST" role="form">
                              <div class="phAnimate">
                                <label for="id_user">Id user</label>
                                <input name="id_user" class="form-control" placeholder="Input Id" value="<?php echo $data['id_user']; ?>" readonly="">
                              </div>
                              <div class="phAnimate">
                                <label for="nama">Nama user</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" readonly="">
                              </div>
                              <div class="phAnimate">
                                <label for="user">Username</label>
                                <input type="text" name="user" class="form-control" value="<?php echo $data['user']; ?>" readonly="">
                              </div>
                              <div class="phAnimate">
                                <label for="pass">Password</label>
                                <input type="text" name="pass" class="form-control" value="<?php echo $data['pass']; ?>" readonly="">
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
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../src/footer.php'; ?>