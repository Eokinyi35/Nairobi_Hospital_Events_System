<?php

require_once "connection.php";

if (isset($_GET['key'])) {
	$key = $_GET['key'];
	$query = "SELECT * FROM users WHERE fullname LIKE '%$key%'";
	$result = mysqli_query($conn, $query);
		$response = $array();
		while ($row = msqli_fetch_assoc($result)) {
			array_push($response, 
				array(
					'payroll'=>$row['payroll'],
					'fullname'=>$row['fullname'],
					'email'=>$row['email'])
				);
		}
		echo json_encode($response);
		
}else{
	$query = "SELECT * FROM users";
	$result = mysqli_query($conn, $query);
		$response = $array();
		while ($row = msqli_fetch_assoc($result)) {
			array_push($response, 
				array(
					'payroll'=>$row['payroll'],
					'fullname'=>$row['fullname'],
					'email'=>$row['email'])
				);
		}
		echo json_encode($response);
}

mysqli_close($conn);
?>