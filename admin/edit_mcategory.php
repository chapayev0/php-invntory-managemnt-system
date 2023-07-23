<?php 
$scat_id=$_REQUEST['cat_id'];
$scat_name=$_REQUEST['cat_name'];
echo $scat_name;
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<form action="update_mcategory.php" method="post" name="mcat_form_<?php echo $scat_id; ?>" id="mcat_form_<?php echo $scat_id; ?>" onSubmit="return mcat_validation('mcat_<?php echo $scat_id; ?>');">
<table width="400" border="0" cellspacing="0" cellpadding="0" bgcolor="#D5F4E4">
  <tr>
    <td width="150" align="left" class="border_bottom">
    <input name="scat_id" id="scat_id" type="hidden" value="<?php echo $scat_id; ?>">
      <input name="scat_<?php echo $scat_id; ?>" type="text" class="body_text" id="scat_<?php echo $scat_id; ?>" size="35" value="<?php echo $scat_name; ?>"/>
    </td>
    <td align="right" class="border_bottom">
      <input type="image" src="../images/update.gif" name="update" id="update" value="Submit">
          <img src="../images/cancel.gif" width="65" height="35" style="cursor:pointer" onClick="parent.location='view_scats.php'"></td>
  </tr>
</table>
</form>