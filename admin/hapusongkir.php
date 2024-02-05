<?php
include 'inc/koneksi.php';
$id = mysqli_query($config, "SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'");
$data =  mysqli_fetch_assoc($id);

  $sql=mysqli_query($config, "DELETE from ongkir WHERE id_ongkir='$_GET[id]'");

  echo "<script>alert('Data Ongkir Berhasil di HAPUS !!');</script>";
  echo "<script>location='index.php?page=ongkir';</script>";

?>  