<?php 
session_start();
require_once '../library/config.php';

//$query_update="UPDATE tbl_donation SET d_status='1' WHERE donation_id='".$_REQUEST['donation_id']."'";

echo $_REQUEST['donation_id'];

$query_update="UPDATE tbl_donation SET d_status='1' WHERE donation_id='".$_REQUEST['donation_id']."'";
mysqli_query($connection,$query_update)or die("Unable to update tbl_donation. ".mysqli_error());
$_SESSION['act_del_mes']="Record has been deleted";
require_once '../library/close.php';
header('Location:display_activity.php');
?>