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
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_title"><strong>New Users</strong></div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="profl_txt_usersrch">
        <form id="basicsrchform" name="basicsrchform" method="post" action="lastsignup.php">
          <div class="chemistry_main"><strong>Age</strong>
            <select name="fstage" id="fstage" style="width:60px; margin-top:5px;">
              <?php $startage=18; while($startage!=100) { ?>
              <option value="<?=$startage;?>" <?php if($_POST['fstage']==$startage) { echo "selected"; } ?> >
              <?=$startage;?>
              </option>
              <?php $startage++; } ?>
            </select>
            <strong>to</strong>
            <select name="scdage" id="scdage" style="width:60px; margin-top:5px;">
              <?php $endage=99; while($endage!=17) { ?>
              <option value="<?=$endage;?>" <?php if($_POST['scdage']==$endage) { echo "selected"; } ?> >
              <?=$endage;?>
              </option>
              <?php $endage--; } ?>
            </select>
            <input type="submit" name="button2" id="button2" value="Refine Search" />
          </div>
        </form>
      </div>
      <?php
// Display New Users which add newly	  
$userinfomfm = mysql_fetch_array(mysql_query("select seeking, city from user_info where user_id = '".$_SESSION['userid']."'"));

$ucity 		= $userinfomfm['city'];

$ucity_exe 	= mysql_query("select user_id from user_info where city = '".$ucity."'");
$cuserid 	= 0;
while($rowu = mysql_fetch_array($ucity_exe)) 
{
	$cuserid .= ",".$rowu['user_id'];
}

$sql = "select * ";
$sql .= " from user where status = '1'  ";

if($userinfomfm['seeking']!='') 
{ 
	$sql .= "and user_gender = '".$userinfomfm['seeking']."' "; 
}
if($cuserid!='0') 
{ 
	//$sql .= " and user_id IN (".$cuserid.") ";
}

// Searching Query by age
if(($_POST['fstage']!='') && ($_POST['scdage']!='')) 
{
	$sql .= "and age between '".$_POST['fstage']."' and '".$_POST['scdage']."' ";
}
$sql .= " order by user_id desc  ";

$login_check = mysql_query($sql);

if(mysql_num_rows($login_check)>0)
{
	while($rowuser = mysql_fetch_array($login_check)) {
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
        <div class="chemistry_main" style=" margin-top:20px;">
          <div class="blank">
            <?php if($user_image!='') { ?>
            <a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>"><img src="images/user_images/smallthumb/<?php echo $user_image;?>" border="0" width="90" height="90"/></a>
            <?php } else { ?>
            <a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>"><img src="images/blank.jpg" border="0" width="90" height="90" /></a>
            <?php } ?>
          </div>
          <div class="inbox_txt"><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>">
            <?php if($headline!='') { echo ucfirst($headline); } else { echo ucfirst($lookingfor); } ?>
            </a> &nbsp;&nbsp;&nbsp;<?php echo $city;?>, <?php echo $usercountry['name'];?><br />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="adverttd"><?php echo substr(stripslashes($talking_about),0,300);?></td>
              </tr>
              <tr>
                <td height="10px;"></td>
              </tr>
              <tr>
                <td><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>"><?php echo $user_name;?></a> <span class="adverttd">&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php echo $mseek; ?> - <?php echo $lookingfor; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font color="#008000">
                  <?php if($onstatus==1) { echo "Online"; $words = explode(' ', trim($user_name)); ?>
                  <a href="javascript:void(0)" onClick="javascript:chatWith('<?=$words[0]?>')"><font color="#009900">Chat</font></a>
                  <?php } ?>
                  </font></td>
              </tr>
            </table>
          </div>
          <div class="clr"></div>
        </div>
      </div>
      <?php
}
} else { ?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="color:#CC0000;"><strong> Sorry - our New Users list shows you users we've specifically chosen for you! Sometimes, this list runs out. Don't worry, new users will be added to the list soon.</strong>
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
