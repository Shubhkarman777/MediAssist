<?php

    include_once("Connection.php");
    $uid = $_GET["uid1"];
        $query = "select pwd from doctor where uid='$uid'";
        $table = mysqli_query($dbcon, $query);
        $count = mysqli_num_rows($table);
        if($count == 0)
            echo "0";
        else
        {
            $row = mysqli_fetch_array($table);
            echo $row["pwd"];
        }

?>