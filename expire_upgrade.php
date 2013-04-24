<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

// expiry date of user
$a	= mysql_query("select * from payment where user_id='".$_SESSION['userid']."'");

if(mysql_num_rows($a)>0)
{
	$b	= mysql_fetch_array($a);
	
	$exp	= $b['expiry_date'];
	$today 	= time();
	$t		= date('Y-m-d H:i:s',$today);
	echo $t.'<br>'.$exp;

}
?>