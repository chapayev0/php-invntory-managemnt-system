<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

 $query_insert="INSERT INTO tbl_login(name,time,tel,date,l_status) VALUES('".$_POST['name']."','".$_POST['nic']."','".$_POST['tel']."','".$_POST['address']."','".$_POST['description']."', '".$_POST['amount']."', '".$_POST['donation_type']."','".$_POST['date']."','0','".$_POST['v']."')";
mysqli_query($connection,$query_insert) or die("Unable to insert data into the tbl_donation. ".mysqli_error());

$_SESSION['user_add_mes']="Record has been added";

		
require_once '../library/close.php';
header("Location:activity.php");
?>