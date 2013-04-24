<?
//require_once("img_crop.php");
 //$dim_requirement = array(200, 150);
// $size_requirement = array(200, 150);
  //$path  = '../images/team/';
if(isset($_REQUEST['id'])) 
{
//echo "select * from messages where id='".$_REQUEST['id']."'"; die;
$fetchmsg= mysql_fetch_array(mysql_query("select * from messages where id='".$_REQUEST['id']."'"));
$fetchsender=mysql_fetch_array(mysql_query("select user_name from user where user_id='".$fetchmsg['sender_id']."'"));
$fetchrec=mysql_fetch_array(mysql_query("select user_name from user where user_id='".$fetchmsg['rece_id']."'"));
 }
 
?>

<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td>
<?php if($succ) { echo "$succ"; } ?>
<form name="frm_news_add" method="post" action="user.php?frm=team_add	" enctype="multipart/form-data"> 
<table width="100%" align="center" border="0" cellspacing="1" cellpadding="2">
<tr><td height="5" colspan="2"></td></tr>


  <tr valign="middle">
  <td width="25%" align="right" height="19">Sender Name:-</td>
  <td width="75%" align="left">
<?=$fetchsender['user_name'];?></td></tr>
<tr>
  <tr valign="middle">
  <td width="25%" align="right" height="19">Reciever Name:-</td>
  <td width="75%" align="left">
<?=$fetchrec['user_name'];?></td></tr>
<tr valign="middle">
  <td width="25%" align="right" height="19">Subject</td>
  <td width="75%" align="left">
<input type="text" name="photo1" class="txtfield"  size="63" value="<?=$fetchmsg['subject'];?>" /></td></tr>
<tr>
<tr valign="top"><td width="25%" align="right" height="19">
Content
</td><td width="75%" align="left">
<textarea name="pc_TR_body" rows="15" id="pc_TR_body" style="width:400px"><?=$fetchmsg['message'];?></textarea>
</td></tr>



<tr> <td colspan="2" align="center">

<!--<input name="btn_save" type="submit" class="button2" value="Submit">-->
<input name="btn_cancel" type="reset" class="button2" value="Go Back" onclick="javascript: history.go(-1)">
</td></tr>
<tr><td height="5" colspan="2"></td></tr>
</table>
</form>

</td></tr></table></td></tr>
</table>
