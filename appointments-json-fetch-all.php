<?php

include_once("Connection.php");

    $PID = $_GET["PID"];
    $Doctor = $_GET["Doctor"];
    $query = "select * from consultancy where PID='$PID' and Doctor='$Doctor'  ORDER BY NewAppointment DESC";

    $table = mysqli_query($dbcon, $query);

    $all = array();
    
    while($row = mysqli_fetch_array($table))
    {
        $all[] = $row;
    }

    echo json_encode($all);

?>
