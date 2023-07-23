<?php
require_once '../library/config.php';

$veh_id = $_REQUEST['bill_type'];
 $result=mysqli_query($connection,"SELECT diff FROM tbl_grn where bill_type ='$veh_id' ORDER BY grn_id DESC LIMIT 1;" ) or die("error".mysqli_error());
$data=mysql_fetch_array($result);





	 $diff=$data[0];
	
	echo "$diff"
	


?>
