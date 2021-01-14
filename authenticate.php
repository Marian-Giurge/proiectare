<?php
session_start();

$DATABASE_HOST = 'remotemysql.com';
$DATABASE_USER = 'IgxJ1bzQxN';
$DATABASE_PASS = 'gepyaqm2Na';
$DATABASE_NAME = 'IgxJ1bzQxN';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {

	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {
	
	exit('Please fill both the username and password fields!');
}

$sql="SELECT * FROM accounts WHERE username='".$_POST["username"]."' and password='".$_POST["password"]."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
if(is_array($row))
{
	$_SESSION["username"]=$row["username"];
	$_SESSION["id"]=$row["id"];
	echo "logare cu succes";
	header("Location:home.php");
}
else
{
	echo "eroare la logare";
}
	
	$con->close();

?>