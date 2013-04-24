<?
if($_REQUEST['btn_save']=="Submit") 
{

 $sql="select email from tbl_admin where email='".$_POST['temail']."'";
  $rs=mysql_query($sql);
  if(mysql_num_rows($rs)==0) 
  {
  $esql="insert into tbl_admin set 
  fname='".$_POST['tfname']."',
  lname='".$_POST['tlname']."',
  email='".$_POST['temail']."',
  password='".$_POST['tpassword']."',
  admin_type='".$_POST['type']."',
  phone='".$_POST['tphone']."',
  gender='".$_POST['tgender']."',
  baddress1='".$_POST['tbaddress']."',
  bcity='".$_POST['tbcity']."',
  bstate='".$_POST['tbstate']."',
  bzip='".$_POST['tbzip']."',
  bcountry='".$_POST['tbcountry']."',
  sign_in_date='".date("Y-m-d h:i:s")."',
  is_active='".$_POST['tstatus']."' ";
	if(mysql_query($esql));{ ?><script>javascript:location.href="user.php?frm=user_add&err=User Added Successfully";</script><? }
 }
 else
  $msg ="Email already exist our database";	
}
?>

<table width="100%" border="0" align="center" cellspacing="1" cellpadding="2">
<form action="user.php?frm=user_add" name="frm_email" method="post" onSubmit="return validate();">

<tr valign="bottom"><td></td><td align="left"><strong>Account and Contact Info</strong></td></tr>
<?php if($msg){?>
<tr valign="bottom"><td></td><td align="left" style="color:#FF0000;"><strong><?=$msg?></strong></td></tr>
<?php } ?>
<tr valign="middle"><td align="right" valign="top">
First Name
</td><td align="left">
<input name="tfname" type="text" class="txtfield" style="width:350px;" value="<?=$_POST['tfname']?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Last Name
</td><td align="left">
<input name="tlname" type="text" class="txtfield" style="width:350px;" value="<?=$_POST['tlname']?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Email
</td><td align="left">
<input name="temail" type="text" class="txtfield" style="width:350px;" value="<?=$_POST['temail']?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Password
</td><td align="left">
<input name="tpassword" type="text" class="txtfield" style="width:350px;" value="<?=$_POST['tpassword']?>" />
</td></tr>
<tr valign="middle"><td align="right">User Type</td><td align="left">
<table width="50%" align="left" cellpadding="0" cellspacing="0" border="0">
<tr valign="middle"><td width="10%"><input type="radio" name="type" value="2" checked="checked" /></td>
<td width="15%" style="padding-top:2px;">User</td>
<td width="7%"><input type="radio" name="tstatus" value="1"  /></td>
<td width="68%" style="padding-top:2px;">Admin</td>
</tr></table>
</td>
</tr>

<tr valign="middle"><td align="right" valign="top">
Phone/Mobile
</td><td align="left">
<input name="tphone" type="text" class="txtfield" style="width:350px;" value="<?=$_POST['tphone']?>" />
</td></tr>
<tr valign="middle"><td align="right">
Gender
</td><td align="left">
  <table width="50%" align="left" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle"><td width="10%"><input type="radio" name="tgender" value="M" checked="checked" /></td>
	<td width="11%" style="padding-top:2px;">Male</td>
	<td width="8%"><input type="radio" name="tgender" value="F" /></td>
	<td width="71%" style="padding-top:2px;">Female</td>
	</tr>
  </table></td>
</tr>
<tr valign="bottom"><td></td><td height="30" align="left"><strong>Contact Info</strong></td></tr>

<tr valign="middle"><td align="right" valign="top">
Address
</td><td align="left">
<input name="tbaddress" type="text" class="txtfield" style="width:350px;" value="<?=$_POST['tbaddress2']?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
City
</td><td align="left">
<input name="tbcity" type="text" class="txtfield" style="width:350px;" value="<?=$_POST['tbcity']?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
State
</td><td align="left">
<input name="tbstate" type="text" class="txtfield" style="width:350px;" value="<?=$_POST['tbstate']?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Zip
</td><td align="left">
<input name="tbzip" type="text" class="txtfield" style="width:350px;" value="<?=$_POST['tbzip']?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Country
</td><td align="left">
<select name="tbcountry" class="txtfield">
<option value="">Select Country</option>
<?
$sql_c = "select * from tbl_country order by name";
$qry_c = mysql_query($sql_c);
while($row_c = mysql_fetch_object($qry_c)){
  print "<option value='".$row_c->iso."'>".$row_c->name."</option>";
}
?>
</select>
</td></tr>
<tr valign="middle"><td align="right">Status</td><td align="left">
<table width="50%" align="left" cellpadding="0" cellspacing="0" border="0">
<tr valign="middle"><td width="10%"><input type="radio" name="tstatus" value="Y" checked="checked" /></td>
<td width="13%" style="padding-top:2px;">Active</td>
<td width="8%"><input type="radio" name="tstatus" /></td>
<td width="69%" style="padding-top:2px;">Inactive</td>
</tr></table>
</td>
</tr>

<tr align="center" valign="middle">
<td height="40" colspan="2">
<?php if($_SESSION['admin_type']==1) { ?>
<input name="btn_save" type="submit" class="button2" value="Submit" disabled="disabled">
 <?php } ?>
<input type="button" class="button2" value="Cancel" onClick="javascript:location.href='user.php?frm=admin_panel';">
</td>
</tr>
</form>
<SCRIPT language=JavaScript type=text/javascript>
//You should create the validator only after the definition of the HTML form
var frmvalidator  = new Validator("frm_email");
frmvalidator.addValidation("tfname","req","Please enter first name");  
frmvalidator.addValidation("tlname","req","Please enter last name"); 
frmvalidator.addValidation("temail","req","Please enter email"); 
frmvalidator.addValidation("temail","email",""); 
frmvalidator.addValidation("tpassword","req","Please enter password"); 
frmvalidator.addValidation("tpassword","req","Please enter password");
frmvalidator.addValidation("tphone","req","Please enter phone/mobile number");  
frmvalidator.addValidation("tbaddress","req","Please enter address");  
frmvalidator.addValidation("tbcity","req","Please enter city");  
frmvalidator.addValidation("tbstate","req","Please enter state");  
frmvalidator.addValidation("tbzip","req","Please enter zip code");  
frmvalidator.addValidation("tbzip","numeric","");  
frmvalidator.addValidation("tbcountry","req","Please select country");  


</SCRIPT>

</table>
