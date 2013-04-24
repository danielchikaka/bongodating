<?php 
session_start();
include_once("config/db_connect.php");
include_once("thumbnail.inc.php");

// Check user id
if($_SESSION['userid'] == "")
{
	header("location:registration1.php");
	exit();
}

//For Uploading Profie pic
if(isset($_POST['sub1']))
{
	//$fn 	= date('U').$_FILES['userimage']['name'];
	$fn 	= date('U').".jpg";
	$ft 	= $_FILES['userimage']['type'];
	$fs 	= $_FILES['userimage']['size'];
	$ftmp 	= $_FILES['userimage']['tmp_name'];
	move_uploaded_file($ftmp, "images/user_images/$fn");
	$thumb	= new Thumbnail('images/user_images/'.$fn);
	$thumb->resize(100,100);
	$thumb->save('images/user_images/smallthumb/'.$fn);
	$thumb1 = new Thumbnail('images/user_images/'.$fn);
	$thumb1->resize(405,540);
	$thumb1->save('images/user_images/bigthumb/'.$fn);
	
	mysql_query("update  user set user_image = '".$fn."' where user_id = '".$_SESSION['last_id']."'") or die(mysql_error());
	$insert1 = mysql_query("insert into user_images set user_id = '".$_SESSION['last_id']."', user_image = '".$fn."', main_image = '1' ") or die(mysql_error());
	
	if($insert1)
	{
		header("location:registration3.php");
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME; ?></title>
<meta name="description" content="<?php echo SITE_DESCRIPTION; ?>"/>
<meta name="keywords" content="<?php echo SITE_KEYWORD; ?>"/>
<link rel="shortcut icon" type="image/x-icon" href="images/logo/<?php echo SITE_FAVICON; ?>"/>
<link href="templates/default/css/main.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/template.css" type="text/css"/>
<script src="js/jquery-1.6.min.js" type="text/javascript"></script>
<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"> </script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
            jQuery(document).ready(function(){
                jQuery("#form2").validationEngine();
            });
        </script>
</head>
<body>
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <div id="illust">
      <div class="registration_form_main">
        <div class="registration_form_head">Hottest New Singles Joining every Day!</div>
        <form id="form2" name="form2" enctype="multipart/form-data" method="post" action="">
          <div class="registration_form_mid">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div class="registration_txt">Upload Image</div>
            <div class="registration_form_flds1">
              <label>
              <input type="file" name="userimage" id="userimage" class="validate[required]" />
              </label>
            </div>
            <div class="clr"></div>
          </div>
          <div class="registration_form_btm">
            <div class="registration_form_bttn1" style="margin-left:275px;">
              <input type="hidden" name="sub1" id="sub1" value="" />
              <input type="image" src="images/next.jpg" name="button" id="button" value="Submit" />
            </div>
            <div class="registration_form_bttn1"> <a href="registration3.php"><img src="images/skip_btn.png" /></a> </div>
          </div>
        </form>
      </div>
    </div>
    <div class="clr"></div>
    <?php include_once("footer_up.php"); ?>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
