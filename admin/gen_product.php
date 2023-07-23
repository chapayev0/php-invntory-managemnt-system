<?php 
require_once '../library/config.php';
require_once '../library/functions.php';
$num=$_REQUEST['num'];

?>
<table width="1126" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="21" height="25" align="center"><img src="../images/add.png" width="16" height="16" style="cursor:pointer" onclick="gen_service('service_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');$('#count_item').val(<?php echo ($num+1); ?>);"/></td>
  <td width="151" align="left" class="border_bottom_left"><select name="cat_<?php echo $num; ?>" class="body_text" id="cat_<?php echo $num; ?>" >
    <option value="">Select Category</option>
    <?php rute("");?>
  </select></td>
  <td width="220" align="left" class="border_bottom_left"><input name="code_<?php echo $num; ?>" type="text" class="body_text" id="code_<?php echo $num; ?>" size="30" /></td>
  <td width="254" align="right" class="border_bottom_left"><input name="name_<?php echo $num; ?>" type="text" class="body_text" id="name_<?php echo $num; ?>" size="40" style="text-align:right" /></td>
  <td width="126" align="right" class="border_bottom_left"><input name="war_<?php echo $num; ?>" type="text" class="body_text" id="war_<?php echo $num; ?>" size="15" style="text-align:right" /></td>
  <td width="126" align="right" class="border_bottom_left"><input name="cost_<?php echo $num; ?>" type="text" class="body_text" id="cost_<?php echo $num; ?>" size="10" style="text-align:right" /></td>
  <td width="112" align="right" class="border_bottom_left_right"><input name="price_<?php echo $num; ?>" type="text" class="body_text" id="price_<?php echo $num; ?>" size="10" style="text-align:right" /></td>
  <td width="116" align="left"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="delete_div('service_div_<?php echo $num; ?>')"></td>
</tr>
</table>
<div id="service_div_<?php echo ($num+1); ?>"></div>