<?php
require_once '../library/config.php';

$cus = $_REQUEST['cus'];
 $result=mysqli_query($connection,"SELECT cus_id,address FROM tbl_charity where c_name ='$cus' ORDER BY c_id DESC LIMIT 1;" ) or die("error".mysqli_error());
$data=mysql_fetch_array($result);





	 $nic=$data[0];
	 $address=$data[1];
	
	echo "$nic|$address\n"
	


?>
