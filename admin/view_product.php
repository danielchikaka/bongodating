<?

 $sql="select * from product where p_id='".trim($_GET['id'])."'";
 $qry=mysql_query($sql);
 $res=mysql_fetch_assoc($qry);
?>

<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td>
<form name="frm_news_add" method="post" action="user.php?frm=product_modify" enctype="multipart/form-data"> 
<table width="100%" align="center" border="0" cellspacing="1" cellpadding="2">
<tr><td height="5" colspan="2"></td></tr>

<tr valign="middle">
  <td width="13%" align="right" height="19">Product Name:</td>
  <td width="20%" align="left">
<?=stripslashes($res['p_name'])?></td>
  <td width="67%" rowspan="3"><img src="upload/<?=$res['p_img']?>"  width="160" height="120" border="0"/></td>
</tr>

  <tr valign="middle">
  <td width="13%" align="right" height="19">MRP:</td>
  <td width="20%" align="left">
<?=$res['p_mrp']?></td>
  </tr>


  <tr valign="middle">
  <td width="13%" align="right" height="46">Shipping Time:</td>
  <td width="20%" align="left">
<?=$res['p_ship_time']?> </td>
  </tr>
  <tr valign="middle">
  <td width="13%" align="right" height="19">Shipping Charges:</td>
  <td width="20%" align="left">
<?=$res['p_ship_charge']?></td>
  </tr>

 <tr valign="middle">
  <td width="13%" align="right" height="19">Products Details:</td>
  <td width="20%" align="left">
<?=stripslashes($res['p_detail'])?></td>
 </tr>


<tr valign="middle">
<td align="left"><table width="40%" align="left" cellpadding="0" cellspacing="0" border="0">
<tr valign="middle">
 
</tr>
</table></td>
</tr>

<tr> <td colspan="2" align="center">


</td></tr>
<tr><td height="5" colspan="2"></td></tr>
</table>
</form>
<SCRIPT language=JavaScript type=text/javascript>
//You should create the validator only after the definition of the HTML form
var frmvalidator  = new Validator("frm_news_add");
frmvalidator.addValidation("t_title","req","Please enter Title");  

frmvalidator.addValidation("url","req","Please enter url");  

</SCRIPT>
</td></tr></table></td></tr>
</table>
