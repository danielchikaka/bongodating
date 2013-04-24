<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

	// Searching users Query
	// Fetch user search setting
	$u_srh	 = mysql_fetch_array(mysql_query("select * from user where user_id = '".$_SESSION['userid']."'"));

	$ssuser_gender 		= $u_srh['user_gender'];
	$ssage 				= $u_srh['age'];
	$ssuser_ethnicity 	= $u_srh['user_ethnicity'];
	
	$u_srh_info = mysql_fetch_array(mysql_query("select * from user_info where user_id = '".$_SESSION['userid']."' "));
	
	$ssbest_describes 	= stripslashes($u_srh_info['best_describes']);
	$ssreligion 		= $u_srh_info['religion'];

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
      <div class="profl_txt_usersrch">
        <form id="basicsrchform" name="basicsrchform" method="post" action="ad-bscusrh.php">
          <div class="mandatory_flds">
            <label>
            <input type="text" name="search_user" id="search_user" value="<?=$_POST['search_user']?>" />
            </label>
          </div>
          <div class="mandatory_flds">
            <label>
            <input type="submit" name="button2" id="button2" value="Username Search" />
            </label>
          </div>
        </form>
      </div>
<?php
// Searching criteria	  
$search_user = $_POST['search_user'];
$login_check = mysql_query("select * from user where user_name LIKE '%$search_user%' and status = '1'");
if(mysql_num_rows($login_check)>0)
{
	while($rowuser = mysql_fetch_array($login_check)) 
	{
		$user_name		= $rowuser['user_name'];
		//$user_image	 = $rowuser['user_image'];
		$user_birthdate	= $rowuser['user_birthdate'];
		$user_gender 	= $rowuser['user_gender'];
		$user_id 		= $rowuser['user_id'];
		
		// for searching user
		$sql_set = mysql_query(" select * from search_setting where user_id = '".$user_id."' ");
		if(mysql_num_rows($sql_set)>0) {
		
		$row_set 	= mysql_fetch_array($sql_set);
		$s_gender 	= trim($row_set['s_gender']);
		$s_intent 	= trim($row_set['s_intent']);
		$s_age1 	= trim($row_set['s_age1']);
		$s_age2 	= trim($row_set['s_age2']);
		$s_race 	= trim($row_set['s_race']);
		$s_religion = trim($row_set['s_religion']);
	
		$ucity_set 	= "select user_id from search_setting where user_id = '".$user_id."' ";
		if($s_age1!='' && $s_age2!='')
		{
			$ucity_set 	.= " and s_age1 <= '".$ssage."' and s_age2 >= '".$ssage."'";
		}
		if($s_intent!='')
		{
			$ucity_set .= " and s_intent LIKE '%$ssbest_describes%'";
		}
		if($s_gender!='')
		{
			$ucity_set .= " and s_gender ='".$ssuser_gender."'";
		}
		if($s_race!='')
		{
			$ucity_set .= " and s_race LIKE '%$ssuser_ethnicity%' ";
		}
		if($s_religion!='')
		{
			$ucity_set .= " and s_religion LIKE '%$ssreligion%' ";
		}
		
		$finucity_set = mysql_query($ucity_set);
		if(@mysql_num_rows($finucity_set)>0) 
		{
		$row_set_s 	= mysql_fetch_array($finucity_set);
		$cuserid_s 	= $row_set_s['user_id'];
		
		$rowuser 	= mysql_fetch_array(mysql_query("select * from user where user_id = $cuserid_s "));
		
		$fetch_img	= mysql_fetch_array(mysql_query("select * from user_images where user_id ='".$user_id."' and main_image = '1'"));
		$user_image = $fetch_img['user_image'];
		
		$usercountry= mysql_fetch_array(mysql_query("select name from country where country_id = '".$rowuser['user_country']."'"));
		$userinfo 	= mysql_fetch_array(mysql_query("select * from user_info where user_id = '".$user_id."'"));
		$lookingfor = $userinfo['lookingfor'];
		$headline 	= $userinfo['headline'];
		$city		= $userinfo['city'];
		$talking_about = $userinfo['talking_about'];
		$seeking	= $userinfo['seeking'];
		$mseek 		= strtoupper(substr($user_gender,0,1))."S".strtoupper(substr($seeking,0,1));
		
		// for user online status
		$showuser	= mysql_fetch_array(mysql_query(" select  online_status from user_lastlogin  where user_id = '".$user_id."' "));
		$onstatus	= $showuser['online_status'];
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
				</a> &nbsp;&nbsp;&nbsp;<?php echo $city;?>, <?php echo $usercountry['name'];?><br />
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
					  </font></td>
				  </tr>
				</table>
			  </div>
			  <div class="clr"></div>
			</div>
		  </div>
		  <?php
	  	} 
	  } else {
		//without search criteria
		$fetch_img	= mysql_fetch_array(mysql_query( " select * from user_images where user_id = '".$user_id."' and main_image = '1' "));
		$user_image = $fetch_img['user_image'];
		
		$usercountry= mysql_fetch_array(mysql_query("select name from country where country_id = '".$rowuser['user_country']."'"));
		$userinfo 	= mysql_fetch_array(mysql_query("select * from user_info where user_id = '".$user_id."'"));
		
		$lookingfor = $userinfo['lookingfor'];
		$headline	= $userinfo['headline'];
		$city 		= $userinfo['city'];
		$talking_about = $userinfo['talking_about'];
		$seeking 	= $userinfo['seeking'];
		$mseek 		= strtoupper(substr($user_gender,0,1))."S".strtoupper(substr($seeking,0,1));
		
		$showuser 	= mysql_fetch_array(mysql_query(" select  online_status from user_lastlogin  where user_id = '".$user_id."' "));
		$onstatus 	= $showuser['online_status'];
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
				</a> &nbsp;&nbsp;&nbsp;<?php echo $city;?>, <?php echo $usercountry['name'];?><br />
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
					  </font></td>
				  </tr>
				</table>
			  </div>
			  <div class="clr"></div>
			</div>
		  </div>
		  <?php
		}
	}
}else{ ?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1"><strong>No matches according to your search.</strong></div>
      </div>
      <?php
}
?>
      <div class="clr"></div>
    </div>
  </div>
</div>
<!-- footer container -->
<?php include_once("footer.php");?>
<!-- footer container end here -->
</body>
</html>
