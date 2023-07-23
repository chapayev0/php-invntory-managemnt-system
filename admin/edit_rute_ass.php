
<?php
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];

	$query_user="SELECT * FROM tbl_assgn_rute WHERE r_a_id='".$_GET['r_a_id']."'";
	$result_user=mysqli_query($connection,$query_user) or die("Unable to select data from the tbl_user. ".mysqli_error());
	$row_user=mysqli_fetch_assoc($result_user);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- InstanceBeginEditable name="doctitle" -->
<title>system</title>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<title> system</title>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
function product_validation(){
	with(document.product_form){
		valid=true;
		if(service.value == ""){
			valid=false;
			alert("Enter Product Name");
			service.focus();
		}else if(price.value == ""){
			valid=false;
			alert("Enter Unit Price");
			price.focus();
		}
		return valid;
	}
}
</script>
<!-- InstanceEndEditable -->
</head>

<body style="margin:0px">
<table id="sys" width="1000" border="3" align="center" cellpadding="0" cellspacing="0" bordercolor="#00976e">
  <tr>
    <td align="center"><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td width="960" align="left"><img src="../images/2.png" width="1000" height="150" /></td>
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
                
                <ul id="MenuBar1" class="MenuBarHorizontal">
                  <li><a href="index.php">HOME<br />
                  </a></li>
                  <li><a href="display_day_details.php">DAY DETAILS <br />
                  </a></li>
                  <li><a href="#" class="MenuBarItemSubmenu">USER<br />
                  </a>
                    <ul>
                      <li><a href="user.php">ADD</a></li>
                      <li><a href="view_user.php">VIEW</a></li>
                    </ul>
                </li>
                  <li><a href="log_details.php">LOGIN DETAILS<br />
                  </a> </li>
                  <li><a href="#" class="MenuBarItemSubmenu">EMPLOYEE <br />
                  </a>
                    <ul>
                      <li><a href="employee.php">ADD</a></li>
                      <li><a href="display_employee.php">VIEW</a></li>
</ul>
              </li>
<li><a class="MenuBarItemSubmenu" href="#">SUPPLIER<br />
</a>
  <ul>
                      <li><a href="kapuwa.php">ADD</a></li>
                      <li><a href="display_kapuwat.php">VIEW</a></li>
                      </ul>
                </li>
<li><a href="#" class="MenuBarItemSubmenu">CUSTOMER <br />
</a>
  <ul>
    <li><a href="charity.php">ADD</a></li>
    <li><a href="display_charity.php">VIEW</a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">GRN<br />
  </a>
  <ul>
    <li><a href="grn.php">ADD</a></li>
    <li><a href="display_grn.php">VIEW</a></li>
    <li><a href="grn_review.php">REVIEW</a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">LOAD</a>
  <ul>
    <li><a href="load.php">ADD</a></li>
    <li><a href="display_load.php">VIEW</a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">BANKING<br />
</a>
  <ul>
    <li><a href="loans.php">ADD</a></li>
    <li><a href="display_loans.php">VIEW</a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">VEHICLES<br />
</a>
  <ul>
    <li><a href="other.php">ADD</a></li>
    <li><a href="display_other.php">VIEW</a></li>
  </ul>
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
<li><a class="MenuBarItemSubmenu" href="#">ITEM<br />
</a>
  <ul>
                      <li><a href="item.php">ADD</a></li>
                      <li><a href="dispaly_item.php">VIEW</a></li>
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








<li><a href="#" class="MenuBarItemSubmenu">CUSTOMER <br />
</a>
  <ul>
    <li><a href="charity.php">ADD </a></li>
    <li><a href="display_charity.php">VIEW </a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">BILL <br />
</a>
  <ul>
    <li><a href="cus_bill.php">ADD</a></li>
    <li><a href="display_cus_bill.php">VIEW</a></li>
    <li><a href="pay_cus_bill.php">PAY ADD</a></li>
    <li><a href="pay_display_cus_bill.php">VIEW PAY</a></li>
  </ul>
</li>
<li><a href="find_bill.php" class="MenuBarItemSubmenu">COUNT <br />
</a>
  
</li>
<li><a href="#" class="MenuBarItemSubmenu">BANKING<br />
</a>
  <ul>
    <li><a href="loans.php">ADD </a></li>
    <li><a href="display_loans.php">VIEW </a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">VEHICLES<br/>
</a>
  <ul>
    <li><a href="other.php">ADD </a></li>
    <li><a href="display_other.php">VIEW </a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">ASSIGN RUTE<br />
</a>
  <ul>
    <li><a href="assign_root_ref_driver.php">ADD </a></li>
    <li><a href="display_assign_root_ref_driver.php">VIEW </a></li>
  </ul>
</li>

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
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" --><form action="update_rute_ass.php" method="post" name="product_form" id="product_form" onsubmit="return product_validation();">
                    <p>
                      <input name="p_id" id="p_id" type="hidden" value="<?php echo $_GET['r_a_id']; ?>" />
                     
                      
                    </p>
                     <input name="catagory_id" id="catagory_id" type="hidden" value=""  />
                     <input name="p_name" id="p_name" type="hidden" value=""  />
                    <table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr class="body_text">
                        <td width="107" height="25" align="center"><strong>Rute</strong></td>
                        <td width="38" align="center">:</td>
                        <td width="305" align="left"><input name="rute" type="text" class="body_text" id="rute" size="25" value="<?php echo $row_user["rute"]; ?>"/></td>
                      </tr>
                      <tr class="body_text">
                        <td height="25" align="center"><strong>Reff</strong></td>
                        <td align="center">:</td>
                        <td align="left"><input name="reff" type="text" class="body_text" id="reff" size="25" value="<?php echo $row_user["reff"]; ?>"/></td>
                      </tr>
                      <tr class="body_text">
                        <td height="25" align="center"><strong>Driver</strong></td>
                        <td align="center">:</td>
                        <td align="left"><input name="dri" type="text" class="body_text" id="dri" size="25" value="<?php echo $row_user["driver"]; ?>"/></td>
                      </tr>
                      <tr class="body_text">
                        <td height="25" align="left">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="left"><input type="image" src="../images/update.gif" name="update" id="update" value="Submit" /></td>
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
<?php 

require_once '../library/close.php';
?>