<?php 
require_once '../library/config.php';

 $bill_id=$_REQUEST['bill_id'];

	$query_order="SELECT tbl_charity.c_name, tbl_charity.cus_id, tbl_charity.section, tbl_bill.bill_time, tbl_bill.bill_date, tbl_bill.total, tbl_bill.bill_id, tbl_bill.bill_time, tbl_bill.activity_status, tbl_charity.etf, tbl_charity.c_id, tbl_bill.pay_date, SUM( tbl_payment.amount ),tbl_bill.inv_no,tbl_bill.bill_discount,tbl_bill.inv_no,tbl_bill.po,tbl_bill.pay_type,tbl_charity.address
FROM tbl_bill
LEFT JOIN tbl_charity ON tbl_bill.c_id = tbl_charity.c_id
LEFT JOIN tbl_payment ON tbl_bill.bill_id = tbl_payment.bill_id
WHERE tbl_bill.bill_status = '0' and tbl_payment.c_status='1'  and tbl_bill.bill_id='$bill_id'
";
	$result_order=mysql_query($query_order) or die("Unable to select data from the tbl_grn. ".mysql_error());
	$row_order=mysql_fetch_assoc($result_order);


$query_drug="SELECT * FROM tbl_bill_menu WHERE bill_id='$bill_id'";
$result_drug=mysql_query($query_drug) or die("Unable to select data from the tbl_drugs. ".mysql_error());
$tpayment=0;
$tout=0;
$tamt=0;
if(mysql_num_rows($result_drug) != 0){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bill</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.body_text .border_bottom_left_right {
	font-size: 10pt;
}
</style>
</head>

<body onload="window.print();">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="25" colspan="10" align="center" class="body_text" style="font-size:42px">HDK   IT</td>
      </tr>
      <tr>
        <td height="25" colspan="10" align="center" class="body_text" style="font-size:20px">New Town Road - Embilipitiya</td>
      </tr>
      <tr>
        <td height="25" colspan="10" align="center" class="body_text" style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel 047-4545606, 077-9506300, 071-3501990</td>
      </tr>
      <tr>
        <td height="25" colspan="5" align="left" class="body_text">&nbsp;</td>
        <td height="25" colspan="5" align="left" class="body_text">&nbsp;</td>
      </tr>
      <tr>
        <td height="25" colspan="5" align="left" class="body_text">&nbsp;</td>
        <td height="25" colspan="5" align="left" class="body_text">&nbsp;</td>
      </tr>
      <tr>
        <td height="25" colspan="5" align="left" class="body_text">Name   : <?php echo $row_order['c_name']; ?></td>
        <td height="25" colspan="5" align="left" class="body_text"> Invoice No : <?php echo $row_order['bill_id']; ?></td>
      </tr>
      <tr>
        <td height="25" colspan="5" align="left" class="body_text">Address :<?php echo $row_order['address']; ?></td>
        <td height="25" colspan="5" align="left" class="body_text">Date  :<?php echo $row_order['bill_date']; ?></td>
      </tr>
      <tr>
        <td height="25" colspan="5" align="left" class="body_text">Telephone  :<?php echo $row_order['section']; ?></td>
        <td height="25" colspan="5" align="left" class="body_text">PO :<?php echo $row_order['po']; ?></td>
      </tr>
      <tr>
        <td height="25" colspan="5" align="left" class="body_text">&nbsp;</td>
        <td height="25" colspan="5" align="left" class="body_text">Pay Type :<?php echo $row_order['pay_type']; ?></td>
      </tr>
      <tr class="body_text">
        <td width="131" align="center" class="border_top_bottom_left"><p>Code</p></td>
        <td width="209" height="25" align="center" class="border_top_bottom_left">Item Name</td>
        <td width="78" align="center" class="border_top_bottom_left">Warranty</td>
        <td width="128" align="center" class="border_top_bottom_left"><strong> Price</strong></td>
        <td width="143" align="center" class="border_top_bottom_left"><strong>Qty</strong></td>
        <td width="71" align="center" class="border_top_bottom_left">Dis(%)</td>
        <td width="140" align="center" class="border_top_bottom_left_right">Amount</td>
      </tr>
    <?php
        while($row_drug=mysql_fetch_array($result_drug)){
			$tamt+=$row_drug["total"]-$row_drug["total"]*$row_drug["dis"]/100; ;
			
                ?>
        <tr class="body_text" onmouseover="this.style.backgroundColor='#D3E4F1';" onmouseout="this.style.backgroundColor='';">
          <td align="left" class="border_bottom_left" style="padding-right: 3pt; font-size: 10pt;"><?php echo $row_drug["menu_name"]; ?></td>
        <td height="20" align="left" class="border_bottom_left" style="padding-right: 3pt; font-size: 10pt;"><?php echo $row_drug["name"]; ?></td>
        <td align="right" class="border_bottom_left" style="padding-right: 3pt; font-size: 10pt;"><?php echo $row_drug["war"]; ?></td>
        <td align="right" class="border_bottom_left" style="padding-right: 3pt; font-size: 10pt;"><?php echo $row_drug["menu_price"]; ?></td>
        <td align="right" class="border_bottom_left" style="padding-right: 3pt; font-size: 10pt;"><?php echo $row_drug["bill_menu_qty"]; ?></td>
        <td align="right" class="border_bottom_left" style="padding-right: 3pt; font-size: 10pt;"><?php echo $row_drug["dis"]; ?></td>
        <td align="right" class="border_bottom_left_right" style="padding-right: 3pt; font-size: 10pt;"><?php echo $row_drug["total"]-$row_drug["total"]*$row_drug["dis"]/100; ?></td>
      </tr> <?php	
        }
    ?>
        <tr class="body_text" onmouseover="this.style.backgroundColor='#D3E4F1';" onmouseout="this.style.backgroundColor='';">
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td height="20" align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right: 3pt; font-size: 10pt;">Dis(%)</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left_right" style="padding-right:3pt;"><?php echo $row_order['bill_discount']; ?></td>
        </tr>
        <tr class="body_text" onmouseover="this.style.backgroundColor='#D3E4F1';" onmouseout="this.style.backgroundColor='';">
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td height="20" align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right: 3pt; font-size: 10pt;"> Total</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left_right" style="padding-right:3pt;"><?php echo ($tamt-$row_order['bill_discount']*$tamt/100);?></td>
        </tr>
       
        <tr>
          <td>&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="20" colspan="7">Warranty Period One Year Less14 Working Days</td>
        </tr>
        <tr>
          <td height="20" colspan="3">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="20" colspan="7">Warranty covers only manufactures's defects.Damage or defected due to other causes such as negligences,misuses,improper operation,power fluctuation,lighting or other natural disasters,sabotage or accident ect.</td>
        </tr>
        <tr>
          <td height="20" colspan="7">No warranty for :key board,Mouse,Speakers,Power adaptors,Toners,Ink cartridges,Printer heads for other item if there is BURN MARKS,PHYSICAL DAMAGES and CORROSION No warranty.</td>
        </tr>
        <tr>
          <td height="20" colspan="7">Goods ones sold are not returnable under any cirumstances</td>
        </tr>
        <tr>
          <td height="20" colspan="7">Cheques to be written in favour HDK IT (PVT) LTD</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="20" colspan="7" align="center">PLEASE SUBMIT THE INVOICE FOR WARRANTY CLAIMS</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="20" colspan="4">........................................................................</td>
          <td colspan="3" align="center">. ...........................................................................</td>
        </tr>
        <tr>
          <td height="20" colspan="4" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HDK IT (PVT) LTD</td>
          <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Goods Received in Good Condition</td>
  </tr>
        <tr>
          <td height="20" colspan="4" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorized Signature</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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