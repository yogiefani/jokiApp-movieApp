<div class="body_konten2">
	<div class="container">
		<h2 class="heading_film">KATEGORI EDIT</h2>

		<hr>
		<?php
		$idkategori = mysqli_real_escape_string($conn, @$_GET['id_kategori']);
		$proses = mysqli_real_escape_string($conn, @$_GET['proses']);
		if ($proses == "update") {
			$kategori = mysqli_real_escape_string($conn, @$_POST['kategori']);
			$update = mysqli_query($conn, "UPDATE kategori_film SET kategori='$kategori' WHERE id_kategori='$idkategori'");
			if ($update) {
				echo "Sukses!! Update Data Berhasil";
				header("Location: ?page=management_kategori");
			} else {
				echo "Maaf!! Proses Update Data Gagal";
			}
		}

		$tampildata = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM kategori_film WHERE id_kategori='$idkategori'"));
		?>
		<form method="post" action="?page=management_kategori_edit&&proses=update
	&&id_kategori=<?php echo $idkategori ?>" enctype="multipart/form-data">
			<label class="col-4">Kategori Film: </label>
			<div class="col-8">
				<input type="text" name="kategori" value="<?php echo @$tampildata['kategori']; ?>" placeholder="Kategori Film" class="form_input">
			</div>
			<div class="row">
				<label class="col-4">&nbsp;</label>
				<div class="col-8">
					<button class="form_button2" type="submit">Update Data</button>
				</div>
			</div>
		</form>
	</div>
</div>