<?php 
session_start();
require_once '../library/config.php';

$current_date=date('Y-m-d');

 $query_update="UPDATE tbl_bill SET activity_status='".$_REQUEST['activity_status']."' WHERE bill_id ='".$_REQUEST['bill_id']."'";
mysqli_query($connection,$query_update) or die("Unable to update tbl_grade_student. ".mysqli_error());

$query_update="UPDATE tbl_bill SET pay_date='$current_date' WHERE bill_id ='".$_REQUEST['bill_id']."'";
mysqli_query($connection,$query_update) or die("Unable to update tbl_grade_student. ".mysqli_error());


require_once '../library/close.php';	
	
$_SESSION['up_com_mes']="Activity status has been updated";
header('Location:display_cus_bill.php');

?>