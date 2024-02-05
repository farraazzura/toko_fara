<?php
include 'inc/koneksi.php';
    $sql=mysqli_query($config, "DELETE from pelanggan WHERE id_pelanggan='$_GET[id]'");

    echo "<script>alert('Data Pelanggan Berhasil di HAPUS !!');</script>";
    echo "<script>location='index.php?page=pelanggan';</script>";

?>
