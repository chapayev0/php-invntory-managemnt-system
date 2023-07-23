<?php
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];

	$v_id=$_GET['v_id'];
	$query_book="SELECT * FROM  tbl_other WHERE v_id='$v_id' AND v_status='0'";
	$result_book=mysqli_query($connection,$query_book) or die("Unable to select data from the tbl_donation. ".mysqli_error());
	$row_book=mysqli_fetch_assoc($result_book);
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
        <form action="update_other.php" method="post" name="don_form" id="don_form" enctype="multipart/form-data" onsubmit="return don_validation();">
        <input name="v_id" id="v_id" type="hidden" value="<?php echo $v_id; ?>" />
          <table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr class="body_text">
                  <td height="25" colspan="4" align="left" class="page_title_text"><p>&nbsp;</p>
                    <p>EDIT VEHICLES DETAILS</p></td>
                </tr>
                <tr class="body_text">
                  <td width="140" height="25" align="left"><strong> Veh No</strong></td>
                  <td width="56" align="center">:</td>
                  <td width="204" align="left"><input name="name" type="text" class="body_text" id="name" size="20" value="<?php echo $row_book["v_name"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left"><strong>Desc</strong></td>
                  <td align="center">:</td>
                  <td align="left"><input name="des" type="text" class="body_text" id="des" size="20" value="<?php echo $row_book["des"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left"><strong>Owner Name</strong></td>
                  <td align="center">:</td>
                  <td align="left"><input name="own" type="text" class="body_text" id="own" size="20" value="<?php echo $row_book["own"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left"><strong>Engine No</strong></td>
                  <td align="center">:</td>
                  <td align="left"><input name="eng" type="text" class="body_text" id="eng" size="20" value="<?php echo $row_book["eng"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="20" align="left"><strong>Chasy No</strong></td>
                  <td align="center">:</td>
                  <td align="left"><input name="cha" type="text" class="body_text" id="cha" size="20" value="<?php echo $row_book["chasy"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="20" align="left"><strong>Grenn Test Date</strong></td>
                  <td align="center">:</td>
                  <td align="left"><input name="grndate" type="text" class="body_text" id="grndate" size="20" value="<?php echo $row_book["grn_test_date"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="20" align="left"><strong>Insurunce Date</strong></td>
                  <td align="center">:</td>
                  <td align="left"><input name="insdate" type="text" class="body_text" id="insdate" size="20" value="<?php echo $row_book["ins_ren_date"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="20" align="left"><strong>Liecence Date</strong></td>
                  <td align="center">:</td>
                  <td align="left"><input name="lindate" type="text" class="body_text" id="lindate" size="20" value="<?php echo $row_book["lin_ren_date"]; ?>"/></td>
                </tr>
                <tr class="body_text">
                  <td height="20" align="left">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left"><input type="image" src="../images/update.gif" name="add" id="add" value="Submit" />
                    <img src="../images/clear.gif" width="65" height="35" style="cursor:pointer" onclick="reset_form('rec_form');"/></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td width="200" align="left">&nbsp;</td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">&nbsp;</td>
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