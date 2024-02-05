<h2>Form Tambah Produk</h2>
<hr>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" class="form-control" name="nm">
</div>
    <div class="form-group">
        <label>Harga Produk (Rp)</label>
        <input type="number" class="form-control" name="hrg">
</div>
    <div class="form-group">
        <label>Berat Produk (Kg) </label>
        <input type="number" class="form-control" name="brt">
</div>
    <div class="form-group">
        <label>Foto Produk</label>
        <input type="file" class="form-control" name="fto">
</div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" class="form-control" name="stk">
</div>
    <div class="form-group">
        <label>Deskripsi Produk</label>
        <textarea class="form-control" rows="3" name="dsk"></textarea>
</div>
<div class="form-group">
    <label>Kategori</label>
    <select class="form-control control-label text-left" name="kat">
        <option>Handphone</option>
        <option>Laptop</option>
        <option>Elektronik</option>
        <option>Aksesoris HP</option>
        <option>Aksesoris Laptop</option>
        <option>Aksesoris Elektronik</option>
</select>
</div>
<button class="btn btn-primary w-100" name="tambah">TAMBAH PRODUK</button> 
</form>
<?php
include 'inc/koneksi.php';
if (isset($_POST['tambah'])) {
    $namaproduk=$_POST['nm'];
    $hargaproduk=$_POST['hrg'];
    $beratproduk=$_POST['brt'];

    $fotoproduk = $_FILES['fto']['name'];
    $lokasi = $_FILES['fto']['tmp_name'];
    move_uploaded_file($lokasi, "../images/produk/" . $fotoproduk);

    $stokproduk=$_POST['stk'];
    $deskripsiproduk=$_POST['dsk'];
    $kategori=$_POST['kat'];

    $sql = mysqli_query($config, "INSERT INTO produk(id_produk,nama_produk,
    harga_produk,berat_produk,foto_produk,stok_produk,deskripsi_produk,kategori)
    VALUES ('','$namaproduk','$hargaproduk','$beratproduk','$fotoproduk',
    '$stokproduk','$deskripsiproduk','$kategori')");

    echo "<script>alert('Produk Berhasil di Tambahkan');</script>";
    echo "<script>location='index.php?page=produk';</script>";
}
?>