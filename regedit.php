<?php
session_start();
$ID = $_SESSION["assoc"];
$event_id = $_GET['event_id'];
require_once "connection.php";

if(isset($_POST["submit"])){
	// Variable declaration
	$payroll = $ID;
	$eventdate = htmlspecialchars($_POST["eventdate"]);
	$transportation = htmlspecialchars($_POST["transportation"]);
	$eventId = $event_id;
	
	//Query inserting data into the table
	$sql = "UPDATE registered SET eventdate = '$eventdate', transportation = '$transportation'WHERE payroll = '$ID' AND eventId = '$event_id'";

	//Query to verify new record was created successfully in the table
	if ($conn->query($sql) === TRUE) {
		 echo "<script>alert('Registration updated successfully.');</script>";
	     echo "<script>window.close(); window.location = \"body.php\";</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
?>