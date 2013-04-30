<?php 
include_once("config/db_connect.php") ;

$profid 	= $_GET['sender_id'];
$sdate 		= date('d-m-Y h:i:s A');
$success	= 1;

// Add message to inbox
if(isset($_POST['sendmsg']))
{
	$sendmesage = mysql_query("insert into messages set sender_id = '".$_SESSION['userid']."' , rece_id = '$profid' , subject = '".$_POST['sub']."' , message = '".$_POST['message']."' , datetime = '$sdate' ");
	

	$recipient 	= mysql_fetch_array(mysql_query("select * from user where user_id = '".$profid."'"));
	// send mail to user
	if($sendmesage)
	{
		$to 		= $recipient['user_email'];
		$recip_name	= $recipient['user_name'];
		$subject	= 'email alert saying '.$recip_name.' you have message..';
		$from		= SITE_MAIL;
		$userName	= $_SESSION['username'];
		


$url = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$url);
$dir = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
}

$website = $dir;
//$website_url = '<a href="$website/logcom.php" title="$website">$website</a>';		
		// message
		$message = '<html>
						<head>
							<title>'.$_POST['sub'].'</title>
						</head>
						<body>
							<table>
								<tr>
									<td>Hi '.$recip_name.' you have message from '.$userName.'. Please login to <a href="'.$website.'/logcom.php" title="'.$website.'">'.$website.'</a> to read the message.</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Thank you,</td>
								</tr>
								<tr>
									<td>'.SITE_NAME.' Support</td>
								</tr>
							</table>
						</body>
					</html>'; 
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From:" . $from;
		
		$mail2	  = @mail($to, $subject, $message, $headers);
		
		
		//if($mail2){
		header("location:inbox.php?msgid=$success");
		exit;
		//}
	}
}

// Fetch user Details 
$query 		= mysql_query("select * from user where user_id = '".$profid."' ");
$fetch_user = mysql_fetch_array($query);


if($_GET['gen'] != "") 
{
	$_SESSION['user_gender'] = $_GET['gen'];
}
$info_query = mysql_query(" select * from user_info where user_id = '".$fetch_user['user_id']."' ");
$fetch_info = mysql_fetch_array($info_query);
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
  <!-- header container starts here-->
  <!-- / header container ends here-->
  <!-- main container with changing content -->
  <div id="maincont">
    <div id="illust">
      <div class="clr"></div>
      <div class="clr"></div>
      <div class="profl_contnt2">
        <p>Use the Meet Me feature, it will dramatically improve your chances by letting us know who you find attractive</p>
      </div>
      <div class="clr"></div>
      <?php
		$user_image	= $fetch_user['user_image'];
		$user_gender= $fetch_user['user_gender'];
		$user_id 	= $fetch_user['user_id'];
		$showuser 	= mysql_fetch_array(mysql_query(" select  online_status from user_lastlogin  where user_id = '".$user_id."' "));
		$onstatus 	= $showuser['online_status'];
		
		$inbox		= mysql_query("select * from messages where id = '".$_GET['msgid']."' ");
		if(mysql_num_rows($inbox)>0){}
		$info_inbox	= mysql_fetch_array($inbox);
		$rece_id 	= $info_inbox['rece_id'];
		?>
      <form id="sendmail" name="sendmail" method="post" action="viewmessage.php?sender_id=<?=$profid;?>">
        <div class="chemistry_main">
          <div class="salman"><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>">
            <?php if($user_image!='') { ?>
            <img src="images/user_images/<?php echo $user_image;?>" border="0" width="90" height="90"/>
            <?php } else { ?>
            <img src="images/blank.jpg" border="0" width="90" height="90" />
            <?php } ?>
            </a></div>
          <div class="subject_ghg">Subject:
            <?php if($info_inbox['replyid']!=0) { ?>
            RE:
            <?php } ?>
            <?php if($info_inbox['subject']!='') { echo $info_inbox['subject']; } else { echo "none"; } ?>
            <div class="clr"></div>
            <div class="sent_date">To: <?php echo $fetch_user['user_name']; ?><br />
              Sent Date: <?php echo $info_inbox['datetime']; ?></div>
          </div>
          <div class="clr"></div>
          <div class="subject_ghg" style="margin-top:30px;"><a href="viewprofile.php?profid=<?=$user_id;?>&gen=<?=$user_gender;?>" class="internal1-2">View Profile</a> </div>
          <div class="subject_ghg" style="margin-top:30px;"><a href="viewallmessages.php?sender_id=<?=$rece_id;?>" class="internal1-2">View All Messages </a> &nbsp;&nbsp;&nbsp;
            <?php if($onstatus=='1') { 
 $words = explode(' ', trim($fetch_user['user_name'])); ?>
            <a href="javascript:void(0)" onClick="javascript:chatWith('<?=$words[0]?>')"><font color="#009900">Chat</font></a>
            <?php } ?>
          </div>
          <div class="clr"></div>
          <div class="subject_ghg" style="margin-top:20px;">Original Message YOU sent on <?php echo $info_inbox['datetime']; ?> <br />
            <br />
            <?php echo $info_inbox['message']; ?></div>
          <div class="clr"></div>
        </div>
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
          <div class="subject_ghg2" style="margin-top:30px;">
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt2">Subject</div>
          <div class="mandatory_flds" style="margin-left:28px;">
            <label>
            <input type="text" name="sub" id="sub" value="Re : <?php if($info_inbox['replyid']!=0) { ?>RE:<?php } ?>  <?php if($info_inbox['subject']!='') { echo $info_inbox['subject']; } else { echo "none"; } ?>" style="width:500px;" />
            </label>
          </div>
          <div class="clr"></div>
          <div class="mandatory_flds2">
            <label>
            <textarea name="message" id="message"  style="width:600px; height:250px;"></textarea>
            </label>
          </div>
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
          <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;"></div>
          <div class="clr"></div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </div>
      </form>
      <div class="clr"></div>
    </div>
    <p>&nbsp;</p>
  </div>
</div>
<!-- footer container -->
<?php include_once("footer.php");?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
</body>
</html>
