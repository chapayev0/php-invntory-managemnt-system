<?php
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];
$current_date=date('Y-m-d');


$query_insert="INSERT INTO  tbl_assgn_rute(date,reff,driver,r_a_status,rute) VALUES('".$_POST['date']."','".$_POST['ref']."','".$_POST['dri']."','0','".$_POST['rute']."')";
	mysql_query($query_insert) or die("unable to insert data in to  the  tbl_assgn_rute".mysql_error());

$count_item=$_POST['count_item'];

$query_bill_menu="SELECT MAX(r_a_id) FROM tbl_assgn_rute WHERE r_a_status='0'";
$result_bill_menu=mysql_query($query_bill_menu) or die("unable to select data from the tbl_assgn_rute".mysql_error());
		$row_bill_menu=mysql_fetch_row($result_bill_menu);
		$bill_menu=$row_bill_menu[0];
for($x=1;$x<=$count_item;$x++){
	
	$item_name="item_".$x;
			$item_id="item_id_".$x;
			
			$price="price_".$x;
			$qty="qty_".$x;
			$p_id="p_id_".$x;
			$p_no="p_no_".$x;
			
			$dis="dis_".$x;
			$check_value=0;
			$vat_rate="vat_".$x;
			//$vat_val="vat_val_".$x;
			$amount="amount_".$x;
	 
	 echo $query_insert="INSERT INTO  tbl_assgn_rute_menu(r_a_id,menu_no,menu_name,bill_menu_qty,menu_price,total,date,status) VALUES('$bill_menu','".$_POST[$p_id]."','".$_POST[$item_name]."','".$_POST[$qty]."','".$_POST[$price]."','".$_POST[$amount]."','$current_date','0')";
	mysql_query($query_insert) or die("unable to insert data in to  the  tbl_assgn_rute".mysql_error());
}
$_SESSION['service_add_com_mes']="Products have been added";
		
require_once '../library/close.php';
header('Location:display_assign_root_ref_driver.php');
?>

