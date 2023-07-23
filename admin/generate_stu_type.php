<?php 
$num=$_REQUEST['num'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="50" height="25" align="center"><img src="../images/add.png" width="16" height="16" style="cursor:pointer" onclick="gen_student_type('tp_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');$('#count_item').val(<?php echo ($num+1); ?>);"/></td>
  <td width="250" align="center" class="border_bottom_left"><input name="stu_tp_<?php echo $num; ?>" type="text" class="body_text" id="stu_tp_<?php echo $num; ?>" size="35" style="text-align:left"/></td>
  <td width="100" align="center" class="border_bottom_left_right"><input name="bk_no_<?php echo $num; ?>" type="text" class="body_text" id="bk_no_<?php echo $num; ?>" size="10" style="text-align:right"/></td>
  <td width="50" align="center"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="del_div('tp_div_<?php echo $num; ?>');"></td>
</tr>
</table>
<div id="tp_div_<?php echo ($num+1); ?>"></div>