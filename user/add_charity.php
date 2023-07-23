<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

echo $query_insert = "INSERT INTO `tbl_charity` (c_name,address, c_status,date,fname,section,type) VALUES ('".$_POST['c_name']."', '".$_POST['address']."','0', '".$_POST['date']."','".$_POST['fname']."','".$_POST['section']."','".$_POST['type']."')";

mysql_query($query_insert) or die("Unable to insert data into the tbl_charity. ".mysql_error());


	

$_SESSION['student_com_mes']="Record has been added";




require_once '../library/close.php';
header("Location:view_customer.php?");
?>