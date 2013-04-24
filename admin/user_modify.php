<?
if($_REQUEST['btn_save']=="Submit") {
  $esql="update tbl_user set 
  fname='".$_POST['tfname']."',
  lname='".$_POST['tlname']."',
  email='".$_POST['temail']."',
  password='".$_POST['tpassword']."',
  phone='".$_POST['tphone']."',
  gender='".$_POST['tgender']."',
  bfname='".$_POST['tbfname']."',
  blname='".$_POST['tblname']."',
  bphone='".$_POST['tbphone']."',
  bcompany='".$_POST['tbcompany']."',
  baddtype='".$_POST['tbaddtype']."',
  baddress1='".$_POST['tbaddress1']."',
  baddress2='".$_POST['tbaddress2']."',
  bcity='".$_POST['tbcity']."',
  bstate='".$_POST['tbstate']."',
  bzip='".$_POST['tbzip']."',
  bcountry='".$_POST['tbcountry']."',
  is_active='".$_POST['tstatus']."' where id='".$_POST['id']."'";
	if(mysql_query($esql)){ ?><script>javascript:location.href="user.php?frm=user_edit&err=User Updated successfully";</script><? }
}
?>

<table width="100%" border="0" align="center" cellspacing="1" cellpadding="2">
<form action="user.php?frm=user_modify" name="frm_email" method="post" onSubmit="return validate();">
<?
 $sqlc="select * from tbl_admin where id='".$_REQUEST['id']."'";
$qryc=mysql_query($sqlc);
$rowc=mysql_fetch_object($qryc);

$chkY=""; $chkN="";
if($rowc->is_active == "Y") $chkY="checked"; else $chkN="checked";
if($rowc->gender == "M") $chkM="checked"; else $chkF="checked";
?>
<tr valign="bottom"><td></td><td align="left"><strong>Account and Contact Info</strong></td></tr>
<tr valign="middle"><td align="right" valign="top">
First Name
</td><td align="left">
<input name="tfname" type="text" class="txtfield" style="width:350px;" value="<?=stripslashes($rowc->fname)?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Last Name
</td><td align="left">
<input name="tlname" type="text" class="txtfield" style="width:350px;" value="<?=stripslashes($rowc->lname)?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Email
</td><td align="left">
<input name="temail" type="text" class="txtfield" style="width:350px;" value="<?=stripslashes($rowc->email)?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Password
</td><td align="left">
<input name="tpassword" type="text" class="txtfield" style="width:350px;" value="<?=stripslashes($rowc->password)?>" />
</td></tr>
<tr valign="middle">
  <td align="right" valign="top">
Phone/Mobile</td><td align="left">
<input name="tphone" type="text" class="txtfield" style="width:350px;" value="<?=stripslashes($rowc->phone)?>" />
</td></tr>
<tr valign="middle"><td align="right">
Gender
</td><td align="left">
  <table width="50%" align="left" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle"><td width="10%"><input type="radio" name="tgender" value="M" <?=$chkM?> /></td>
	<td style="padding-top:2px;">Male</td>
	<td width="10%"><input type="radio" name="tgender" value="F" <?=$chkF?> /></td>
	<td style="padding-top:2px;">Female</td></tr>
  </table></td>
</tr>
<tr valign="bottom"><td></td>
<td height="30" align="left"><strong>Contact Info</strong> </td>
</tr>
<tr valign="middle">
  <td align="right" valign="top">
Address</td><td align="left"><input name="tbaddress1" type="text" class="txtfield" style="width:350px;" value="<?=stripslashes($rowc->baddress1)?>" /></td>
</tr>
<tr valign="middle"><td align="right" valign="top">
City
</td><td align="left">
<input name="tbcity" type="text" class="txtfield" style="width:350px;" value="<?=stripslashes($rowc->bcity)?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
State
</td><td align="left">
<input name="tbstate" type="text" class="txtfield" style="width:350px;" value="<?=stripslashes($rowc->bstate)?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Zip
</td><td align="left">
<input name="tbzip" type="text" class="txtfield" style="width:350px;" value="<?=stripslashes($rowc->bzip)?>" />
</td></tr>
<tr valign="middle"><td align="right" valign="top">
Country
</td><td align="left">
<select name="tbcountry" class="txtfield">
<?
$sql_c = "select * from tbl_country order by name";
$qry_c = mysql_query($sql_c);
while($row_c = mysql_fetch_object($qry_c)){
  if($row_c->iso == $rowc->bcountry) $c_sel="selected"; else $c_sel="";
  print "<option value='".$row_c->iso."' $c_sel>".$row_c->name."</option>";
}
?>
</select>
</td></tr>
<tr valign="middle"><td align="right">Status</td><td align="left">
<table width="50%" align="left" cellpadding="0" cellspacing="0" border="0">
<tr valign="middle"><td width="10%"><input type="radio" name="tstatus" value="Y" <?=$chkY?> /></td>
<td style="padding-top:2px;">Active</td>
<td width="10%"><input type="radio" name="tstatus" value="N" <?=$chkN?> /></td>
<td style="padding-top:2px;">Inactive</td></tr></table>
</td>
</tr>

<tr align="center" valign="middle">
<td height="40" colspan="2">
<input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
<input name="btn_save" type="submit" class="button2" value="Submit">
<input type="button" class="button2" value="Cancel" onClick="javascript:location.href='user.php?frm=admin_panel';"></td>
</tr>
</form>
<SCRIPT language=JavaScript type=text/javascript>
//You should create the validator only after the definition of the HTML form
var frmvalidator  = new Validator("frm_email");
frmvalidator.addValidation("tfname","req","Please enter Company Name");  
</SCRIPT>
</table>
