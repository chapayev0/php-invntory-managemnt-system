<?php 
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];
$query_ck="SELECT u_id FROM tbl_user WHERE u_uname='".$_REQUEST['uname']."' AND u_id !='".$_REQUEST['u_id']."'";
$result_ck=mysqli_query($connection,$query_ck) or die("".mysqli_error());
if(mysql_num_rows($result_ck) != 0){
	echo "Username is already existed";
}
require_once '../library/close.php';
?>