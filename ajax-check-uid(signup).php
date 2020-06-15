<?php

include_once("Connection.php");
    $uid = $_GET["uid"];
        $query = "select * from doctor where uid='$uid'";
        $table = mysqli_query($dbcon, $query);
        $count = mysqli_num_rows($table);
        if($count == 0)
            echo "1";
        else
            echo "0"; 

?>
