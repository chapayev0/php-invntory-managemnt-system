<?php 
session_start();
require_once '../library/config.php';
//$user_id=$_SESSION['user_id'];

$query_del="UPDATE tbl_charity SET c_status='1' WHERE c_id='".$_REQUEST['c_id']."'";
mysql_query($query_del) or die("Unable to update tbl_charity. ".mysql_error());
$_SESSION['p_del_mes']="custtomer has been deleted";

require_once '../library/close.php';
header('Location:display_charity.php');
?>