<?
if($_REQUEST['btn_save']=="Submit") {
	$datetime=date("Y-m-d h:i:s"); //create date time
	$cat = $_POST['catogries'];
	$arr_cat = explode('_',$cat); 
   $esql="update classified_add set 
   catogry_id='".$arr_cat[0]."',
   sub_category='".$arr_cat[1]."',
   topic='".addslashes($_POST['txt_name'])."',
   postedby='".addslashes($_POST['postedby'])."',
   detail='".addslashes($_POST['pc_TR_body'])."',
   status='".$_POST['txt_status']."' where id = '".$_POST['hd_id']."'";
    $ex_q =  mysql_query($esql);
	if($ex_q)
	{ 
	 $err="Classified update successfully";
	  ?> <script>javascript:location.href="user.php?frm=classified_view&err=<?=$err?>";</script><?
	}
}

$sql1=mysql_query("select * from classified_add  where id='".trim($_GET['id'])."'");
$res=mysql_fetch_assoc($sql1);
$id1=trim($res['id']);
$title=stripslashes($res['topic']);
$postedby=stripslashes($res['postedby']);
$desc=stripslashes($res['detail']);
?>

<table width="100%" border="0" align="center" cellspacing="1" cellpadding="2">
<form action="user.php?frm=classified_modify" name="frm_email" method="post"  onSubmit="return classified_add_validate(this);">
<input type="hidden" name="hd_id" value="<?=$_GET['id']?>"  />
<?
if($err!=""){print "<tr><td align='center' valign='middle' class='errmsg' colspan='2'>".$err."</td></tr>";} 

//$sql1=mysql_query("select * from forum_cat");
//$sqlsub = mysql_query("select * from forum_sub_cat order by catogry_id ASC");
$sqlsub = mysql_query("SELECT c.name, cs.id, cs.catogry_id, cs.topic FROM classified_cat c, classified_sub_cat cs WHERE c.id = cs.catogry_id ORDER BY cs.catogry_id ASC ");

?>
<tr valign="middle">
<td align="right" valign="top">
Catogry</td>
<td align="left">
<!--<select name="catogries" id="catogries"  style="width:140px;"  onchange="getScriptPage('display','catogries');">-->
<select name="catogries" id="catogries"   >

<option value="">--Select--</option>
<?php
while($res =mysql_fetch_assoc($sqlsub))
{
$id=trim($res['id']);
$catid=trim($res['catogry_id']);
$topic111=trim($res['topic']);
$cname=trim($res['name']);
 $jid = $catid.'_'.$id;
?>
<option  value="<?=$jid?>" <?php if($id1==$id){echo 'selected';} ?>> <?=$cname?>&nbsp;>&nbsp;<?=$topic111?></option>
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
  <input name="txt_name" type="text" class="txtfield" id="txt_name" style="width:400px;" value="<?=$title?>" /></td>
</tr>
<tr valign="middle">
<td align="right" valign="top">
Posted By</td>
<td align="left">
  <input name="postedby" type="text" class="txtfield" id="postedby" style="width:400px;" value="<?=$postedby?>" /></td>
</tr>
<tr valign="top"><td width="25%" align="right" height="19">
Content
</td><td width="75%" align="left">
<textarea name="pc_TR_body" rows="25" id="pc_TR_body" style="width:500px"><?=$desc?></textarea>
</td></tr>
<tr valign="middle"><td align="right">Status</td>
<td align="left"><table width="40%" align="left" cellpadding="0" cellspacing="0" border="0">
<tr valign="middle">
  <td width="10%"><input type="radio" name="txt_status" value="Y" checked="checked" /></td>
  <td style="padding-top:3px;">Active</td>
  <td width="10%"><input type="radio" name="txt_status" value="N" /><input type="hidden" name="hid" value="<?=$id1?>" /></td>
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
<SCRIPT language=JavaScript type=text/javascript >
function classified_add_validate(frm)
{
   
  if(frm.catogries.value=="")
  {
    alert("Please select category");
	frm.catogries.focus();
	return false;
  }
 
  else if(frm.txt_name.value=="")
  {
    alert("Please enter title");
	frm.txt_name.focus();
	return false;
  }
   else if(frm.postedby.value=="")
  {
    alert("Please enter post by name");
	frm.postedby.focus();
	return false;
  }
 
  return true;
}

</SCRIPT>
</table>
