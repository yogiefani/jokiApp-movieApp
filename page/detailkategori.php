<br>
<?php
$idkategori = mysqli_real_escape_string($conn, @$_GET['id_kategori']);
$tampildata = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM film WHERE id_kategori='$idkategori'"));
$tampildata2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM kategori_film WHERE id_kategori='$idkategori'"));
?>
<div class="body_kategori">
    <div class="container">
        <div class="kategori_film">
            <h2>Kategori <?php echo $tampildata2['kategori'] ?></h2>
        </div>
    </div>
    <div class="detailmain">
        <div class="container">
            <div class="row">
                <?php
                $film = mysqli_query($conn, "SELECT * FROM film WHERE id_kategori='$idkategori'");
                while ($film1 = mysqli_fetch_array($film)) {
                ?>
                    <div class="col-3 film" align="center">
                        <img src="<?php echo $film1['images']; ?>" width="100%"><br>
                        <div class="nama_film" align="center">
                            <a href="?page=detail_film&&id_film=<?php echo $film1['id_film']; ?>">
                                <?php echo $film1['nama_film']; ?>
                            </a>
                        </div>
                        <center>
                            <a href="?page=detail_film&&id_film=<?php echo $film1['id_film']; ?>" class="detail_film">Detail film</a>
                        </center>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>