<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

$profid 	= $_GET['profid'];
$sdate 		= date('d-m-Y h:i:s A');

// Get user details
$query		= mysql_query("select * from user where user_id = '".$profid."' ");
$fetch_user	= mysql_fetch_array($query);

$fetch_img	= mysql_fetch_array(mysql_query("select user_image from user_images where user_id = '".$fetch_user['user_id']."' "));
$showimg	= $fetch_img['user_image'];

$info_query	= mysql_query("select * from user_info where user_id = '".$fetch_user['user_id']."'");
$fetch_info	= mysql_fetch_array($info_query);

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
	jQuery("#sendmail").validationEngine();
	});

</script>

</head>
<body>
  <?php include_once("header.php");?>
<div id="wrapper">
  <div id="maincont">
    <div id="illust">
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1">We've found that women READ your profile BEFORE they open your email. If your profile description sucks it doesn't matter how good your email is. Make sure your description contains "Hopes and aspirations", "Hobbies/interests in general", "Musical Tastes". These are all conversation starters and will show a woman you have something in common with her. If your profile description is blank or super short you are 9 times more likely to get "unread deleted". Edit your description section.</div>
      </div>
      <div class="clr"></div>
      <div class="box2_main">
        <div class="box2-2">
          <?php if ($showimg!='') {?>
          <img  src="images/user_images/smallthumb/<?php echo $showimg;?>" />
          <?php } ?>
          <br />
        </div>
      </div>
      <div class="clr"></div>
      <div class="person_name"><a href="viewprofile.php?profid=<?=$fetch_user['user_id'];?>" class="internal1-2">
        <?=ucfirst($fetch_user['user_name']);?>
        </a></div>
      <div class="clr"></div>
      <?php if($fetch_user['user_gender']=='male') {?>
      <div class="gift_txt12"> is a <?php echo Age($fetch_user['user_birthdate']);?> year old man.-
        <?=$fetch_info['headline'];?>
      </div>
      <?php } else { ?>
      <div class="gift_txt12"> is a <?php echo Age($fetch_user['user_birthdate']);?> year old woman.-
        <?=$fetch_info['headline'];?>
      </div>
      <?php } ?>
      <div class="gift_txt">
        <?=$fetch_info['talking_about'];?>
      </div>
      <div class="gift_txt12"> Interests:-
        <?=$fetch_info['interests'];?>
      </div>
      <div class="clr"></div>
      <form name="sendmail" id="sendmail" method="post" action="sendmsg_success.php?profid=<?=$profid;?>">
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <div class="mandatory_txt2">To :</div>
          <div class="mandatory_flds" style="margin-left:28px;">
            <label>
            <input type="text" name="username" id="username" value="<?=$fetch_user['user_name'];?>" />
            </label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt2">Subject:</div>
          <div class="mandatory_flds">
            <label>
            <input type="text" name="sub" id="sub" value="" class="validate[required]" />
            </label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_flds2">
            <label>
            <textarea name="message" id="message"  style="width:800px; height:250px;"></textarea>
            </label>
          </div>
          <div class="mandatory_flds2"></div>
          <div class="mandatory_flds2"></div>
          <div class="clr"></div>
          <div class="registration_form_bttn">
            <input type="hidden" name="sendmsg" id="sendmsg" />
            <input type="image" src="images/msg_now.png" name="button2" id="button2" value="Submit" />
          </div>
          <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;"></div>
          <div class="clr"></div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </div>
      </form>
      <div class="clr"></div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
