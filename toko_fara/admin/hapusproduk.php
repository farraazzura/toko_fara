<?php
    include 'inc/koneksi.php';
    $id = mysqli_query($config, "SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $data = mysqli_fetch_assoc($id);

    $fotoproduk = $data['foto_produk'];
    if (file_exists("../images/produk/$fotoproduk"))
    {
        unlink("../images/produk/$fotoproduk");
    }

        $sql=mysqli_query($config,"DELETE from produk WHERE id_produk='$_GET[id]'");

    echo "<script>alert('Data Produk Berhasil di HAPUS !!');</script>";
    echo "<script>location='index.php?page=produk';</script>";
?>  