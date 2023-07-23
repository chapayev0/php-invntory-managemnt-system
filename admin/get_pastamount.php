<?php
require_once '../library/config.php';

$veh_id = $_REQUEST['bill_type'];
 $result=mysql_query("SELECT diff FROM tbl_grn where bill_type ='$veh_id' ORDER BY grn_id DESC LIMIT 1;" ) or die("error".mysql_error());
$data=mysql_fetch_array($result);





	 $diff=$data[0];
	
	echo "$diff"
	


?>
