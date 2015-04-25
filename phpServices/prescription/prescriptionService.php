<?php

session_start();
include('../config.inc');
if (!isset($_SESSION['username'])) {
	header('Location: index.php');
}
$username = $_SESSION['username'];
$appointmentNO = $_SESSION['appointmentID'];
$patientCode = $_SESSION['patientCode'];
$date=date("Y-m-d");
$query_no=  mysql_escape_String($_POST['query']);


if($query_no== 0){
	$sql = "SELECT 
				`patientID`, `patientCode`, `name`, `age`, `sex`, `address`, `phone` 
			FROM `patient` WHERE `patientCode` = '$patientCode'";
	$result=mysql_query($sql);
	$rec=mysql_fetch_array($result);
	
	echo json_encode($rec);
	
}else if($query_no==1){
	$sql = "SELECT 
				ms.menuHeader, ms.order, m.menuURL
			FROM `menusettings` ms
			JOIN doctor doc ON ms.doctorID = doc.doctorID
			JOIN menu m ON ms.menuID = m.menuID
			WHERE doc.doctorCode = '$username'
			ORDER BY ms.order ASC";
	$result=mysql_query($sql);
	
	$data = array();
	while ($row=mysql_fetch_array($result)){
		array_push($data,$row);
	}
	
	echo json_encode($data);
}

if($query_no==2){
	
	
}
else if($query_no==3){
	
}
else if($query_no==4){
            
	
}else if($query_no==5){
	
}
	
?>