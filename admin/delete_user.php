<?php 
session_start();
require_once '../library/config.php';

$query_del="UPDATE  tbl_user SET u_status='1' WHERE u_id='".$_REQUEST['u_id']."'";
mysqli_query($connection,$query_del) or die("Unable to update  tbl_user. ".mysqli_error());
$_SESSION['stu_del_mes']="Record has been deleted";

require_once '../library/close.php';
header('Location:view_user.php');
?>