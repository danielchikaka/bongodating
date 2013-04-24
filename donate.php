<?php 
include_once("config/db_connect.php");

// Get page content of Donate page
$page	= mysql_fetch_array(mysql_query("select * from tbl_pages where pageid = 5"));

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

</head>
<body>
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <div id="illust">
      <div class="clr"></div>
      <div class="chemistry_hd_txt" style="text-align:left; margin-left:50px;"> <u>
        <?=ucwords($page['pagetitle']);?>
        </u> </div>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="text-align: justify;"> <?php echo stripslashes($page['pagetext']);?></div>
      </div>
      <div class="profl_contnt2">
      </div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
