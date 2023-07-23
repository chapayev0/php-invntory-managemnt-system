<?php 
session_start();
require_once '../library/config.php';

$query_update="UPDATE tbl_fine SET f_rate='".$_POST['fine_rate']."'";
mysql_query($query_update) or die("Unable to update tbl_fine. ".mysql_error());
$_SESSION['fine_up_mes']="Record has been updated";

require_once '../library/close.php';
header('Location:fine_rate.php');
?>