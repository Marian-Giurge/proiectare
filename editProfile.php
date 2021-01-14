<?php
	require("./functions/database_functions.php");
	if(!isset($_POST['save_change2'])){
		echo "Something wrong!";
		exit;
	}

	$conn = db_connect();
	if(isset($_POST['save_change2'])){
		$idchange = trim($_POST['id']);
		$idchange = mysqli_real_escape_string($conn, $idchange);
		
		$change = trim($_POST['username']);
		$change = mysqli_real_escape_string($conn, $change);
		
		$parola = trim($_POST['password']);
		$parola = mysqli_real_escape_string($conn, $parola);
		
		$mail = trim($_POST['email']);
		$mail = mysqli_real_escape_string($conn, $mail);

		$query2 = "DELETE FROM accounts WHERE id = '$idchange'";
		$result2 = mysqli_query($conn, $query2);
		if(!$result2){
			echo "Nu s-a putut sterge " . mysqli_error($conn);
			exit;
		}
	
		$query = "INSERT INTO accounts (username, password, email) VALUES ('" . $change . "', '" . $parola . "', '" . $mail . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Nu se poate insera pentru ca: " . mysqli_error($conn);
			exit;
		} else {
			header("Location: logout.php");
		}
}
?>