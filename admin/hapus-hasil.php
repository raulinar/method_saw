<?php 
include 'koneksi.php';
$id = $_GET['id'];
$del1 = mysqli_query($koneksi, "DELETE FROM hasil_naive WHERE id_hasil='$id'")or die(mysqli_error($koneksi));
if(mysqli_query){
header("location:hasil.php?pesan=hapus");
}
?>