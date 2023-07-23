<?php 
require_once '../library/config.php';
$current_date=date('Y-m-d');



$data="";
if($_REQUEST['date'] != ""){
	if($data == ""){
		$data=" LIKE '".$_REQUEST['date']."%";
	}else{
		$data .="  LIKE '".$_REQUEST['date']."%";
	}
}


$data="";




	$query_book1="SELECT SUM(pay) FROM   step_bill WHERE status='0' AND date='".$_REQUEST['date']."'";
 	$result_book1=mysql_query($query_book1) or die("Unable to select data from the tbl_donation. ".mysql_error());
	$row_recp1=mysql_fetch_assoc($result_book1);
    $tot1 = $row_recp1["SUM(pay)"];


	$query_book="SELECT SUM(ini) FROM  tbl_bill WHERE bill_status='0' AND bill_date='".$_REQUEST['date']."'";
 	$result_book=mysql_query($query_book) or die("Unable to select data from the tbl_donation. ".mysql_error());
    $row_recp=mysql_fetch_assoc($result_book);
   	$tot = $row_recp["SUM(ini)"];
    
	/*$query_book3="SELECT SUM(amount) FROM  tbl_loans WHERE l_status='0' AND date='".$_REQUEST['date']."'";
 	$result_book3=mysql_query($query_book3) or die("Unable to select data from the tbl_donation. ".mysql_error());
	$row_recp3=mysql_fetch_assoc($result_book3);
    $tot3 = $row_recp3["SUM(amount)"];
	*/
	$query_book2="SELECT SUM(amount) FROM  tbl_salary WHERE status='0' AND date='".$_REQUEST['date']."'";
 	$result_book2=mysql_query($query_book2) or die("Unable to select data from the tbl_donation. ".mysql_error());
	$row_recp2=mysql_fetch_assoc($result_book2);
    $tot2 = $row_recp2["SUM(amount)"];
	
	$query_book4="SELECT SUM(paid_amt) FROM  tbl_grn WHERE grn_status='0' AND grn_date='".$_REQUEST['date']."'";
 	$result_book4=mysql_query($query_book4) or die("Unable to select data from the bl_grn. ".mysql_error());
	$row_recp4=mysql_fetch_assoc($result_book4);
    $tot4 = $row_recp4["SUM(paid_amt)"];
	
	$query_deposite="SELECT SUM(amt) FROM  tbl_trans WHERE status='0' AND type='deposite' AND  date='".$_REQUEST['date']."'";
 	$result_deposite=mysql_query($query_deposite) or die("Unable to select data from the bl_grn. ".mysql_error());
	$row_deposite=mysql_fetch_assoc($result_deposite);
    $deposite = $row_deposite["SUM(amt)"];
	
	$query_w="SELECT SUM(amt) FROM  tbl_trans WHERE status='0' AND type='withdraw' AND date='".$_REQUEST['date']."'";
 	$result_w=mysql_query($query_w) or die("Unable to select data from the bl_grn. ".mysql_error());
	$row_w=mysql_fetch_assoc($result_w);
    $w = $row_w["SUM(amt)"];
	
	
	/*
	$query_book5="SELECT SUM(amount_temple) FROM   tbl_collecting WHERE status='0' AND date='".$_REQUEST['date']."'";
 	$result_book5=mysql_query($query_book5) or die("Unable to select data from the tbl_donation. ".mysql_error());
	$row_recp5=mysql_fetch_assoc($result_book5);
    $tot5 = $row_recp5["SUM(amount_temple)"];
	
	$query_book7="SELECT SUM(amount_chanter) FROM   tbl_collecting WHERE status='0' AND date='".$_REQUEST['date']."'";
 	$result_book7=mysql_query($query_book7) or die("Unable to select data from the tbl_donation. ".mysql_error());
	$row_recp7=mysql_fetch_assoc($result_book7);
    $tot7 = $row_recp7["SUM(amount_chanter)"];
	
	$query_book6="SELECT SUM(bill_amount) FROM  tbl_bills WHERE bill_status='0' AND bill_paid_date='".$_REQUEST['date']."'";
 	$result_book6=mysql_query($query_book6) or die("Unable to select data from the tbl_donation. ".mysql_error());
	$row_recp6=mysql_fetch_assoc($result_book6);
    $tot6 = $row_recp6["SUM(bill_amount)"];
	
	$query_book8="SELECT SUM(amount) FROM  tbl_other WHERE o_status='0' AND date='".$_REQUEST['date']."'";
 	$result_book8=mysql_query($query_book8) or die("Unable to select data from the tbl_donation. ".mysql_error());
	$row_recp8=mysql_fetch_assoc($result_book8);
    $tot8 = $row_recp8["SUM(amount)"];
 */

      //$tot1+$tot+$tot5;
	// $tot3+$tot4+$tot2+$tot6;
	
$query_book="SELECT * FROM tbl_donation WHERE d_status='0' $data ORDER BY donation_id ";
$result_book=mysql_query($query_book) or die("Unable to select data from the tbl_donation. ".mysql_error());
if(mysql_num_rows($result_book) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    
    <td width="100" height="22" align="center" class="tbl_header_right">bills</td>
    <td width="100" align="center" class="tbl_header_right">Bank Deposit</td>
    <td width="100" align="center" class="tbl_header_right">Bank Withdraws</td>
    <td width="100" align="center" class="tbl_header_right">Get</td>
    
   
    <td width="50" align="center" class="tbl_header_right">Put</td>
    <td width="50" align="center" class="tbl_header_right">INCOME</td>
    <td width="50" align="center" class="tbl_header_right">EXPENCES</td>
    <td width="50" align="center" class="tbl_header_right">SUBMIT</td>
    
  </tr>
  
  <tr class="body_text" onmouseover="this.style.backgroundColor='#E1F1D8';" onmouseout="this.style.backgroundColor='';">

    <td width="100" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $tot ?></td>
    <td width="100" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo  $deposite?></td>
    <td width="100" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $w ?></td>
    <td width="100" align="center" class="border_bottom_left" style="padding-left:3pt;">&nbsp;</td>
  
    <td width="50" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php //echo $row_recp8["SUM(amount)"]; ?></td>
    <td width="50" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $tot1+$tot+$w ?></td>
    <td width="50" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $deposite ?></td>
    <td width="50" align="left" class="border_bottom_left" style="padding-left:3pt;"><form action='../mail/sendmail.php?date=<?php echo $current_date; ?>'"method="post" name="bill_form_<?php echo $current_date; ?>" id="bill_form_<?php echo $current_date; ?>" target="_blank">
    <input type="submit" name="button" id="button" value="Submit" />
    </form></td>
    
  </tr>

  <tr>
    <td colspan="23"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="body_text">
        <td width="760" height="20" align="left"></td>
        <td width="200" align="right">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }else{?>
<div class="red_text">No records found</div>
<?php }
require_once '../library/close.php';
?>
