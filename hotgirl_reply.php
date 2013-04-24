<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

// fetch user details and check member type paid or unpaid
$pay_staus 	= mysql_fetch_array(mysql_query("select * from user where user_id = '".$_SESSION['userid']."'"));
$payment	= $pay_staus['memtype'];

// for unpaid member
if($payment == '0') 
{
	header("location:hotgirl.php");
}
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
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_title"><strong>Hot Girls</strong></div>
        <div class="clr"></div>
      </div>
      <?php
// check member who replyed your mails and displayed them 	  	  
$msg_reply = mysql_query("select distinct sender_id from messages where rece_id='".$_SESSION['userid']."' and replyid != '0'");
if(mysql_num_rows($msg_reply)>0)
{
	while($rowuser 	= mysql_fetch_array($msg_reply)) 
	{
		//member details
		$replyuser_id	= mysql_query("select * from user where user_id = '".$rowuser['sender_id']."' and user_gender = 'female'  and status = '1'");
		if(mysql_num_rows($replyuser_id)>0){
		while($row_replyid = mysql_fetch_array($replyuser_id)){
		
		$user_name 		= $row_replyid['user_name'];
		$user_birthdate = $row_replyid['user_birthdate'];
		$user_gender 	= $row_replyid['user_gender'];
		$user_id 		= $row_replyid['user_id'];
		
		$fetch_img		= mysql_fetch_array(mysql_query("select * from user_images where user_id = '".$user_id."' and main_image = '1' "));
		$user_image 	= $fetch_img['user_image'];
		
		$usercountry 	= mysql_fetch_array(mysql_query("select name from country where country_id = '".$row_replyid['user_country']."'"));
		$userinfo 		= mysql_fetch_array(mysql_query("select * from user_info where user_id = '".$user_id."'"));
		
		$lookingfor 	= $userinfo['lookingfor'];
		$headline 		= $userinfo['headline'];
		$city 			= $userinfo['city'];
		$talking_about 	= $userinfo['talking_about'];
		$seeking 		= $userinfo['seeking'];
		$mseek 			= strtoupper(substr($user_gender,0,1))."S".strtoupper(substr($seeking,0,1));
		
		//check user online status
		$showuser = mysql_fetch_array(mysql_query(" select  online_status from user_lastlogin  where user_id = '".$user_id."' "));
		$onstatus = $showuser['online_status'];
	?>
		  <div class="chemistry_main" style="background:#f1f1f1;">
			<div class="chemistry_main" style=" margin-top:20px;">
			  <div class="blank">
				<?php if($user_image!='') { ?>
				<a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>"><img src="images/user_images/<?php echo $user_image;?>" border="0" width="90" height="90"/></a>
				<?php } else { ?>
				<a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>"><img src="images/blank.jpg" border="0" width="90" height="90" /></a>
				<?php } ?>
			  </div>
			  <div class="inbox_txt"><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>">
				<?php if($headline!='') { echo $headline; } else { echo $lookingfor; } ?>
				</a> &nbsp;&nbsp;&nbsp;<?php echo $city;?>, <?php echo $usercountry['name'];?>&nbsp;&nbsp;&nbsp;
				<!--Last Visit:- <font color="#008000"><?php echo $rowuser['visit_date']; ?></font>-->
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td class="adverttd"><?php echo substr(stripslashes($talking_about),0,300);?></td>
				  </tr>
				  <tr>
					<td height="10px;"></td>
				  </tr>
				  <tr>
					<td><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>"><?php echo $user_name;?></a> <span class="adverttd"><?php echo Age($user_birthdate);?>&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php echo $mseek; ?> - <?php echo $lookingfor; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font color="#008000">
					  <?php if($onstatus==1) { echo "Online"; } ?>
					  </font>
					  <?php 
	//$lastlog = mysql_fetch_array(mysql_query(" select * from visitor where status='1' and user_id = '".$user_id."' "));
	//$start_date = $lastlog['visit_date']; 
	//$online_status = $lastlog['online_status']; 
	?>
					  <!--Last Visit:--->
					  <?php //echo date_diff($start_date); ?>
					</td>
				  </tr>
				</table>
			  </div>
			  <div class="clr"></div>
			</div>
		  </div>
		  <?php
	}
	} else {
	?>
		  <div class="chemistry_main" style="background:#f1f1f1;">
			<div class="profl_txt_1" style="color:#CC0000;"><strong>No Any Girls given reply to your messages!</strong></div>
		  </div>
		  <?php 
	}
}
}else {
?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="color:#CC0000;"><strong>Nobody Messages on your profile!</strong></div>
      </div>
      <?php } ?>
      <div class="clr"></div>
    </div>
    <?php include_once("footer_up.php"); ?>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
