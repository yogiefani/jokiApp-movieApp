<div class="body_konten2">
	<div class="container">
		<?php
		$idfilm = mysqli_real_escape_string($conn, @$_GET['id_film']);
		$proses = mysqli_real_escape_string($conn, @$_GET['proses']);
		if ($proses == "update") {
			$idkategori = mysqli_real_escape_string($conn, @$_POST['id_kategori']);
			$nama_film = mysqli_real_escape_string($conn, @$_POST['nama_film']);
			$sutradara = mysqli_real_escape_string($conn, @$_POST['sutradara']);
			$sinopsis = mysqli_real_escape_string($conn, @$_POST['sinopsis']);
			$durasi = mysqli_real_escape_string($conn, @$_POST['durasi']);
			$tanggal_rilis = mysqli_real_escape_string($conn, @$_POST['tanggal_rilis']);
			$nama_gambar = mysqli_real_escape_string($conn, @$_FILES['images']['name']);
			$tmp_gambar = mysqli_real_escape_string($conn, @$_FILES['images']['tmp_name']);
			if (!empty($nama_gambar)) {
				$cekgambar = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM film WHERE id_film='$idfilm'"));
				if (!empty($cekgambar['images'])) { //gambar akan dihapus jika didatabase sebelumnya sudah ada gambar
					unlink("../$cekgambar[images]");
				}
				//baris ini adalah baris untuk upload gambar baru
				copy($tmp_gambar, "../images/$nama_gambar");
				$update_gambar = mysqli_query($conn, "UPDATE film SET images='images/$nama_gambar' WHERE id_film='$idfilm'");
			}
			$update = mysqli_query($conn, "UPDATE film SET id_kategori='$idkategori',nama_film='$nama_film',sutradara='$sutradara',sinopsis='$sinopsis',durasi='$durasi' WHERE id_film='$idfilm'");
			if ($update) {
				echo "Sukses!! Update Data Berhasil";
				header("Location: ?page=management_film");
			} else {
				echo "Maaf!! Proses Update Data Gagal";
			}
		}

		$tampildata = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM film WHERE id_film='$idfilm'"));
		?>
		<h2 class="heading_film">Edit Data Film <?php echo $tampildata['nama_film'] ?></h2>
		<form method="post" action="?page=management_film_edit&&proses=update
	&&id_film=<?php echo $idfilm ?>" enctype="multipart/form-data">
			<label class="col-4">Kategori Film</label>
			<div class="col-8">
				<select class="form_input" name="id_kategori">
					<?php
					$kategorifilm = mysqli_query(
						$conn,
						"SELECT * FROM kategori_film"
					);
					while ($kategorifilm1 = mysqli_fetch_array($kategorifilm)) {
					?>
						<option value="
					<?php echo $kategorifilm1['id_kategori']; ?>" <?php if ($tampildata['id_kategori'] == $kategorifilm1['id_kategori']) { ?>selected <?php } ?>>
							<?php echo $kategorifilm1['kategori']; ?></option>
					<?php } ?>
				</select>
			</div>
			<label class="col-4">Nama Film</label>
			<div class="col-8">
				<input class="form_input" type="text" name="nama_film" value="<?php echo $tampildata['nama_film']; ?>">
			</div>
			<label class="col-4">Sutradara</label>
			<div class="col-8">
				<input class="form_input" type="text" name="sutradara" value="<?php echo $tampildata['sutradara']; ?>">
			</div>
			<label class="col-4">Sinopsis</label>
			<div class="col-8">
				<textarea class="form_input" name="sinopsis" rows="10" style="width:100%;"><?php echo $tampildata['sinopsis']; ?></textarea>
			</div>
			<label class="col-4">Durasi</label>
			<div class="col-8">
				<input class="form_input" type="text" name="durasi" value="<?php echo $tampildata['durasi']; ?>">
			</div>
			<label class="col-4">Tanggal Rilis</label>
			<div class="col-8">
				<input class="form_input" type="date" name="tanggal_rilis" value="<?php echo $tampildata['tanggal_rilis']; ?>">
			</div>
			<label class="col-4">Ganti Cover Film</label>
			<div class="col-8">
				<input class="form_input" type="file" name="images">
			</div>

			<div class="col-12">
				<img src="../<?php echo $tampildata['images']; ?>" alt="" width="50px">
			</div>
			<div class="row">
				<div class="col-12">
					<button class="form_button2" type="submit">Update Data</button>
				</div>
			</div>
		</form>
		<br>
	</div>
</div>