<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];
$stu_id=$_POST['stu_id'];

$query_update="UPDATE tbl_student SET stu_name='".$_POST['name']."',stu_id_no='".$_POST['id_no']."',stu_nic='".$_POST['nic']."',stu_address='".$_POST['address']."',stu_tel='".$_POST['tel']."',stu_tp_id='".$_POST['stu_tp_id']."' WHERE stu_id='$stu_id'";
mysqli_query($connection,$query_update) or die("Unable to update tbl_student. ".mysqli_error());


/*upload photograph*/
$upload_path="../photos";
if($_FILES['photo']['name'] != null){
	if(file_exists("$upload_path")){
	}else{
		mkdir("$upload_path");
	}
	$full_file_name =$_FILES['photo']['name'];
	$type=trim(strrchr($full_file_name,'.'),'.');
	
	$new_upload_path ="../photos/";
	$stored_object = "Photo_".$stu_id.".".$type;
	$file_url=$new_upload_path.$stored_object;
	
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $new_upload_path.$stored_object)) {
		$query_update="UPDATE tbl_student SET stu_photo_url='$file_url' WHERE stu_id='$stu_id'";
		mysqli_query($connection,$query_update) or die("Unable to update tbl_student. ".mysqli_error());
	} else{
	} 

}
$_SESSION['stu_up_mes']="Record has been updated";

require_once '../library/close.php';
header('Location:display_student.php');
?>