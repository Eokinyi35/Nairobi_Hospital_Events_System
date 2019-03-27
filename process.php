<?php
session_start();
$ID = $_SESSION["assoc"];
// $campaign_id = $_GET['camp_id'];
require_once "connection.php";
//echo $ID;		
if(isset($_POST	["submit"])){
	// $Name = 'WFO';		
	// $sql1 = "SELECT user_id FROM household WHERE username = '$ID'
	// 		UNION 
	// 		SELECT campaign_id FROM donationscampaigns WHERE Name = '$Name'";

	// 		$result = $conn->query($sql1);

	$eventdate = htmlspecialchars($_POST["eventdate"]);
	$payroll = $ID;
	$eventId = $_POST["event_id"];

	echo $lat;
	echo "</br>";
	echo $lng;

	   if (move_uploaded_file($_FILES["image"]["tmp_name"], "img/" . $_FILES["image"]["name"])){
     $image = basename($_FILES["image"]["name"]);

   }else{
  	
	$image = "li2.jpg";
   }

   $sql_em = "SELECT * FROM users WHERE `payroll`='$ID'  JOIN SELECT * FROM events WHERE `eventId`='$eventId'";
   $sql_em_result = mysqli_query($conn, $sql_em);

   while ($row=mysqli_fetch_array($sql_em_result)) {
   	$email = $row['email'];
   	$fullname = $row['fullname'];
   	$eventname = $row['eventname'];
   }
	
	//Query inserting data into the table
	$sql = "INSERT INTO registered (payroll , fullname, email, eventname, eventId, eventdate) VALUES ('$payroll', '$fullname', '$email', '$eventname', '$eventId', '$eventdate')";
	// echo "$sql";die;
	//Query to verify new record was created successfully in the table
	if ($conn->query($sql) === TRUE) {
		 echo "<a href='body.php'>back</a>"; 
		//@header("Location: body.php");
		exit();
	} else {
		echo "Error: " . "<br>" . $conn->error;
	}

}
  	echo "other";

?>