<?php
include_once("config/db_connect.php");
if(isset($_POST['submit'])) {
    $sdate 		= date('d-m-Y h:i:s A');
	$email 		= $_POST['email'];
	$password 	= base64_encode($_POST['pass']);

	//User Login code
	$login_check = mysql_query( "select * from user where user_email = '$email' and user_password = '$password' and status = '1' ") or die("fetch error");
	if(mysql_num_rows($login_check)>0)
	{
		$logmysql_data 			= mysql_fetch_array($login_check);
		$_SESSION['userid'] 	= $logmysql_data['user_id'];
		$_SESSION['username'] 	= $logmysql_data['user_name'];
		$words 					= explode(' ', trim($logmysql_data['user_name']));
		$_SESSION['usernamechat'] = $words[0];
		$_SESSION['SESS_email'] = $logmysql_data['user_email'];
		
	//Update user last login
       $lastlog= mysql_query("update user_lastlogin set lastlogin = '$sdate' , ipaddress = '".$_SERVER['REMOTE_ADDR']."' , online_status = '1' where user_id = '".$_SESSION['userid']."' ");
	   
	$_SESSION['start_date'] = $sdate;
	   
		 echo $_SESSION['SESS_email']; die;
		 header("location:inbox.php");
		 exit();
	}
	else
	{
		$msg = "No account was found with this Email or Password !";
		header("location:lgnerr.php?lnermg=lerm");
		exit();
	}
}
?>