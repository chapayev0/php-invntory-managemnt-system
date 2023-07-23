<?php 
require_once '../library/config.php';

$data="";


if($_POST['bill_id'] != ""){
	$data="  bill_id LIKE '".$_POST['bill_id']."%'";
}

if($_POST['rep'] != ""){
	$data="  and tbl_bill.rep LIKE '".$_POST['rep']."%'";
}

if($_POST['f_date'] != "" && $_POST['t_date']){ 
	if($data == ""){
		$data=" AND tbl_bill.bill_date BETWEEN '".$_POST['f_date']."' AND '".$_POST['t_date']."'";
	}else{
		$data .=" AND tbl_bill.bill_date BETWEEN '".$_POST['f_date']."' AND '".$_POST['t_date']."'";
	}
}

 $query_drug="SELECT tbl_charity.c_name, tbl_charity.cus_id, tbl_charity.section, tbl_bill.bill_time, tbl_bill.bill_date, tbl_bill.ftotal, tbl_bill.bill_id, tbl_bill.bill_time, tbl_bill.activity_status, tbl_charity.etf, tbl_charity.c_id, tbl_bill.pay_date, SUM( tbl_payment.amount ),tbl_bill.inv_no,tbl_bill.tot,SUM(tbl_payment.late_amount),tbl_bill.rep,tbl_charity.address
FROM tbl_bill
LEFT JOIN tbl_charity ON tbl_bill.c_id = tbl_charity.c_id
LEFT JOIN tbl_payment ON tbl_bill.bill_id = tbl_payment.bill_id
WHERE tbl_bill.bill_status = '0' and activity_status='pending' $data
GROUP BY tbl_bill.bill_id
ORDER BY tbl_bill.bill_id";
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
<title>Outstanding Report</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body onload="window.print();">
    <table width="1001" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="25" colspan="10" align="left" class="body_text"><strong>Total Collection Report</strong>  Date : <?php echo date('Y/m/d'); ?></td>
      </tr>
      <tr class="body_text">
        <td width="75" height="34" align="center" class="border_top_bottom_left"><strong> No</strong></td>
        <td width="82" align="center" class="border_top_bottom_left">InV NO</td>
        <td width="99" align="center" class="border_top_bottom_left">Age</td>
        <td width="125" align="center" class="border_top_bottom_left">Rep</td>
        <td width="95" align="center" class="border_top_bottom_left">Date</td>
        <td width="225" align="center" class="border_top_bottom_left"><strong>Customer</strong></td>
        <td width="65" align="center" class="border_top_bottom_left">Address</td>
        <td width="65" align="center" class="border_top_bottom_left">Amount</td>
        <td width="85" align="center" class="border_top_bottom_left">Return</td>
        <td width="85" align="center" class="border_top_bottom_left_right"><strong>Outstanding</strong></td>
      </tr>
    <?php
        while($row_drug=mysql_fetch_array($result_drug)){
			$tamt+=$row_drug[5];
			$tpayment+=$row_drug[12];
			$tout+=($row_drug[15]+$row_drug[5]-$row_drug[12]);
                ?>
        <tr class="body_text" onmouseover="this.style.backgroundColor='#D3E4F1';" onmouseout="this.style.backgroundColor='';">
        <td height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_drug["bill_id"]; ?></td>
        <td align="left" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug["inv_no"]; ?></td>
        <td align="left" class="border_bottom_left" style="padding-right:3pt;"><?php 
	
 $startTimeStamp = strtotime($row_drug["bill_date"]);
 $endTimeStamp = strtotime(date('Y-m-d'));

$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays);
	
	 echo  $numberDays;?></td>
        <td align="left" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug["rep"]; ?></td>
        <td align="left" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug["bill_date"]; ?></td>
        <td align="left" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug[0]; ?></td>
        <td align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug["address"]; ?></td>
        <td align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug[5]; ?></td>
        <td align="right" class="border_bottom_left" style="padding-right:3pt;"><?php
	
	
	 $query_r="SELECT SUM(rqty*menu_price) FROM tbl_bill_menu WHERE bill_id='{$row_drug['bill_id']}'";
	
$result_r=mysql_query($query_r) or die("unable to select data from the tbl_bill".mysql_error());
		$row_r=mysql_fetch_row($result_r);
		 echo  $bill_r=$row_r[0];
		?></td>
        <td align="right" class="border_bottom_left_right" style="padding-right:3pt;"><?php 
		
		$query_r="SELECT SUM(rqty*menu_price) FROM tbl_bill_menu WHERE bill_id='{$row_drug['bill_id']}'";
	
$result_r=mysql_query($query_r) or die("unable to select data from the tbl_bill".mysql_error());
		$row_r=mysql_fetch_row($result_r);
		   $bill_r=$row_r[0];
		
		
		
		echo $row_drug[15]+$row_drug[5]-$row_drug[12]-$bill_r; ?></td>
      </tr> <?php	
        }
    ?>
        <tr class="body_text" onmouseover="this.style.backgroundColor='#D3E4F1';" onmouseout="this.style.backgroundColor='';">
          <td height="20" align="left" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo  number_format((float)$tamt, 2, '.', ''); ?></td>
          <td align="right" class="border_bottom_left_right" style="padding-right:3pt;">&nbsp;</td>
          <td align="right" class="border_bottom_left_right" style="padding-right:3pt;"><?php echo number_format((float)$tout, 2, '.', ''); ?></td>
        </tr>
       
        <tr>
        <td height="20">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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