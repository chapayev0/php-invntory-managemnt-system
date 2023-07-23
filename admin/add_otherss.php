<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];


 $query_insert="INSERT INTO tbl_h_income(type,amount,dis,h_status,no,date) VALUES('".$_POST['type']."','".$_POST['amount']."','".$_POST['dis']."','".$_POST['0']."','0','".$_POST['date']."')";
mysql_query($query_insert) or die("Unable to insert data into the tbl_bills. ".mysql_error());

$_SESSION['user_add_mes']="Record has been added";

		
require_once '../library/close.php';
header("Location:display_otherss.php");
?>