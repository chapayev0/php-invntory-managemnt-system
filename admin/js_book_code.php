<?php
session_start();
require_once '../library/config.php';

$q = strtolower($_GET["q"]);
//if (!$q) return;

$sql = "SELECT book_id,book_name,book_code,stu_id,book_br_status FROM tbl_book WHERE book_code LIKE'$q%' AND book_status='0' ORDER BY book_id";
$rsd = mysqli_query($connection,$sql);
while($rs = mysqli_fetch_row($rsd)) {
	$bid=$rs[0];
	$bname=$rs[1];
	$bcode=$rs[2];
	$buid=$rs[3];
	$bstatus=$rs[4];
	$mes="";
	if($buid != 0 && $bstatus == "borrow"){
		$mes="This book is already borrowed";
	}
	echo "$bcode|$bid|$bname|$mes|$buid|$bstatus\n";
}

require_once '../library/close.php';
	
?>