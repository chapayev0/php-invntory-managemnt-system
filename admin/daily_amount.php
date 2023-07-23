<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$current_date=date('Y-m-d');
$date = $_REQUEST['date'];
$_REQUEST['date'];

/*pagination function*/
$rowsPerPage = 15;
$pageNum = 1;


if(isset($_REQUEST['page']) && $_REQUEST['page'] != 0){
    $pageNum = $_REQUEST['page'];
}
// counting the offset
$offset = ($pageNum-1) * $rowsPerPage;

$data="";
if($_REQUEST['date'] != ""){
	if($data == ""){
		$data=" AND date LIKE '".$_REQUEST['date']."%'";
	}else{
		$data .=" AND date LIKE '".$_REQUEST['date']."%'";
	}
}




$daily_amount=0;

$sql_count="SELECT * FROM tbl_reciept WHERE rec_status='0' $data ORDER BY rec_name";
$rows_count=0;
$get_number_of_rows=mysqli_query($connection,$sql_count) or die("Unable to select data from the tbl_reciept in count. " . mysqli_error());
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
		$nav .="<a onclick="."search_reciept('".$page."') style="."cursor:pointer".">$page</a>";
	}
}

if ($pageNum > 1){
   $page  = $pageNum - 1;
   $prev  ="<a onclick="."search_reciept('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
   $first ="<a onclick="."search_reciept('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
   $prev  = '&nbsp;'; // we're on page one, don't print previous link
   $first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
   $page = $pageNum + 1;
   $next ="<a onclick="."search_reciept('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
   $last ="<a onclick="."search_reciept('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
   $next = '&nbsp;'; // we're on the last page, don't print next link
   $last = '&nbsp;'; // nor the last page link
}

$query_book="SELECT * FROM tbl_reciept WHERE rec_status='0' $data ORDER BY rec_id LIMIT $offset, $rowsPerPage";
$result_book=mysqli_query($connection,$query_book) or die("Unable to select data from the tbl_reciept. ".mysqli_error());
if(mysql_num_rows($result_book) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="235" align="center" class="tbl_header_right">Rec No</td>
    <td width="235" height="25" align="center" class="tbl_header_right">Rec Name</td>
    <td width="120" align="center" class="tbl_header_right">Amount</td>
    <td width="130" align="center" class="tbl_header_right"> Amount inword</td>
    <td width="85" align="center" class="tbl_header_right">Date</td>
    <td width="30" align="center" class="tbl_header_right">View</td>
    <td width="30" align="center" class="tbl_header_right">Edit</td>
    <td width="40" align="center" class="tbl_header">Delete</td>
  </tr>
  <?php while($row_recp=mysqli_fetch_assoc($result_book)){
  
  $tot = $row_recp["rec_amount"];
   $daily_amount+=$tot;
  
  ?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["rec_id"]; ?></td>
    <td height="20" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["rec_name"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["rec_amount"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["rec_amount_inword"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["date"]; ?></td>
    <td align="center" class="border_bottom_left"><img src="../images/view.png" width="16" height="16" style="cursor:pointer" onclick="parent.location='view_book.php?book_id=<?php echo $row_recp["rec_id"]; ?>'"/></td>
    <td align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onclick="parent.location='edit_book.php?book_id=<?php echo $row_recp["rec_id"]; ?>'"/></td>
    <td align="center" class="border_bottom_left_right"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onclick="delete_book('<?php echo $row_recp["rec_id"]; ?>');"/></td>
  </tr>
  <?php }?>
  Total Amount of the Day :
  <input type="text" name="damount" id="damount" value="<?php echo $daily_amount; ?>" disabled>
  <tr>
    <td colspan="11"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
