<?php
//jika belum login tidak bisa akses halaman pembayaran
if (!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan Login !');</script>";
    echo "<script>location='login.php';</script>";
}

//dapatkan id pembelian
$idpembelian = $_GET["id"];
$ambil_data_pembelian = mysqli_query($config, "SELECT * FROM pembelian WHERE id_pembelian='idpembelian'");
$detil_pembayaran = mysqli_fetch_assoc($ambil_data_pembelian);

//mendapatkan id pelanggan yang beli
$idyangbeli = $detil_pembayaran['id_pelanggan'];
//mendapatkan id pelanggan yang login
$idyanglogin = $_SESSION['pelanggan']['id_pelanggan'];
if ($idyanglogin !== $idyangbeli) {
    // echo "<script>alert('error!');</script>";
    exit();
}
?>
<div class="container mt-5 mb-5">
    <h2>Konfirmasi Pembayaran</h2>
    <p>kirim Bukti Pembayaran Disini</p>

    <div class="alert alert-info">Total tagihan Anda<strong>Rp 
        <?php echo number_format($detil_pembayaran["total_pembelian"], 0,",","."); ?></strong></div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Penyetor</label>
                <input type="text" name="nama" class="form-control">
</div>
<div class="form-group">
    <label>Bank</label>
    <input type="text" name="bank" class="form-control">
</div>
<div class="form-group">
    <label>Jumlah</label>
    <input type="number" name="Jumlah" class="form-control" min=1>
</div>
<div class="form-group">
    <label>Foto Produk</label>
    <input type="file" name="bukti" class="form-control" accept=".JPG">
    <p class="text-danger">Foto bukti harus JPG maksimal 2MB</p>
</div>
<button class="btn btn-primary" name="Kirim">Kirim</button>
</form>
</div>

<?php
//upload foto terlebih dahulu
if (isset($_POST["kirim"])) {
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafiks = date("YmdHis") . $namabukti;
    move_uploaded_file($lokasibukti, "images/bukti_pembayaran/$namafiks");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $date = date("Y-m-d");

    //simpan pembayaran
    mysqli_query($config, "INSERT INTO pembayaran(id_pembelian,nama_pembayar,bank,jumlah,tanggal,bukti)
    VALUES('$idpembelian','$nama','$bank','$jumlah','$date','$namafiks');");

    //update status pembelian "pending" = "sudah kirim pembayaran"
    mysqli_query($config, "UPDATE pembelian SET status_pembelian='sudah kirim pembayaran'
    WHERE id_pembelian='$idpembelian'");

    echo "<script>alert('Terimaksih anda sudah megirimkan bukti pembayaran');</script>";
    echo "<script>location='index.php?page=riwayat';</script>";
}
?>