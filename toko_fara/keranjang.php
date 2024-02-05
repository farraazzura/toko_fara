<?php
   if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang belanja kosong, silahkan belanja dahulu!');</script>";
    echo "<script>location='index.php';</script>";
   }
   ?>

   <div class="container mt-5 mb-5">
      <h3 class="text-info">Keranjang Belanja</h3>
</hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Jumlah</th>
            <th>Subharga</th>
            <th>Asli</th>
</tr>
</thead>
<tbody>
    <?php $nomor=1 ?>
    <?php foreach ($_SESSION['keranjang'] as $idproduk => $jumlah) :?>
        <?php
        $sql = mysqli_query($config, "SELECT * FROM produk WHERE id_produk='$idproduk'");
        $detail = mysqli_fetch_assoc($sql);
        $subharga = $detail['harga_produk']*$jumlah;
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $detail['nama_produk']; ?></td>
            <td>Rp <?php echo number_format($detail['harga_produk'],0,",","."); ?></td> 
            <td><?php echo $jumlah; ?></td>
            <td>Rp <?php echo number_format($subharga,0,",","."); ?></td>
            <th>
                <a href="index.php?page=hapuskeranjang&id=<?php echo $detail['id_produk']; ?>"
                class="btn btn-danger">Hapus</a>
            </th>
    </tr>
    <?php $nomor++; ?>
    <?php endforeach; ?>
    </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary">Lanjutkan Belanja</a>
    <a href="index.php?page=checkout" class="btn btn-primary">Checkout</a>
    </div>
