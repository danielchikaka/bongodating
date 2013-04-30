<?php 
session_start();
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

$sdate 	= date('d-m-Y h:i:s A');

// Get user details
$sender	= mysql_fetch_array(mysql_query("select user_image from user where user_id = '".$_SESSION['userid']."' "));

$find_name = mysql_fetch_array(mysql_query("select user_name,user_email from user where user_id = '".$_REQUEST['uid']."'"));


// Add message to inbox
if(isset($_POST['sendmsg']))
{
	$msgid	= '1';
	// add message to table
	$send	= mysql_query(" insert into messages set sender_id = '".$_SESSION['userid']."' , rece_id = '".$_REQUEST['uid']."' , subject = '".$_POST['sub']."' , message = '".$_POST['message']."' , datetime = '$sdate' ");
	
	// send mail to user
	if($send)
	{
		$to 	= $_SESSION['SESS_email'];
		$subject= $_POST['sub'];
		$from	= $find_name['user_email'];
		
		// message
		$message = '<html>
						<head>
							<title>'.$_POST['sub'].'</title>
						</head>
						<body>
							<table>
								<tr>
									<td>'.$_POST['message'].'</td>
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
		header("location:inbox.php?msgid=$msgid");
		exit;
		//}
	}
}


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
<script type="text/javascript" language="javascript">
function valid(){
$subj= document.getElementById("sub").value;
if(!$subj){
alert("Please enter Subject");
document.getElementById("sub").show;
document.getElementById("sub").focus();
return false;
}
return true;
}
</script>
</head>
<body>
  <?php include_once("header.php");?>
<div id="wrapper">
  <div id="maincont">
    <div id="illust">
      <div class="clr"></div>
    </div>
    <form name="sendmsg" id="sendmsg" method="post" action="" onsubmit="return valid();">
      <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;">
        <div class="mandatory_txt2">To :</div>
        <div class="mandatory_flds" style="margin-left:28px;">
          <label>
          <input type="text" name="user" id="user" value="<?=$find_name['user_name'];?>" />
          </label>
        </div>
        <div class="clr"></div>
        <div class="mandatory_txt2">Subject:</div>
        <div class="mandatory_flds">
          <label>
          <input type="text" name="sub" id="sub" />
          </label>
        </div>
        <div class="clr"></div>
        <div class="mandatory_flds2">
          <label>
          <textarea name="message" id="message"  style="width:800px; height:250px;" ></textarea>
          </label>
        </div>
        <div class="mandatory_flds2"></div>
        <div class="mandatory_flds2"></div>
        <div class="clr"></div>
        <div class="registration_form_bttn">
          <input type="hidden" name="sendmsg" id="sendmsg" value="" />
          <input type="image" src="images/msg_now.png" name="button2" id="button2" value="Submit" />
        </div>
        <div class="chemistry_main" style="background:#f1f1f1; margin-top:20px;"></div>
        <div class="clr"></div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
      <div class="clr"></div>
    </form>
  </div>
  <p>&nbsp;</p>
</div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
