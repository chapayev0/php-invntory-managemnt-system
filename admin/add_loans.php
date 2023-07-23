<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$query_insert = "INSERT INTO tbl_loans(b_nam,address,acc_name,b_status, date,tel,fax,manager,email) VALUES ('".$_POST['b_name']."', '".$_POST['address']."', '".$_POST['acc_name']."','0', '".$_POST['date']."','".$_POST['tel']."','".$_POST['fax']."','".$_POST['manager']."','".$_POST['email']."')";

mysqli_query($connection,$query_insert) or die("Unable to insert data into the tbl_reciept. ".mysqli_error());





require_once '../library/close.php';
header("Location:display_loans.php?");
?>