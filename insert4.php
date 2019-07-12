<?php
require_once "connection.php";

session_start();
$ID = $_SESSION["assoc"];

if(isset($_POST["Submit"])){
	// Variable declaration
	$eventname = htmlspecialchars($_POST["eventname"]);
	$firstdate = htmlspecialchars($_POST["firstdate"]);
	$seconddate = htmlspecialchars($_POST["seconddate"]);
	$eventtype = htmlspecialchars($_POST["eventtype"]);
	
	if (move_uploaded_file($_FILES["image"]["tmp_name"], "img/" . $_FILES["image"]["name"])){
    $image = basename($_FILES["image"]["name"]);
  }else{
  	echo "Something's wrong";
$image = "events.png";
  }
	

	$sql = "INSERT INTO eventchoice (eventname, image, firstdate, seconddate, eventtype) VALUES ('$eventname', '$image', '$firstdate', '$seconddate', '$eventtype')";


	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		@header("Location: index.php");
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>