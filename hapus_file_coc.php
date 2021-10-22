<?php
	// $ambil = $koneksi->query("SELECT * FROM survey WHERE id='$_GET[id]'");
	// $pecah = $ambil->fetch_assoc();
	$koneksi->query("DELETE FROM coc WHERE id_coc='$_GET[id]'");

	echo "<script>alert('File telah dihapus');</script>";
	echo "<script>location='index.php?halaman=tambah_file_coc';</script>";
?>