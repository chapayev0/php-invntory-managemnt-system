<?php 
require_once '../library/config.php';
require_once '../library/functions.php';

$q = strtolower($_GET["q"]);  
if (!$q) return;


 $sql = "SELECT p_code,p_name,p_price FROM tbl_product WHERE p_code LIKE '$q%' ORDER BY p_name";  
$rsd = mysql_query($sql); 
while($rs = mysql_fetch_row($rsd)) {
	//echo "sandun";
	$p_code=$rs[0];
	$p_name=$rs[1];
	
	//$menu_no=$rs[2];
	$p_price=$rs[2];
	

	
	
	echo "$p_code|$p_name|$p_price\n";
	
}

mysql_close($connection);
	
?>