<h2>form Ubah Ongkir</h2>
<hr>
<?php
    include 'inc/koneksi.php';
    $id = mysqli_query($config, "select * from ongkir where id_ongkir='$_GET[id]'");
    $data = mysqli_fetch_assoc($id);
?>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
        <label>Nama Kota</label>
        <input type="text" class="form-control" name="nmkt" value="<?php echo $data['nama_kota'] ?>">
</div>
    <div class="form-group">
        <label>Tarif (Rp)</label>
        <input type="number" class="form-control" name="trf" value="<?php echo $data['tarif'] ?>">
</div>
<button class="btn btn-primary w-100" name="editongkir">EDIT ONGKIR</button>
</form>
<?php

if (isset($_POST['editongkir'])) {
    $namakota=$_POST['nmkt'];
    $tarif=$_POST['trf'];

    $sql = mysqli_query($config, "UPDATE ongkir set nama_kota ='$namakota', tarif='$tarif' WHERE id_ongkir='$_GET[id]'");


    echo "<script>alert('Data Ongkir Berhasil di EDIT !!');</script>";
    echo "<script>location='index.php?page=ongkir';</script>";
}
     
?>
