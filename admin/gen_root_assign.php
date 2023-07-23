<?php 
require_once '../library/config.php';
require_once '../library/functions.php';
$num=$_REQUEST['num'];

?>
<table width="999" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="25" height="25" align="center"><img src="../images/add.png" width="16" height="16" style="cursor:pointer" onclick="gen_service('service_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');$('#count_item').val(<?php echo ($num+1); ?>);"/></td>
  <td width="197" align="left" class="border_bottom_left"><input name="p_id_<?php echo $num; ?>" type="text" class="body_text" id="p_id_<?php echo $num; ?>" 
                          size="15" 
                          onfocus="menu_id('item_1','item_id_1','price_1','p_id_1','qty_div_1',
                          $('#qty_1').val(),'p_no_1','qty_1');" onkeydown="set_cursor(event,'qty_1');"/></td>
  <td width="145" align="left" class="border_bottom_left"><input name="item_<?php echo $num; ?>" type="text" class="body_text" id="item_<?php echo $num; ?>" size="20" onfocus="menu('item_1','item_id_1','price_1','p_id_1','qty_div_1',$('#qty_1').val
                          (),'p_no_1','qty_1');"/></td>
  <td width="124" align="left" class="border_bottom_left"><input name="qty_<?php echo $num; ?>" type="text" class="body_text" id="qty_<?php echo $num; ?>" size="20" onfocus="menu('item_1','item_id_1','price_1','p_id_1','qty_div_1',$('#qty_1').val
                          (),'p_no_1','qty_1');"/></td>
  <td width="338" align="left" class="border_bottom_left"><input name="price_<?php echo $num; ?>" type="text" class="body_text" id="price_<?php echo $num; ?>" size="30" /></td>
  <td width="145" align="right" class="border_bottom_left_right"><input name="amount_<?php echo $num; ?>" type="text" class="body_text" id="amount_<?php echo $num; ?>" size="10" style="text-align:right" /></td>
  <td width="25" align="center"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="delete_div('service_div_<?php echo $num; ?>')"></td>
</tr>
</table>
<div id="service_div_<?php echo ($num+1); ?>"></div>