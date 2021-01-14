<?php
	session_start();

	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	require_once "./functions/database_functions.php";
	$title = "Purchase Process";
	require "./template/header.php";
	$conn = db_connect();
	$data = date("Y-m-d H:i:s");
	session_unset();
?>
<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8">
		<title>Login</title>
		
	</head>
	<body>
		<div class="login">
			<h1>Succes</h1>
			<form action="authenticate.php" method="post">
				<p>Comanda s-a realizat cu succes. Cardul tau este acum gol.</p>
			</form>
		</div>
	</body>
</html>

<?php
	if(isset($conn)){
		mysqli_close($conn);
	}
?>