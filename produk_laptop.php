<?pgp include 'slider.php'; ?>
<h4 class="text-center text-info font-weight-bold m-4">PRODUK TERBARU<h4>
    <div class="row mx-auto">
        <?php
        $sql = mysqli_query($config, "SELECT * FROM produk WHERE kategori='Laptop'");
        while ($data_produk = mysqli_fetch_assoc($sql)) {
            ?>
    <div class="card mr-2 ml-2 mb-4" style="width: 16rem;">
        <img src="images/produk/<?php echo $data_produk['foto_produk']; ?>" class="card-img-top" alt="...">
        <div class="card-body ng-light">
            <h5 class="card-title"><?php echo $data_produk['nama_produk']; ?></h5>
        <p class="card-text"><?php echo "Rp " . number_format($data_produk['harga_produk'], 0,",","."); ?></p>
        <?php if ($data_produk['stok_produk'] != 0): ?>
            <a href="index.php?page=beli&id=<?php echo $data_produk['id_produk']; ?>"
            class="btn btn-danger">Beli</a>
            <a href="index.php?page=detail&id=<?php echo $data_produk['id_produk']; ?>"
            class="btn btn-info">Detail</a>
            <?php else : ?>
                <strong class="badge badge-warning text-weight-bold">HABIS</strong>
                <?php endif ?>
            </div>
        </div>
     <?php
    }
    ?>
    </div>
        
