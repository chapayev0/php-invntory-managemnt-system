<?php 
require_once '../library/config.php';
require_once '../library/functions.php';

$book_id=$_REQUEST['book_id'];
$stu_id=$_REQUEST['stu_id'];

$query_brw_id="SELECT MAX(brw_id) FROM tbl_borrow WHERE stu_id='$stu_id' AND book_id='$book_id'";
$result_bw_id=mysql_query($query_brw_id) or die("Unable to select data from the tbl_borrow ".mysql_error());
$row_bw_id=mysql_fetch_row($result_bw_id);

$query_brw="SELECT * FROM tbl_borrow WHERE brw_id='$row_bw_id[0]'";
$result_brw=mysql_query($query_brw) or die("Unable to select data from the tbl_borrow. ".mysql_error());
$row_brw=mysql_fetch_assoc($result_brw);
function dateDiff ($d1, $d2) {
// Return the number of days between the two dates:

  return round((strtotime($d1)-strtotime($d2))/86400);

}  // end function dateDiff
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<form action="add_book_return.php" method="post" name="book_return_form" id="book_return_form">
<input name="br_book_id" id="br_book_id" type="hidden" value="<?php echo $book_id; ?>">
<input name="brw_id" id="brw_id" type="hidden" value="<?php echo $row_bw_id[0]; ?>">
<input name="stu_id" id="stu_id" type="hidden" value="<?php echo $stu_id; ?>">
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="body_text">
    <td width="125" height="25" align="left">Borrow Date</td>
    <td width="20" align="center">:</td>
    <td width="255" align="left"><?php echo $row_brw["brw_date"]; ?></td>
  </tr>
  <tr class="body_text">
    <td height="25" align="left">Return Date</td>
    <td align="center">:</td>
    <td align="left"><?php echo $row_brw["brw_return_date"]; ?></td>
  </tr>
  <tr class="body_text">
    <td height="25" align="left">Submit Date</td>
    <td align="center">:</td>
    <td align="left"><?php echo date('Y-m-d'); ?><input name="submit_date" id="submit_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" /></td>
  </tr>
  <tr class="body_text">
    <td height="25" align="left">Fine Rate</td>
    <td align="center">:</td>
    <td align="left"><?php echo getFineRate(); ?><input name="fine_rate" type="hidden" value="<?php echo getFineRate(); ?>" id="fine_rate"></td>
  </tr>
  <?php if(dateDiff(date('Y-m-d'),$row_brw["brw_return_date"]) > 0){?>
  <tr class="body_text">
    <td height="25" align="left">Fine</td>
    <td align="center">:</td>
    <td align="left"><input name="days" type="text" class="body_text" id="days" size="2" value="<?php echo dateDiff(date('Y-m-d'),$row_brw["brw_return_date"]); ?>" onKeyUp="calc_fine('<?php echo getFineRate(); ?>');"> 
      Days * <?php echo getFineRate(); ?> = 
      <input name="fine" type="text" class="body_text" id="fine" value="<?php echo (dateDiff(date('Y-m-d'),$row_brw["brw_return_date"])*getFineRate()); ?>" size="5" readonly="readonly"></td>
  </tr>
  <?php }?>
    <tr class="body_text">
    <td height="25" align="left">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left"><img src="../images/add.gif" width="65" height="35" style="cursor:pointer" id="add" onClick="form_submission('add','book_return_form');"></td>
  </tr>
</table>
<br>
<?php 
$query_book="SELECT * FROM tbl_book WHERE book_id='$book_id' AND book_status='0'";
$result_book=mysql_query($query_book) or die("Unable to select data from the tbl_book. ".mysql_error());
$row_book=mysql_fetch_assoc($result_book);

$query_stu="SELECT * FROM tbl_student WHERE stu_id='$stu_id' AND stu_status='0'";
$result_stu=mysql_query($query_stu) or die("Unable to select data from the tbl_student. ".mysql_error());
$row_stu=mysql_fetch_assoc($result_stu);
?>
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center" valign="top"><hr/></td>
  </tr>
  <tr>
    <td width="400" align="center" valign="top"><table width="400" border="0" cellspacing="0" cellpadding="0">
      <tr class="body_text">
        <td height="25" colspan="3" align="left" class="page_title_text">BOOK DETAILS</td>
        </tr>
      <tr class="body_text">
        <td width="125" height="25" align="left">Book Name</td>
        <td width="20" align="center">:</td>
        <td width="255" align="left"><?php echo $row_book["book_name"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left">ISBN</td>
        <td align="center">:</td>
        <td align="left"><?php echo $row_book["book_isbn"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left">Author Name</td>
        <td align="center">:</td>
        <td align="left"><?php echo $row_book["book_author"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left">Edition</td>
        <td align="center">:</td>
        <td align="left"><?php echo $row_book["book_edition"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left">Printed Date</td>
        <td align="center">:</td>
        <td align="left"><?php echo $row_book["book_printed_date"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left" valign="top">Description</td>
        <td align="center" valign="top">:</td>
        <td align="left"><textarea name="desc" cols="47" rows="4" class="body_text" id="desc"><?php echo $row_book["book_desc"]; ?></textarea></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left">Category</td>
        <td align="center">:</td>
        <td align="left"><?php echo $row_book["book_category"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left">Book No</td>
        <td align="center">:</td>
        <td align="left"><?php echo $row_book["book_no"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" colspan="3" align="center">
		<?php if($row_book["book_image_url"] != ""){?>
                <img src="<?php echo $row_book["book_image_url"]; ?>" width="200" height="200"/>
          <?php }?>
          </td>
        </tr>
      <tr class="body_text">
        <td height="25" align="left">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
    </table></td>
    <td width="25" align="center" class="border_right">&nbsp;</td>
    <td width="25" align="center">&nbsp;</td>
    <td width="400" valign="top"><table width="400" border="0" cellspacing="0" cellpadding="0">
      <tr class="body_text">
        <td height="25" colspan="3" align="left" class="page_title_text">STUDENT DETAILS</td>
        </tr>
      <tr class="body_text">
        <td width="125" height="25" align="left">Student Type</td>
        <td width="20" align="center">:</td>
        <td width="255" align="left"><?php echo getStudentType($row_stu["stu_tp_id"]); ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left">Name</td>
        <td align="center">:</td>
        <td align="left"><?php echo $row_stu["stu_name"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left">ID No</td>
        <td align="center">:</td>
        <td align="left"><?php echo $row_stu["stu_id_no"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left">NIC</td>
        <td align="center">:</td>
        <td align="left"><?php echo $row_stu["stu_nic"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left">Telephone No</td>
        <td align="center">:</td>
        <td align="left"><?php echo $row_stu["stu_tel"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left" valign="top">Address</td>
        <td align="center" valign="top">:</td>
        <td align="left"><textarea name="address" cols="35" rows="3" class="body_text" id="address"><?php echo $row_stu["stu_address"]; ?></textarea></td>
      </tr>
      <tr class="body_text">
        <td height="25" align="left">Library ID</td>
        <td align="center">:</td>
        <td align="left"><?php echo $row_stu["stu_lib_id"]; ?></td>
      </tr>
      <tr class="body_text">
        <td height="25" colspan="3" align="center">
        <?php if($row_stu["stu_photo_url"] != ""){?>
        <img src="<?php echo $row_stu["stu_photo_url"]; ?>" width="200" height="200"/>
        <?php }?>
        </td>
        </tr>
    </table></td>
  </tr>
</table>
</form>
<?php 
require_once '../library/close.php';
?>