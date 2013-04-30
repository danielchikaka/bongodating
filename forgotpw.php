<?php 
session_start();
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
	jQuery("#emailpass").validationEngine();
	});

</script>

</head>
<body>
  <?php include_once("header.php");?>
<div id="wrapper">
  <div id="maincont">
    <div id="illust">
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1">If you forgot your password, enter your email address and it will be emailed to you once you press Email Password.</div>
        <?php if($_GET['fgermg']=='ferm') { ?>
        <div class="profl_txt_err">
          <?php if($_GET['eml']=='') { echo "That email address is not in our database "; } else { echo "Your username and password have been sent to ". base64_decode($_GET['eml']); } ?>
        </div>
        <?php } ?>
        <div class="clr"></div>
        <form name="emailpass" id="emailpass" action="forgotpwsave.php" method="post">
          <div class="mandatory_flds" style=" margin-left:380px;">
            <label>
            <input type="text" name="emailpwd" id="emailpwd" class="validate[required,custom[email]]" />
            </label>
          </div>
          <div class="mandatory_flds">
            <label>
            <input type="submit" name="emailsubmit" id="emailsubmit" value="Email Password" />
            </label>
          </div>
        </form>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
    <?php 
    // include_once("footer_up.php");
     ?>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
