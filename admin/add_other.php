<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

 $query_insert = "INSERT INTO tbl_other(v_name,eng,v_status,date,own,des,chasy,grn_test_date,ins_ren_date,lin_ren_date)
 VALUES ('".$_POST['name']."','".$_POST['eng']."','0','".$_POST['date']."','".$_POST['own']."','".$_POST['des']."','".$_POST['cha']."','".$_POST['grn']."','".$_POST['ins']."','".$_POST['lin']."')";

mysql_query($query_insert) or die("Unable to insert data into the tbl_reciept. ".mysql_error());





require_once '../library/close.php';
header("Location:display_other.php?");
?>