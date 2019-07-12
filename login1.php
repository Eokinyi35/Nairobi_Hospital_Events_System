<?php 
// include("db_configs/db_connection.php"); 
//require_once './library/config.php';
//require_once './library/functions.php';
require_once 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>TNH Events</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="loginbox">
	<img src="img/avatar1.png" class="avatar" width="80px" height="80px">

	<h1>EVENTS | Login Here</h1>
	<form method="POST" action="save.php">
		<p>Email</p>
		<input type="email" name="email" placeholder="Enter Email" required>
		<p>Password</p>
		<input type="password" name="password" placeholder="Enter password" required>
		<input type="submit" name="submit" value="Submit"><br>
		<a href="#">Lost your password?</a><br>
		<a href="#">Don't have an account</a>
	</form>

</body>
</html>