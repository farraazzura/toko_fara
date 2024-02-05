<?php
    $idproduk = $_GET['id'];
    unset($_SESSION['keranjang'][$idproduk]);

    echo "<script>alert('Produk Berhasil Dihapus!!');</script>";
    echo "<script>location='index.php?page=keranjang';</script>";
    ?>