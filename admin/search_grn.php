<?php 
require_once '../library/config.php';
require_once '../library/functions.php';

/*pagination function*/
$rowsPerPage = 15;
$pageNum = 1;


if(isset($_REQUEST['page']) && $_REQUEST['page'] != 0){
    $pageNum = $_REQUEST['page'];
}
// counting the offset
$offset = ($pageNum-1) * $rowsPerPage;


$data="";
if($_REQUEST['grn_no'] != ""){
	if($data == ""){
		$data=" AND grn_id LIKE '".$_REQUEST['grn_no']."%'";
	}else{
		$data .=" AND grn_id LIKE '".$_REQUEST['grn_no']."%'";
	}
}


if($_REQUEST['f_date'] != "" && $_REQUEST['t_date'] != ""){
	if($data == ""){
		$data=" AND grn_date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}else{
		$data .=" AND grn_date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}
}

$sql_count="SELECT * FROM  tbl_grn WHERE grn_status='0' $data ORDER BY grn_id";
$rows_count=0;
$get_number_of_rows=mysql_query($sql_count) or die("Unable to select data from the tbl_grn in count. " . mysql_error());
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
      		$nav .="<a onclick="."search_goods_received('".$page."') style="."cursor:pointer".">$page</a>";
   		}
}

if ($pageNum > 1){
   $page  = $pageNum - 1;
   $prev  ="<a onclick="."search_goods_received('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
   $first ="<a onclick="."search_goods_received('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
   $prev  = '&nbsp;'; // we're on page one, don't print previous link
   $first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
   $page = $pageNum + 1;
   $next ="<a onclick="."search_goods_received('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
   $last ="<a onclick="."search_goods_received('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
   $next = '&nbsp;'; // we're on the last page, don't print next link
   $last = '&nbsp;'; // nor the last page link
}


$query_order="SELECT * FROM  tbl_grn WHERE grn_status='0' $data ORDER BY grn_id LIMIT $offset, $rowsPerPage";
$result_order=mysql_query($query_order) or die("Unable to select data from the tbl_grn. ".mysql_error());
if(mysql_num_rows($result_order) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50" height="25" align="center" class="tbl_header_right">GRN No</td>
    <td width="60" align="center" class="tbl_header_right">INV No</td>
    <td width="60" align="center" class="tbl_header_right">Total</td>
    <td width="60" align="center" class="tbl_header_right">Date</td>
    <td width="50" align="center" class="tbl_header_right">View</td>
    <td width="50" align="center" class="tbl_header_right"><span class="tbl_header">Delete</span></td>
    
    
  </tr>
  <?php while($row_order=mysql_fetch_assoc($result_order)){?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#D3E4F1';" onmouseout="this.style.backgroundColor='';">
    <td width="50" height="20" align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_order["grn_id"]; ?></td>
    <td width="60" align="center" class="border_bottom_left"><?php echo $row_order["inv_no"]; ?></td>
    <td width="60" align="center" class="border_bottom_left"><?php echo $row_order["stotal"]; ?></td>
    <td width="60" align="center" class="border_bottom_left"><?php echo $row_order["grn_date"]; ?></td>
    <td align="center" class="border_bottom_left"><img src="../images/view.png" width="16" height="16" style="cursor:pointer" onclick="parent.location='v_grn.php?grn_id=<?php echo $row_order["grn_id"]; ?>'"/></td>
    
    <!--<td align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onclick="parent.location='edit_goods_order.php?grn_id=<?php //echo $row_order["grn_id"]; ?>'"/></td>-->
    
    <td align="center" class="border_bottom_left_right"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onclick="delete_goods_order('<?php echo $row_order["grn_id"]; ?>');"/></td>
  </tr>
  <?php }?>
</table>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="body_text">
    <td width="550" height="20" align="left"><?php echo "<strong>" . $first . $prev ." Showing page $pageNum of $maxPage pages " . $next . $last . "</strong>";?></td>
    <td width="150" align="right"><strong>No.of Records : <?php echo $numrows;?></strong></td>
  </tr>
</table>
<?php }else{?>
<div class="red_text">No records found</div>
<?php
}
require_once '../library/close.php';
?>