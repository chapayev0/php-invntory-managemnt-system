<?php 
session_start();
require_once '../library/config.php';

$current_date=date('Y-m-d');

 echo $query_update="UPDATE tbl_payment SET c_status='".$_REQUEST['activity_status']."' WHERE pay_id ='".$_REQUEST['pay_id']."'";
mysqli_query($connection,$query_update) or die("Unable to update tbl_payment. ".mysqli_error());



require_once '../library/close.php';	
	
$_SESSION['up_com_mes']="Activity status has been updated";
header('Location:view_cheque.php');

?>