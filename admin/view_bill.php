<?php
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
$bill_id = $_GET['bill_id'];

$query_order = "SELECT * FROM tbl_bill WHERE bill_id='$bill_id'";
$result_order = mysql_query($query_order) or die("Unable to select data from the tbl_grn. " . mysql_error());
$row_order = mysql_fetch_assoc($result_order);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- InstanceBeginEditable name="doctitle" -->
        <title>SYSTEM</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
        <script language="JavaScript" src="../jquery/jquery.js" type="text/javascript"></script>
        <script language="JavaScript" src="../javascript/mes_display.js" type="text/javascript"></script>
        <script language="JavaScript" src="../jquery/jquery.autocomplete.js" type="text/javascript"></script>
        <script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
        <link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
        <link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" /><!-- InstanceEndEditable -->
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
            <div class="red_text" align="center" id="helpdiv">
                                    <?php if (isset($_SESSION['record_goods_com_mes'])) {
                                        echo $_SESSION['record_goods_com_mes'];
                                    } ?>
                                </div>
                                </br>
                                </br>
                                <?php
                                $query_stock = "SELECT * FROM  tbl_bill_menu WHERE bill_id='$bill_id'";
                                $result_stock = mysql_query($query_stock) or die("Unable to select data from the tbl_stock. " . mysql_error());

                                if (mysql_num_rows($result_stock) != 0) {
                                    $total_amount = 0;
                                    ?>
                                    <table width="1214" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td height="25">&nbsp;</td>
                                            <td align="center" >&nbsp;</td>
                                            <td align="center" >&nbsp;</td>
                                            <td align="center" >&nbsp;</td>
                                            <td align="center" >&nbsp;</td>
                                            <td align="center" >&nbsp;</td>
                                            <td align="center" >&nbsp;</td>
                                            <td align="center" ><form action="print_bil.php" method="post" name="stock_form" target="_blank" id="stock_form">
                                                    <input name="bill_id" id="bill_id" type="hidden" value="<?php echo $_REQUEST['bill_id']; ?>" />

                                                    <input type="submit" name="print" id="print" value="print" />
                                                </form></td>
                                            <td align="center" >&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="128" height="25">&nbsp;</td>
                                            <td width="27" align="center" >&nbsp;</td>
                                            <td width="285" align="center" class="tbl_header_right"> Name</td>

                                            <td width="126" align="center" class="tbl_header_right">QTY</td>
                                            <td width="114" align="center" class="tbl_header_right">Unit Cost</td>
                                            <td width="94" align="center" class="tbl_header_right">Warranty</td>
                                            <td width="94" align="center" class="tbl_header_right">Discount(%)</td>
                                            <td width="94" align="center" class="tbl_header_right">Amount</td>
                                            <td width="94" align="center" class="tbl_header_right">Edit</td>

                                            <td width="21">&nbsp;</td>
                                        </tr>
                                        <?php
                                        while ($row_stock = mysql_fetch_assoc($result_stock)) {
                                            $qq = $row_stock["bill_menu_qty"];

                                            //$total_amount +=round(($row_stock["st_price"]*$row_stock["st_qty"]),2);
                                            ?>
                                            <tr class="body_text">
                                                <td height="20">&nbsp;</td>
                                                <td width="27" align="center"  style="padding-left:3pt;">&nbsp;</td>
                                                <td width="285" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stock["menu_name"]; ?></td>

                                                <td width="126" align="right" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stock["bill_menu_qty"]; ?></td>
                                                <td width="114" align="right" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_stock["menu_price"]; ?></td>
                                                <td width="94" align="right" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_stock["war"]; ?></td>
                                                <td width="94" align="right" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_stock["dis"]; ?></td>
                                                <td width="94" align="right" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_stock["total"]-$row_stock["total"]*$row_stock["dis"]/100; ?></td>
                                                <td width="94" align="right" class="border_bottom_left_right" style="padding-left:3pt;">&nbsp;</td>

                                                <td>&nbsp;</td>
                                            </tr>
                                            <?php
                                            //$tot+=$qq 
                                        }
                                        ?>
                                        <tr>
                                            <td height="21">&nbsp;</td>
                                            <td align="right">&nbsp;</td>
                                            <td align="right">&nbsp;</td>
                                            <td align="right" class="body_text"></td>
                                            <td align="right" class="body_text">&nbsp;</td>
                                            <td colspan="2" align="right" class="body_text">Gross Amount</td>
                                            <td align="right" class="body_text"><?php echo $row_order["total"]; ?></td>
                                            <td align="right" class="body_text">&nbsp;</td>
                                            <td align="right" class="body_text">&nbsp;</td>
                                            <td width="100" align="center" class="body_text" style="padding-right:3pt;"></td>
                                            <td width="37">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td height="21">&nbsp;</td>
                                          <td align="right">&nbsp;</td>
                                          <td align="right">&nbsp;</td>
                                          <td align="right" class="body_text"></td>
                                          <td align="right" class="body_text">&nbsp;</td>
                                          <td colspan="2" align="right" class="body_text">Dis (%)</td>
                                          <td align="right" class="body_text"><?php echo $row_order["bill_discount"]; ?></td>
                                          <td align="right" class="body_text">&nbsp;</td>
                                          <td align="right" class="body_text">&nbsp;</td>
                                          <td align="center" class="body_text" style="padding-right:3pt;"></td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td height="21">&nbsp;</td>
                                            <td align="right">&nbsp;</td>
                                            <td align="right">&nbsp;</td>
                                            <td align="right" class="body_text"></td>
                                            <td align="right" class="body_text">&nbsp;</td>
                                            <td colspan="2" align="right" class="body_text">Total Amount</td>
                                            <td align="right" class="body_text"><?php echo $row_order["ftotal"]; ?></td>
                                            <td align="right" class="body_text">&nbsp;</td>
                                            <td align="right" class="body_text">&nbsp;</td>
                                            <td align="center" class="body_text" style="padding-right:3pt;"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td height="30">&nbsp;</td>
                                            <td align="right">&nbsp;</td>
                                            <td align="right">&nbsp;</td>
                                            <td align="right"></td>
                                            <td align="right"></td>
                                            <td align="right"></td>
                                            <td align="right"></td>
                                            <td align="right"></td>
                                            <td align="right"></td>
                                            <td align="right">&nbsp;</td>
                                            <td align="right">&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
<?php } ?><!-- InstanceEndEditable --></td>
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
<!-- InstanceEnd --></html><?php
require_once '../library/close.php';

unset($_SESSION['user_add_mes']);
?>
