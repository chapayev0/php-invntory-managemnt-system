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
if($_REQUEST['rute'] != ""){
	if($data == ""){
		$data=" AND  rute='".$_REQUEST['rute']."'";
	}else{
		$data .=" AND  rute='".$_REQUEST['rute']."'";
	}
}

if($_REQUEST['dri'] != ""){
	if($data == ""){
		$data=" AND  driver LIKE '".$_REQUEST['dri']."%'";
	}else{
		$data .=" AND  driver LIKE '".$_REQUEST['dri']."%'";
	}
}

if($_REQUEST['reff'] != ""){
	if($data == ""){
		$data=" AND  reff LIKE '".$_REQUEST['reff']."%'";
	}else{
		$data .=" AND  reff LIKE '".$_REQUEST['reff']."%'";
	}
}
if($_REQUEST['date'] != ""){
	if($data == ""){
		$data=" AND  date LIKE '".$_REQUEST['date']."%'";
	}else{
		$data .=" AND  date LIKE '".$_REQUEST['date']."%'";
	}
}

/*****************************pagination****************/
$sql_count="SELECT *
FROM  tbl_assgn_rute  WHERE r_a_status ='0' $data ORDER BY r_a_id";

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
		$nav .="<a onclick="."search_product('".$page."') style="."cursor:pointer".">$page</a>";
	}
}

if ($pageNum > 1){
$page  = $pageNum - 1;
$prev  ="<a onclick="."search_product('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
$first ="<a onclick="."search_product('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
$prev  = '&nbsp;'; // we're on page one, don't print previous link
$first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
$page = $pageNum + 1;
$next ="<a onclick="."search_product('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
$last ="<a onclick="."search_product('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
$next = '&nbsp;'; // we're on the last page, don't print next link
$last = '&nbsp;'; // nor the last page link
}

$query_p="SELECT *
FROM  tbl_assgn_rute  WHERE r_a_status ='0' $data ORDER BY r_a_id LIMIT $offset, $rowsPerPage";
$result_p=mysqli_query($connection,$query_p) or die("Unable to select data from the tbl_user. ".mysqli_error());
if(mysql_num_rows($result_p) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="65" align="center" class="tbl_header_right">RUTE ID</td>
	<td width="110" align="center" class="tbl_header_right">RUTE NAME</td>
	<td width="155" height="25" align="center" class="tbl_header_right">REFF</td>
	<td width="144" align="center" class="tbl_header_right">DRIVER</td>
	<td width="64" align="center" class="tbl_header_right"> DATE</td>
	<td width="79" align="center" class="tbl_header_right">View</td>
	
	<td width="79" align="center" class="tbl_header_right">Edit</td>
	<td width="83" align="center" class="tbl_header">Delete</td>
	</tr>
	<?php while($row_p=mysqli_fetch_assoc($result_p)){?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#EDFBD9';" onmouseout="this.style.backgroundColor='';">
    <td width="65" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p["r_a_id"]; ?></td>
	<td width="110" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p["rute"]; ?></td>
	<td width="155" height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p["reff"]; ?></td>
	<td width="144" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p["driver"]; ?></td>
	<td width="64" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p["date"]; ?></td>
	<td align="center" class="border_bottom_left"><img src="../images/view.png" width="16" height="16" style="cursor:pointer" onclick="parent.location='view_rute_ass.php?r_a_id=<?php echo $row_p["r_a_id"]; ?>'" />
    <input name="vatR" id="vatR" type="hidden" value="" /></td>
	
	<td align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onClick="parent.location='edit_rute_ass.php?r_a_id=<?php echo $row_p["r_a_id"]; ?>'"></td>
	<td align="center" class="border_bottom_left_right"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onclick="delete_product('<?php echo $row_p["r_a_id"]; ?>');"/></td>
	</tr>
	<?php }?>
  <tr>
	<td colspan="9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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