<h2>Data Pelanggan<b> TOKO FARA</b></h2>
<hr>
<form method="post">
    <div class="form-group form-inline">
        <input type="text" class="form-control mr-2" name="cari" placeholder="Ketik nama pelanggan.." />
        <button class="btn btn-succes" name="tombol_cari">Cari</button>
        <a href="cetakpelanggan.php" class="btn btn-warning ml-2" target="_blank">Cetak</a>
</div>
</form>
<table class="table table-bordered table-hover">
    <thead>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Email</th>
        <th>telepon</th>
        <th>Aksi</th>
</thead>
<tbody>
    <?php
    include 'inc/koneksi.php';
    if (isset($_POST['tombol_cari'])) {
        $input = $_POST['cari'];
        if ($input != "") {
            $sql = mysqli_query($config, "SELECT * FROM pelanggan WHERE nama_pelanggan like '%$input&'");
        }else{
            $sql = mysqli_query($config, "SELECT * FROM pelanggan");
        }
    }else{
        $sql = mysqli_query($config, "SELECT * FROM pelanggan");
    }
    $jumlahrecord = mysqli_num_rows($sql);
    if($jumlahrecord < 1) {
        echo "<tr>";
        echo "<td colspan='8'><center class='bg-danger text-wite'>Data Tidak Ditemukan</center><td>";
        echo "</tr>";
        echo "<meta http-equiv='refresh' content='2;ur=index.php?page=pelanggan'>";
    } else {
        $nomor = 1;
        while ($data = mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $data['nama_pelanggan']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['telepon']; ?></td>
                <td>
                    <a href="index.php?page=pelanggan&id=<?php echo $data['id_pelanggan']; ?>"
                    onclick="return confirm('apakah Data Di Hapus ??')" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php
        $nomor++;
        }
    }
    ?>
    </tbody>
</table>