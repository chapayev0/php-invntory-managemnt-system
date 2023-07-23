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
		$data=" AND stu_name LIKE '".$_REQUEST['name']."%'";
	}else{
		$data .=" AND stu_name LIKE '".$_REQUEST['name']."%'";
	}
}

if($_REQUEST['id_no'] != ""){
	if($data == ""){
		$data=" AND stu_id_no LIKE '".$_REQUEST['id_no']."%'";
	}else{
		$data .=" AND stu_id_no LIKE '".$_REQUEST['id_no']."%'";
	}
}

if($_REQUEST['nic'] != ""){
	if($data == ""){
		$data=" AND stu_nic LIKE '".$_REQUEST['nic']."%'";
	}else{
		$data .=" AND stu_nic LIKE '".$_REQUEST['nic']."%'";
	}
}

if($_REQUEST['tel'] != ""){
	if($data == ""){
		$data=" AND stu_tel LIKE '".$_REQUEST['tel']."%'";
	}else{
		$data .=" AND stu_tel LIKE '".$_REQUEST['tel']."%'";
	}
}

if($_REQUEST['lib_id'] != ""){
	if($data == ""){
		$data=" AND stu_lib_id LIKE '".$_REQUEST['lib_id']."%'";
	}else{
		$data .=" AND stu_lib_id LIKE '".$_REQUEST['lib_id']."%'";
	}
}

if($_REQUEST['stu_tp_id'] != ""){
	if($data == ""){
		$data=" AND stu_tp_id='".$_REQUEST['stu_tp_id']."'";
	}else{
		$data .=" AND stu_tp_id='".$_REQUEST['stu_tp_id']."'";
	}
}

$sql_count="SELECT * FROM tbl_student WHERE stu_status='0' $data ORDER BY stu_name";
$rows_count=0;
$get_number_of_rows=mysqli_query($connection,$sql_count) or die("Unable to select data from the tbl_student in count. " . mysqli_error());
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
		$nav .="<a onclick="."search_student('".$page."') style="."cursor:pointer".">$page</a>";
	}
}

if ($pageNum > 1){
   $page  = $pageNum - 1;
   $prev  ="<a onclick="."search_student('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
   $first ="<a onclick="."search_student('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
   $prev  = '&nbsp;'; // we're on page one, don't print previous link
   $first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
   $page = $pageNum + 1;
   $next ="<a onclick="."search_student('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
   $last ="<a onclick="."search_student('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
   $next = '&nbsp;'; // we're on the last page, don't print next link
   $last = '&nbsp;'; // nor the last page link
}

$query_stu="SELECT * FROM tbl_student WHERE stu_status='0' $data ORDER BY stu_name LIMIT $offset, $rowsPerPage";
$result_stu=mysqli_query($connection,$query_stu) or die("Unable to select data from the tbl_student. ".mysqli_error());
if(mysql_num_rows($result_stu) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="200" height="25" align="center" class="tbl_header_right">Student Name</td>
    <td width="100" align="center" class="tbl_header_right">Student Type</td>
    <td width="150" align="center" class="tbl_header_right">ID No</td>
    <td width="150" align="center" class="tbl_header_right">Library ID No</td>
    <td width="100" align="center" class="tbl_header_right">NIC</td>
    <td width="100" align="center" class="tbl_header_right">Tel No</td>
    <td width="50" align="center" class="tbl_header_right">Edit</td>
    <td width="50" align="center" class="tbl_header_right">View</td>
    <td width="50" align="center" class="tbl_header">Delete</td>
  </tr>
  <?php while($row_stu=mysqli_fetch_assoc($result_stu)){?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stu["stu_name"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo getStudentType($row_stu["stu_tp_id"]); ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stu["stu_id_no"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stu["stu_lib_id"]; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $row_stu["stu_nic"]; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $row_stu["stu_tel"]; ?></td>
    <td align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onclick="parent.location='edit_student.php?stu_id=<?php echo $row_stu["stu_id"]; ?>'"/></td>
    <td align="center" class="border_bottom_left"><img src="../images/view.png" width="16" height="16" style="cursor:pointer" onclick="parent.location='view_student.php?stu_id=<?php echo $row_stu["stu_id"]; ?>'"/></td>
    <td align="center" class="border_bottom_left_right"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onclick="delete_student('<?php echo $row_stu["stu_id"]; ?>');"/></td>
  </tr>
  <?php }?>
  <tr>
    <td colspan="9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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