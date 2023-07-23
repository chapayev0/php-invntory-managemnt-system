<?php 
session_start();
require_once '../library/config.php';
$item_count=$_POST['item_count'];

for($x=1;$x<=$item_count;$x++){
	$cat="cat_".$x;
	 $query_insert="INSERT INTO tbl_rute(r_name,r_status) VALUES('".$_POST[$cat]."','0')";
	mysqli_query($connection,$query_insert) or die("Unable to insert data into the tbl_rute. ".mysqli_error());
}
//$_SESSION['user_category_mes']="Record/s added successfully";

require_once '../library/close.php';
header('Location:rute.php');
?>

