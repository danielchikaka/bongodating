<?php
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$curdir = $protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI'])."/";


// Add Payment table
$subscribe	 = $_POST['subscribe'];
$first_name	 = $_POST['first_name'];
$last_name	 = $_POST['last_name'];
$ctype		 = $_POST['ctype'];
$cnumber	 = $_POST['cnumber'];
$cvv		 = $_POST['cvv'];
$month		 = $_POST['month'];
$year		 = $_POST['year'];
$country	 = $_POST['country'];
$address1	 = $_POST['address1'];
$address2	 = $_POST['address2'];
$city		 = $_POST['city'];
$province	 = $_POST['province'];
$pincode	 = $_POST['pincode'];
$terms		 = $_POST['terms'];
$expdate	 = $_POST['month'].'-'.$_POST['year'];
$item_name	 = $_POST['item_name'];

$userid		 = $_SESSION['userid'];

// for subscription 
if($subscribe == 1)
{
	$a3 = "81.40";
	$t3 = "Y";
	$p3 = "1";
}
elseif($subscribe == 2)
{
	$a3 = "51.00";
	$t3 = "M";
	$p3 = "6";
}
elseif($subscribe == 3)
{
	$a3 = "35.40";
	$t3 = "M";
	$p3 = "3";
}

$abc = mysql_fetch_array(mysql_query("select user_email from user where user_id = '".$userid."'"));
$user_email = $abc['user_email'];


$sql = " insert into payment set user_id = '".$userid."' , firstname = '".$first_name."' , lastname = '".$last_name."' , email = '".$user_email."' , cardtype = '".$ctype."' , cardnumber = '".$cnumber."' , cvv2_code = '".$cvv."' , exp_date = '".$expdate."' , country = '".$country."' , address1 = '".address1."' , address2 = '".$address2."' , city = '".$city."' , province = '".$province."' , postalcode = '".$pincode."' , subscription = '".$a3."' , paymentdate = now() , status='0' ";

$qry	 = mysql_query($sql);
$last_id = mysql_insert_id();

 
// PayPal settings

//$paypal_email	 = 'razaul_1248524012_biz@gmail.com';

$paypal_email	 = SITE_PAYPAL_EMAIL_ID;
$return_url		 = $curdir.'return.php';
$cancel_url		 = $curdir.'cancel.php';
$notify_url		 = $curdir.'success.php';


// Include Functions
include("functions.php");


// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
	// Request from step 3
}else{

	// Response from Paypal

	// read the post from PayPal system and add 'cmd'
	
	$req = 'cmd=_notify-validate';
	
	foreach ($_POST as $key => $value) {
	   
		//$value = urlencode(stripslashes($value));
		//$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
		//$req .= "&$key=$value";
	}

	// assign posted variables to local variables
	$data['item_name']			= $_POST['item_name'];
	$data['item_number'] 		= $_POST['item_number'];
	$data['payment_status'] 	= $_POST['payment_status'];
	$data['payment_amount'] 	= $_POST['mc_gross'];
	$data['payment_currency']	= $_POST['mc_currency'];
	$data['txn_id']				= $_POST['txn_id'];
	$data['receiver_email'] 	= $_POST['receiver_email'];
	$data['payer_email'] 		= $_POST['payer_email'];
	$data['custom'] 			= $_POST['custom'];
	

	// post back to PayPal system to validate
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

	$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

	if (!$fp) {
		// HTTP ERROR
	} else {
				//mail('ash@evoluted.net', '0', '0');
		fputs ($fp, $header . $req);
		while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (strcmp ($res, "VERIFIED") == 0) {

				// Validate payment (Check unique txnid & correct price)
				$valid_txnid = check_txnid($data['txn_id']);
				$valid_price = check_price($data['payment_amount'], $data['item_number']);
				// PAYMENT VALIDATED & VERIFIED!
				if($valid_txnid && $valid_price){
					$orderid = updatePayments($data);
					if($orderid){
						// Payment has been made & successfully inserted into the Database
					}else{
						// Error inserting into DB
						// E-mail admin or alert user
					}
				}else{
					// Payment made but data has been changed
					// E-mail admin or alert user
				}

			}else if (strcmp ($res, "INVALID") == 0) {

				// PAYMENT INVALID & INVESTIGATE MANUALY!
				// E-mail admin or alert user
			}
		}
	fclose ($fp);
	}
}
 
 
 // Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){

	// Firstly Append paypal account to querystring
	$querystring .= "?business=".urlencode($paypal_email)."&";

	// Append amount& currency (£) to quersytring so it cannot be edited in html

	//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
 $querystring .= "item_name=".urlencode($item_name)."&";
	//$querystring .= "amount=".urlencode($a3)."&";
	$querystring .= "a3=".urlencode($a3)."&";
	$querystring .= "t3=".urlencode($t3)."&";
	$querystring .= "p3=".urlencode($p3)."&";
	$querystring .= "custom=".urlencode($last_id)."&";
	

	//loop for posted values and append to querystring
	foreach($_POST as $key => $value){
		$value = urlencode(stripslashes($value));
		$querystring .= "$key=$value&";
	}

	// Append paypal return addresses
	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	$querystring .= "notify_url=".urlencode($notify_url);

	// Append querystring with custom field
	//$querystring .= "&custom=".USERID;

	// Redirect to paypal IPN
	header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
	exit();

}else{
	// Response from PayPal
}

?>
