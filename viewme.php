<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME; ?></title>
<meta name="description" content="AlwaysEden is a social network for relationship tips, answers, and answers to sex questions. Users can ask any question they want in a safe environment."/>

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

<script>

function checkall(form1)
{
	len = form1.elements.length;
	var i=0;
	for( i=0 ; i<len ; i++)
	{
	if (form1.elements[i].type=='checkbox') form1.elements[i].checked=form1.check_all.checked;
	}
}
</script>
</head>
<body>
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <div id="illust">
      <div class="chemistry_main" style="border: medium ridge; margin-top:30px;">
        <div class="chemistry_main" style="background:#f1f1f1;" >
          <div class="profl_heading"><strong>Unlock This Feature!!!</strong></div>
        </div>
        <div class="profl_txt_1"><strong>To see the last date and time that someone viewed your profile you need to have an Upgraded Membership.</strong></div>
        <div class="profl_txt_1"><strong></strong></div>
        <div class="profl_txt_1"><strong>Clich Here to Upgrade Now!<br />
          </br>
          <a href="upgrade.php"><img src="images/get_access_now.png" border="0" /></a> </strong></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
