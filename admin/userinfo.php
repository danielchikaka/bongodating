<?
session_start();
include("../includes/config.php");

if($_SESSION['admin'] == ""){
  ?> <script>javascript:location.href="index.php?err=SignIn";</script> <? 
}
?>

<table width="100%" align="center" cellpadding="1" cellspacing="1">
<?
$sqlu = "select * from tbl_admin where id='".$_REQUEST['id']."'";
$qryu = mysql_query($sqlu);
$rowu = mysql_fetch_object($qryu);
?>  
<tr valign="top"><td colspan="2" align="left"><strong>Address Info</strong></td></tr>
  <tr valign="top">
    <td align="left" width="100">First Name</td>
	<td align="left"><?=$rowu->fname?></td>
  </tr>
  <tr valign="top">
    <td align="left">Last Name</td>
	<td align="left"><?=$rowu->lname?></td>
  </tr>
  <tr valign="top">
    <td align="left">Phone</td>
	<td align="left"><?=$rowu->phone?></td>
  </tr>
  <tr valign="top">
    <td align="left">Address</td>
	<td align="left"><?=$rowu->baddress1?></td>
  </tr>
  
  <tr valign="top">
    <td align="left">City</td>
	<td align="left"><?=$rowu->bcity?></td>
  </tr>
  <tr valign="top">
    <td align="left">State</td>
	<td align="left"><?=$rowu->bstate?></td>
  </tr>
  <tr valign="top">
    <td align="left">Zip</td>
	<td align="left"><?=$rowu->bzip?></td>
  </tr>
  <tr valign="top">
    <td align="left">Country</td>
	<td align="left">
	<? 
	echo country_name($rowu->bcountry);
	?></td>
  </tr>
  
</table>

