<h2>Data Slider<b> Toko Fara</b></h2>
<hr>
<form method="post">
    <div class="form-group form-inline">
        <input type="text" class="form-control mr-2" name="cari" placeholder="Ketik nama produk..." />
        <button class="btn btn-success" name="tombol_cari">Cari</button>
</div>
</form>
<table class="table table-bordered table-hover">
    <thead>
        <th>No</th>
        <th>Id Slider</th>
        <th>Nama Slider</th>
        <th>Foto</th>
        <th>Aksi</th>
</thead>
<tbody>
    <?php
    include 'inc/koneksi.php';
    if (isset($_POST['tombol_cari'])) {
        $input = $_POST['cari'];
        if ($input != "") {
            $sql = mysqli_query($config, "SELECT * FROM silder WHERE nama_slider like '%$input%'");
        } else {
            $sql = mysqli_query($config, "SELECT * FROM silder");
        }
    } else {
        $sql = mysqli_query($config, "SELECT * FROM silder");
    }
    $jumlahrecord = mysqli_num_rows($sql);
    if ($jumlahrecord < 1){
        echo"<tr>";
        echo"<td colspan='8'><center class='bg-danger text-white'>Slider Tidak Ditemukan</center></td>";
        echo"</tr>";
        echo"<meta http-equiv='refresh' content='2;url=index.php?page=slider'>";
    } else {
        $nomor = 1;
        while ($data = mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>

                <td><?php echo $data['id_slider']; ?></td>
                <td><?php echo $data['nama_slider']; ?></td>
                <td>
                        <a href='../images/slider/<?php echo $data['foto']; ?>'
                        title='Klik to Zoom' target='_blank'>
                        <img src="../images/slider/<?php echo $data['foto']; ?>" width=100></a>
                    </td>
                <td>
                <a href="index.php?page=ubahslider&id=<?php echo $data['id_slider']; ?>" class="btn btn-info mr-2">Ubah</a>
                <a href="index.php?page=hapusslider&id=<?php echo $data['id_slider']; ?>"  onclick="return confirm('Apakah Slider Di Hapus ??')" class="btn btn-danger">Hapus</a>
                </td>
        </tr>
        <?php
        $nomor++;
        }
    }
    ?>
    </tbody>
</table>