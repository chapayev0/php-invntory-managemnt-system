<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$mes_id=$_POST['mes_id'];
$message=$_POST['message'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$tel1=$_POST['tel1'];
$tel2=$_POST['tel2'];
$current_date=date('Y-m-d');

$query_update="UPDATE tbl_message SET mes_u_id='$user_id',tel1='$tel1',tel2='$tel2',address1='$address1',address2='$address2',mes_date='$current_date' WHERE mes_id='$mes_id'";
mysql_query($query_update) or die("Unable to update tbl_message. ".mysql_error());
$_SESSION['mes_update']="Message has been updated";

require_once '../library/close.php';
header('Location:bill_details.php');
?>