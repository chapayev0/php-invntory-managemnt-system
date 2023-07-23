<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];


 $query_insert="INSERT INTO tbl_emp(emp_name,emp_no,emp_nic,emp_address,emp_tel,emp_status,type) VALUES('".$_POST['name']."','".$_POST['id_no']."','".$_POST['nic']."','".$_POST['address']."','".$_POST['tel']."','0','".$_POST['type']."')";
mysql_query($query_insert) or die("Unable to insert data into the tbl_emp. ".mysql_error());



		
require_once '../library/close.php';
header("Location:display_employee.php");
?>