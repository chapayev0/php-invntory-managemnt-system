<?php 
session_start();
require_once '../library/config.php';

$query_del="UPDATE tbl_bill SET bill_status='1' WHERE bill_id='".$_REQUEST['bill_id']."'";
mysqli_query($connection,$query_del) or die("Unable to update tbl_student. ".mysqli_error());

$query_del1="UPDATE  tbl_bill_menu SET menu_status='1' WHERE bill_id='".$_REQUEST['bill_id']."'";
mysqli_query($connection,$query_del1) or die("Unable to update tbl_student. ".mysqli_error());

 $query_stock="SELECT * FROM  tbl_bill_menu WHERE bill_id='".$_REQUEST['bill_id']."'";
        $result_stock=mysqli_query($connection,$query_stock) or die("Unable to select data from the tbl_stock. ".mysqli_error());
		
			
			while($row_stock=mysqli_fetch_assoc($result_stock)){
				$name=$row_stock['menu_name'];
				$qty=$row_stock['bill_menu_qty'];
				
				$query = "UPDATE tbl_stockall SET 
	qty = qty + '$qty'
	WHERE name='$name'";
 
		mysqli_query($connection,$query) or die("unable to update tbl_product. ".mysqli_error());
	
				
				
			}

$_SESSION['stu_del_mes']="Record has been deleted";

require_once '../library/close.php';
header('Location:display_cus_bill.php');
?>