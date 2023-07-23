<?php 
session_start();
require_once 'library/config.php';

$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
$curdate = date('Y-m-d');
$curtime = date('g:i A');





$uname=mysql_real_escape_string($_POST['uname']);
$pwd=md5($_POST['pwd']);

/*check in the user tbl*/ $query="SELECT * FROM tbl_user WHERE u_uname='$uname' AND u_pwd='$pwd' AND u_status='0'";
$result=mysql_query($query) or die("Unable to select data from the tbl_user. ".mysql_error());
if(mysql_num_rows($result) != 0){
	$row=mysql_fetch_assoc($result);
	$_SESSION['user_id']=$row["u_id"];
	$_SESSION['user_type']=$row["u_type"];
	
	if($row["u_type"] == "admin"){
		header('Location: admin/index.php');
	}else if($row["u_type"] == "user"){
		//echo "weda";
		header('Location: user/bill.php');
	}else{
		header('Location:admin/index.php');
	}
}else{
	$_SESSION['log_error_mes']="Username or password you have entered is incorrect.";
	header('Location:index.php');
}

$query_user="SELECT MAX(u_id) FROM tbl_user";
$result_user=mysql_query($query_user) or die("Unable to select data from the tbl_user. ".mysql_error());
$row_user=mysql_fetch_row($result_user);

$query_insert="INSERT INTO tbl_login(name,u_id,time,date,l_status) VALUES('".$row['u_name']."','".$row['u_id']."','$curtime','$curdate','0')";
mysql_query($query_insert) or die("Unable to insert data into the tbl_donation. ".mysql_error());




?>