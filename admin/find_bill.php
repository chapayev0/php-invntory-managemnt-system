
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
<link rel="stylesheet" href="../css/jquery.ui.all.css">
<script src="../javascript/ajax.js" type="text/javascript"></script>
<script src="../javascript/mes_display.js" type="text/javascript"></script>

<script src="../jquery/jquery.js"></script>
<script src="../jquery/jquery.ui.datepicker.js"></script>
<script language="JavaScript" src="../jquery/jquery.autocomplete.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery.ui.autocomplete.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<link href="../jquery/jquery.ui.datepicker.js" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">

$(document).ready(function(){
		customer();
		//load_cus_type();
		//get_token();
		$('#p_id_1').focus();
});

function cal_total(){
	var count_item=$('#count_item').val();
	var i=1;
	var total_amount=0;
	var total_discount=0;
	var net_amount=0;
	//var service_charge=0
	for(i=1;i<=count_item;i++){
		var price="price_"+i;
		var qty_name="qty_"+i;
		var amount="amount_"+i;
		//var discount="discount_"+i;
		
		/*if(document.getElementById(free).checked == true){
			$('#'+amount).val(0);
		}else{*/
			if(document.getElementById(price) && $('#'+price).val() != ""){
				var qty=1;
				if($('#'+qty_name).val() == ""){
					qty=1;
				}else{
					qty=$('#'+qty_name).val();
				}
				
				
				
				$('#'+amount).val(roundNumber((parseFloat($('#'+price).val())-parseFloat(qty)),2));
				total_amount = (parseFloat($('#'+amount).val()))*2.5/100;
			}
		}
		
		//total_amount1 = (parseFloat($('#'+g_discount).val()));
	//alert(total_amount1);
	//}
	
	var d_amount=0; 
	
	
	
	total_amount =total_amount;
	net_amount =parseFloat(total_amount)-parseFloat(d_amount);
	
	net_amount =((parseFloat(total_amount)-parseFloat(d_amount))*10/100)
	ser_charge=(parseFloat(total_amount)-parseFloat(d_amount))*10/100
	
	//$('#g_discount').val(d_amount);
	$('#total').val(roundNumber(total_amount,2));
	$('#add_charge').val(roundNumber(ser_charge,2));
	
	$('#net_total').val(roundNumber(total_amount,2));
	if($('#cash').val() != ""){
		$('#change').val(roundNumber((parseFloat($('#cash').val())*parseFloat($('#net_total').val())),2));
	}
	if($('#cash').val() != ""){
		$('#t_pay').val(roundNumber(((parseFloat($('#change').val())+parseFloat($('#amount_1').val()))/parseFloat($('#cash').val())),2));
	}
}


function roundNumber(num, dec) {
	var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	return result;
}

function menu_id(menu_name,menu_id,menu_price,menu_no,discount,id){
	$("#dis_"+id).val(0);
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



$(document).keyup(function(e) {
  if (e.keyCode == 113) {//Press F2 for load bill
  	window.location='bill.php';
  }else if (e.keyCode == 115) {//Press F1 for help
	var field_name=window.document.activeElement.id;
	window.open ("help.php?active_field="+field_name, "mywindow","location=1,status=1,scrollbars=1,width=700,height=530");
  }
});
token
function gen_item(div_id,num){
	$('#'+div_id).load("generate_item.php",{'num':num});
}




function gen_new_item(evt,div_id,num){
  var keyCode;
  if ("which" in evt){// NN4 & FF &amp; Opera
    keyCode=evt.which;
  } else if ("keyCode" in evt){// Safari & IE4+
    keyCode=evt.keyCode;
  } else if ("keyCode" in window.event){// IE4+
    keyCode=window.event.keyCode;
  } else if ("which" in window.event){
    keyCode=evt.which;
  } else{   
  	//alert("the browser don't support");  
  }
  	$ck_qty='qty_'+(num-1);
    if (keyCode == 13){//Press Enter
		if($('#'+$ck_qty).val() == ""){
			alert("Enter Quantity");
			$('#'+$ck_qty).focus();
		}else{
			//alert(num);
			//alert($('#count_item').val());
			load_new_item(div_id,num);
			$('#count_item').val(num);
		}
	}else if(keyCode == 35){//Press End
		if($('#'+$ck_qty).val() == ""){
			alert("Enter Quantity");
			$('#'+$ck_qty).focus();
		}else{
			$('#cash').focus();
		}
	}
}

function focus_cash(evt){
  var keyCode;
  if ("which" in evt){// NN4 & FF &amp; Opera
    keyCode=evt.which;
  } else if ("keyCode" in evt){// Safari & IE4+
    keyCode=evt.keyCode;
  } else if ("keyCode" in window.event){// IE4+
    keyCode=window.event.keyCode;
  } else if ("which" in window.event){
    keyCode=evt.which;
  } else{   
  	//alert("the browser don't support");  
  }
  
  if(keyCode == 13){//Press End
	$('#cash').focus();
  }
}

function set_cursor(evt,qty){
  var keyCode;
  if ("which" in evt){// NN4 & FF &amp; Opera
    keyCode=evt.which;
  } else if ("keyCode" in evt){// Safari & IE4+
    keyCode=evt.keyCode;
  } else if ("keyCode" in window.event){// IE4+
    keyCode=window.event.keyCode;
  } else if ("which" in window.event){
    keyCode=evt.which;
  } else{   
  	//alert("the browser don't support");  
  }
  
    if (keyCode == 9){
		$('#'+qty).focus();		
	}
}
function set_submission(evt,button_id,form_id){
  var keyCode;
  if ("which" in evt){// NN4 & FF &amp; Opera
    keyCode=evt.which;
  } else if ("keyCode" in evt){// Safari & IE4+
    keyCode=evt.keyCode;
  } else if ("keyCode" in window.event){// IE4+
    keyCode=window.event.keyCode;
  } else if ("which" in window.event){
    keyCode=evt.which;
  } else{   
  	//alert("the browser don't support");  
  }
  
    if (keyCode == 13){// press enter
		form_submission(button_id,form_id);
	}
}



$(document).keyup(function(e) {
  if (e.keyCode == 17) {//Press Ctrl to Delete the Div
	  var num=parseFloat($('#count_item').val());
	  if(num != 1){
		  var div_id="item_div_"+num;
		  delete_div(div_id);
		  var new_num=parseFloat($('#count_item').val())-1;;
		  $('#count_item').val(new_num);
	  }
  }
});



function menu(menu_name,menu_id,menu_price,menu_no){
   $("#"+menu_name).autocomplete("menug_load.php", {
		width: 275,
		matchContains: true,
		selectFirst: false
	});
	$("#"+menu_name).result(function(event, data, formatted) {
		
		$("#"+menu_id).val(data[1]);
		$("#"+menu_no).val(data[2]);
		$("#"+menu_price).val(data[3]);
						
	});	
}







function form_submission(button_id,form_id){
	if(true){
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
          <p>COUNT</p>
        <!-- InstanceEndEditable --></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" --><form action="add_bill.php" method="post" name="quotation_form" lang="quotation_form" onsubmit="return bill_validation();">
          <br />
                  <table width="810" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="22" height="25">&nbsp;</td>
                      <td width="170" align="left">&nbsp;</td>
                      <td width="173" align="center">Total Amount</td>
                      <td width="195" align="center">
                        <input name="price_1" type="text"   class="body_text" id="price_1" style="text-align:right" size="12" />
                      </td>
                      
                      <td width="193" align="center">&nbsp;</td>
                      <td width="57">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="25">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                      <td align="center">Initially Payment</td>
                      <td align="center">
                        <input name="qty_1" type="text" class="body_text" id="qty_1" size="12" onkeyup="cal_total();" style="text-align:right" onkeydown="gen_new_item(event,'item_div_2','2');"/>
                     </td>
                      
                      <td align="center">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="25">&nbsp;</td>
                      <td align="left"><!--<button id="create-user" type="button">+ New Product</button>--></td>
                      <td align="center">Rest Amount</td>
                      <td align="center">
                        
                        <input name="amount_1" type="text" class="body_text" id="amount_1" style="text-align:right" size="12" readonly="readonly"/>
                      </td>
                      
                      <td align="center">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="25">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                      <td align="center">Interest</td>
                      <td align="center"><input name="net_total" type="text" class="body_text" id="net_total" style="text-align:right" size="12" readonly="readonly"/></td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      
                    </tr>
                    <tr>
                      
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">Months</td>
                      <td align="center"><span class="red_text">
                        <input name="cash" type="text" class="body_text" id="cash" style="text-align:right" size="12" onkeyup="cal_total();"/>
                      </span></td>
                      <td align="center">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                     
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">Interest for Months</td>
                      <td align="center"><span class="red_text">
                        <input name="change" type="text" class="body_text" id="change" style="text-align:right" size="12" readonly="readonly"/>
                      </span></td>
                      <td align="center">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">Totally Payment for Month</td>
                      <td align="center">
                        <input name="t_pay" type="text" class="body_text" id="t_pay" style="text-align:right" size="12" readonly="readonly"/>
                      </td>
                      <td align="center">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    
                   
                    <tr>
                      <td height="25" colspan="9">
                      <div id="qty_div_1" class="red_text" align="center"></div>
                      <table width="810" border="0" cellspacing="0" cellpadding="0">
                        
                      </table>
                      <input name="count_item" type="hidden" value="1" id="count_item"/>
                      <div id="item_div_2"></div>
                      </td>
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