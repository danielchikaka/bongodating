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
      <?php if($_GET['lnermg']=='2') { ?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="color:#CC0000;"><strong>Please select checkbox to delete message.</strong></div>
      </div>
      <?php } elseif($_GET['lnermg']=='1') { ?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="color:#CC0000;"><strong>Message has been deleted successfully.</strong></div>
      </div>
      <?php } ?>
      <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="profl_title"> Sent Messages</div>
      <div class="clr"></div>
      <form name="sent" id="sent" action="del_sentmail.php" method="post">
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <p>&nbsp;</p>
          <div class="inbox_fld">
            <input name="check_all" type="checkbox" onClick="checkall(this.form)" value="check_all"  rec_product_id="check_all">
            Sent To </div>
          <div class="inbox_fld">
          </div>
          <div class="inbox_fld">Subject</div>
          <div class="inbox_txt2" style="width:150px;">Read</div>
          <div class="inbox_txt2" style="width:150px;">Last Online</div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <div class="clr"> </div>
        </div>
        <div class="clr"></div>
        <?php
		 // Fetch Sent message details by us	 
		 $sentbox= mysql_query("select * from messages where sender_id='".$_SESSION['userid']."' and send='1' order by id desc");
		 if(mysql_num_rows($sentbox)>0)
		 {
			while($info_inbox=mysql_fetch_array($sentbox)){
			$sender_id 	= $info_inbox['sender_id'];
			$rece_id 	= $info_inbox['rece_id'];
			$fetch_user	= mysql_fetch_array(mysql_query("select * from user where user_id = '".$info_inbox['rece_id']."' "));
			$fetch_img	= mysql_fetch_array(mysql_query("select * from user_images where user_id = '".$rece_id."' and main_image = '1' "));
			$user_image = $fetch_img['user_image'];
			//$user_image = $fetch_user['user_image'];
			$user_gender = $fetch_user['user_gender'];
			$user_id 	= $fetch_user['user_id'];
			
			// check online status
			$lastlogin	= mysql_fetch_array(mysql_query("select * from user_lastlogin where user_id = '".$user_id."' "));
			$onstatus 	= $lastlogin['online_status'];
			?>
			<div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
			<div class="inbox_txt3">
			<input name="sentcheck[]" id="sentcheck[]" type="checkbox" value="<?=$info_inbox['id'];?>" />
			</div>
			<div class="blank"><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>">
			<?php if($user_image!='') { ?>
			<img src="images/user_images/<?php echo $user_image;?>" border="0" width="90" height="90"/>
			<?php } else { ?>
			<img src="images/blank.jpg" border="0" width="90" height="90" />
			<?php } ?>
			</a> </div>
			<div class="inbox_fld2" style="padding-top:20px; width:180px;"><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>">
			<?=$fetch_user['user_name'];?>
			</a>&nbsp;&nbsp;&nbsp;
			<?php if($onstatus == '1') { 
			$words = explode(' ', trim($fetch_user['user_name'])); ?>
			<a href="javascript:void(0)" onClick="javascript:chatWith('<?=$words[0]?>')"><font color="#009900">Chat</font></a>
			<?php } ?>
			<br />
			<?=$info_inbox['datetime'];?>
			</div>
			<div class="inbox_fld2" style="width:180px; color:#6666CC;"><a href="viewmessage.php?sender_id=<?=$rece_id;?>&msgid=<?php echo $info_inbox['id'];?>">
			<?php if($info_inbox['replyid'] != 0) { ?>
			RE:
			<?php } ?>
			View Message</a></div>
			<?php 
			$lastlog 	= mysql_fetch_array(mysql_query(" select * from user_lastlogin  where online_status = '1' and user_id = '".$user_id."' "));
			$start_date = $lastlog['lastlogin']; 
			$online_status = $lastlog['online_status']; 
			?>
			<div class="inbox_fld2">
			<?php if($online_status == '1') { echo date_diff($start_date); } ?>
			</div>
			<div class="inbox_fld2">Show</div>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<div class="clr"></div>
			</div>
			<?php } } else { ?>
        <div class="chemistry_main" style="background:#f1f1f1;">
          <div class="profl_txt_1" style="color:#CC0000;"><strong>Your Sent Box List is Empty.</strong></div>
        </div>
        <?php } ?>
        <div class="clr"></div>
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <p>&nbsp;</p>
          <div class="mail-settings">
            <input type="image" src="images/delete_selc.png" name="button" id="button" value="Submit" />
          </div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </div>
      </form>
      <div class="clr"></div>
      <div class="chemistry_main" style=" margin-top:20px;">
        <div class="profl_link2">
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
</body>
</html>
