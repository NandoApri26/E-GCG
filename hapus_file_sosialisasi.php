<?php
	
	$ambil = $koneksi->query("SELECT * FROM sosialisasi WHERE id='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	$fotos = $pecah['image'];
	if (file_exists("foto_sosialisasi/$fotos")) {
		unlink("foto_sosialisasi/$fotos");
	}


	$koneksi->query("DELETE FROM sosialisasi WHERE id='$_GET[id]'");

	echo "<script>alert('File telah dihapus');</script>";
	echo "<script>location='index.php?halaman=tambah_file_sosialisasi';</script>";
?>