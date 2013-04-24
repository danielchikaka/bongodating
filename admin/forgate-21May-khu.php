<?php
session_start();
require_once("../includes/config.php"); 
if(isset($_POST['submit']))
{
	//$_SESSION['userid']=$_POST['uid'];
	//$_SESSION['upassword']=$_POST['pass'];
	    $to  = $_POST['email'];
		$sql="select * from tbl_admin where email='".$to."' ";
		$res=mysql_query($sql) or mysql_error();
		$dat = mysql_fetch_array($res);
		$val=mysql_num_rows($res);
		 
		 if($val>0)
		 {
		$pass  = $dat['password'];
		$subject = 'Wealth-E: Forgate password';
	   $message = '<html><body><img src="http://softechclients.com/clients/Aasim/wealth-E/images/wealth-E-logo-blue-presentation.png" border="0"  /><br/><hr /><br/><br/>
		Your Password : '.$pass.'<br/><br/>Regards, <br/>Administrator <br/>wealth-E</body>
</html>';
		$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: admin<aasim.aford@gmail.com>' . "\r\n" .
			'Reply-To: admin<aasim.aford@gmail.com>' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

			@mail($to, $subject, $message, $headers);
		$err = "<font color='#006600'><b>Your password has been sent to your email. Check your email.</b></font>";
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
<title>Forgate Password</title>
<LINK href="../css/style.css" rel=stylesheet type=text/css>
</head>
<body >
<div align="center">
  <div id="main_container" align="center" style="margin-top:100px;">
    <div class="login_form"  >
      <h3>Forgate password panel</h3>
      <a href="../index.php" class="forgot_pass">Home</a>
      <form action="" method="post" class="niceform">
        <fieldset>
        <div align="center"><?php echo $err;?></div>
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
        <?=date("Y")?>
        . All rights reserved.</div>
    </div>
  </div>
</div>
</body>
</html>
