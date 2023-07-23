<?php 
session_start();
require_once '../library/config.php';

echo $query_student="INSERT INTO tbl_student(st_name,st_address,st_tel,st_dob,st_gender,
downs_syndrome,cerebral_palsy,congential_hypothyroidism,autism,adhd,epilepsy,microcephaly,congential_infections,st_lives_with,st_father_name	,st_father_cont_no,st_father_email,st_father_income,st_father_job,st_mother_name,st_mother_cont_no,st_mother_email,st_mother_income,st_mother_job,st_guardian_name,st_guardian_cont_no,st_guardian_email,st_guardian_income,st_guardian_job,stu_information,stu_barcode_url,stu_barcode,st_status,st_photo_url,st_other_income)
										
										VALUES('".$_POST['name']."','".$_POST['address']."','".$_POST['tel']."','".$_POST['dob']."','".$_POST['gender']."','".$_POST['downs_syndrome']."','".$_POST['cerebral_palsy']."','".$_POST['congential_hypothyroidism']."','".$_POST['autism']."','".$_POST['adhd']."','".$_POST['epilepsy']."','".$_POST['microcephaly']."','".$_POST['congential_infections']."','".$_POST['live']."','".$_POST['f_name']."','".$_POST['f_tel']."','".$_POST['f_email']."','".$_POST['f_income']."','".$_POST['f_designation']."','".$_POST['m_name']."','".$_POST['m_tel']."','".$_POST['m_email']."','".$_POST['m_income']."','".$_POST['m_designation']."','".$_POST['g_name']."','".$_POST['g_tel']."','".$_POST['g_email']."','".$_POST['g_income']."','".$_POST['g_designation']."','".$_POST['information']."','','".$_POST['st_id']."','0','','".$_POST['other_income']."')";


mysqli_query($connection,$query_student) or die("Unable to insert data into the tbl_student. ".mysqli_error());

$query_st_id="SELECT MAX(st_id) FROM tbl_student";
$result_st_id=mysqli_query($connection,$query_st_id) or die("Unable to select data from the tbl_student. ".mysqli_error());
$row_st_id=mysqli_fetch_row($result_st_id);

/*upload photograph*/
$upload_path="../photoes";
if($_FILES['photo']['name'] != null){
	if(file_exists("$upload_path")){
	}else{
		mkdir("$upload_path");
	}
	$full_file_name =$_FILES['photo']['name'];
	$type=trim(strrchr($full_file_name,'.'),'.');
	
	$new_upload_path ="../photoes/";
	$stored_object = "photoes_".$row_st_id[0].".".$type;
	$file_url=$new_upload_path.$stored_object;
	
	
	
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $new_upload_path.$stored_object)) {
		$query_update="UPDATE tbl_student SET st_photo_url='$file_url' WHERE st_id='$row_st_id[0]'";
		mysqli_query($connection,$query_update) or die("Unable to update tbl_student. ".mysqli_error());
	} else{
	} 

}

if(file_exists("../barcode")){
}else{
	mkdir("../barcode");
}

require_once '../library/barcode.php';

$barcode_url="../barcode/Barcode_".$row_st_id[0].".gif";
$bc = new barCode();
$bc->build($_POST['st_id'],'','',$barcode_url);


$st_id=$_POST['st_id'];

$query_update="UPDATE tbl_student SET stu_barcode_url='$barcode_url' , stu_barcode='$st_id'  WHERE st_id='$row_st_id[0]'";
mysqli_query($connection,$query_update) or die("Unable to update tbl_student. ".mysqli_error());
		

$_SESSION['student_com_mes']="Record has been added";

require_once '../library/close.php';
//header('Location:student.php');


?>