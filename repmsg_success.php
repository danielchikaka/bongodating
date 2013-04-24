<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

$profid	 = $_GET['profid'];
$sdate	 = date('d-m-Y h:i:s A');
$success = 1;

// Add replied message to inbox
if(isset($_POST['sendmsg']))
{

	$sendmesage = mysql_query( " insert into messages set sender_id = '".$_SESSION['userid']."' , rece_id = '$profid' , subject = '".$_POST['sub']."' , message = '".$_POST['message']."' , datetime = '$sdate' , replyid = '".$_POST['repid']."' ");
	mysql_query ( " update messages set reply = 1 where id = ".$_POST['repid']." " );

	$recipient 	= mysql_fetch_array(mysql_query("select * from user where user_id = '".$profid."'"));
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
}else{
	header("location:viewallmessages.php?sender_id=$profid");
	exit;
}
?>
