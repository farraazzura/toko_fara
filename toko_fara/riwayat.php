<div class="container mt-5 mb-6">
    <h3 class="text-info">Riwayat Belanja : <?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?></h3>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Total</th>
                <th>Aksi</th>
</tr>
</thead>
<tbody>
    <?php
    $nomor = 1;
    //mendapatkan id_pelanggan
    $idpelanggan = $_SESSION['pelanggan']['id_pelanggan'];

    $sql = mysqli_query($config, "SELECT * FROM pembelian WHERE id_pelanggan='$idpelanggan'");
    while ($detail = mysqli_fetch_assoc($sql)) {
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $detail['tanggal_pembelian']; ?></td>
            <td>
                <?php if ($detail['status_pembelian'] == "Sudah KIrim Pembayaran") : ?>
                    <strong class="text-succes"><?php echo $detail['status_pembelian']; ?></strong>
                    <?php else : ?>
                        <strong class="text-danger"><?php echo $detail['status_pembelian']; ?></strong>
                        <?php endif ?>
                        <br>
                        Resi: <?php echo $detail['resi_pengiriman']; ?>
            </td>
            <td>Rp <?php echo number_format($detail['total_pembelian'], 0,",","."); ?></td>
            <td>
                <a href="index.php?page=nota&id=<?php echo $detail['id_pembelian'] ?>"
                class="btn btn-info">Nota</a>
                <?php if ($detail['status_pembelian'] == "pending") : ?>
                    <a href="index.php?page=pembayaran&id=<?php echo $detail['id_pembelian']; ?>"
                    class="btn btn-warning">Input Pembayaran</a>
                    <?php  else : ?>
                        <a href="index.php?page=lihat_pembayaran&id=<?php echo $detail['id_pembelian']; ?>"
                        class="btn btn-succes">Lihat Pembayaran</a>
                        <?php endif ?>
            </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                 </tbody>
             </table>
         </div>
