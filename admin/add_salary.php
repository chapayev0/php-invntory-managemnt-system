<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

echo $query_insert = "INSERT INTO `tbl_salary` (`s_name`, `amount`, `description`, `status`,date) VALUES ('".$_POST['name']."', '".$_POST['amount']."', '".$_POST['desc']."','0', '".$_POST['date']."')";

mysqli_query($connection,$query_insert) or die("Unable to insert data into the tbl_charity. ".mysqli_error());
require_once '../library/close.php';
header("Location:display_emp_salary.php?");
?>