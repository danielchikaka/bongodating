<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr align="left" valign="top">
        <td width="9%"><a href="index.php"><img src="images/admin_logo.gif" width="106" height="97" border="0"></a></td>
        <td width="91%" align="right"><img src="images/bnr_sasha_logo.gif" width="161" height="55"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" background="images/bg_links.gif" class="tdw">&nbsp;
	<?
	$sqlcat = "select * from tbl_category";
	$rescat = mysql_query($sqlcat);
	while($rowcat = mysql_fetch_array($rescat))
	{
		$sep_v = "&nbsp;&nbsp;|&nbsp;&nbsp;";
		echo "<a href='user.php?frm=vproducts&cat_id=$rowcat[cat_id]' class='lnkmain'>$rowcat[cat_name]</a>$sep_v";
		$si++;
	}
	echo "<a href='user.php?frm=view_cart' class='lnkmain'>Online Shopping</a> ";
	if(isset($_SESSION[fl_gal_id]) && $_SESSION[fl_gal_id]!= '')
	{
	echo "&nbsp;&nbsp;|&nbsp;&nbsp;<a href='user.php?frm=logout' class='lnkmain'>Logout</a> ";
	}
	?>
	</td>
  </tr>
<tr>
    <td height="1px" align="left" valign="middle" bgcolor="#FFFFFF"></td>
  </tr>  
</table>
<SCRIPT language=JavaScript src="<?=$include_path;?>/gen_validatorv2.js"></SCRIPT>
