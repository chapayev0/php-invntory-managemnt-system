<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$num=$_REQUEST['num'];
?>
<div id="qty_div_<?php echo $num; ?>" class="red_text" align="center"></div>
<table width="893" border="0" cellspacing="0" cellpadding="0">
<tr class="body_text">
  <td width="28" height="25" align="center"><img src="../images/add.png" width="16" height="16" style="cursor:pointer" onclick="gen_item('item_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');$('#count_item').val(<?php echo ($num+1); ?>);"/></td>
  
  <td width="231" align="left" class="border_bottom_left">
  <input name="item_<?php echo $num; ?>" type="text" class="body_text" id="item_<?php echo $num; ?>" size="30" onfocus="menu('item_<?php echo $num; ?>','price_<?php echo $num; ?>','name_<?php echo $num; ?>','war_<?php echo $num; ?>','p_id_<?php echo $num; ?>','qty_div_<?php echo $num; ?>',$('#qty_<?php echo $num; ?>').val(),'p_no_<?php echo $num; ?>','qty_<?php echo $num; ?>');"/>
  <input name="item_id_<?php echo $num; ?>" type="hidden" value="" id="item_id_<?php echo $num; ?>"/>
  </td>
  <td width="193" align="right" class="border_bottom_left"><input name="name_<?php echo $num; ?>" type="text" class="body_text" id="name_<?php echo $num; ?>" size="30" onkeyup="cal_total();check_stock('qty_div_<?php echo $num; ?>',$('#item_id_<?php echo $num; ?>').val(),$('#qty_<?php echo $num; ?>').val(),$('#item_<?php echo $num; ?>').val(),'qty_<?php echo $num; ?>');" style="text-align:right" onkeydown="gen_new_item(event,'item_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');"/></td>
  <td width="120" align="right" class="border_bottom_left"><input name="qty_<?php echo $num; ?>" type="text" class="body_text" id="qty_<?php echo $num; ?>" size="10" onkeyup="cal_total();check_stock('qty_div_<?php echo $num; ?>',$('#item_id_<?php echo $num; ?>').val(),$('#qty_<?php echo $num; ?>').val(),$('#item_<?php echo $num; ?>').val(),'qty_<?php echo $num; ?>');" style="text-align:right" onkeydown="gen_new_item(event,'item_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');"/></td>
  <td width="98" align="right" class="border_bottom_left"><input name="price_<?php echo $num; ?>" type="text" class="body_text" id="price_<?php echo $num; ?>" style="text-align:right" size="10"  />  </td>
  <td width="53" align="right" class="border_bottom_left"><input name="war_<?php echo $num; ?>" type="text" class="body_text" id="war_<?php echo $num; ?>" style="text-align:right" size="10"  /></td>
  <td width="53" align="right" class="border_bottom_left"><input name="discount_<?php echo $num; ?>" type="text" class="body_text" id="discount_<?php echo $num; ?>" style="text-align:right" size="4" onkeyup="cal_total();" onkeydown="gen_new_item(event,'item_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');" /></td>
  
  <td width="86" align="right" class="border_bottom_left_right"><input name="amount_<?php echo $num; ?>" type="text" class="body_text" id="amount_<?php echo $num; ?>" style="text-align:right" size="10" readonly="readonly"/></td>
  
  <td width="31" align="center"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="del_div('item_div_<?php echo $num; ?>');"></td>
</tr>
</table>
<div id="item_div_<?php echo ($num+1); ?>"></div>