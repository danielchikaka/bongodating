<?php 
include_once("config/db_connect.php") ;
include_once("config/ckh_session.php"); 

// Fetch User Details for display profile
$query			= mysql_query("select * from user where user_id = '".$_SESSION['userid']."'");
$fetch_user		= mysql_fetch_array($query);

$user_birthdate = $fetch_user['user_birthdate'];
$user_country 	= $fetch_user['user_country'];

$info_query		= mysql_query("select * from user_info where user_id = '".$fetch_user['user_id']."' ");
$fetch_info		= mysql_fetch_array($info_query);

$user_image		= mysql_query("select * from user_images where user_id = '".$fetch_user['user_id']."' and main_image = '1' ");
$fetch_image	= mysql_fetch_array($user_image);

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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="stickytooltip.js"></script>
<link rel="stylesheet" type="text/css" href="stickytooltip.css" />
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
      <div class="chemistry_hd_txt">
        <?php if(trim($fetch_info['headline']) !='' ){
			$headline = $fetch_info['headline'];
			} else {
			$headline = "Looking For ".$fetch_info['lookingfor'];
			} ?>
        <?=ucfirst($fetch_user['user_name']);?>
        : <?=$headline;?>
      </div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_2">About</div>
        <div class="profl_detail">
          <?=$fetch_info['smoke'];?>
          with
          <?=$fetch_info['bodytype'];?>
        </div>
        <div class="profl_txt_2">City</div>
        <div class="profl_detail">
          <?=$fetch_info['city'];?>
        </div>
        <div class="clr"></div>
        <div class="profl_txt_2">Details</div>
        <div class="profl_detail"><?php echo Age($user_birthdate);?> year old,
          <?=$fetch_info['height'];?>
          cm (<?php echo get_height($fetch_info['height'])?>) height,
          <?=$fetch_info['religion'];?>
        </div>
        <div class="profl_txt_2">Ethnicity</div>
        <div class="profl_detail">
          <?=$fetch_user['user_ethnicity'];?>
        </div>
        <div class="clr"></div>
      </div>
      <?php 
		$sql_slide = mysql_query("select * from user_images where user_id = '".$fetch_user['user_id']."' and show_profile = '1' ");
		if(mysql_num_rows($sql_slide)>1) {
		while($row_slide = mysql_fetch_array($sql_slide))
		{
	?>
      <div class="slide-box"> <img src="images/user_images/smallthumb/<?php echo $row_slide['user_image'];?>" border="0" width="100" height="100" data-tooltip="sticky<?php echo $row_slide['id'];?>" /> </div>
      <?php 
		} }
		?>
      <div id="mystickytooltip" class="stickytooltip">
        <div style="padding:5px">
          <?php 
			$sql_slideh = mysql_query("select * from user_images where user_id = '".$fetch_user['user_id']."' and show_profile = '1' ");
			while($row_slideh = mysql_fetch_array($sql_slideh))
			{
		?>
          <div id="sticky<?php echo $row_slideh['id'];?>" class="atip"> <img  src="images/user_images/<?=$row_slideh['user_image'];?>" />
            <?php if($row_slideh['caption']!='') { ?>
            <div align="center">
              <?=$row_slideh['caption'];?>
            </div>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="clr"></div>
      <div class="profl_pic">
        <?php if($fetch_image['user_image']!='') {?>
        <img  src="images/user_images/<?=$fetch_image['user_image'];?>" height="405px;" width="540px;" />
        <?php } else { ?>
        <img  src="images/blank_big.jpg" height="405px;" width="540px;" />
        <?php  } ?>
      </div>
      <div class="clr"></div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="profl_txt_2">I am Seeking a</div>
        <div class="profl_detail">
          <?=$fetch_info['seeking'];?>
        </div>
        <div class="profl_txt_2">For</div>
        <div class="profl_detail">
          <?=$fetch_info['lookingfor'];?>
        </div>
        <div class="clr"></div>
        <div class="profl_txt_2">&nbsp;</div>
        <div class="profl_detail">&nbsp;</div>
        <div class="profl_txt_2">Chemistry</div>
        <?php 
		$chem = mysql_query("select * from chemistry_user where user_id='".$_SESSION['userid']."'");
		if(mysql_num_rows($chem)>0) { 
		?>
        <div class="profl_detail"><a href="chemistry_result.php">View Your Own Chemistry Result</a></div>
        <?php } else { ?>
        <div class="profl_detail"><a href="chemistry.php">Go for Chemistry Test</a></div>
        <?php }?>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:0px;">
        <div class="profl_txt_2">Do you drink?</div>
        <div class="profl_detail">
          <?=$fetch_info['drink'];?>
        </div>
        <div class="profl_txt_2">Do you want children?</div>
        <div class="profl_detail">
          <?=$fetch_info['want_children'];?>
        </div>
        <div class="clr"></div>
        <div class="profl_txt_2"> Marital Status</div>
        <div class="profl_detail">
          <?=$fetch_info['marital_status'];?>
        </div>
        <div class="profl_txt_2">Do you do drugs?</div>
        <div class="profl_detail">
          <?=$fetch_info['drugs'];?>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:0px;">
        <div class="profl_txt_2">Pets</div>
        <div class="profl_detail">
          <?=$fetch_info['have_pets'];?>
        </div>
        <div class="profl_txt_2">Eye Color</div>
        <div class="profl_detail">
          <?=$fetch_info['eyecolor'];?>
        </div>
        <div class="clr"></div>
        <div class="profl_txt_2">Profession</div>
        <div class="profl_detail">
          <?=stripslashes($fetch_info['your_profession']);?>
        </div>
        <div class="profl_txt_2">Do you have children?</div>
        <div class="profl_detail">
          <?=$fetch_info['have_children'];?>
        </div>
        <div class="clr"></div>
        <div class="profl_txt_2">Education</div>
        <div class="profl_detail">
          <?=$fetch_info['education'];?>
        </div>
        <div class="profl_txt_2">Do you have a car?</div>
        <div class="profl_detail">
          <?=$fetch_info['havecar'];?>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="profl_title"> Relationship</div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="profl_txt_3">Intent </div>
      <div class="profl_detail2">
        <?=stripslashes($fetch_info['best_describes']);?>
      </div>
      <div class="clr"></div>
      <div class="profl_txt_3">Relationship History</div>
      <div class="profl_detail2">The longest relationship has been in was
        <?=$fetch_info['longest_relation'];?>
      </div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="profl_title"> Interests</div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="profl_contnt">
        <?=stripslashes($fetch_info['interests']);?>
      </div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="profl_title"> About Me</div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="profl_contntdesc">
        <?=stripslashes($fetch_info['talking_about']);?>
      </div>
      <div class="clr"></div>
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="profl_title">First Date </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="profl_contntdesc">
        <?=stripslashes($fetch_info['first_date']);?>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
