<h2>Ubah File Survey</h2>
<?php

$ambil = $koneksi->query("SELECT * FROM survey WHERE id_survey='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<prev>";
// print_r($pecah);
// echo "</pre>";
?><br>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>survey</label>
		<textarea name="survey" class="form-control" rows="10">
			<?php echo $pecah['survey']; ?>
		</textarea>
	</div>
	<div class="mb-3">
		<label for="exampleFormControlTextarea2" class="form-label text-center">Opsi A</label>
		<textarea class="form-control" name="opsi_a" id="exampleFormControlTextarea2" rows="1">
			<?php echo $pecah['opsi_a']; ?>
		</textarea>
	</div>
	<div class="mb-3">
		<label for="exampleFormControlTextarea2" class="form-label text-center">Opsi B</label>
		<textarea class="form-control" name="opsi_b" id="exampleFormControlTextarea2" rows="1">
			<?php echo $pecah['opsi_b']; ?>
		</textarea>
	</div>
	<div class="mb-3">
		<label for="exampleFormControlTextarea2" class="form-label text-center">Opsi C</label>
		<textarea class="form-control" name="opsi_c" id="exampleFormControlTextarea2" rows="1">
			<?php echo $pecah['opsi_c']; ?>
		</textarea>
	</div>
	<div class="mb-3">
		<label for="exampleFormControlTextarea2" class="form-label text-center">Opsi D</label>
		<textarea class="form-control" name="opsi_d" id="exampleFormControlTextarea2" rows="1">
			<?php echo $pecah['opsi_d']; ?>
		</textarea>
	</div>
	<div class="mb-3">
		<label for="exampleFormControlTextarea2" class="form-label text-center">Opsi E</label>
		<textarea class="form-control" name="opsi_e" id="exampleFormControlTextarea2" rows="1">
			<?php echo $pecah['opsi_e']; ?>
		</textarea>
	</div>
	<div class="mb-3">
		<label for="exampleFormControlTextarea2" class="form-label text-center">Lainnya</label>
		<textarea class="form-control" name="lainnya" id="exampleFormControlTextarea2" rows="1">
			<?php echo $pecah['lainnya']; ?>
		</textarea>
	</div <div class="mb-3">
	<label for="exampleFormControlTextarea2" class="form-label text-center">Jawaban</label>
	<select class="form-select" name="jawaban" aria-label="Default select example">
		<option selected>Pilih Jawaban Yang Benar</option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
		<option value="D">D</option>
		<option value="E">E</option>
		<option value="Lainnya">Lainnya</option>
	</select>
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
		$koneksi->query("UPDATE survey SET
				survey='$_POST[survey]' WHERE id_survey='$_GET[id]'");
	} else {
		$koneksi->query("UPDATE survey SET
				survey='$_POST[survey]' WHERE id_survey='$_GET[id]'");
	}
	echo "<script>alert('Data berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=tambah_file_survey';</script>";
}
?>