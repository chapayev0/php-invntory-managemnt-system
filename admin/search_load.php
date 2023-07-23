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
if($_REQUEST['l_no'] != ""){
	if($data == ""){
		$data=" AND ld_id LIKE '".$_REQUEST['l_no']."%'";
	}else{
		$data .=" AND ld_id LIKE '".$_REQUEST['l_no']."%'";
	}
}
if($_REQUEST['reff'] != ""){
	if($data == ""){
		$data=" AND reff LIKE '".$_REQUEST['reff']."%'";
	}else{
		$data .=" AND reff LIKE '".$_REQUEST['reff']."%'";
	}
}if($_REQUEST['rute'] != ""){
	if($data == ""){
		$data=" AND rute LIKE '".$_REQUEST['rute']."%'";
	}else{
		$data .=" AND rute LIKE '".$_REQUEST['rute']."%'";
	}
}if($_REQUEST['dri'] != ""){
	if($data == ""){
		$data=" AND driver LIKE '".$_REQUEST['dri']."%'";
	}else{
		$data .=" AND driver LIKE '".$_REQUEST['dri']."%'";
	}
}


if($_REQUEST['f_date'] != "" && $_REQUEST['t_date'] != ""){
	if($data == ""){
		$data=" AND ld_date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}else{
		$data .=" AND ld_date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}
}

$sql_count="SELECT * FROM  tbl_load WHERE ld_status='0' $data ORDER BY ld_id";
$rows_count=0;
$get_number_of_rows=mysql_query($sql_count) or die("Unable to select data from the tbl_load in count. " . mysql_error());
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


$query_order="SELECT * FROM  tbl_load WHERE ld_status='0' $data ORDER BY ld_id LIMIT $offset, $rowsPerPage";
$result_order=mysql_query($query_order) or die("Unable to select data from the tbl_load. ".mysql_error());
if(mysql_num_rows($result_order) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="75" height="25" align="center" class="tbl_header_right">LOAD No</td>
    <td width="95" align="center" class="tbl_header_right">Date</td>
    <td width="171" align="center" class="tbl_header_right">Rute</td>
    <td width="120" align="center" class="tbl_header_right">Reff</td>
    <td width="149" align="center" class="tbl_header_right">Driver</td>
    <td width="86" align="center" class="tbl_header_right">Add User</td>
    
    <td width="49" align="center" class="tbl_header_right">View</td>
    <td width="55" align="center" class="tbl_header_right"><span class="tbl_header">Delete</span></td>
    
    
  </tr>
  <?php while($row_order=mysql_fetch_assoc($result_order)){?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#D3E4F1';" onmouseout="this.style.backgroundColor='';">
    <td width="75" height="20" align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_order["ld_id"]; ?></td>
    <td width="95" align="center" class="border_bottom_left"><?php echo $row_order["ld_date"]; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $row_order["rute"]; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $row_order["reff"]; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $row_order["driver"]; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $row_order["u_id"]; ?></td>
    
    <td align="center" class="border_bottom_left"><img src="../images/view.png" width="16" height="16" style="cursor:pointer" onclick="parent.location='view_load.php?ld_id=<?php echo $row_order["ld_id"]; ?>'"/></td>
    
    <!--<td align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onclick="parent.location='edit_goods_order.php?ld_id=<?php //echo $row_order["ld_id"]; ?>'"/></td>-->
    
    <td align="center" class="border_bottom_left_right"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onclick="delete_load('<?php echo $row_order["ld_id"]; ?>');"/></td>
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