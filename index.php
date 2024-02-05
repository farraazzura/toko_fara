<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>Toko Fara</title>

    <style type="text/css">
        .navbar-brand{
            font-family: 'Courgette', cursive;
        }
        </style>
  </head>
  
<body>
    <?php session_start();?>
    <?php include 'admin/inc/koneksi.php';?>
    <?php include 'menu.php'; ?>
    <?php
       if(isset($_GET['page'])){
        if($_GET['page']=="detail"){
          include 'detail.php';
        } elseif($_GET['page']=="keranjang"){
          include 'keranjang.php';
        } elseif($_GET['page']=="beli"){
          include 'beli.php';
        } elseif($_GET['page']=="hapuskeranjang"){
          include 'hapuskeranjang.php';
        } elseif ($_GET['page'] == "login") {
          include 'login.php';
        } elseif ($_GET['page'] == "checkout") {
          include 'checkout.php';
        } elseif ($_GET['page'] == "daftar") {
          include 'daftar.php';
        } elseif ($_GET['page'] == "logout") {
          include 'logout.php';
        } elseif ($_GET['page'] == "nota") {
          include 'nota.php';
        } elseif ($_GET['page'] == "riwayat") {
          include 'riwayat.php';
        } elseif ($_GET['page'] == "pembayaran") {
          include 'pembayaran.php';
        } elseif ($_GET['page'] == "lihat_pembayaran") {
          include 'lihat_pembayaran.php';
        } elseif ($_GET['page'] == "produkhp") {
          include 'produk_hp.php';
        } elseif ($_GET['page'] == "produklaptop") {
          include 'produk_laptop.php';
        } elseif ($_GET['page'] == "produkelektronik") {
          include 'produk_elektronik.php';
        } elseif ($_GET['page'] == "produkaksesoriselektronik") {
          include 'produk_aksesoriselektronik.php';
        } elseif ($_GET['page'] == "produkaksesorishp") {
          include 'produk_aksesorishp.php';
        } elseif ($_GET['page'] == "produkaksesorislaptop") {
          include 'produk_aksesorislaptop.php';
        }
       } else {
        include 'produk.php';
       }
       ?>
       <?php include 'footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

</html>