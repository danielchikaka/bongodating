<?
require_once("img_crop.php");
$dim_requirement = array(60, 85);
$size_requirement =  array(60, 85);
$path  = '../images/team/';
if($_REQUEST['btn_save']=="Submit") 
{
	
     $esql="update team set
	   
	   name='".addslashes($_POST['t_posted'])."', 
	   content='".htmlentities($_POST['pc_TR_body'],ENT_QUOTES)."', 
	   status='Y',added_date=now() where id='".$_POST['hid']."'";
	   mysql_query($esql);
	   
	  $name = $_FILES['photo1']['name'];
      $filenameext = pathinfo($name, PATHINFO_EXTENSION);
	  $insertid = trim($_POST['hid']);
       
 if($_FILES['photo1']['name']!="")
 {    
	
    $size = getimagesize($_FILES['photo1']['tmp_name']);
    $source_pic=$destination_pic=$_FILES['photo1']['tmp_name'];
		if($filenameext =='jpg' || $filenameext =='png' || $filenameext =='gif' || $filenameext =='jpeg'|| $filenameext =='bmp')
	   {  
		 $newname = $insertid.".".$filenameext; 
		 move_uploaded_file($_FILES['photo1']['tmp_name'],$path.$newname);
				$source_pic1=$destination_pic1= $path.$newname;
				$size1= resize($source_pic1,$destination_pic1,$size,$size_requirement);//Big Image
			$sq_upd = "update team set image = '$newname' where id = $insertid";
				 mysql_query($sq_upd);
				 }
				 {
				  $err = "Upload only jpg/jpeg/png/gif and bmp file.";	 
				 }
				 $err='Testominal Update successfully';
		}

  //if($insertid) { $err=$err; } else { $err=mysql_errno(); }
  ?> <script>javascript:location.href="user.php?frm=team_edit&err=<?=$err?>"</script> <?
 }
 
?>

<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td>
<form name="frm_news_add" method="post" action="user.php?frm=team_modify	" enctype="multipart/form-data"> 
<?
$sqlc="select * from team  where id='".$_REQUEST['id']."'";
$qryc=mysql_query($sqlc);
$rowc=mysql_fetch_object($qryc);

?>
<table width="100%" align="center" border="0" cellspacing="1" cellpadding="2">
<tr><td height="5" colspan="2"></td></tr>


  <tr valign="middle">
 
  <td width="23%" align="right" height="19">Name</td>
  <td width="53%" align="left">
<input type="text" name="t_posted" class="txtfield"  size="80" value="<?=stripslashes($rowc->name)?>"/></td> <td width="24%" rowspan="3"><img src="../images/team/<?=$rowc->image?>"  width="60" height="85" border="0"/></td> </tr>
<tr valign="middle">
 
  <td width="23%" align="right" height="19">Image</td>
  <td width="53%" align="left">
<input type="file" name="photo1" class="txtfield"  size="40" />
<input type="hidden" name="hid" value="<?=$_GET['id'];?>" /></td> </tr>
<tr valign="top">

<td width="23%" align="right" height="19">
Content</td>
<td width="53%" align="left">
<textarea name="pc_TR_body" rows="25" id="pc_TR_body" style="width:500px"><?=html_entity_decode($rowc->content)?></textarea></td><td>&nbsp;</td></tr>


<tr> <td colspan="3" align="center">

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
//frmvalidator.addValidation("photo1","req","Please select  image");  
frmvalidator.addValidation("pc_TR_body","req","Please enter description ");  
</SCRIPT>
</td></tr></table></td></tr>
</table>
