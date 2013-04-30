<?php 
include_once("config/db_connect.php") ;

$profid 	= $_GET['sender_id'];
// Fetch user Details 
$query		= mysql_query("select * from user where user_id='".$profid."'");
$fetch_user	= mysql_fetch_array($query);

if($_GET['gen']!= "") 
{
	$_SESSION['user_gender'] = $_GET['gen'];
}

$info_query	= mysql_query("select * from user_info where user_id = '".$fetch_user['user_id']."' ");
$fetch_info = mysql_fetch_array($info_query);

// Check last login status
$lastlogin	= mysql_fetch_array(mysql_query("select * from user_lastlogin where user_id = '".$fetch_user['user_id']."' "));

$onstatus 	= $lastlogin['online_status'];
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
<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />
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
        <div class="profl_title">Your conversation with <?php echo ucfirst($fetch_user['user_name']); ?> &nbsp;&nbsp;&nbsp;
          <?php if($onstatus=='1') { 
 $words = explode(' ', trim($fetch_user['user_name'])); ?>
          <a href="javascript:void(0)" onClick="javascript:chatWith('<?=$words[0]?>')"><img src="images/greenCircle.png" border="0"  />&nbsp;<font color="#009900">Chat</font></a>
          <?php } ?>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <?php
	  	 // Get all message	
		 $inbox = mysql_query("select * from messages where rece_id = '".$_SESSION['userid']."' and sender_id = '".$profid."' and status = '1' order by id asc ");
	     if(mysql_num_rows($inbox)>0)
		 {
			 while($info_inbox = mysql_fetch_array($inbox)){
				 if($info_inbox['readflage'] == 0) 
				 {
					mysql_query(" update messages set readflage = 1 where id = ".$info_inbox['id']." " ); 
				 }
				 $repid 	= $info_inbox['id'];
				 $fetch_user= mysql_fetch_array(mysql_query("select * from user where user_id = '".$info_inbox['sender_id']."' "));
				 $fetch_img	= mysql_fetch_array(mysql_query("select * from user_images where user_id = '".$info_inbox['sender_id']."' and main_image = '1' "));
				 $user_image = $fetch_img['user_image'];
				 $user_gender = $fetch_user['user_gender'];
				$user_id = $fetch_user['user_id'];
	?>
		  <div class="clr"></div>
		  <div class="taklu"><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>">
			<?php if($user_image!='') { ?>
			<img src="images/user_images/smallthumb/<?php echo $user_image;?>" border="0" width="44" height="45"/>
			<?php } else { ?>
			<img src="images/blank.jpg" border="0" width="45" height="45" />
			<?php } ?>
			</a></div>
		  <div class="taklu_name_txt" style="border-bottom:1px solid #999999; ">
			<div class="taklu_name"><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>" class="internal1-2"><?php echo ucfirst($fetch_user['user_name']);?></a></div>
			<div class="taklu_name2"><?php echo $info_inbox['datetime'];?></div>
			<div class="clr"></div>
			<?php echo $info_inbox['subject'];?>
			<div class="clr"></div>
			<?php echo $info_inbox['message'];?></div>
		  <div class="clr" ></div>
      <?php } } ?>
      <div class="clr"></div>
    </div>
    <form id="sendmail" name="sendmail" method="post" action="repmsg_success.php?profid=<?=$profid;?>">
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="mandatory_flds2"></div>
        <div class="mandatory_flds2">
          <label>
          <textarea name="message" id="message"  style="width:600px; height:100px;"></textarea>
          </label>
        </div>
        <div class="taklu_name"></div>
        <div class="mandatory_flds2"></div>
        <div class="mandatory_flds2"></div>
        <div class="mandatory_flds2"></div>
        <div class="clr"></div>
        <div class="registration_form_bttn">
          <p>
            <input type="hidden" name="repid" id="repid" value="<?php echo $repid; ?>" />
            <input type="hidden" name="sendmsg" id="sendmsg" />
            <input type="image" src="images/quick.png" name="button2" id="button2" value="Submit" />
          </p>
          <p>&nbsp;</p>
          <p>&nbsp; </p>
        </div>
        <div class="clr"></div>
      </div>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
<?php include_once("footer.php");?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
</body>
</html>
