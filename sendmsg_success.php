<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

$profid		= $_GET['profid'];
$sdate 		= date('d-m-Y h:i:s A');
$success	= 1;

// Add message to inbox
if(isset($_POST['sendmsg']))
{

	$sendmesage = mysql_query ( " insert into messages set sender_id = '".$_SESSION['userid']."' , rece_id = '$profid' , subject = '".$_POST['sub']."' , message = '".$_POST['message']."' , datetime = '$sdate'" );

	if($sendmesage)
	{
		header("location:inbox.php?msgid=$success");
		exit;
	}
}else{

	header("location:favorites.php");
}

?>