<?php
	
	$ambil = $koneksi->query("SELECT * FROM informasi_gcg WHERE id='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	$files = $pecah['file'];
	if (file_exists("../file_informasi_gcg/$files")) {
		unlink("../file_informasi_gcg/$files");
	}


	$koneksi->query("DELETE FROM informasi_gcg WHERE id='$_GET[id]'");

	echo "<script>alert('File telah dihapus');</script>";
	echo "<script>location='index.php?halaman=informasi_gcg';</script>";
?>