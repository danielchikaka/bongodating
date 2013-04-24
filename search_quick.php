<?php 
include_once("config/db_connect.php") ;
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
        <form id="basicsrchform" name="basicsrchform" method="post" action="bscusrh.php">
          <div class="mandatory_flds">
            <label>
            <input type="text" name="search_user" id="search_user" value="" />
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
	  	// Search result on basic of search criteria
		if(isset($_POST['subsearch']))
		{
			$seeking  = $_POST['seeking'];
			$age1     = $_POST['fstage'];
			$age2     = $_POST['scdage']; 
			$country  = $_POST['country'];
			$zip      = $_POST['zip'];
			
			// Search Query
			$searchuser = "select * ";
			$searchuser .= " from user, user_info where user.status = '1' and user_gender = '".$seeking."' and age between '".$age1."' and '".$age2."' and user.user_id = user_info.user_id ";
			
			if($country !='')
			{
				$searchuser .= "and user_country='".$country."'";
			}
			if($zip !='')
			{
				$searchuser .= "and postalcode='".$zip."'";
			}
			
			$search= mysql_query($searchuser);
			
			if(mysql_num_rows($search)>0)
			{
				while($rowuser = mysql_fetch_array($search)) 
				{
				$user_name 		= $rowuser['user_name'];
				//$user_image 	= $rowuser['user_image'];
				$user_birthdate = $rowuser['user_birthdate'];
				$findage[]		= Age($user_birthdate);
				
				$user_gender 	= $rowuser['user_gender'];
				$user_id 		= $rowuser['user_id'];
				
				// Get user Details
				$fetch_img	= mysql_fetch_array(mysql_query("select * from user_images where user_id = '".$user_id."' and main_image = '1' "));
				$user_image = $fetch_img['user_image'];
				
				$usercountry= mysql_fetch_array(mysql_query("select name from country where country_id = '".$rowuser['user_country']."'"));
				$userinfo 	= mysql_fetch_array(mysql_query("select * from user_info where user_id = '".$user_id."'"));
				
				$lookingfor 	= $userinfo['lookingfor'];
				$headline 		= $userinfo['headline'];
				$city 			= $userinfo['city'];
				$talking_about 	= $userinfo['talking_about'];
				$seeking 		= $userinfo['seeking'];
				$mseek 			= strtoupper(substr($user_gender,0,1))."S".strtoupper(substr($seeking,0,1));
				
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
				</a> &nbsp;&nbsp;&nbsp;<?php echo ucfirst($city);?>, <?php echo $usercountry['name'];?><br />
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td class="adverttd"><?php echo substr(stripslashes($talking_about),0,300);?></td>
				  </tr>
				  <tr>
					<td height="10px;"></td>
				  </tr>
				  <tr>
					<td><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>"><?php echo $user_name;?></a> <span class="adverttd"><?php echo Age($user_birthdate);?>&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php echo $mseek; ?> - <?php echo $lookingfor; ?></td>
				  </tr>
				</table>
			  </div>
			  <div class="clr"></div>
			</div>
		  </div>
		  <?php
	}}else{ ?>
		  <div class="chemistry_main" style="background:#f1f1f1;">
			<div class="profl_txt_1"><strong>No matches according to your search.</strong></div>
		  </div>
		  <?php
		}
		}
?>
      <div class="clr"></div>
    </div>
    <?php include_once("footer_up.php"); ?>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
