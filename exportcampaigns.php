<?php  
$conn = new mysqli('localhost', 'root', '');  
mysqli_select_db($conn, 'tnhevents');  
$sql = "SELECT `eventId`,`eventname`, `eventtype`,`fullname`, `payroll`, `phone`, `department`, `transportation` FROM `registered` WHERE `eventtype` = 'Campaigns'";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Event ID" . "\t" . "Event Name" . "\t" . "Event Type" . "\t" . "Full Name" . "\t" . "Payroll" . "\t" . "Phone" . "\t" . "Department" . "\t" . "Transportation" . "\t";  
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
header("Content-Disposition: attachment; filename=Campaigns_Registered.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 