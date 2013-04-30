<? 
session_start();
require_once("../config/db_connect.php");
 
if($_REQUEST['err'] == "LogOut")
{
  $_SESSION['admin']="";
  session_destroy();
}
if (isset($_POST['txt_pwd'])<>"") {
  $userid	= $_POST['txt_userid'];
  $pwd		=  base64_encode($_POST['txt_pwd']);
  $sql		= "select * from admin where email = '$userid' and password = '$pwd' ";
  $rs		= mysql_query($sql);
  
  if(mysql_num_rows($rs)>0) {
	$a_row	= mysql_fetch_object($rs);
	$_SESSION['admin']		= $a_row->id;
	$_SESSION['admin_name']	= $a_row->fname;
	$_SESSION['admin_type']	= $a_row->admin_type;
	
	?> <script language="javascript">
		location.href="user.php?frm=admin_panel";
	   </script> 
	   <? exit;
  }
  else {
	$_SESSION['admin']="";
	?> <script language="javascript">
		location.href="index.php?err=InvalidUser";
	   </script> <? exit;
  }
}
	
?>
<HTML><HEAD><TITLE><? print SITE_TITLE; ?></TITLE>
<META content="text/html; charset=iso-8859-1" http-equiv=Content-Type>
<META content="MSHTML 5.00.2920.0" name=GENERATOR>
<STYLE type=text/css>
</STYLE>
<script language="javascript">
function validate() {
	if(document.frm_login.txt_userid.value == "") {
		alert("Please Enter User Email");
		return false;
	}
	else if(document.frm_login.txt_pwd.value == "") {
		alert("Please Enter Password");
		return false;
	}
	else {
		return true;
	}
}
</script>
<LINK href="../css/style-admin.css" rel=stylesheet type=text/css>
<link rel="shortcut icon" type="image/x-icon" href="../images/logo/<?php echo SITE_FAVICON; ?>"/>
</HEAD>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-4590513-3";
urchinTracker();
</script>
<BODY leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<table border="0" cellPadding="5" cellSpacing="0" width="950" height="100%" align="center">
 <tr><td align="center">
  <form action="index.php" name="frm_login" method="post" onSubmit="return validate();">
	
	   <div class="header_login"></div>

     
         <div class="login_form">
         
         <h3>Admin Panel Login</h3>
         
         <a href="forgate.php" class="forgot_pass">Forgot password</a> 
        
		  <table align="center" border="0" cellPadding="0" cellSpacing="0" width="80%">
		   
			<tr valign="middle">
			  <td colspan="3" align="center" class="errmsg" height="22" style="border-left:1px #FFFFFF solid; border-right:1px #FFFFFF solid; padding-bottom:3px;">
			  <? 
			  if($_REQUEST['err']=="InvalidUser"){ print "Invalid User Name or Password !!"; } 
			  else if($_REQUEST['err']=="LogOut"){ print "You are Successfully Logged Out !!"; } 
			  else if($_REQUEST['err']=="SignIn"){ print "Unauthorized Access !!"; } 
			  else if($_REQUEST['err']=="forgot"){ print "<font color='#006600'><b>Your password has been sent to your email. Check your email.</b></font>"; } 
			  else{ print "&nbsp;"; } 
			  ?>
			  </td>
			</tr>
			<tr valign="middle">
			  <td align="right" style="padding-bottom:10px; border-left:1px #FFFFFF solid;"><STRONG>User email :</STRONG></td>
			  <td>&nbsp;</td>
			  <td style="padding-bottom:10px; border-right:1px #FFFFFF solid;"><INPUT name="txt_userid" class="txtfield2"></td>
			</tr>
			<tr valign="middle"><td align="right" style="border-left:1px #FFFFFF solid;"><STRONG>Password :</STRONG></td>
			  <td>&nbsp;</td>
			  <td style="border-right:1px #FFFFFF solid;"><INPUT name="txt_pwd" type="password" class="txtfield2"></td>
			</tr>
			<tr valign="bottom">
			  <td style="border-left:1px #FFFFFF solid; border-right:1px #FFFFFF solid; border-bottom:1px #FFFFFF solid; padding-bottom:3px;" align="center" colspan="3" height="40"><input type="submit" name="btn_login" value="" class="bbtn2" /></td></tr>
		  </table></div>
          </form>
          </td></tr>
	<tr><td height="18" align="center">
	  &copy; Copyright <? //echo date("Y")?> <?PHP echo SITE_COPYRIGHT;?>. All rights reserved.</td>
	</tr>
  
</table>
</BODY>
</HTML>
