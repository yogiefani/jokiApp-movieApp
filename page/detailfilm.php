<br>
<center>
    <h1>DETAIL FILM</h1>
</center>
<div class="detailmain">
    <div class="container">
        <?php
        $idfilm = mysqli_real_escape_string($conn, @$_GET['id_film']);
        $tampildata = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM film WHERE id_film='$idfilm'"));
        ?>
        <div class="row">
            <div class="col-5">
                <img src="<?php echo $tampildata['images']; ?>" width="80%">
            </div>
            <div class="col-7 detail_film2">
                <h2><?php echo $tampildata['nama_film']; ?></h2><br>
                <table width="100%" cellpadding="5" cellspacing="0">
                    <tr>
                        <td width="20%">Harga</td>
                        <td>
                            : <?php echo $tampildata['tanggal_rilis']; ?><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Sutradara</td>
                        <td>
                            : <?php echo $tampildata['sutradara']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Durasi</td>
                        <td>
                            : <?php echo $tampildata['durasi']; ?> Jam
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php echo $tampildata['sinopsis']; ?>
                        </td>
                    </tr>
                </table>
                <a href="" class="film_tombol_besar">Tonton Film</a>

            </div>
        </div>

        <div class="sinopsis_film">
            Film <?php echo $tampildata['nama_film']; ?> dirilis pada tanggal <?php echo $tampildata['tanggal_rilis']; ?><br>
            Sinopsis <?php echo $tampildata['nama_film']; ?> : <?php echo $tampildata['sinopsis']; ?>
        </div>
    </div>
</div>