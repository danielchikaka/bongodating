<?
if($_REQUEST['btn_save']=="Submit") {
   $esql="insert into classified_cat 
    set name='".addslashes($_POST['txt_name'])."',
	 description='".addslashes($_POST['txt_desc'])."',
	  status='".$_POST['txt_status']."',date1=now()";
	if(mysql_query($esql)){ $err="Classified Category Added successfully";}
}
?>

<table width="100%" border="0" align="center" cellspacing="1" cellpadding="2">
<form action="user.php?frm=classified_cat_add" name="frm_email" method="post" onSubmit="return validate();">
<?
if($err!=""){print "<tr><td align='center' valign='middle' class='errmsg' colspan='2'>".$err."</td></tr>";} 
?>
	
<tr valign="middle">
<td align="right" valign="top">
Category Name</td>
<td align="left">
  <input name="txt_name" type="text" class="txtfield" id="txt_name" style="width:400px;" value="" /></td>
</tr>
<tr valign="middle">
  <td align="right" valign="top"> Description</td>
  <td align="left"><textarea name="txt_desc" style="width:400px; height:100px;"></textarea></td>
</tr>
<tr valign="middle"><td align="right">Status</td>
<td align="left"><table width="40%" align="left" cellpadding="0" cellspacing="0" border="0">
<tr valign="middle">
  <td width="10%"><input type="radio" name="txt_status" value="Y" checked="checked" /></td>
  <td style="padding-top:3px;">Active</td>
  <td width="10%"><input type="radio" name="txt_status" value="N" /></td>
  <td style="padding-top:3px;">Inactive</td>
</tr>
</table></td>
</tr>

<tr align="center" valign="middle">
<td></td><td height="40" align="left">
<input name="btn_save" type="submit" class="button2" value="Submit">
<input name="btn_cancel" type="button" class="button2" value="Cancel" onClick="javascript:location.href='user.php?frm=admin_panel';">
</td>
</tr>
</form>
<SCRIPT language=JavaScript type=text/javascript>
//You should create the validator only after the definition of the HTML form
var frmvalidator  = new Validator("frm_email");
frmvalidator.addValidation("txt_name","req","Please enter Catogry Name");  
</SCRIPT>
</table>
