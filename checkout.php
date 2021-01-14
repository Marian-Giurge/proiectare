<?php
	session_start();
	require_once "./functions/database_functions.php";

	$title = "Checking out";
	require "./template/header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>
	<table class="table">
		<tr>
			<th>Cartea</th>
			<th>Pret</th>
	    	<th>Cantitate</th>
	    	<th>Total</th>
	    </tr>
	    	<?php
			    foreach($_SESSION['cart'] as $isbn => $qty){
					$conn = db_connect();
					$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
			?>
		<tr>
			<td><?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
			<td><?php echo "$" . $book['book_price']; ?></td>
			<td><?php echo $qty; ?></td>
			<td><?php echo "$" . $qty * $book['book_price']; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['total_items']; ?></th>
			<th><?php echo "$" . $_SESSION['total_price']; ?></th>
		</tr>
	</table>
	<form method="post" action="process.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
			<p class="text-danger">Toate campurile trebuie completate</p>
			<?php } ?>
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Nume</label>
			<div class="col-md-4">
				<input type="text" name="name" class="col-md-4" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="control-label col-md-4">Adresa</label>
			<div class="col-md-4">
				<input type="text" name="address" class="col-md-4" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="control-label col-md-4">Oras</label>
			<div class="col-md-4">
				<input type="text" name="city" class="col-md-4" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label for="zip_code" class="control-label col-md-4">Cod postal</label>
			<div class="col-md-4">
				<input type="text" name="zip_code" class="col-md-4" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="control-label col-md-4">Tara</label>
			<div class="col-md-4">
				<input type="text" name="country" class="col-md-4" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Comanda" class="btn btn-primary">
		</div>
	</form>
	<p class="lead">Apasati pe butonul Comanda pentru a incheia comanda</p>
<?php
	} else {
		echo "<p class=\"text-warning\">Cardul tau este gol</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/footer.php";
?>