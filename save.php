<?php
session_start();
// include("connection.php");
// Declaring database constants
$servername = "localhost";
$serveruser = "root";
$serverpass = "";
$dbname = "tnhevents";

//Create the database connection
$conn = new mysqli($servername, $serveruser, $serverpass, $dbname);

// Check connection
if ($conn->connect_error){
die("Connection Failed: ". $conn->connect_error);
} 
else{
if(isset($_POST['submit']))
{

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' and password = '$password'");
    if(!empty($sql))
    {
	    $row = mysqli_num_rows($sql);

	    $result = array();
	    $result['login'] = array();

	    if($row > 0 )
	    {
// $row = mysql_result(result, row)ult($sql, 1);
// echo $row;
	    	if($currentRow = mysqli_fetch_assoc($sql)) {
	    		$_SESSION["assoc"] = $currentRow['payroll'];
	    	}
	    	$result['success'] = "1";
	    	$result['message'] = "success";
	    	echo json_encode($result);
	    	if ($_SESSION["assoc"] == '1') {
	    		echo "<script>alert('Login successful.');</script>";
	        	echo "<script>window.close(); window.location = \"index.php\";</script>";
	    	}else{
	    		echo "<script>alert('Login successful.');</script>";
	        	echo "<script>window.close(); window.location = \"body.php\";</script>";
	    	}
			//header('Location: body.php');
	      // echo "<script>window.location='body.php';</script>";
	      // echo "<script>window.close(); window.location = \"body.php\";</script>";
	    }else {
	    	//echo "Santa Nothing"; 
	    	$result['success'] = "0"; 
	    	$result['message'] = "error";
	    	echo json_encode($result);
	        echo "<script>alert('Login unsuccessful.');</script>";
	        echo "<script>window.close(); window.location = \"index.html\";</script>";
	    }
	}
	    	


}
}

?>