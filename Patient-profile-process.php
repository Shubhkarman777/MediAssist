<?php

include_once("Connection.php");

    if($_GET["btn"] == "save")
    {

        $fname = $_GET["fname"];
        $lname = $_GET["lname"];
        $pid = $_GET["pidd"];
        $mail = $_GET["mail"];
        $mob = $_GET["mob"];
        $gender = $_GET["gndr"];
        $city = $_GET["city"];
        $state = $_GET["state"];
        $zip = $_GET["zip"];
        $query = "insert into patient(fname, lname, pid, mail, mob, gender, city, state, zip) values ('$fname', '$lname', '$pid', '$mail', '$mob', '$gender', '$city', '$state', '$zip')";
        mysqli_query($dbcon, $query);
        
        if(mysqli_error($dbcon) == "")
        echo "Record Submitted!";
        else
        echo mysqli_error($dbcon);
    }
    else
    {
        if($_GET["btn"] == "update")
        {

        
        $fname = $_GET["fname"];
        $lname = $_GET["lname"];
        $pid = $_GET["pidd"];
        $mail = $_GET["mail"];
        $mob = $_GET["mob"];
        $gender = $_GET["gndr"];
        $city = $_GET["city"];
        $state = $_GET["state"];
        $zip = $_GET["zip"];
            $query = "update patient set fname='$fname', lname='$lname', mail='$mail', mob='$mob', gender='$gender', city='$city', state='$state', zip='$zip' where pid='$pid'";
            mysqli_query($dbcon, $query);

            if(mysqli_error($dbcon) == "")
            {
                if(mysqli_affected_rows($dbcon) != 0)
                    echo "Record updated!!";
                else
                    echo "Invalid ID";
            }
            else
                echo mysqli_error($dbcon);
        }
    }

?>