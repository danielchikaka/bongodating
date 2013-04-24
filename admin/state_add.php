<?
if($_REQUEST['btn_save']=="Submit") 
{
    $country = $_POST['country'];
	$name = addslashes($_POST['name']);
	$abbreviation = $_POST['abbreviation'];
     
$errcnt=0;

if ( strlen(trim($country)) == 0 )
{
	$errs[$errcnt]="Please select country name";
	$errcnt++;
}
if ( strlen(trim($name)) == 0) 
{
	$errs[$errcnt]="State name must be provided";
	$errcnt++;
}
if ( strlen(trim($abbreviation)) == 0) 
{
	$errs[$errcnt]="Abbreviation must be provided";
	$errcnt++;
}
			
if(mysql_num_rows(mysql_query("select * from state where country_id='$country' and name='$name'"))!= 0)
{
	$errs[$errcnt]="State name with same Country already exists";
	$errcnt++;
}
//mailing
		
if($errcnt==0)
{

	$sql = " insert into state set country_id = '$country', name = '$name', abbreviation = '$abbreviation' ";
	$qry = mysql_query($sql);
		
	$succ = 'State Name Save Successfully!';
	$ins_id = mysql_insert_id();	 

  	if($qry) { $err=$succ; } else { $err=mysql_errno(); }	
?>
<script>javascript:location.href="user.php?frm=state_list&err=<?=$err?>";</script>
<? } } ?>
<script type="text/javascript">
    function ChangeCase(elem)
    {
        elem.value = elem.value.toUpperCase();
    }
	
	function valid(){
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
var country = document.getElementById("country").value;
var name = document.getElementById("name").value;
var abbreviation = document.getElementById("phone").value;

if(country==''){
alert("Please Select Country!");
document.getElementById("country").focus();
return false;
}
if(name==''){
alert("Please enter State name!");
document.getElementById("name").focus();
return false;
}
if(abbreviation==''){
alert("Please enter Abbreviation!");
document.getElementById("abbreviation").focus();
return false;
}

return true;
}


</script>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td><table width="100%" align="center" border="0" cellspacing="0" cellpadding="2">
        <tr valign="top">
          <td><table width="60%" align="center" border="0" cellspacing="1" cellpadding="2">
              <form name="frmvincent" method="post" action="user.php?frm=state_add" enctype="multipart/form-data" onsubmit="return valid();">
                <tr valign="middle">
                  <td height="50" colspan="2" align="left" ><?php
if  (count($_POST)>0)
{

if ( $errcnt<>0 )
{
?>
<div style="width:400px; color:#FF0000; margin-left:180px;">
  <p><strong>Your request cannot be processed due to following reasons</strong></p>
  <?

for ($i=0;$i<$errcnt;$i++)
{
?>
<p><?php echo $i+1;?>. &nbsp;<?php echo  $errs[$i]; ?></p>
  <?
}
?>
</div>
<?

}

}
?></td>
                </tr>
                <tr valign="middle">
                  <td colspan="2" align="left">&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Contry Name</td>
                  <td width="70%" align="left"><select name="country" id="country" >
                <option value="" selected="selected">Select Country</option>
                <?php $con = mysql_query("select * from country order by name asc");
			 while($confetch=mysql_fetch_array($con)){ ?>
                <option value="<?=$confetch['country_id'];?>" <?php if($_POST['country']==$confetch['country_id']) { echo "selected"; } ?>>
                <?=$confetch['name'];?>
                </option>
                <?php } ?>
              </select></td>
                </tr>
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> State Name</td>
                  <td width="70%" align="left"><input name="name" id="name" type="text" class="txtfield" size="40" value="<?=$name;?>" /></td>
                </tr>
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Abbreviation</td>
                  <td width="70%" align="left"><input name="abbreviation" id="abbreviation" type="text" class="txtfield" size="40" value="<?=$abbreviation;?>" maxlength="2" onblur="ChangeCase(this);" /></td>
                </tr>
                <tr>
                  <td height="40" valign="bottom"></td>
                  <td><input name="btn_save" type="submit" class="button2" value="Submit">
                    <input name="btn_cancel" type="button" onclick="javascript:location.href='user.php?frm=state_list';" class="button2" value="Cancel"></td>
                </tr>
              </form>
              <tr>
                <td height="100" colspan="2"></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
