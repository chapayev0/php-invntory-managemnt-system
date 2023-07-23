<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';

$user_id=$_SESSION['user_id'];
$current_date=date('Y-m-d');
$current_time=date('g:i A');

$discount=isset($_POST['discount'])?$_POST['discount']:0;
		
$query_insert="INSERT INTO step_bill(bill_id,name,nic,address,l_date,date,status,u_id,pay) 
VALUES('".$_POST['bill_no']."','".$_POST['name']."','".$_POST['nic']."','".$_POST['address']."','".$_POST['l_date']."','".$_POST['t_date']."','0','$user_id','".$_POST['payment']."')";
mysqli_query($connection,$query_insert) or die("unable to insert data in to the tbl_bill".mysqli_error());

	

	require_once '../library/close.php';
	header('Location:pay_step.php');

?>