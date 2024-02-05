<div class="container mt-5 mb-5">
    <div class="row text-center">
        <div class="col-md-12">
            <h2 class="text-info mb-4">Form Registrasi Pelanggan</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" name="nama" required />
                        </div>
                        <div class="form-group">
                            <label>E-mail </label>
                            <input type="email" class="form-control" name="email" required />
                        </div>
                        <div class="form-group">
                            <label>Password </label>
                            <input type="password" class="form-control" name="pass" required />
                        </div>
                        <div class="form-group">
                            <label>Ulangi Password </label>
                            <input type="password" class="form-control" name="upass" required />
                        </div>
                        <div class="form-group">
                            <label>Telepon </label>
                            <input type="number" class="form-control" name="telp" required />
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" name="alamat" required></textarea>
                        </div>
                        <button class="btn btn-primary w-100 font-weight-bold" name="regis">
                            REGISTRASI!</button>
                    </form>

                    <?php
                    if (isset($_POST['regis'])) {
                        $sql = mysqli_query($config, "SELECT * from pelanggan where email='$_POST[email]'");
                        $cekemail = mysqli_num_rows($sql);

                        if ($cekemail == 1) {
                            echo "<script>alert('Email sudah terdaftar, Gunakan Email yang lain!');</script>";
                            echo "<script>location='index.php?page=daftar';</script>";
                        } else {
                            if ($_POST['upass'] != $_POST['pass']) {
                                echo "<script>alert('Re Password yang diketikkan tidak sama');</script>";
                                echo "<script>location='index.php?page=daftar';</script>";
                            } else {
                                $pwd = $_POST['pass'];
                                $enkripsi_pwd = hash('sha1', $pwd);
                                $sql = mysqli_query($config, "INSERT INTO pelanggan
                                (nama_pelanggan,email,password,telepon,alamat)
                                VALUES ('$_POST[nama]','$_POST[email]','$enkripsi_pwd',
                                '$_POST[telp]','$_POST[alamat]')");

                                echo "<script>alert('Registrasi Berhasil');</script>";
                                echo "<script>location='index.php?page=login';</script>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>