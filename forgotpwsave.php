<?php
session_start();
include_once("config/db_connect.php");

// forgot Password Code
if(isset($_POST['emailsubmit'])) 
{
	$email 		= $_POST['emailpwd'];
	
	// Check email exists or not
	$login_check= mysql_query("select * from user where user_email='$email' ") or die("insert error");
	if(mysql_num_rows($login_check)>0)
	{
		$logmysql_data 	= mysql_fetch_array($login_check);
		$user_password 	= base64_decode($logmysql_data['user_password']);
		$username 		= $logmysql_data['user_name'];
		$sess_email 	= $logmysql_data['user_email'];
		
		$to = $sess_email;
		$subject = ucfirst($username).' Your Password';
		
		// Send mail to user with password and username
		$message = '
		<html>
			<head>
				<title>LogIn Information</title>
			</head>
			<body>
				<table>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Your Username is : '.$username.' </td>
					</tr>
					<tr>
						<td>Your Email is : '.$to.' </td>
					</tr>
					<tr>
						<td>Your Password is : '.$user_password.'</td>
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
		//echo $message;
		//echo $to; die;
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:<'.SITE_MAIL.'>'. "\r\n";
		$mail2= mail($to, $subject, $message, $headers);
		
		$email = base64_encode($email);
		header("location:forgotpw.php?fgermg=ferm&eml=$email");
	}
	else
	{
		//$msg = "No account was found with this Email or Password !";
		header("location:forgotpw.php?fgermg=ferm");
	}
}

?>
