<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){

	$payroll = $_POST['payroll'];

	require_once "connection.php";

	$sql = "SELECT * FROM users WHERE payroll='$payroll' ";

	$response = mysqli_query($conn, $sql);

	$result = array();
	$result['read'] = array();

	if( mysqli_num_rows($response) === 1 ) {
		if($row = mysqli_fetch_assoc($response)) {
			$h['fullname']  = $row['fullname'];
			$h['email']  = $row['email'];

			array_push($result["read"], $h);

			$result["success"] = "1";
			echo json_encode($result);
		}
	}

}else{
	$result["success"] = "0";
	$result["message"] = "Error!";
	echo json_encode($result);

	mysqli_close($conn);
}

?>