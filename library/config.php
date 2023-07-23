<?php 
$host="localhost";
$uname="root";
$pwd="";
$db="itmart";

// Create connection
$connection = new mysqli($host,$uname,$pwd,$db);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

date_default_timezone_set('Asia/Colombo');


?>
