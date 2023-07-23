<?php 
require_once '../library/config.php';
require_once '../library/functions.php';

$q = strtolower($_GET["q"]);  
if (!$q) return;


 $sql = "SELECT p_code,p_price,p_name,war FROM tbl_product WHERE p_code LIKE '$q%' ORDER BY p_code";  
$rsd = mysql_query($sql); 
while($rs = mysql_fetch_row($rsd)) {
	//echo "pille";
	//$p_code=$rs[0];
	$p_name=$rs[0];
	
	$name=$rs[2];
	 $p_price=$rs[1];
	 $war=$rs[3];
	

	
	
	echo "$p_name|$p_price|$name|$war\n";
	
}

mysql_close($connection);
	
?>