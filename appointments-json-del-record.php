<?php

include_once("Connection.php");

$NewAppointment = $_GET["NewAppointment"];

$query="delete from consultancy where NewAppointment='$NewAppointment'";

mysqli_query($dbcon,$query);

if(mysqli_affected_rows($dbcon)>0)
    echo "Cancelled!!";
else
    echo "Invalid Appointment!!"; 
?>
