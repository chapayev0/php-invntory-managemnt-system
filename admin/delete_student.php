<?php 
session_start();
require_once '../library/config.php';

$query_del="UPDATE tbl_kapuwa SET k_status='1' WHERE k_id='".$_REQUEST['k_id']."'";
mysqli_query($connection,$query_del) or die("Unable to update tbl_student. ".mysqli_error());
$_SESSION['stu_del_mes']="Record has been deleted";

require_once '../library/close.php';
header('Location:display_kapuwat.php');
?>