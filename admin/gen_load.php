<?php 
require_once '../library/config.php';
$num=$_REQUEST['num'];

?>

<link href="../css/style.css" rel="stylesheet" type="text/css">

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="72" height="25" align="center"><img src="../images/add.png" width="14" height="14" onclick="gen_goods('goods_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');$('#item_count').val(<?php echo ($num+1); ?>);" style="cursor:pointer"/></td>
    
    
    <td width="437" align="right" class="border_bottom_left" style="padding-right:2pt;">
   
      <input type="hidden" name="goods_id_<?php echo $num; ?>" id="goods_id_<?php echo $num; ?>" />
     
      <input name="goods_<?php echo $num; ?>" type="text" class="body_text" id="goods_<?php echo $num; ?>" size="50" onfocus="load_ingre_goods('goods_<?php echo $num; ?>','goods_id_<?php echo $num; ?>');"/>
   </td>
    
   
    
    <td width="254" align="right" class="border_bottom_left_right" style="padding-right:2pt;"><input name="qty_<?php echo $num; ?>" type="text" class="body_text" id="qty_<?php echo $num; ?>" size="10" onkeyup="calc_total('price_<?php echo $num; ?>','qty_<?php echo $num; ?>','amount_<?php echo $num; ?>');"/></td>
    
   
    
    <td width="37" align="center"><img src="../images/delete.png" width="10" height="10" onclick="del_div('goods_div_<?php echo $num; ?>');$('#item_count').val(<?php echo $num-1 ?>);" style="cursor:pointer" /></td><?php /*?>del_div() function eka charge.js eke liya atha.<?php */?>
  </tr>
</table>
<div id="goods_div_<?php echo ($num+1); ?>"></div>

