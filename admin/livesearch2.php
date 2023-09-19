<?php 
include("../connect.php");
if (isset($_POST['input'])) {
	$proses = mysqli_real_escape_string($conn, @$_GET['proses']);
	if ($proses == "hapus") {
					$idkategori = mysqli_real_escape_string($conn, @$_GET['id_kategori']);
					$cekdata = mysqli_fetch_array(mysqli_query(
						$conn,
						"SELECT * FROM kategori_film WHERE 
    		id_kategori='$idkategori'"
					));
					unlink("../$cekdata[images]");
					$hapus = mysqli_query($conn, "DELETE FROM kategori_film where 
    		id_kategori='$idkategori'");
					if ($hapus) {
						echo "<h3>Hapus Data Berhasil</h3>";
					} else {
						echo "<h3>Hapus Data Gagal</h3>";
					}
				}
	$input = $_POST['input'];
	$query = "SELECT * FROM kategori_film WHERE kategori LIKE '{$input}%'";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) > 0){?>
		<table class="table_admin" border="1" cellpadding="5" cellspacing="0">
			<tr>
				<td>ID</td>
				<td>Kategori</td>
				<td>Aksi</td>
			</tr>
				<?php 
				while($row = mysqli_fetch_assoc($result)){
					$id = $row['id_kategori'];
					$kategori = $row['kategori'];
					$idkategori = $row['id_kategori'];
					?>
					<tr>
						<td><?php echo $id; ?></td>
						<td><?php echo $kategori; ?></td>
						<td>
							<a class="text_kecil" href="?page=management_kategori_edit&&id_kategori=
				<?php echo $idkategori; ?>">
									Edit</a>
								<a class="text_kecil2" href="?page=management_kategori&&id_kategori=
				<?php echo $idkategori; ?>&&proses=hapus">
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