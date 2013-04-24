<?
if($_REQUEST['btn_save']=="Submit") {
$datetime=date("Y-m-d h:i:s"); //create date time
   $esql="insert into classified_sub_cat set catogry_id='".$_POST['catogries']."',topic='".addslashes($_POST['txt_name'])."', detail='".addslashes($_POST['pc_TR_body'])."', status='".$_POST['txt_status']."',datetime='".$datetime."'";
	if(mysql_query($esql)){ $err="Classified Sub-Category Added successfully";
	
	?><script>javascript:location.href="user.php?frm=classified_sub_cat_view&err=<?=$err?>"</script><? 
	}
}
?>

<table width="100%" border="0" align="center" cellspacing="1" cellpadding="2">
<form action="user.php?frm=classified_sub_cat_add" name="frm_classified_sub_cat_add" method="post" onSubmit="return validate();">
<?
if($err!=""){print "<tr><td align='center' valign='middle' class='errmsg' colspan='2'>".$err."</td></tr>";} 
$sql1=mysql_query("select * from classified_cat");
?>
<tr valign="middle">
<td align="right" valign="top">
Catogry</td>
<td align="left">
    <select name="catogries" id="catogries" >
    <option value="">--Select--</option>
    <?php
    while($res =mysql_fetch_assoc($sql1))
    {
    $id=trim($res['id']);
    $name=trim($res['name']);
    ?>
    <option value="<?=$id?>"><?=$name?></option>
    <?php
    }
    ?>
    
    </select>
  </td>
</tr>	

<tr valign="middle">
<td align="right" valign="top">
Title</td>
<td align="left">
  <input name="txt_name" type="text" class="txtfield" id="txt_name" maxlength="63" style="width:400px;" value="" /></td>
</tr>
<tr valign="top"><td width="25%" align="right" height="19">
Content
</td><td width="75%" align="left">
<textarea name="pc_TR_body" rows="25" id="pc_TR_body" style="width:500px"></textarea>
</td></tr>
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
var frmvalidator  = new Validator("frm_classified_sub_cat_add");
frmvalidator.addValidation("catogries","req","Please Select Catogry");  
frmvalidator.addValidation("txt_name","req","Please enter Title Name");  
</SCRIPT>
</table>
