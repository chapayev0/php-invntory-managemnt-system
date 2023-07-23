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
if($_REQUEST['code'] != ""){
	if($data == ""){
		$data=" AND tbl_bill_menu.menu_name  LIKE '".$_REQUEST['code']."%'";
	}else{
		$data .=" AND tbl_bill_menu.menu_name  LIKE '".$_REQUEST['code']."%'";
	}
}


if($_REQUEST['date'] != "" && $_REQUEST['date2']){ 
	if($data == ""){
		$data=" AND tbl_bill_menu.date BETWEEN '".$_REQUEST['date']."' AND '".$_REQUEST['date2']."'";
	}else{
		$data .=" AND tbl_bill_menu.date BETWEEN '".$_REQUEST['date']."' AND '".$_REQUEST['date2']."'";
	}
}






$daily_amount=0;
$total=0;

$sql_count="SELECT tbl_bill_menu.name, tbl_bill_menu.menu_name, 
 tbl_bill_menu.menu_price, tbl_bill_menu.menu_price, tbl_bill_menu.bill_menu_qty,tbl_product.cprice,tbl_bill_menu.date
FROM tbl_bill_menu
LEFT JOIN tbl_product ON tbl_bill_menu.menu_name = tbl_product.p_code
WHERE tbl_bill_menu.menu_status = '0'  $data
ORDER BY tbl_bill_menu.bill_menu_id";
$rows_count=0;
$get_number_of_rows=mysqli_query($connection,$sql_count) or die("Unable to select data from the tbl_stock in count. " . mysqli_error());
while($row_number=mysqli_fetch_row($get_number_of_rows)){
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

 $pro=0;
 $summ=0;
 
 

$query_bill_menu="SELECT SUM(tbl_bill_menu.menu_price*tbl_bill_menu.bill_menu_qty-tbl_product.cprice*tbl_bill_menu.bill_menu_qty) FROM tbl_bill_menu
LEFT JOIN tbl_product ON tbl_bill_menu.menu_name = tbl_product.p_code
WHERE tbl_bill_menu.menu_status = '0' $data";
$result_bill_menu=mysqli_query($connection,$query_bill_menu) or die("unable to select data from the tbl_bill".mysqli_error());
		$row_bill_menu=mysqli_fetch_row($result_bill_menu);
		echo $proff=$row_bill_menu[0];
		
  

 
 
 $query_book="SELECT tbl_bill_menu.name, tbl_bill_menu.menu_name, 
 tbl_bill_menu.menu_price, tbl_bill_menu.menu_price, tbl_bill_menu.bill_menu_qty,tbl_product.cprice,tbl_bill_menu.date,tbl_bill_menu.dis
FROM tbl_bill_menu
LEFT JOIN tbl_product ON tbl_bill_menu.menu_name = tbl_product.p_code
WHERE tbl_bill_menu.menu_status = '0'  $data
ORDER BY tbl_bill_menu.bill_menu_id LIMIT $offset, $rowsPerPage";
$result_book=mysqli_query($connection,$query_book) or die("Unable to select data from the tbl_stock. ".mysqli_error());
if(mysql_num_rows($result_book) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="840" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="26" align="center" colspan="3" >&nbsp;</td>
    <td align="center" >&nbsp;</td>
    <td align="center" >&nbsp;</td>
    <td align="center" >&nbsp;</td>
    <td align="center" ><form action="print_day_items.php" method="post" name="stock_form" target="_blank" id="stock_form">
       <input name="date" id="date" type="hidden" value="<?php echo $_REQUEST['date']; ?>" />
       <input name="date2" id="date2" type="hidden" value="<?php echo $_REQUEST['date2']; ?>" />
        <input type="submit" name="print_Outstanding" id="print" value="print" />
     </form></td>
    <td width="5" align="center" >&nbsp;</td>
  </tr>
  <tr>
    <td width="165" align="center" class="tbl_header_right">Code</td>
    <td width="198" height="26" align="center" class="tbl_header_right">Product </td>
    <td width="181" align="center" class="tbl_header_right"> Qty</td>
    <td width="95" align="center" class="tbl_header_right">cost</td>
    <td width="79" align="center" class="tbl_header_right">selling price</td>
    <td width="117" align="center" class="tbl_header_right">Profit</td>
    <td width="117" align="center" class="tbl_header_right"> Date</td>
    
  </tr>
  <?php while($row_recp=mysqli_fetch_assoc($result_book)){
	  $pro += ($row_recp["menu_price"]-$row_recp["cprice"])*$row_recp["bill_menu_qty"];
     $summ+= $row_recp["bill_menu_qty"];
  
  
  ?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["menu_name"]; ?></td>
    <td height="21" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["name"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["bill_menu_qty"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["cprice"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["menu_price"]-$row_recp["menu_price"]*$row_recp["dis"]/100; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo ($row_recp["menu_price"]-$row_recp["menu_price"]*$row_recp["dis"]/100-$row_recp["cprice"])*$row_recp["bill_menu_qty"]; ?></td>
    <td align="left" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_recp["date"]; ?></td>
    
  </tr>
   <?php 
   
    }?>
    <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td height="21" align="left" class="border_bottom_left" style="padding-left:3pt;">SUM</td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $summ; ?></td>
    <td colspan="2" align="center" class="border_bottom_left" style="padding-left:3pt;">Tot Profit</td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $pro; ?></td>
    <td align="left" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $proff; ?></td>
    
  </tr>
  <tr>
    <td colspan="19"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
