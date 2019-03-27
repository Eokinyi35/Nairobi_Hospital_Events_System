<?php
require_once "connection.php";

if(isset($_POST["submit"])){
	// Variable declaration
	$eventname = htmlspecialchars($_POST["eventname"]);
	$firstdate = htmlspecialchars($_POST["firstdate"]);
	$seconddate = htmlspecialchars($_POST["seconddate"]);
	$eventtype = htmlspecialchars($_POST["eventtype"]);
	
	if (move_uploaded_file($_FILES["image"]["tmp_name"], "img/" . $_FILES["image"]["name"])){
    $eventimage = basename($_FILES["image"]["name"]);
  }else{
$eventimage = "events.png";
  }
	

	$sql = "INSERT INTO eventchoice (eventname, eventimage, firstdate, seconddate, eventtype) VALUES ('$eventname', '$eventimage', '$firstdate', '$seconddate', '$eventtype')";


	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		@header("Location: admin.html");
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>