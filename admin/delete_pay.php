<?php 
session_start();
require_once '../library/config.php';
//$user_id=$_SESSION['user_id'];

 echo $_REQUEST['pay_id'];
  $query_del="DELETE from tbl_payment WHERE pay_id='".$_REQUEST['pay_id']."' ";
mysql_query($query_del) or die("Unable to update tbl_charity. ".mysql_error());
$_SESSION['p_del_mes']="custtomer has been deleted";

require_once '../library/close.php';
header('Location:view_payment.php');
?>