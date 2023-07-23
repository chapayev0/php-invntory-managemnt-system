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
<title>SYSTEM</title>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->

<script language="javascript">
$(document).ready(function (){
	$('#date').datepicker({dateFormat: 'yy-mm-dd'});
	});
function user_validation(){
	with(document.user_form){
		valid=true;
		if(name.value == ""){
			valid=false;
			alert("Enter Name");
			name.focus();
			}else if(nic.value.length != 10){
			valid=false;
			alert("Enter correct NIC");
			nic.focus()
			}else if(address.value == ""){
			valid=false;
			alert("Put the Address");
			address.focus();
			}else if(email.value == 0){
			valid=false;
			alert("Put the Email");
			email.focus();
				
		}else if(u_type.selectedIndex == 0){
			valid=false;
			alert("Select User Type");
			u_type.focus();
		}else if(uname.value == ""){
			valid=false;
			alert("Enter Username");
			uname.focus();
		}else if(pwd.value == ""){
			valid=false;
			alert("Enter Password");
			pwd.focus();
		}
		return valid;
	}
}

function check_username(){
	$('#uname_div').load("check_username.php",{'uname':$('#uname').val()});
}

$(document).ready(function (){
	$('#date').datepicker({dateFormat: 'yy-mm-dd'});
	
});
</script>
<style type="text/css">
#sys tr td table tr #cbody #user_form table .body_text .rounded-corners table {
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
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" -->
          <div id="helpdiv" align="center" class="red_text">
            <?php if(isset($_SESSION['user_com_mes'])){echo $_SESSION['user_com_mes'];}?>
          </div>
          <form action="add_user.php" method="post" name="user_form" id="user_form" onsubmit="return user_validation();">
            <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr class="body_text">
                <td align="center" class="rounded-corners"><table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr class="body_text">
                    <td height="25" colspan="3" align="center" class="page_title_text"><p>ADD USER</p></td>
                  </tr>
                  <tr class="body_text">
                    <td width="125" height="25" align="left">Name</td>
                    <td width="20" align="center">:</td>
                    <td width="255" align="left"><input name="name" type="text" class="body_text" id="name" size="27" />
                    *</td>
                  </tr>
                  <tr class="body_text">
                    <td height="25" align="left">NIC</td>
                    <td align="center">:</td>
                    <td align="left"><input name="nic" type="text" class="body_text" id="nic" size="27" />
                    *</td>
                  </tr>
                  <tr class="body_text">
                    <td height="25" align="left" valign="top">Address</td>
                    <td align="center" valign="top">:</td>
                    <td align="left"><textarea name="address" cols="24" rows="3" class="body_text" id="address"></textarea>
                    *</td>
                  </tr>
                  <tr class="body_text">
                    <td height="25" align="left">Telephone No</td>
                    <td align="center">:</td>
                    <td align="left"><input name="tel" type="text" class="body_text" id="tel" size="27" /></td>
                  </tr>
                  <tr class="body_text">
                    <td height="25" align="left">E mail</td>
                    <td align="center">:</td>
                    <td align="left"><input name="email" type="text" class="body_text" id="email" size="27" /></td>
                  </tr>
                  <tr class="body_text">
                    <td height="25" align="left">User Type</td>
                    <td align="center">:</td>
                    <td align="left"><select name="u_type" class="body_text" id="u_type">
                      <option value="">Please Select User Type</option>
                      <option value="admin">Admin</option>
                      <option value="user">user</option>
                      
                      
                      </select>
                      *</td>
                  </tr>
                  <tr align="left" class="body_text">
                    <td height="25" colspan="3"><table width="400" border="0" cellspacing="0" cellpadding="0">
                      <tr class="body_text">
                        <td width="125" height="25" align="left">Username</td>
                        <td width="20" align="center">:</td>
                        <td width="255" align="left"><input name="uname" type="text" class="body_text" id="uname" size="27" />
                        *</td>
                      </tr>
                    </table>
                      <div id="uname_div" class="red_text" align="center"></div></td>
                  </tr>
                  <tr class="body_text">
                    <td height="25" align="left">Password</td>
                    <td align="center">:</td>
                    <td align="left"><input name="pwd" type="password" class="body_text" id="pwd" size="27" />
                    *</td>
                  </tr>
                  <tr class="body_text">
                    <td height="25" align="left">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left"><input type="image" src="../images/add.gif" name="add" id="add" value="Submit" />
                      <img src="../images/clear.gif" width="65" height="35" style="cursor:pointer" onclick="reset_form('user_form');"/></td>
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

unset($_SESSION['user_com_mes']);
?>
