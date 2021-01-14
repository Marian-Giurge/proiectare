<?php
	if(!isset($_POST['save_change'])){
		echo "Something wrong!";
		exit;
	}
	require_once("./functions/database_functions.php");
	$conn = db_connect();
	if(isset($_POST['save_change'])){
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

	$query2 = "DELETE FROM books WHERE book_isbn = '$isbn'";
	$result2 = mysqli_query($conn, $query2);
	if(!$result2){
		echo "Nu s-a putut sterge " . mysqli_error($conn);
		exit;
	}
	
	$query = "INSERT INTO books (book_isbn, book_title, book_author, book_descr, book_price, publisher) VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $descr . "', '" . $price . "', '". $publisher . "')";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Nu se poate insera pentru ca: " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_edit.php?bookisbn=$isbn");
	}
}
?>