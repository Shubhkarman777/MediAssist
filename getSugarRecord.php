<?php

include_once("Connection.php");
session_start();
$pid = $_SESSION["uid"];
$query="select Date,NormalLevel,PrediabeticLevel,DiabeticLevel from sugarrecord where PID='$pid'";

$table = mysqli_query($dbcon, $query);

$date=array();
$date['Date']="Date Of Recording";

$NormalLevel=array();
$NormalLevel['NormalLevel']="NormalLevel";

$PrediabeticLevel=array();
$PrediabeticLevel['PrediabeticLevel']="PrediabeticLevel";

$DiabeticLevel=array();
$DiabeticLevel['DiabeticLevel']="DiabeticLevel";

while($row=mysqli_fetch_array($table))
	{
		$date['data'][]=$row["Date"];
		$NormalLevel['data'][]=$row["NormalLevel"];
		$PrediabeticLevel['data'][]=$row["PrediabeticLevel"];
		$DiabeticLevel['data'][]=$row["DiabeticLevel"];
    }
	$result=array();
	array_push($result,$date);
	array_push($result,$NormalLevel);
	array_push($result,$PrediabeticLevel);
	array_push($result,$DiabeticLevel);
	echo json_encode($result,JSON_NUMERIC_CHECK);
	
?>


