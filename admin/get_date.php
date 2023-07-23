<?php
require_once '../library/config.php';

$cus = $_REQUEST['bill_no'];
 $result=mysql_query("SELECT cl_name,nic,address,pay_month FROM tbl_bill where bill_id ='$cus' ORDER BY bill_id DESC LIMIT 1;" ) or die("error".mysql_error());
$data=mysql_fetch_array($result);





	 $cl_name=$data[0];
	 $nic=$data[1];
	 $address=$data[2];
	$pay_month=$data[3];
	echo "$cl_name|$nic|$address|$pay_month\n"
	
	
	


?>
