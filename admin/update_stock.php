<?php 

require_once '../library/config.php';


  $_POST['id1'];
   

echo $query = "UPDATE tbl_stockall SET 
	qty ='".$_POST['qty']."'
	WHERE id='". $_POST['id1']."'";
 
		 mysqli_query($connection,$query) or die("unable to update tbl_product. ".mysqli_error());
	$_SESSION['user_up_mes']="Record has been updated";


require_once '../library/close.php';
header('Location:grn_review.php');
?>
