<?php 
session_start();
require_once '../library/config.php';

$query_update="UPDATE tbl_reciept SET rec_status='1' WHERE rec_id='".$_REQUEST['rec_id']."'";
mysqli_query($connection,$query_update)or die("Unable to update tbl_book. ".mysqli_error());
$_SESSION['book_del_mes']="Record has been deleted";

require_once '../library/close.php';
header('Location:display_reciept.php');
?>