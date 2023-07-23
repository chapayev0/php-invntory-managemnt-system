
<?php
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];

	$c_id=$_GET['c_id'];
	 $c_id2=$_GET['c_id2'];
	 $query_book="SELECT   tbl_charity.c_name,
                        tbl_charity.cus_id,
						tbl_charity.address,
						tbl_bill.bill_time,
						tbl_bill.bill_date,
						tbl_bill.total,
						tbl_bill.bill_id,
						tbl_charity.fname,
						tbl_bill.activity_status,
						
						tbl_charity.c_id,
						tbl_bill.pay_date
						
						
FROM tbl_bill LEFT JOIN tbl_charity ON tbl_bill.c_id=tbl_charity.c_id   WHERE tbl_bill.bill_id='$c_id' ";
	$result_book=mysqli_query($connection,$query_book) or die("Unable to select data from the tbl_donation. ".mysqli_error());
	$row_book=mysqli_fetch_assoc($result_book);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- InstanceBeginEditable name="doctitle" -->
<title>SYSTEM</title>
<script src="../javascript/mes_display.js" type="text/javascript"></script>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script language="JavaScript" src="../jquery/jquery.ui.all.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/ui.datepicker.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->

<script language="javascript">

function charity_validation(){
	with(document.char_form){
		valid=true;
		if(cash.value == ""){
			valid=false;
			alert("Enter Amount");
			amt.focus();
			
		}else if(date.value == ""){
			valid=false;
			alert("Enter Date.");
			date.focus();
		}/*else if(address.value == ""){
			valid=false;
			alert("Enter Address");
			address.focus();
		}else if(description.value == 0 ){
			valid=false;
			alert("Select yuor Donation type");
			description.focus();
		}else if(amount.value == ""){
			valid=false;
			alert("Enter amount");
			amount.focus();
		}else if(donation_type.value == 0 ){
			valid=false;
			alert("Select Paying Type");
			donation_type.focus();
		}*/

		return valid;
	}
}
$(document).ready(function (){
	$('#date').datepicker({dateFormat: 'yy-mm-dd'});
	$('#cdate').datepicker({dateFormat: 'yy-mm-dd'});
	
});


function form_submission(btn_id,form_id){
	if(charity_validation()){
		document.getElementById(btn_id).style.display="none";
		document.forms[form_id].submit();
	}
}

</script>
<!-- InstanceEndEditable -->
<link href="../outlook/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body style="margin:0px">
<table id="sys" width="1000" border="3" align="center" cellpadding="0" cellspacing="0" bordercolor="#00976e">
  <tr>
    <td align="center"><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td width="960" align="left"><img src="../outlook/images/aa.bmp" width="1000" height="150" /></td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td bgcolor="#E6E6E6"><table width="1000" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="850" align="center"><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="848">
                
                <?php
                if($user_type == "admin"){
				?>
                
                <ul id="MenuBar1" class="MenuBarHorizontal" >
                  <li><a href="index.php">HOME<br />
                  </a></li>
                  
                  
                  <li><a href="#" class="MenuBarItemSubmenu">USER<br />
                  </a>
                    <ul>
                      <li><a href="user.php">ADD</a></li>
                      <li><a href="view_user.php">VIEW</a></li>
                    </ul>
                </li>
                
                
                <li><a class="MenuBarItemSubmenu" href="#">CATEGORY<br />
</a>
  <ul>
                      <li><a href="rute.php">ADD</a></li>
                      <li><a href="dispaly_rute.php">VIEW</a></li>
                      </ul>
                </li>
              
                
                
                <li><a class="MenuBarItemSubmenu" href="#">PRODUCT<br />
</a>
  <ul>
                      <li><a href="item.php">ADD</a></li>
                      <li><a href="dispaly_item.php">VIEW</a></li>
                      </ul>
                </li>
                
                <li><a class="MenuBarItemSubmenu" href="#">STOCK<br />
</a>
  <ul>
                      <li><a href="grn.php">ADD</a></li>
                      <li><a href="display_grn.php">VIEW</a></li>
                       <li><a href="grn_review.php">BALANCE</a></li>
                      </ul>
                </li>
                 
         
               


<li><a href="#" class="MenuBarItemSubmenu">CUSTOMER <br />
</a>
  <ul>
    <li><a href="charity.php">ADD</a></li>
    <li><a href="display_charity.php">VIEW</a></li>
  </ul>

<li><a href="#" class="MenuBarItemSubmenu">BILL <br />
</a>
  <ul>
    <li><a href="pay_cus_bill.php">ADD</a></li>
    <li><a href="display_cus_bill.php">VIEW</a></li>
    <li><a href="day_items.php">DAY ITEMS</a></li>
    
    
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">RETURN <br />
</a>
  <ul>
    <li><a href="return.php">ADD</a></li>
    <li><a href="display_cus_rbill.php">VIEW</a></li>
    <li><a href="day_items.php">DAY ITEMS</a></li>
    
    
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">BACKUP <br />
</a>
  <ul>
    <li><a href="get_backup.php">DOWNLOAD</a></li>
    
    
  </ul>
  <li><a href="#" class="MenuBarItemSubmenu">PAYMENT<br />
                  </a>
                    <ul>
                      
                      <li><a href="view_payment.php">VIEW</a></li>
                    </ul>
                </li>
</li>
<li><a href="#" class="MenuBarItemSubmenu">CHEQUE<br />
                  </a>
                    <ul>
                      
                      <li><a href="view_cheque.php">VIEW</a></li>
                    </ul>
                </li>
</li>


<li><a href="../logout.php">LOGOUT</a></li>
                </ul>
                <?php }else if($user_type == "cashier"){ ?>
                <ul id="MenuBar1" class="MenuBarHorizontal">
                  <li><a href="index.php">HOME<br />
                  </a></li>
                  <li><a href="display_day_details.php">DAY DETAILS <br />
                  </a></li>
                  <li><a href="#" class="MenuBarItemSubmenu">EMPLOYEE <br />
                  </a>
                    <ul>
                      
                      <li><a href="#" class="MenuBarItemSubmenu">SALARY  </a>
                        <ul>
                          <li><a href="emp_salary.php">ADD </a></li>
                          <li><a href="display_emp_salary.php">VIEW  </a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>

                <li><a class="MenuBarItemSubmenu" href="#">RUTE<br />
</a>
  <ul>
                      <li><a href="rute.php">ADD</a></li>
                      <li><a href="dispaly_rute.php">VIEW</a></li>
                      </ul>
                </li>
<li><a class="MenuBarItemSubmenu" href="#">SUPPLIER<br />
</a>
  <ul>
                      <li><a href="kapuwa.php">ADD</a></li>
                      <li><a href="display_kapuwat.php">VIEW</a></li>
                      </ul>
                </li>






<li><a class="MenuBarItemSubmenu" href="#">PRODUCT<br />
</a>
  <ul>
                      <li><a href="item.php">ADD</a></li>
                      <li><a href="dispaly_item.php">VIEW</a></li>
                      </ul>
                </li>

<li><a href="#" class="MenuBarItemSubmenu">CUSTOMER <br />
</a>
  <ul>
    <li><a href="charity.php">ADD </a></li>
    <li><a href="display_charity.php">VIEW </a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">OTHERS <br />
</a>
  <ul>
    <li><a href="otherss.php">ADD </a></li>
    <li><a href="display_otherss.php">VIEW </a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">BILL <br />
</a>
  <ul>
    <li><a href="pay_cus_bill.php">ADD</a></li>
    <li><a href="display_cus_bill.php">VIEW</a></li>
    
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">LOAD</a>
  <ul>
    <li><a href="load.php">ADD</a></li>
    <li><a href="display_load.php">VIEW</a></li>
    <li><a href="load_review.php">REVIEW</a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">RETURN</a>
  <ul>
    <li><a href="return.php">ADD</a></li>
    <li><a href="display_return.php">VIEW</a></li>
    
  </ul>
</li>

<li><a href="#" class="MenuBarItemSubmenu">BANKING<br />
</a>
  <ul>
    <li><a href="trans.php">TRANS.ADD </a></li>
    <li><a href="display_trans.php">TRANS.VIEW </a></li>
  </ul>
</li>


<li><a href="../logout.php">LOGOUT</a></li>
                </ul>
                
                
              <?php }else if($user_type == "sadmin"){ ?>
          
              <ul id="MenuBar1" class="MenuBarHorizontal">
                  <li><a href="index.php">HOME<br />
                  </a></li>
                  
              
              <li><a href="bill_details.php">BILL DETAILS <br />
                  </a></li>  
                  <li><a href="../logout.php">LOGOUT</a></li>
                
                </ul>
                
                
                
                <?php } ?>
                
                
                
                
                </td>
</tr>
              <tr> </tr>
            </table></td>
            <td width="100" align="left" class="green_text" style="padding-right:5pt;"><strong><br />
              Welcome <?php echo getUserName($user_id); ?></strong></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="35" align="center" class="page_title_text"><!-- InstanceBeginEditable name="Editable_Title" --><!-- InstanceEndEditable --></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" --><form action="add_payment.php" method="post" name="char_form" id="char_form" enctype="multipart/form-data" onsubmit="return charity_validation();">
        <input name="c_id" id="c_id" type="hidden" value="<?php echo $c_id; ?>" />
        <input name="c_id2" id="c_id2" type="hidden" value="<?php echo $c_id2; ?>" />
          <table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" class="rounded-corners"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr class="body_text">
                  <td height="25" colspan="4" align="left" class="page_title_text"><p>ENTER CASH PAYMENT DETAILS</p>
                    <p>&nbsp;</p></td>
                </tr>
                <tr class="body_text">
                  <td width="176" height="25" align="left"> Shop Name</td>
                  <td width="33" align="center">:</td>
                  <td width="582" align="left"><input name="name" type="text" class="body_text" id="name" size="30" value="<?php echo $row_book["c_name"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">Address</td>
                  <td align="center">:</td>
                  <td align="left"><input name="address" type="text" class="body_text" id="amount" size="60" value="<?php echo $row_book["address"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">Owner Name</td>
                  <td align="center">:</td>
                  <td align="left"><input name="fname" type="text" class="body_text" id="amount2" size="30" value="<?php echo $row_book["fname"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">Bill Date</td>
                  <td align="center">:</td>
                  <td align="left"><input name="bill_date" type="text" class="body_text" id="amount3" size="30" value="<?php echo $row_book["bill_date"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">Pay Type</td>
                  <td align="center">:</td>
                  <td align="left"><label for="type"></label>
                    <select name="type" id="type">
                      <option value="">Select Type</option>
                      <option value="cash">cash</option>
                      <option value="cheque">cheque</option>
                    </select></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">Cheque No</td>
                  <td align="center">:</td>
                  <td align="left"><input name="cno" type="text" class="body_text" id="cno" size="30"  /></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">Cheque Date</td>
                  <td align="center">:</td>
                  <td align="left"><input name="cdate" type="text" class="body_text" id="cdate" size="30"  /></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">Amount</td>
                  <td align="center">:</td>
                  <td align="left"><input name="amt" type="text" class="body_text" id="amount4" size="30"  /></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">Date</td>
                  <td align="center">:</td>
                  <td align="left"><input name="date" type="text" class="body_text" id="date" size="30"  /></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left"><input type="image" src="../images/add.gif" name="add" id="add" value="Submit" />
                    <img src="../images/clear.gif" width="65" height="35" style="cursor:pointer" onclick="reset_form('char_form');"/></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td width="9" align="left">&nbsp;</td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table>
          </form><!-- InstanceEndEditable --></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp; </p>
<p>&nbsp; </p>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
  </script>
</body>
<?php 
require_once '../library/close.php';
?>
<!-- InstanceEnd --></html>
