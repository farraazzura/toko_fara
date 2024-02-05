<h2>form Ubah Produk</h2>
<hr>
<?php
    include 'inc/koneksi.php';
    $id = mysqli_query($config, "select * from produk where id_produk='$_GET[id]'");
    $data = mysqli_fetch_assoc($id);
?>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
        <label>Nama Produk</label>
        <input type="text" class="form-control" name="nm" value="<?php echo $data['nama_produk'] ?>">
</div>
    <div class="form-group">
        <label>Harga Produk (Rp)</label>
        <input type="number" class="form-control" name="hrg" value="<?php echo $data['harga_produk'] ?>">
</div>
    <div class="form-group">
        <label>Berat Produk (Kg) </label>
        <input type="number" class="form-control" name="brt" value="<?php echo $data['berat_produk'] ?>">>
</div>
    <div class="form-group">
        <label>Foto Produk</label>
        <img src="images/produk/<?php echo $data['foto_produk'] ?>" width="200">
        <input type="file" class="form-control mt-2" name="fto">
</div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" class="form-control" name="stk" value="<?php echo $data['stok_produk'] ?>">>
</div>
    <div class="form-group">
        <label>Deskripsi Produk</label>
        <textarea class="form-control" rows="3" name="dsk"><?php echo $data['deskripsi_produk'] ?></textarea>
</div>
<div class="form-group">
    <label>Kategori</label>
    <select class="form-control control-label text-left" name="kat">
        <option value="<?php echo $data['kategori']; ?>"><?php echo $data['kategori']; ?></option>
        <option>Handphone</option>
        <option>Laptop</option>
        <option>Elektronik</option>
        <option>Aksesoris HP</option>
        <option>Aksesoris Laptop</option>
        <option>Aksesoris Elektronik</option>
</select>
</div>
<button class="btn btn-primary w-100" name="ubahproduk">UBAH PRODUK</button>
</form>
<?php

if (isset($_POST['ubahproduk'])) {
    $namaproduk=$_POST['nm'];
    $hargaproduk=$_POST['hrg'];
    $beratproduk=$_POST['brt'];

    $fotoproduk = $_FILES['fto']['name'];
    $lokasi = $_FILES['fto']['tmp_name'];

    $stokproduk=$_POST['stk'];
    $deskripsiproduk=$_POST['dsk'];
    $kategori=$_POST['kat'];

     //jika foto produk diubah
     if (!empty($lokasi)) {
         move_uploaded_file($lokasi, "../images/produk/" . $fotoproduk);
         $sql = mysqli_query($config, "update produk set nama_produk='$namaproduk',harga_produk='$hargaproduk',berat_produk='$beratproduk',foto_produk='$fotoproduk',stok_produk='$stokproduk',deskripsi_produk='$deskripsiproduk',kategori='$kategori' WHERE id_produk='$_GET[id]'");
     }else{
         $sql = mysqli_query($config, "update produk set nama_produk='$namaproduk',harga_produk='$hargaproduk',berat_produk='$beratproduk',stok_produk='$stokproduk',deskripsi_produk='$deskripsiproduk',kategori='$kategori' WHERE id_produk='$_GET[id]'");
     }

    echo "<script>alert('Data Produk Berhasil di UBAH !!');</script>";
    echo "<script>location='index.php?page=produk';</script>";
}
     
?>
