<?php 
session_start();
require_once '../library/config.php';

$v_id=$_POST['v_id'];

$query_update = "UPDATE  tbl_other SET  v_name = '".$_POST['name']."',des ='".$_POST['des']."',own =  '".$_POST['own']."',eng =  '".$_POST['eng']."',chasy =  '".$_POST['cha']."',grn_test_date='".$_POST['grndate']."',ins_ren_date='".$_POST['insdate']."',lin_ren_date='".$_POST['lindate']."'  WHERE  v_id ='$v_id'";
mysql_query($query_update) or die("Unable to update tbl_donation.".mysql_error());

$_SESSION['act_up_mes']="Record has been updated";

require_once '../library/close.php';
header('Location:display_other.php');
?>