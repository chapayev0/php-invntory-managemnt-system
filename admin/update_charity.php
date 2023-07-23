<?php 
session_start();
require_once '../library/config.php';

$c_id=$_POST['c_id'];

 $query_update = "UPDATE  tbl_charity SET  c_name =  '".$_POST['name']."',address= '".$_POST['address']."',section='".$_POST['tel']."' WHERE  c_id='$c_id'";
mysql_query($query_update) or die("Unable to update tbl_donation.".mysql_error());

$_SESSION['act_up_mes']="Record has been updated";

require_once '../library/close.php';
header('Location:display_charity.php');
?>