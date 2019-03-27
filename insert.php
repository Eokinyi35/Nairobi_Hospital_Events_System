<?php
require_once "connection.php";

if(isset($_POST["submit"])){
	// Variable declaration
	$payroll = htmlspecialchars($_POST["payroll"]);
	$fullname = htmlspecialchars($_POST["fullname"]);
	$email = htmlspecialchars($_POST["email"]);
	$password = htmlspecialchars($_POST["password"]);
	$hash_password = md5($password);
	

	$sql0 = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
    if(!empty($sql0))
    {
	    $row = mysqli_num_rows($sql0);
	    if($row > 0 )
	    {
		echo '<script>alert("email already exists")</script>';
		echo "<script>window.close(); window.location = \"admin.html\";</script>";
		// @header("Location: signup.php");
		// exit();
		}else{
			$sql = "INSERT INTO users (payroll, fullname, email, password) VALUES ('$payroll', '$fullname', '$email', '$hash_password')";


			if ($conn->query($sql) === TRUE) {
				$result["success"] = "1";
				echo '<script>alert("user created Successfully")</script>';
				echo "<script>window.close(); window.location = \"admin.html\";</script>";
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