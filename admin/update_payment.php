<?php 
require_once '../library/config.php';



$idKapuwa=$_POST['id'];

function total($k_id){
	$query_user="SELECT SUM(rec_amount)  FROM tbl_reciept WHERE `id_kapuwa`='$k_id' AND paid='0'";
	$result_user=mysql_query($query_user) or die("Unable to select data from the tbl_user. ".mysql_error());
	$row_user=mysql_fetch_row($result_user);
	return $row_user[0];
}

function per($k_id){
	$query_user="SELECT k_persentage  FROM tbl_kapuwa WHERE `k_id`='$k_id'";
	$result_user=mysql_query($query_user) or die("Unable to select data from the tbl_user. ".mysql_error());
	$row_user=mysql_fetch_row($result_user);
	return $row_user[0];
}





 $kapuwa_result = mysql_query("SELECT *  FROM `tbl_kapuwa` WHERE `k_id`='$idKapuwa'") or die(mysql_error());
 $kapuwa_data = mysql_fetch_assoc($kapuwa_result);

 ?>

<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
	
	<tr class="body_text" >
	  <td height="35" align="right">Name</td>
	  <td align="center">:</td>
	  <td align="left"><?php echo $kapuwa_data['k_name']; ?>
      <input name="kapu_nic" id="kapu_nic" type="hidden" value="<?php echo $kapuwa_data['k_name']; ?>" /></td>
  </tr>
	<tr class="body_text" >
	  <td width="300" height="35" align="right">NIC</td>
	  <td width="100" align="center">:</td>
	  <td align="left"><?php echo $kapuwa_data['k_nic']; ?>
      
      
      </td>
  </tr>
	<tr class="body_text" >
	  <td width="300" height="35" align="right">Percentage %</td>
	  <td width="100" align="center">:</td>
	  <td align="left">
      <input name="kapu_id2" id="kapu_id2" type="hidden" value="<?php echo $kapuwa_data['k_persentage']; ?>" />
      <input name="per" type="text" id="per"  value="<?php echo $kapuwa_data['k_persentage']; ?>" size="5" /></td>
  </tr>
	<tr class="body_text" >
	  <td width="300" height="35" align="right">Address</td>
	  <td width="100" align="center">:</td>
	  <td align="left"><?php echo $kapuwa_data['k_address']; ?>
      <input name="kapu_id3" id="kapu_nic3" type="hidden" value="<?php echo $kapuwa_data['k_address']; ?>" /></td>
  </tr>
	<tr class="body_text" >
	  <td width="300" height="35" align="right">Telephone</td>
	  <td width="100" align="center">:</td>
	  <td align="left"><?php echo $kapuwa_data['k_tel']; ?>
      <input name="kapu_id4" id="kapu_nic4" type="hidden" value="<?php echo $kapuwa_data['k_tel']; ?>" /></td>
  </tr>
	<tr class="body_text" >
	  <td height="35" align="right">Reciepts Details</td>
	  <td align="center">:</td>
	  <td align="left">
	    <label for="total"></label>
      <input type="text" name="total" id="total" onkeyup="cal_total();"/ /></td>
      
     
      
  </tr>
	<tr class="body_text" >
	  <td height="35" align="right">Chanter Amount</td>
	  <td align="center">:</td>
	  <td align="left"><input type="text" name="chanter" id="chanter"  onkeyup="cal_total();"//></td>
  </tr>
	<tr class="body_text" >
	  <td height="35" align="right">Temple Amount</td>
	  <td align="center">:</td>
	  <td align="left"><input type="text" name="temple" id="temple" /></td>
  </tr>
	<tr class="body_text" >
	  <td height="35" align="right">&nbsp;</td>
	  <td align="right">ගෙවන ලදී <br /></td>
	  <td align="left"><img src="../images/paid.png" width="65" height="35" id="add" style="cursor:pointer" onclick="formSubmit()"/></td>
  </tr>
</table>
</form>


<?php	
require_once '../library/close.php';
?>
