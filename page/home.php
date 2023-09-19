<!-- 
 Lokasi dan Nama File	: page/home.php
-->
<div class="thumbnail">
    <div class="linear"></div>
</div>
<div class="body_konten">
    <div class="container">
        <div class="row">
            <div class="col-12 heading_film">
                <h1>Rekomendasi</h1>
            </div>
        </div>
        <?php
        $film = mysqli_query($conn, "SELECT * FROM film ORDER BY id_film");
        while ($film1 = mysqli_fetch_array($film)) {
        ?>
            <div class="col-2">
                <img src="<?php echo $film1['images']; ?>" width="100%" height="300px"><br>
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
    <div class="container">
        <div class="row">
            <div class="col-12 heading_film">
                <h1>Film Terbaru</h1>
            </div>
        </div>
        <?php
        $film = mysqli_query($conn, "SELECT * FROM film ORDER BY id_film DESC");
        while ($film1 = mysqli_fetch_array($film)) {
        ?>
            <div class="col-2">
                <img src="<?php echo $film1['images']; ?>" width="100%" height="300px"><br>
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
    <div class="container">
        <div class="row">
            <div class="col-12 heading_film">
                <h1>Film Horror</h1>
            </div>
        </div>
        <div class="row">
            <?php
            $film = mysqli_query($conn, "SELECT * FROM film");
            while ($film1 = mysqli_fetch_array($film)) {
                if ($film1['id_kategori'] == '6') {
            ?>
                    <div class="col-3 film" align="center">
                        <img src="<?php echo $film1['images']; ?>" width="100%" height="300px"><br>
                        <div class="nama_film" align="center">
                            <a href="?page=detail_film&&id_film=<?php echo $film1['id_film']; ?>">
                                <?php echo $film1['nama_film']; ?>
                            </a>
                        </div>
                        <center>
                            <a href="?page=detail_film&&id_film=<?php echo $film1['id_film']; ?>" class="detail_film">Detail film</a>
                        </center>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>