<?php
session_start();
include("../config/db_connect.php");
$country=intval($_GET['country']);
$query="SELECT * FROM state WHERE country_id='$country'";
//echo $query; die;
$result=mysql_query($query);

$myarray=array();
	$str="";
	$str=$str ."\" \"".",". "\"Select state\"".",";
	while($nt=mysql_fetch_array($result))
	{
		$str=$str ."\"$nt[name]\"".",". "\"$nt[name]\"".",";
	}
	$str=substr($str,0,(strlen($str)-1)); // Removing the last char , from the string
	echo "new Array($str)";
?>


