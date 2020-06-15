<?php
include_once("Connection.php");
    $uid = $_GET["uid"];
    $pwd = $_GET["pwd"];
    $mob = $_GET["mobile"];
    $radio = $_GET["rad"];
        $query = "insert into doctor(uid, pwd, mob, type) values('$uid', '$pwd', '$mob', '$radio')";
        mysqli_query($dbcon, $query);
        
        if(mysqli_error($dbcon) == "")
        echo "SignedUp Successfully!!";
        else
        echo "SignedUp Failed!!";
?>