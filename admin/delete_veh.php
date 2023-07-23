<?php 
session_start();
require_once '../library/config.php';

$query_update="UPDATE tbl_other SET v_status='1' WHERE v_id='".$_REQUEST['v_id']."'";
mysqli_query($connection,$query_update)or die("Unable to update tbl_other. ".mysqli_error());
$_SESSION['book_del_mes']="Record has been deleted";

require_once '../library/close.php';
header('Location:display_other.php');
?>