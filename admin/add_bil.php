<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];


 $query_insert="INSERT INTO puja(p_name,p_status) VALUES('".$_POST['name']."','0')";
mysqli_query($connection,$query_insert) or die("Unable to insert data into the tbl_emp. ".mysqli_error());



		
require_once '../library/close.php';
header("Location:bill.php");
?>