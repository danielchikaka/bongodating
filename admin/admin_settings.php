<?
if($_REQUEST['btn_save']=="Submit") {
  if(trim($_POST['txt_pwd']) != "" && trim($_POST['txt_re_pwd']) !="")
  {
    $pwd 	= base64_encode($_REQUEST['txt_pwd']);
    $repwd 	= base64_encode($_REQUEST['txt_re_pwd']);
	$txt_old_pwd = base64_encode($_POST['txt_old_pwd']);
	
    if($pwd == $repwd) 
	{ 
      $sqlp="select * from admin where id='".$_SESSION['admin']."' and password='".$txt_old_pwd."'";
	  $qryp=mysql_query($sqlp);
	  if(mysql_num_rows($qryp) > 0) 
	  {	
        $sql="update admin set password='$pwd',email='".$_POST['txt_email']."' where id='".$_SESSION['admin']."'";
        if(mysql_query($sql)) { ?>
<script>javascript:location.href="user.php?frm=admin_settings&err=Password Changed Successfully!";</script>
<? }
	  }
	  else
	  {
	  ?>
<script>javascript:location.href="user.php?frm=admin_settings&err=Wrong old password provided!";</script>
<? 
	  }
	}
	else {
	  ?>
<script>javascript:location.href="user.php?frm=admin_settings&err=New Password and retype password doesnt match";</script>
<? 
	}
  }
  else {
    $esql="update admin set email='".$_POST['txt_email']."' where id='".$_SESSION['admin']."'";
	$ers=mysql_query($esql);
    ?>
<script>javascript:location.href="user.php?frm=admin_settings&err=Email Address Changed";</script>
<? 
  }
}

?>

<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td><table width="100%" align="center" border="0" cellspacing="0" cellpadding="2">
        <tr valign="top">
          <td><table width="100%" align="center" border="0" cellspacing="1" cellpadding="2">
              <form name="frmvincent" method="post" action="user.php?frm=admin_settings">
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Type Old Password </td>
                  <td width="70%" align="left"><input name="txt_old_pwd" type="password" class="txtfield" size="40">
                  </td>
                </tr>
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Type New Password </td>
                  <td width="70%" align="left"><input name="txt_pwd" type="password" class="txtfield" size="40"></td>
                </tr>
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Retype New Password </td>
                  <td width="70%" align="left"><input name="txt_re_pwd" type="password" class="txtfield" size="40">
                  </td>
                </tr>
                <?
$sql_m = "select * from admin where id='".$_SESSION['admin']."'";
$qry_m = mysql_query($sql_m);
$row_m = mysql_fetch_object($qry_m);
?>
                <tr>
                  <td height="15"></td>
                </tr>
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Email </td>
                  <td width="70%" align="left"><input name="txt_email" type="text" class="txtfield" size="40" value="<?=$row_m->email?>">
                  </td>
                </tr>
                <tr>
                  <td height="40" valign="bottom"></td>
                  <td><input name="btn_save" type="submit" class="button2" value="Submit">
                    <input name="btn_cancel" type="reset" class="button2" value="Cancel">
                  </td>
                </tr>
              </form>
              <tr>
                <td height="5" colspan="2"></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
