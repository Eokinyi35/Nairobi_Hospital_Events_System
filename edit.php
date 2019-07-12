<?php
session_start();
$ID = $_SESSION["assoc"];
require_once "connection.php";

if(isset($_POST["submit"])){
	// Variable declaration
	$payroll = htmlspecialchars($_POST["payroll"]);
	$fullname = htmlspecialchars($_POST["fullname"]);
	$phone = htmlspecialchars($_POST["phone"]);
	$email = htmlspecialchars($_POST["email"]);
	$department = htmlspecialchars($_POST["department"]);
	
	//Query inserting data into the table
	$sql = "UPDATE users SET fullname = '$fullname', phone = '$phone', email = '$email', department = '$department' WHERE payroll = '$payroll'";

	//Query to verify new record was created successfully in the table
	if ($conn->query($sql) === TRUE) {
		 echo "<script>alert('user updated successfully.');</script>";
	        echo "<script>window.close(); window.location = \"admin.html\";</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
?>