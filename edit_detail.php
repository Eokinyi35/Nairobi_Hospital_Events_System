<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$payroll = $_POST['payroll'];

	require_once 'connection.php';

	$sql = "UPDATE users SET fullname='$fullname', email='$email' WHERE payroll='$payroll' ";

	if(mysqli_query($conn, $sql)){

		$result["success"] = "1";
		$result["message"] = "success";

		echo json_encode($result);
		mysqli_close($conn);

	}
}else{

	$result["success"] = "0";
	$result["message"] = "error!";
	echo json_encode($result);

	mysqli_close($conn);

}

?>