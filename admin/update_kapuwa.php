<?php 
session_start();
require_once '../library/config.php';

$k_id=$_POST['k_id'];

$query_update = "UPDATE  `tbl_kapuwa` SET  `k_name` =  '".$_POST['name']."',`k_persentage` =  '".$_POST['per']."',`k_nic` =  '".$_POST['nic_no']."',`k_tel` =  '".$_POST['tel']."',`k_address` =  '".$_POST['address']."',`fax` =  '".$_POST['fax']."',`vatnum` =  '".$_POST['vat']."',`man_num` =  '".$_POST['man']."',`contac_name` =  '".$_POST['con']."',`email` =  '".$_POST['email']."' WHERE  `tbl_kapuwa`.`k_id` ='$k_id'";
mysql_query($query_update) or die("Unable to update tbl_donation.".mysql_error());

$_SESSION['act_up_mes']="Record has been updated";

require_once '../library/close.php';
header('Location:display_kapuwat.php');
?>