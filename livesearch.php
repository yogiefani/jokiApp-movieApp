<?php

include "connect.php";
if (isset($_POST['input'])) {
	$input = $_POST['input'];

	$query = "SELECT * FROM kategori_film WHERE kategori LIKE '%" . $input . "%'";

	$result = mysqli_query($conn, $query);
	$film = mysqli_query($conn, "SELECT * FROM kategori_film");
	$kategori1 = mysqli_fetch_array($film);

	if (mysqli_num_rows($result) > 0) { ?>

		<?php
		while ($row = mysqli_fetch_assoc($result)) {
			$idkategori = $row['id_kategori'];
			$kategori = $row['kategori'];
		?>
			<div class="livesearch">
				<a href="?page=detail_kategori&&id_kategori=<?php echo $idkategori ?>" class="button_kategori" type="submit" name="">
					<?php
					echo $kategori;
					?>
				</a>
			</div>
<?php
		}
	} else {
		echo "<h3>Data tidak ditemukan</h3>";
	}
}
?>