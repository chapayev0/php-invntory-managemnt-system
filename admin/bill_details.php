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
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../javascript/mes_display.js" type="text/javascript"></script>
<script language="JavaScript" src="../jquery/jquery.js" type="text/javascript"></script>
<script language="JavaScript" src="../jquery/jquery.autocomplete.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
function message_validation(){
	with(document.message_form){
		valid=true;
		if(message.value == ""){
			valid=false;
			alert("Enter Message");
			message.focus();
		}
		return valid;
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
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" --> <?php 
			  $query_mes="SELECT * FROM tbl_message";
			  $result_mes=mysql_query($query_mes) or die("Unable to select data from the tbl_message. ".mysql_error());
			  if(mysql_num_rows($result_mes) != 0){
				  $row_mes=mysql_fetch_assoc($result_mes);
			  ?>
            <form action="update_message.php" method="post" name="message_form" id="message_form" onsubmit="return message_validation();">
              <input name="mes_id" id="mes_id" type="hidden" value="<?php echo $row_mes["mes_id"]; ?>" />
              <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr class="body_text">
                  <td height="25" colspan="3" align="center"><div class="red_text" align="center" id="helpdiv"><?php if(isset($_SESSION['mes_update'])){echo $_SESSION['mes_update'];}?><?php if(isset($_SESSION['mes_add'])){echo $_SESSION['mes_add'];}?></div></td>
                </tr>
                <tr class="body_text">
                  <td height="25" colspan="3" align="center" valign="top"><strong>UPDATE BILL DETAILS</strong></td>
                </tr>
                <tr class="body_text">
                  <td width="125" height="25" align="left" valign="top">Head Office Telephone</td>
                  <td width="20" align="center" valign="top">:</td>
                  <td width="255" align="left"><input type="text" name="tel1" id="tel1" value="<?php echo $row_mes["tel1"];?>" /></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left" valign="top">Branch Office Telephone</td>
                  <td align="center" valign="top">:</td>
                  <td align="left"><input type="text" name="tel2" id="message" value="<?php echo $row_mes["tel2"];?>"  /> </td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left" valign="top">Head Office Address</td>
                  <td align="center" valign="top">:</td>
                  <td align="left"><input type="text" name="address1" id="address1" value="<?php echo $row_mes["address1"];?>" /></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left" valign="top">Branch Office Address</td>
                  <td align="center" valign="top">:</td>
                  <td align="left"><input type="text" name="address2" id="address2" value="<?php echo $row_mes["address2"];?>" /></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left" valign="top">&nbsp;</td>
                  <td align="center" valign="top">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left" valign="top">&nbsp;</td>
                  <td align="center" valign="top">&nbsp;</td>
                  <td align="left"><input type="submit" name="update" id="update" value="Update" />  <input type="reset" name="clear" id="clear" value="Clear" /></td>
                </tr>
              </table>
              </form>
              <?php }else{?>
              <form action="add_message.php" method="post" name="message_form" id="message_form" onsubmit="return message_validation();">
              <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr class="body_text">
                  <td height="25" colspan="3" align="center"></td>
                </tr>
                <tr class="body_text">
                  <td width="125" height="26" align="left" valign="top">Head Office Telephone</td>
                  <td width="20" align="center" valign="top">:</td>
                  <td width="255" align="left"><input type="text" name="tel1" id="tel1" /></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left" valign="top">Branch Office Telephone</td>
                  <td align="center" valign="top">:</td>
                  <td align="left"><input type="text" name="tel2" id="tel2" /></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left" valign="top">Head Office Address</td>
                  <td align="center" valign="top">:</td>
                  <td align="left"><input type="text" name="address1" id="address1"  /></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left" valign="top">Branch Office Address</td>
                  <td align="center" valign="top">:</td>
                  <td align="left"><input type="text" name="address2" id="address2"  /></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left" valign="top">&nbsp;</td>
                  <td align="center" valign="top">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left" valign="top">&nbsp;</td>
                  <td align="center" valign="top">&nbsp;</td>
                  <td align="left"><input type="submit" name="add" id="add" value="Add" />  <input type="reset" name="clear" id="clear" value="Clear" /></td>
                </tr>
              </table>
              </form>
              <?php }?><!-- InstanceEndEditable --></td>
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
