<?php

include_once("Connection.php");

    if($_POST["btn"] == "save")
    {
        $orgname = $_FILES["Pic"]["name"];
        $size = $_FILES["Pic"]["size"];
        $tempname = $_FILES["Pic"]["tmp_name"];
        $type = $_FILES["Pic"]["type"];

        $file = "Uploads/".$orgname;
        move_uploaded_file($tempname,"Uploads/".$orgname);

        $dname = $_POST["name"];
        $qual = $_POST["qual"];
        $mob = $_POST["mob"];
        $spec = $_POST["spcl"];
        $exp = $_POST["exp"];
        $hname = $_POST["hname"];
        $hadd = $_POST["add"];
        $city = $_POST["city"];
        $others = $_POST["inst"];
        $query = "insert into doctors(pic, dname, qual, mob, spec, exp, hname, hadd, city, others) values ('$file', '$dname', '$qual', '$mob', '$spec', '$exp', '$hname', '$hadd', '$city', '$others')";
        mysqli_query($dbcon, $query);
        
        if(mysqli_error($dbcon) == "")
        echo "Record Submitted!";
        else
        echo mysqli_error($dbcon);
    }
    else
    {
        if($_POST["btn"] == "update")
        {
        $orgname = $_FILES["Pic"]["name"];
        $size = $_FILES["Pic"]["size"];
        $tempname = $_FILES["Pic"]["tmp_name"];
        $type = $_FILES["Pic"]["type"];

        if($orgname=="")
        {
            $file=$_POST["hdn"];
        }
        else
        {
             $file = "Uploads/".$orgname;
            move_uploaded_file($tempname,"Uploads/".$orgname);
        }

        $dname = $_POST["name"];
        $qual = $_POST["qual"];
        $mob = $_POST["mob"];
        $spec = $_POST["spcl"];
        $exp = $_POST["exp"];
        $hname = $_POST["hname"];
        $hadd = $_POST["add"];
        $city = $_POST["city"];
        $others = $_POST["inst"];
            $query = "update doctors set pic='$file', dname='$dname', qual='$qual', spec='$spec', exp='$exp', hname='$hname', hadd='$hadd', city='$city', others='$others' where mob='$mob'";
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
