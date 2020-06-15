<?php

include_once("Connection.php");

    $dname=$_GET["dname"];

    $query="select * from doctors where dname='$dname'";

    $table=mysqli_query($dbcon,$query);

    $all=array();

    while($row=mysqli_fetch_array($table))
    {
        $all[]=$row;
    }

    echo json_encode($all);
?>