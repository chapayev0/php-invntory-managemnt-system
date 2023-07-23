<?php 
require_once '../library/config.php';
require_once '../library/functions.php';

$q = strtolower($_GET["q"]);  
if (!$q) return;

 $sql = "SELECT p_code,cprice,p_id FROM tbl_product WHERE p_status='0' and p_code LIKE '$q%' ORDER BY p_code";  
$rsd = mysql_query($sql);

while($rs = mysql_fetch_row($rsd)) {	
	$p_name = $rs[0];//$sql query eke p_name >>>>> 0
	$p_id=$rs[2];
	$cprice=$rs[1];
	
	echo "$p_name|$cprice|$p_id\n";
}

mysql_close($connection);
	
?>