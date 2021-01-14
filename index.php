<!DOCTYPE html>
<html>
	<head>
		<link href="background.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post" class="form-horizontal">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" class="form-control" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Parola" class="form-control" id="password" required>
				<input type="submit" name="submit" value="Login" class="btn btn-primary">
				<p>Nu ai cont? <a href="register.php">Creeaza unul aici</a>.</p>
			</form>
		</div>
	</body>
</html>
<?php
	//require_once "./template/footer.php";
?>