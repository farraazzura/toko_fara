<h2>Data Pembelian<b> TOKO FARA</b></h2>
<hr>
<form method="post">
    <div class="form-group form-inline">
        <input type="date" class="form-control mr-2" name="cari" />
        <button class="btn btn-succes" name="tombol_cari">CARI</button>
</div>
</form>
<table class="table table-bordered table-hover">
    <thead>
        <th>No</th>
        <th>Id Pembelian</th>
        <th>Id Pelanggan</th>
        <th>Tanggal Pembelian</th>
        <th>Total Pembelian</th>
        <th>Aksi</th>
</thead>
<tbody>
    <?php
    include 'inc/koneksi.php';
    if (isset($_POST['tombol_cari'])) {
        $input = $_POST['cari'];
        if ($input != ""){
            $sql = mysqli_query($config, "SELECT * FROM pembelian WHERE tanggal_pembelian like '%$input%'");
        }else{
            $sql = mysqli_query($config, "SELECT * FROM pembelian");
        }
    } else {
        $sql = mysqli_query($config, "SELECT * FROM pembelian");
    }
    $jumlahrecord = mysqli_num_rows($sql);
    if ($jumlahrecord < 1){
        echo"<tr>";
        echo"<td colspan='8'><center class='bg-danger text-white'>Data Tidak Ditemukan</center></td>";
        echo"</tr>";
        echo"<meta http-equiv='refresh' content='2;url=index.php?page=pembelian'>";
    }else{
        $nomor = 1;
        while ($data = mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $data['id_pembelian']; ?></td>
                <td><?php echo $data['id_pelanggan']; ?></td>
                <td><?php echo $data['tanggal_pembelian']; ?></td>
                <td><?php echo $data['total_pembelian']; ?></td>
                <td><a href="index.php?page=detailpembelian&id=<?php echo $data['id_pembelian']; ?>"
            class="btn btn-info mr-2">Detail</a>
            </td>
        </tr>
        <?php
        $nomor++;
        }
    }
    ?>
    </tbody>
</table>