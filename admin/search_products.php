<?php 
require_once '../library/config.php';
session_start();
$user_type=$_SESSION['user_type'];
/*pagination function*/
$rowsPerPage = 25;
$pageNum = 1;


if(isset($_REQUEST['page']) && $_REQUEST['page'] != 0){
    $pageNum = $_REQUEST['page'];
}
// counting the offset
$offset = ($pageNum-1) * $rowsPerPage;

$data="";




if($_REQUEST['service'] != ""){
	if($data == ""){
		$data=" AND p_name LIKE '".$_REQUEST['service']."%'";
	}else{
		$data .=" AND p_name LIKE '".$_REQUEST['service']."%'";
	}
}
if($_REQUEST['code'] != ""){
	if($data == ""){
		$data=" AND p_code LIKE '".$_REQUEST['code']."%'";
	}else{
		$data .=" AND p_code LIKE '".$_REQUEST['code']."%'";
	}
}

/*****************************pagination****************/
$sql_count="SELECT * FROM tbl_product WHERE p_status ='0' $data ORDER BY p_id";

$rows_count=0;
$get_number_of_rows=mysql_query($sql_count) or die("Unable to select data from the tbl_customer in count. " . mysql_error());
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

$query_p="SELECT * FROM tbl_product  WHERE p_status ='0' $data ORDER BY cat LIMIT $offset, $rowsPerPage";
$result_p=mysql_query($query_p) or die("Unable to select data from the tbl_user. ".mysql_error());
if(mysql_num_rows($result_p) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="116" align="center" class="tbl_header_right">Cat</td>
    <td width="156" align="center" class="tbl_header_right">Code</td>
    <td width="240" height="25" align="center" class="tbl_header_right">Name</td>
    <td width="76" align="center" class="tbl_header_right">Warranty</td>
    <td width="76" align="center" class="tbl_header_right">Cost</td>
   
	<td width="76" align="center" class="tbl_header_right"> Price</td>
	<td width="47" align="center" class="tbl_header_right">Edit</td>
	<td width="65" align="center" class="tbl_header">Delete</td>
	</tr>
	<?php while($row_p=mysql_fetch_assoc($result_p)){?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#EDFBD9';" onmouseout="this.style.backgroundColor='';">
    <td width="116" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p["cat"]; ?></td>
    <td width="156" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p["p_code"]; ?></td>
    <td width="240" height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_p["p_name"]; ?></td>
    <td width="76" align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_p["war"]; ?></td>
    <td width="76" align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_p["cprice"]; ?></td>
    
	<td width="76" align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_p["p_price"]; ?></td>
	<td align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onClick="parent.location='edit_pro.php?p_id=<?php echo $row_p["p_id"]; ?>'"><?php //echo $row_p[0]; ?></td>
	<td align="center" class="border_bottom_left_right"><?php if($user_type =='admin'){?><span class="red_text"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onclick="delete_product('<?php echo $row_p["p_id"]; ?>');"/></span> <?php }else{?>Can't <?php }?></td>
	</tr>
	<?php }?>
  <tr>
	<td colspan="13"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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