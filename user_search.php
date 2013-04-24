<?php 
include_once("config/db_connect.php") ;
include_once("config/ckh_session.php");

// Fetch user details
$userdata 	= mysql_query("select * from user where user_id = '".$_SESSION['userid']."' ");
$fetch_user	= mysql_fetch_array($userdata);

$userinfo	= mysql_query("select * from user_info where user_id = '".$fetch_user['user_id']."' ");
$fetch_info = mysql_fetch_array($userinfo);
//$search	= mysql_query("select * from user where user_ethnicity = '".$fetch_user['user_ethnicity']."' and user_id = '".$_SESSION['userid']."' ");
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
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <div id="illust">
      <div class="profl_contnt2">
        <p>&nbsp;</p>
      </div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="basic_list">
          <ul>
            <li><a href="basicsearch.php">Basic Search</a></li>
            <li>|</li>
            <li><a href="advancedsearch.php">Advanced Search</a></li>
            <li>|</li>
            <li><a href="user_search.php">Username Search</a></li>
          </ul>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <form name="frm1" id="frm1" action="ad-bscusrh.php" method="post">
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <div class="basic_txt"></div>
          <div class="basic_txt"></div>
          <div class="clr"></div>
          <div class="basic_txt" style="margin: 5px 0 0 23px;"><b>User Search</b> (enter username)</div>
          <div class="basic_txt">
            <input type="text" name="search_user" value="" />
          </div>
          <div class="basic_txt">
            <input class="#" type="submit" name="search" value="Find User">
          </div>
          <div class="clr"></div>
        </div>
      </form>
      <div class="clr"></div>
      <?php
	  	  // Fetch user randam for display	 
		  $showuser = mysql_query(" select * from user where user_id != '".$_SESSION['userid']."' order by rand() limit 0,10");
		  while($fetchimage = mysql_fetch_array($showuser))
		  {
			  //$show_image	= $fetchimage['user_image']; 
			  $show_gender 	= $fetchimage['user_gender'];
			  $show_id 		= $fetchimage['user_id'];
			  $topuid[] 	= $fetchimage['user_id'];
			  
			  $fetch_img1	= mysql_fetch_array(mysql_query("select user_image from user_images where user_id = '".$show_id."' and main_image = '1' "));
			  $show_image	= $fetch_img1['user_image'];
			  ?>
		  <div class="box">
			<?php if($show_image != '') { ?>
			<a href="viewprofile.php?profid=<?=$show_id;?>&gen=<?=$show_gender;?>"><img src="images/user_images/smallthumb/<?php echo $show_image;?>" border="0" width="100" height="80"/></a>
			<?php } else { ?>
			<a href="viewprofile.php?profid=<?=$show_id;?>&gen=<?=$show_gender;?>"><img src="images/blank.jpg" border="0" width="100" height="80" /></a>
			<?php } ?>
		  </div>
      <?php } ?>
      <div class="clr"></div>
    </div>
    <p>&nbsp;</p>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
