<?php 
$id_pembelian = $_GET["id"];

//ambil data
$ambil_data_pembelian = mysqli_query($config, "SELECT * FROM pembayaran LEFT JOIN pembelian ON pembelian.id_pembelian=pembayaran.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
$detil_pembayaran = mysqli_fetch_assoc($ambil_data_pembelian);

//jika belum ada data pembelian
if (empty($detil_pembayaran)) {
    echo "<script>alert('Belum ada data pembayaran');</script>";
    echo "<script>location='index.php?page=riwayat';</script>";
    exit();
}
?>
<div class="container mt-5 mb-5">
    <h3>Lihat Pembayaran</h3>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td><?php echo $detil_pembayaran['nama_pembayar']; ?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?php echo $detil_pembayaran['bank']; ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?php echo $detil_pembayaran['tanggal']; ?></td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>Rp <?php echo format_number($detil_pembayaran['jumlah'], 0,",","."); ?></td>
                </tr>
</table>
</div>
<div class="col-md-6">
    <img src="images/bukti_pembayaran/<?php echo $detil_pembayaran['bukti'] ?>" alt=""
    class="img-responsive">
    </div>
  </div>
</div>