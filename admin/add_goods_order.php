<?php 
session_start();
require_once '../library/config.php';

$order_date=$_POST['order_date'];
$grn_id=$_POST['grn_id'];

$item_count=$_POST['item_count'];

$query_insert="INSERT INTO tbl_grn(grn_id,grn_date,grn_status,u_id,bill_type,pay_typ,inv_no,stotal,total) VALUES('$grn_id','$order_date','0','".$_SESSION['user_id']."','".$_POST['bill_type']."','".$_POST['pay_typ']."','".$_POST['inv']."','".$_POST['stotal']."','".$_POST['total']."')";
mysqli_query($connection,$query_insert) or die("Unable to insert data into the tbl_order. ".mysqli_error());


for($x=1;$x<=$item_count;$x++){
		$goods="goods_".$x;
		$goods_id="goods_id_".$x;
		$qty="qty_".$x;
		$price="price_".$x;
		$amount="amount_".$x;
		$code="item_".$x;
		
	if($_POST[$goods] != "" && $_POST[$goods_id] != "" && $_POST[$qty] != ""){
		$query_goods_insert="INSERT INTO tbl_stock(grn_id,p_id,p_name,st_price,st_qty,st_remain_qty,st_status,st_date,amount) VALUES('$grn_id','".$_POST[$goods_id]."','".$_POST[$goods]."','".$_POST[$price]."','".$_POST[$qty]."','".$_POST[$qty]."','0','$order_date','".$_POST[$amount]."')";		
		
		mysqli_query($connection,$query_goods_insert) or die("Unable to insert data into the tbl_stock. ".mysqli_error());
		$query = "UPDATE tbl_stockall SET 
	
	qty= '".$_POST[$qty]."'+qty
	WHERE code='". $_POST[$goods]."'";
 
		mysqli_query($connection,$query) or die("unable to update tbl_product. ".mysqli_error());
	
	}
}


header("Location:grn.php?grn_id=$grn_id");
require_once '../library/config.php';
?>

