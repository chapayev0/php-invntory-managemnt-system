<?php 
require_once '../library/config.php';

$data="";
if($_POST['date'] != ""){
	$data=" AND tbl_bill_menu.date  BETWEEN '".$_REQUEST['date']."' AND '".$_REQUEST['date2']."'";
}


$pro=0;
 $query_drug="SELECT tbl_bill_menu.name, tbl_bill_menu.menu_name, 
 tbl_bill_menu.menu_price, tbl_bill_menu.menu_price, tbl_bill_menu.bill_menu_qty,tbl_product.cprice,tbl_bill_menu.date
FROM tbl_bill_menu
LEFT JOIN tbl_product ON tbl_bill_menu.menu_name = tbl_product.p_code
WHERE tbl_bill_menu.menu_status = '0'  $data
ORDER BY tbl_bill_menu.bill_menu_id";
$result_drug=mysqli_query($connection,$query_drug) or die("Unable to select data from the tbl_bill_menu. ".mysqli_error());
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
    <table width="840" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="26" align="center" colspan="3" >&nbsp;</td>
    <td align="center" >&nbsp;</td>
    <td align="center" >&nbsp;</td>
    <td align="center" >&nbsp;</td>
    <td align="center" ><form action="print_day_items.php" method="post" name="stock_form" target="_blank" id="stock_form">
       <input name="date" id="date" type="hidden" value="<?php echo $_REQUEST['date']; ?>" />
       <input name="date2" id="date2" type="hidden" value="<?php echo $_REQUEST['date2']; ?>" />
    </form></td>
    <td width="5" align="center" >&nbsp;</td>
  </tr>
  <tr>
    <td width="165" align="center" class="tbl_header_right">Code</td>
    <td width="198" height="26" align="center" class="tbl_header_right">Product </td>
    <td width="181" align="center" class="tbl_header_right"> Qty</td>
    <td width="95" align="center" class="tbl_header_right">cost</td>
    <td width="79" align="center" class="tbl_header_right">selling price</td>
    <td width="117" align="center" class="tbl_header_right">Profit</td>
    <td width="117" align="center" class="tbl_header_right"> Date</td>
    
  </tr>
  <?php while($row_recp=mysqli_fetch_assoc($result_drug)){
	  
	   $pro += ($row_recp["menu_price"]-$row_recp["cprice"])*$row_recp["bill_menu_qty"];
  
  
  
  
  
  ?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["menu_name"]; ?></td>
    <td height="21" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["name"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_recp["bill_menu_qty"]; ?></td>
    <td align="left" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_recp["cprice"]; ?></td>
    <td align="left" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_recp["menu_price"]; ?></td>
    <td align="left" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo ($row_recp["menu_price"]-$row_recp["cprice"])*$row_recp["bill_menu_qty"]; ?></td>
    <td align="left" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_recp["date"]; ?></td>
    
  </tr>
   <?php 
   
    }?>
    <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">
    <td align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td height="21" align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
    <td colspan="2" align="center" class="border_bottom_left" style="padding-left:3pt;">Tot Profit</td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $pro; ?></td>
    <td align="left" class="border_bottom_left_right" style="padding-left:3pt;">&nbsp;</td>
    
  </tr>
  <tr>
    <td colspan="19"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      
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