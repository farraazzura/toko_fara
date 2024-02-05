<h2>Data Ongkir<b> TOKO FARA</b></h2>
<hr>
<form method="post">
    <div class="form-group form-inline">
        <input type="text" class="form-control mr-2" name="cari" placeholder="Ketik nama produk..." />
        <button class="btn btn-success" name="tombol_cari">Cari</button>
        <a href="cetakproduk.php" class="btn btn-warning ml-2" target="_blank">Cetak</a>
        <a href="index.php?page=tarif" class="btn btn-primary ml-auto">Tambah Data Ongkir</a>
</iv>
</form>
<table class="table table-bordered table-hover">
    <thead>
        <th>No</th>
        <th>Id Ongkir</th>
        <th>Nama Kota</th>
        <th>Tarif</th>
        <th>Aksi</th>
</thead>
<tbody>
    <?php
    include 'inc/koneksi.php';
    if (isset($_POST['tombol_cari'])) {
        $input = $_POST['cari'];
        if ($input != ""){
            $sql = mysqli_query($config, "SELECT * FROM ongkir WHERE nama_kota like '%$input%'");
        }else{
            $sql = mysqli_query($config, "SELECT * FROM ongkir");
        }
    } else {
        $sql = mysqli_query($config, "SELECT * FROM ongkir");
    }
    $jumlahrecord = mysqli_num_rows($sql);
    if ($jumlahrecord < 1){
        echo"<tr>";
        echo"<td colspan='8'><center class='bg-danger text-white'>Data Tidak Ditemukan</center></td>";
        echo"</tr>";
        echo"<meta http-equiv='refresh' content='2;url=index.php?page=ongkir'>";
    }else{
        $nomor = 1;
        while ($data = mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $data['id_ongkir']; ?></td>
                <td><?php echo $data['nama_kota']; ?></td>
                <td><?php echo $data['tarif']; ?></td>
                <td>
                
                <a href="index.php?page=editongkir&id=<?php echo $data['id_ongkir']; ?>" class="btn btn-info mr-2">Edit</a>
                <a href="index.php?page=hapusongkir&id=<?php echo $data['id_ongkir']; ?>" onclick="return confirm('apakah data dihapus??')" class="btn btn-danger">Hapus</a>
                </td>
        </tr>
        <?php
        $nomor++;
        }
    }
    ?>
    </tbody>
</table>