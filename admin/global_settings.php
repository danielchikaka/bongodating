<?
require_once("img_crop.php");
$dim_requirement = array(174,91);
$size_requirement = array(174,91);
$min_size_requirement=array(174,91);
$path  = '../images/logo/';
  
if (isset($_REQUEST['btn_save'])=="Submit") 
{

    $site_name = addslashes($_POST['site_name']);
    $email = $_POST['email'];
	$meta_keyword = addslashes($_POST['meta_keyword']);
    $meta_description = addslashes($_POST['meta_description']);
	$copyright = addslashes($_POST['copyright']);
     
    $sql = " update settings set site_name = '$site_name' , email ='".$email."' , keyword = '$meta_keyword' , description = '$meta_description' , copyright = '$copyright' where id = '1' ";
	   
	$qry=mysql_query($sql);
		
	$succ='Global Config Save Successfully!';
	
	$row = mysql_fetch_array(mysql_query("select * from settings where id = '1' "));	 

	if($_FILES['logo']['name']!="")
	{
		// Delete old image
		$logo_image_location = "../images/logo/".$row['logo'];
		if (file_exists($logo_image_location)) {
			unlink($logo_image_location);
		}
		
		// Uploade new image
		$name = $_FILES['logo']['name'];
    	$filenameext = pathinfo($name, PATHINFO_EXTENSION);
    	$size = getimagesize($_FILES['logo']['tmp_name']);
    	$source_pic = $destination_pic = $_FILES['logo']['tmp_name'];
	  
		$newname = date("U")."logo.".$filenameext; 
		move_uploaded_file($_FILES['logo']['tmp_name'],$path.$newname);
		$source_pic1=$destination_pic1= $path.$newname;
		//$size1= resize($source_pic1,$destination_pic1,$size,$size_requirement);//Big Image
		 $sq_upd = "update settings set logo = '$newname' where id = 1 ";
		 mysql_query($sq_upd);
	}
	
	if($_FILES['favicon']['name']!="")
	{
		// Delete old image
		$favicon_image_location = "../images/logo/".$row['favicon'];
		if (file_exists($favicon_image_location)) {
			unlink($favicon_image_location);
		}
		
		// Uploade new image
		$name = $_FILES['favicon']['name'];
    	$filenameext = pathinfo($name, PATHINFO_EXTENSION);
    	$size = getimagesize($_FILES['favicon']['tmp_name']);
    	$source_pic = $destination_pic = $_FILES['favicon']['tmp_name'];
	  
		$newname = date("U")."favicon.".$filenameext; 
		move_uploaded_file($_FILES['favicon']['tmp_name'],$path.$newname);
		$source_pic1=$destination_pic1= $path.$newname;
		$sq_upd = "update settings set favicon = '$newname' where id = 1 ";
		mysql_query($sq_upd);
	}
	
  	if($qry) { $err=$succ; } else { $err=mysql_errno(); }
 
?>
<script>javascript:location.href="user.php?frm=global_settings&err=<?=$err?>";</script>
<? } ?>

<?php
$row = mysql_fetch_array(mysql_query("select * from settings where id = '1' "));
$site_name = trim(stripslashes($row['site_name']));
$email = trim($row['email']);
$keyword = trim(stripslashes($row['keyword']));
$description = trim(stripslashes($row['description']));
$logo = trim($row['logo']);
$favicon = trim($row['favicon']);
$copyright = trim(stripslashes($row['copyright']));

?>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td><table width="100%" align="center" border="0" cellspacing="0" cellpadding="2">
        <tr valign="top">
          <td><table width="100%" align="center" border="0" cellspacing="1" cellpadding="2">
              <form name="frmvincent" method="post" action="user.php?frm=global_settings" enctype="multipart/form-data">
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Site Name</td>
                  <td width="70%" align="left"><input name="site_name" type="text" class="txtfield" size="40" value="<?=$site_name;?>" /></td>
                </tr>
                <? if($logo!='') { ?>
                <tr valign="middle">
                  <td width="30%" align="right" height="19">&nbsp;</td>
                  <td width="70%" align="left"><img src="../images/logo/<?=$logo;?>" border="0" /></td>
                </tr>
				<? } ?>
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Logo Image</td>
                  <td width="70%" align="left"><input name="logo" type="file" class="txtfield" ></td>
                </tr>
                <? if($favicon!='') { ?>
                <tr valign="middle">
                  <td width="30%" align="right" height="19">&nbsp;</td>
                  <td width="70%" align="left"><img src="../images/logo/<?=$favicon;?>" border="0" /></td>
                </tr>
				<? } ?>
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Fevicon Image</td>
                  <td width="70%" align="left"><input name="favicon" type="file" class="txtfield" ></td>
                </tr>
		       <tr valign="middle">
                  <td width="30%" align="right" height="19"> Email </td>
                  <td width="70%" align="left"><input name="email" type="text" class="txtfield" size="40" value="<?=$email;?>" />
                  </td>
                </tr>
                <tr valign="middle">
                  <td width="30%" align="right" height="19">Meta Keyword</td>
                  <td width="70%" align="left"><textarea name="meta_keyword" cols="31" rows="3" class="txtfield" ><?=$keyword;?></textarea></td>
                </tr>
                <tr valign="middle">
                  <td width="30%" align="right" height="19">Meta Description</td>
                  <td width="70%" align="left"><textarea name="meta_description" cols="31" rows="4" class="txtfield" ><?=$description;?></textarea>
                  </td>
                </tr>
                <tr valign="middle">
                  <td width="30%" align="right" height="19"> Copyright text </td>
                  <td width="70%" align="left"><input name="copyright" type="text" class="txtfield" size="40" value="<?=$copyright;?>" />
                  </td>
                </tr>
                <tr>
                  <td height="40" valign="bottom"></td>
                  <td><input name="btn_save" type="submit" class="button2" value="Submit">
                    <input name="btn_cancel" type="reset" class="button2" value="Cancel">
                  </td>
                </tr>
              </form>
              <tr>
                <td height="5" colspan="2"></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
