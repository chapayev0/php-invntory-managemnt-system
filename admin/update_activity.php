<?php 
session_start();
require_once '../library/config.php';

$donation_id=$_POST['donation_id'];

$query_update = "UPDATE  `tbl_donation` SET  `name` =  '".$_POST['name']."',`nic_no` =  '".$_POST['nic_no']."',`tel` =  '".$_POST['tel']."',`address` =  '".$_POST['address']."',`description` =  '".$_POST['discriptio']."',`amount` =  '".$_POST['amount']."',`donation_type` =  '".$_POST['donation_type']."',`donate_date` =  '".$_POST['donation_date']."' WHERE  `tbl_donation`.`donation_id` ='$donation_id'";
mysql_query($query_update) or die("Unable to update tbl_donation.".mysql_error());

$_SESSION['act_up_mes']="Record has been updated";

require_once '../library/close.php';
header('Location:display_activity.php');
?>