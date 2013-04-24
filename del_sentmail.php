<?php 
include_once("config/db_connect.php");

// Delete sent message
if(isset($_POST['sentcheck'])) {

	foreach($_POST['sentcheck'] as $abc)
	{
		$query = mysql_query("update messages set send = '0' where id = '$abc' ");
	
		if($query)
		{
			header("location:sent_mail.php?lnermg=1");
		}
	}

}
else
{
	header("location:sent_mail.php?lnermg=2");
}

?>