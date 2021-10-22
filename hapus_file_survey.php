<?php
	// $ambil = $koneksi->query("SELECT * FROM survey WHERE id='$_GET[id]'");
	// $pecah = $ambil->fetch_assoc();
	$koneksi->query("DELETE FROM survey WHERE id_survey='$_GET[id]'");

	echo "<script>alert('File telah dihapus');</script>";
	echo "<script>location='index.php?halaman=tambah_file_survey';</script>";
?>