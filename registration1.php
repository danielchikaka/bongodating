<?php 
include_once("config/db_connect.php") ;


		

if(isset($_POST['sub']))
{
	$cap = 'notEq';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['captcha'] == $_SESSION['cap_code']) {
        // Captcha verification is Correct. Do something here!
		
		
	// Member Registration code	
	$today 			= date('d/m/Y');
	$sdate 			= date('d-m-Y h:i:s A');
	
	$user_birthdate = $_POST['days'].'-'.$_POST['months'].'-'.$_POST['years'];
	$age 			= Age($user_birthdate);
	$password		= base64_encode($_POST['password']);
	
	$insert = mysql_query ( " insert into user set 	user_name = '".$_POST['uname']."' , 
			age 			= '".$age."' , 
			user_password 	= '".$password."' , 
			user_birthdate 	= '".$user_birthdate."' , 
			user_gender 	= '".$_POST['gender']."' , 
			user_country 	= '".$_POST['country']."' , 
			user_ethnicity 	= '".$_POST['ethnicity']."' , 
			user_email 		= '".$_POST['email1']."' , 
			reg_date 		= '$today' , 
			status			='1' " ) or die(mysql_error());
			
	if($insert)
	{
		$last_id 			= mysql_insert_id();
		mysql_query("insert into user_info set user_id='".$last_id."'") or die (mysql_error());
		$_SESSION['last_id']= $last_id; 
		
		$asd 	= "select * from user where user_id = $last_id";
		$Signin	= mysql_fetch_array(mysql_query($asd));
		
		$_SESSION['userid']   = $Signin['user_id'];
		$_SESSION['username'] = $Signin['user_name'];
		
		$words 						= explode(' ', trim($Signin['user_name']));
		$_SESSION['usernamechat']	= $words[0];
		
		$_SESSION['SESS_email'] 	= $Signin['user_email'];
		
		$lastlog = mysql_query("insert into user_lastlogin set user_id = '".$_SESSION['userid']."' , lastlogin = '$sdate' , ipaddress = '".$_SERVER['REMOTE_ADDR']."' , online_status = '1' ");
		//mailing

//Sent mail to registered member for confirmation and login details		
		$to 	 = $_SESSION['SESS_email'];
		$subject = 'LogIn Information';
		
		// message
		$message = '
		<html>
			<head>
				<title>LogIn Information</title>
			</head>
			<body>
				<table>
					<tr>
						<td><b>Thank you for Registering and Welcome to '.SITE_NAME.'.</b></td>
					</tr>
					<tr>
						<td>Please Review your Account Information.</td>
					</tr>
					<tr>
						<td>Your Email is:- '.$to.' </td>
					</tr>
					<tr>
						<td>Your Password is:- '.$_REQUEST[password].'</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>If you require assistance, please email us at <a href="mailto:'.SITE_MAIL.'" title="mailto:'.SITE_MAIL.'">'.SITE_MAIL.'</a></td>
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
		</html>';
		 
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:<'.SITE_MAIL.'>'. "\r\n";
		@$mail2= mail($to, $subject, $message, $headers);
		
		header("location:registration2.php");
		exit;
		
	}
	
	
	$cap = 'Eq';
    } else {
        // Captcha verification is wrong. Take other action
		$caperr = "Captcha verification Wrong!";
        $cap = '';
    }
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
    <?php if($caperr!='') { ?>
      <div class="cap_status"><?=$caperr?></div>
      <?php } ?>
      <div class="clr"></div>
      <div class="registration_form_main">
        <div class="registration_form_head">Hottest New Singles Joining every Day!</div>
        <form id="form1" name="form1" method="post" action="" >
          <div class="registration_form_mid">
            <div class="registration_txt">Username</div>
            <div class="registration_form_flds1">
              <input name="uname" id="uname" type="text" value="<?=$_POST['uname']?>" class="validate[required] registration_form_flds"/>
            </div>
            <div class="clr"></div>
            <div class="registration_txt"> Email</div>
            <div class="registration_form_flds1">
              <input name="email1" id="email1"type="text" value="<?=$_POST['email1']?>" class="validate[required,custom[email],ajax[ajaxUserCallPhp]] registration_form_flds"/>
            </div>
            <div class="clr"></div>
            <div class="registration_txt">Confirm Email</div>
            <div class="registration_form_flds1">
              <input name="c_email" id="c_email" type="text" value="<?=$_POST['c_email']?>" class="validate[required,custom[email],equals[email1]] registration_form_flds"/>
            </div>
            <div class="clr"></div>
            <div class="registration_txt"> Password </div>
            <div class="registration_form_flds1">
              <input name="password" id="password" type="password"  class="validate[required] registration_form_flds"/>
            </div>
            <div class="clr"></div>
            <div class="registration_txt">Birthdate</div>
            <div class="registration_form_flds_main" style="margin-left:20px;">
              <select name="days" id="days" class="validate[required]" style="width:70px;
       height:28px; border:1px solid #d4d4d4; background:url(images/registration_form_flds.jpg) repeat-x; ">
                <option value="">Days</option>
                <?php $day=1; while($day!=32){ ?>
                <option value="<?=$day;?>" <?php if($_POST['days']==$day) { echo "selected"; } ?>><?=$day;?></option>
                <?php $day++; } ?>
              </select>
            </div>
            <div class="registration_form_flds_main">
              <select name="months" id="months" class="validate[required]" style="width:70px;
       height:28px; border:1px solid #d4d4d4; background:url(images/registration_form_flds.jpg) repeat-x; ">
                <option value="">Months</option>
                <?php $month=1; while($month!=13){ ?>
                <option value="<?=$month;?>" <?php if($_POST['months']==$month) { echo "selected"; } ?> ><?=$month;?></option>
                <?php $month++; } ?>
              </select>
            </div>
            <div class="registration_form_flds_main">
              <select name="years" id="years" class="validate[required]" style="width:70px; height:28px; border:1px solid #d4d4d4; background:url(images/registration_form_flds.jpg) repeat-x; ">
                <option value="">Years</option>
                <?php $year=1980; while($year!=2001){ ?>
                <option value="<?=$year;?>" <?php if($_POST['years']==$year) { echo "selected"; } ?> ><?=$year;?></option>
                <?php $year++; } ?>
              </select>
            </div>
            <div class="clr"></div>
            <div class="registration_txt">Gender</div>
            <div class="registration_form_flds1">
              <label>
              <select name="gender" id="gender" style="width:242px; height:28px; border:1px solid #d4d4d4; background:url(images/registration_form_flds.jpg) repeat-x; ">
                <option value="" >Select</option>
                <option value="Male" <?php if($_POST['gender']=="Male") { echo "selected"; } ?> >Male</option>
                <option value="Female" <?php if($_POST['gender']=="Female") { echo "selected"; } ?> >Female</option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="registration_txt">Country</div>
            <div class="registration_form_flds1">
              <label>
              <select name="country" id="country" class="validate[required]" style="width:242px; height:28px; border:1px solid #d4d4d4; background:url(images/registration_form_flds.jpg) repeat-x; ">
                <option value="" selected="selected">Select Country</option>
                <?php $con = mysql_query("select * from country order by name asc");
			 while($confetch=mysql_fetch_array($con)){ ?>
                <option value="<?=$confetch['country_id'];?>" <?php if($_POST['country']==$confetch['country_id']) { echo "selected"; } ?>>
                <?=$confetch['name'];?>
                </option>
                <?php } ?>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="registration_txt">Ethnicity</div>
            <div class="registration_form_flds1">
              <label>
              <select name="ethnicity" id="ethnicity" class="validate[required]" style="width:242px; height:28px; border:1px solid #d4d4d4; background:url(images/registration_form_flds.jpg) repeat-x;">
                <option value="" selected="selected">Select</option>
                <option value="Caucasian" <?php if($_POST['ethnicity']=="Caucasian") { echo "selected"; } ?> > Caucasian</option>
                <option value="Black" <?php if($_POST['ethnicity']=="Black") { echo "selected"; } ?> >Black</option>
                <option value="European" <?php if($_POST['ethnicity']=="European") { echo "selected"; } ?> >European </option>
                <option value="Hispanic" <?php if($_POST['ethnicity']=="Hispanic") { echo "selected"; } ?> >Hispanic </option>
                <option value="Indian" <?php if($_POST['ethnicity']=="Indian") { echo "selected"; } ?> >Indian </option>
                <option value="Middle Eastern" <?php if($_POST['ethnicity']=="Middle Eastern") { echo "selected"; } ?> >Middle Eastern </option>
                <option value="Native American" <?php if($_POST['ethnicity']=="Native American") { echo "selected"; } ?> >Native American</option>
                <option value="Asian" <?php if($_POST['ethnicity']=="Asian") { echo "selected"; } ?> >Asian </option>
                <option value="Mixed Race" <?php if($_POST['ethnicity']=="Mixed Race") { echo "selected"; } ?> >Mixed Race </option>
                <option value="Other Ethnicity" <?php if($_POST['ethnicity']=="Other Ethnicity") { echo "selected"; } ?> >Other Ethnicity </option>
              </select>
              </label>
            </div>
            <div class="clr"></div>
            <div class="registration_txt">&nbsp;</div>
            <div class="captcha_flds">Enter the contents of image<br />
              <label><input type="text" name="captcha" id="captcha" maxlength="6" size="8" class="validate[required]" /> <img src="captcha.php"/></label>
            </div>            
            
            <div class="clr"></div>
            <div class="agree_txt">
              <label>
              <input type="checkbox" name="checkbox" id="checkbox" style="margin-right:10px;" class="validate[required]" />
              I Agree to the <a href="terms.php" class="internal">terms of service</a> </label>
            </div>
            <div class="clr"></div>
          </div>
          <div class="registration_form_btm">
            <div class="registration_form_bttn">
              <input type="hidden" name="sub" id="sub" />
              <input type="image" src="images/next.jpg" name="button" id="button" value="Submit" />
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
