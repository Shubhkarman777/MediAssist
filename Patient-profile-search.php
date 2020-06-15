<?php

include_once("Connection.php");
    $pid = $_GET["pid"];

    $query = "select * from patient where pid='$pid'";

    $table = mysqli_query($dbcon, $query);

    $all = array();
    
    while($row = mysqli_fetch_array($table))
    {
        $all[] = $row;
    }

    echo json_encode($all);

?>