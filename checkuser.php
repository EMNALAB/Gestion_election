<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
extract($_REQUEST);

// this checks for duplicate entry of email in database
require_once('connection.php');
$q="SELECT * FROM voters WHERE email='$email'";
$result=mysqli_query($con,$q);

if(mysqli_num_rows($result)){
    echo"Email already registerd. Please try another";
}
else{
    echo"";
}
?>