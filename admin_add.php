<?php
	session_start();
	$title = "Adauga carte";
	require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$isbn = trim($_POST['isbn']);
		$isbn = mysqli_real_escape_string($conn, $isbn);
		
		$title = trim($_POST['title']);
		$title = mysqli_real_escape_string($conn, $title);

		$author = trim($_POST['author']);
		$author = mysqli_real_escape_string($conn, $author);
		
		$descr = trim($_POST['descr']);
		$descr = mysqli_real_escape_string($conn, $descr);
		
		$price = floatval(trim($_POST['price']));
		$price = mysqli_real_escape_string($conn, $price);
		
		$publisher = trim($_POST['publisher']);
		$publisher = mysqli_real_escape_string($conn, $publisher);

		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}

		$query = "INSERT INTO books (book_isbn, book_title, book_author, book_descr, book_price, publisher) VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $descr . "', '" . $price . "', '". $publisher . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Nu se pot adauga datele deoarece: " . mysqli_error($conn);
			exit;
		}
		else {
			header("Location: admin_book.php");
		}
	}
?>
	<form method="post" action="admin_add.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ISBN</th>
				<td><input type="text" name="isbn" required></td>
			</tr>
			<tr>
				<th>Titlu</th>
				<td><input type="text" name="title" required></td>
			</tr>
			<tr>
				<th>Autor</th>
				<td><input type="text" name="author" required></td>
			</tr>
			<tr>
				<th>Descriere</th>
				<td><textarea name="descr" cols="40" rows="5"></textarea></td>
			</tr>
			<tr>
				<th>Pret</th>
				<td><input type="text" name="price" required></td>
			</tr>
			<tr>
				<th>Editor</th>
				<td><input type="text" name="publisher" required></td>
			</tr>
		</table>
		<input type="submit" name="add" value="Adauga" class="btn btn-primary">
		<input type="reset" value="Cancel"  class="btn btn-default"><a href="admin_book.php"></a>
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	//require_once "./template/footer.php";
?>