
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
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script src="../javascript/mes_display.js" type="text/javascript"></script>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../jquery/jquery.autocomplete.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script language="JavaScript" src="../jquery/jquery.ui.all.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/ui.datepicker.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
$(document).ready(function() {	
	$('#f_date').datepicker({dateFormat: 'yy-mm-dd'});
	$('#t_date').datepicker({dateFormat: 'yy-mm-dd'});
	$('#dte').datepicker({dateFormat: 'yy-mm-dd'});
	search_bills('0');
	
});
function search_bills(page){
	var cus_name="";
	if(document.getElementById("veh")){
		cus_name=$('#veh').val();
	}
	$('#bill_div').html('<p><img src="../images/loading.gif"/></p>');
	$('#bill_div').load("search_cus_bill.php",{'bill_no':$('#bill_no').val(),'po':$('#po').val(),'cus':$('#cus').val(),'st':$('#st').val(),'f_date':$('#f_date').val(),'t_date':$('#t_date').val(),'page':page});
}

function form_submission(form_id){
	document.forms[form_id].submit();
}

/*<?php /*?>function display_customer(div_id,type){
	if(type == "Inhouse_Guest"){
		$('#'+div_id).load("load_custmer.php");
	}else{
		$('#'+div_id).load("empty.php");
	}
}<?php */?>*/
function customer(){
   $("#cus_name").autocomplete("js_customer.php", {
		width: 190,
		matchContains: true,
		selectFirst: false
	});
	$("#cus_name").result(function(event, data, formatted) {
	});	
}

$(document).keyup(function(e) {
  if (e.keyCode == 113) {//Press F2 for load bill
  	window.location='bill.php';
  }else if (e.keyCode == 115) {//Press F4 for help
  	//window.location='help.php';
	window.open ("help.php", "mywindow","location=1,status=1,scrollbars=1,width=700,height=530");
  }
});

function delete_bill(bill_id){
	if(confirm("Do you want to cancel this bill?")){
		document.location='delete_bill.php?bill_id='+bill_id;
	}
}

function assign_activity_status(bill_id){
	var activity_status = "status_"+bill_id;
	var act_status = $('#'+activity_status).val();
window.location = 'update_activity_status.php?bill_id='+bill_id+'&activity_status='+act_status;
	
}

function assign_pay_type(bill_id){
	var pay_type = "statu_"+bill_id;
	var act_statu = $('#'+pay_type).val();
window.location = 'update_pay_type.php?bill_id='+bill_id+'&pay_type='+act_statu;
	
}


/*function load_cus_type(){
	//alert("iiii");
	if($('#cus_type').val()=="Inhouse_Guest"){
		$('#pay_div').load("load_customer.php");
	}else {
		$('#pay_div').load("empty1.php");
    }

}*/
function daily_amount(){
		//alert('ddsdsds');
		var date = $('#dte').val();
		$('#bill_div').load("daily_amount.php",{'date':$('#dte').val()});
		
		//window.location ='daily_amount.php?date='+date;
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
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" --><p>&nbsp;</p>
      <table width="820" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr class="body_text">
          <td align="center" class="rounded-corners"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="body_text">
              <td height="25" colspan="7" align="left" class="page_title_text">SEARCH BILLS</td>
            </tr>
            <tr class="body_text">
              <td width="172" height="25" align="left">Bill No</td>
              <td width="16" align="center">:</td>
              <td colspan="2" align="left"><input name="bill_no" type="text" class="body_text" id="bill_no" size="15" /></td>
              <td width="142" align="center">Date</td>
              <td width="32" align="center">:</td>
              <td width="353" align="left">From
                <input name="f_date" type="text" class="body_text" id="f_date" size="10"/>
                To
                <input name="t_date" type="text" class="body_text" id="t_date" size="10"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Customer</td>
              <td align="center">:</td>
              <td colspan="5" align="left"><input name="cus" type="text" class="body_text" id="cus" size="15" />                <div id="pay_div"></div></td>
              </tr>
            
            <tr class="body_text">
              <td height="25" align="left">Pending/Complete</td>
              <td align="center">:</td>
              <td width="180" align="left"><input name="st" type="text" class="body_text" id="st" size="15" /></td>
              <td width="5" align="left">&nbsp;</td>
              <td align="center">PO</td>
              <td align="center">:</td>
              <td align="left"><input name="po" type="text" class="body_text" id="po" size="20" /></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left"><div id="staff_div"></div></td>
              <td align="center">&nbsp;</td>
              <td colspan="2" align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="left"><input type="image" src="../images/search.gif" name="search" id="search" value="Submit" onclick="search_bills('0')"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" colspan="7" align="center"><div id="helpdiv" class="red_text" align="center">
                <?php if(isset($_SESSION['bill_del_mes'])){echo $_SESSION['bill_del_mes'];}?>
              </div></td>
              
            </tr>
          </table></td>
        </tr>
      </table>
      <br/>
          <div id="bill_div" align="center"></div><!-- InstanceEndEditable --></td>
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