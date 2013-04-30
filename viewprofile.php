<?php 
include_once("config/db_connect.php") ;

$profid 	= $_GET['profid'];
// Query for chemistry
$chem		= mysql_query("select * from chemistry_user where user_id = '".$profid."' ");
// code for user details
$query		= mysql_query("select * from user where user_id = '".$profid."' ");
$fetch_user	= mysql_fetch_array($query);

$user_image	= mysql_query("select * from user_images where user_id ='".$fetch_user['user_id']."' and main_image = '1' ");
$fetch_image= mysql_fetch_array($user_image);

if($_GET['gen']!= "") 
{
	$_SESSION['user_gender'] = $_GET['gen'];
}
$info_query	= mysql_query("select * from user_info where user_id = '".$fetch_user['user_id']."' ");
$fetch_info	= mysql_fetch_array($info_query);

 //code start here for last visit to see profile
if($_SESSION['userid']!='')
{
	if($_SESSION['userid']!="$profid")
	{
		$check_visit = mysql_query("select * from visitor where visitor_id = '".$_SESSION['userid']."' and user_id = '".$profid."' ");
		if(mysql_num_rows($check_visit)>0)
		{
			mysql_query("update visitor set visit_date=now() where user_id='".$profid."'and visitor_id='".$_SESSION['userid']."'");
		}else {
			mysql_query("insert into visitor set user_id = '".$profid."' , visitor_id = '".$_SESSION['userid']."' , visit_date = now() , status = '1' ");
		}
	}
}
 //code end here for last visit to see profile
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME; ?></title>
<meta name="description" content="<?php echo SITE_DESCRIPTION; ?>"/>
<meta name="keywords" content="<?php echo SITE_KEYWORD; ?>"/>
<!--main css-->
<link rel="shortcut icon" type="image/x-icon" href="images/logo/<?php echo SITE_FAVICON; ?>"/>
<link href="templates/default/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function del_prompt(form1,comb)
{
if(comb=='favorite'){
		form1.action = "favorites.php";
		form1.submit();
}
else if(comb=='Active'){
form1.action = "gallery-active.php";
		form1.submit();
}

}

</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="stickytooltip.js"></script>
<link rel="stylesheet" type="text/css" href="stickytooltip.css" />
<script type="text/javascript">
$(document).ready(function(){
  $("Div#arrowdon").click(function(){
    $("Div#proinfod").removeClass('pro_div');
	$("Div#proinfod").addClass('pro_divdown');
	//$("Div#proinfod").animate({height:-520},"slow");
  });
  
  $("Div#arrowup").click(function(){
  	$("Div#proinfod").removeClass('pro_divdown');
    $("Div#proinfod").addClass('pro_div');
	//$("Div#proinfod").animate({height:520},"slow");
  });
  
});
</script>
</head>
<body>
  <!-- header container starts here-->
  <?php include_once("header.php");?>
<div id="wrapper">
  <!-- header container ends here-->
  <!-- main container with changing content -->
  <div id="maincont">
    <div id="illust">
      <?php 
	  	// Fetch user randam for display on top
		$query_rand = mysql_query("select * from user where user_id!='".$profid."' and user_gender ='".$_SESSION['user_gender']."' ORDER BY RAND() LIMIT 0,7"); ?>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <?php while($query_rand_row = mysql_fetch_array($query_rand)) { 
$user_imagerd = mysql_fetch_array(mysql_query("select * from user_images where user_id = '".$query_rand_row['user_id']."' and main_image = '1' "));
?>
        <div class="blank">
          <?php if($user_imagerd['user_image']!='') { ?>
          <a href="viewprofile.php?profid=<?=$query_rand_row['user_id'];?>"><img src="images/user_images/smallthumb/<?php echo $user_imagerd['user_image'];?>" border="0" width="90" height="90"/></a>
          <?php } else { ?>
          <a href="viewprofile.php?profid=<?=$query_rand_row['user_id'];?>"><img src="images/blank.jpg" border="0" width="90" height="90" /></a>
          <?php } ?>
        </div>
        <?php } ?>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div id="main_pro">
        <div class="page_left">
          <div class="dp">
            <div class="pro_pic">
              <?php if($fetch_image['user_image']!='') {?>
              <img  src="images/user_images/<?=$fetch_image['user_image'];?>" border="0" />
              <?php } else { ?>
              <img  src="images/blank_big.jpg" height="405px;" width="540px;" />
              <?php } ?>
            </div>
            <?php
				$lastlogin	= mysql_fetch_array(mysql_query("select * from user_lastlogin where user_id = '".$profid."' "));
				$onstatus 	= $lastlogin['online_status'];
			?>
            <div class="hits_panel">
              <div style="height: 530px; overflow: hidden; position: relative;" >
                <div id="proinfod" class="pro_div" >
                  <div class="clear"></div>
                  <div class="online_btn">
                    <?php if($onstatus=='1') { echo "Online"; } else { echo "Offline"; } ?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">username:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_user['user_name'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">location:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_info['city'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">gender:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_user['user_gender'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">age:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_user['age'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">status:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_info['marital_status'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">hair color:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_info['hair'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">eye color:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_info['eyecolor'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">height:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_info['height'];?>
                    cm ( <?php echo get_height($fetch_info['height'])?> )</div>
                  <div class="clear"></div>
                  <div class="username">best feature:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=stripslashes($fetch_info['best_describes']);?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">occupation:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=stripslashes($fetch_info['your_profession']);?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">drinks:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_info['drink'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">drugs:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_info['drugs'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">smoke:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_info['smoke'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">education:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_info['education'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">body type:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_info['bodytype'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">religion:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_info['religion'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">ethnicity:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_user['user_ethnicity'];?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">Last Online:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=date_diff($lastlogin['lastlogin']);?>
                  </div>
                  <div class="clear"></div>
                  <div class="username">Member Since:</div>
                  <div class="clear"></div>
                  <div class="name">
                    <?=$fetch_user['reg_date'];?>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
              <div class="clear"></div>
              <div id="arrowdon" class="arrow1" style="cursor:pointer;"><img src="images/arrow1.jpg" border="0" /></div>
              <div id="arrowup" class="arrow1" style="cursor:pointer;"><img src="images/arrow2.jpg" border="0" /></div>
            </div>
          </div>
          <div class="clear"></div>
          
        <?php 

		$sql_slide = mysql_query("select * from user_images where user_id = '".$fetch_user['user_id']."' and show_profile = '1' ");
		if(mysql_num_rows($sql_slide)>1) 
		{
		?>
        <div class="thumb_main">
        <?php
			while($row_slide = mysql_fetch_array($sql_slide))
			{
			//print_r($row_slide);
		?>
            <div class="thumb"><img src="images/user_images/smallthumb/<?php echo $row_slide['user_image'];?>" border="0" width="80" height="80" data-tooltip="sticky<?php echo $row_slide['id'];?>" /> </div>
        <?php 
			}
			?>
            </div>
            <?php
		}
		?>
            <div id="mystickytooltip" class="stickytooltip">
              <div style="padding:5px">
         <?php 
			$sql_slideh = mysql_query("select * from user_images where user_id = '".$fetch_user['user_id']."' and show_profile = '1'");
			while($row_slideh = mysql_fetch_array($sql_slideh))
			{
		 ?>
                <div id="sticky<?php echo $row_slideh['id'];?>" class="atip"> <img  src="images/user_images/<?=$row_slideh['user_image'];?>" />
                  <?php if($row_slideh['caption'] != '') { ?>
                  <div align="center">
                    <?=$row_slideh['caption'];?>
                  </div>
                  <?php } ?>
                </div>
			<?php 
            }
            ?>
              </div>
            </div>
          
        </div>
        <div class="clear"></div>
  <div class="box_main">
    <div class="box_top"><img src="images/box-top.png" /></div>
    <div class="box_mid">
      <form name="viewprofrm" id="viewprofrm" action="" method="post">
        <div class="registration_form_bttn3-2">
          <input type="hidden" name="favor_id" id="favor_id" value="<?php echo $profid; ?>" />
          <input type="image" src="images/add_favrt.jpg" name="button" id="button" value="favorite" onClick="return del_prompt(this.form,this.value)" height="68" />
        </div>
      </form>
      <div class="registration_form_bttn3-2"> <a href="send_msg.php?uid=<?php echo $profid; ?>" class="">
        <input type="image" src="images/snd_mssg.jpg" name="button" id="button" value="Send message" height="68" />
        </a> </div>
    </div>
    <div class="box_top"><img src="images/box-bttm.png" /></div>
  </div>
  <div class="clear"></div>
        <div class="clear"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
<!-- footer container -->
<?php include_once("footer.php");?>
</body>
</html>
