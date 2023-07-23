<?php 

require_once '../library/config.php';


 
   $_POST['p_name'];

 $query = "UPDATE tbl_product SET 
	p_name ='".$_POST['name']."',
	p_price='".$_POST['price']."',
	cprice='".$_POST['cprice']."',
	p_code='".$_POST['code']."',
	war='".$_POST['war']."' 
	WHERE p_id='". $_POST['p_id']."'";
 
		mysql_query($query) or die("unable to update tbl_product. ".mysql_error());
	$_SESSION['user_up_mes']="Record has been updated";
	
	
	$query1 = "UPDATE tbl_stockall SET 
	name ='".$_POST['name']."',
	price='".$_POST['price']."',
	sprice='".$_POST['cprice']."',
	code='".$_POST['code']."',
	war='".$_POST['war']."' 
	WHERE p_id='". $_POST['p_id']."'";
 
		mysql_query($query1) or die("unable to update tbl_product. ".mysql_error());
	$_SESSION['user_up_mes']="Record has been updated";



require_once '../library/close.php';
header('Location:dispaly_item.php');
?>
