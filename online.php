<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

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
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_heading"><strong>Online Users</strong></div>
      </div>
      <div class="clr"></div>
      <?php
	  $pageid	= 0;	
	  if(isset($_GET['pageid'])) $pageid = $_GET['pageid'];
	  $pagesize	= 5; 
	  $start 	= $pageid + $pagesize;
	  
	  // Get User Details
	  $showuser	= mysql_query(" select * from user where user_id in ( select  user_id from user_lastlogin  where online_status='1' ) limit $pageid , $pagesize");
	  $lastpage = mysql_num_rows($showuser);
	  $maxminno = mysql_num_rows(mysql_query("select * from user where user_id in ( select  user_id from user_lastlogin  where online_status = '1' ) "));
	  while($fetchimage=mysql_fetch_array($showuser))
	  {
          //$show_image		= $fetchimage['user_image']; 
		  $show_gender 		= $fetchimage['user_gender'];
		  $user_name 		= $fetchimage['user_name'];
		  $user_birthdate 	= $fetchimage['user_birthdate'];
	      $show_id 			= $fetchimage['user_id'];
		  
		  // Get user Details
		  $fetch_img1 		= mysql_fetch_array(mysql_query(" select user_image from user_images where user_id = '".$show_id."' and main_image = '1' "));
          $show_image		= $fetch_img1['user_image'];
		  $fetch_info 		= mysql_fetch_array(mysql_query(" select * from user_info where user_id = '".$show_id."' "));
		  ?>
      <?php if($show_image != '') { ?>
      <div class="box"> <a href="viewprofile.php?profid=<?=$show_id;?>&gen=<?=$show_gender;?>"><img src="images/user_images/<?php echo $show_image;?>" border="0" width="100" height="80"/></a> </div>
      <?php } else { ?>
      <div class="box"> <a href="viewprofile.php?profid=<?=$show_id;?>&gen=<?=$show_gender;?>" class="internal1-2">
        <?=$user_name;?>
        </a><br />
        Age: <?php echo Age($user_birthdate); ?><br />
        <?=$fetch_info['lookingfor'];?>
      </div>
      <?php } } ?>
      <div class="clr"></div>
      <div class="chemistry_main" >
        <div class="profl_txt_1">
          <?php if($maxminno>$pagesize) { if($lastpage>=$pagesize) { ?>
          <a href="online.php?pageid=<?=$start?>">Next Page</a>
          <? } else { ?>
          Next Page
          <? } } ?>
          </strong></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
