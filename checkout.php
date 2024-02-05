<?php
if (!isset($_SESSION['pelanggan'])) {
	echo "<script>alert('Silahkan login dahulu!');</script>";
	echo "<script>location='index.php?page=login';</script>";
}
if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
	echo "<script>alert('Keranjang belanja masih kosong,silahkan belanja dahulu!');</script>";
	echo "<script>location='index.php';</script>";
}
?>
<div class="container mt-5 mb-5">
	<h3 class="text-info">Checkout Belanja</h3>
	<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Subharga</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor = 1; ?>
			<?php $totalbelanja = 0; ?>
			<?php foreach ($_SESSION['keranjang'] as $idproduk => $jumlah) : ?>
				<?php
				$sql_produk = mysqli_query($config, "SELECT * FROM produk 
					WHERE id_produk='$idproduk'");
				$detail_produk = mysqli_fetch_assoc($sql_produk);
				$subharga = $detail_produk['harga_produk'] * $jumlah;
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $detail_produk['nama_produk']; ?></td>
					<td>Rp <?php echo number_format($detail_produk['harga_produk'], 0, ",", "."); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp <?php echo number_format($subharga, 0, ",", "."); ?></td>
				</tr>
				<?php $nomor++; ?>
				<?php $totalbelanja += $subharga; ?>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">Total belanja</th>
				<th>Rp <?php echo number_format($totalbelanja, 0, ",", ".") ?></th>
			</tr>
		</tfoot>
	</table>
	<form method="post">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>" class="form-control">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<input type="number" readonly value="<?php echo $_SESSION['pelanggan']['telepon'] ?>" class="form-control">
				</div>
			</div>
			<div class="col-md-4">
				<select class="form-control" name="ongkir">
					<option value="">Pilih Tarif Ongkir</option>
					<?php
					$sql_ongkir = mysqli_query($config, "SELECT * FROM ongkir");
					while ($detail_ongkir = mysqli_fetch_assoc($sql_ongkir)) {
					?>
						<option value="<?php echo $detail_ongkir['id_ongkir'] ?>">
							<?php echo $detail_ongkir['nama_kota']; ?> -
							Rp <?php echo number_format($detail_ongkir['tarif'], 0, ",", "."); ?>
						</option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label>Alamat Pengiriman</label>
			<textarea class="form-control" name="alamat_pengiriman"><?php echo $_SESSION['pelanggan']['alamat'] ?></textarea>
		</div>
		<button class="btn btn-primary" name="lanjut">Lanjut Bayar</button>
	</form>
	<?php
	if (isset($_POST['lanjut'])) {
		if ($_POST['ongkir'] == "") {
			echo "<script>alert('Anda belum memilih tarif ongkir!');</script>";
		} else {
			$idpelanggan = $_SESSION['pelanggan']['id_pelanggan'];
			$tanggal = date('Y-m-d');
			$idongkir = $_POST['ongkir'];
			$alamat = $_POST['alamat_pengiriman'];
			$sqlcek_ongkir = mysqli_query($config, "SELECT * FROM ongkir WHERE id_ongkir='$idongkir'");
			$detailcek_ongkir = mysqli_fetch_assoc($sqlcek_ongkir);
			$nakot = $detailcek_ongkir['nama_kota'];
			$tarif = $detailcek_ongkir['tarif'];
			$totbeli = $totalbelanja + $tarif;
			$status = "pending";
			$data = mysqli_query($config, "SELECT * from pembelian order by id_pembelian DESC Limit 1");
			$jml = mysqli_fetch_assoc($data);
			$resi = "JO0123456" . ($jml['id_pembelian'] + 1);
			$sql_pembelian = mysqli_query($config, "INSERT INTO pembelian(id_pelanggan,tanggal_pembelian,
				total_pembelian,id_ongkir,nama_kota,alamat_pengiriman,tarif,status_pembelian,resi_pengiriman)
				VALUES('$idpelanggan','$tanggal','$totbeli','$idongkir','$nakot',
				'$alamat','$tarif','$status','$resi')");
			$id_pmb_produk_baru = mysqli_insert_id($config);
			foreach ($_SESSION['keranjang'] as $idproduk => $jumlah) {
				$sql_produk = mysqli_query($config, "SELECT * FROM produk WHERE id_produk='$idproduk'");
				$detail_produk = mysqli_fetch_assoc($sql_produk);
				$nama = $detail_produk['nama_produk'];
				$harga = $detail_produk['harga_produk'];
				$berat =  $detail_produk['berat_produk'];
				$subberat = $detail_produk['berat_produk'] * $jumlah;
				$subharga = $detail_produk['harga_produk'] * $jumlah;
				$sql_pmb_produk = mysqli_query($config, "INSERT INTO pembelian_produk(id_pembelian,
				id_produk,jumlah,nama_produk,harga_produk,berat_produk,sub_berat,sub_harga)
				VALUES('$id_pmb_produk_baru','$idproduk','$jumlah','$nama','$harga','$berat',
				'$subberat','$subharga')");
				$sql_update_produk = mysqli_query($config, "UPDATE produk 
				SET stok_produk=stok_produk - $jumlah WHERE id_produk='$idproduk'");
			}
			unset($_SESSION['keranjang']);
			echo "<script>alert('Pembelian sukses!');</script>";
			echo "<script>location='index.php?page=nota&id=$id_pmb_produk_baru';</script>";
		}
	}
	?>
</div>