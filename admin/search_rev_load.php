<?php 
require_once '../library/config.php';

/*pagination function*/
$rowsPerPage = 15;
$pageNum = 1;


if(isset($_REQUEST['page']) && $_REQUEST['page'] != 0){
    $pageNum = $_REQUEST['page'];
}
// counting the offset
$offset = ($pageNum-1) * $rowsPerPage;

$data="";
if($_REQUEST['name'] != ""){
	if($data == ""){
		$data=" AND ld_item_name  LIKE '".$_REQUEST['name']."%'";
	}else{
		$data .=" AND ld_item_name  LIKE '".$_REQUEST['name']."%'";
	}
}





$daily_amount=0;

$sql_count="SELECT * FROM  tbl_load_item WHERE ld_item_status ='0' $data ORDER BY ld_item_id ";
$rows_count=0;
$get_number_of_rows=mysql_query($sql_count) or die("Unable to select data from the  tbl_load_item in count. " . mysql_error());
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

 $query_book="SELECT * FROM  tbl_load_item WHERE ld_item_status ='0' $data ORDER BY ld_item_id LIMIT $offset, $rowsPerPage";
$result_book=mysql_query($query_book) or die("Unable to select data from the  tbl_load_item. ".mysql_error());
if(mysql_num_rows($result_book) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="104" height="32" align="center" class="tbl_header_right"> No</td>

    <td width="252" align="center" class="tbl_header_right">Product Name</td>
    
    <td width="123" align="center" class="tbl_header_right">Before Qty</td>
    <td width="102" align="center" class="tbl_header_right">Sell QTY</td>
    <td width="53" align="center" class="tbl_header_right">Remain Qty</td>
    
  
    
    <td width="90" align="center" class="tbl_header_right">Date</td>
   
  </tr>
  <?php while($row_recp=mysql_fetch_assoc($result_book)){
  
  
  
  ?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td width="104" height="26" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["ld_item_id"]; ?></td>
  
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["ld_item_name"]; ?></td>
    
    <td width="123" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["ld_item_qty"]; ?></td>
    <td width="102" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["sell_qty"]; ?></td>
    <td width="153" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["ld_item_remain_qty"]; ?></td>
    
    
    <td width="90" align="left" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_recp["date"]; ?></td>
    
  </tr>
  <?php }?>
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
