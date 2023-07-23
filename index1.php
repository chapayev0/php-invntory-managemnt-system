<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> System</title>
<script language="javascript" src="js/login.js"></script>
<script language="javascript" src="js/reset.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form name="log_form" id="log_form" action="login.php" method="post" onsubmit="return login_validation();">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="345" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"></td>
  </tr>
</table>
<table width="350"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEE" >
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td width="100" height="25" align="left" class="body_text">Username</td>
    <td width="20" align="center">&nbsp;</td>
    <td width="200" align="left">
      <input name="uname" type="text" class="body_text" id="uname" size="30" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="25" align="left" class="body_text">Password</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input name="pwd" type="password" class="body_text" id="pwd" size="30" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left">
      <input type="image" src="images/login.gif" name="login" id="login" value="Login" />
      <img src="images/clear.gif" width="65" height="35" style="cursor:pointer" onclick="reset_form('log_form');"/></td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" class="red_text"><?php if(isset($_SESSION['log_error_mes'])){echo $_SESSION['log_error_mes'];}?></td>
    </tr>
</table>
</form>
</body>
</html>
<?php unset($_SESSION['log_error_mes']);?>