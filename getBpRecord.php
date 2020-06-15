<?php

include_once("Connection.php");
session_start();
$pid = $_SESSION["uid"];
$query="select Date,lowl,highl from bprecord where PID='$pid'";

$table = mysqli_query($dbcon, $query);

$date=array();
$date['Date']="Date Of Recording";

$lowl=array();
$lowl['lowl']="Diastolic";

$highl=array();
$highl['highl']="Systolic";

while($row=mysqli_fetch_array($table))
	{
		$date['data'][]=$row["Date"];
		$lowl['data'][]=$row["lowl"];
		$highl['data'][]=$row["highl"];
    }
	$result=array();
	array_push($result,$date);
	array_push($result,$lowl);
	array_push($result,$highl);
	echo json_encode($result,JSON_NUMERIC_CHECK);
	
?>


