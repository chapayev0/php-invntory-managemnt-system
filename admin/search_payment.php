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
if($_REQUEST['name'] != ""){
	if($data == ""){
		$data=" AND cus_name  LIKE '".$_REQUEST['name']."%'";
	}else{
		$data .=" AND cus_name  LIKE '".$_REQUEST['name']."%'";
	}
}


if($_REQUEST['f_date'] != "" && $_REQUEST['t_date']){ 
	if($data == ""){
		$data=" AND date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}else{
		$data .=" AND date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}
}

if($_REQUEST['type'] != ""){
	if($data == ""){
		$data=" AND type='".$_REQUEST['type']."'";
	}else{
		$data .=" AND type='".$_REQUEST['type']."'";
	}
}

/*****************************pagination****************/
$sql_count="SELECT * FROM tbl_payment WHERE p_status='0' $data ORDER BY pay_id";

$rows_count=0;
$get_number_of_rows=mysql_query($sql_count) or die("Unable to select data from the tbl_contrac in count. " . mysql_error());
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
		$nav .="<a onclick="."search_users('".$page."') style="."cursor:pointer".">$page</a>";
	}
}

if ($pageNum > 1){
$page  = $pageNum - 1;
$prev  ="<a onclick="."search_users('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
$first ="<a onclick="."search_users('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
$prev  = '&nbsp;'; // we're on page one, don't print previous link
$first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
$page = $pageNum + 1;
$next ="<a onclick="."search_users('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
$last ="<a onclick="."search_users('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
$next = '&nbsp;'; // we're on the last page, don't print next link
$last = '&nbsp;'; // nor the last page link
}

$query_user="SELECT * FROM tbl_payment WHERE p_status='0' $data ORDER BY pay_id LIMIT $offset, $rowsPerPage";
$result_user=mysql_query($query_user) or die("Unable to select data from the tbl_user. ".mysql_error());
if(mysql_num_rows($result_user) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />


<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" >&nbsp;</td>
    <td align="center" >&nbsp;</td>
    <td height="25" align="center" >&nbsp;</td>
    <td align="center" colspan="2" >&nbsp;</td>
   
    <td align="center" ><form action="print_payment.php" method="post" name="stock_form" target="_blank" id="stock_form">
       <input name="name" id="name" type="hidden" value="<?php echo $_REQUEST['name']; ?>" />
       <input name="type" id="type" type="hidden" value="<?php echo $_REQUEST['type']; ?>" />
       <input name="f_date" id="f_date" type="hidden" value="<?php echo $_REQUEST['f_date']; ?>" />
       <input name="t_date" id="t_date" type="hidden" value="<?php echo $_REQUEST['t_date']; ?>" />
        <input type="submit" name="print" id="print" value="print" />
     </form></td>
  </tr>
  <tr>
    <td width="100" align="center" class="tbl_header_right">Bill No</td>
    <td width="100" align="center" class="tbl_header_right">Inv NO</td>
    <td width="100" height="25" align="center" class="tbl_header_right">Name</td>
    <td width="150" align="center" class="tbl_header_right">Amount</td>
    <td width="70" align="center" class="tbl_header_right">Date</td>
    <td width="100" align="center" class="tbl_header_right"> Type</td>
    <td width="50" align="center" class="tbl_header_right">Delete</td>
    
  </tr>
  <?php while($row_user=mysql_fetch_assoc($result_user)){?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#DCF8FC';" onmouseout="this.style.backgroundColor='';">
    <td width="100" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_user["bill_id"]; ?></td>
    <td width="100" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_user["inv_no"]; ?></td>
    <td width="100" height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_user["cus_name"]; ?></td>
    <td width="150" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_user["amount"]; ?></td>
    <td width="70" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_user["date"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_user["type"]; ?></td>
    <td width="50" align="center" class="border_top_bottom_left_right" style="padding-left:3pt;"><img src="../images/delete.png" alt="" width="10" height="10" style="cursor:pointer" onclick="delete_user('<?php echo $row_user["pay_id"]; ?>');"/></td>
    
  </tr>
  <?php }?>
  <tr>
    <td height="20" colspan="9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="body_text">
        <td width="600" height="20" align="left"><?php echo "<strong>" . $first . $prev ." Showing page $pageNum of $maxPage pages " . $next . $last . "</strong>";?></td>
        <td width="200" align="right"><strong>No.of Records : <?php echo $numrows;?></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }else{?>
<div class="red_text">No recprds found</div>
<?php 
}
require_once '../library/close.php';
?>