<?php

include_once("Connection.php");

    $hname = $_GET["hname"];
    $query = "select distinct dname from doctors where hname='$hname'";

    $table = mysqli_query($dbcon, $query);

    $all = array();
    
    while($row = mysqli_fetch_array($table))
    {
        $all[] = $row;
    }

    echo json_encode($all);

?>
