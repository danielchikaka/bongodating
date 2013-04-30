<?php 
session_start();
include_once("config/db_connect.php") ;
include_once("config/ckh_session.php");

// Fetch user details
$userdata	= mysql_query("select * from user where user_id = '".$_SESSION['userid']."' ");
$fetch_user	= mysql_fetch_array($userdata);

$userinfo	= mysql_query("select * from user_info where user_id = '".$fetch_user['user_id']."' ");
$fetch_info = mysql_fetch_array($userinfo);

$male	     = $_POST['gender'];
$seek	     = $_POST['seeking'];
$age1	     = $_POST['fage'];
$age2	     = $_POST['lage'];
$country	 = $_POST['country'];
$city	     = $_POST['city']; 
$pin	     = $_POST['pincode'];
$height1	 = $_POST['minheight'];
$height2	 = $_POST['maxheight'];
$religion	 = $_POST['religion'];
$ethnic  	 = $_POST['ethnicity'];
$havepets	 = $_POST['havepets'];
$lookingfor	 = $_POST['lookingfor'];
$edu       	 = $_POST['education'];
$profession	 = $_POST['profession'];
$married     = $_POST['marital'];
$wantchild   = $_POST['wantchild'];
$dosmoke     = $_POST['dosmoke'];
$dodrugs     = $_POST['dodrugs'];
$interest    = $_POST['interest'];
$dodrink     = $_POST['dodrink'];
$havechild   = $_POST['havechild'];
$hair        = $_POST['hair'];
$eyecolor    = $_POST['eyecolor'];  
$bodytype    = $_POST['bodytype'];
$income      =  $_POST['income'];
$intent  	 = addslashes($_POST['describes']);

// Searching Query
if($_POST['button'] = 'Submit')
{
	$search = " select * ";
	$search .= " from user , user_info where user.status = '1' and user.user_id = user_info.user_id ";
	if ($seek!='')
	{
		$search .= " and user.user_gender = '".$seek."' ";
	}
	if(($age1!='') && ($age2!='')) 
	{
		$search .= " and user.age between '".$age1."' and '".$age2."' ";
	}
	if($ethnic!='')
	{
		$search .= " and user.user_ethnicity = '".$ethnic."' ";
	}
	if($country!='')
	{
		$search .= " and user.user_country = '".$country."' ";
	}
//*******************************************************
	
	if($lookingfor!='')
	{
		$search .= " and user_info.lookingfor Like '%$lookingfor%' ";
	}
	if($city!='')
	{
		$search .= " and user_info.city LIKE '%$city%' ";
	}
	if($pin!='')
	{
		$search .= " and user_info.postalcode = '$pin' ";
	}
	if(($height1!='') && ($height2!='')) 
	{
		$search .= " and user_info.height between '".$height1."' and '".$height2."' ";
	}
	if($religion!='')
	{
		$search .= " and user_info.religion = '".$religion."' ";
	}
	if($havepets!='')
	{
		$search .= " and user_info.have_pets = '".$havepets."' ";
	}
	if($lookingfor!='')
	{
		$search .= " and user_info.lookingfor Like '%$lookingfor%' ";
	}
	if($edu!='')
	{
		$search .= " and user_info.education = '".$edu."' ";
	}
	if($profession!='')
	{
		$search .= " and user_info.your_profession = '".$profession."' ";
	}
	if($married!='')
	{
		$search .= " and user_info.marital_status = '".$married."' ";
	}
	if($dosmoke!='')
	{
		$search .= " and user_info.smoke = '".$dosmoke."' ";
	}
	if($dodrugs!='')
	{
		$search .= " and user_info.drugs = '".$dodrugs."' ";
	}
	if($dodrink!='')
	{
		$search .= " and user_info.drink = '".$dodrink."' ";
	}
	if($havechild!='')
	{
		$search .= " and user_info.have_children = '".$havechild."' ";
	}
	if($hair!='')
	{
		$search .= " and user_info.hair = '".$hair."' ";
	}
	if($eyecolor!='')
	{
		$search .= " and user_info.eyecolor = '".$eyecolor."' ";
	}
	if($income!='')
	{
		$search .= " and user_info.income = '".$income."' ";
	}
	if($intent!='')
	{
		$search .= " and user_info.best_describes Like '%$intent%' ";
	}
	if($interest!='')
	{
		$search .= " and user_info.interests Like '%$interest%' ";
	}
	
//******************************************************		
	
	$search .= "order by user.user_id desc";
	$finalsearch=mysql_query($search);
}

	// Fetch user search setting
	$u_srh = mysql_fetch_array(mysql_query("select * from user where user_id = '".$_SESSION['userid']."'"));
	
	$ssuser_gender		= $u_srh['user_gender'];
	$ssage				= $u_srh['age'];
	$ssuser_ethnicity 	= $u_srh['user_ethnicity'];
	
	$u_srh_info			= mysql_fetch_array(mysql_query("select * from user_info where user_id ='".$_SESSION['userid']."'"));
	
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
</head>
<body>
  <?php include_once("header.php");?>
<div id="wrapper">
  <div id="maincont">
    <div id="illust">
      <div class="profl_contnt2">
        <p>&nbsp;</p>
      </div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="basic_list">
          <ul>
            <li><a href="basicsearch.php">Basic Search</a></li>
            <li>|</li>
            <li><a href="advancedsearch.php">Advanced Search</a></li>
            <li>|</li>
            <li><a href="user_search.php">Username Search</a></li>
          </ul>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <?php 
		if(mysql_num_rows($finalsearch)>0)
		{
			while($rowuser = mysql_fetch_array($finalsearch)) {
			
			$user_id	= $rowuser['user_id'];
			
			// for searching user
			$sql_set	= mysql_query(" select * from search_setting where user_id = '".$user_id."' ");
			if(mysql_num_rows($sql_set)>0) {
			$row_set	= mysql_fetch_array($sql_set);
			
			$s_gender	= trim($row_set['s_gender']);
			$s_intent	= trim($row_set['s_intent']);
			$s_age1		= trim($row_set['s_age1']);
			$s_age2		= trim($row_set['s_age2']);
			$s_race		= trim($row_set['s_race']);
			$s_religion = trim($row_set['s_religion']);
		
			$ucity_set	= "select user_id from search_setting where user_id = '".$user_id."' ";
			if($s_age1!='' && $s_age2!='')
			{
				$ucity_set .= " and s_age1 <= '".$ssage."' and s_age2 >= '".$ssage."'";
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
			
			$finucity_set	= mysql_query($ucity_set);
			if(@mysql_num_rows($finucity_set)>0) {
			$row_set_s		= mysql_fetch_array($finucity_set);
			$cuserid_s		= $row_set_s['user_id'];
			
			$rowuser = mysql_fetch_array(mysql_query("select * from user where user_id = $cuserid_s "));
		
			$user_name		= $rowuser['user_name'];
			//$user_image	= $rowuser['user_image'];
			$user_birthdate = $rowuser['user_birthdate'];
			$user_gender	= $rowuser['user_gender'];
			$user_id		= $rowuser['user_id'];
			
			$fetch_img		= mysql_fetch_array(mysql_query("select * from user_images where user_id = '".$user_id."' and main_image = '1' "));
			$user_image		= $fetch_img['user_image'];
			
			$usercountry	= mysql_fetch_array(mysql_query("select name from country where country_id = '".$rowuser['user_country']."'"));
			$userinfo		= mysql_fetch_array(mysql_query("select * from user_info where user_id = '".$user_id."'"));
			
			$lookingfor		= $userinfo['lookingfor'];
			$headline 		= $userinfo['headline'];
			$city			= $userinfo['city'];
			$talking_about	= $userinfo['talking_about'];
			$seeking		= $userinfo['seeking'];
			$mseek			= strtoupper(substr($user_gender,0,1))."S".strtoupper(substr($seeking,0,1));
			
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
				  <div class="inbox_txt"><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>" >
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
						<td><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>"><?php echo $user_name;?></a> <span class="adverttd"><?php echo Age($user_birthdate);?>&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php echo $mseek; ?> - <?php echo $lookingfor; ?>&nbsp;&nbsp;&nbsp;
						  <?php if($onstatus=='1') { $words = explode(' ', trim($user_name)); ?>
						  <a href="javascript:void(0)" onClick="javascript:chatWith('<?=$words[0]?>')">
						  <!--<img src="images/greenCircle.png" border="0" width="10" height="10" />&nbsp;-->
						  <font color="#009900">Chat</font></a>
						  <? } ?></td>
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
			$user_name		= $rowuser['user_name'];
			//$user_image	= $rowuser['user_image'];
			$user_birthdate = $rowuser['user_birthdate'];
			$user_gender	= $rowuser['user_gender'];
			$user_id		= $rowuser['user_id'];
			
			$fetch_img		= mysql_fetch_array(mysql_query("select * from user_images where user_id='".$user_id."' and main_image='1'"));
			$user_image 	= $fetch_img['user_image'];
			
			$usercountry	= mysql_fetch_array(mysql_query("select name from country where country_id = '".$rowuser['user_country']."'"));
			$userinfo		= mysql_fetch_array(mysql_query("select * from user_info where user_id = '".$user_id."'"));
			
			$lookingfor 	= $userinfo['lookingfor'];
			$headline		= $userinfo['headline'];
			$city			= $userinfo['city'];
			$talking_about	= $userinfo['talking_about'];
			$seeking		= $userinfo['seeking'];
			$mseek			= strtoupper(substr($user_gender,0,1))."S".strtoupper(substr($seeking,0,1));
			?>
			  <div class="clr"></div>
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
			  <?php } }
			  } else { ?>
                  <div class="chemistry_main" style="background:#f1f1f1;">
                  	<div class="profl_txt_1"><strong>No matches according to your search.</strong></div>
                  </div>
              <?php } ?>
      <div class="clr"> </div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
