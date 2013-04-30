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
  <?php include_once("header.php");?>
<div id="wrapper">
  <div id="maincont">
    <div id="illust">
      <?php if($_GET['lnermg']!='lerm') { ?>
      <div class="chemistry_inbox" style="background:#f1f1f1;">
        <div class="profl_txt_1"> Over 38 million users on <?php echo SITE_NAME;?> come together to connect, flirt, and share with each other, resulting in over 1 million conversations each day!Make an account and meet people in your area for free! <br />
          <br />
          Is your love interest a Keeper? | Relationship Chemistry Predictor | Relationship Needs Assessment <br />
          Or, take our new psychological assessment that will tell you what you really want versus what you say you want. </div>
      </div>
      <?php } elseif($_GET['lnermg']=='lerm') { ?>
      <div class="chemistry_inbox" >
        <div class="profl_txt_1">
          <table width="100%" border="3" cellspacing="0" cellpadding="0">
            <tr>
              <td class="ptext">Your username or password was incorrect. </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><a href="forgotpw.php" class="internal">Forgot Your Password? Click here to email it to yourself</a></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>If you forgot your password enter your email address and it will be mailed to you.</td>
            </tr>
            <tr>
              <td><form name="emailpass" id="emailpass" action="forgotpwsave.php" method="post">
                  <strong>Email:</strong>
                  <input type="text" name="emailpwd" id="emailpwd" />
                  <input type="submit" name="emailsubmit" id="emailsubmit" value="Email Password" />
                </form></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } ?>
      <form id="chmail" name="chmail" method="post" action="login.php">
        <div class="sign_box">
          <div class="mandatory_inbox">Username </div>
          <div class="mandatory_flds_inbox">
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
          <div class="clr"></div>
          <p>&nbsp;</p>
          <p><a href="forgotpw.php" class="internal1-1">Forgot Your password?</a></p>
        </div>
      </form>
      <div class="clr"></div>
      <?php if($_GET['lnermg']!='lerm') { ?>
      <form id="basicsrchform" name="basicsrchform" method="post" action="bscusrh.php">
        <div class="mandatory_flds">
          <label>
          <input type="text" name="search_user" id="search_user" value="" />
          </label>
        </div>
        <div class="mandatory_flds">
          <label>
          <input type="submit" name="button2" id="button2" value="Username Search" />
          </label>
        </div>
      </form>
      <?php } ?>
      <div class="clr"></div>
    </div>
    <?php include_once("footer_up.php"); ?>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
