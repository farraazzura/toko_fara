<h2>Form Tambah Ongkir</h2>
<hr>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Kota</label>
        <input type="text" class="form-control" name="nmkt">
</div>
    <div class="form-group">
        <label>Tarif (Rp)</label>
        <input type="number" class="form-control" name="trf">
</div>
<button class="btn btn-primary w-100" name="tambah">TAMBAH PRODUK</button> 
</form>
<?php
include 'inc/koneksi.php';
if (isset($_POST['tambah'])) {
    $namakota=$_POST['nmkt'];
    $tarif=$_POST['trf'];

    $sql = mysqli_query($config, "INSERT INTO tarif(id_ongkir,nama_kota,
    tarif) VALUES ('','$namakota','$tarif')");

    echo "<script>alert('Ongkir Berhasil di Tambahkan');</script>";
    echo "<script>location='index.php?page=ongkir';</script>";
}
?>