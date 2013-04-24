<?
require_once("img_crop.php");
 $dim_requirement = array(200, 150);
 $size_requirement = array(200, 150);
  $path  = '../images/team/';
if($_REQUEST['btn_save']=="Submit") 
{
$na=addslashes($_POST['t_posted']);
$fname=strtolower($na);

	   $esql="insert into team set
	   
	   name='".$fname."', 
	  content='".htmlentities($_POST['pc_TR_body'],ENT_QUOTES)."',  
	   status='Y',added_date=now()";
	   mysql_query($esql);
	  
	   $insertid = mysql_insert_id();
       $succ='Testominal added successfully';
	   
		$name = $_FILES['photo1']['name'];
		$filenameext = pathinfo($name, PATHINFO_EXTENSION);
		$size = getimagesize($_FILES['photo1']['tmp_name']);
		$source_pic=$destination_pic=$_FILES['photo1']['tmp_name'];
		if($insertid>0 and $_FILES['photo1']['name']!="")
		{  
		$newname = $insertid.".".$filenameext; 
		 move_uploaded_file($_FILES['photo1']['tmp_name'],$path.$newname);
				$source_pic1=$destination_pic1= $path.$newname;
				$size1= resize($source_pic1,$destination_pic1,$size,$size_requirement);//Big Image
				 $sq_upd = "update team set image = '$newname' where id = $insertid";
				 mysql_query($sq_upd);
		}
	
	  if($insertid) { $err=$succ; } 
	  ?> <script>javascript:location.href="user.php?frm=team_edit&err=<?=$err?>"</script> <?

	

 }
 
?>

<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td>
<?php if($succ) { echo "$succ"; } ?>
<form name="frm_news_add" method="post" action="user.php?frm=team_add	" enctype="multipart/form-data"> 
<table width="100%" align="center" border="0" cellspacing="1" cellpadding="2">
<tr><td height="5" colspan="2"></td></tr>


  <tr valign="middle">
  <td width="25%" align="right" height="19">Name</td>
  <td width="75%" align="left">
<input type="text" name="t_posted" class="txtfield"  size="80" /></td></tr>
<tr>
  <tr valign="middle">
  <td width="25%" align="right" height="19">Image</td>
  <td width="75%" align="left">
<input type="file" name="photo1" class="txtfield"  size="40" /></td></tr>
<tr>
<tr valign="top"><td width="25%" align="right" height="19">
Content
</td><td width="75%" align="left">
<textarea name="pc_TR_body" rows="25" id="pc_TR_body" style="width:500px"></textarea>
</td></tr>



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


frmvalidator.addValidation("t_posted","req","Please enter name");  
frmvalidator.addValidation("photo1","req","Please select  image");  
frmvalidator.addValidation("pc_TR_body","req","Please enter description ");  
</SCRIPT>
</td></tr></table></td></tr>
</table>
