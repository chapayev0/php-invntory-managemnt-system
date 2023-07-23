<?php 
session_start();
require_once '../library/config.php';
$fane=$_REQUEST['fane']." මහා දේවාලය";


 $query_insert="INSERT INTO `fane`(`name`) VALUES ('$fane')";
$res =mysqli_query($connection,$query_insert) or die(mysqli_error());

if($res){
	$_SESSION['fane_error_mes']="<label id=\"error\" style=\"color:green\">දේවාල ඇතුලත් කරන ලදී !</label>";
}else{
	$_SESSION['fane_error_mes']="<label id=\"error\" style=\"color:red\">දේවාල ඇතුලත් කිරීම අසාර්ථකයි !</label>";
}

require_once '../library/close.php';
header("Location:add_fane.php");
?>