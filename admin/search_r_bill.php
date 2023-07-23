<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
echo $_REQUEST['bill_no'];

/*pagination function*/
$rowsPerPage = 15;
$pageNum = 1;


if(isset($_REQUEST['page']) && $_REQUEST['page'] != 0){
    $pageNum = $_REQUEST['page'];
}
// counting the offset
$offset = ($pageNum-1) * $rowsPerPage;


$data="";
if($_REQUEST['bill_no'] != ""){
	if($data == ""){
		$data=" AND bill_id = '".$_REQUEST['bill_no']."'";
	}else{
		$data .=" AND bill_id = '".$_REQUEST['bill_no']."'";
	}
}
if($_REQUEST['cus'] != ""){
	if($data == ""){
		$data=" AND cl_name LIKE '".$_REQUEST['cus']."%'";
	}else{
		$data .=" AND cl_name LIKE '".$_REQUEST['cus']."%'";
	}
}
if($_REQUEST['f_date'] != "" && $_REQUEST['t_date']){ 
	if($data == ""){
		$data=" AND bill_date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}else{
		$data .=" AND bill_date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}
}


if($_REQUEST['f_date'] != "" && $_REQUEST['t_date']){ 
	if($data == ""){
		$data=" AND bill_date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}else{
		$data .=" AND bill_date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}
}



/*****************************pagination****************/
$sql_count="SELECT *  FROM tbl_bill  WHERE bill_status ='0' AND activity_status='pending' $data ORDER BY bill_date";

$rows_count=0;
$get_number_of_rows=mysql_query($sql_count) or die("Unable to select data from the tbl_contrac in count. " . mysql_error());
while($row_number=mysql_fetch_row($get_number_of_rows)){
	$rows_count++;
}
$numrows=$rows_count;

$maxPage = ceil($numrows/$rowsPerPage);

$self = $_SERVER['PHP_SELF'];
$nav  = '';

for($page = 1; $page <= $maxPage; $page++){
	if ($page == $pageNum){
		$nav .= " $page "; // no need to create a link to current page
	}else{
		$nav .="<a onclick="."search_users('".$page."') style="."cursor:pointer".">$page</a>";
	}
}

if ($pageNum > 1){
$page  = $pageNum - 1;
$prev  ="<a onclick="."search_users('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
$first ="<a onclick="."search_users('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
$prev  = '&nbsp;'; // we're on page one, don't print previous link
$first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
$page = $pageNum + 1;
$next ="<a onclick="."search_users('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
$last ="<a onclick="."search_users('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
$next = '&nbsp;'; // we're on the last page, don't print next link
$last = '&nbsp;'; // nor the last page link
}



$daily_profitt=0;
/*$query_bill_tt="SELECT *  FROM tbl_bill_menu   $data ORDER BY bill_id";
$result_bill_tt=mysql_query($query_bill_tt) or die("error".mysql_error());
while($row_bill_tt=mysql_fetch_array(($result_bill_tt))){
	
	$tot_p = $row_bill_tt["tot_profit"];
	$res =0;

	  
	 $daily_profitt+=$tot_p;
}*/
	



$daily_profit=0;
$daily_amount=0;
$query_bill_t="SELECT *  FROM tbl_bill  WHERE bill_status ='0' $data ORDER BY bill_id";
$result_bill_t=mysql_query($query_bill_t) or die("error".mysql_error());
while($row_bill_t=mysql_fetch_array(($result_bill_t))){
	$cash = $row_bill_t["cash"];
	$bal = $row_bill_t["balance"];
	$tot = $row_bill_t["total"];
	$res =0;
	if($bal>0){
	  $res = $cash-$bal;
	  $daily_amount+=$res;
	  
	}else if($bal<0){
	  $daily_amount+=$cash;
	}else{
	  $daily_amount+=$tot;
	}



}

?>

<input type="text" name="damount" id="damount" value="<?php // echo $daily_amount; ?>" disabled="disabled" />
<?php
 $query_bill="SELECT *  FROM tbl_bill  WHERE bill_status ='0' AND activity_status='pending' $data ORDER BY bill_date";

//$query_bill="SELECT * FROM tbl_bill WHERE u_id='$user_id'  AND bill_status ='0' $data ORDER BY bill_id DESC";
$result_bill=mysql_query($query_bill) or die("error".mysql_error());
if(mysql_num_rows($result_bill) != 0){
?>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="24" height="25" align="center" class="tbl_header_right">Bill No</td>
    <td width="87" align="center" class="tbl_header_right">Customer</td>
    <td width="84" align="center" class="tbl_header_right">Address</td>
    <td width="53" align="center" class="tbl_header_right">NIC</td>
    <td width="88" align="center" class="tbl_header_right">Date</td>
    
    <td width="57" align="center" class="tbl_header_right">Amount</td>
    <td width="85" align="center" class="tbl_header_right">Discount</td>
    <td width="62" align="center" class="tbl_header_right">Toatl Amt</td>
    
  
    <td width="34" align="center" class="tbl_header_right">Print</td>
    <td width="42" align="center" class="tbl_header_right">View</td>
    <td width="97" align="center" class="tbl_header_right">Status</td>
 
   
  </tr>
  <?php while($row_bill=mysql_fetch_array(($result_bill))){
		  
		  
		 /*  $cash = $row_bill["cash"];
		  $bal = $row_bill["balance"];
		  $tot = $row_bill["total"];
		  $res =0;
		  if($bal>0){
			  $res = $cash-$bal;
			  $daily_amount+=$res;
			  
		  }else if($bal<0){
			  $daily_amount+=$cash;
		  }else{
			  $daily_amount+=$tot;
		  }*/
		  //$daily_amount+=$row_bill["cash"];
		   $daily_profit=0;
		  $total=0;
		  $g_total=0;
		  $discount=0;
		  $p_discount=0;
		  $query_item="SELECT * FROM tbl_bill_menu WHERE bill_id='".$row_bill['bill_id']."' AND u_id='$user_id'";
		  $result_item=mysql_query($query_item) or die("Unable to select data from the tbl_bill_product. ".mysql_error());
		  while($row_item=mysql_fetch_array($result_item)){
				$total +=($row_item["menu_price"]*$row_item["bill_menu_qty"]);//get all menus put +mark
				$ser_charge=(($total)-($p_discount))*10/100;
			  
			  $tot_p = $row_item["tot_profit"];
	$res =0;

	  
	 $daily_profitt+=$tot_p;
			  
			  }
		  
		  ?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#EDFBD9';" onmouseout="this.style.backgroundColor='';">
    <td width="24" height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_bill[0]; ?></td>
    <td width="87" align="center" class="border_bottom_left"><?php echo $row_bill["cl_name"]; ?></td>
    <td width="84" align="center" class="border_bottom_left"><?php echo $row_bill["address"]; ?></td>
    <td width="53" align="center" class="border_bottom_left"><?php echo $row_bill["nic"]; ?></td>
    <td width="88" align="center" class="border_bottom_left"><?php echo $row_bill["bill_date"]; ?></td>
    <td width="57" align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_bill["tot"]; ?></td>
    <td width="85" align="center" class="border_bottom_left"><?php echo $row_bill["add_dis"]; ?></td>
    <td width="62" align="center" class="border_bottom_left"><?php echo $row_bill["total"]; ?></td>

    <td width="34" align="center" class="border_bottom_left"><form action="billcus1.php" method="post" name="bill_form_<?php echo $row_bill["bill_id"]; ?>" id="bill_form_<?php echo $row_bill["bill_id"]; ?>" target="_blank">
          <input name="bill_id" id="bill_id" type="hidden" value="<?php echo $row_bill["bill_id"]; ?>" />
          <img src="../images/printer.gif" width="16" height="16" style="cursor:pointer" onclick="form_submission('bill_form_<?php echo $row_bill["bill_id"]; ?>');"/>
        </form></td>
   
    <td width="42" align="center" class="border_bottom_left"><img src="../images/view.png" width="16" height="16" style="cursor:pointer" onclick="parent.location='view_bill.php?bill_id=<?php echo $row_bill["bill_id"]; ?>&amp;cust_name=<?php echo $row_bill["cl_name"]; ?>'" />
    <input name="vatR" id="vatR" type="hidden" value="" /></td>
    <td width="97" align="center" class="border_bottom_left"><select name="status_<?php echo $row_bill["bill_id"]; ?>" id="status_<?php echo $row_bill["bill_id"]; ?>" onchange="assign_activity_status('<?php echo $row_bill["bill_id"]; ?>');">
      <option value="pending" <?php if($row_bill["activity_status"] == "pending" ){echo "selected";}?>>pending</option>
      <option value="completed" <?php if($row_bill["activity_status"] == "completed" ){echo "selected";}?>>completed</option>
    </select></td>
    
   
  </tr>
  <?php }?>
  
  <input type="hidden" name="damountt" id="damountt" value="<?php //echo $daily_profitt; ?>" disabled="disabled" />
  <tr>
    <td height="20" colspan="24"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="body_text">
        <td width="760" height="20" align="left"><?php echo "<strong>" . $first . $prev ." Showing page $pageNum of $maxPage pages " . $next . $last . "</strong>";?></td>
        <td width="200" align="right"><strong>No.of Records : <?php echo $numrows;?> </strong></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
}else{
?>
<div class="red_text">No records found</div>
<?php
}
require_once '../library/close.php';
?>
