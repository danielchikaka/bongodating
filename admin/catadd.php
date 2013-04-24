<?
if($_REQUEST['btn_save']=="Submit") {

   $name =  addslashes($_POST['txt_name']);
    $desc =  addslashes($_POST['pc_TR_body']);

 $selq="update page page set pname='".$name."',description='".$desc."' where id='".trim($_REQUEST['hid'])."'";

   $selarr = mysql_query($selq);
 $succ="Page Updated successfully"

  ?>
<script>javascript:location.href="user.php?frm=catadd&err=<?=$err?>&id=<?=trim($_REQUEST['hid'])?>"</script>
<?
 }
$sql=mysql_query("select * from page where id='".trim($_REQUEST['id'])."'");
$res=mysql_fetch_assoc($sql);
?>

<table width="100%" border="0" align="center" cellspacing="1" cellpadding="2">
  <form action="user.php?frm=catadd" name="frm_email" method="post"  enctype="multipart/form-data">
    <tr valign="middle">
      <td align="right" valign="top"> Page Name</td>
      <td align="left"><input name="txt_name" type="text" class="txtfield" id="txt_name" style="width:400px;" value="<?=$res['pname']?>" /></td>
    </tr>
    <tr valign="middle">
      <td align="right" valign="top"> Description</td>
      <td align="left"><textarea name="pc_TR_body" rows="25" id="pc_TR_body" style="width:500px"><?=stripslashes($res['description'])?>
</textarea>
        <script type="text/javascript">
			CKEDITOR.replace( 'pc_TR_body', { height: 350, width: 670 });
			</script>
        <input type="hidden" name="hid" id="hid" value="<?=trim($_REQUEST['id'])?>" /></td>
    </tr>
    <tr valign="middle">
      <td align="left"><table width="40%" align="left" cellpadding="0" cellspacing="0" border="0">
          <tr valign="middle"> </tr>
        </table></td>
    </tr>
    <tr align="center" valign="middle">
      <td></td>
      <td height="40" align="left"><input name="btn_save" type="submit" class="button2" value="Submit">
        <input name="btn_cancel" type="button" class="button2" value="Cancel" onClick="javascript:location.href='user.php?frm=admin_panel';">
      </td>
    </tr>
  </form>
</table>
