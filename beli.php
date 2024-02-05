<?php
   $idproduk = $_GET['id'];

   if(isset($_SESSION['keranjang'][$idproduk])) {
    $_SESSION['keranjang'][$idproduk]+=1;
   } else {
    $_SESSION['keranjang'][$idproduk]=1;   
   }
   echo"<script>alert('Produk telah dimasukkan ke keranjang belanja!');</script>";
   echo"<script>location='index.php?page=keranjang';</script>";
?>
   