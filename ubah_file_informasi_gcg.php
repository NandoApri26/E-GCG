<h2>Ubah File Informasi GCG</h2>
<?php

$ambil = $koneksi->query("SELECT * FROM informasi_gcg WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

echo "<prev>";
print_r($pecah);
echo "</pre>";
?><br>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Tanggal</label>
		<input type="date" class="form-control" name="tanggal" value="<?php echo $pecah['tanggal']; ?>">
	</div>
	<div class="form-group">
		<img src="../file_informasi_gcg/<?php echo $pecah['file'] ?>" width="200">
	</div>
	<div class="form-group">
		<label>Change file</label>
		<input type="file" class="form-control" name="file">
	</div>
	<div class="form-group">
		<label>Judul File</label>
		<textarea name="judul_file" class="form-control" rows="10">
			<?php echo $pecah['judul_file']; ?>
		</textarea>
	</div>
	<button class="btn btn-primary" name="change">Ubah</button>
</form>

<?php
if (isset($_POST['change'])) {
	$files = $_FILES['file']['name'];
	$lokasi = $_FILES['file']['tmp_name'];
	//Jika Foto dirubah
	if (!empty($lokasi)) {
		move_uploaded_file($lokasi, "../file_informasi_gcg/" . $files);
		$koneksi->query("UPDATE informasi_gcg SET
				tanggal='$_POST[tanggal]', file='$files', judul_file='$_POST[judul_file]' WHERE id='$_GET[id]'");
	} else {
		$koneksi->query("UPDATE informasi_gcg SET
				tanggal='$_POST[tanggal]', file='$files', judul_file='$_POST[judul_file]' WHERE id='$_GET[id]'");
	}
	echo "<script>alert('Data berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=informasi_gcg';</script>";
}
?>