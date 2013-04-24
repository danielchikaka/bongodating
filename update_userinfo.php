<?php 
include_once("config/db_connect.php");

// Check user id
if($_SESSION['userid'] == "")
{
	header("location:index.php");
}

// Update Registration details
$update_info = mysql_query(" update user set user_name = '".$_POST['username']."' , user_email = '".$_POST['email']."' , user_birthdate = '".$_POST['dob']."' , user_gender = '".$_POST['gender']."' , user_ethnicity = '".$_POST['ethnicity']."' , user_country = '".$_POST['country']."' where user_id = '".$_SESSION['userid']."' ") or die(mysql_error());

if($update_info)
{
	header("location: profile.php");
}

?>