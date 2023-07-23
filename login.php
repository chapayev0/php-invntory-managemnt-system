<?php 
session_start();
require_once 'library/config.php';

$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
$curdate = date('Y-m-d');
$curtime = date('g:i A');





// $uname= $_POST['uname'];
// $pwd=md5($_POST['pwd']);
header('Location: admin/index.php');

// /*check in the user tbl*/ $query="SELECT * FROM tbl_user WHERE u_uname='$uname' AND u_pwd='$pwd' AND u_status='0'";
// $result=mysqli_query($connection,$query) or die("Unable to select data from the tbl_user. ".mysqli_error());
// if(mysql_num_rows($result) != 0){
// 	$row=mysqli_fetch_assoc($result);
// 	$_SESSION['user_id']=$row["u_id"];
// 	$_SESSION['user_type']=$row["u_type"];
	
// 	if($row["u_type"] == "admin"){
// 		header('Location: admin/index.php');
// 	}else if($row["u_type"] == "user"){
// 		//echo "weda";
// 		header('Location: user/bill.php');
// 	}else{
// 		header('Location:admin/index.php');
// 	}
// }else{
// 	$_SESSION['log_error_mes']="Username or password you have entered is incorrect.";
// 	header('Location:index.php');
// }

// $query_user="SELECT MAX(u_id) FROM tbl_user";
// $result_user=mysqli_query($connection,$query_user) or die("Unable to select data from the tbl_user. ".mysqli_error());
// $row_user=mysqli_fetch_row($result_user);

// $query_insert="INSERT INTO tbl_login(name,u_id,time,date,l_status) VALUES('".$row['u_name']."','".$row['u_id']."','$curtime','$curdate','0')";
// mysqli_query($connection,$query_insert) or die("Unable to insert data into the tbl_donation. ".mysqli_error());




?>