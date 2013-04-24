<?php 
session_start();
include_once("config/db_connect.php");

// Delete favorite list member
$del = mysql_query("delete from favorites where id='".$_REQUEST['uid']."'");

if($del)
{
	header("location:favorites.php");
}

?>