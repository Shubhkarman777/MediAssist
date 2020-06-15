<?php
include_once("Connection.php");
    $PID = $_GET["pid1"];
    $lowl = $_GET["lowl"];
    $highl = $_GET["highl"];
    $Date = $_GET["date"];
    $Time = $_GET["time"];
        $query = "insert into bprecord(PID, lowl, highl, Date, Time) values('$PID', '$lowl', '$highl', '$Date', '$Time')";
        mysqli_query($dbcon, $query);
        
        if(mysqli_error($dbcon) == "")
        echo "Recored Saved Successfully!!";
        else
        echo "Failed!!";
?>