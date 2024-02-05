<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cetak Data Produk</title>
</head>
<body>
    <center>
        <h2>Laporan Data Produk</h2>

        <table border="1">
            <thead>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Berat</th>
                <th>Foto</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
</thead>
<tbody>
    <?php
    include 'inc/koneksi.php';
    $sql=mysqli_query($config,"SELECT * FROM produk");
    $nomor = 1;
    while ($data = mysqli_fetch_array($sql)) {
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $data['nama_produk']; ?></td>
            <td><?php echo $data['harga_produk']; ?></td>
            <td><?php echo $data['berat_produk']; ?></td>
            <td>
                <img src="../images/produk/<?php echo $data['foto_produk']; ?>" width=100>
            </td>
            <td><?php echo $data['stok_produk']; ?></td>
            <td><?php echo $data['deskripsi_produk']; ?></td>
            <td><?php echo $data['kategori']; ?></td>
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