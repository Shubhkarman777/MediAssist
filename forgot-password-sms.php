<?php
include_once("Connection.php");
include_once("SMS_Script.php");
    $uid = $_GET["uid1"];
    $query = "select mob,pwd from doctor where uid='$uid'";
    $table=mysqli_query($dbcon,$query);

    if(mysqli_num_rows($table)==0)
        echo "This uid doesn't exist...";
    else
    {
        $row=mysqli_fetch_array($table);
        echo SendSMS($row["mob"],$row["pwd"]);
    }
?>