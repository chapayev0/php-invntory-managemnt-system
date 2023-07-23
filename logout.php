<?php 
session_start();
require_once 'library/config.php';

$curdate = date('Y-m-d');
$curtime = date('g:i A');






session_destroy();

header('Location:index1.php');
?>