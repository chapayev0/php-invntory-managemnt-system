
<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';


$user_id=$_SESSION['user_id'];
$current_date=date('Y-m-d');
$current_time=date('g:i A');
 $st_id=$_POST['st_id'];



 $query_bill="SELECT 
		tbl_bill.bill_id,
		tbl_bill.menu_price,
		tbl_bill.menu_name,
		tbl_bill.address,
		tbl_bill.bill_date,
		tbl_bill.getname,
		tbl_bill.ini,
		tbl_bill.cl_name,
		step_bill.name,
		step_bill.pay,
		step_bill.nic,
		step_bill.date,
		step_bill.pay,
		step_bill.address
		
		
FROM tbl_bill LEFT JOIN step_bill  ON tbl_bill.bill_id=step_bill.bill_id WHERE tbl_bill.bill_status ='0' AND step_bill.st_id=$st_id   ORDER BY st_id";
$result_bill=mysql_query($query_bill) or die("Unable to select data from the tbl_bill. ".mysql_error());
$row_bill=mysql_fetch_assoc($result_bill);


$query_bill1="SELECT * FROM tbl_message ";
$result_bill1=mysql_query($query_bill1) or die("Unable to select data from the tbl_message. ".mysql_error());
$row_bill1=mysql_fetch_assoc($result_bill1);

//echo $cash=$row_bill[$_GET['cash']];
//$credit=$row_bill[$_GET['cash']];





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RD System</title>
<style type="text/css">
body {
	background-position: left top;
	background-repeat:repeat-y;
	margin:0px;
}
table#tab {
	margin-left:13px;
	margin-top:30px;
	font-size:14px;
	vertical-align:top;
	font-family:Verdana, Geneva, sans-serif;
}
table#payementtable{
	margin-left:13px;
	margin-top:5px;
	font-size:14px;
	vertical-align:top;
	font-family:Verdana, Geneva, sans-serif;
}
table tr td {
	vertical-align: top;
	font-weight: bold;
}
#tot {
	border-top-width: 1px;
	border-top-style: solid;
	border-top-color: #000;
}

#tTitle td {
	border: 1px solid #333;
}
#trow td {
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-right-style: solid;
	border-left-style: solid;
	border-top-color: #333;
	border-right-color: #333;
	border-bottom-color: #333;
	border-left-color: #333;
	line-height: 25px;
}

#tlrow td {
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-color: #333;
	border-right-color: #333;
	border-bottom-color: #333;
	border-left-color: #333;
	border-top-style: solid;
}
</style>
<style type="text/css" media="print"> 
    @page{
    margin-left: 0px;
    margin-right: 0px;
    margin-top: 0px;
    margin-bottom: 0px;
}
body {
	background-image:none;
}


#tab tr td strong {
	font-size: 18px;
}
</style>

</head>

<body>
<table width="700" border="0" cellspacing="0" cellpadding="0" id="tab" >
  
  <tr>
      <td align="left">&nbsp;</td>
      <td colspan="5" align="center"><strong><h1>DILINI ENTERPRISES</h1></strong></td>
      <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Head Offices</td>
    <td colspan="4" align="left">&nbsp;</td>
    <td align="left">Branch</td>
    <td align="left">Bill No:<?php echo $row_bill['bill_id']  ?></td>
  </tr>
  <tr>
    <td colspan="5" align="left"><?php echo $row_bill1["address1"]; ?></td>
    <td colspan="2" align="left"><?php echo $row_bill1["address2"]; ?></td>
  </tr>
  <tr>
    <td align="left">Tel:<?php echo $row_bill1["tel1"]; ?></td>
    <td colspan="4" align="left">&nbsp;</td>
    <td align="left">Tel:<?php echo $row_bill1["tel2"]; ?></td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td colspan="5" align="center">භාණ්ඩ අලෙවිය පිළිබද පාරිබෝගිකයා හා ආයතන ගිවිසුම </td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
   
    <td align="left">&nbsp;</td>
    <td colspan="4" align="left">&nbsp;</td>
    <td width="137" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">පාරිබෝගිකයාගේ නම</td>
    <td colspan="3" align="left">:<?php echo $row_bill["name"]; ?></td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">ජා. හැදුනුම්පත් අංකය</td>
    <td colspan="3" align="left">:<?php echo $row_bill["nic"]; ?></td>
    <td colspan="2" align="right">ලබාගත් භාණ්ඩ  වර්ගය</td>
    <td align="left">:<?php echo $row_bill["menu_name"]; ?></td>
  </tr>
  <tr>
    <td align="left">ලිපිනය</td>
    <td colspan="3" align="left">:    <?php echo $row_bill["address"]; ?></td>
    <td align="center">&nbsp;</td>
    <td width="137" align="right">අලෙවිකරණ දිනය </td>
    <td align="left">:<?php echo $row_bill["bill_date"]; ?></td>
  </tr>
  <tr>
    <td align="left"> බාරගන්නාගේ නම</td>
    <td colspan="3" align="left">:<?php echo $row_bill["getname"]; ?></td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">වටිනාකම</td>
    <td colspan="3" align="left">:<?php echo $row_bill["menu_price"]; ?></td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left"> ආරම්භයේදී  ගෙවන මුදල</td>
    <td colspan="3" align="left">:<?php echo $row_bill["ini"]; ?></td>
    <td align="center">&nbsp;</td>
    <td width="137" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr id="tTitle">
    <td width="130">දිනය </td>
    <td colspan="3" align="center">ලබාගත් මුදල</td>
    <td width="100" align="center">පාරිබෝගික අත්සන </td>
    <td width="60" align="center">අයකැමි 
    අත්සන </td>
    <td width="109" align="center">විස්තර </td>
    
  </tr>
  
 <?php 









 ?>
  <tr id="trow">
    <td width="130"><?php echo $row_bill["bill_date"]; ?></td>
    <td height="16" colspan="3" align="center"><?php echo $row_bill["pay"]; ?></td>
    <td width="100" align="center" >&nbsp;</td>
    <td width="60" align="right" >&nbsp;</td>
    <td width="109" align="right" >&nbsp;</td>
  </tr>
  
   
  <tr id="tlrow">
    <td width="130">&nbsp;</td>
    <td width="106" height="19" align="center">&nbsp;</td>
    <td width="5" align="left" >&nbsp;</td>
    <td width="60" align="left" >&nbsp;</td>
    <td width="100" align="left" >&nbsp;</td>
    <td width="60" align="right" >&nbsp;</td>
    <td width="109" align="right" >&nbsp;</td>
  </tr>  
      
      
      
  <tr id="tot" align="left">
    <td colspan="9"><table width="100%" border="0" cellpadding="0" cellspacing="0" id="payementtable">
      <tr style="text-align:right;font-weight:700;">
        <td width="443" align="left" >&nbsp;</td>
        </tr>
      <tr style="text-align:right;">
        <td >&nbsp;</td>
        </tr>
  </table>
    </td>
  </tr>
  
  
  
  <tr>
    <td colspan="9">......................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;........&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..............&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...............</td>
  </tr>
  <tr>
    <td colspan="9">පාරිබෝගික අත්සන &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;දිනය &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ආ.නි.අත්සන &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ආ. ප්‍ර.අත්සන  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Developed by RD System<b></td>
  </tr>
     

  
</table>
</body>
</html>
