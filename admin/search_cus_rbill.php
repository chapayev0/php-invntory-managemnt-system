<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
 $_REQUEST['bill_no'];
 $_REQUEST['f_date'];
  $_REQUEST['t_date'];

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


if($_REQUEST['f_date'] != "" && $_REQUEST['t_date']){ 
	if($data == ""){
		$data=" AND bill_rdate BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}else{
		$data .=" AND bill_rdate BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}
}






/*****************************pagination****************/
$sql_count="SELECT * FROM tbl_bill_menu  ORDER BY bill_id ";

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




 $query_bill="SELECT * FROM tbl_bill_menu where rqty!=0  ORDER BY bill_id";
$result_bill=mysql_query($query_bill) or die("error1".mysql_error());
if(mysql_num_rows($result_bill) != 0){
?>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="28" height="25" align="center" class="tbl_header_right">Bill No</td>
    <td width="93" align="center" class="tbl_header_right">Date</td>
    <td width="50" align="center" class="tbl_header_right">Item</td>
    <td width="38" align="center" class="tbl_header_right">Qty</td>
  </tr>
  <?php while($row_bill=mysql_fetch_array(($result_bill))){
	  
	  
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
    <td width="93" align="center" class="border_bottom_left"><?php echo $row_bill["rdate"]; ?></td>
    <td width="50" align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_bill["menu_name"]; ?></td>
    <td width="38" align="center" class="border_bottom_left_right"><?php echo $row_bill["bill_menu_qty"]; ?></td>
  </tr>
  <?php }?>
  
  <input type="hidden" name="damountt" id="damountt" value="<?php //echo $daily_profitt; ?>" disabled="disabled" />
  <tr>
    <td height="20" colspan="20"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
