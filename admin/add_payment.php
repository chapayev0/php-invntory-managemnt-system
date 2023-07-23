<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];


 echo $query_insert="INSERT INTO  tbl_payment(bill_id,cus_name,amount,p_status,date,type,c_status,inv_no,cdate,cno) VALUES('".$_POST['c_id']."','".$_POST['name']."','".$_POST['amt']."','0','".$_POST['date']."','".$_POST['type']."','0','".$_POST['c_id2']."','".$_POST['cdate']."','".$_POST['cno']."')";
mysqli_query($connection,$query_insert) or die("Unable to insert data into the tbl_emp. ".mysqli_error());



		
require_once '../library/close.php';
header("Location:display_cus_bill.php");
?>