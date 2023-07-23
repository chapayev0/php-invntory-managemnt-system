
<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';


$user_id=$_SESSION['user_id'];
$current_date=date('Y-m-d');
$current_time=date('g:i A');
$bill_id=$_POST['bill_id'];
//$stward_name =$_POST['st_name'];

$bill_id=$_POST['bill_id'];
$query_bill="SELECT * FROM tbl_bill WHERE bill_id='$bill_id' AND bill_status='0'";
$result_bill=mysqli_query($connection,$query_bill) or die("Unable to select data from the tbl_bill. ".mysqli_error());
$row_bill=mysqli_fetch_assoc($result_bill);

$query_bill1="SELECT * FROM tbl_message ";
$result_bill1=mysqli_query($connection,$query_bill1) or die("Unable to select data from the tbl_message. ".mysqli_error());
$row_bill1=mysqli_fetch_assoc($result_bill1);



$sold_item=0;
$query_item_count="SELECT * FROM tbl_bill_menu WHERE bill_id='$bill_id' ";
$result_item_count=mysqli_query($connection,$query_item_count) or die("Unable to select data from the tbl_bill_menu. ".mysqli_error());


//echo $cash=$row_bill[$_GET['cash']];
//$credit=$row_bill[$_GET['cash']];


function getvname($veh_id){
	$query_user="SELECT veh_name FROM tbl_veh WHERE veh_id=$veh_id";
	$result_user=mysqli_query($connection,$query_user) or die("Unable to select data from the tbl_userjj. ".mysqli_error());
	$row_user=mysqli_fetch_row($result_user);
	return $row_user[0];
	}	

function getclname($veh_id){
	$query_user="SELECT tbl_client.cl_name
FROM tbl_client
INNER JOIN tbl_veh ON tbl_veh.cl_id = tbl_client.cl_id
where tbl_veh.veh_id ='$veh_id'";
	$result_user=mysqli_query($connection,$query_user) or die("Unable to select data from the tbl_user. ".mysqli_error());
	$row_user=mysqli_fetch_row($result_user);
	return $row_user[0];
	}

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
    <td colspan="5" align="center"><h3>භාණ්ඩ අලෙවිය පිළිබද පාරිබෝගිකයා හා ආයතන ගිවිසුම </h3></td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">පාරිබෝගිකයාගේ නම</td>
    <td colspan="3" align="left">:<?php echo $row_bill["cl_name"]; ?></td>
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
    <td width="137" align="center">අයකැමි 
    අත්සන </td>
    <td width="109" align="center">විස්තර </td>
    
  </tr>
  
 <?php $count=0;
$gross_amount=0;
$p_discount=0;
$query_item="SELECT * FROM tbl_bill_menu WHERE bill_id='$bill_id'";
$result_item=mysqli_query($connection,$query_item) or die("Unable to select data from the tbl_bill_menu. ".mysqli_error());



$sold_item=0;
$query_item_count="SELECT COUNT(bill_menu_id) as count FROM tbl_bill_menu WHERE bill_id='$bill_id'";
$result_item_count=mysqli_query($connection,$query_item_count) or die("Unable to select data from the tbl_bill_menu. ".mysqli_error());
while($row_item_count=mysqli_fetch_assoc($result_item_count)){
	$sold_item=$row_item_count['count'];
}



$vat_query="SELECT vat_rate FROM tbl_bill_menu WHERE bill_id='$bill_id'";
$result_vat=mysqli_query($connection,$vat_query) or die("Unable to select data from table bill menu".mysqli_error());
$row_vat=mysqli_fetch_assoc($result_vat);


$i=0;
while($row_item=mysqli_fetch_assoc($result_item)){
	$item_id=$row_item["menu_id"];
	$dis_price="";
	//$sold_item +=$row_item["bill_menu_qty"];
	
	
	$count++;
	$gross_amount +=round(($row_item["menu_price"]*$row_item["bill_menu_qty"]),2);
	$p_discount +=round(($row_item["bill_menu_discount"]*$row_item["bill_menu_qty"]),2);
	

 ?>
  <tr id="trow">
    <td width="130"><?php echo $row_bill["bill_date"]; ?></td>
    <td height="16" colspan="3" align="center"><?php echo $row_bill["ini"]; ?></td>
    <td width="100" align="center" >...............</td>
    <td width="137" align="center" >......................</td>
    <td width="109" align="right" >&nbsp;</td>
  </tr>
  
  <?php
  $i=$i+1;
  
  if($i==18){
	  for($l=0;$l<18;$l++){ //change br lines
	  ?>
   
      <?php
	  }
	  
	  $i=0;
  }
  
?>

      <?php

	
  

}

	
	 ?>
          
  <tr id="tlrow">
    <td width="130">&nbsp;</td>
    <td width="106" height="19" align="center">&nbsp;</td>
    <td width="5" align="left" >&nbsp;</td>
    <td width="60" align="left" >&nbsp;</td>
    <td width="100" align="left" >&nbsp;</td>
    <td width="137" align="right" >&nbsp;</td>
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
