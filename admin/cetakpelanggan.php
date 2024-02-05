<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cetak Data Pelanggan</title>
</head>
<body>
    <center>
        <h2>Laporan Data Pelanggan</h2>
        <table border="1">
            <thead>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
</thead>
<tbody>
    <?php
    include 'inc/koneksi.php';
    $sql=mysqli_query($config, "SELECT * FROM pelanggan");
    $nomor = 1;
    while ($data= mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $data['nama_pelanggan']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['telepon']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
    </tr>
    <?php
    $nomor++;
}
?>
</tbody>
</table>
</center>
<script>
    window.print();
    </script>
    </body>
    </html>
    