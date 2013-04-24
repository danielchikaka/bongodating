<?php 
include_once("config/db_connect.php") ;
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
	jQuery("#emailpass").validationEngine();
	});
</script>

<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />
</head>
<body>
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <div id="illust">
      <?php
			//$login_check = mysql_query("select * from user where user_name LIKE '%$search_user%' and status = '1'");
			$userinfomfm = mysql_fetch_array(mysql_query("select seeking, city from user_info where user_id = '".$_SESSION['userid']."'"));
			$ucity = $userinfomfm['city'];
		?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_title"><strong>Will Respond</strong></div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="profl_txt_usersrch">If you want to increase your chances of receiving a response, read their profile and talk about something you have in common in your message. Users most likely to respond. Their last login was about 20 hours ago, and they are expected to be online again in the next 3 hours. </div>
      <?php
		// Fetch users, which users contact by mail
		$csql 	= "select user_id from user_info where city = '".$ucity."' ";
		
		$inbox 	= mysql_query( " select DISTINCT rece_id from messages where sender_id = '".$_SESSION['userid']."' and status = '1' ");
		$rece_id = 0;
		while($info_inbox = mysql_fetch_array($inbox))
		{
			$rece_id .= ", ".$info_inbox['rece_id'];
		}
		
		if($_POST['contacted'] == 2) 
		{
			$csql .= " and user_id NOT IN (".$rece_id.")";
		}
		elseif($_POST['contacted']==3) 
		{
			$csql .= " and user_id IN (".$rece_id.")";
		}
		
		$ucity_exe = mysql_query($csql);
		$cuserid = 0;
		while($rowu = mysql_fetch_array($ucity_exe)) 
		{
			$cuserid .= ",".$rowu['user_id'];
		}
		
		$sql 	= "select * ";
		$sql 	.= " from user where status = '1'  ";
		if($userinfomfm['seeking'] != '') 
		{ 
			$sql .= "and user_gender = '".$userinfomfm['seeking']."' "; 
		}
		if($cuserid!='0') 
		{ 
			$sql .= " and user_id IN (".$cuserid.") ";
		}
		
		if(($_POST['fstage'] != '') && ($_POST['scdage'] != '')) 
		{
			$sql .= "and age between '".$_POST['fstage']."' and '".$_POST['scdage']."' ";
		}
		$sql .= " order by user_id desc  ";
		
		$login_check = mysql_query($sql);
		
		if(mysql_num_rows($login_check)>0)
		{
		?>
          <div class="profl_txt_usersrch">
            <div class="chemistry_main"><strong> <font color="#FF0000">Not enough local matches, defaulting to a state level search.</font><br />
              Last 10 people to check their mail, in your state.</strong> </div>
          </div>
		  <?php
			while($rowuser = mysql_fetch_array($login_check)) 
			{
				$user_name 		= $rowuser['user_name'];
				//$user_image 	= $rowuser['user_image'];
				$user_birthdate = $rowuser['user_birthdate'];
				$user_gender 	= $rowuser['user_gender'];
				$user_id 		= $rowuser['user_id'];
				$fetch_img		= mysql_fetch_array(mysql_query("select * from user_images where user_id = '".$user_id."' and main_image = '1'"));
				$user_image 	= $fetch_img['user_image'];
				
				$usercountry 	= mysql_fetch_array(mysql_query("select name from country where country_id = '".$rowuser['user_country']."'"));
				$userinfo 		= mysql_fetch_array(mysql_query("select * from user_info where user_id = '".$user_id."'"));
				
				$lookingfor 	= $userinfo['lookingfor'];
				$headline 		= $userinfo['headline'];
				$city 			= $userinfo['city'];
				$talking_about 	= $userinfo['talking_about'];
				$seeking 		= $userinfo['seeking'];
				$mseek 			= strtoupper(substr($user_gender,0,1))."S".strtoupper(substr($seeking,0,1));
				
				//check online status
				$showuser = mysql_fetch_array(mysql_query(" select  online_status from user_lastlogin  where user_id = '".$user_id."' "));
				$onstatus = $showuser['online_status'];
		?>
          <div class="chemistry_main" style="background:#f1f1f1;">
            <?php if($user_image!='') { ?>
            <div class="box"> <a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>"><img src="images/user_images/smallthumb/<?php echo $user_image;?>" border="0" width="100" height="80"/></a><br />
              <?php if($onstatus=='1') { 
     $words = explode(' ', trim($user_name)); ?>
              <a href="javascript:void(0)" onClick="javascript:chatWith('<?=$words[0]?>')"><font color="#009900">Chat</font></a>
              <?php } ?>
            </div>
            <?php } else { ?>
            <div class="box"> <a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>" class="internal1-2">
              <?=$user_name;?>
              </a><br />
              Age: <?php echo Age($user_birthdate); ?><br />
              <?=$lookingfor;?>
              <br />
              <?php if($onstatus=='1') { 
     $words = explode(' ', trim($user_name)); ?>
              <a href="javascript:void(0)" onClick="javascript:chatWith('<?=$words[0]?>')"><font color="#009900">Chat</font></a>
              <?php } ?>
            </div>
            <?php } ?>
          </div>
          <?php
    }
    } else { ?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="color:#CC0000;"><strong> Sorry - our My Matches list shows you users we've specifically chosen for you! Sometimes, this list runs out. Don't worry, new users will be added to the list soon.</strong>
          <div class="clr"></div>
        </div>
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
