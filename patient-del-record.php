<?php

include_once("Connection.php");

    $uid=$_GET["pid"];

    $query="delete from doctor where uid='$uid'";

    mysqli_query($dbcon,$query);

    if(mysqli_affected_rows($dbcon)>0)
        echo "deleted";
    else
        echo "invalid id"; 
?>
