<?php
   $idproduk = $_GET['id'];
   $sql = mysqli_query($config, "SELECT * FROM produk WHERE id_produk='$idproduk'");
   $detail = mysqli_fetch_assoc($sql);
   ?>

   <div class="container m-5">
      <div class="row mx-auto">
        <div class="col-md-5">
            <img src="images/produk/<?php echo $detail['foto_produk']; ?>">
</div>
<div class="col-md-5">
    <h1><?php echo $detail['nama_produk']; ?></h1>
    <h3>Rp <?php echo number_format($detail['harga_produk'], 0,",","."); ?></h3>
    <h5>Stok : <?php echo $detail['stok_produk'] ?></h5>

    <form method="post">
        <div class="form-group form-inline">
            <input type="number" name="jumlah" class="form-control col-md-10 mr-1" min="1"
            max="<?php echo $detail['stok_produk'] ?>">
            <button class="btn btn-primary" name="beli">Beli</button>
</div>
</form>
<?php
   if(isset($_POST['beli'])) {
    if ($_POST['jumlah'] < 1) {
        echo "<script>alert('Anda Belum Memasukkan Jumlah Pembelian !!');</script>";
    } else {
        $jumlah = $_POST['jumlah'];
        if (isset($_SESSION['keranjang'][$idproduk])) {
            $_SESSION['keranjang'][$idproduk] += $jumlah;
        } else {
            $_SESSION['keranjang'][$idproduk] = $jumlah;
        }
        echo "<script>alert('Produk Telah Dimasukkan Ke Keranjang Belanja !!');</script>";
        echo "<script>location='index.php?page=keranjang';</script>";
    }
   }
   ?>
   <h6><?php echo $detail['deskripsi_produk']; ?></h6>
      </div>
   </div>
</div>