<?php
session_start();
include "../connect.php";
$cekuserlogin = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Administrator</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
	<?php
	if (empty($cekuserlogin)) {
		header("Location: login.php");
	} else { ?>

		<section class="header">
			<div class="container">
				<div class="row">
					<div class="col-2 heading">
						<h2>Admin</h2>
					</div>
					<div class="col-10">
						<div class="header_menu">
							<a href="?page" class="menu_atas">Beranda</a>
							<a href="?page=management_kategori" class="menu_atas">Kategori</a>
							<a href="?page=management_film" class="menu_atas">Film</a>
							<a href="logout.php" class="menu_button">Log out</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="konten">
			<?php
			$page = mysqli_real_escape_string($conn, @$_GET['page']);
			if ($page == "management_film") {
				include "page/management_film.php";
			} else if ($page == "management_film_edit") {
				include "page/management_film_edit.php";
			} else if ($page == "management_kategori") {
				include "page/management_kategori_film.php";
			} else if ($page == "management_kategori_edit") {
				include "page/management_kategori_film_edit.php";
			} else {
				include("page/home.php");
			}
			?>
		</div>

	<?php } ?>
	<section class="footer">
		&nsub;
	</section>
	<section class="footer1">
		Copyright &copy; 2019. All Right Reserved
	</section>
</body>

</html>