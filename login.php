<?php
session_start();
include("koneksi.php");
?>

<!DOCTYPE html>
<html>

<head>
	<title>LOGIN | E-GCG</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
	<a href="index.php"></a>
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">

			</div>
		</div>
	</div>
	<div class="login-box">
		<img src="img/bumn.jpg" class="bumn">
		<img src="img/ptba.jpg" class="ptba">
		<form role="form" method="post">
			<p>Email</p>
			<input type="text" name="email_admin" placeholder="Enter your Email address">
			<p>Password</p>
			<input type="password" name="password_admin" placeholder="Enter your password"><br>
			<p><input type="submit" name="submit" value="login"></p>
			<a href="login.php">Forget password!</a><br>
		</form>
		<?php
		if (isset($_POST['submit'])) {
			$ambil = $koneksi->query("SELECT * FROM admin WHERE email_admin='$_POST[email_admin]' AND password_admin='$_POST[password_admin]'");
			$yangcocok = $ambil->num_rows;
			if ($yangcocok == 1) {
				$_SESSION['login'] = $ambil->fetch_assoc();
				echo "<div class='alert alert-info'>Login berhasi</div>";
				echo "<meta http-equiv='refresh' content='1;url=index.php'>";
			} else {
				echo "<div class='alert alert-danger'>Login gagal</div>";
				echo "<meta http-equiv='refresh' content='1;url=login.php'>";
			}
		}
		?>
	</div>
</body>

</html>