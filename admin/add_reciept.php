<?php 
session_start();
require_once '../library/config.php';
//$user_id=$_SESSION['user_id'];

 $query_insert = "INSERT INTO `tbl_reciept` (`rec_name`, oblation,fane, `rec_amount`, `rec_amount_inword`, `rec_address`, `rec_status`, `date`,da,id_kapuwa) VALUES ('".$_POST['name']."', '".$_POST['oblation']."', '".$_POST['fane']."', '".$_POST['amount']."', '".$_POST['amount_inword']."', '".$_POST['address']."', '0', '".date('Y-m-d')."','".date('d')."','".$_POST['kapuwa']."')";

mysql_query($query_insert) or die("Unable to insert data into the tbl_reciept. ".mysql_error());

 $result_id  = mysql_query("SELECT MAX(`rec_id`) AS id FROM `tbl_reciept`");
 $data_id = mysql_fetch_array($result_id);
 $id = $data_id['id'];
require_once '../library/close.php';
header("Location:display_reciept.php");



?>
