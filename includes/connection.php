<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "raspored_rada";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);  
if(mysqli_connect_errno()) {  
    header("location:login.php?error=nodb");
    exit();
}   