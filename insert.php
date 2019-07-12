<?php
require_once "connection.php";

if(isset($_POST["submit"])){
	// Variable declaration
	$payroll = htmlspecialchars($_POST["payroll"]);
	$fullname = htmlspecialchars($_POST["fullname"]);
	$email = htmlspecialchars($_POST["email"]);
	$department = htmlspecialchars($_POST["department"]);
	$phone = htmlspecialchars($_POST["phone"]);
	$password = htmlspecialchars($_POST["password"]);
	$hash_password = md5($password);
	

	$sql0 = mysqli_query($conn,"SELECT * FROM users WHERE payroll = '$payroll'");
    if(!empty($sql0))
    {
	    $row = mysqli_num_rows($sql0);
	    if($row > 0 )
	    {
		echo '<script>alert("email already exists")</script>';
		echo "<script>window.close(); window.location = \"register.html\";</script>";
		// @header("Location: signup.php");
		// exit();
		}else{
			$sql = "INSERT INTO users (payroll, fullname, email, department, phone, password) VALUES ('$payroll', '$fullname', '$email', '$department', '$phone', '$hash_password')";


			if ($conn->query($sql) === TRUE) {
				$result["success"] = "1";
				echo '<script>alert("user created Successfully")</script>';
				echo "<script>window.close(); window.location = \"index.php\";</script>";
				//@header("Location: login.php");
				exit();
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	} else {
		echo "Error: " . $sql0 . "<br>" . $conn->error;
	}
}
?>