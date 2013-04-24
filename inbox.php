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
<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />
</head>
<body>
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <div id="illust">
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1"><strong>Upload pictures of yourself smiling and having fun!</strong> The psychology is if you are happy you can make others happy. Love is all about having shared experiences, and if you can't have shared experiences with someone you can't love them. Try talking about things you like to do, ie skiing, hiking, reading, music, interests, passions etc.</div>
      </div>
      <div class="clr"></div>
      <?php if($_GET['msgid']=='1'){?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="color:#CC0000;"><strong>Your Message has been sent successfully.</strong></div>
      </div>
       <?php } elseif($_GET['lnermg']=='2') { ?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="color:#CC0000;"><strong>Please select checkbox to delete message.</strong></div>
      </div>
      <?php } elseif($_GET['lnermg']=='1') { ?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="color:#CC0000;"><strong>Message has been deleted successfully.</strong></div>
      </div>
      <?php } ?>
      <div class="clr"></div>
      <div class="clr"></div>
      <div class="clr"></div>
      <?php 
	  // Fetch user randam for display on top
	  $showuser = mysql_query("select * from user where user_id != '".$_SESSION['userid']."' order by rand() limit 0,10");
	  while($fetchimage = mysql_fetch_array($showuser))
	  {
	  	  $show_gender 	= $fetchimage['user_gender'];
	      $show_id 		= $fetchimage['user_id'];
		  $fetch_img1	= mysql_fetch_array(mysql_query("select user_image from user_images where user_id = '".$show_id."' and main_image = '1' "));
          $show_image	= $fetch_img1['user_image'];
		  $topuid[] 	= $fetchimage['user_id'];
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
      <form name="inb" id="inb" action="del_inbox.php" method="post">
        <div class="profl_title"> Inbox</div>
        <div class="clr"></div>
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <p>&nbsp;</p>
          <div class="inbox_fld">
            <input name="check_all" type="checkbox" onClick="checkall(this.form)" value="check_all"  rec_product_id="check_all">
            From</div>
          <div class="inbox_fld">Date Sent</div>
          <div class="inbox_fld">Subject</div>
          <div class="inbox_txt2" style="width:150px;">Last Online</div>
          <div class="inbox_txt2" style="width:150px;">Replied</div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <div class="clr"> </div>
        </div>
        <div class="clr"></div>
        <?php 
		// Fetch message your inbox
	  	$inbox = mysql_query("select * from messages where rece_id = '".$_SESSION['userid']."' and status = '1' order by id desc");
	    if(mysql_num_rows($inbox)>0)
		{
		while($info_inbox = mysql_fetch_array($inbox)){
		$sender_id 	= $info_inbox['sender_id'];
		$fetch_user	= mysql_fetch_array(mysql_query("select * from user where user_id = '".$info_inbox['sender_id']."'"));
		$fetch_img	= mysql_fetch_array(mysql_query("select * from user_images where user_id = '".$info_inbox['sender_id']."' and main_image = '1' "));
		$user_image = $fetch_img['user_image'];
		$user_gender= $fetch_user['user_gender'];
	    $user_id 	= $fetch_user['user_id'];
		
		$lastlogin	= mysql_fetch_array(mysql_query("select * from user_lastlogin where user_id = '".$user_id."' "));
	  	$onstatus 	= $lastlogin['online_status'];
	  ?>
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <div class="inbox_txt3">
            <input name="inbcheck[]" id="inbcheck[]" type="checkbox" value="<?=$info_inbox['id'];?>" />
          </div>
          <div class="blank"> <a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>">
            <?php if($user_image!='') { ?>
            <img src="images/user_images/smallthumb/<?php echo $user_image;?>" border="0" width="90" height="90"/>
            <?php } else { ?>
            <img src="images/blank.jpg" border="0" width="90" height="90" />
            <?php } ?>
            </a> </div>
          <div class="inbox_fld2" style="padding-top:20px; width:180px;"><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>">
            <?=$fetch_user['user_name'];?>
            </a> &nbsp;&nbsp;&nbsp;
            <?php if($onstatus=='1') { 
			$words = explode(' ', trim($fetch_user['user_name'])); ?>
            <a href="javascript:void(0)" onClick="javascript:chatWith('<?=$words[0]?>')"><font color="#009900">Chat</font></a>
            <?php } ?>
            <br />
            <?=$info_inbox['datetime'];?>
          </div>
          <div class="inbox_fld2" style="width:180px; color:#6666CC;"><a href="viewallmessages.php?sender_id=<?=$sender_id;?>">
            <?php if($info_inbox['readflage']==0) { ?>
            <img src="images/mail.png" />
            <?php } ?>
            View Message</a></div>
          <div class="inbox_fld2">
            <?php if($info_inbox['reply']==1) { ?>
            <img src="images/replied.png" />
            <?php } ?>
          </div>
          <div class="inbox_fld2">Show</div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <div class="clr"></div>
        </div>
        <?php } } else { ?>
        <div class="chemistry_main" style="background:#f1f1f1;">
          <div class="profl_txt_1" style="color:#CC0000;"><strong>Your Inbox List is Empty.</strong></div>
        </div>
        <?php } ?>
        <div class="clr"></div>
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <p>&nbsp;</p>
          <div class="mail-settings">
            <input type="image" src="images/delete_selc.png" name="button" id="button" value="Submit" />
          </div>
          <div class="mail-settings2">
          </div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </div>
      </form>
      <div class="clr"></div>
      <?php 
	  // Fetch user random for display on bottom
	  $idtopuid 	= implode(',', $topuid);
	  $userquery	= mysql_query("select * from user where user_id != '".$_SESSION['userid']."' and user_id NOT IN (".$idtopuid.") order by rand() limit 0,5");
	  while($fet_query=mysql_fetch_array($userquery))
	  {
          $show_gender  = $fet_query['user_gender'];
	      $show_id		= $fet_query['user_id']; 
		  $fetch_img2	= mysql_fetch_array(mysql_query("select user_image from user_images where user_id = '".$show_id."' and main_image = '1' "));
		  $show_img		= $fetch_img2['user_image'];
		  ?>
      <div class="box">
        <?php if($show_img != '') { ?>
        <a href="viewprofile.php?profid=<?=$show_id;?>&gen=<?=$show_gender;?>"><img src="images/user_images/smallthumb/<?php echo $show_img;?>" border="0" width="100" height="80"/></a>
        <?php } else { ?>
        <a href="viewprofile.php?profid=<?=$show_id;?>&gen=<?=$show_gender;?>"><img src="images/blank.jpg" border="0" width="100" height="80" /></a>
        <?php } ?>
      </div>
      <?php } ?>
      <div class="clr"></div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
</body>
</html>
