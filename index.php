<?php 
session_start();
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
<script language="JavaScript" type="text/javascript" src="js/slideshow.js"></script>
</head>
<body onload="ss.restore_position('SS_POSITION');ss.next();ss.play();document.frmLogin1.email.focus();">
<div id="wrapper">
  <?php include_once("header.php"); ?>
  <div id="maincont">
    <div id="illust">
      <?php include_once("quicksearch.php"); ?>
      <div class="illust">
        <!--Code for make home images slide show-->
        <script type="text/javascript">
	<!--
	ss = new slideshow("ss");
	ss.prefetch = 2;
	ss.timeout =7000;

		
		<?php 
		$sql = " select * from banners where status = 1 order by id ";
		$qry_pgs = mysql_query($sql);
		while($banrow = mysql_fetch_array($qry_pgs)) {
		$image = $banrow['image'];
		?>
		s = new slide();
		s.src =  "images/homeimages/<?=$image?>";
		s.link =  '#';
		ss.add_slide(s);
		<?php } ?>
		
		/*s = new slide();
		s.src =  "images/homeimages/20100419014521HomePage_Picture1.jpg";
		s.link =  '#';
		ss.add_slide(s);
	   	
		s = new slide();
		s.src =  "images/homeimages/20100419015255AE_pic_2.jpg";
		s.link =  '#';
		ss.add_slide(s);
	   	
		s = new slide();
		s.src =  "images/homeimages/20100427010714AE_Pic3.jpg";
		s.link =  '#';
		ss.add_slide(s);*/
	
	   	
	//alert(ss.slides.length);
	for (var i=0; i < ss.slides.length; i++) {
 	s = ss.slides[i];
  	s.target = "ss_popup";
  	s.attr = "width=654,height=368,resizable=yes,scrollbars=yes";
	}
	//-->
	</script>
        <div id="ss_img_div" class="marginBtm"> <img id="ss_img" name="ss_img" src="#" style="width:654px; height:368px;filter:progid:DXImageTransform.Microsoft.Fade();" alt="<?php echo SITE_NAME;?> image"/> </div>
        <script type="text/javascript">
	<!--
	if (document.images) 
	{
	  	// Tell the slideshow which image object to use
		ss.image = document.images.ss_img;
		// Update the image and the text for the slideshow
 		ss.update();
		// Auto-play the slideshow
  		//ss.play();
	}
	-->
	</script>
        <noscript>
        <!--
	This is a version of the slideshow for search engines
	and non-javascript browsers
	-->
        </noscript>
        <!--Code for make home images slide show end here-->
      </div>
    </div>
    <div class="homecont">    
<?php 

if(count($_POST)<>0) { 
	  
// Search Query
$male  		= $_POST['gender'];
$seek  		= $_POST['seeking'];
$age1  		= $_POST['fstage'];
$age2  		= $_POST['scdage'];
$country	= $_POST['country'];
$pin   		= $_POST['zip'];


$search	 = "select * ";
$search .= " from user , user_info where user.status = '1' and user.user_id = user_info.user_id ";
if ($seek!='')
{
	$search .= " and user.user_gender = '".$seek."'";
}
if(($age1!='') && ($age2!='')) 
{
	$search .= " and user.age between '".$age1."' and '".$age2."' ";
}

if($country != '')
{
	$search .= " and user.user_country = '$country'";
}
if($pin != '')
{
	$search .= " and user_info.postalcode = '$pin'";
}

$search .= " order by user.user_id desc  ";
$finalsearch = mysql_query($search);
//$login_check = mysql_query("select * from user where user_name LIKE '%$search_user%' and status = '1'");
if(mysql_num_rows($finalsearch)>0)
{
	while($rowuser = mysql_fetch_array($finalsearch)) {
	$user_name		= $rowuser['user_name'];
	//$user_image	= $rowuser['user_image'];
	$user_birthdate = $rowuser['user_birthdate'];
	$user_gender 	= $rowuser['user_gender'];
	$user_id 		= $rowuser['user_id'];
	
	// Get user Details
	$fetch_img		= mysql_fetch_array(mysql_query("select * from user_images where user_id = '".$user_id."' and main_image = '1'"));
    $user_image 	= $fetch_img['user_image'];
	
	$usercountry 	= mysql_fetch_array(mysql_query("select name from country where country_id = '".$rowuser['user_country']."'"));
	$userinfo 		= mysql_fetch_array(mysql_query("select * from user_info where user_id = '".$user_id."'"));
	
	$lookingfor 	= $userinfo['lookingfor'];
	$headline		= $userinfo['headline'];
	$city 			= $userinfo['city'];
	$talking_about	= $userinfo['talking_about'];
	$seeking		= $userinfo['seeking'];
	$mseek			= strtoupper(substr($user_gender,0,1))."S".strtoupper(substr($seeking,0,1));
	
	// Check online status
	$showuser		= mysql_fetch_array(mysql_query(" select  online_status from user_lastlogin  where user_id = '".$user_id."' "));
	$onstatus		= $showuser['online_status'];
?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="chemistry_main" style=" margin-top:20px;">
          <div class="blank">
            <?php if($user_image!='') { ?>
            <a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>"><img src="images/user_images/<?php echo $user_image;?>" border="0" width="90" height="90"/></a>
            <?php } else { ?>
            <a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>"><img src="images/10000012345.jpg" border="0" width="90" height="90" /></a>
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
}else{ ?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1"><strong>No matches according to your search.</strong></div>
      </div>
      <?php
}
?>
      <div class="clr"></div>
	  <br />
	  <? } ?>  
      <div class="clr"></div>
 </div>
    <?php include_once("footer_up.php"); ?>
    
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
