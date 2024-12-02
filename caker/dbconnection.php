<?php
error_reporting(0);
$con=mysqli_connect('localhost', 'root', '','cake');
//$database = mysqli_select_db($con,'cake');
if(!$con)
{
die("Connection Failed : ".mysqli_connect_error());
}

if(mysqli_connect_errno())
{
die(mysqli_connect_errno().":".mysqli_connect_error());
}
?>