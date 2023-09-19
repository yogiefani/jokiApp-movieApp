<?php
//File Index.php
session_start();
include "connect.php";
$cekuserlogin = @$_SESSION['username_user'];
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Nonton Film</title>

	<link href="style.css" rel="stylesheet" type="text/css">

</head>

<body>
	<section class="header">
		<div class="container">
			<div class="row">
				<div class="col-2 heading">
					<h2>MOVIE</h2>
				</div>
				<div class="col-10">
					<div class="header_menu">
						<a href="?page=home" class="menu_atas">Beranda</a>
						<a href="?page=kategori_film" class="menu_atas">Kategori</a>
						<a href="?page=film" class="menu_atas">Film</a>
						<?php
						if (empty($cekuserlogin)) {
						?>
							<a href="page/registrasi.php" class="menu_button">Sign up</a>
							<a href="page/login.php" class="menu_button2">Log in</a>
						<?php } else { ?>
							<a href="page/logout.php" class="menu_button">Log out</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="konten">
		<?php
		$page = @$_GET['page'];
		if ($page == "kategori_film") {
			include "page/kategorifilm.php";
		} elseif ($page == "film") {
			include "page/film.php";
		} elseif ($page == "konfirmasi") {
			include "page/konfirmasi.php";
		} elseif ($page == "detail_film") {
			include "page/detailfilm.php";
		} elseif ($page == "detail_kategori") {
			include "page/detailkategori.php";
		} elseif ($page == "prosesregistrasi") {
			include "page/registrasi.php";
		} else {
			include "page/home.php";
		}
		?>


	</section>
	<section class="footer">
		&nsub;
	</section>
	<section class="footer1">
		Copyright &copy; 2019. All Right Reserved
	</section>

</body>

</html>