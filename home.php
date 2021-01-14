<?php

session_start();

if (!isset($_SESSION['username'])) {
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Pagina Home</title>
		<link href="background.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<!--<form method="post" action="editProfile.php" enctype="multipart/form-data">
			<input type="submit" name="username" value="Change" class="btn btn-primary">
		</form>-->
		<nav class="navtop">
			<div>
				<h1>Proiect</h1>
				<a href="books.php"><i class="fas fa-user-circle"></i>Dashboard</a>
				<a href="user_edit.php"><i class="fas fa-user-circle" name="username"></i>Editare</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
			</div>
		</nav>
		<div class="content">
			<h2>Pagina de intrare</h2>
			<p>Bun venit, <?=$_SESSION['username']?>!</p>
		</div>
	</body>
</html>