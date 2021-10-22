<h2>Ubah File Pencapaian</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pencapaian WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
// echo "<prev>";
// print_r($pecah);
// echo "</pre>";
?><br>

<form method="post" enctype="multipart/form-data">
	<div class="form-group mb-2">
		<label>Judul</label>
		<input type="text" class="form-control" name="judul" value="<?php echo $pecah['judul']; ?>">
	</div>
	<div class="form-group">
		<img src="foto_pencapaian/<?php echo $pecah['image'] ?>" width="200">
	</div>
	<div class="form-group mb-2 ">
		<label>Change Image</label>
		<input type="file" class="form-control" name="image">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10">
			<?php echo $pecah['deskripsi']; ?>
		</textarea>
	</div>
	<button class="btn btn-primary" name="change">Ubah</button>
</form>

<?php
if (isset($_POST['change'])) {
	$images = $_FILES['image']['name'];
	$lokasi = $_FILES['image']['tmp_name'];
	//Jika Foto dirubah
	if (!empty($lokasi)) {
		move_uploaded_file($lokasi, "foto_pencapaian/" . $images);
		$koneksi->query("UPDATE pencapaian SET
				judul='$_POST[judul]', image='$images', deskripsi='$_POST[deskripsi]' WHERE id='$_GET[id]'");
	} else {
		$koneksi->query("UPDATE pencapaian SET
				judul='$_POST[judul]', image='$images', deskripsi='$_POST[deskripsi]' WHERE id='$_GET[id]'");
	}
	echo "<script>alert('Data berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=tambah_file_pencapaian';</script>";
}
?>