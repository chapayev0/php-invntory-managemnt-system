<?php
session_start();
require_once '../library/config.php';

$q = strtolower($_GET["q"]);
//if (!$q) return;

$sql = "SELECT 
		tbl_student.stu_lib_id,
		tbl_student.stu_id,
		tbl_student.stu_name,
		tbl_student.stu_id_no,
		tbl_student_type.stu_tp_book_no
		FROM tbl_student INNER JOIN tbl_student_type ON tbl_student.stu_tp_id=tbl_student_type.stu_tp_id WHERE tbl_student.stu_lib_id LIKE'$q%' AND tbl_student.stu_status='0' ORDER BY tbl_student.stu_id";
$rsd = mysqli_query($connection,$sql);
while($rs = mysqli_fetch_row($rsd)) {
	$libid = $rs[0];
	$stuid = $rs[1];
	$stuname = $rs[2];
	$stuidno = $rs[3];
	$mes="";
	/*count # of borrowed books*/
	$query_ck="SELECT COUNT(book_id) FROM tbl_book WHERE stu_id='$rs[1]' AND book_status='0'";
	$result_ck=mysqli_query($connection,$query_ck) or die("Unable to select data from the tbl_book.".mysqli_error());
	$row_ck=mysqli_fetch_row($result_ck);
	if($rs[4] <= $row_ck[0]){
		$mes="This user can't borrow a book";
	}
	echo "$libid|$stuid|$stuname|$stuidno|$mes\n";
}

require_once '../library/close.php';
	
?>