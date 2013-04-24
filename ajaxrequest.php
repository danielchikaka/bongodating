<?
require_once "../config/functions.inc.php";

# ******************* Fetch Result Base in Category Id *********************************

if( $_GET['opt'] == 1 )
{
	$cid	= $_GET['cid'];
	$q 		= mysql_query(" select * from subcate_master where cate_id = '$cid' and status=1 ");
	
	$myarray= array();
	$str	= "";
	$str	= $str ."\" \"".",". "\"Select Category\"".",";
	while($nt = mysql_fetch_array($q))
	{
		$str = $str ."\"$nt[sub_id]\"".",". "\"$nt[subcate_name]\"".",";
	}
	$str	= substr($str,0,(strlen($str)-1)); // Removing the last char , from the string
	echo "new Array($str)";
}

# ******************* Fetch Result Base in Sub Category Id *******************************

if($_GET['opt'] == 2)
{
	$sub_id	= $_GET['sub_id'];
	$pid	= $_GET['pid'];
	$q 		= mysql_query("select * from sub_sub_categories where ssub_id='$sub_id' and sub_id='$pid' and status='1' ");
	$num_rows = mysql_num_rows($q);
	
	$myarray= array();
	$str	= "";
	$str	= $str ."\" \"".",". "\"Select SubCategory\"".",";
	$aa		= 0;
	while($nt = mysql_fetch_array($q))
	{
		$str = $str ."\"$nt[id]\"".",". "\"$nt[ssub_name]\"".",";
		$aa++;
	}
	
	$str	= substr($str,0,(strlen($str)-1)); // Removing the last char , from the string
	echo "new Array($str)";
}

# ******************* Fetch Result Base in State Id *********************************

if($_GET['opt'] == 3)
{
	$s_id	= $_GET['cid'];
	$q		= mysql_query("select * from cities where state_id='".$s_id."' order by city_name ");
	$num_rows = mysql_num_rows($q);
	
	$myarray=array();
	$str	= "";
	$str	= $str ."\" \"".",". "\"Select City\"".",";
	$aa		= 0;
	while($nt = mysql_fetch_array($q))
	{
		$str = $str ."\"$nt[city_id]\"".",". "\"$nt[city_name]\"".",";
		$aa++;
	}
	
	$str	= substr($str,0,(strlen($str)-1)); // Removing the last char , from the string
	echo "new Array($str)";
}
?>
