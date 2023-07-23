<?php 
require_once '../library/config.php';
require_once '../library/functions.php';
$num=$_REQUEST['num'];

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="25" height="25" align="center"><img src="../images/add.png" width="16" height="16" style="cursor:pointer" onclick="gen_service('service_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');$('#count_item').val(<?php echo ($num+1); ?>);"/></td>
  <td width="150" align="left" class="border_bottom_left"><select name="scat_id_<?php echo $num; ?>" class="body_text" id="scat_id_<?php echo $num; ?>">
                              <option value="">Select MCategory</option>
                              <?php maincategory("");?>
                            </select>
  
  
  
  
  
  </td>
  <td width="130" align="left" class="border_bottom_left"><select name="cat_id_<?php echo $num; ?>" class="body_text" id="cat_id_<?php echo $num; ?>">
                              <option value="">Select Category</option>
                              <?php category("");?>
                            </select></td>
  <td width="130" align="left" class="border_bottom_left"><input name="s_id_<?php echo $num; ?>" type="text" class="body_text" id="s_id_<?php echo $num; ?>" size="15"/></td>
  <td width="350" align="left" class="border_bottom_left"><input name="service_<?php echo $num; ?>" type="text" class="body_text" id="service_<?php echo $num; ?>" size="50" /></td>
  <td width="125" align="right" class="border_bottom_left_right"><input name="price_<?php echo $num; ?>" type="text" class="body_text" id="price_<?php echo $num; ?>" size="10" style="text-align:right" /></td>
  <td width="25" align="center"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="delete_div('service_div_<?php echo $num; ?>')"></td>
</tr>
</table>
<div id="service_div_<?php echo ($num+1); ?>"></div>