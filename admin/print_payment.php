<?php 
require_once '../library/config.php';

$data="";
if($_REQUEST['name'] != ""){
	if($data == ""){
		$data=" AND cus_name  LIKE '".$_REQUEST['name']."%'";
	}else{
		$data .=" AND cus_name  LIKE '".$_REQUEST['name']."%'";
	}
}


if($_REQUEST['f_date'] != "" && $_REQUEST['t_date']){ 
	if($data == ""){
		$data=" AND date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}else{
		$data .=" AND date BETWEEN '".$_REQUEST['f_date']."' AND '".$_REQUEST['t_date']."'";
	}
}

if($_REQUEST['type'] != ""){
	if($data == ""){
		$data=" AND type='".$_REQUEST['type']."'";
	}else{
		$data .=" AND type='".$_REQUEST['type']."'";
	}
}

$query_drug="SELECT * FROM tbl_payment WHERE p_status='0' $data ORDER BY pay_id";
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
<title>Payment Report</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body onload="window.print();">
    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="25" colspan="6" align="left" class="body_text">  Date : <?php echo date('Y/m/d'); ?></td>
      </tr>
      <tr class="body_text">
        <td width="75" height="34" align="center" class="border_top_bottom_left"><strong> Bill No</strong></td>
        <td width="82" align="center" class="border_top_bottom_left">InV NO</td>
        <td width="136" align="center" class="border_top_bottom_left">Name</td>
        <td width="136" align="center" class="border_top_bottom_left"><strong>Date</strong></td>
        <td width="65" align="center" class="border_top_bottom_left">Amount</td>
        <td width="85" align="center" class="border_top_bottom_left_right"><strong>Type</strong></td>
      </tr>
    <?php
        while($row_drug=mysql_fetch_array($result_drug)){
			//$tamt+=$row_drug[5];
			//$tpayment+=$row_drug[12];
			//$tout+=($row_drug[15]+$row_drug[5]-$row_drug[12]);
                ?>
        <tr class="body_text" onmouseover="this.style.backgroundColor='#D3E4F1';" onmouseout="this.style.backgroundColor='';">
        <td height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_drug["bill_id"]; ?></td>
        <td align="left" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug["inv_no"]; ?></td>
        <td align="left" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug["cus_name"]; ?></td>
        <td align="left" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug["date"]; ?></td>
        <td align="left" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_drug["amount"]; ?></td>
        <td align="right" class="border_bottom_left_right" style="padding-right:3pt;"><?php echo $row_drug["type"]; ?></td>
      </tr> <?php	
        }
    ?>
        <tr>
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