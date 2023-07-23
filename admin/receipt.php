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
<script src="../javascript/mes_display.js" type="text/javascript"></script>
<script src="../jquery/jquery.js" type="text/javascript"></script>

<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/ui.datepicker.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../jquery/jquery.ui.all.js" type="text/javascript"></script>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->


<script language="javascript">
var text;
var nVowels;
var txte;
var old_txt;
var consonants= new Array()
var consonantsUni= new Array()
var vowels= new Array()
var vowelsUni= new Array()
var vowelModifiersUni= new Array()
var specialConsonants= new Array()
var specialConsonantsUni= new Array()
var specialCharUni= new Array()
var specialChar= new Array()



    vowelsUni[0]='ඌ';    vowels[0]='oo';    vowelModifiersUni[0]='ූ';
    vowelsUni[1]='ඕ';    vowels[1]='o\\)';    vowelModifiersUni[1]='ෝ';
    vowelsUni[2]='ඕ';    vowels[2]='oe';    vowelModifiersUni[2]='ෝ';
    vowelsUni[3]='ආ';    vowels[3]='aa';    vowelModifiersUni[3]='ා';
    vowelsUni[4]='ආ';    vowels[4]='a\\)';    vowelModifiersUni[4]='ා';
    vowelsUni[5]='ඈ';    vowels[5]='Aa';    vowelModifiersUni[5]='ෑ';
    vowelsUni[6]='ඈ';    vowels[6]='A\\)';    vowelModifiersUni[6]='ෑ';
    vowelsUni[7]='ඈ';    vowels[7]='ae';    vowelModifiersUni[7]='ෑ';
    vowelsUni[8]='ඊ';    vowels[8]='ii';    vowelModifiersUni[8]='ී';
    vowelsUni[9]='ඊ';    vowels[9]='i\\)';    vowelModifiersUni[9]='ී';
    vowelsUni[10]='ඊ';    vowels[10]='ie';    vowelModifiersUni[10]='ී';
    vowelsUni[11]='ඊ';    vowels[11]='ee';    vowelModifiersUni[11]='ී';
    vowelsUni[12]='ඒ';    vowels[12]='ea';    vowelModifiersUni[12]='ේ';
    vowelsUni[13]='ඒ';    vowels[13]='e\\)';    vowelModifiersUni[13]='ේ';
    vowelsUni[14]='ඒ';    vowels[14]='ei';    vowelModifiersUni[14]='ේ';
    vowelsUni[15]='ඌ';    vowels[15]='uu';    vowelModifiersUni[15]='ූ';
    vowelsUni[16]='ඌ';    vowels[16]='u\\)';    vowelModifiersUni[16]='ූ';
    vowelsUni[17]='ඖ';    vowels[17]='au';    vowelModifiersUni[17]='ෞ';
    vowelsUni[18]='ඇ';    vowels[18]='/\a';    vowelModifiersUni[18]='ැ';
    
    vowelsUni[19]='අ';    vowels[19]='a';    vowelModifiersUni[19]='';
    vowelsUni[20]='ඇ';    vowels[20]='A';    vowelModifiersUni[20]='ැ';
    vowelsUni[21]='ඉ';    vowels[21]='i';    vowelModifiersUni[21]='ි';
    vowelsUni[22]='එ';    vowels[22]='e';    vowelModifiersUni[22]='ෙ';
    vowelsUni[23]='උ';    vowels[23]='u';    vowelModifiersUni[23]='ු';
    vowelsUni[24]='ඔ';    vowels[24]='o';    vowelModifiersUni[24]='ො';
    vowelsUni[25]='ඓ';    vowels[25]='I';    vowelModifiersUni[25]='ෛ';
    nVowels=26;

    specialConsonantsUni[0]='ං'; specialConsonants[0]=/\\n/g;
    specialConsonantsUni[1]='ඃ'; specialConsonants[1]=/\\h/g;
    specialConsonantsUni[2]='ඞ'; specialConsonants[2]=/\\N/g;
    specialConsonantsUni[3]='ඍ'; specialConsonants[3]=/\\R/g;
    //special characher Repaya
    specialConsonantsUni[4]='ර්'+'\u200D'; specialConsonants[4]=/R/g;
    specialConsonantsUni[5]='ර්'+'\u200D'; specialConsonants[5]=/\\r/g;
    
    consonantsUni[0]='ඬ'; consonants[0]='nnd';
    consonantsUni[1]='ඳ'; consonants[1]='nndh';
    consonantsUni[2]='ඟ'; consonants[2]='nng';
    consonantsUni[3]='ථ'; consonants[3]='Th';
    consonantsUni[4]='ධ'; consonants[4]='Dh';
    consonantsUni[5]='ඝ'; consonants[5]='gh';
    consonantsUni[6]='ඡ'; consonants[6]='Ch';
    consonantsUni[7]='ඵ'; consonants[7]='ph';
    consonantsUni[8]='භ'; consonants[8]='bh';
    consonantsUni[9]='ශ'; consonants[9]='sh';
    consonantsUni[10]='ෂ'; consonants[10]='Sh';
    consonantsUni[11]='ඥ'; consonants[11]='GN';
    consonantsUni[12]='ඤ'; consonants[12]='KN';
    consonantsUni[13]='ළු'; consonants[13]='Lu';
    consonantsUni[14]='ද'; consonants[14]='dh';
    consonantsUni[15]='ච'; consonants[15]='ch';
    consonantsUni[16]='ඛ'; consonants[16]='kh';
    consonantsUni[17]='ත'; consonants[17]='th';
    
    consonantsUni[18]='ට'; consonants[18]='t';
    consonantsUni[19]='ක'; consonants[19]='k';    
    consonantsUni[20]='ඩ'; consonants[20]='d';
    consonantsUni[21]='න'; consonants[21]='n';
    consonantsUni[22]='ප'; consonants[22]='p';
    consonantsUni[23]='බ'; consonants[23]='b';
    consonantsUni[24]='ම'; consonants[24]='m';   
    consonantsUni[25]='‍ය'; consonants[25]='\\u005C' + 'y';
    consonantsUni[26]='‍ය'; consonants[26]='Y';
    consonantsUni[27]='ය'; consonants[27]='y';
    consonantsUni[28]='ජ'; consonants[28]='j';
    consonantsUni[29]='ල'; consonants[29]='l';
    consonantsUni[30]='ව'; consonants[30]='v';
    consonantsUni[31]='ව'; consonants[31]='w';
    consonantsUni[32]='ස'; consonants[32]='s';
    consonantsUni[33]='හ'; consonants[33]='h';
    consonantsUni[34]='ණ'; consonants[34]='N';
    consonantsUni[35]='ළ'; consonants[35]='L';
    consonantsUni[36]='ඛ'; consonants[36]='K';
    consonantsUni[37]='ඝ'; consonants[37]='G';
    consonantsUni[38]='ඨ'; consonants[38]='T';
    consonantsUni[39]='ඪ'; consonants[39]='D';
    consonantsUni[40]='ඵ'; consonants[40]='P';
    consonantsUni[41]='ඹ'; consonants[41]='B';
    consonantsUni[42]='ෆ'; consonants[42]='f';
    consonantsUni[43]='ඣ'; consonants[43]='q';
    consonantsUni[44]='ග'; consonants[44]='g';
    //last because we need to ommit this in dealing with Rakaransha
    consonantsUni[45]='ර'; consonants[45]='r';

    specialCharUni[0]='ෲ'; specialChar[0]='ruu';
    specialCharUni[1]='ෘ'; specialChar[1]='ru';
    //specialCharUni[2]='්‍ර'; specialChar[2]='ra';
    

function startText() {
    var s,r,v;
    text = document.rec_form.amount_inword_type.value;  
    //special consonents
    for (var i=0; i<specialConsonants.length; i++){
        text = text.replace(specialConsonants[i], specialConsonantsUni[i]);
    }
    //consonents + special Chars
    for (var i=0; i<specialCharUni.length; i++){
        for (var j=0;j<consonants.length;j++){
            s = consonants[j] + specialChar[i];
            v = consonantsUni[j] + specialCharUni[i];
            r = new RegExp(s, "g");
            text = text.replace(r, v);
        }
    }
    //consonants + Rakaransha + vowel modifiers
    for (var j=0;j<consonants.length;j++){
        for (var i=0;i<vowels.length;i++){
            s = consonants[j] + "r" + vowels[i];
            v = consonantsUni[j] + "්‍ර" + vowelModifiersUni[i];
            r = new RegExp(s, "g");
            text = text.replace(r, v);
        }
        s = consonants[j] + "r";
        v = consonantsUni[j] + "්‍ර";
        r = new RegExp(s, "g");
        text = text.replace(r, v);
    }
    //consonents + vowel modifiers
    for (var i=0;i<consonants.length;i++){
        for (var j=0;j<nVowels;j++){ 
            s = consonants[i]+vowels[j];
            v = consonantsUni[i] + vowelModifiersUni[j];
            r = new RegExp(s, "g");
            text = text.replace(r, v);
        }
    }

    //consonents + HAL
    for (var i=0; i<consonants.length; i++){
        r = new RegExp(consonants[i], "g");
        text = text.replace(r, consonantsUni[i]+"්");
    }
        
    //vowels
    for (var i=0; i<vowels.length; i++){
        r = new RegExp(vowels[i], "g");
        text = text.replace(r, vowelsUni[i]);
    }

    document.rec_form.amount_inword.value=text;
}

function copyit(theField) {
    var tempval=eval("document."+theField);
    tempval.focus();
    tempval.select();
    therange=tempval.createTextRange();
    therange.execCommand("Copy")
}

var schemeVisible = 0;
function changeVisibility(){
    if (schemeVisible){
        document.getElementById('scheme').style.visibility='hidden';
        document.getElementById('link').innerHTML="&nbsp;Show Transliteration Scheme&nbsp;";
        schemeVisible=0;
    }
    else{
        document.getElementById('scheme').style.visibility='visible';
        document.getElementById('link').innerHTML="&nbsp;&nbsp;Hide Transliteration Scheme&nbsp;";
        schemeVisible=1;
    }
}
function rec_validation(){
	with(document.rec_form){
		valid=true;
		if(name.value == ""){
			valid=false;
			alert("Enter rec Name");
			name.focus();
		}
		return valid;
	}
}


$(document).ready(function (){
	$('#date').datepicker({dateFormat: 'yy-mm-dd'});
	
});

function form_submission(button_id,form_id){
	if(rec_validation()){
		document.getElementById(button_id).style.display="none";
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
          <p>&nbsp;</p>
        <!-- InstanceEndEditable --></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left" id="cbody"><!-- InstanceBeginEditable name="Editable_Body" -->
        <form action="add_reciept.php" method="post" name="rec_form" id="book_form" enctype="multipart/form-data" onsubmit="return rec_validation();">
          <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" class="rounded-corners"><table width="519" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr class="body_text">
                  <td height="25" colspan="3" align="center" class="page_title_text">ADD RECEIPTS DETAILS / රිසිට් පතක් නිකුත් කිරීම </td>
                </tr>
                <tr class="body_text">
                  <td width="210" height="25" align="left"><pre>  Name of the Recipient / නම</td>
                  <td width="21" align="center">:</td>
                  <td width="288" align="left"><input name="name" type="text" class="body_text" id="name" size="50" /></td>
                </tr>
                <tr class="body_text">
                  <td width="210" height="25" align="left">
                    <pre>  Oblation / පුජාවේ නම </td>
                  <td align="center">:</td>
                  <td align="left">
				  
				  <select name="oblation">
				  	<option> -- තෝරන්න -- </option>
					<?php
				  $oblation_result = mysql_query("SELECT `idOblation`, `name` FROM `oblation`") or die(mysql_error());
				  while($oblation_data = mysql_fetch_assoc($oblation_result)){
				  ?>
					<option value="<?php echo $oblation_data['name']; ?>"> <?php echo $oblation_data['name']; ?> </option>
					<?php
				  }
					?>
					<option value="වෙනත්"> වෙනත් </option>
				  </select>
				  </td>
                </tr>
				<tr class="body_text">
                  <td width="210" height="25" align="left">
                    <pre>  Fane / දේවාලයේ නම </td>
                  <td align="center">:</td>
                  <td align="left">
				  <select name="fane">
				  	<option> -- තෝරන්න -- </option>
					<?php
				  $fane_result = mysql_query("SELECT `name` FROM `fane`") or die(mysql_error());
				  while($fane_data = mysql_fetch_assoc($fane_result)){
				  ?>
					<option value="<?php echo $fane_data['name']; ?>"> <?php echo $fane_data['name']; ?> </option>
					<?php
				  }
					?>
					<option value="වෙනත්"> වෙනත් </option>
				  </select>
				  </td>
                </tr>
                <tr class="body_text">
                  <td width="210" height="25" align="left"><pre>  Amount / මුදල</td>
                  <td align="center">:</td>
                  <td align="left"><input name="amount" type="text" class="body_text" id="amount" size="20" /></td>
                </tr>
                <tr class="body_text">
                  <td width="210" height="25" align="left"><pre>  Amount inword / මුදල අකුරින් </td>
                  <td align="center">:</td>
                  <td align="left">
				  
				  <input name="amount_inword_type" type="text" class="body_text" id="amount_inword_type" size="20" onkeyup="startText()" onselect="startText()" onclick="startText()" style="font-size:12px;" />
				  <input name="amount_inword" type="text" class="body_text" id="amount_inword" size="10" style="font-size:12px; border:none; text-align:right;" readonly="readonly"  />
				  ක </td>
                </tr>
                
                <tr class="body_text">
                  <td width="210" height="25" align="left" valign="top"> <pre>  Address / ලිපිනය</td>
                  <td align="center" valign="top">:</td>
                  <td align="left"><textarea name="address" cols="47" rows="4" class="body_text" id="address"></textarea></td>
                </tr>
                <tr class="body_text">
                  <td width="210" height="25" align="left">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left"><img src="../images/add.gif" width="65" height="35" id="add" style="cursor:pointer" onclick="form_submission('add','rec_form');"/></td>
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