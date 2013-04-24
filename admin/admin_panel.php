<style type="text/css">
<!--
.style3 {
	font-size: 26px;
	font-weight: bold;
}
-->
</style>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="10">
  <tr valign="middle">
  <td align="left">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td align="center" class="tdblue" height="40px">

<p><span class="pheading style3">WELCOME ADMINISTRATOR </span><span class="pheading style3"><br> 
      </span><br>
&laquo; Please select an option from the menu to edit the site.<br />
    </p></td>
  </tr>
  <tr valign="middle">
  <td align="left">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td align="center" class="tdblue" height="150px" style="border-color:#999999; border-width:1px;"><table width="35%" border="1" cellspacing="5" cellpadding="5"  >
  <tr>
    <td colspan="3" style="text-align:center; font-size:16px"><strong>Site Analysis</strong></td>
  </tr>
  <tr>
    <td width="50%" align="right"><strong>Male users</strong></td>
    <td width="10%" align="center"><strong>:</strong></td>
    <td width="40%"><strong><? 
$num=mysql_num_rows(mysql_query("select user_id from user where user_gender = 'male' "));
echo $num;?></strong></td>
  </tr>
  <tr>
    <td align="right"><strong>Female users</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><strong><?
$num=mysql_num_rows(mysql_query("select user_id from user where user_gender = 'female' "));
echo $num;?></strong></td>
  </tr>
  <tr>
    <td align="right"><strong>Total Users</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><strong><?
$num=mysql_num_rows(mysql_query("select user_id from user where 1 = '1' "));
echo $num;?></strong></td>
  </tr>
</table>
</td>
  </tr>

</table>
