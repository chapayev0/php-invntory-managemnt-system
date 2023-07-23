<?php 
$r_id=$_REQUEST['cat_id'];
$r_name=$_REQUEST['cat_name'];
echo $r_name;
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<form action="update_rute.php" method="post" name="mcat_form_<?php echo $r_id; ?>" id="mcat_form_<?php echo $r_id; ?>" onSubmit="return mcat_validation('mcat_<?php echo $r_id; ?>');">
<table width="400" border="0" cellspacing="0" cellpadding="0" bgcolor="#D5F4E4">
  <tr>
    <td width="150" align="left" class="border_bottom">
    <input name="r_id" id="r_id" type="hidden" value="<?php echo $r_id; ?>">
      <input name="r_<?php echo $r_id; ?>" type="text" class="body_text" id="r_<?php echo $r_id; ?>" size="35" value="<?php echo $r_name; ?>"/>
    </td>
    <td align="right" class="border_bottom">
      <input type="image" src="../images/update.gif" name="update" id="update" value="Submit">
          <img src="../images/cancel.gif" width="65" height="35" style="cursor:pointer" onClick="parent.location='display_rute.php'"></td>
  </tr>
</table>
</form>