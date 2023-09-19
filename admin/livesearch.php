<?php 
include("../connect.php");
if (isset($_POST['input'])) {
	$proses = mysqli_real_escape_string($conn, @$_GET['proses']);
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
	$input = $_POST['input'];
	$query = "SELECT * FROM film WHERE nama_film LIKE '{$input}%'";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) > 0){?>
		<table class="table_admin" border="1" cellpadding="5" cellspacing="0">
			<tr>
				<td>ID</td>
				<td>Nama Film</td>
				<td>Sutradara</td>
				<td>Cover</td>
				<td>Aksi</td>
			</tr>
				<?php 
				while($row = mysqli_fetch_assoc($result)){
					$id = $row['id_film'];
					$namafilm = $row['nama_film'];
					$sutradara = $row['sutradara'];
					$images = $row['images'];
					$idfilm = $row['id_film'];
					?>
					<tr>
						<td><?php echo $id; ?></td>
						<td><?php echo $namafilm; ?></td>
						<td><?php echo $sutradara; ?></td>
						<td><img src="../<?php echo $images; ?>" alt="" width="50px"></td>
						<td>
							<a class="text_kecil" href="?page=management_film_edit&&id_film=
				<?php echo $idfilm; ?>">
									Edit</a>
								<a class="text_kecil2" href="?page=management_film&&id_film=
				<?php echo $idfilm; ?>&&proses=hapus">
									Hapus</a>
						</td>
					</tr>

					<?php
				}
				?>
		</table>
		<?php
	}
}
?>