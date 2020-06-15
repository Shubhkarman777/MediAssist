<?php
session_start();
include_once("Connection.php");
    $uid = $_GET["uid1"];
    
    $_SESSION["uid"]=$uid;

    $pwd = $_GET["pwd1"];
    $query = "select type from doctor where uid='$uid' and pwd='$pwd'";
    $table=mysqli_query($dbcon,$query);

    if(mysqli_num_rows($table)==0)
        echo "Login Failed...";
    else
    {
        $row=mysqli_fetch_array($table);
        if($row["type"] == "Patient")
            echo "patient..";
        else
            echo "doctor..";
    }
?>