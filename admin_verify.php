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

if ( !isset($_POST['name'], $_POST['pass']) ) {
	
	exit('Please fill both the username and password fields!');
}

$sql="SELECT * FROM admin WHERE name='".$_POST["name"]."' and pass='".$_POST["pass"]."'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
if(is_array($row))
{
	$_SESSION["name"]=$row["name"];
	echo "logare cu succes";
	header("Location:admin_book.php");
}
else
{
	echo "eroare la logare";
}
	
	$con->close();

?>