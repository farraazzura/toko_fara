<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <div class="container">
        <h3><i class="fas fa-shopping-cart mr-2"></i></h3>
        <a class="navbar-brand font-weight-bold" href="/toko_saya">Toko Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=keranjang">Keranjang</a>
                </li>
                <?php if (isset($_SESSION['pelanggan'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=riwayat">Riwayat Belanja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=logout" onclick="return confirm('Ingin Logout ??')">Logout</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=daftar">Daftar</a>
                    </li>
                <?php endif ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=checkout">Checkout</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" placeholder="Ketik disini..." name="input_cari">
                <button class="btn btn-outline-success my-2 my-sm-0" name="cari" type="submit">Cari</button>
            </form>
        </div>
    </div>
</nav>
<div class="row mt-5 no-gutters">
    <div class="col-md-2 bg-light">
        <ul class="list-group list-group-flush p-2 pt-4">
            <li class="list-group-item bg-warning"><i class="fas fa-list"></i> KATEGORI PRODUK</li>
            <li class="list-group-item"><i class="fas fa-angle-right"></i>
                <a href="index.php?page=produkhp" style="text-decoration: none; color:black">
                    Handphone
                </a>
            </li>
            <li class="list-group-item"><i class="fas fa-angle-right"></i>
                <a href="index.php?page=produklaptop" style="text-decoration: none; color:black">
                    Laptop
                </a>
            </li>
            <li class="list-group-item"><i class="fas fa-angle-right"></i>
            <a href="index.php?page=produkelektronik" style="text-decoration: none; color:black">
             Elektronik
            </li>
            <li class="list-group-item"><i class="fas fa-angle-right"></i>
            <a href="index.php?page=produkaksesorishp" style="text-decoration: none; color:black">
             Aksesoris HP
            </li>
            <li class="list-group-item"><i class="fas fa-angle-right"></i> 
            <a href="index.php?page=produkaksesorislaptop" style="text-decoration: none; color:black">
            Aksesoris Laptop
          </li>
            <li class="list-group-item"><i class="fas fa-angle-right"></i> 
            <a href="index.php?page=produkaksesoriselektronik" style="text-decoration: none; color:black">
            Aksesoris Elektronik
          </li>
        </ul>
    </div>
    <div class="col-md-10">