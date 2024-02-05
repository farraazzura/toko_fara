<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cetak Data ongkir</title>
</head>
<body>
    <center>
        <h2>Laporan Data Ongkir</h2>

        <table border="1">
            <thead>
                <th>No</th>
                <th>Nama Kota</th>
                <th>Tarif</th>
</thead>
<tbody>
    <?php
    include 'inc/koneksi.php';
    $sql=mysqli_query($config,"SELECT * FROM tarif");
    $nomor = 1;
    while ($data = mysqli_fetch_array($sql)) {
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $data['nama_kota']; ?></td>
            <td><?php echo $data['tarif']; ?></td>
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