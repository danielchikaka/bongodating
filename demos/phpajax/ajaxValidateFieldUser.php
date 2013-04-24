<?php
include_once("../../config/db_connect.php") ;
/* RECEIVE VALUE */


$validateValue=$_GET['fieldValue'];
$validateId=$_GET['fieldId'];

$validateError= "This email is already taken";
$validateSuccess= "This email is available";

$email_check=mysql_query("select * from user where user_email='".$validateValue."'");

/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;
	
if(mysql_num_rows($email_check)<1)
{
	$arrayToJs[1] = true;			// RETURN TRUE
	echo json_encode($arrayToJs);			// RETURN ARRAY WITH success
}
else
{
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[1] = false;
			echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
		}
	}
}






	/* RETURN VALUE */
	/*$arrayToJs = array();
	$arrayToJs[0] = $validateId;

if($validateValue =="raza@gmail.com"){		// validate??
	$arrayToJs[1] = true;			// RETURN TRUE
	echo json_encode($arrayToJs);			// RETURN ARRAY WITH success
}else{
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[1] = false;
			echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
		}
	}
	
}*/

?>
