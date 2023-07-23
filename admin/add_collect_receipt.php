<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];
$idKapuwa=$_POST['kapuwa'];


echo $query_insert="INSERT INTO  tbl_collecting(k_name,k_persentage,amount,status,date,amount_chanter,amount_temple) VALUES('".$_POST['kapu_nic']."','".$_POST['kapu_nic2']."','".$_POST['kapu_nic5']."','0','".date('Y-m-d')."','".$_POST['kapu_nic6']."','".$_POST['kapu_nic7']."')";
mysqli_query($connection,$query_insert) or die("Unable to insert data into the tbl_collecting. ".mysqli_error());

$_SESSION['user_add_mes']="Record has been added";

		
require_once '../library/close.php';
// header("Location:collect_receipt.php");
?>