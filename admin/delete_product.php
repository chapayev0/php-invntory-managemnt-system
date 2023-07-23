<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$query_del="UPDATE tbl_product SET p_status='1',u_id='$user_id' WHERE p_id='".$_REQUEST['p_id']."'";
mysqli_query($connection,$query_del) or die("Unable to update tbl_product. ".mysqli_error());
$_SESSION['p_del_mes']="Product has been deleted";

require_once '../library/close.php';
header('Location:dispaly_item.php');
?>
