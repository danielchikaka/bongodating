<?
if($_REQUEST['btn_save']=="Update") {
  $o_ans = addslashes($_POST['pc_TR_body']);
  $sql="update tbl_pages set pagetitle='".addslashes($_POST['t_title'])."', pagetext='".$o_ans."'";
  $sql=$sql." where pageid='".$_POST['id']."'";

$msg_modify=htmlentities($_POST['t_title']). " Modify Successfully";
  if($rs=mysql_query($sql)) { $err=$msg_modify; } else { $err=mysql_errno(); }
  ?>
<script>javascript:location.href="user.php?frm=page_modify&id=<?=$_POST['id']?>&err=<?=$err?>";</script>
<?
}
?>

<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td><?
$m_sql="select * from tbl_pages where pageid='".$_REQUEST['id']."'";
$m_qry=mysql_query($m_sql);
$m_row=mysql_fetch_object($m_qry);
$id=$m_row->pageid;
?>
      <form name="frmvincent" method="post" action="user.php?frm=page_modify" enctype="multipart/form-data">
        <table width="100%" align="center" border="0" cellspacing="1" cellpadding="2">
          <tr>
            <td height="5" colspan="2"></td>
          </tr>
          <tr valign="middle">
            <td width="25%" align="right" height="19"> Title</td>
            <td width="75%" align="left"><input type="text" name="t_title" class="txtfield" value="<?= stripslashes($m_row->pagetitle)?>" size="80" /></td>
          </tr>
          <tr valign="top">
            <td width="25%" align="right" height="19"> Content </td>
            <td width="75%" align="left"><textarea name="pc_TR_body" rows="25" id="pc_TR_body" style="width:500px"><?=stripslashes($m_row->pagetext)?>
</textarea>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><input type="hidden" name="id" value="<?=$id?>" />
              <input type="hidden" name="pagename" value="<?=$_REQUEST['id']?>" />
              <input name="btn_save" type="submit" class="button2" value="Update">
              <input name="btn_cancel" type="reset" class="button2" value="Cancel">
            </td>
          </tr>
          <tr>
            <td height="5" colspan="2"></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
