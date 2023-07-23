
<?php
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- InstanceBeginEditable name="doctitle" -->
        <title>SYSTEM</title>
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
            <link href="../css/style.css" rel="stylesheet" type="text/css" /><!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
            <script language="javascript">

                $(document).ready(function() {
                    customer();
                    //load_cus_type();
                    //get_token();
                    $('#p_id_1').focus();
                });



                $(document).keyup(function(e) {
                    if (e.keyCode == 113) {//Press F2 for load bill
                        window.location = 'bill.php';
                    } else if (e.keyCode == 115) {//Press F1 for help
                        var field_name = window.document.activeElement.id;
                        window.open("help.php?active_field=" + field_name, "mywindow", "location=1,status=1,scrollbars=1,width=700,height=530");
                    }
                });
                token
                function gen_item(div_id, num) {
                    $('#' + div_id).load("generate_item.php", {'num': num});
                }

                function get_token() {
                    $('#token').load("token_type.php");
                }


                function gen_new_item(evt, div_id, num) {
                    var keyCode;
                    if ("which" in evt) {// NN4 & FF &amp; Opera
                        keyCode = evt.which;
                    } else if ("keyCode" in evt) {// Safari & IE4+
                        keyCode = evt.keyCode;
                    } else if ("keyCode" in window.event) {// IE4+
                        keyCode = window.event.keyCode;
                    } else if ("which" in window.event) {
                        keyCode = evt.which;
                    } else {
                        //alert("the browser don't support");  
                    }
                    $ck_qty = 'qty_' + (num - 1);
                    if (keyCode == 13) {//Press Enter
                        if ($('#' + $ck_qty).val() == "") {
                            alert("Enter Quantity");
                            $('#' + $ck_qty).focus();
                        } else {
                            //alert(num);
                            //alert($('#count_item').val());
                            load_new_item(div_id, num);
                            $('#count_item').val(num);
                        }
                    } else if (keyCode == 35) {//Press End
                        if ($('#' + $ck_qty).val() == "") {
                            alert("Enter Quantity");
                            $('#' + $ck_qty).focus();
                        } else {
                            $('#cash').focus();
                        }
                    }
                }

                function focus_cash(evt) {
                    var keyCode;
                    if ("which" in evt) {// NN4 & FF &amp; Opera
                        keyCode = evt.which;
                    } else if ("keyCode" in evt) {// Safari & IE4+
                        keyCode = evt.keyCode;
                    } else if ("keyCode" in window.event) {// IE4+
                        keyCode = window.event.keyCode;
                    } else if ("which" in window.event) {
                        keyCode = evt.which;
                    } else {
                        //alert("the browser don't support");  
                    }

                    if (keyCode == 13) {//Press End
                        $('#cash').focus();
                    }
                }

                function set_cursor(evt, qty) {
                    var keyCode;
                    if ("which" in evt) {// NN4 & FF &amp; Opera
                        keyCode = evt.which;
                    } else if ("keyCode" in evt) {// Safari & IE4+
                        keyCode = evt.keyCode;
                    } else if ("keyCode" in window.event) {// IE4+
                        keyCode = window.event.keyCode;
                    } else if ("which" in window.event) {
                        keyCode = evt.which;
                    } else {
                        //alert("the browser don't support");  
                    }

                    if (keyCode == 9) {
                        $('#' + qty).focus();
                    }
                }
                function set_submission(evt, button_id, form_id) {
                    var keyCode;
                    if ("which" in evt) {// NN4 & FF &amp; Opera
                        keyCode = evt.which;
                    } else if ("keyCode" in evt) {// Safari & IE4+
                        keyCode = evt.keyCode;
                    } else if ("keyCode" in window.event) {// IE4+
                        keyCode = window.event.keyCode;
                    } else if ("which" in window.event) {
                        keyCode = evt.which;
                    } else {
                        //alert("the browser don't support");  
                    }

                    if (keyCode == 13) {// press enter
                        form_submission(button_id, form_id);
                    }
                }



                $(document).keyup(function(e) {
                    if (e.keyCode == 17) {//Press Ctrl to Delete the Div
                        var num = parseFloat($('#count_item').val());
                        if (num != 1) {
                            var div_id = "item_div_" + num;
                            delete_div(div_id);
                            var new_num = parseFloat($('#count_item').val()) - 1;
                            ;
                            $('#count_item').val(new_num);
                        }
                    }
                });



                function menu(menu_name, price) {
                    $("#" + menu_name).autocomplete("menu_load.php", {
                        width: 275,
                        matchContains: true,
                        selectFirst: false
                    });
                    $("#" + menu_name).result(function(event, data, formatted) {

                        //$("#"+menu_name).val(data[2]);
                        $("#" + price).val(data[1]);
                        //$("#"+menu_price).val(data[3]);

                    });
                }

                function get_cus() {
                    $('#ozTbl').load('getReturnTable.php?bill_id=' + $('#ino').val());
                }

                function get_date() {
                    $.ajax({
                        type: 'POST',
                        url: "get_date.php?l_bill_no=" + $("#l_bill_no").val(),
                        // call php function , phpFunction=function Name , x= parameter 
                        data: {},
                        success: function(data1) {
                            //alert('g');
                            var arr = data1.split("|");



                            var no = arr[0];



                            $("#l_date").val(no);

                            document.getElementById("l_date").style.display = "block";

                            document.getElementById("l_date_label").style.display = "block";





                        }
                    });

                }
                /*function service_id(item_name,item_id,price,p_id,div_id,qty,p_no,qty_id){
                 $("#"+p_id).autocomplete("js_service_id.php", {
                 width: 275,
                 matchContains: true,
                 selectFirst: true
                 });
                 $("#"+p_id).result(function(event, data, formatted) {
                 $("#"+item_id).val(data[1]);
                 $("#"+price).val(data[2]);
                 $("#"+item_name).val(data[3]);
                 $("#"+p_no).val(data[4]);
                 $("#"+p_id).val(data[4]);
                 check_stock(div_id,data[1],qty,data[3],qty_id);
                 cal_total();
                 $('#'+qty_id).focus();
                 });	
                 }*/





                function delete_service(quo_id, quot_ser_id, qty, price) {
                    if (confirm("Do you want to delete this record?")) {
                        window.location = 'delete_quotation_service.php?quo_id=' + quo_id + '&quot_ser_id=' + quot_ser_id + '&qty=' + qty + '&price=' + price;
                    }
                }

                function cal_total() {
                    var count_item = $('#count_item').val();
                    var i = 1;
                    var total_amount = 0;
                    var total_discount = 0;
                    var net_amount = 0;
                    //var service_charge=0
                    for (i = 1; i <= count_item; i++) {
                        var price = "price_" + i;
                        var qty_name = "qty_" + i;
                        var amount = "amount_" + i;
                        //var discount="discount_"+i;

                        /*if(document.getElementById(free).checked == true){
                         $('#'+amount).val(0);
                         }else{*/
                        if (document.getElementById(price) && $('#' + price).val() != "") {
                            var qty = 1;
                            if ($('#' + qty_name).val() == "") {
                                qty = 1;
                            } else {
                                qty = $('#' + qty_name).val();
                            }

                            /*if($('#'+discount).val() != ""){
                             total_discount +=roundNumber((parseFloat($('#'+discount).val())*parseFloat(qty)),2);
                             }*/

                            $('#' + amount).val(roundNumber((parseFloat($('#' + price).val()) * parseFloat(qty)), 2));
                            total_amount += parseFloat($('#' + price).val()) * parseFloat(qty);
                        }
                    }
                    //}

                    var d_amount = 0;

                    if (document.getElementById('discount')) {

                        if ($('#discount').val() != "") {
                            d_amount = roundNumber((((parseFloat(total_amount) - parseFloat(total_discount)) * parseFloat($('#discount').val())) / 100), 2);
                        }
                    } else {
                        d_amount = parseFloat(total_discount);
                    }

                    total_amount = total_amount;
                    //net_amount =parseFloat(total_amount)-parseFloat(d_amount);




                    /*if($('#add_discount').val() != ""){
                     net_amount -=parseFloat($('#add_discount').val());
                     }*/
                    net_amount += ((parseFloat(total_amount) - parseFloat(d_amount)))
                    ser_charge = 1

                    $('#g_discount').val(d_amount);
                    $('#total').val(roundNumber(total_amount, 2));


                    if ($("#dis").val() == '') {
                        $("#change").val() == '';
                    } else {
                        $('#tot').val(roundNumber((parseFloat($('#total').val()) - parseFloat($('#total').val() * $("#dis").val() / 100)), 2));
                        $('#tot_direct').val(roundNumber((parseFloat($('#tot').val() * $("#dis2").val() / 100)), 2));


                    }
                }



                function roundNumber(num, dec) {
                    var result = Math.round(num * Math.pow(10, dec)) / Math.pow(10, dec);
                    return result;
                }

                function bill_validation() {
                    with (document.quotation_form) {
                        valid = true;
                        if (cus_type.selectedIndex == 0) {
                            valid = false;
                            alert("Select Customer Type");
                            cus_type.focus();
                        } else if (cus_type.value == "Saff Member" && document.getElementById('cus_id') && $('#cus_id').val() == "") {
                            valid = false;
                            alert("Enter Staff Member Name");
                            $('#cus_name').focus();
                        } else if (cus_type.value == "Institutional Customer" && document.getElementById('cus_id') && $('#cus_id').val() == "") {
                            valid = false;
                            alert("Enter Customer Name OR Company Name");
                            $('#cus_name').focus();
                        } else {
                            var i = 1;
                            var status = 0;
                            for (i = 1; i <= $('#count_item').val(); i++) {
                                if (status == 0) {
                                    var item_id = "item_id_" + i;
                                    var item_name = "item_" + i;
                                    var price = "price_" + i;
                                    var qty = "qty_" + i;
                                    if (document.getElementById(item_id) && $('#' + item_id).val() == "") {
                                        valid = false;

                                        status = 1;
                                        alert("Enter Steward Name");
                                        $('#' + item_name).focus();
                                    } else if (($('#' + qty).val() == "" || $('#' + qty).val() == 0) && status == 0) {
                                        valid = false;
                                        status = 1;
                                        alert("Enter Quantity");
                                        $('#' + qty).focus();
                                    } else if ($('#' + price).val() == "" && status == 0) {
                                        valid = false;
                                        status = 1;
                                        alert("Enter Price");
                                        $('#' + price).focus();

                                    }
                                }
                            }
                            if (status == 0 && (parseFloat($('#net_total').val()) > parseFloat($('#cash').val()))) {
                                valid = false;
                                alert("Cash Amount should be greater than Net Amount");
                                $('#cash').focus();
                            }
                        }

                        return valid;
                    }
                }

                function form_submission(button_id, form_id) {
                    if (true) {
                        document.getElementById(button_id).style.display = "none";
                        document.forms[form_id].submit();
                    }
                }

                function customer() {
                    $("#cus_name").autocomplete("js_customer.php", {
                        width: 200,
                        matchContains: true,
                        selectFirst: false
                    });
                    $("#cus_name").result(function(event, data, formatted) {
                        $("#cus_id").val(data[1]);
                        $("#discount").val(data[2]);
                        cal_total();
                    });
                }

                function bulk_customer() {
                    $("#cus_name").autocomplete("js_bulk_customer.php", {
                        width: 200,
                        matchContains: true,
                        selectFirst: false
                    });
                    $("#cus_name").result(function(event, data, formatted) {
                        $("#cus_id").val(data[1]);
                        $("#com_name").val(data[3]);
                        cal_total();
                    });
                }

                function company_name() {
                    $("#com_name").autocomplete("js_company.php", {
                        width: 274,
                        matchContains: true,
                        selectFirst: false
                    });
                    $("#com_name").result(function(event, data, formatted) {
                        $("#cus_id").val(data[1]);
                        $("#cus_name").val(data[3]);
                        cal_total();
                    });
                }



                function del_div(div_id) {
                    $('#' + div_id).load("empty.php");
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
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" --><form action="add_rbill.php" method="post" name="quotation_form" lang="quotation_form" onsubmit="return bill_validation();">
                                    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td class="rounded-corners">
                                                <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td height="35" align="left" class="page_title_text" style="padding-left:15pt;">ADD RETURN BILL</td>
                                                    </tr>
                                                </table>
                                                <table width="475" border="0" align="center" cellpadding="0" cellspacing="0">
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
                                                        <td height="25" colspan="3" align="left">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                                <tr class="body_text">
                                                                    <td width="175" height="25" align="left">Bill No</td>
                                                                    <td width="20" align="center">:</td>
                                                                    <td align="left"><select name="ino" class="body_text" id="ino" onchange="get_cus();">
                                                                            <option value="">Select Bill No</option>
                                                                            <?php ino(""); ?>
                                                                        </select></td>
                                                                </tr>
                                                            </table>
                                                            <div align="center" id="pay_div"></div>
                                                            <div align="center" id="pay_div2"></div>
                                                        </td>
                                                    </tr>

                                                    <tr class="body_text">
                                                        <td width="175" height="25" align="left">Today</td>
                                                        <td width="20" align="center">:</td>
                                                        <td width="280" align="left"><input name="t_date" type="text" class="body_text" id="t_date" style="text-align:left" size="24" value='<?php echo date('Y-m-d'); ?>'/></td>
                                                    </tr>
                                                    <tr class="body_text">
                                                        <td colspan="3" align="left"><div id="token" > </div></td>
                                                    </tr>
                                                </table>
                                                <p>&nbsp;</p>
                                                <div id="cus_div" align="center"></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <br />
                                    <div id="ozTbl">

                                    </div>
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
