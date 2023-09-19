<?php
$cekuserlogin = $_SESSION['username'];
?>
<?php
if (empty($cekuserlogin)) {
	header("Location: login.php");
} else { ?>
	<!DOCTYPE html>
	<html>

	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href=".../style.css">
	</head>

	<body>
		<div class="body_konten2">
			<div class="container">
				<h2 class="heading_film">FILM</h2>
				<hr>
				<b>Tambah/Edit Data</b>
				<?php
				//proses simpan data
				$proses = mysqli_real_escape_string($conn, @$_GET['proses']);
				if ($proses == "simpan") {
					$idkategori = @$_POST['id_kategori'];
					$namafilm = @$_POST['nama_film'];
					$sutradara = @$_POST['sutradara'];
					$sinopsis = @$_POST['sinopsis'];
					$durasi = @$_POST['durasi'];
					$tanggal_rilis = date("y-m-d");
					$nama_gambar = @$_FILES['images']['name'];
					$tmp_gambar = @$_FILES['images']['tmp_name'];
					if (!empty($nama_gambar)) {
						copy($tmp_gambar, "../images/$nama_gambar");
					}
					$simpan = mysqli_query($conn, "
    		INSERT INTO film(id_kategori,nama_film,
    		sutradara,sinopsis,durasi,tanggal_rilis
    		,images) 
    		VALUES('$idkategori','$namafilm',
    		'$sutradara','$sinopsis',
    		'$durasi','$tanggal_rilis','images/$nama_gambar')");
					if ($simpan) {
						echo "<h3>Input Data Berhasil</h3>";
					} else {
						echo "<h3>Input Data Gagal</h3>";
					}
				}
				if ($proses == "hapus") {
					$idfilm = mysqli_real_escape_string($conn, @$_GET['id_film']);
					$cekdata = mysqli_fetch_array(mysqli_query(
						$conn,
						"SELECT * FROM film WHERE 
    		id_film='$idfilm'"
					));
					unlink("../$cekdata[images]");
					$hapus = mysqli_query($conn, "DELETE FROM film where 
    		id_film='$idfilm'");
					if ($hapus) {
						echo "<h3>Hapus Data Berhasil</h3>";
					} else {
						echo "<h3>Hapus Data Gagal</h3>";
					}
				}
				?>
				<form method="post" action="?page=management_film&&proses=simpan" enctype="multipart/form-data">
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
					<?php echo $kategorifilm1['id_kategori']; ?>"><?php echo $kategorifilm1['kategori']; ?></option>
							<?php } ?>
						</select>
					</div>
					<label class="col-4">Nama Film</label>
					<div class="col-8">
						<input class="form_input" type="text" name="nama_film" maxlength="25">
					</div>
					<label class="col-4">Sutradara Film</label>
					<div class="col-8">
						<input class="form_input" type="text" name="sutradara" maxlength="20">
					</div>
					<label class="col-4">Sinopsis</label>
					<div class="col-8">
						<textarea class="form_input" name="sinopsis" rows="10" style="width:100%;"></textarea>
					</div>
					<label class="col-4">Durasi</label>
					<div class="col-8">
						<input class="form_input" type="text" name="durasi">
					</div>
					<label class="col-4">Tanggal Rilis</label>
					<div class="col-8">
						<input class="form_input" type="date" name="tanggal_rilis">
					</div>
					<label class="col-4">Upload Gambar Buku</label>
					<input class="col-8" type="file" accept="image/*" name="images">

					<label class="col-4">&nbsp;</label>
					<div class="col-8">
						<button class="form_button2" type="submit">Simpan Data</button>
					</div>
				</form>
				<div class="film_search">
					<input id="live_search" class="form_search" type="text" autocomplete="off" placeholder="Ketik nama movie">
				</div>
				<h3>Tampil Data</h3>
				<div id="searchresult">
					<table class="table_admin" border="1" cellpadding="5" cellspacing="0">
						<tr>
							<td>NO</td>
							<td>Nama Film</td>
							<td>Sutradara</td>
							<td>Cover</td>
							<td>Aksi</td>
						</tr>
						<?php
						$tampildata = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM kategori_film"));
						$i = 1;
						$tampil = mysqli_query($conn, "SELECT * FROM film");
						while ($cetak = mysqli_fetch_array($tampil)) {
						?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $cetak['nama_film']; ?></td>
								<td><?php echo $cetak['sutradara']; ?></td>
								<td><img src="../<?php echo $cetak['images']; ?>" alt="" width="50px"></td>
								<td>
									<a class="text_kecil" href="?page=management_film_edit&&id_film=
				<?php echo $cetak['id_film']; ?>">
										Edit</a>
									<a class="text_kecil2" href="?page=management_film&&id_film=
				<?php echo $cetak['id_film']; ?>&&proses=hapus">
										Hapus</a>
								</td>
							</tr>
						<?php $i = $i + 1;
						} ?>
					</table>
				</div>
				<br>
			</div>
		</div>
	</body>

	</html>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#live_search").keyup(function() {
				var input = $(this).val();
				// alert(input);
				if (input != "") {
					$.ajax({
						url: "livesearch.php",
						type: "POST",
						data: {
							input: input
						},
						success: function(data) {
							$("#searchresult").html(data);
						}
					});
				} else {
					$("#searchresult").css("display", "none");
				}
			})
		});
	</script>
<?php } ?>