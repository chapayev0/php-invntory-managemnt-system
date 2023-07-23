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
if($_REQUEST['name'] != ""){
	if($data == ""){
		$data=" AND bill_paid_person LIKE '".$_REQUEST['name']."%'";
	}else{
		$data .=" AND bill_paid_person LIKE '".$_REQUEST['name']."%'";
	}
}

if($_REQUEST['no'] != ""){
	if($data == ""){
		$data=" AND bill_inv_no  LIKE '".$_REQUEST['no']."%'";
	}else{
		$data .=" AND bill_inv_no  LIKE '".$_REQUEST['no']."%'";
	}
}

if($_REQUEST['date'] != ""){
	if($data == ""){
		$data=" AND bill_paid_date  LIKE '".$_REQUEST['date']."%'";
	}else{
		$data .=" AND bill_paid_date  LIKE '".$_REQUEST['date']."%'";
	}
}

if($_REQUEST['bill_type'] != ""){
	if($data == ""){
		$data=" AND bill_type  LIKE '".$_REQUEST['bill_type']."%'";
	}else{
		$data .=" AND bill_type  LIKE '".$_REQUEST['bill_type']."%'";
	}
}





$sql_count="SELECT * FROM tbl_bills WHERE bill_status='0' $data ORDER BY bill_id";
$rows_count=0;
$get_number_of_rows=mysqli_query($connection,$sql_count) or die("Unable to select data from the tbl_bills in count. " . mysqli_error());
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

$query_stu="SELECT * FROM tbl_bills WHERE bill_status='0' $data ORDER BY bill_id LIMIT $offset, $rowsPerPage";
$result_stu=mysqli_query($connection,$query_stu) or die("Unable to select data from the tbl_bills. ".mysqli_error());
if(mysql_num_rows($result_stu) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="200" height="25" align="center" class="tbl_header_right">Bill ID</td>
  
    <td width="150" align="center" class="tbl_header_right">Bill Type</td>
    <td width="100" align="center" class="tbl_header_right">Paid Person</td>
  
    <td width="100" align="center" class="tbl_header_right">Amount</td>
    <td width="100" align="center" class="tbl_header_right">Date</td>
    <td width="50" align="center" class="tbl_header_right">Invoice No</td>
    
  </tr>
  <?php while($row_stu=mysqli_fetch_assoc($result_stu)){?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td height="20" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stu["bill_id"]; ?></td>
 
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stu["bill_type"]; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $row_stu["bill_paid_person"]; ?></td>
  
    <td align="center" class="border_bottom_left"><?php echo $row_stu["bill_amount"]; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $row_stu["bill_paid_date"]; ?></td>
    
    <td align="center" class="border_bottom_left"><?php echo $row_stu["bill_inv_no"]; ?></td>
    
  </tr>
  <?php }?>
  <tr>
    <td colspan="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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