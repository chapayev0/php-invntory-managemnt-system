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
<title>system</title>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
$(document).keyup(function(e) {
  if (e.keyCode == 113) {//Press F2 for load bill
  	window.location='bill.php';
  }else if (e.keyCode == 115) {//Press F1 for help
  	window.location='user_help.php';
  }
});

function gen_service(div_id,num){
	$('#'+div_id).load("gen_root_assign.php",{'num':num});
}
function delete_div(div_id){
	$('#'+div_id).load("empty.php");
}
function menu_id(menu_name,menu_id,menu_price,menu_no,discount,id){
	//$("#dis_"+id).val(0);
	//alert(discount);
   	$("#"+menu_no).autocomplete("menu_load.php", {
		width: 175,
		matchContains: true,
		selectFirst: false
	});
	$("#"+menu_no).result(function(event, data, formatted) {
		
		$("#"+menu_name).val(data[1]);
		//$("#"+menu_id).val(data[2]);
		$("#"+menu_price).val(data[2]);
		$("#"+discount).val(data[3]);
						
	});	
}

function service_validation(){
	with(document.service_form){
		valid=true;
		var i=1;
		var status=0;
		for(i=1;i<=$('#count_item').val();i++){
			if(status == 0){
				var service="service_"+i;
				var price="price_"+i;
				if(document.getElementById(service) && $('#'+service).val() == ""){
					valid=false;
					status=1;
					alert("Enter Product");
					$('#'+service).focus();
				}else if(document.getElementById(price) && $('#'+price).val() == "" && status == 0){
					valid=false;
					status=1;
					alert("Enter Unit Price");
					$('#'+price).focus();
				}
			}
		}
		return valid;
	}
}

function form_submission(button_id,form_id){
	if(service_validation()){
		document.getElementById(button_id).style.display = "none";
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
        <td height="35" align="center" class="page_title_text"><!-- InstanceBeginEditable name="Editable_Title" -->
          <p>&nbsp;</p>
          <p>Assign Rute</p>
        <!-- InstanceEndEditable --></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" --><form action="add_ass_rute.php" method="post" name="service_form" id="service_form" onsubmit="return service_validation();">
        <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="rounded-corners"><table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="35" align="left" class="page_title_text" style="padding-left:15pt;">&nbsp;</td>
              </tr>
            </table>
              <table width="475" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr class="body_text">
                  <td width="175" height="25" align="left">Rute No</td>
                  <td width="20" align="center">:</td>
                  <td width="280" align="left"><?php echo getAssrootNo(); ?>
                    <input name="bill_no" id="bill_no" type="hidden" value="<?php echo getAssrootNo(); ?>" /></td>
                </tr>
                <!--<tr class="body_text">
                      <td height="25" align="left">Payment Type</td>
                      <td align="center">:</td>
                      <td align="left">
                    <select name="pay_type" class="body_text" id="pay_type" style="width:13em;">
                        <option value="">Select Payment Type</option>
                        <?php //paymentType("");?>
                      </select></td>
                    </tr>-->
                <tr class="body_text">
                  <td height="25" colspan="3" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="body_text">
                      <td width="175" height="25" align="left">Rute</td>
                      <td width="20" align="center">:</td>
                      <td align="left"><select name="rute" class="body_text" id="rute" onchange="get_cus();">
                        <option value="">Select rute</option>
                        <?php rute("");?>
                      </select></td>
                    </tr>
                  </table>
                    <div align="center" id="pay_div"></div>
                    <div align="center" id="pay_div2"></div></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">Ref</td>
                  <td align="center">:</td>
                  <td align="left"><select name="ref" class="body_text" id="ref" onchange="get_cus();">
                    <option value="">Select Ref</option>
                    <?php emp("");?>
                  </select></td>
                </tr>
                <tr class="body_text">
                  <td width="175" height="25" align="left">Driver</td>
                  <td align="center">:</td>
                  <td width="280" align="left"><select name="dri" class="body_text" id="dri" onchange="get_cus();">
                    <option value="">Select Driver</option>
                    <?php emp("");?>
                  </select></td>
                </tr>
                <tr class="body_text">
                  <td height="25" align="left">Date</td>
                  <td align="center">:</td>
                  <td align="left"><input name="date" type="text" class="body_text" id="date" style="text-align:left" size="24" value='<?php echo date('Y-m-d'); ?>'/></td>
                </tr>
                <tr class="body_text">
                  <td colspan="3" align="left"><div id="token" > </div></td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <div id="cus_div" align="center"></div></td>
          </tr>
        </table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
                        <td height="25" colspan="7" align="center"><div id="helpdiv" class="red_text">
                          <?php if(isset($_SESSION['user_service_add_com_mes'])){echo $_SESSION['user_service_add_com_mes'];}?>
                        </div></td>
                      </tr>
                      <tr>
                        <td width="30" height="25">&nbsp;</td>
                        <td width="187" align="center" class="tbl_header_right">Item Code</td>
                        <td width="134" align="center" class="tbl_header_right">Item Name</td>
                        <td width="163" align="center" class="tbl_header_right">Qty</td>
                        <td width="328" align="center" class="tbl_header_right">Unit Cost</td>
                        <td width="127" align="center" class="tbl_header">Amount</td>
                        <td width="31">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="25" colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="28" height="25" align="center"><img src="../images/add.png" alt="" width="16" height="16" style="cursor:pointer" onclick="gen_service('service_div_2','2');$('#count_item').val(2);"/></td>
                            <td width="188" align="left" class="border_bottom_left"><input name="p_id_1" type="text" class="body_text" id="p_id_1" 
                          size="15" 
                          onfocus="menu_id('item_1','item_id_1','price_1','p_id_1','qty_div_1',
                          $('#qty_1').val(),'p_no_1','qty_1');" onkeydown="set_cursor(event,'qty_1');"/></td>
                            <td width="139" align="left" class="border_bottom_left"><input name="item_1" type="text" class="body_text" id="item_1" size="40" onfocus="menu('item_1','item_id_1','price_1','p_id_1','qty_div_1',$('#qty_1').val
                          (),'p_no_1','qty_1');"/></td>
                            <td width="130" align="left" class="border_bottom_left"><input name="qty_1" type="text" class="body_text" id="qty_1" size="10" onkeyup="cal_total();" style="text-align:right" onkeydown="gen_new_item(event,'item_div_2','2');"/></td>
                            <td width="342" align="left" class="border_bottom_left"><input name="price_1" type="text"   class="body_text" id="price_1" style="text-align:right" size="10" /></td>
                            <td width="141" align="right" class="border_bottom_left_right"><input name="amount_1" type="text" class="body_text" id="amount_1" style="text-align:right" size="10" /></td>
                            <td width="32" align="center">&nbsp;</td>
                          </tr>
                        </table>
                          <input name="count_item" type="hidden" value="1" id="count_item"/>
                          <div id="service_div_2"></div></td>
                      </tr><tr>
                        <td height="25" colspan="9" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr class="body_text">
                            <td width="30" height="25">&nbsp;</td>
                            <td width="420" align="right">&nbsp;</td>
                            <td width="240
                            " align="right" ><strong>Gross Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
                            <td width="150" align="right"><input name="total" type="text" class="body_text" id="total" style="text-align:right" size="12" readonly="readonly"/></td>
                            <td width="40">&nbsp;</td>
                          </tr>
                          
                          
                          
                          
                        </table></td>
                      </tr>
                      <tr>
                        <td height="25">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td height="25">&nbsp;</td>
                        <td height="25" align="right"><img src="../images/add.gif" alt="" width="65" height="35" id="add" style="cursor:pointer" onclick="form_submission('add','service_form');"/></td>
                        <td height="25">&nbsp;</td>
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

unset($_SESSION['user_add_mes']);
?>