<?php
session_start();
$ID = $_SESSION["assoc"]; 
$event_id = $_GET['event_id'];
require_once "connection.php";
//echo $ID;		
if(isset($_POST	["submit"])){
	// $Name = 'WFO';		
	// $sql1 = "SELECT user_id FROM household WHERE username = '$ID'
	// 		UNION 
	// 		SELECT campaign_id FROM donationscampaigns WHERE Name = '$Name'";

	// 		$result = $conn->query($sql1);

	$eventdate = htmlspecialchars($_POST["eventdate"]);
	$transportation = htmlspecialchars($_POST["transportation"]);
	$payroll = $ID;
	$eventId = $event_id;

	

   $sql_em = "SELECT * FROM users JOIN eventchoice ON `eventId`='$event_id' WHERE `payroll`='$ID'";
   $sql_em_result = mysqli_query($conn, $sql_em);

   while ($row=mysqli_fetch_array($sql_em_result)) {
   	$phone = $row['phone'];
   	$fullname = $row['fullname'];
   	$department = $row['department'];
   	$eventname = $row['eventname'];
   	$eventtype = $row['eventtype'];
   }
   $sql0 = mysqli_query($conn,"SELECT * FROM registered WHERE payroll = '$payroll' AND eventId = '$event_id'");
    if(!empty($sql0))
    {
	    $row = mysqli_num_rows($sql0);
	    if($row > 0 )
	    {
		echo '<script>alert("event already registered")</script>';
		echo "<script>window.close(); window.location = \"body.php\";</script>";

		}else{
		//Query inserting data into the table
		$sql = "INSERT INTO registered (payroll , fullname, phone, department, eventname, eventId, eventdate, eventtype, transportation) VALUES ('$payroll', '$fullname', '$phone', '$department', '$eventname', '$eventId', '$eventdate', '$eventtype', '$transportation')";
		// echo "$sql";die;
		//Query to verify new record was created successfully in the table
			if ($conn->query($sql) === TRUE) {
				echo "<script>alert('Event registration successful.');</script>";
			        echo "<script>window.close(); window.location = \"body.php\";</script>";
				 //echo "<a href='body.php'>back</a>"; 
				//@header("Location: body.php");
				exit();
			} else {
				echo "<script>alert('Event registration unsuccessful.');</script>";
			        echo "<script>window.close(); window.location = \"register.php\";</script>";
				echo "Error: " . "<br>" . $conn->error;
			}
		}

	}
}
  	echo "other";

?>