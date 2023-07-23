<?php 
session_start();
require_once '../library/config.php';

$emp_id=$_POST['emp_id'];

$query_update = "UPDATE  `tbl_emp` SET  `emp_name` =  '".$_POST['name']."',`emp_nic` =  '".$_POST['nic_no']."',`emp_tel` =  '".$_POST['tel']."',`emp_address` =  '".$_POST['address']."',`emp_no` =  '".$_POST['id_no']."',`type` =  '".$_POST['type']."' WHERE  `tbl_emp`.`emp_id` ='$emp_id'";
mysql_query($query_update) or die("Unable to update tbl_donation.".mysql_error());

$_SESSION['act_up_mes']="Record has been updated";

require_once '../library/close.php';
header('Location:display_employee.php');
?>