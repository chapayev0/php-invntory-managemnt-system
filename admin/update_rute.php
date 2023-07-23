<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$r_id=$_POST['r_id'];
$r_name="r_".$r_id;

$query_update="UPDATE tbl_rute SET r_name='".$_POST[$r_name]."' WHERE r_id='$r_id'";
mysqli_query($connection,$query_update) or die("Unable to update tbl_rute. ".mysqli_error());

require_once '../library/close.php';
header('Location:dispaly_rute.php');
?>