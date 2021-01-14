<?php
	session_start();
	$title = "Editare user";
	//require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_SESSION['username'])){
		$change = $_SESSION['username'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($change)){
		echo "Empty isbn! check again!";
		exit;
	}

	$query = "SELECT * FROM accounts WHERE username = '$change'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Nu se pot afisa datele pentru ca: " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
	<form method="post" action="editProfile.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ID</th>
				<td><input type="text" name="id" value="<?php echo $row['id'];?>" readonly="true"></td>
			</tr>
			<tr>
				<th>Username</th>
				<td><input type="text" name="username" value="<?php echo $row['username'];?>"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="text" name="password" value="<?php echo $row['password'];?>"></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="text" name="email" value="<?php echo $row['email'];?>"></td>
			</tr>
		</table>
		<input type="submit" name="save_change2" value="Change" class="btn btn-primary">
		<!--<input type="reset" value="cancel" class="btn btn-default">-->
	</form>
	<br/>
	<!--<a href="logout.php" class="btn btn-success">Confirm</a>-->
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require "./template/header.php"
?>