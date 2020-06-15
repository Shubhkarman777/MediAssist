<?php
include_once("Connection.php");
    $star = $_GET["hdn"];
    $doctoName = $_GET["items2"];
    $hname = $_GET["items1"];
    $review = $_GET["rev"];
        $query = "select * from reviews where doctorName='$doctoName' and hospital='$hname'";
        $table = mysqli_query($dbcon, $query);
        $count = mysqli_num_rows($table);
        if($count == 0)
        {
            $query1 = "insert into reviews(hospital, doctorName, star, review) values('$hname', '$doctoName', '$star', '$review')";
            mysqli_query($dbcon, $query1);
        
            if(mysqli_error($dbcon) == "")
                echo "Reviews Saved Successfully!!"; 
            else
                echo mysqli_error($dbcon);
        }
        else
        {
            $query = "select star, review from reviews where doctorName='$doctoName' and hospital='$hname'";
            $table = mysqli_query($dbcon, $query);
            $row=mysqli_fetch_array($table);
            $starr = $row["star"];
            $temp = $star + $starr;
            
            $query1 = "update reviews set star = '$temp', review = '$review' where doctorName='$doctoName' and hospital='$hname'";
            mysqli_query($dbcon, $query1);
        
            if(mysqli_error($dbcon) == "")
                echo "Reviews Saved Successfully!!"; 
            else
                echo mysqli_error($dbcon);
        }
?>
