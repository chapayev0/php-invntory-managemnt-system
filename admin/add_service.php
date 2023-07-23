<?php
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$count_item=$_POST['count_item'];
for($x=1;$x<=$count_item;$x++){
	
	$cat_id="cat_id_".$x;
	$scat_id="scat_id_".$x;
	$service_name="service_".$x;
	$price="price_".$x;
	$s_id="s_id_".$x;
  echo  $query_insert="INSERT INTO tbl_service(ser_name,ser_price,ser_status,cat_id,scat_id,u_id,ser_item) VALUES('".$_POST[$service_name]."','".$_POST[$price]."','0','".$_POST[$cat_id]."','".$_POST[$scat_id]."','$user_id','".$_POST[$s_id]."')";
	mysql_query($query_insert) or die("unable to insert data in to  the tbl_service".mysql_error());
}
$_SESSION['service_add_com_mes']="Products have been added";
		
require_once '../library/close.php';
header('Location:service.php');
?>

