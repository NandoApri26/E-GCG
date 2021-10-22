<h2>Ubah File CoC</h2>
<?php

$ambil = $koneksi->query("SELECT * FROM coc WHERE id_coc='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<prev>";
// print_r($pecah);
// echo "</pre>";
?><br>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Pernyataan Atasan User</label>
		<textarea name="pernyataan_auser" class="form-control" rows="10">
			<?php echo $pecah['pernyataan_auser']; ?>
		</textarea>
	</div>
	<div class="form-group">
		<label>Pernyataan User</label>
		<textarea name="pernyataan_user" class="form-control" rows="10">
			<?php echo $pecah['pernyataan_user']; ?>
		</textarea>
	</div>
	<div class="row">
		<div class="col my-2">
			<button class="btn btn-primary" name="change">Ubah</button>
		</div>
	</div>
</form>

<?php
if (isset($_POST['change'])) {
	//Jika Foto dirubah
	if (!empty($lokasi)) {
		$koneksi->query("UPDATE coc SET
				pernyataan_auser='$_POST[pernyataan_auser]',
				pernyataan_user='$_POST[pernyataan_user]'
				WHERE id_coc='$_GET[id]'");
	} else {
		$koneksi->query("UPDATE coc SET
				pernyataan_auser='$_POST[pernyataan_auser]',
				pernyataan_user='$_POST[pernyataan_user]'
				WHERE id_coc='$_GET[id]'");
	}
	echo "<script>alert('Data berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=tambah_file_coc';</script>";
}
?>