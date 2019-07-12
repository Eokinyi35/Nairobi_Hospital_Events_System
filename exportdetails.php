<?php  
$conn = new mysqli('localhost', 'root', '');  
mysqli_select_db($conn, 'tnhevents');  
$event_id = $_GET['event_id'];
$sql = "SELECT `payroll`,`fullname`,`department`,`eventdate`,`phone`,`transportation` FROM `registered` WHERE `eventId` = $event_id";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Payroll" . "\t" . "Full Name" . "\t" . "Department" . "\t" . "Event Date" . "\t" . "Phone Number" . "\t" . "Transportation" . "\t";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Registered_Details.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 