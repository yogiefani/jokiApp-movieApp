<div class="body_kategori">
	<div class="container">
		<div class="film_search">
			<input id="live_search" class="form_search" type="text" autocomplete="off" placeholder="Ketik movie,genre dll">
		</div>
		<div class="film_search">
		</div>
	</div>
	<div class="container">
		<div class="kategori_film">
			<h2>Kategori</h2>
		</div>
		<div id="searchresult" class="tag_kategori row">
			<?php
			$kategori = mysqli_query($conn, "SELECT * FROM kategori_film");
			while ($kategori1 = mysqli_fetch_array($kategori)) {
			?>
				<div class="col-2">
					<a href="?page=detail_kategori&&id_kategori=<?php echo $kategori1['id_kategori']; ?>" class="button_kategori" type="submit" name="">
						<?php
						echo $kategori1['kategori'];
						?>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
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