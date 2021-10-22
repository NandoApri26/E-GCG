<?php
	
	$ambil = $koneksi->query("SELECT * FROM pencapaian WHERE id='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	$images = $pecah['image'];
	if (file_exists("../foto_pencapaian/$images")) {
		unlink("../foto_pencapaian/$images");
	}


	$koneksi->query("DELETE FROM pencapaian WHERE id='$_GET[id]'");

	echo "<script>alert('File telah dihapus');</script>";
	echo "<script>location='index.php?halaman=pencapaian';</script>";
?>