<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];
$item_count=$_POST['item_count'];

for($x=1;$x<=$item_count;$x++){
	$cat="cat_".$x;
	 $query_insert="INSERT INTO tbl_maincategory(scat_name,scat_status,u_id) VALUES('".$_POST[$cat]."','0','$user_id')";
	mysqli_query($connection,$query_insert) or die("Unable to insert data into the tbl_outlet. ".mysqli_error());
}
$_SESSION['user_category_mes']="Record/s added successfully";

require_once '../library/close.php';
header('Location:mcategory.php');
?>

