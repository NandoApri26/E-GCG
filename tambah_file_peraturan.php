<h2>Tambah File Peraturan</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>File</label>
		<input type="file" class="form-control" name="file">
	</div>
	<div class="form-group">
		<label>Judul File</label>
		<input type="text" class="form-control" name="judul_file">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) {
	$files = $_FILES['file']['name'];
	$lokasi = $_FILES['file']['tmp_name'];
	move_uploaded_file($lokasi, "../file_peraturan/" . $files);
	$koneksi->query("INSERT INTO peraturan
			(file, judul_file)
			VALUES('$files', '$_POST[judul_file]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=peraturan'>";
}
?>