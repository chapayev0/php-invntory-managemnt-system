<?php
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/user.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
		if(c_name.value == ""){
			valid=false;
			alert("Enter  Name");
			c_name.focus();
			
		}else if(address.value == ""){
			valid=false;
			alert("Enter address.");
			address.focus();
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
                if($user_type == "user"){
				?>
                
                <ul id="MenuBar1" class="MenuBarHorizontal" >
                  <li><a href="bill.php">HOME<br />
                  </a></li>
                  
                 
                
               
              
                
                
               
                 
         
               


<li><a href="#" class="MenuBarItemSubmenu">CUSTOMER <br />
</a>
  <ul>
    <li><a href="customer.php">ADD</a></li>
    <li><a href="view_customer.php">VIEW</a></li>
  </ul>

<li><a href="#" class="MenuBarItemSubmenu">BILL <br />
</a>
  <ul>
    <li><a href="bill.php">ADD</a></li>
    <li><a href="view_bill.php">VIEW</a></li>
    
    
  </ul>
</li>


  



<li><a href="../logout.php">LOGOUT</a></li>
                </ul>
                <?php }else if($user_type == "cashier"){ ?>
                <ul id="MenuBar1" class="MenuBarHorizontal">
                  <li><a href="../admin/index.php">HOME<br />
                  </a></li>
                  <li><a href="../admin/display_day_details.php">DAY DETAILS <br />
                  </a></li>
                  <li><a href="#" class="MenuBarItemSubmenu">EMPLOYEE <br />
                  </a>
                    <ul>
                      
                      <li><a href="#" class="MenuBarItemSubmenu">SALARY  </a>
                        <ul>
                          <li><a href="../admin/emp_salary.php">ADD </a></li>
                          <li><a href="../admin/display_emp_salary.php">VIEW  </a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>

                <li><a class="MenuBarItemSubmenu" href="#">RUTE<br />
</a>
  <ul>
                      <li><a href="../admin/rute.php">ADD</a></li>
                      <li><a href="../admin/dispaly_rute.php">VIEW</a></li>
                      </ul>
                </li>
<li><a class="MenuBarItemSubmenu" href="#">SUPPLIER<br />
</a>
  <ul>
                      <li><a href="../admin/kapuwa.php">ADD</a></li>
                      <li><a href="../admin/display_kapuwat.php">VIEW</a></li>
                      </ul>
                </li>






<li><a class="MenuBarItemSubmenu" href="#">PRODUCT<br />
</a>
  <ul>
                      <li><a href="../admin/item.php">ADD</a></li>
                      <li><a href="../admin/dispaly_item.php">VIEW</a></li>
                      </ul>
                </li>

<li><a href="#" class="MenuBarItemSubmenu">CUSTOMER <br />
</a>
  <ul>
    <li><a href="../admin/charity.php">ADD </a></li>
    <li><a href="../admin/display_charity.php">VIEW </a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">OTHERS <br />
</a>
  <ul>
    <li><a href="../admin/otherss.php">ADD </a></li>
    <li><a href="../admin/display_otherss.php">VIEW </a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">BILL <br />
</a>
  <ul>
    <li><a href="../admin/pay_cus_bill.php">ADD</a></li>
    <li><a href="../admin/display_cus_bill.php">VIEW</a></li>
    
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">LOAD</a>
  <ul>
    <li><a href="../admin/load.php">ADD</a></li>
    <li><a href="../admin/display_load.php">VIEW</a></li>
    <li><a href="../admin/load_review.php">REVIEW</a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">RETURN</a>
  <ul>
    <li><a href="../admin/return.php">ADD</a></li>
    <li><a href="../admin/display_return.php">VIEW</a></li>
    
  </ul>
</li>

<li><a href="#" class="MenuBarItemSubmenu">BANKING<br />
</a>
  <ul>
    <li><a href="../admin/trans.php">TRANS.ADD </a></li>
    <li><a href="../admin/display_trans.php">TRANS.VIEW </a></li>
  </ul>
</li>


<li><a href="../logout.php">LOGOUT</a></li>
                </ul>
                
                
              <?php }else if($user_type == "sadmin"){ ?>
          
              <ul id="MenuBar1" class="MenuBarHorizontal">
                  <li><a href="../admin/index.php">HOME<br />
                  </a></li>
                  
              
              <li><a href="../admin/bill_details.php">BILL DETAILS <br />
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
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" --> <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td ><form action="add_charity.php" method="post" name="char_form" id="char_form" enctype="multipart/form-data" onsubmit="return charity_validation();">
                    <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr class="body_text">
                        <td height="25" colspan="3" align="center" class="page_title_text"><p>CUSTOMERS ADD</p></td>
                      </tr>
                      <tr class="body_text">
                        <td width="150" height="25" align="left"> Name</td>
                        <td width="20" align="center">:</td>
                        <td width="255" align="left"><input name="c_name" type="text" class="body_text" id="c_name" size="25" />
                        <span class="red_text">*</span></td></tr>
                      <tr class="body_text">
                        <td height="25" align="left">Tel</td>
                        <td align="center">:</td>
                        <td align="left"><input name="section" type="text" class="body_text" id="section" size="25" /></td>
                      </tr>
                      <tr class="body_text">
                        <td height="25" align="left">Address</td>
                        <td align="center">:</td>
                        <td align="left"><label for="address"></label>
                        <textarea name="address" id="address" cols="16" rows="3"></textarea>
                        <span class="red_text">*</span></td>
                      </tr>
                    <tr class="body_text">
                        <td height="25" align="left">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="left" class="green_text"><img src="../images/add.gif" width="65" height="35" id="add" style="cursor:pointer" onclick="form_submission('add','char_form');"/> <img src="../images/clear.gif" width="65" height="35" style="cursor:pointer" onclick="reset_form('char_form');"/></td>
                      </tr>
                    </table>
                </form></td>
              </tr>
            </table><!-- InstanceEndEditable --></td>
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
