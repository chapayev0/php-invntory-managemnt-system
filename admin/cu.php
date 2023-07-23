<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$query_insert="INSERT INTO tbl_book(book_name,book_isbn,book_author,book_edition,book_printed_date,book_desc,book_category,book_no,book_code) VALUES('".$_POST['name']."','".$_POST['isbn']."','".$_POST['author']."','".$_POST['edition']."','".$_POST['print_date']."','".$_POST['desc']."','".$_POST['category']."','".$_POST['book_no']."','".$_POST['book_code']."')";
mysql_query($query_insert) or die("Unable to insert data into the tbl_book. ".mysql_error());

$query_book_id="SELECT MAX(book_id) FROM tbl_book";
$result_book_id=mysql_query($query_book_id) or die("Unable to select data from the tbl_book. ".mysql_error());
$row_book_id=mysql_fetch_row($result_book_id);

/*upload photograph*/
$upload_path="../book_photos";
if($_FILES['photo']['name'] != null){
	if(file_exists("$upload_path")){
	}else{
		mkdir("$upload_path");
	}
	$full_file_name =$_FILES['photo']['name'];
	$type=trim(strrchr($full_file_name,'.'),'.');
	
	$new_upload_path ="../book_photos/";
	$stored_object = "Book_photo_".$row_book_id[0].".".$type;
	$file_url=$new_upload_path.$stored_object;
	
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $new_upload_path.$stored_object)) {
		$query_update="UPDATE tbl_book SET book_image_url='$file_url' WHERE book_id='$row_book_id[0]'";
		mysql_query($query_update) or die("Unable to update tbl_book. ".mysql_error());
	} else{
	} 

}

//book_barcode
if(file_exists("../book_barcode")){
}else{
	mkdir("../book_barcode");
}
require_once '../library/barcode.php';

$barcode_url="../book_barcode/Book_barcode_".$row_book_id[0].".gif";
$bc = new barCode();
$bc->build($_POST['book_code'],'','',$barcode_url);

$query_update="UPDATE tbl_book SET book_barcode_url='$barcode_url' WHERE book_id='$row_book_id[0]'";
mysql_query($query_update) or die("Unable to update tbl_book. ".mysql_error());

require_once '../library/close.php';
header("Location:view_book.php?book_id=$row_book_id[0]");
?>