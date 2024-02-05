<h2>Data Produk<b> TOKO FARA</b></h2>
<hr>
<form method="post">
    <div class="form-group form-inline">
        <input type="text" class="form-control mr-2" name="cari" placeholder="Ketik nama produk..." />
        <button class="btn btn-success" name="tombol_cari">Cari</button>
        <a href="cetakproduk.php" class="btn btn-warning ml-2" target="_blank">Cetak</a>
        <a href="index.php?page=tambahproduk" class="btn btn-primary ml-auto">Tambah Produk</a>
   </div>
</form>
<table class="table table-bordered table-hover">
    <thead>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Berat</th>
        <th>Foto</th>
        <th>Stok</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
        include 'inc/koneksi.php';
        if (isset($_POST['tombol_cari'])) {
            $input = $_POST['cari'];
            if ($input != "") {
                $sql = mysqli_query($config, "SELECT * FROM produk WHERE nama_produk like '%$input%'");
            } else {
                $sql = mysqli_query($config, "SELECT * FROM produk");    
            }
        } else {
            $sql = mysqli_query($config, "SELECT * FROM produk");
        }
        $jumlahrecord = mysqli_num_rows($sql);
        if ($jumlahrecord < 1) {
            echo "<tr>";
            echo "<td colspan='8'><center class='bg-danger text-white'>Data Tidak Ditemukan</center><td>";
            echo "</tr>";
            echo "<meta http-equiv='refresh' content='2;url=index.php?page=produk'>";
        } else {
            $nomor = 1;
            while ($data = mysqli_fetch_array($sql)) {
        ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['nama_produk']; ?></td>
                    <td><?php echo $data['harga_produk']; ?></td>
                    <td><?php echo $data['berat_produk']; ?></td>
                    <td>
                        <a href='../images/produk/<?php echo $data['foto_produk']; ?>'
                        title='Klik to Zoom' target='_blank'>
                        <img src="../images/produk/<?php echo $data['foto_produk']; ?>" width=100></a>
                    </td>
                    <td><?php echo $data['stok_produk']; ?></td>
                    <td><?php echo $data['deskripsi_produk']; ?></td>
                    <td><a href="index.php?page=ubahproduk&id=<?php echo $data['id_produk']; ?>"
                        class="btn btn-info mr-2">Ubah</a>
                        <a href="index.php?page=hapusproduk&id=<?php echo $data['id_produk']; ?>"
                        onclick="return confirm('apakah data dihapus??')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
        <?php
                $nomor++;
            }
        }
        ?>
    </tbody>
</table>