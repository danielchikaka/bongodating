<?
require_once("img_crop.php");
 $dim_requirement = array(155,191);
 $size_requirement = array(155,191);
 $min_size_requirement=array(155,191);
  $path  = 'upload/';
if($_REQUEST['btn_save']=="Submit") 
{
	   $esql="insert into product set
	    p_name='".addslashes($_POST['pname'])."',
	    p_mrp='".trim($_POST['mrp'])."',p_ship_time='".trim($_POST['stime'])."',p_ship_charge='".trim($_POST['scharge'])."',p_detail='".addslashes($_POST['pdetails'])."',status='yes',date1=now()";
	    $qry=mysql_query($esql);
		 $insertid=mysql_insert_id();
	    $succ='Product Addded successfully';
		if($_FILES['photo1']['name']!="")
		{
			$name = $_FILES['photo1']['name'];
    $filenameext = pathinfo($name, PATHINFO_EXTENSION);
    $size = getimagesize($_FILES['photo1']['tmp_name']);
    $source_pic=$destination_pic=$_FILES['photo1']['tmp_name'];
	if($insertid>0)
		{  
		$newname = $insertid.".".$filenameext; 
		 move_uploaded_file($_FILES['photo1']['tmp_name'],$path.$newname);
				$source_pic1=$destination_pic1= $path.$newname;
				$size1= resize($source_pic1,$destination_pic1,$size,$size_requirement);//Big Image
				 $sq_upd = "update product set p_img = '$newname' where p_id = $insertid";
				 mysql_query($sq_upd);
		}
}
  if($qry) { $err=$succ; } else { $err=mysql_errno(); }
  ?> <script>javascript:location.href="user.php?frm=product&err=<?=$err?>"</script> <?
 }
 
?>

<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td>
<form name="frm_news_add" method="post" action="user.php?frm=product" enctype="multipart/form-data"> 
<table width="100%" align="center" border="0" cellspacing="1" cellpadding="2">
<tr><td height="5" colspan="2"></td></tr>

<tr valign="middle">
  <td width="17%" align="right" height="19">Product Name</td>
  <td width="83%" align="left">
<input type="text" name="pname" class="txtfield"  size="80" /></td></tr>

  <tr valign="middle">
  <td width="17%" align="right" height="19">MRP</td>
  <td width="83%" align="left">
<input type="text" name="mrp" class="txtfield"  size="80" /></td></tr>


  <tr valign="middle">
  <td width="17%" align="right" height="19">Shipping Time</td>
  <td width="83%" align="left">
<input type="text" name="stime" class="txtfield"  size="80" /></td></tr>
  <tr valign="middle">
  <td width="17%" align="right" height="19">Shipping Charges</td>
  <td width="83%" align="left">
<input type="text" name="scharge" class="txtfield"  size="80" /></td></tr>

 <tr valign="middle">
  <td width="17%" align="right" height="19">Products Details</td>
  <td width="83%" align="left">
<input type="text" name="pdetails" class="txtfield"  size="80" /></td></tr>
<tr valign="top"><td width="17%" align="right" height="19">
Image
</td>
<td width="83%" align="left">
<input type="file" name="photo1" id="photo1" />
</td></tr>

<tr valign="middle">
<td align="left"><table width="40%" align="left" cellpadding="0" cellspacing="0" border="0">
<tr valign="middle">
 
</tr>
</table></td>
</tr>

<tr> <td colspan="2" align="center">

<input name="btn_save" type="submit" class="button2" value="Submit">
<input name="btn_cancel" type="reset" class="button2" value="Cancel">
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
