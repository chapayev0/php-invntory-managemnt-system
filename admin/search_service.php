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
if($_REQUEST['cat_id'] != ""){
	if($data == ""){
		$data=" AND tbl_service.scat_id='".$_REQUEST['cat_id']."'";
	}else{
		$data .=" AND tbl_service.scat_id='".$_REQUEST['cat_id']."'";
	}
}

if($_REQUEST['s_id'] != ""){
	if($data == ""){
		$data=" AND tbl_service.ser_item LIKE '".$_REQUEST['s_id']."%'";
	}else{
		$data .=" AND tbl_service.ser_item LIKE '".$_REQUEST['s_id']."%'";
	}
}

if($_REQUEST['service'] != ""){
	if($data == ""){
		$data=" AND tbl_service.ser_name LIKE '".$_REQUEST['service']."%'";
	}else{
		$data .=" AND tbl_service.ser_name LIKE '".$_REQUEST['service']."%'";
	}
}

/*****************************pagination****************/
$sql_count="SELECT 
		tbl_service.ser_id,
		tbl_service.ser_name,
		
		tbl_service.ser_price,
		tbl_maincategory.scat_name
FROM tbl_service LEFT JOIN tbl_maincategory ON tbl_service.scat_id=tbl_maincategory.scat_id WHERE tbl_service.ser_status ='0' $data ORDER BY tbl_service.ser_id";

$rows_count=0;
$get_number_of_rows=mysqli_query($connection,$sql_count) or die("Unable to select data from the tbl_customer in count. " . mysqli_error());
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
		$nav .="<a onclick="."search_service('".$page."') style="."cursor:pointer".">$page</a>";
	}
}

if ($pageNum > 1){
$page  = $pageNum - 1;
$prev  ="<a onclick="."search_service('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
$first ="<a onclick="."search_service('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
$prev  = '&nbsp;'; // we're on page one, don't print previous link
$first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
$page = $pageNum + 1;
$next ="<a onclick="."search_service('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
$last ="<a onclick="."search_service('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
$next = '&nbsp;'; // we're on the last page, don't print next link
$last = '&nbsp;'; // nor the last page link
}

$query_p="SELECT 
		tbl_service.ser_id,
		tbl_service.ser_name,		
		tbl_service.ser_price,
		tbl_maincategory.scat_name,
		tbl_service.ser_item,
		tbl_service.scat_id,
		tbl_maincategory.scat_id
		
FROM tbl_service LEFT JOIN tbl_maincategory ON tbl_service.scat_id=tbl_maincategory.scat_id WHERE tbl_service.ser_status ='0' $data ORDER BY tbl_service.ser_id LIMIT $offset, $rowsPerPage";
$result_p=mysqli_query($connection,$query_p) or die("Unable to select data from the tbl_user. ".mysqli_error());
if(mysql_num_rows($result_p) != 0){
?>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50" align="center" class="tbl_header_right">Service ID</td>
	<td width="100" align="center" class="tbl_header_right">Service Item Code</td>
	<td width="300" height="25" align="center" class="tbl_header_right">Category</td>
	<td width="250" align="center" class="tbl_header_right">Service Name</td>
	
	<td width="100" align="center" class="tbl_header_right"> Price</td>
	<td width="50" align="center" class="tbl_header_right">Edit</td>
	<td width="50" align="center" class="tbl_header">Delete</td>
	</tr>
	<?php while($row_p=mysqli_fetch_row($result_p)){?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#EDFBD9';" onmouseout="this.style.backgroundColor='';">
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p[0]; ?></td>
	<td width="1" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p[4]; ?></td>
	<td height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p[3]; ?></td>
	<td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p[1]; ?></td>
	
	<td align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_p[2]; ?></td>
	<td align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onclick="parent.location='edit_service.php?catagory_id=<?php echo $row_p[6]; ?>&ser_id=<?php echo $row_p[4]; ?>'"/></td>
	<td align="center" class="border_bottom_left_right"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onclick="delete_product('<?php echo $row_p[0]; ?>');"/></td>
	</tr>
	<?php }?>
  <tr>
	<td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr class="body_text">
	    <td width="600" height="20" align="left"><?php echo "<strong>" . $first . $prev ." Showing page $pageNum of $maxPage pages " . $next . $last . "</strong>";?></td>
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