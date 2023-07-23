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
		$data=" AND name  LIKE '".$_REQUEST['name']."%'";
	}else{
		$data .=" AND name  LIKE '".$_REQUEST['name']."%'";
	}
}






$daily_amount=0;
$total=0;

$sql_count="SELECT * FROM tbl_stockall WHERE status ='0' $data ORDER BY id ";
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

 $query_book="SELECT * FROM tbl_stockall WHERE status ='0' $data";
$result_book=mysqli_query($connection,$query_book) or die("Unable to select data from the tbl_stock. ".mysqli_error());
if(mysql_num_rows($result_book) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<title>Stock</title>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="273" align="center" class="border_top_bottom_left" >Product Code</td>
    <td width="273" height="26" align="center" class="border_top_bottom_left" >Product Name</td>
    <td width="136" align="center" class="border_top_bottom_left" >Cost</td>
    
    <td width="136" align="center" class="border_top_bottom_left" > Qty</td>
    <td width="133" align="center" class="border_top_bottom_left_right" >Amount</td>
  </tr>
  <?php while($row_recp=mysqli_fetch_assoc($result_book)){
  
  
  
  ?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["code"]; ?></td>
    <td height="30" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["name"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["price"]; ?></td>
    
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["qty"]; ?></td>
    <td align="left" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_recp["qty"]*$row_recp["price"]; ?></td>
  </tr>
   <?php 
   
   $total+=$row_recp["qty"]*$row_recp["price"]; }?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td height="30" align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td align="left" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $total; ?></td>
  </tr>
 
  <tr>
    <td colspan="17">&nbsp;</td>
  </tr>
</table>
<?php }else{?>
<div class="red_text">No records found</div>
<?php }
require_once '../library/close.php';
?>
