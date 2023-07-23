<?php 
require_once '../library/config.php';

 $grn_id=$_REQUEST['grn_id'];

	$query_order="SELECT * FROM tbl_grn WHERE grn_id='$grn_id'";
	$result_order=mysqli_query($connection,$query_order) or die("Unable to select data from the tbl_grn. ".mysqli_error());
	$row_order=mysqli_fetch_assoc($result_order);


$query_drug="SELECT * FROM tbl_stock WHERE grn_id='$grn_id'";
$result_drug=mysqli_query($connection,$query_drug) or die("Unable to select data from the tbl_drugs. ".mysqli_error());
$tpayment=0;
$tout=0;
$tamt=0;
if(mysql_num_rows($result_drug) != 0){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock Report</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body onload="window.print();">
    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="25" colspan="4" align="left" class="body_text">Date : <?php echo $row_order['grn_date']; ?></td>
      </tr>
      <tr class="body_text">
        <td width="100" height="25" align="center" class="border_top_bottom_left">Item Name</td>
        <td width="100" align="center" class="border_top_bottom_left"><strong>Cost Price</strong></td>
        <td width="100" align="center" class="border_top_bottom_left"><strong>Qty</strong></td>
        <td width="100" align="center" class="border_top_bottom_left_right">Amount</td>
      </tr>
    <?php
        while($row_drug=mysql_fetch_array($result_drug)){
			$tamt+=$row_drug["amount"];
			
                ?>
        <tr class="body_text" onmouseover="this.style.backgroundColor='#D3E4F1';" onmouseout="this.style.backgroundColor='';">
        <td height="20" align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug["p_name"]; ?></td>
        <td align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug["st_price"]; ?></td>
        <td align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug["st_qty"]; ?></td>
        <td align="right" class="border_bottom_left_right" style="padding-right:3pt;"><?php echo $row_drug["amount"]; ?></td>
      </tr> <?php	
        }
    ?>
        <tr class="body_text" onmouseover="this.style.backgroundColor='#D3E4F1';" onmouseout="this.style.backgroundColor='';">
          <td height="20" align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">Total</td>
          <td align="right" class="border_bottom_left_right" style="padding-right:3pt;"><?php echo $tamt; ?></td>
        </tr>
        <tr>
        <td height="20">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
</table>
    <?php
    }else{
    ?>
<div class="red_text">No records found</div>
    <?php
    }
    ?>
</body>
</html>
<?php 
require_once '../library/close.php';
?>