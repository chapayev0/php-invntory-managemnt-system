<?php 
session_start();
require_once '../library/config.php';
//$user_id=$_SESSION['user_id'];

$query_del="UPDATE tbl_assgn_rute SET r_a_status='1' WHERE r_a_id='".$_REQUEST['r_a_id']."'";
mysql_query($query_del) or die("Unable to update bl_assgn_rute. ".mysql_error());
$_SESSION['p_del_mes']="Product has been deleted";

require_once '../library/close.php';
header('Location:display_assign_root_ref_driver.php');
?>
