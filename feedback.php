<?php 
include_once("config/db_connect.php") ;

// Feedback Code
if(isset($_POST['sub']))
{
	$today   = date('d/m/Y');
	$name    = $_POST['uname'];
	$email   = $_POST['email'];
	$mob     = $_POST['mobile'];
	$subject = $_POST['subject'];
	$message = $_POST['msg'];
	
	// Add feedback to table
	$insert = mysql_query ("insert into feedback set name = '".$name."' , email = '".$email."' , mobile = '".$mob."', subject='".$subject."', message='".addslashes($message)."',date = '$today'" ) or die(mysql_error());
	
	// Send feedback mail to admin 
	if($insert)
	{
		//mailing
		
		$to = SITE_MAIL;
		$subject = $_POST['subject'];
		
		// message
		$msg = '
		<html>
			<head>
				<title>Feedback</title>
			</head>
			<body>
				<table>
					<tr>
						<td><b>'.$name.' send you Feedback. Feedback Information is given below.</b></td>
					</tr>
					<tr>
						<td>Name is:- '.$name.' </td>
					</tr>
					<tr>
						<td>Email:- '.$email.' </td>
					</tr>
					<tr>
						<td>Contact No. is:- '.$mob.' </td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Message:'.$message.'</a></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Thank you,</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>'.SITE_NAME.' Support</td>
					</tr>
				</table>
			</body>
		</html>
		'; 
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:'.$email.''. "\r\n";
		//mail($to, $subject, $msg, "From:" . $email);
		mail($to, $subject, $msg, $headers);
		
		header("location:feed_thanks.php");
		exit;
		
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

<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/template.css" type="text/css"/>
<script src="js/jquery-1.6.min.js" type="text/javascript"></script>
<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"> </script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
	jQuery(document).ready(function(){
	jQuery("#form1").validationEngine();
	});

</script>
</head>
<body>
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <div id="illust">
      <div class="registration_form_main">
        <div class="registration_form_head"> Give Your Feedback</div>
        <form id="form1" name="form1" method="post" action="" >
          <div class="registration_form_mid">
            <div class="registration_txt">Name</div>
            <div class="registration_form_flds1">
              <input name="uname" id="uname" type="text"  class="validate[required] registration_form_flds"/>
            </div>
            <div class="clr"></div>
            <div class="registration_txt"> Email</div>
            <div class="registration_form_flds1">
              <input name="email" id="email"type="text"  class="validate[required,custom[email]] registration_form_flds"/>
            </div>
            <div class="clr"></div>
            <div class="registration_txt">Mobile</div>
            <div class="registration_form_flds1">
              <input name="mobile" id="mobile" type="text"  class="validate[required] registration_form_flds"/>
            </div>
            <div class="clr"></div>
            <div class="registration_txt"> Sub</div>
            <div class="registration_form_flds1">
              <input name="subject" id="subject" type="text"  class="validate[required] registration_form_flds"/>
            </div>
            <div class="clr"></div>
            <div class="registration_txt">Message</div>
            <div>
              <textarea name="msg" id="msg" style="width:250px; height:150px; margin-left:20px;"></textarea>
            </div>
            <div class="clr"></div>
            <div class="clr"></div>
            <div class="clr"></div>
          </div>
          <div class="registration_form_btm">
            <div class="registration_form_bttn">
              <input type="hidden" name="sub" id="sub" />
              <input type="image" src="images/sub.jpg" name="button" id="button" value="Submit" />
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php include_once("footer_up.php"); ?>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
