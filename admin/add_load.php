<?php 
session_start();
require_once '../library/config.php';

$order_date=$_POST['order_date'];
$ld_id=$_POST['ld_id'];
$user_id=$_SESSION['user_id'];

$item_count=$_POST['item_count'];

$query_insert="INSERT INTO tbl_load(ld_date,ld_status,u_id,rute,reff,driver) VALUES('$order_date','0','".$_SESSION['user_id']."','".$_POST['rute']."','".$_POST['ref']."','".$_POST['dri']."')";
mysql_query($query_insert) or die("Unable to insert data into the tbl_load. ".mysql_error());

$query_bill_menu="SELECT MAX(ld_id) FROM tbl_load WHERE ld_status='0'";
$result_bill_menu=mysql_query($query_bill_menu) or die("unable to select data from the tbl_bill".mysql_error());
		$row_bill_menu=mysql_fetch_row($result_bill_menu);
		$bill_menu=$row_bill_menu[0];






for($x=1;$x<=$item_count;$x++){
		$goods="goods_".$x;
		$goods_id="goods_id_".$x;
		$qty="qty_".$x;
		$price="price_".$x;
		$amount="amount_".$x;
		$code="item_".$x;
		
	if($_POST[$goods] != "" && $_POST[$goods_id] != "" && $_POST[$qty] != ""){
		$query_goods_insert="INSERT INTO tbl_load_item(ld_id,ld_item_code,ld_item_name,ld_item_qty,ld_item_remain_qty,ld_item_status,date,sell_qty,u_id,price,amt) VALUES('$bill_menu','".$_POST[$goods_id]."','".$_POST[$goods]."','".$_POST[$qty]."','".$_POST[$qty]."','0','$order_date','0','$user_id','".$_POST[$price]."','".$_POST[$price]."'*'".$_POST[$qty]."')";		
		
		mysql_query($query_goods_insert) or die("Unable to insert data into the tbl_load_item. ".mysql_error());
	}


/*stock eken aduwenne mehemayi*/
	
	for($y=1;$y<=$qty;$y++ ){
 	    	getSubMenu($p_id);
			}	
		$item_qty_result=mysql_query("SELECT MIN(st_id) AS id,st_remain_qty FROM tbl_stock WHERE p_name ='$_REQUEST[$goods]' AND st_status='0'") or die("Error :".mysql_error());
		$item_qty_data=mysql_fetch_array($item_qty_result);
		 $_REQUEST[$qty]."**********".$item_qty_data['st_remain_qty'];
		$remain = $item_qty_data['st_remain_qty'];
		$demand = $_REQUEST[$qty];
		$id=$item_qty_data['id'];
		if($demand<$remain){				
		 $update_qty = $item_qty_data['st_remain_qty'] - $_REQUEST[$qty]; 
		
	mysql_query("update tbl_stock set st_remain_qty='$update_qty' where st_id = '$id'")  or die("Error :".mysql_error());
		
		}else if($demand > $remain){
			
			$extra_qty=$_REQUEST[$qty]-$item_qty_data['st_remain_qty'];
			$up_tbl=mysql_query("UPDATE tbl_stock SET st_remain_qty ='0', st_status='1' where st_id = '$id'") or die("Error :".mysql_error());
			
			 $item_qty_result2=mysql_query("SELECT MIN(st_id) AS id,st_remain_qty FROM tbl_stock WHERE p_name ='$_REQUEST[$goods]' AND st_status='0'") or die("Error :".mysql_error());
			
			$item_qty_data1=mysql_fetch_array($item_qty_result2);
			$id2=$item_qty_data1['id'];
			$up_qty=$item_qty_data1['st_remain_qty']-$extra_qty;
			mysql_query("update tbl_stock set st_remain_qty='$up_qty' where st_id = '$id2'")  or die("Error :".mysql_error());
			
		}else{
			
			
			$item_qty_result2=mysql_query("SELECT MIN(st_id) AS id,st_remain_qty FROM tbl_stock WHERE p_name ='$_REQUEST[$goods]' AND st_status='0'") or die("Error :".mysql_error());
			$up_tbl=mysql_query("UPDATE tbl_stock SET st_remain_qty ='0', st_status='1' where st_id = '$id'") or die("Error :".mysql_error());
			
		
		}
		
		///////////////////////////////
		
		///////////////////////////////
		}




header("Location:load.php?ld_id=$ld_id");
require_once '../library/config.php';
?>

