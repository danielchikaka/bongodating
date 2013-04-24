<?php 
include_once("config/db_connect.php") ;
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
	jQuery("#form1").validationEngine();
	});

</script>

</head>
<body>
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <div id="illust">
      <div class="chemistry_inbox_log" style="background:#f1f1f1;">
        <div class="profl_txt_1"> You have to <a href="registration1.php" style="color:#8773A7;">Register for FREE (Click Here)</a> to use this dating site. <br />
          <br />
          If you have a problem please read the help section. If you are already registered login below.  </div>
      </div>
      <div class="clr"></div>
      <form id="chmail" name="chmail" method="post" action="login_refer.php">
        <div class="sign_box_log">
          <div class="mandatory_inbox">Username </div>
          <div class="mandatory_flds_inbox">
            <input type="hidden" name="go" id="go" value="<?php echo $_SERVER['HTTP_REFERER'];?>" />
            <label>
            <input type="text" name="email" id="email" value="" style="width:120px;" />
            </label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_inbox">Password </div>
          <div class="mandatory_flds_inbox">
            <label>
            <input type="password" name="pass" value=""  class="validate[required] input" id="pass" style="width:120px;" />
            </label>
          </div>
          <div class="clr"></div>
          <div class="user">
            <input type="image" src="images/chk_mail.png" name="button" id="button" value="Submit" />
          </div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </div>
      </form>
      <div class="clr"></div>
      <p style="text-align:center; margin-top:10px; margin-right:40px;"><a href="forgotpw.php" class="internal1-1">Forgot Your password?</a></p>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
