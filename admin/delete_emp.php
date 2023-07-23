<?php 
session_start();
require_once '../library/config.php';

$query_del="UPDATE  tbl_emp SET emp_status='1' WHERE emp_id='".$_REQUEST['emp_id']."'";
mysql_query($query_del) or die("Unable to update  tbl_user. ".mysql_error());
$_SESSION['stu_del_mes']="Record has been deleted";

require_once '../library/close.php';
header('Location:display_employee.php');
?>