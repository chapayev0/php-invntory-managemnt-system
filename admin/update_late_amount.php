<?php 
session_start();
require_once '../library/config.php';

$pay_id=$_POST['pay_id'];

$query_update = "UPDATE  `tbl_payment` SET  `late_amount` =  '".$_POST['amt']."' WHERE  `tbl_payment`.`pay_id` ='$pay_id'";
mysql_query($query_update) or die("Unable to update tbl_donation.".mysql_error());

$_SESSION['act_up_mes']="Record has been updated";

require_once '../library/close.php';
header('Location:view_cheque.php');
?>