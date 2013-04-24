<?
  
if($_REQUEST['btn_save']=="Submit") 
{
    $paypal_email = $_POST['paypal_email'];
     
    $sql = " update settings set paypal_email = '$paypal_email' where id = '1' ";
	$qry=mysql_query($sql);
		
	$succ='Paypal Email Id Save Successfully!';
	
  	if($qry) { $err=$succ; } else { $err=mysql_errno(); }
 
?>
<script>javascript:location.href="user.php?frm=paypal_settings&err=<?=$err?>";</script>
<? } ?>

<?php
$row = mysql_fetch_array(mysql_query("select * from settings where id = '1' "));
$paypal_email = trim($row['paypal_email']);
?>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td height="250"><table width="100%" align="center" border="0" cellspacing="0" cellpadding="2">
        <tr >
          <td><table width="100%" align="center" border="0" cellspacing="5" cellpadding="5" >
              <form name="frmvincent" method="post" action="user.php?frm=paypal_settings" enctype="multipart/form-data">
                <tr valign="middle">
                  <td width="30%" align="right" height="19">&nbsp;</td>
                  <td width="70%" align="left">&nbsp;</td>
                </tr>
		       <tr valign="middle">
                  <td width="40%" align="right" height="19">PayPal Email ID</td>
                  <td width="60%" align="left"><input name="paypal_email" type="text" class="txtfield" size="40" value="<?=$paypal_email;?>" />
                  </td>
                </tr>
                <tr>
                  <td height="40" valign="bottom"></td>
                  <td><input name="btn_save" type="submit" class="button2" value="Submit">
                    <input name="btn_cancel" type="reset" class="button2" value="Reset">
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
