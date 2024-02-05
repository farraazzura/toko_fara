<?php
    include 'inc/koneksi.php';
    $id = mysqli_query($config, "SELECT * FROM silder WHERE id_slider='$_GET[id]'");
    $data = mysqli_fetch_assoc($id);

    $fotoproduk = $data['gambar_slider'];
    if (file_exists("../images/slider/$gambarslider"))
    {
        unlink("../images/slider/$gambarslider");
    }

        $sql=mysqli_query($config,"DELETE from silder WHERE id_slider='$_GET[id]'");

    echo "<script>alert('Slider Berhasil di HAPUS !!');</script>";
    echo "<script>location='index.php?page=slider';</script>";
?>  