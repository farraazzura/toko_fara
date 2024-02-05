<h2>Form Ubah Slider <b>TOKO FARA</b></h2>
<hr>
<?php
    include 'inc/koneksi.php';
    $id = mysqli_query($config, "select * from silder where id_slider='$_GET[id]'");
    $data = mysqli_fetch_assoc($id);
?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Slider</label>
        <input type="text" class="form-control" name="ns" value="<?php echo $data['nama_slider'] ?>">
    </div>
    <div class="form-group">
        <label>Gambar Slider</label>
        <img src="images/slider/<?php echo $data['foto'] ?>" width="200">
        <input type="file" class="form-control mt-2" name="ft">
    </div>
    <button class="btn btn-primary w-100" name="ubahslider">UBAH SLIDER</button>
</form>
<?php

if (isset($_POST['ubahslider'])) {
    $namaslider=$_POST['ns'];
    $foto=$_FILES['ft'];
    
     $sql = mysqli_query($config, "update silder set nama_slider='$namaslider',foto='$foto' WHERE id_slider='$_GET[id]'");
    
    echo "<script>alert('Slider berhasil di UBAH!');</script>";
    echo "<script>location='index.php?page=slider';</script>";
}
?>