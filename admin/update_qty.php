<?php 
session_start();
require_once '../library/config.php';

$ld_item_id=$_POST['ld_item_id'];
$user_id=$_SESSION['user_id'];
$rqty=$_POST['remain'];
$bqty=$_POST['b_qty'];
$sqty=$_POST['qty'];
$name=$_POST['name'];


 $query_update = "UPDATE  tbl_load_item SET  ld_item_code =  '".$_POST['id']."',ld_item_name =  '".$_POST['name']."',sell_qty=  '".$_POST['qty']."',ld_item_remain_qty='".$_POST['b_qty']."'-'".$_POST['qty']."',u_id='$user_id' WHERE  ld_item_id='$ld_item_id'";
mysql_query($query_update) or die("Unable to update tbl_donation.".mysql_error());


 $item_qty_result=mysql_query("SELECT MIN(st_id) AS id,st_remain_qty FROM tbl_stock WHERE p_name ='".$_POST['name']."' AND st_status='0'") or die("Error :".mysql_error());
		$item_qty_data=mysql_fetch_array($item_qty_result);
		 $id=$item_qty_data['id'];
						
		   $update_qty = $item_qty_data['st_remain_qty']+$bqty-$sqty ; 
		
		
		
	mysql_query("update tbl_stock set st_remain_qty='$update_qty' where st_id = '$id'")  or die("Error :".mysql_error());
		


$_SESSION['act_up_mes']="Record has been updated";

require_once '../library/close.php';
header('Location:display_load.php');
?>