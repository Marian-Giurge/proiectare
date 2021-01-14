<?php
	session_start();
	$title = "Edit book";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_GET['bookisbn'])){
		$book_isbn = $_GET['bookisbn'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($book_isbn)){
		echo "Empty isbn! check again!";
		exit;
	}

	$query = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Nu se pot afisa datele pentru ca: " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
	<form method="post" action="edit_book.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ISBN</th>
				<td><input type="text" name="isbn" value="<?php echo $row['book_isbn'];?>" readOnly="true"></td>
			</tr>
			<tr>
				<th>Titlu</th>
				<td><input type="text" name="title" value="<?php echo $row['book_title'];?>" required></td>
			</tr>
			<tr>
				<th>Autor</th>
				<td><input type="text" name="author" value="<?php echo $row['book_author'];?>" required></td>
			</tr>
			<tr>
				<th>Descriere</th>
				<td><textarea name="descr" cols="40" rows="5"><?php echo $row['book_descr'];?></textarea>
			</tr>
			<tr>
				<th>Pret</th>
				<td><input type="text" name="price" value="<?php echo $row['book_price'];?>" required></td>
			</tr>
			<tr>
				<th>Editor</th>
				<td><input type="text" name="publisher" value="<?php echo $row['publisher']; ?>" required></td>
			</tr>
		</table>
		<input type="submit" name="save_change" value="Change" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
	<a href="admin_book.php" class="btn btn-success">Confirm</a>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	//require "./template/footer.php"
?>