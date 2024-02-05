<div class="container mt-5 mb-5">
    <h3 class="text-info">Nota Belanja</h3>
    <hr>
    <?php
    $sql_join = mysqli_query($config, "SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE id_pembelian='$_GET[id]';");
    $detail_join = mysqli_fetch_assoc($sql_join);
    ?>
    <div class="row">
        <div class="col-md-4">
            <h4 class="text-danger">Pembelian</h4>
            <div class="text-secondary font-weight-bold">
                Nama Pelanggan: <?php echo $detail_join['id_pembelian']; ?><br>
                Tanggal: <?php echo $detail_join['tanggal_pembelian']; ?><br>
                Total Belanja: Rp <?php echo number_format($detail_join['total_pembelian'],0,",","."); ?>
</div>
</div>
<div class="col-md-4">
    <h4 class="text-danger">Pelanggan</h4>
    <div class="text-secondary font-weight-bold">
        Nama Pelanggan: <?php echo $detail_join['nama_pelanggan']; ?><br>
        Telepon Pelanggan: <?php echo $detail_join['telepon']; ?> <br>
        Email Pelanggan: <?php echo $detail_join['email']; ?>
</div>
</div>
<div class="col-md-4">
    <h4 class="text-danger">Pengiriman</h4>
    <div class="text-secondary font-weight-bold">
        Nama Kota: <?php echo $detail_join['nama_kota']; ?><br>
        Tarif: Rp. <?php echo number_format($detail_join['tarif'],0,",","."); ?><br>
        Alamat Pengiriman: <?php echo $detail_join['alamat_pengiriman']; ?>
    </div>
  </div>
</div>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Berat</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subberat</th>
            <th>Subtotal</th>
</tr>
</thead>
<tbody>
    <?php
    $no = 1;
    $sql_pmb_produk = mysqli_query($config, "SELECT * FROM pembelian_produk
    WHERE id_pembelian='$_GET[id]';");
    while ($detail_pmb_produk = mysqli_fetch_assoc($sql_pmb_produk)) {
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $detail_pmb_produk['nama_produk']; ?></td>
            <td><?php echo $detail_pmb_produk['berat_produk']; ?></td>
            <td><?php echo number_format($detail_pmb_produk['harga_produk'],0,",","."); ?></td>
            <td><?php echo $detail_pmb_produk['jumlah']; ?></td>
            <td><?php echo $detail_pmb_produk['sub_berat']; ?></td>
            <td>Rp <?php echo number_format($detail_pmb_produk['sub_harga'],0,",","."); ?></td>
    </tr>
    <?php } ?>
    <?php $no++; ?>
    </tbody>
    </table>
    <div class="row">
        <div class="col-md-7">
            <div class="alert alert-danger">
                <p>
                    Silahkan melakukan pembayaranRp <strong>
                        <?php echo number_format($detail_join['total_pembelian'],0,",","."); ?>
    </strong> ke :<br>
    BANK BNI <strong>123-00000-33333 </strong>An. Admin Toko Saya 
    </p>
      </div>
    </div>
  </div>
</div>
    