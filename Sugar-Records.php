<?php
include_once("Connection.php");
    $PID = $_GET["pid2"];
    $SType = $_GET["type"];
    $Category = $_GET["cate"];
    $NormalLevel = $_GET["lev"];
    $PreDiabeticLevel = $_GET["lev1"];
    $DiabeticLevel = $_GET["lev2"];
    $Date = $_GET["date1"];
    $Time = $_GET["time1"];
        $query = "insert into sugarrecord(PID, SType, Category, NormalLevel, PreDiabeticLevel, DiabeticLevel, Date, 
        Time) values('$PID', '$SType', '$Category', '$NormalLevel', '$PreDiabeticLevel', '$DiabeticLevel', '$Date', '$Time')";
        mysqli_query($dbcon, $query);
        
        if(mysqli_error($dbcon) == "")
        echo "Recored Saved Successfully!!";
        else
        echo "Failed!!";
?>