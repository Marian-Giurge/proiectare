<?php
	session_start();
	require_once "./functions/database_functions.php";
	if(isset($_GET['pubid'])){
		$pubid = $_GET['pubid'];
	} else {
		echo "Querry gresit";
		exit;
	}

	$conn = db_connect();
	$pubName = getPubName($conn, $pubid);

	$query = "SELECT book_isbn, book_title, book_image FROM books WHERE publisher = '$pubid'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Nu se pot afisa datele pentru ca: " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Nu sunt carti disponibile. Asteptati sa apara un stoc nou";
		exit;
	}

	$title = "Carti Per Editor";
	require "./template/header.php";
?>
	<p class="lead"><a href="publisher_list.php">Editori</a> > <?php echo $pubName; ?></p>
	<?php while($row = mysqli_fetch_assoc($result)){
?>
	<div class="row">
		<div class="col-md-3">
			<img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['book_image'];?>">
		</div>
		<div class="col-md-7">
			<h4><?php echo $row['book_title'];?></h4>
			<a href="book.php?bookisbn=<?php echo $row['book_isbn'];?>" class="btn btn-primary">Informatii</a>
		</div>
	</div>
	<br>
<?php
	}
	if(isset($conn)) { mysqli_close($conn);}
	require "./template/footer.php";
?>