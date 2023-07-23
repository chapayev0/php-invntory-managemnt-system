<?php 
require_once '../library/config.php';

/*pagination function*/
$rowsPerPage = 25;
$pageNum = 1;


if(isset($_REQUEST['page']) && $_REQUEST['page'] != 0){
    $pageNum = $_REQUEST['page'];
}
// counting the offset
$offset = ($pageNum-1) * $rowsPerPage;

$data="";
if($_REQUEST['name'] != ""){
	if($data == ""){
		$data=" AND name  LIKE '".$_REQUEST['name']."%'";
	}else{
		$data .=" AND name  LIKE '".$_REQUEST['name']."%'";
	}
}

if($_REQUEST['code'] != ""){
	if($data == ""){
		$data=" AND code  LIKE '".$_REQUEST['code']."%'";
	}else{
		$data .=" AND code  LIKE '".$_REQUEST['code']."%'";
	}
}


$query_bill_menu="SELECT SUM(tbl_product.cprice*tbl_stockall.qty),tbl_product.p_name,tbl_product.p_code,tbl_product.war,tbl_product.cprice,tbl_stockall.qty,tbl_product.cat,tbl_stockall.id
  FROM tbl_stockall 
   RIGHT JOIN  tbl_product ON  
  tbl_stockall.p_id =tbl_product.p_id WHERE tbl_product.p_status ='0'";
$result_bill_menu=mysql_query($query_bill_menu) or die("unable to select data from the tbl_bill".mysql_error());
		$row_bill_menu=mysql_fetch_row($result_bill_menu);
		echo $bill_menu=$row_bill_menu[0];
	



$daily_amount=0;
$total=0;

$sql_count="SELECT tbl_product.p_name,tbl_product.p_code,tbl_product.war,tbl_product.cprice,tbl_stockall.qty,tbl_product.cat,tbl_stockall.id
  FROM tbl_stockall 
   RIGHT JOIN  tbl_product ON  
  tbl_stockall.p_id =tbl_product.p_id WHERE tbl_product.p_status ='0' $data ORDER BY id ";
$rows_count=0;
$get_number_of_rows=mysql_query($sql_count) or die("Unable to select data from the tbl_stock in count. " . mysql_error());
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
		$nav .="<a onclick="."search_other('".$page."') style="."cursor:pointer".">$page</a>";
	}
}

if ($pageNum > 1){
   $page  = $pageNum - 1;
   $prev  ="<a onclick="."search_other('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
   $first ="<a onclick="."search_other('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
   $prev  = '&nbsp;'; // we're on page one, don't print previous link
   $first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
   $page = $pageNum + 1;
   $next ="<a onclick="."search_other('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
   $last ="<a onclick="."search_other('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
   $next = '&nbsp;'; // we're on the last page, don't print next link
   $last = '&nbsp;'; // nor the last page link
}

 $query_book="SELECT tbl_product.p_name,tbl_product.p_code,tbl_product.war,tbl_product.cprice,tbl_stockall.qty,tbl_product.cat,tbl_stockall.id
  FROM tbl_stockall 
   RIGHT JOIN  tbl_product ON  
  tbl_stockall.p_id =tbl_product.p_id WHERE tbl_product.p_status ='0' $data  ORDER BY tbl_product.cat LIMIT $offset, $rowsPerPage";
$result_book=mysql_query($query_book) or die("Unable to select data from the tbl_stock. ".mysql_error());
if(mysql_num_rows($result_book) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" class="tbl_header_right">&nbsp;</td>
    <td height="26" align="center" class="tbl_header_right">&nbsp;</td>
    <td align="center" class="tbl_header_right">&nbsp;</td>
    <td align="center" class="tbl_header_right">&nbsp;</td>
    <td align="center" class="tbl_header_right">&nbsp;</td>
    <td align="center" class="tbl_header_right">&nbsp;</td>
    <td align="center" class="tbl_header_right"><form action="print_balance.php" method="post" name="stock_form" target="_blank" id="stock_form">
      
      <input name="name" id="name" type="hidden" value="<?php echo $_REQUEST['name']; ?>" />
      <input type="submit" name="print_Stock" id="print" value="print_Stock" />
    </form></td>
  </tr>
  <tr>
    <td width="119" align="center" class="tbl_header_right">Code</td>
    <td width="214" height="26" align="center" class="tbl_header_right">Product Name</td>
    <td width="96" align="center" class="tbl_header_right">Warranty</td>
    <td width="105" align="center" class="tbl_header_right">Cost</td>
    
    <td width="91" align="center" class="tbl_header_right"> Qty</td>
    <td width="91" align="center" class="tbl_header_right">Amount</td>
    <td width="118" align="center" class="tbl_header_right">Edit</td>
    
  </tr>
  <?php while($row_recp=mysql_fetch_row($result_book)){
  
  
  
  ?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp[1]; ?></td>
    <td height="30" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp[0]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp[2]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp[3]; ?></td>
    
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp[4]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp[3]*$row_recp[4]; ?></td>
    <td align="left" class="border_bottom_left_right" style="padding-left:3pt;"><img src="../images/edit.png" alt="" width="10" height="10" style="cursor:pointer" onclick="parent.location='edit_stock.php?id=<?php echo $row_recp[6]; ?>'" /></td>
    
  </tr>
   <?php 
   
   $total+=$row_recp[3]*$row_recp[4]; }?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td height="30" align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $total; ?></td>
    <td align="left" class="border_bottom_left_right" style="padding-left:3pt;">Total <?php echo $bill_menu; ?></td>
  </tr>
 
  <tr>
    <td colspan="19"><table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr class="body_text">
        <td width="760" height="20" align="left"><?php echo "<strong>" . $first . $prev ." Showing page $pageNum of $maxPage pages " . $next . $last . "</strong>";?></td>
        <td width="200" align="right"><strong>No.of Records : <?php echo $numrows;?></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }else{?>
<div class="red_text">No records found</div>
<?php }
require_once '../library/close.php';
?>
