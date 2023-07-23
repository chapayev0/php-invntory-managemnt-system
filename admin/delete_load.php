<?php 
session_start();
require_once '../library/config.php';
//$user_id=$_SESSION['user_id'];

$query_del="UPDATE tbl_load SET ld_status='1' WHERE ld_id='".$_REQUEST['ld_id']."'";
mysqli_query($connection,$query_del) or die("Unable to update tbl_charity. ".mysqli_error());
$_SESSION['p_del_mes']="custtomer has been deleted";

require_once '../library/close.php';
header('Location:display_load.php');
?>