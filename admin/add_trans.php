<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

echo $query_insert = "INSERT INTO `tbl_trans` (`name`, `amt`, `type`, `acc`,date,status) VALUES ('".$_POST['name']."', '".$_POST['amt']."', '".$_POST['type']."','".$_POST['acc']."', '".$_POST['date']."','0')";

mysqli_query($connection,$query_insert) or die("Unable to insert data into the tbl_charity. ".mysqli_error());
require_once '../library/close.php';
header("Location:display_trans.php?");
?>