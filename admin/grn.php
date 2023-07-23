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
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/ui.datepicker.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../javascript/charge.js" type="text/javascript"></script>
<script language="JavaScript" src="../jquery/jquery.js" type="text/javascript"></script>
<script language="JavaScript" src="../jquery/jquery.autocomplete.js" type="text/javascript"></script>
<script language="javascript" src="../jquery/jquery.ui.all.js"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">

$(document).ready(function() {	
	$('#order_date').datepicker({dateFormat: 'yy-mm-dd'});
});

$(document).keyup(function(e) {
  if (e.keyCode == 17) {//Press Ctrl to Delete the Div
	  var num=parseFloat($('#item_count').val());
	  if(num != 1){
		  var div_id="goods_div_"+num;
		  del_div(div_id);
		  var new_num=parseFloat($('#item_count').val())-1;;
		  $('#item_count').val(new_num);
	  }
  }
});

function gen_goods(div_id,num){
	$('#'+div_id).load("gen_grn_goods.php",{'num':num});
}
function del_div(div_id) {

	 var req = Inint_AJAX();
	 req.onreadystatechange = function () { 
		  if (req.readyState==4) {
			   if (req.status==200) {
					document.getElementById(div_id).innerHTML=req.responseText; //retuen value
					calc_total('','','');
			   } 
		  }
	 };
	 req.open("POST", "../admin/empty.php"); //make connection
	 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	 req.send(null); //send value
}
function del_div(div_id){
	$('#'+div_id).load("empty.php");
}



function load_ingre_goods(goods,goods_id,cprice){
   $("#"+goods).autocomplete("load_ingre_goods.php", {
		width: 130,
		matchContains: true,
		selectFirst: false
	});
	$("#"+goods).result(function(event, data, formatted) {
		$("#"+goods).val(data[3]);
		$("#"+goods_id).val(data[2]);
		$("#"+cprice).val(data[1]);	
	});	
}
function calc_total(price,qty,amount){
	if(price != "" && qty != "" && amount != ""){
		if($('#'+price).val() != "" && $('#'+qty).val() != ""){
			$('#'+amount).val(roundNumber((parseFloat($('#'+price).val())*parseFloat($('#'+qty).val())),2));
		}
	}
	
	var i=1;
	var total_amount=0;
	for(i=1;i<=$('#item_count').val();i++){
		var amount_name="amount_"+i;
		if($('#'+amount_name).val() != "" && document.getElementById(amount_name)){
			total_amount += parseFloat($('#'+amount_name).val());
		}
	}
	
	$('#stotal').val(roundNumber(total_amount,2));
	tot=total_amount*2/100;
	$('#total').val(roundNumber(tot,2));
}

function roundNumber(num, dec) {
	var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	return result;
}

function goods_order_validation(){
	with(document.order_form){
		valid=true;
		if(order_date.value == ""){
			valid=false;
			alert("Select Date");
			order_date.focus();
		}else{
			var i=1;
			var status=0;
			for(i=1;i<=$('#item_count').val();i++){
				if(status == 0){
					var goods_name="goods_"+i;
					var goods_id="goods_id_"+i;
					var qty="qty_"+i;
					var price="price_"+i;
					if(document.getElementById(goods_name) && $('#'+goods_id).val() == ""){
						valid=false;
						status=1;
						alert("Enter Item Description");
						$('#'+goods_name).focus();
					}else if($('#'+price).val() == ""){
						valid=false;
						status=1;
						alert("Enter Price");
						$('#'+price).focus();
					}else if($('#'+qty).val() == ""){
						valid=false;
						status=1;
						alert("Enter Quantity");
						$('#'+qty).focus();
					}
				}
			}
		}
		return valid;
	}
}

function form_submission(btn_id,form_id){
	
	if(goods_order_validation()){
		document.getElementById(btn_id).style.display="none";
		document.forms[form_id].submit();
	}
}
function del_div(div_id) {

	 var req = Inint_AJAX();
	 req.onreadystatechange = function () { 
		  if (req.readyState==4) {
			   if (req.status==200) {
					document.getElementById(div_id).innerHTML=req.responseText; //retuen value
					calc_total('','','');
			   } 
		  }
	 };
	 req.open("POST", "../admin/empty.php"); //make connection
	 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	 req.send(null); //send value
}
function get_cus(){
	$.ajax({
  type: 'POST',
  url: "get_pastamount.php?bill_type="+$("#bill_type").val(), 
       // call php function , phpFunction=function Name , x= parameter 
  data: {},
  success: function(data1){
        var arr = data1.split("|");
		
		
		
		var past_amt = arr[0];
		
	
		
		
			
			$("#past_amt").val(past_amt);
			
			document.getElementById("past_amt").style.display="block";
			
			document.getElementById("past_amt_label").style.display="block";
		
		
		 
		
		
  }
});
		
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
          <p>Add Stocks</p>
        <!-- InstanceEndEditable --></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" --><form id="order_form" name="order_form" method="post" action="add_goods_order.php" onsubmit="return  goods_order_validation();">
                    <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr class="body_text">
                        <td height="25" colspan="3" align="center">&nbsp;</td>
                      </tr>
                      <tr class="body_text">
                        <td width="125" height="25" align="left"><strong>GRN  No</strong></td>
                        <td width="20" align="center">:</td>
                        <td width="255" align="left"><?php echo getGrnNo(); ?>
                          <input name="grn_id" id="grn_id" type="hidden" value="<?php echo getGrnNo(); ?>" /></td>
                      </tr>
                      <tr class="body_text">
                        <td height="25" align="left"><strong>Inv No</strong></td>
                        <td align="center">:</td>
                        <td align="left"><input name="inv" type="text" id="inv" size="20" /></td>
                      </tr>
                      <tr class="body_text">
                        <td height="25" align="left"><strong>Pay Type</strong></td>
                        <td align="center">:</td>
                        <td align="left"><select name="pay_typ" id="pay_typ"  class="body_text" onchange="pay_type();">
                          <option value="cash">Cash</option>
                          <option value="credit">Credit</option>
                          <option value="cheque">Cheque</option>
                        </select></td>
                      </tr>
                      <tr class="body_text">
                        <td height="25" align="left"><strong>Date</strong></td>
                        <td align="center">:</td>
                        <td align="left"><input name="order_date" type="text" class="body_text" id="order_date" size="23" value="<?php echo date('Y-m-d'); ?>"/></td>
                      </tr>
              </table>
                    <div class="red_text" align="center" id="helpdiv">
                      <?php if(isset($_SESSION['record_goods_com_mes'])){echo $_SESSION['record_goods_com_mes'];}?>
                    </div>
                    <p>&nbsp;</p>
                    <table width="835" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="60" height="25">&nbsp;</td>
                        <td width="274" align="center" class="tbl_header_right">Code</td>
                        <td width="145" align="center" class="tbl_header_right">Cost Price</td>
                        <td width="143" align="center" class="tbl_header_right">QTY</td>
                        <td width="152" align="center" class="tbl_header_right">Amount</td>
                        
                      </tr>
                      <tr>
                        <td height="25" colspan="7" align="left"><table width="777" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="59" height="25" align="center"><img src="../images/add.png" alt="" width="12" height="14" style="cursor:pointer" onclick="gen_goods('goods_div_2','2');$('#item_count').val(2);"/></td>
                            
                            <td width="274" align="left" class="border_bottom_left"><input type="hidden" name="goods_id_1" id="goods_id_1" />                              <input name="goods_1" type="text" class="body_text" id="goods_1" onfocus="load_ingre_goods('goods_1','goods_id_1','price_1');" size="40"/></td>
                            <td width="145" align="right" class="border_bottom_left"><input name="price_1" type="text" class="body_text" id="price_1" size="10" onfocus="load_ingre_goods('goods_1','goods_id_1','price_1');"/></td>
                            <td width="143" align="right" class="border_bottom_left"><input name="qty_1" type="text" class="body_text" id="qty_1" size="10" onkeyup="calc_total('price_1','qty_1','amount_1');"/></td>
                            <td width="156" align="right" class="border_bottom_left_right"><input name="amount_1" type="text" class="body_text" id="amount_1" size="15" readonly="readonly" style="text-align:right"/></td>
                            
                          </tr>
                        </table>
                          <input name="item_count" id="item_count" type="hidden" value="1" />
                          <div id="goods_div_2"></div></td>
                      </tr>
                      <tr>
                        <td height="25">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="right"><strong class="body_text">Total</strong></td>
                        <td align="right"><input name="stotal" type="text" class="body_text" id="stotal" size="15" style="text-align:right"/></td>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="25">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="right"><strong class="body_text"></strong></td>
                        <td align="right"><input name="total" type="hidden" class="body_text" id="total" size="15" style="text-align:right"/></td>
                        <td width="55" align="right">&nbsp;</td>
                        <td width="6">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="25">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="25">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="button" name="add" id="add" value="Add" onclick="form_submission('add','order_form');"/></td>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                    </form>
          <p>&nbsp;</p><!-- InstanceEndEditable --></td>
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