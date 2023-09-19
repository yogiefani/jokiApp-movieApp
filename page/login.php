<?php
session_start();
include "../connect.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../style.css">
</head>

<body>
	<?php
	$proses = mysqli_real_escape_string($conn, @$_GET['proses']);
	if ($proses == "login") {
		$username = mysqli_real_escape_string($conn, @$_POST['username_user']);
		$password = mysqli_real_escape_string($conn, @$_POST['password_user']);
		$cekakun = mysqli_num_rows(mysqli_query(
			$conn,
			"SELECT * FROM user WHERE username_user ='$username' AND 
        	 password_user ='$password'"
		));
		if ($cekakun != 0) {
			$_SESSION['username_user'] = $username;
			$_SESSION['password_user'] = $password;
			header("Location: ../indexmain.php");
			echo "<h3>Sukses!! Login Berhasil</h3>";
		} else {
			echo "<h3>Maaf!!Anda Gagal Login, 
        	silahkan Coba Kembali</h3>";
		}
	}
	?>
	<div class="container2">
		<div class="body_sign">
			<div class="signup" align="center">
				<h1>Log in</h1>
				<form method="post" action="?proses=login">
					<div class="col-12">
						<input type="text" name="username_user" placeholder="Username" class="form_input2" maxlength="15">
					</div>
					<div class="col-12">
						<input type="password" name="password_user" placeholder="Password" class="form_input2" minlength="8" maxlength="15">
					</div>
					<input type="submit" name="login" class="form_button2" value="Login">
					<a href="../indexmain.php" class="form_button2">Halaman Utama</a><br>
					Belum Punya akun?<a href="registrasi.php" class="text_kecil"> Buat Akun Disini</a>
				</form>
			</div>
		</div>
		<div class="col-6 thumbnail_log">

		</div>
	</div>

</body>

</html>