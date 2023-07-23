<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
//new column dis_direct

$user_id=$_SESSION['user_id'];
$current_date=date('Y-m-d');
$current_time=date('g:i A');

$discount=isset($_POST['discount'])?$_POST['discount']:0;


if($_POST['type']=='Cash'){
	
	 $query_insert="INSERT INTO  tbl_bill(bill_time,bill_date,bill_status,u_id,activity_status,total,c_id,bill_discount,tot,inv_no,ftotal,po,pay_type) 
VALUES('$current_time','".$_POST['t_date']."','0','$user_id','completed','".$_POST['total']."','".$_POST['name']."','".$_POST['dis']."','".$_POST['tot']."','".$_POST['inv_no']."','".$_POST['tot']."','".$_POST['po']."','".$_POST['type']."')";
mysqli_query($connection,$query_insert) or die("unable to insert data in to the tbl_bill".mysqli_error());

$query_bill_menu1="SELECT MAX(bill_id) FROM tbl_bill WHERE bill_status='0'";
$result_bill_menu1=mysqli_query($connection,$query_bill_menu1) or die("unable to select data from the tbl_bill".mysqli_error());
		$row_bill_menu1=mysqli_fetch_row($result_bill_menu1);
		$bill_menu1=$row_bill_menu1[0];
	

echo $query_insertp="INSERT INTO  tbl_payment(bill_id,cus_name,amount,p_status,date,type,c_status) VALUES('$bill_menu1','".$_POST['name']."','".$_POST['tot']."','0','".$_POST['date']."','cash','0')";
mysqli_query($connection,$query_insertp) or die("Unable to insert data into the tbl_emp. ".mysqli_error());

	
	}else 
	
	if($_POST['type']=='Credit'){
		
		$query_insert="INSERT INTO  tbl_bill(bill_time,bill_date,bill_status,u_id,activity_status,total,c_id,bill_discount,tot,inv_no,ftotal,po,pay_type) 
VALUES('$current_time','".$_POST['t_date']."','0','$user_id','pending','".$_POST['total']."','".$_POST['name']."','".$_POST['dis']."','".$_POST['tot']."','".$_POST['inv_no']."','".$_POST['tot']."','".$_POST['po']."','".$_POST['type']."')";
mysqli_query($connection,$query_insert) or die("unable to insert data in to the tbl_bill".mysqli_error());
}
		
  
	$count_item=$_POST['count_item'];
	
$query_bill_menu="SELECT MAX(bill_id) FROM tbl_bill WHERE bill_status='0'";
$result_bill_menu=mysqli_query($connection,$query_bill_menu) or die("unable to select data from the tbl_bill".mysqli_error());
		$row_bill_menu=mysqli_fetch_row($result_bill_menu);
		$bill_menu=$row_bill_menu[0];
		
		for($x=1;$x<=$count_item;$x++){
			$item_name="item_".$x;
			$item_id="item_id_".$x;
			$name="name_".$x;
			$price="price_".$x;
			$qty="qty_".$x;
		$war="war_".$x;
			//$p_no="p_no_".$x;
			$discount="discount_".$x;
			$dis="dis_".$x;
			//$check_value=0;
			//$vat_rate="vat_".$x;
			//$vat_val="vat_val_".$x;
			$amount="amount_".$x;
					
 $query_insert_menu="INSERT INTO tbl_bill_menu(bill_id,menu_name,menu_price,bill_menu_qty,u_id,total,menu_status,date,dis,name,war) 
 VALUES('$bill_menu','".$_POST[$item_name]."','".$_POST[$price]."','".$_POST[$qty]."','$user_id','".$_POST[$price]."'*'".$_POST[$qty]."','0','$current_date','".$_POST[$discount]."','".$_POST[$name]."','".$_POST[$war]."')";

mysqli_query($connection,$query_insert_menu) or die("Unable to insert data in to the tbl_bill_menu. ".mysqli_error());



		
		/////////////////////////////////
		
		
	/*stock eken aduwenne mehemayi*/
	
	
		
		/*stock eken aduwenne mehemayi*/
	
	for($y=1;$y<=$qty;$y++ ){
 	    	getSubMenu($p_id);
			}
		
		
	
	
		 $item_qty_result=mysqli_query($connection,"SELECT * FROM tbl_stockall WHERE code ='$_REQUEST[$item_name]' AND status='0'") or die("Error :".mysqli_error());
		$item_qty_data=mysql_fetch_array($item_qty_result);
		 $_REQUEST[$qty]."**********".$item_qty_data['qty'];
		$remain = $item_qty_data['qty'];
		$demand = $_REQUEST[$qty];
		echo $name=$item_qty_data['code'];
		
					
		echo  $update_qty = $item_qty_data['qty'] - $_REQUEST[$qty]; 
		
		 mysqli_query($connection,"update tbl_stockall set qty='$update_qty' where code ='$name'")  or die("Error :".mysqli_error());
		
		
		}
		
		///////////////////////////////
		
		

	require_once '../library/close.php';
	//header('Location:print_bil.php?bill_id='.$bill_id');
	header('Location:print_bil.php?bill_id='.$bill_menu);


?>