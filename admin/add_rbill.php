<?php

session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
//new column dis_direct

$user_id = $_SESSION['user_id'];
$current_date = date('Y-m-d');
$current_time = date('g:i A');

foreach ($_POST['id'] as $key => $id) {
    $q = $_POST['preReturn'][$key] + $_POST['qty'][$key];
   echo  $query = "UPDATE `tbl_bill_menu` SET `rqty` = '{$q}', rdate = '{$current_date}' WHERE `tbl_bill_menu`.`bill_menu_id` = {$id}";
    mysql_query($query);
}

require_once '../library/close.php';
header('Location:return.php');