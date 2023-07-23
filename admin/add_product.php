<?php
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$count_item=$_POST['count_item'];
for($x=1;$x<=$count_item;$x++){
	
	$cat="cat_".$x;
	$scat_id="scat_id_".$x;
	$name="name_".$x;
	$price="price_".$x;
	$code="code_".$x;
	$cost="cost_".$x;
	$war="war_".$x;
	
	$p_id="p_id_".$x;
	 $query_insert="INSERT INTO tbl_product(p_name,p_price,p_status,u_id,p_code,cat,cprice,war) VALUES('".$_POST[$name]."','".$_POST[$price]."','0','$user_id','".$_POST[$code]."','".$_POST[$cat]."','".$_POST[$cost]."','".$_POST[$war]."')";
	mysqli_query($connection,$query_insert) or die("unable to insert data in to  the tbl_service".mysqli_error());
	
	
	$query_bill_menu="SELECT MAX(p_id) FROM tbl_product WHERE p_status='0'";
$result_bill_menu=mysqli_query($connection,$query_bill_menu) or die("unable to select data from the tbl_bill".mysqli_error());
		$row_bill_menu=mysqli_fetch_row($result_bill_menu);
		$bill_menu=$row_bill_menu[0];
		
	
	$query_insert1="INSERT INTO tbl_stockall(p_id,name,price,sprice,status,code,qty,war) VALUES('$bill_menu','".$_POST[$name]."','".$_POST[$cost]."','".$_POST[$price]."','0','".$_POST[$code]."','0','".$_POST[$war]."')";
	mysqli_query($connection,$query_insert1) or die("unable to insert data in to  the tbl_service".mysqli_error());

}
$_SESSION['service_add_com_mes']="Products have been added";
		
require_once '../library/close.php';
header('Location:item.php');
?>

