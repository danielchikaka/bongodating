<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

// Add user favorite list
if(isset($_POST['favor_id']))
{
	$check_refer = mysql_query("select favor_id , user_id from favorites where favor_id = '".$_POST['favor_id']."' and user_id = '".$_SESSION['userid']."'");
	
	if(mysql_num_rows($check_refer)<1)
	{
		$sdate = date('d-m-Y h:i:s A');
		$insert = mysql_query("insert into favorites set user_id = '".$_SESSION['userid']."', favor_id = '".$_POST['favor_id']."', sdate = '".$sdate."' ") or die(mysql_error());
		$last_id = mysql_insert_id();
	}
}

// Fetch favorite user 
$user_refer	= mysql_query("select * from favorites where user_id = '".$_SESSION['userid']."' ");

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
      <?php if(mysql_num_rows($user_refer)>0){
	  while($fetch_refer = mysql_fetch_array($user_refer)){ 
	  
	  // fetch details form favorite user
	  $referer		= mysql_fetch_array(mysql_query("select * from user where user_id = '".$fetch_refer['favor_id']."'"));
	  $fetch_img 	= mysql_fetch_array(mysql_query("select * from user_images where user_id = '".$referer['user_id']."'"));
	  $show_img		= $fetch_img['user_image'];
	  
	  $referer_info	= mysql_fetch_array(mysql_query("select * from user_info where user_id='".$fetch_refer['favor_id']."'"));
	  $user_birthdate = $referer['user_birthdate'];
	  $lastlogin	= mysql_fetch_array(mysql_query("select * from user_lastlogin where user_id='".$fetch_refer['favor_id']."'"));
	  $onstatus 	= $lastlogin['online_status'];
	  ?>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="blank"><a href="viewprofile.php?profid=<?=$referer['user_id'];?>"><img src="images/user_images/smallthumb/<?=$show_img;?>" height="90px" width="90px"/></a></div>
        <table width="761">
          <tr>
            <td width="234" height="85" style="padding-top:20px;"><div class="inbox_txt" style="width:200px; margin:4px;"> <a href="viewprofile.php?profid=<?=$referer['user_id'];?>">
                <?=$referer['user_name'];?>
                </a></div>
              <div class="inbox_txt" style="width:200px; margin:4px;">
                <?=$lastlogin['lastlogin'];?>
              </div></td>
            <td width="286" style="padding-top:20px;"><div class="inbox_txt" style="width:200px; margin:4px;"><?php echo Age($user_birthdate).", "; echo ucfirst($referer_info['city']);?></div>
              <div class="inbox_txt" style="width:200px; margin:4px;">
                <?=$referer_info['lookingfor'];?>
                &nbsp;&nbsp;<a href="send_msg.php?uid=<?=$referer['user_id'];?>"><img src="images/mail.png" /></a>&nbsp;&nbsp;&nbsp;
                <?php if($onstatus=='1') { 
 $words = explode(' ', trim($referer['user_name'])); ?>
                <a href="javascript:void(0)" onClick="javascript:chatWith('<?=$words[0]?>')"><font color="#009900">Chat</font></a>
                <?php } ?>
              </div></td>
            <td width="225" style="padding-top:20px;"><table>
                <tr>
                  <td height="75px;"><div class="inbox_txt" style="width:200px; margin:4px;"><a href="update_note.php?uid=<?=$fetch_refer['id'];?>">Update Note</a></div>
                    <div class="inbox_txt" style="width:200px; margin:4px;"><a href="delete_favorite.php?uid=<?=$fetch_refer['id'];?>">Remove</a></div>
                    <div class="inbox_txt" style="width:200px; margin:4px;"><a href="viewallmessages.php?sender_id=<?=$referer['user_id']?>">View MSGs</a></div></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <div class="clr"></div>
      </div>
      <?php } } else { ?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1"><strong>Your Favorite List is Empty</strong></div>
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
