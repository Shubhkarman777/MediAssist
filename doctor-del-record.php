<?php

include_once("Connection.php");

    $dname=$_GET["dname"];

    $query="delete from doctor where uid='$dname'";

    mysqli_query($dbcon,$query);

    if(mysqli_affected_rows($dbcon)>0)
        echo "deleted";
    else
        echo "invalid id"; 
?>
