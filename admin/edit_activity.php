<?php
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];

	$donation_id=$_GET['donation_id'];
	$query_book="SELECT * FROM tbl_donation WHERE donation_id='$donation_id' AND d_status='0'";
	$result_book=mysqli_query($connection,$query_book) or die("Unable to select data from the tbl_donation. ".mysqli_error());
	$row_book=mysqli_fetch_assoc($result_book);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- InstanceBeginEditable name="doctitle" -->
<title>RD system</title>
<script src="../js/reset.js" type="text/javascript"></script>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
function don_validation(){
	with(document.don_form){
		valid=true;
		if(don_name.value == ""){
			valid=false;
			alert("Enter Donation Name");
			don_name.focus();
		}
		else if(donation_type.value == ""){
			valid=false;
			alert("elect Donation Type");
			donation_type.focus();
		}
		else if(description.value == ""){
			valid=false;
			alert("Enter Donation Name");
			description.focus();
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
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" -->
		<form action="update_activity.php" method="post" name="don_form" id="don_form" enctype="multipart/form-data" onsubmit="return don_validation();">
        <input name="donation_id" id="donation_id" type="hidden" value="<?php echo $donation_id; ?>" />
        <table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
        	<tr>
            	<td align="center" class="rounded-corners">
                  <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr class="body_text">
                      <td height="25" colspan="4" align="left" class="page_title_text">EDIT ACTIVITY DETAILS</td>
                    </tr>
                    <tr class="body_text">
                      <td width="125" height="25" align="left">Donator Name</td>
                      <td width="20" align="center">:</td>
                      <td width="255" align="left"><input name="name" type="text" class="body_text" id="name" size="50" value="<?php echo $row_book["name"]; ?>"/></td>
                     
                    </tr>
                    <tr class="body_text">
                      <td height="25" align="left">NIC</td>
                      <td align="center">:</td>
                      <td align="left"><input name="nic_no" type="text" class="body_text" id="nic_no" size="20" value="<?php echo $row_book["nic_no"]; ?>"/></td>
                      </tr>
                    <tr class="body_text">
                      <td height="25" align="left">Tel No</td>
                      <td align="center">:</td>
                      <td align="left"><input name="tel" type="text" class="body_text" id="tel" size="35" value="<?php echo $row_book["tel"]; ?>"/></td>
                      </tr>
                    <tr class="body_text">
                      <td height="25" align="left">Date</td>
                      <td align="center">:</td>
                      <td align="left"><input name="donate_date" type="text" class="body_text" id="donate_date" size="20" value="<?php echo $row_book["donate_date"]; ?>"/></td>
                      </tr>
                      
                      <tr class="body_text">
                      <td height="25" align="left">Address</td>
                      <td align="center">:</td>
                      <td align="left"><input name="address" type="text" class="body_text" id="address" size="20" value="<?php echo $row_book["address"]; ?>"/></td>
                      </tr>
                      
                       
                      
                      <tr class="body_text">
                      <td height="25" align="left">Amount</td>
                      <td align="center">:</td>
                      <td align="left"><input name="amount" type="text" class="body_text" id="amount" size="20" value="<?php echo $row_book["amount"];?>"/>
                                            </td>                     
                      </tr>
                      
                      <tr class="body_text">
                      <td height="25" align="left">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                    </tr>
                      
                      <tr class="body_text">
                      <td height="25" align="left">Donation Type</td>
                      <td align="center">:</td>
                      <td align="left">
                                                                 
                      <select name="donation_type" class="body_text" id="donation_type" style="width:11em;">
                      <option value="<?php $row_book["donation_type"];?>"><?php
					   if($row_book["donation_type"]=="cash"){
						   echo "Cash\මුදලින්";}
					   else if($row_book["donation_type"]=="check"){
						   echo "Check\ චෙක් පත්";}   
						   ?>
                            <option value="">Select Donation Type\මුදල් ගෙවන ආකාරය තෝරන්න</option>
						   <option value="check">Check\චෙක් පත්</option>
						   <option value="cash">Cash\මුදලින්</option>
                    </select>
                      
                      </td>
                      
                      
                      
                  <tr class="body_text">
                      <td height="25" align="left">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    
                    <tr class="body_text">
                      <td height="25" align="left">Description</td>
                      <td align="center">:</td>
                      <td align="left">
                                                                 
                      <select name="description" class="body_text" id="description" style="width:20em;">
                      <option value="<?php echo $row_book["description"];?>"><?php
					   if($row_book["description"]=="monastery"){
						   echo "Reconstruction of Monastery\ආරාම ප්‍රතිසංස්කරණය";
						   }
					 else if($row_book["description"]=="sunday_school"){
						   echo "Sunday School\දහම් පාසල";
						   }
					else if($row_book["description"]=="pirivena"){
						   echo "Pirivena\පිරිවෙන";
						   }
					else if($row_book["description"]=="pagoda"){
						   echo "Reconstruction of Pagoda\චෛත්‍යය ප්‍රතිසංස්කරණය";
					}
					 else if($row_book["description"]=="other"){
						   echo "Other\වෙනත්";
					 }?></option>
                     
                     <option value="">Donation For\පරිත්‍යාගය කුමක් සඳහාද</option>
                     <option value="monastery">Reconstruction of Monastery\ආරාම
                        ප්‍රතිසංස්කරණය </option>
                      <option value="sunday_school">Sunday School\දහම්
                        පාසල</option>
                      <option value="pirivena">Pirivena\පිරිවෙන</option>
                      <option value="pagoda">Reconstruction of Pagoda\චෛත්‍යය ප්‍රතිසංස්කරණය</option>
                      <option value="other">Other \ වෙනත්</option>
						          
                    </select>
                      
                      </td>
                    
                    
                    <tr class="body_text">
                      <td height="25" align="left">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                    </tr> 
                    
                    
                    
                   
                    <tr class="body_text">
                      <td height="25" align="left">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="left"><input type="image" src="../images/update.gif" name="add" id="add" value="Submit" />
                        <img src="../images/clear.gif" width="65" height="35" style="cursor:pointer" onclick="reset_form('rec_form');"/></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr class="body_text">
                      <td height="25" align="left">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                    </tr>
                  </table>
                  </td>
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