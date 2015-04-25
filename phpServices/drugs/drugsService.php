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


if($query_no== 1){
	$sql = "SELECT `id`, `bangla`, `pdf`, `english` FROM `drugdaytype` WHERE 1 = 1";
	$result=mysql_query($sql);
	$data = array();
	while ($row=mysql_fetch_array($result)){
		array_push($data,$row);
	}
	
	echo json_encode($data);
	
}else if($query_no==0){
	$sql = "SELECT `id`, `name`, `initial`, `unit`, `unitInitial`, `optionalUnitInitial` FROM `drugtype` WHERE 1 = 1";
	$result=mysql_query($sql);
	
	$data = array();
	while ($row=mysql_fetch_array($result)){
		array_push($data,$row);
	}
	
	echo json_encode($data);
}else if($query_no==2){
	$sql = "SELECT `id`, `bangla`, `english`, `pdf` FROM `drugWhenType` WHERE 1 = 1";
	$result=mysql_query($sql);
	
	$data = array();
	while ($row=mysql_fetch_array($result)){
		array_push($data,$row);
	}
	
	echo json_encode($data);
}else if($query_no==3){
	$sql = "SELECT dat.id, dat.bangla, dat.english, dat.pdf
			FROM `drugAdviceType` dat
			WHERE dat.doctorType =0
			UNION
			SELECT dat.id, dat.bangla, dat.english, dat.pdf
			FROM `drugAdviceType` dat
			LEFT JOIN doctorsettings ds ON dat.doctorType = ds.category
			JOIN doctor d ON d.doctorID = ds.doctorID
			WHERE d.doctorCode = '$username'";
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