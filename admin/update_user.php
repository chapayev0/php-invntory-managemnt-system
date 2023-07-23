<?php 
session_start();
require_once '../library/config.php';

$user_id=$_SESSION['user_id'];
$pwd=$_POST['old_pwd'];
if($_POST['pwd'] != ""){
	$pwd=md5($_POST['pwd']);
}

echo $query_ck="SELECT u_id FROM tbl_user WHERE u_uname='".$_POST['uname']."' AND u_status='0' AND u_id != '$user_id'";
$result_ck=mysql_query($query_ck) or die("Unable to select data from the tbl_user. ".mysql_error());
if(mysql_num_rows($result_ck) != 0){
	$_SESSION['user_mes']="The username you have entered is already existed";
}else{
	echo $query_update="UPDATE tbl_user SET u_name='".$_POST['name']."',u_uname='".$_POST['uname']."',u_pwd='$pwd' WHERE u_id='$user_id'";
	mysql_query($query_update) or die("Unable to insert data into the tbl_user. ".mysql_error());
	$_SESSION['user_mes']="Record has been updated";
}


require_once '../library/close.php';
header('Location:view_user.php');
?>