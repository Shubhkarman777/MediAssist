<?php
include_once("Connection.php");
    $PID = $_POST["PID"];
    $Doctor = $_POST["Doctor"];
    $CDate = $_POST["cdate"];

    $orgname = $_FILES["Pic"]["name"];
    $size = $_FILES["Pic"]["size"];
    $tempname = $_FILES["Pic"]["tmp_name"];
    $type = $_FILES["Pic"]["type"];

    $file = "Uploads/".$orgname;
    move_uploaded_file($tempname,"Uploads/".$orgname);

    $Inst = $_POST["inst"];
    $Nc = $_POST["ncdate"];
        $query = "insert into consultancy(PID, Doctor, CDate, Pic, Inst, NewAppointment) values('$PID', '$Doctor', '$CDate', '$file', '$Inst', '$Nc')";
        mysqli_query($dbcon, $query);
        
        if(mysqli_error($dbcon) == "")
        echo "Recored Saved Successfully!!";
        else
        echo mysqli_error($dbcon);
?>