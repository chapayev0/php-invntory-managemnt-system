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
if($_REQUEST['type'] != ""){
	if($data == ""){
		$data=" AND type LIKE '".$_REQUEST['type']."%'";
	}else{
		$data .=" AND type LIKE '".$_REQUEST['type']."%'";
	}
}



if($_REQUEST['date'] != ""){
	if($data == ""){
		$data=" AND date  LIKE '".$_REQUEST['date']."%'";
	}else{
		$data .=" AND date  LIKE '".$_REQUEST['date']."%'";
	}
}







$sql_count="SELECT * FROM tbl_h_income WHERE h_status='0' $data ORDER BY h_id";
$rows_count=0;
$get_number_of_rows=mysql_query($sql_count) or die("Unable to select data from the tbl_h_income in count. " . mysql_error());
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
		$nav .="<a onclick="."search_bill('".$page."') style="."cursor:pointer".">$page</a>";
	}
}

if ($pageNum > 1){
   $page  = $pageNum - 1;
   $prev  ="<a onclick="."search_bill('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
   $first ="<a onclick="."search_bill('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
   $prev  = '&nbsp;'; // we're on page one, don't print previous link
   $first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
   $page = $pageNum + 1;
   $next ="<a onclick="."search_bill('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
   $last ="<a onclick="."search_bill('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
   $next = '&nbsp;'; // we're on the last page, don't print next link
   $last = '&nbsp;'; // nor the last page link
}

$query_stu="SELECT * FROM tbl_h_income WHERE h_status='0' $data ORDER BY h_id LIMIT $offset, $rowsPerPage";
$result_stu=mysql_query($query_stu) or die("Unable to select data from the tbl_h_income. ".mysql_error());
if(mysql_num_rows($result_stu) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="40" height="25" align="center" class="tbl_header_right">Bill ID</td>
  
   
    <td width="100" align="center" class="tbl_header_right">PUT/GET</td>
    <td width="100" align="center" class="tbl_header_right">Amount</td>
  
    <td width="100" align="center" class="tbl_header_right">Description</td>
  
    <td width="50" align="center" class="tbl_header_right">Date</td>
    
  </tr>
  <?php while($row_stu=mysql_fetch_assoc($result_stu)){?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td width="40" height="20" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stu["h_id"]; ?></td>
 
    
    <td align="center" class="border_bottom_left"><?php echo $row_stu["type"]; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $row_stu["amount"]; ?></td>
  
    <td align="center" class="border_bottom_left"><?php echo $row_stu["dis"]; ?></td>
  
    
    <td align="center" class="border_bottom_left_right"><?php echo $row_stu["date"]; ?></td>
    
  </tr>
  <?php }?>
  <tr>
    <td colspan="11"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="body_text">
        <td width="750" height="20" align="left"><?php echo "<strong>" . $first . $prev ." Showing page $pageNum of $maxPage pages " . $next . $last . "</strong>";?></td>
        <td width="200" align="right"><strong>No.of Records : <?php echo $numrows;?></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }else{?>
<div class="red_text">No records found</div>
<?php 
}
require_once '../library/close.php';
?>