<?php
session_start();
require_once("../config/db_connect.php"); 

if(isset($_POST['submit']))
{
	//$_SESSION['userid']=$_POST['uid'];
	//$_SESSION['upassword']=$_POST['pass'];

	    $to  = $_POST['email'];
		$sql="select * from admin where email='".$to."' ";
		$res=mysql_query($sql) or mysql_error();
		$dat = mysql_fetch_array($res);
		$val=mysql_num_rows($res);

		if($val>0)
		{
		$pass  = base64_decode($dat['password']);
		$subject = 'Forgate password';
	   $message = '<html><body>
		Your Password : '.$pass.'<br/><br/>Regards, <br/>Administrator <br/>'.SITE_NAME.'</body>
</html>';

		$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.SITE_NAME.' Admin<'.SITE_MAIL.'>' . "\r\n" .

			'Reply-To: admin<'.SITE_MAIL.'>' . "\r\n" .

			'X-Mailer: PHP/' . phpversion();



			@mail($to, $subject, $message, $headers);
		$err = "forgot";
		?> <script language="javascript">
		location.href="index.php?err=forgot";
	   </script> <? exit;
		 }
		else
		{
			session_destroy();
			$err="<font color='#FF0000'><b>Please enter valid email.</b></font>";
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="../images/logo/<?php echo SITE_FAVICON; ?>"/>
<title>Forgot Password | <? print SITE_TITLE; ?></title>
<LINK href="../css/style-admin.css" rel=stylesheet type=text/css>
</head>
<body >
<div align="center">
  <div id="main_container" align="center" style="margin-top:100px;">
    <div class="login_form"  >
      <h3>Forgot Password Panel</h3>
      <a href="index.php" class="forgot_pass">Home</a>
      <form action="" method="post" class="niceform">
        <fieldset>
        <div align="center"><?php echo isset($err);?></div>
        <dl>
          <dt>
            <label for="email">Email:</label>
          </dt>
          <dd>
            <input type="text" name="email" id="email" size="40" />
          </dd>
        </dl>
        <dl class="submit">
          <input type="submit" name="submit" id="submit" value=""   class="bbtn2"/>
        </dl>
        </fieldset>
      </form>
    </div>
    <div class="footer_login">
      <div class="left_footer"> &copy; Copyright
        <? //echo date("Y")?> <?PHP echo SITE_COPYRIGHT;?>. All rights reserved.</div>
    </div>
  </div>
</div>
</body>
</html>
