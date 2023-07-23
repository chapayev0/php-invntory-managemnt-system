<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
 $_REQUEST['bill_no'];
 $_REQUEST['f_date'];
  $_REQUEST['t_date'];
  $_REQUEST['po'];
  
  

/*pagination function*/
$rowsPerPage = 600;
$pageNum = 1;


if(isset($_REQUEST['page']) && $_REQUEST['page'] != 0){
    $pageNum = $_REQUEST['page'];
}
// counting the offset
$offset = ($pageNum-1) * $rowsPerPage;


$data="";
if($_REQUEST['bill_no'] != ""){
	if($data == ""){
		$data=" AND tbl_bill.bill_id = '".$_REQUEST['bill_no']."'";
	}else{
		$data .=" AND tbl_bill.bill_id = '".$_REQUEST['bill_no']."'";
	}
}
if($_REQUEST['cus'] != ""){
	if($data == ""){
		$data=" AND tbl_charity.c_name LIKE '".$_REQUEST['cus']."%'";
	}else{
		$data .=" AND tbl_charity.c_name LIKE '".$_REQUEST['cus']."%'";
	}
}

if($_REQUEST['po'] != ""){
	if($data == ""){
		$data=" AND tbl_bill.po LIKE '".$_REQUEST['po']."%'";
	}else{
		$data .=" AND tbl_bill.po LIKE '".$_REQUEST['po']."%'";
	}
}

if($_REQUEST['f_date'] != "" && $_REQUEST['t_date']){ 
	if($data == ""){
		$data=" AND tbl_bill.bill_date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}else{
		$data .=" AND tbl_bill.bill_date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}
}

if($_REQUEST['st'] != ""){
	if($data == ""){
		$data=" AND tbl_bill.activity_status LIKE '".$_REQUEST['st']."%'";
	}else{
		$data .=" AND tbl_bill.activity_status LIKE '".$_REQUEST['st']."%'";
	}
}





/*****************************pagination****************/
$sql_count="SELECT tbl_charity.c_name, tbl_charity.cus_id, tbl_charity.section, tbl_bill.bill_time, tbl_bill.bill_date, tbl_bill.total, tbl_bill.bill_id, tbl_bill.bill_time, tbl_bill.activity_status, tbl_charity.etf, tbl_charity.c_id, tbl_bill.pay_date,SUM( tbl_payment.amount ),tbl_bill.inv_no,tbl_bill.po,tbl_bill.po,tbl_bill.tot
FROM tbl_bill
LEFT JOIN tbl_charity ON tbl_bill.c_id = tbl_charity.c_id
LEFT JOIN tbl_payment ON tbl_bill.bill_id = tbl_payment.bill_id
WHERE tbl_bill.bill_status = '0' and tbl_payment.c_status='1'  $data
GROUP BY tbl_bill.bill_id
ORDER BY tbl_bill.bill_id ";

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
$tot1=0;
$t_out=0;
$t_pay=0;
/*$query_bill_tt="SELECT *  FROM tbl_bill_menu   $data ORDER BY bill_id";
$result_bill_tt=mysql_query($query_bill_tt) or die("error".mysql_error());
while($row_bill_tt=mysql_fetch_array(($result_bill_tt))){
	
	$tot_p = $row_bill_tt["tot_profit"];
	$res =0;

	  
	 $daily_profitt+=$tot_p;
}*/
	



 $query_bill="SELECT tbl_charity.c_name, tbl_charity.cus_id, tbl_charity.section, tbl_bill.bill_time, tbl_bill.bill_date, 
 tbl_bill.total, tbl_bill.bill_id, tbl_bill.bill_time, tbl_bill.activity_status, tbl_charity.etf, tbl_charity.c_id,
  tbl_bill.pay_date, SUM( tbl_payment.amount ),tbl_bill.inv_no,tbl_bill.total,SUM(tbl_payment.late_amount),tbl_bill.po,
  tbl_bill.tot,tbl_charity.address,tbl_bill.ftotal
FROM tbl_bill
LEFT JOIN tbl_charity ON tbl_bill.c_id = tbl_charity.c_id
LEFT JOIN tbl_payment ON tbl_bill.bill_id = tbl_payment.bill_id
WHERE tbl_bill.bill_status = '0' $data
GROUP BY tbl_bill.bill_id
ORDER BY tbl_bill.bill_id DESC LIMIT $offset, $rowsPerPage";
$result_bill=mysql_query($query_bill) or die("error1".mysql_error());
if(mysql_num_rows($result_bill) != 0){
?>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" align="center" >&nbsp;</td>
    <td align="center" colspan="13" >&nbsp;</td>
    
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="28" height="25" align="center" class="tbl_header_right">Bill No</td>
    <td width="90" align="center" class="tbl_header_right">Inv No</td>
    <td width="64" align="center" class="tbl_header_right">Customer</td>
    <td width="93" align="center" class="tbl_header_right">Address</td>
    <td width="93" align="center" class="tbl_header_right">PO</td>
    <td width="93" align="center" class="tbl_header_right">Date</td>
    <td width="50" align="center" class="tbl_header_right">Amount</td>
    <td width="54" align="center" class="tbl_header_right">Payment</td>
    <td width="75" align="center" class="tbl_header_right">Outstanding</td>
    
    <td width="38" align="center" class="tbl_header_right">View</td>
    <td width="97" align="center" class="tbl_header_right">Status</td>
    <td width="55" align="center" class="tbl_header_right">Print</td>
    <td width="55" align="center" class="tbl_header_right">Payment</td>
    <td width="44" align="center" class="tbl_header_right">Age</td>
    <td width="125" align="center" class="tbl_header_right">Delete</td>
 
   
  </tr>
  <?php while($row_bill=mysql_fetch_array(($result_bill))){
	  
	  $t_out+=$row_bill[15]+$row_bill[5]-$row_bill[12];
	 $t_pay+=$row_bill[12];
			  
		
	  
	  
		  $date2=$row_bill["pay_date"];
		  $date1=$row_bill["bill_date"];
		  $tot1 += $row_bill["tot"];
		  
		  
		 
$diff = abs(strtotime($date1) - strtotime($date2));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		  
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
    <td width="28" height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_bill[6]; ?></td>
    <td width="90" align="center" class="border_bottom_left"><?php echo $row_bill["inv_no"]; ?></td>
    <td width="64" align="center" class="border_bottom_left"><?php echo $row_bill[0]; ?></td>
    <td width="93" align="center" class="border_bottom_left"><?php echo $row_bill["address"]; ?></td>
    <td width="93" align="center" class="border_bottom_left"><?php echo $row_bill["po"]; ?></td>
    <td width="93" align="center" class="border_bottom_left"><?php echo $row_bill["bill_date"]; ?></td>
    <td width="50" align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_bill["ftotal"]; ?></td>
    <td width="54" align="center" class="border_bottom_left"><?php echo $row_bill[12]; ?></td>
    <td width="75" align="center" class="border_bottom_left"><?php
	
	
	 $query_r="SELECT SUM(rqty*menu_price) FROM tbl_bill_menu WHERE bill_id='{$row_bill['bill_id']} ' and dis='0'";
	
$result_r=mysql_query($query_r) or die("unable to select data from the tbl_bill".mysql_error());
		$row_r=mysql_fetch_row($result_r);
		
		
		  $bill_r=$row_r[0];
		
	
	
	
	
	
	
	 echo  number_format((float)$row_bill[15]+$row_bill[19]-$row_bill[12]-$bill_r, 2, '.', ''); ?></td>
    
    <td width="38" align="center" class="border_bottom_left"><img src="../images/view.png" width="16" height="16" style="cursor:pointer" onclick="parent.location='view_bill.php?bill_id=<?php echo $row_bill["bill_id"]; ?>&amp;cust_name=<?php echo $row_bill["c_id"]; ?>'" />
    </td>
    <td width="97" align="center" class="border_bottom_left"><select name="status_<?php echo $row_bill["bill_id"]; ?>" id="status_<?php echo $row_bill["bill_id"]; ?>" onchange="assign_activity_status('<?php echo $row_bill["bill_id"]; ?>');">
      <option value="pending" <?php if($row_bill["activity_status"] == "pending" ){echo "selected";}?>>pending</option>
      <option value="completed" <?php if($row_bill["activity_status"] == "completed" ){echo "selected";}?>>completed</option>
    </select></td>
    <td width="55" align="center" class="border_bottom_left"><form action="print_bil.php" method="post" name="stock_form" target="_blank" id="stock_form">
                                                    <input name="bill_id" id="bill_id" type="hidden" value="<?php echo $row_bill['bill_id']; ?>" />

                                                    <input type="submit" name="print" id="print" value="print" />
                                                </form></td>
    <td width="55" align="center" class="border_bottom_left"><img src="../images/edit.png" alt="" width="10" height="10" style="cursor:pointer" onclick="parent.location='payment.php?c_id=<?php echo $row_bill["bill_id"]; ?>&c_id2=<?php echo $row_bill["inv_no"]; ?>'"/></td>
    <td width="44" align="center" class="border_bottom_left"><?php 
	
 $startTimeStamp = strtotime($row_bill["bill_date"]);
 $endTimeStamp = strtotime(date('Y-m-d'));

$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays);
	
	 echo  $numberDays;?></td>
    <td width="125" align="center" class="border_bottom_left_right"><img src="../images/delete.png" alt="" width="10" height="10" style="cursor:pointer" onclick="delete_bill('<?php echo $row_bill[6]; ?>');"/></td>
    
   
  </tr>
  
  <?php }?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#EDFBD9';" onmouseout="this.style.backgroundColor='';">
    <td height="20" align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td align="center" class="border_bottom_left">&nbsp;</td>
    <td align="center" class="border_bottom_left">&nbsp;</td>
    <td align="center" class="border_bottom_left">&nbsp;</td>
    <td align="center" class="border_bottom_left">&nbsp;</td>
    <td align="center" class="border_bottom_left">&nbsp;</td>
    <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
    <td align="center" class="border_bottom_left"><?php echo $t_pay; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $t_out-$bill_r; ?></td>
    <td align="center" class="border_bottom_left">&nbsp;</td>
    <td align="center" class="border_bottom_left">&nbsp;</td>
    <td align="center" class="border_bottom_left">&nbsp;</td>
    <td align="center" class="border_bottom_left">&nbsp;</td>
    <td align="center" class="border_bottom_left">&nbsp;</td>
    <td align="center" class="border_bottom_left_right"><?php echo $tot1; ?></td>
  </tr>
  
  <input type="hidden" name="damountt" id="damountt" value="<?php //echo $daily_profitt; ?>" disabled="disabled" />
  <tr>
    <td height="20" colspan="31"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
