<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include_once('config_global.php');

$conn		= mysql_connect(DBHOST,DBUSER,DBPASS) or die(mysql_error());
$dn			= mysql_select_db(DBNAME,$conn) or die(mysql_error());

$row 		= mysql_fetch_array(mysql_query("select * from settings where id = '1' "));
$site_name 	= trim(stripslashes($row['site_name']));
$email 		= trim($row['email']);
$keyword 	= trim(stripslashes($row['keyword']));
$description= trim(stripslashes($row['description']));
$logo 		= trim($row['logo']);
$copyright 	= trim(stripslashes($row['copyright']));

$favicon  	= trim($row['favicon']);
$paypal_email  	= trim($row['paypal_email']);

define ("SITE_FAVICON",$favicon );
define ("SITE_PAYPAL_EMAIL_ID",$paypal_email );

define ("SITE_MAIL",$email);
define ("SITE_NAME",ucfirst($site_name));
define ("SITE_URL","http://demo.softdatepro.com/");
define ("SITE_TITLE",ucfirst($site_name) );
define ("SITE_LOGO",$logo);
define ("SITE_KEYWORD",$keyword);
define ("SITE_DESCRIPTION",$description);
define ("SITE_COPYRIGHT",$copyright);


	//prepare to insert data
if(! function_exists('prepare_insert') ) 
{	
	function prepare_insert($data) {
		$data = trim ( $data );
		if (get_magic_quotes_gpc ())
			$data = stripslashes ( $data );
		
		return mysql_escape_string ( $data );
	}
}

if(! function_exists('prepare_show') ) 
{	
	//prepare to show in browes
	function prepare_show($data) {
		$data = stripslashes ( $data );
		$data = htmlspecialchars ( $data, ENT_QUOTES );
		return nl2br ( $data );
	}
}


// find age
if(! function_exists('Age') ) 
{
	function Age($birthdate)
	{ 
		return date("Y") - substr(trim($birthdate),-4,4);
	}
}
// find total message per user
if(! function_exists('unReadMsgCount') ) 
{
	function unReadMsgCount($id)
	{
		return mysql_num_rows(mysql_query("select * from messages where rece_id='".$id."' and readflage = 0 and status=1"));
	}
}

// find user is online or not
if(! function_exists('onLineUser') ) 
{
	function onLineUser()
	{
		return mysql_num_rows(mysql_query(" select * from user where user_id in ( select  user_id from user_lastlogin  where online_status='1' ) "));
	}
}

// Date diffrence function
if(! function_exists('date_diff') ) 
{
	function date_diff($start, $end="NOW")
	{
			$sdate = strtotime($start);
			$edate = strtotime($end);
	
			$time = $edate - $sdate;
			if($time>=0 && $time<=59) {
					// Seconds
					$timeshift = $time.' seconds ';
	
			} elseif($time>=60 && $time<=3599) {
					// Minutes + Seconds
					$pmin = ($edate - $sdate) / 60;
					$premin = explode('.', $pmin);
				   
					$presec = $pmin-$premin[0];
					$sec = $presec*60;
				   
					//$timeshift = $premin[0].' min '.round($sec,0).' sec ';
					$timeshift = $premin[0].' minutes ';
	
			} elseif($time>=3600 && $time<=86399) {
					// Hours + Minutes
					$phour = ($edate - $sdate) / 3600;
					$prehour = explode('.',$phour);
				   
					$premin = $phour-$prehour[0];
					$min = explode('.',$premin*60);
				   
					$presec = '0.'.$min[1];
					$sec = $presec*60;
	
					//$timeshift = $prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';
					$timeshift = $prehour[0].' hours ';
	
			} elseif($time>=86400) {
					// Days + Hours + Minutes
					$pday = ($edate - $sdate) / 86400;
					$preday = explode('.',$pday);
	
					$phour = $pday-$preday[0];
					$prehour = explode('.',$phour*24);
	
					$premin = ($phour*24)-$prehour[0];
					$min = explode('.',$premin*60);
				   
					$presec = '0.'.$min[1];
					$sec = $presec*60;
				   
					//$timeshift = $preday[0].' days '.$prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';
					$timeshift = $preday[0].' days ';
	
			}
			return $timeshift;
	}
}

// for sorting
if(! function_exists('sort_arrows') ) 
{
	function sort_arrows($column){
		global $_SERVER;
		return '<A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'asc')).'"><IMG SRC="images/uparrow.png" WIDTH="9" HEIGHT="7" BORDER="0"></A> <A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'desc')).'"><IMG SRC="images/downarrow.png" WIDTH="9" HEIGHT="7" BORDER="0"></A>';
	}
}


if(! function_exists('get_qry_str') ) 
{
	function get_qry_str($over_write_key = array(), $over_write_value= array())
	{
		global $_GET;
		$m = $_GET;
		if(is_array($over_write_key)){
			$i=0;
			foreach($over_write_key as $key){
				$m[$key] = $over_write_value[$i];
				$i++;
			}
		}else{
			$m[$over_write_key] = $over_write_value;
		}
		$qry_str = qry_str($m);
		return $qry_str;
	} 
}


if(! function_exists('qry_str') ) 
{
	function qry_str($arr, $skip = '')
	{
		$s = "?";
		$i = 0;
		foreach($arr as $key => $value) {
			if ($key != $skip) {
				if ($i == 0) {
					$s .= "$key=$value";
					$i = 1;
				} else {
					$s .= "&$key=$value";
				} 
			} 
		} 
		return $s;
	} 
}

if(! function_exists('getSingleResult') ) 
{
	function getSingleResult($sql)
	{
		$response = "";
		$result = mysql_query($sql) or die("<center>An Internal Error has Occured. Please report following error to the webmaster.<br><br>".$sql."<br><br>".mysql_error()."'</center>");
		if ($line = mysql_fetch_array($result)) {
			$response = $line[0];
		} 
	return $response;
	}
}



if(! function_exists('getMemberType') ) 
{
	function getMemberType($userid)
	{
		$result = mysql_query(" select memtype from user where user_id = '$userid' ");
		if ($line = mysql_fetch_array($result)) {
			$response = $line[0];
		} 
		return $response;
	}
}	


if(! function_exists('getSeekUser') ) 
{
	function getSeekUser($userid)
	{
		$result = mysql_query(" select seeking from user_info where user_id = '$userid' ");
		if ($line = mysql_fetch_array($result)) {
			$response = $line[0];
		} 
		return $response;
	}
}


 /**
 * Converts a height value given in cms to ft and ins
 *
 * @param int $cms
 * @return string
 */
 
if(! function_exists('get_height') ) 
{
	function get_height($cms) {
		$inches = $cms/2.54;
		$feet = intval($inches/12);
		$inches = $inches%12;
		return sprintf('%d ft %d ins', $feet, $inches);
	}
}


/**
* Return blocked User Id
**/

if(! function_exists('blockUser') ) 
{
	function blockUser($userid) 
	{
		$response[] = 0;
		$result = mysql_query(" select block_id from user_block where user_id = '$userid' ");
		while ($line = mysql_fetch_array($result)) {
			$response[] = $line[0];
		} 
		array_push($response, $userid);
		
		$response_by = 0;
		$result_by = mysql_query(" select user_id from user_block where block_id = '$userid' ");
		while ($line_by = mysql_fetch_array($result_by)) {
			$response_by .= ",".$line_by[0];
		} 
		//array_push($response_by, $userid);
		
		$blockid_str	= implode(',', $response);
		
		if($response_by != "0") {
			$blockid_str = $blockid_str.",".$response_by;
		}
		return $blockid_str;
		//return $response_by;
	}
}
?>