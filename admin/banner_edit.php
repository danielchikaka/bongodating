<?
require_once("img_crop.php");
$dim_requirement = array(645,362);
$size_requirement = array(645,362);
$min_size_requirement=array(645,362);
$path  = '../images/homeimages/';


if($_REQUEST['btn_save']=="Submit") 
{
	$id 	= $_POST['id'];
    $title 	= addslashes($_POST['title']);
     
    $sql = " update banners set title = '$title' where id = ".$id;
	$qry=mysql_query($sql);
	//	die();
	$succ='Banner Edited Successfully!';
	
	if($_FILES['b_image']['name']!="")
	{
		$sql_img = mysql_query( " select * from banners where id = '".$id."' ");
		while($img_sql = mysql_fetch_array($sql_img))
		{
			$large_image_location = "../images/homeimages/".$img_sql['image'];
			$thumb_image_location = "../images/homeimages/thumbnail/".$img_sql['image'];
			if (file_exists($large_image_location)) {
				@unlink($large_image_location);
			}
			if (file_exists($thumb_image_location)) {
				@unlink($thumb_image_location);
			}
		}
		
		// Uploade new image
		$name = $_FILES['b_image']['name'];
    	$filenameext = pathinfo($name, PATHINFO_EXTENSION);
    	$size = getimagesize($_FILES['b_image']['tmp_name']);
    	$source_pic = $destination_pic = $_FILES['b_image']['tmp_name'];
	  
		$newname = date("U")."b_image.".$filenameext; 
		move_uploaded_file($_FILES['b_image']['tmp_name'],$path.$newname);
		$source_pic1=$destination_pic1= $path.$newname;
		$size1= resize($source_pic1,$destination_pic1,$size,$size_requirement);//Big Image
		
		
		$sq_upd = "update banners set image = '$newname' where id = ". $id;
		mysql_query($sq_upd);
	}
	
  	if($qry) { $err=$succ; } else { $err=mysql_errno(); }
 
?>
<script>javascript:location.href="user.php?frm=banner_list&err=<?=$err?>";</script>
<? } ?>

<?php
$id = $_GET['id'];
$row = mysql_fetch_array(mysql_query("select * from banners where id = '$id' "));
$title = trim(stripslashes($row['title']));
$b_image = trim($row['image']);

?>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td><table width="100%" align="center" border="0" cellspacing="0" cellpadding="2">
        <tr valign="top">
          <td><table width="60%" align="center" border="0" cellspacing="1" cellpadding="2">
              <form name="frmvincent" method="post" action="user.php?frm=banner_edit" enctype="multipart/form-data">
                <tr valign="middle">
                  <td height="50" colspan="2" align="right">&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Title</td>
                  <td width="70%" align="left"><input name="title" type="text" class="txtfield" size="40" value="<?=$title;?>" /></td>
                </tr>
                <? if($b_image!='') { ?>
                <tr valign="middle">
                  <td width="30%" align="right" height="19">&nbsp;</td>
                  <td width="70%" align="left"><img src="../images/homeimages/<?=$b_image;?>" border="0" width="150" height="100" /></td>
                </tr>
				<? } ?>
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Upload Image</td>
                  <td width="70%" align="left"><input name="b_image" type="file" class="txtfield" ></td>
                </tr>
                <tr>
                  <td height="40" valign="bottom"></td>
                  <td><input name="btn_save" type="submit" class="button2" value="Submit">
                    <input name="btn_cancel" type="button" onclick="javascript:location.href='user.php?frm=banner_list';" class="button2" value="Cancel">
                    <input type="hidden" name="id" value="<?=$id?>" /></td>
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
