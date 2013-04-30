<?php 
session_start();
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

// Update note  about user
if(isset($_POST['updatenote']))
{
	$upd 	= mysql_query("update favorites set note = '".$_POST['notes']."' where id = '".$_REQUEST['uid']."' ");
	$locate = $_REQUEST['uid'];

	if($upd)
	{
		header("location:update_note.php?uid=$locate");
	}
}

// Get favorite note  about user
$query_note = mysql_fetch_array(mysql_query("select note from favorites where id = '".$_REQUEST['uid']."'"));
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
<script language="JavaScript" type="text/javascript" src="js/slideshow.js"></script>
</head>
<body>
  <?php include_once("header.php");?>
<div id="wrapper">
  <div class="chemistry_main" style="background:#f1f1f1; margin-top:50px; width:750px;">
    <div class="clr"></div>
    <div class="chemistry_hd_txt" style="font-size:10px; color:#000000;">This Note Is Only Visible To You. Write Yourself A Note About Why You Added This Person To Your Favorites Etc. </div>
    <div class="clr"></div>
    <div class="chemistry_hd_txt" style="font-size:12px;">View Profile <img src="images/mail.png" /></div>
    <div class="clr"></div>
    <form id="form1" name="form1" method="post" action="">
      <div class="clr"></div>
      <div>To
        <input type="text" name="" id="" value="" style="padding-left:40px;" />
      </div>
      <div class="clr"></div>
      <div class="mandatory_flds2">
        <label>
        <textarea name="notes" id="notes"  style="width:500px; height:200px; margin-left:115px;"><?=$query_note['note']; ?>
</textarea>
        </label>
      </div>
      <div class="clr"></div>
      <div class="registration_form_bttn">
        <p align="center">
          <input type="submit" name="updatenote" id="updatenote" value="Update Note" />
        </p>
      </div>
    </form>
    <p>&nbsp; </p>
    <div class="clr"></div>
  </div>
</div>
<br />
<br />
<br />
<br />
<?php include_once("footer.php");?>
</body>
</html>
