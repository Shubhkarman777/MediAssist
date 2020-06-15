<?php

include_once("Connection.php");
    $PID = $_GET["PID"];
    $query = "select distinct Doctor from consultancy where PID='$PID'";

    $table = mysqli_query($dbcon, $query);

    $all = array();
    
    while($row = mysqli_fetch_array($table))
    {
        $all[] = $row;
    }

    echo json_encode($all);

?>