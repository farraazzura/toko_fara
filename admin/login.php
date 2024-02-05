<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css" />
    <title>Login toko Online</title>
  </head>
  <body>
    <div class="container">
        <div class="row text-center mt-4">
            <div class="col-md-12">
                <h2 class="text-danger mt-4 mb-4">Login Admin Toko Online</h2>
</div>
</div>
<div class="row text-center">
  <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-harder bg-light">
                <strong class="text-info">Masukkan username dan password !!</strong>
</div>
<div class="card-body">
    <form role="form" method="post">
        <br />
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="fas fa-user text-info"></i></span>
            <input type="text" class="form-control ml-2" name="user" />
</div>
<div class="form-group input-group">
    <span calss="input-group-addon"><i class="fas fa-lock text-info"></i></span>
    <input type="password" class="form-control ml-2" name="pass" />
</div>
<button class="btn btn-success w-100 font-weight-bold" name="login">LOGIN!</button>
</form>
<?php
session_start();
// koneksi ke database
include 'inc/koneksi.php';

if (isset($_POST['login'])) {
    $usr = mysqli_real_escape_string($config, $_POST['user']);
    $pwd = mysqli_real_escape_string($config, $_POST['pass']);
    $enkripsi_pwd=hash('sha1',$pwd);
    $sql = mysqli_query($config, "select * from admin
                     where username='$usr' AND
                     password='$enkripsi_pwd'");

    $jumlahrecord = mysqli_num_rows($sql);
    if ($jumlahrecord == 1) {
        $_SESSION['admin'] = mysqli_fetch_assoc($sql);
        echo "<div class='alert alert-info mt-2'><b>Login Sukses</b></div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
     } else {
        echo "<div class='alert alert-danger mt-2'><b>Login Gagal</b></div>";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
     }
           
    }
    ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
    