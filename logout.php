<?php 
	session_destroy();
	echo "<script>alert('Anda telah log out');</script>";
	echo "<script>location='login.php';</script>";
?>