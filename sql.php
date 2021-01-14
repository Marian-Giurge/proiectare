<?php
$servername = "remotemysql.com";
$username = "IgxJ1bzQxN";
$password = "gepyaqm2Na";
$dbname = "IgxJ1bzQxN";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
	$user = $_POST['username'];
    $pass = $_POST['password'];
    $mail = $_POST['email'];
	$sql = "INSERT INTO accounts (username, password, email) VALUES ('$_POST[username]', '$_POST[password]', '$_POST[email]')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>