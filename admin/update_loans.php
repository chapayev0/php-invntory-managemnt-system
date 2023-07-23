<?php 
session_start();
require_once '../library/config.php';

//$emp_id=$_POST['emp_id'];
$b_id=$_POST['b_id'];
 $query_update = "UPDATE  tbl_loans SET  b_nam = '".$_POST['name']."',acc_name =  '".$_POST['nm']."',manager=  '".$_POST['man']."',fax=  '".$_POST['fax']."',tel=  '".$_POST['tel']."',email=  '".$_POST['mail']."'  WHERE  b_id ='$b_id'";
mysql_query($query_update) or die("Unable to update tbl_donation.".mysql_error());

$_SESSION['act_up_mes']="Record has been updated";

require_once '../library/close.php';
header('Location:display_loans.php');
?>