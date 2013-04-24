<?php 
include_once("config/db_connect.php") ;

// Check user id
if($_SESSION['userid']=="")
{
	header("location:index.php");
}

// Update Password
$updatequery = mysql_query("update user set user_password = '".base64_encode($_POST['newpwd'])."' where user_id = '".$_SESSION['userid']."' ");
if($updatequery)
{
	header("location: profile.php");
}

?>