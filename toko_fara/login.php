<div class="container mt-5 mb-5">
    <div class="row text-center mt-4">
        <div class="col-md-12">
            <h2 class="text-info mt-4 mb-4">Login Pelanggan</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-light">
                    <strong class="text-secondary">Masukkan E-mail dan Password! </strong>
                </div>
                <div class="card-body">
                    <form role="form" method="post">
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon">
                                <i class="fas fa-envelope text-secondary"></i></span>
                            <input type="email" class="form-control ml-2" name="email" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">
                                <i class="fas fa-lock text-secondary"></i></span>
                            <input type="password" class="form-control ml-2" name="pass" />
                        </div>
                        <button class="btn btn-success w-100 font-weight-bold" name="login">LOGIN!</button>
                    </form>
                    <?php

                    if (isset($_POST['login'])) {
                        $eml = mysqli_real_escape_string($config, $_POST['email']);
                        $pwd = mysqli_real_escape_string($config, $_POST['pass']);
                        $enkripsi_pwd = hash('sha1', $pwd);
                        $sql = mysqli_query($config, "select * from pelanggan
										where email='$eml' AND 
										password='$enkripsi_pwd'");
                        $jumlahrecord = mysqli_num_rows($sql);
                        if ($jumlahrecord == 1) {
                            $_SESSION['pelanggan'] = mysqli_fetch_assoc($sql);
                            echo "<div class='alert alert-info mt-2'><b>Login Sukses</b></div>";
                            //echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                            if (isset($_SESSION['keranjang']) or !empty($_SESSION['keranjang'])) {
                                echo "<script>location='index.php?page=checkout';</script>";
                            } else {
                                echo "<script>location='index.php?page=riwayat';</script>";
                            }
                        } else {
                            echo "<div class='alert alert-danger mt-2'><b>Login Gagal</b></div>";
                            echo "<meta http-equiv='refresh' content='1;url=index.php?page=login';>";
                        }
                    }
                    ?>
                </div>
                <div class="card-footer bg-light">
                    <p>Belum punya akun ? <a href="index.php?page=daftar" class="font-weight-bold">Klik Register</a> </p>
                </div>
            </div>
        </div>
    </div>
</div>