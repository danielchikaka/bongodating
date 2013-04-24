<?php
include_once("config/db_connect.php");

//if(isset($_POST['submit'])) {
	$email 		= $_POST['email'];
	$password 	= base64_encode($_POST['pass']);
	$go 		= $_POST['go'];

//echo "select * from user where user_email = '$email' and user_password = '$password' and status = '1'";die();
// User referrl Login code
	$login_check = mysql_query("select * from user where user_email = '$email' and user_password = '$password' and status = '1'") or die("insert error");
	if(mysql_num_rows($login_check)>0)
	{
		$logmysql_data 			= mysql_fetch_array($login_check);
		$_SESSION['userid'] 	= $logmysql_data['user_id'];
		$_SESSION['username'] 	= $logmysql_data['user_name'];
		$words 					= explode(' ', trim($logmysql_data['user_name']));
		$_SESSION['usernamechat'] = $words[0];
		
		// Update user last login
		$_SESSION['SESS_email'] = $logmysql_data['user_email'];
		$lastlog	= mysql_query( "update user_lastlogin set lastlogin = '$sdate' , ipaddress = '".$_SERVER['REMOTE_ADDR']."' , online_status = '1' where user_id = '".$_SESSION['userid']."' ");
		header("location:$go");
		  /*if($_SESSION['refer']){
			 $sdate = date('d-m-Y h:i:s A');
			 //echo "insert into favorites set user_id = '".$_SESSION['userid']."', favor_id = '".$_POST['favor_id']."', sdate = '".$sdate."' "; die;
			 echo "insert into favorites set user_id = '".$_SESSION['userid']."', favor_id = '".$_POST['favor_id']."', sdate = '".$sdate."'"; die;
			$insert = mysql_query("insert into favorites set user_id = '".$_SESSION['userid']."', favor_id = '".$_POST['favor_id']."', sdate = '".$sdate."'") or die(mysql_error());
			header("location:favorites.php");
			}*/
	}
	else
	{
		header("location:lgnerr.php?lnermg=lerm");
	}
//}

?>
