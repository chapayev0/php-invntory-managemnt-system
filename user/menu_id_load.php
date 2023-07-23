<?php 
require_once '../library/config.php';
require_once '../library/functions.php';

$q = strtolower($_GET["q"]);  
if (!$q) return;


$sql = "SELECT product_idn,service_name,service_price,diff FROM  tbl_product WHERE product_idn LIKE '$q%' ORDER BY product_idn";  
$rsd = mysql_query($sql); 
while($rs = mysql_fetch_row($rsd)) {
	
	$product_idn=$rs[0];
	$service_name=$rs[1];
	
	$service_price=$rs[2];
	$diff=$rs[3];
	

	
	
	echo "$product_idn|$service_name|$service_price|$diff\n";
	
}

mysql_close($connection);
	
?>