<?php 
include_once("config/db_connect.php") ;
include_once("config/ckh_session.php");

// Fetch user details
$userdata		= mysql_query("select * from user where user_id='".$_SESSION['userid']."'");
$fetch_user 	= mysql_fetch_array($userdata);
$user_country	= $fetch_user['user_country'];

$userinfo		= mysql_query("select * from user_info where user_id='".$fetch_user['user_id']."'");
$fetch_info		= mysql_fetch_array($userinfo);

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
      <div class="profl_contnt2">
        <p>&nbsp;</p>
      </div>
      <div class="clr"></div>
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
      <form name="frm1" id="frm1" action="" method="post">
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <div class="basic_txt">I'm A</div>
          <div class="basic_txt">
            <select name="gender" id="gender">
              <option value="male" <?php if($fetch_user['user_gender']=="male") echo "selected";?>>Male</option>
              <option value="female" <?php if($fetch_user['user_gender']=="female") echo "selected";?>>Female</option>
            </select>
          </div>
          <div class="basic_txt">Seeking</div>
          <div class="basic_txt">
            <select name="seeking" id="seeking">
              <option value="female">Female</option>
              <option value="male">Male</option>
            </select>
          </div>
          <div class="basic_txt">Age</div>
          <div class="basic_txt">
            <select name="fage" id="fage" style="width:50px;">
              <?php $startage=18; while($startage!=100) { ?>
              <option value="<?=$startage;?>">
              <?=$startage;?>
              </option>
              <?php $startage++; } ?>
            </select>
          </div>
          <div class="basic_txt">to</div>
          <div class="basic_txt">
            <select name="lage" id="lage" style="width:50px;">
              <?php $endage=99; while($endage!=17) { ?>
              <option value="<?=$endage;?>">
              <?=$endage;?>
              </option>
              <?php $endage--; } ?>
            </select>
          </div>
          <div class="basic_txt">For</div>
          <div class="basic_txt">
            <select name="lookingfor" id="lookingfor" class="list_drop">
              <option value="" selected="selected">Anything</option>
              <option Value="Hang Out" <?php if($_POST['lookingfor']=="Hang Out") echo "selected";?>>Hang Out</option>
              <option Value="Dating" <?php if($_POST['lookingfor']=="Dating") echo "selected";?>>Dating</option>
              <option Value="Friends" <?php if($_POST['lookingfor']=="Friends") echo "selected";?>>Friends</option>
              <option Value="Intimate Encounter" <?php if($_POST['lookingfor']=="Intimate Encounter") echo "selected";?>>Intimate Encounter</option>
            </select>
          </div>
          <div class="basic_txt">
            <select name="intent" id="intent" class="list_drop">
              <option value="" selected="selected">Anything</option>
              <option Value="I'm looking for Casual dating/No Commitment" <?php if($_POST['intent']=="I'm looking for Casual dating/No Commitment") echo "selected";?>> I'm looking for Casual dating/No Commitment.</option>
              <option Value="I want to date but nothing serious" <?php if($_POST['intent']=="I want to date but nothing serious") echo "selected";?>> I want to date but nothing serious</option>
              <option Value="I want a relationship" <?php if($_POST['intent']=="I want a relationship") echo "selected";?>> I want a relationship.</option>
              <option Value="I am putting in serious effort to find someone" <?php if($_POST['intent']=="I am putting in serious effort to find someone") echo "selected";?>> I am putting in serious effort to find someone.</option>
              <option Value="I am serious and I want to find someone to marry" <?php if($_POST['intent']=="I am serious and I want to find someone to marry") echo "selected";?>> I am serious and I want to find someone to marry.</option>
            </select>
          </div>
          <div class="clr"></div>
          <div class="basic_txt">
            <select name="ethnic" id="ethnic" class="list_drop">
              <option value="" selected="selected">Anything</option>
              <option value="Caucasian" <?php if($_POST['ethnic']=="Caucasian") echo "selected";?>> Caucasian</option>
              <option value="Black" <?php if($_POST['ethnic']=="Black") echo "selected";?>>Black</option>
              <option value="European" <?php if($_POST['ethnic']=="European") echo "selected";?>>European </option>
              <option value="Hispanic" <?php if($_POST['ethnic']=="Hispanic") echo "selected";?>>Hispanic </option>
              <option value="Indian" <?php if($_POST['ethnic']=="Indian") echo "selected";?>>Indian </option>
              <option value="Middle Eastern" <?php if($_POST['ethnic']=="Middle Eastern") echo "selected";?>>Middle Eastern </option>
              <option value="Native American" <?php if($_POST['ethnic']=="Native American") echo "selected";?>>Native American</option>
              <option value="Asian" <?php if($_POST['ethnic']=="Asian") echo "selected";?>>Asian </option>
              <option value="Mixed Race" <?php if($_POST['ethnic']=="Mixed Race") echo "selected";?>>Mixed Race </option>
              <option value="Other Ethnicity" <?php if($_POST['ethnic']=="Other Ethnicity") echo "selected";?>>Other Ethnicity </option>
            </select>
          </div>
          <?php
				$state = mysql_query("select * from state where country_id = '".$user_country."' order by name asc");
			?>
          <div class="basic_txt">
            <select name="territory" id="territory" class="list_drop">
              <option value="" selected="selected">Anything</option>
              <?php while($row = mysql_fetch_array($state)) { ?>
              <option value="<?=$row['name']?>" <?php if($_POST['territory']==stripslashes($row['name'])) echo "selected";?> >
              <?=$row['name']?>
              </option>
              <?php } ?>
            </select>
          </div>
          <div class="basic_txt">City</div>
          <div class="basic_txt">
            <input type="text" name="city" value="" />
          </div>
          <div class="basic_txt">Postal Code</div>
          <div class="basic_txt">
            <input type="text" name="pin" id="pin" style="width:105px;" value="" />
          </div>
          <div class="basic_txt">
            <input class="#" type="submit" name="search" value="Search">
          </div>
          <div class="clr"></div>
        </div>
      </form>
      <div class="clr"></div>
      <?php 
	  		// Fetch user randam for display on top
			$showuser = mysql_query("select * from user where user_id != '".$_SESSION['userid']."' order by rand() limit 0,5");
	  		while($fetchimage = mysql_fetch_array($showuser)){
          	
			//$show_image	= $fetchimage['user_image']; 
		  	$show_gender 	= $fetchimage['user_gender'];
		   	$show_id 		= $fetchimage['user_id'];
		   	$topuid[] 		= $fetchimage['user_id'];
		  	$fetch_img1		= mysql_fetch_array(mysql_query("select user_image from user_images where user_id = '".$show_id."' and main_image = '1'"));
          	$show_image		= $fetch_img1['user_image'];
	      ?>
      <div class="box">
        <?php if($show_image!='') { ?>
        <a href="viewprofile.php?profid=<?=$show_id;?>&gen=<?=$show_gender;?>"><img src="images/user_images/smallthumb/<?php echo $show_image;?>" border="0" width="100" height="80"/></a>
        <?php } else { ?>
        <a href="viewprofile.php?profid=<?=$show_id;?>&gen=<?=$show_gender;?>"><img src="images/blank.jpg" border="0" width="100" height="80" /></a>
        <?php } ?>
      </div>
      <?php } ?>
      <div class="clr"></div>
      <?php
		// Searching users Query
		// Fetch user search setting		
		$u_srh	= mysql_fetch_array(mysql_query("select * from user where user_id = '".$_SESSION['userid']."'"));
		
		$ssuser_gender		= $u_srh['user_gender'];
		$ssage				= $u_srh['age'];
		$ssuser_ethnicity	= $u_srh['user_ethnicity'];
		
		$u_srh_info			= mysql_fetch_array(mysql_query("select * from user_info where user_id ='".$_SESSION['userid']."'"));
		$ssbest_describes	= stripslashes($u_srh_info['best_describes']);
		$ssreligion			= $u_srh_info['religion'];	

	 
$male  		= $_POST['gender'];
$seek  		= $_POST['seeking'];
$age1  		= $_POST['fage'];
$age2  		= $_POST['lage'];
$ethnic		= $_POST['ethnic'];
$city  		= $_POST['city']; 
$pin   		= $_POST['pin'];
$lookingfor = $_POST['lookingfor'];
$bestdesc 	= addslashes($_POST['intent']);
$territory	= addslashes($_POST['territory']);

// Searching criteria
if(isset($_POST['search'])){

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
if($ethnic!='')
{
	$search .= " and user.user_ethnicity = '".$ethnic."'";
}

if($lookingfor != '')
{
	$search .= " and user_info.lookingfor Like '%$lookingfor%'";
}
if($bestdesc != '')
{
	$search .= " and user_info.best_describes Like '%$bestdesc%'";
}
if($territory != '')
{
	$search .= " and user_info.union_territory Like '%$territory%'";
}
if($city != '')
{
	$search .= " and user_info.city LIKE '%$city%'";
}
if($pin != '')
{
	$search .= " and user_info.postalcode = '$pin'";
}

$search .= " order by user.user_id desc  ";

$finalsearch = mysql_query($search);
}else{
	$finalsearch = mysql_query("select * from user where user_gender = '".strtolower($fetch_info['seeking'])."' and user_id != '".$_SESSION['userid']."'");
}

//$login_check = mysql_query("select * from user where user_name LIKE '%$search_user%' and status = '1'");
if(mysql_num_rows($finalsearch)>0)
{
	while($rowuser = mysql_fetch_array($finalsearch)) {
	
	$user_id = $rowuser['user_id'];
	
	// for searching user
	$sql_set = mysql_query(" select * from search_setting where user_id = '".$user_id."' ");
	if(mysql_num_rows($sql_set)>0) {
    $row_set = mysql_fetch_array($sql_set);
	
	$s_gender	= trim($row_set['s_gender']);
	$s_intent	= trim($row_set['s_intent']);
	$s_age1		= trim($row_set['s_age1']);
	$s_age2		= trim($row_set['s_age2']);
	$s_race		= trim($row_set['s_race']);
	$s_religion = trim($row_set['s_religion']);

	$ucity_set	= "select user_id from search_setting where user_id = '".$user_id."' ";
	if($s_age1 !='' && $s_age2!='')
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
	//echo $ucity_set;
	$finucity_set = mysql_query($ucity_set);
	if(@mysql_num_rows($finucity_set)>0) 
	{
	$row_set_s = mysql_fetch_array($finucity_set);
 	$cuserid_s = $row_set_s['user_id'];
	
	$rowuser = mysql_fetch_array(mysql_query("select * from user where user_id = $cuserid_s "));

	$user_name		= $rowuser['user_name'];
	//$user_image	= $rowuser['user_image'];
	$user_birthdate = $rowuser['user_birthdate'];
	
	$user_gender	= $rowuser['user_gender'];
	$user_id		= $rowuser['user_id'];
	
	$fetch_img		= mysql_fetch_array(mysql_query("select * from user_images where user_id='".$user_id."' and main_image='1'"));
    $user_image		= $fetch_img['user_image'];
	
	$usercountry	= mysql_fetch_array(mysql_query("select name from country where country_id = '".$rowuser['user_country']."'"));
	$userinfo		= mysql_fetch_array(mysql_query("select * from user_info where user_id = '".$user_id."'"));
	
	$lookingfor		= $userinfo['lookingfor'];
	$headline		= $userinfo['headline'];
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
    $user_image		= $fetch_img['user_image'];
	
	$usercountry	= mysql_fetch_array(mysql_query("select name from country where country_id = '".$rowuser['user_country']."'"));
	$userinfo		= mysql_fetch_array(mysql_query("select * from user_info where user_id = '".$user_id."'"));
	$lookingfor		= $userinfo['lookingfor'];
	$headline		= $userinfo['headline'];
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
      <?php } } }else{ ?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1"><strong>No matches according to your search.</strong></div>
      </div>
      <?php
}
?>
      <div class="clr"> </div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
</body>
</html>
