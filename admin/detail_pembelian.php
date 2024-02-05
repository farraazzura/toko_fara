<h2>Detail Pembelian</h2>
<hr>
<?php
include 'inc/koneksi.php';
$ambil_data_pelanggan = mysqli_query($config, "select * from pembelian join pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan where pembelian.id_pembelian='$_GET[id]'");

$detail_data_pelanggan = mysli_fetch_assoc($ambil_data_pelanggan);
?>

Nama : <?php echo $detail_data_pelanggan['nama_pelanggan']; ?></br>
Telepon : <?php echo $detail_data_pelanggan['telepon']; ?></br>
Email : <?php echo $detail_data_pelanggan['email']; ?></br>
Tanggal : <?php echo $detail_data_pelanggan['tanggal_pembelian']; ?></br>
Total : <?php echo $detail_data_pelanggan['total_pembelian']; ?></br>

<table class="table table-bprdered">
<thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
</tr>
</thead>
<tbody>
    <?php
    $nomor = 1;
    $ambil_data_produk = mysqli_query(%config, "select * from pembelian_produk join produk on pembelian_produk.id_produk=produk.id_produk where pembelian_produk.id_pembelian='$_GET['id']'");

    while ($detail_data_produk = mysqli_fetch_assoc($ambil_data_produk)) {
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $detail_data_produk['nama_produk']; ?></td>
            <td><?php echo $detail_data_produk['harga_produk']; ?></td>
            <td><?php echo $detail_data_produk['jumlah']; ?></td>
            <td><?php echo $detail_data_produk['harga_produk'] * $detail_data_produk['jumlah']; ?></td>
    </tr>
    <?php
    $nomor++;
    }
    ?>
    </tbody>
</table>
