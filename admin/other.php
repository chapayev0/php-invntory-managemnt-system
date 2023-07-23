<?php
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- InstanceBeginEditable name="doctitle" -->
<title>RD system</title>
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
function other_validation(){
	with(document.other_form){
		valid=true;
		if(name.value == ""){
			valid=false;
			alert("Enter Veh Name");
			name.focus();
			}else if(own.value == ""){
			valid=false;
			alert("Enter Owner Name");
			own.focus();
		}else if(grn.value == ""){
			valid=false;
			alert("Enter Green Test Date");
			grn.focus();
			}else if(ins.value == ""){
			valid=false;
			alert("Enter Insurance Reniew date");
			ins.focus();
		}
		else if(lin.value == ""){
			valid=false;
			alert("Enter liencense Reniew Date");
			lin.focus();
		}
		
		else if(date.value == ""){
			valid=false;
			alert("Enter the Date");
			tel.focus();
		
		}
		return valid;
	}
}


$(document).ready(function (){
	$('#date').datepicker({dateFormat: 'yy-mm-dd'});
	$('#grn').datepicker({dateFormat: 'yy-mm-dd'});
	$('#lin').datepicker({dateFormat: 'yy-mm-dd'});
	$('#ins').datepicker({dateFormat: 'yy-mm-dd'});
	
});

function form_submission(button_id,form_id){
	if(other_validation()){
		document.getElementById(button_id).style.display="none";
		document.forms[form_id].submit();
	}
}
</script>
<style type="text/css">
#sys tr td table tr #cbody #other_form table tr .rounded-corners table {
	font-weight: bold;
}
</style>
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
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" --><form action="add_other.php" method="post" name="other_form" id="other_form" enctype="multipart/form-data" onsubmit="return other_validation();">
          <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" class="rounded-corners"><table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr class="body_text">
                  <td height="25" colspan="4" align="center" class="page_title_text"><p>Add Vehicles</p></td>
                </tr>
                <tr class="body_text">
                  <td width="40" align="center">&nbsp;</td>
                  <td width="155" height="25" align="left">Veh No</td>
                  <td width="37" align="center">:</td>
                  <td width="218" align="left"><input name="name" type="text" class="body_text" id="name" size="20" />
                    <span class="red_text">*</span></td>
                </tr>
                <tr class="body_text">
                  <td width="40" align="center">&nbsp;</td>
                  <td width="155" height="25" align="left"><br />
                    Description</td>
                  <td align="center">:</td>
                  <td width="218" align="left"><textarea name="des" cols="17" rows="4" class="body_text" id="des"></textarea></td>
                </tr>
                <tr class="body_text">
                  <td width="40" align="center">&nbsp;</td>
                  <td width="155" height="25" align="left">Chasy No</td>
                  <td align="center">:</td>
                  <td width="218" align="left"><input name="cha" type="text" class="body_text" id="cha" size="20" />
                    <span class="red_text">*</span></td>
                </tr>
                <tr class="body_text">
                  <td width="40" align="center">&nbsp;</td>
                  <td width="155" height="25" align="left">Engine No</td>
                  <td align="center">:</td>
                  <td width="218" align="left"><input name="eng" type="text" class="body_text" id="eng" size="20" />
                    <span class="red_text">*</span></td>
                </tr>
                <tr class="body_text">
                  <td width="40" align="center">&nbsp;</td>
                  <td width="155" height="25" align="left">Owner</td>
                  <td align="center">:</td>
                  <td width="218" align="left"><input name="own" type="text" class="body_text" id="own" size="20" />
                    <span class="red_text">*</span></td>
                </tr>
                <tr class="body_text">
                  <td width="40" align="center" valign="top">&nbsp;</td>
                  <td width="155" height="25" align="left" valign="top">Green Test Date</td>
                  <td align="center" valign="top">:</td>
                  <td width="218" align="left"><input name="grn" type="text" class="body_text" id="grn" size="20" />
                    <span class="red_text">*</span></td>
                </tr>
                <tr class="body_text">
                  <td width="40" align="center" valign="top">&nbsp;</td>
                  <td width="155" height="25" align="left" valign="top">Insurance Reniew date</td>
                  <td align="center" valign="top">:</td>
                  <td width="218" align="left"><input name="ins" type="text" class="body_text" id="ins" size="20" />
                    <span class="red_text">*</span></td>
                </tr>
                <tr class="body_text">
                  <td width="40" align="center" valign="top">&nbsp;</td>
                  <td width="155" height="25" align="left" valign="top">liencense Reniew Date</td>
                  <td align="center" valign="top">:</td>
                  <td width="218" align="left"><input name="lin" type="text" class="body_text" id="lin" size="20" />
                    <span class="red_text">*</span></td>
                </tr>
                <tr class="body_text">
                  <td width="40" align="center" valign="top">&nbsp;</td>
                  <td width="155" height="25" align="left" valign="top">Add Date</td>
                  <td align="center" valign="top">:</td>
                  <td width="218" align="left"><input name="date" type="text" class="body_text" id="date" size="20" />
                    <span class="red_text">*</span></td>
                </tr>
                <tr class="body_text">
                  <td width="40" align="left">&nbsp;</td>
                  <td width="155" height="25" align="left">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td width="218" align="left"><img src="../images/add.gif" width="65" height="35" id="add" style="cursor:pointer" onclick="form_submission('add','other_form');"/><img src="../images/clear.gif" width="65" height="35" style="cursor:pointer" onclick="reset_form('other_form');"/></td>
                </tr>
                <tr class="body_text">
                  <td width="40" align="left">&nbsp;</td>
                  <td width="155" height="25" align="left">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table>
          </form>
        <!-- InstanceEndEditable --></td>
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
<?php 

require_once '../library/close.php';
?>