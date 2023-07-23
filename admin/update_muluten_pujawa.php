<?php 
session_start();
require_once '../library/config.php';

$id_muluthan_pujawa=$_POST['id_muluthan_pujawa'];

  $query_update = "UPDATE  `muluthan_pujawa` SET  `name` =  '".$_POST['name']."',`address` =  '".$_POST['address']."',`contact_no` =  '".$_POST['tel']."',`date` =  '".$_POST['date']."' WHERE  `muluthan_pujawa`.`id_muluthan_pujawa` ='$id_muluthan_pujawa'";
mysql_query($query_update) or die("Unable to update tbl_donation.".mysql_error());

$_SESSION['act_up_mes']="Record has been updated";

require_once '../library/close.php';
header('Location:view_muluten_pujawa.php');
?>