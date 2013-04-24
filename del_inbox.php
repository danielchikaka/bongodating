<?php 
include_once("config/db_connect.php");

// Delete inbox message, not delete permanently 
if(isset($_POST['inbcheck'])) {

	foreach($_POST['inbcheck'] as $abc)
	{
	
		$query	= mysql_query("update messages set status = '0' where id = '$abc' ");
		
		if($query)
		{
			header("location:inbox.php?lnermg=1");
		}
	}

}
else
{
	header("location:inbox.php?lnermg=2");
}
?>