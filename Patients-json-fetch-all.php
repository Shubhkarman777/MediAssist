<?php

include_once("Connection.php");

    $query="select * from doctor where type='patient'";

    $table=mysqli_query($dbcon,$query);

    $all=array();
    while($row=mysqli_fetch_array($table))
    {
        $all[]= $row;
    }

    echo json_encode($all);

?>
