<?php 
require_once '../library/config.php';
session_start();
$user_type=$_SESSION['user_type'];
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
		$data=" AND own LIKE '".$_REQUEST['name']."%'";
	}else{
		$data .=" AND own LIKE '".$_REQUEST['name']."%'";
	}
}

if($_REQUEST['id'] != ""){
	if($data == ""){
		$data=" AND v_name LIKE '".$_REQUEST['id']."%'";
	}else{
		$data .=" AND v_name LIKE '".$_REQUEST['id']."%'";
	}
}



$daily_amount=0;

$sql_count="SELECT * FROM tbl_other WHERE v_status='0' $data ORDER BY v_name";
$rows_count=0;
$get_number_of_rows=mysql_query($sql_count) or die("Unable to select data from the tbl_other in count. " . mysql_error());
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

 $query_book="SELECT * FROM tbl_other WHERE v_status='0' $data ORDER BY v_id LIMIT $offset, $rowsPerPage";
$result_book=mysql_query($query_book) or die("Unable to select data from the tbl_other. ".mysql_error());
if(mysql_num_rows($result_book) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="235" align="center" class="tbl_header_right"> Veh</td>
    <td width="235" align="center" class="tbl_header_right">Engine No</td>
    <td width="235" align="center" class="tbl_header_right">Chasy No</td>
    <td width="235" height="25" align="center" class="tbl_header_right"> Owner</td>
    <td width="120" align="center" class="tbl_header_right">Desc</td>
    <td width="120" align="center" class="tbl_header_right">Grn Test</td>
    <td width="120" align="center" class="tbl_header_right">Insu</td>
    <td width="120" align="center" class="tbl_header_right">Linc</td>
    
  
    
    <td width="85" align="center" class="tbl_header_right">Date</td>
  
   
    <td width="30" align="center" class="tbl_header_right">View</td>
    <td width="30" align="center" class="tbl_header_right">Edit</td>
    <td width="40" align="center" class="tbl_header">Delete</td>
  </tr>
  <?php while($row_recp=mysql_fetch_assoc($result_book)){
  
  
  
  ?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["v_name"]; ?></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["eng"]; ?></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["chasy"]; ?></td>
    <td height="20" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["own"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["des"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["grn_test_date"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["ins_ren_date"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["lin_ren_date"]; ?></td>
    
    
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["date"]; ?></td>

    
    <td align="center" class="border_bottom_left"><img src="../images/view.png" width="16" height="16" style="cursor:pointer" onclick="parent.location='view_other.php?v_id=<?php echo $row_recp["v_id"]; ?>'"/></td>
    <td align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onclick="parent.location='edit_other.php?v_id=<?php echo $row_recp["v_id"]; ?>'"/></td>
   <td align="center" class="border_bottom_left_right"> <?php if($user_type =='admin'){?><span class="red_text"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onclick="delete_rec('<?php echo $row_recp["v_id"]; ?>');"/></span> <?php }else{?>Can't <?php }?></td>
  </tr>
  <?php }?>
  <tr>
    <td colspan="17"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
