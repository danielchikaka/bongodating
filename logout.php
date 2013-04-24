<?php
include_once('config/db_connect.php');
session_start();

$sdate 	= date('d-m-Y h:i:s A');

// Update user last login
$lastlogout = mysql_query(" update user_lastlogin set last_logout = now() , online_status = '0' where user_id = '".$_SESSION['userid']."' ");
session_destroy();

header('location:index.php');
?>