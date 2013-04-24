<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");
// Response from Paypal
	
	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-validate';
	foreach ($_POST as $key => $value) {
		$req .= "&$key=$value";
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
	//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);	
	
	
if (!$fp) {
		// HTTP ERROR
	} else {	
		fputs ($fp, $header . $req);
		while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (strcmp ($res, "VERIFIED") == 0) {
						
				// Validate payment (Check unique txnid & correct price)
				//$valid_txnid = check_txnid($data['txn_id']);
				//$valid_price = check_price($data['payment_amount'], $data['item_number']);
				
				// PAYMENT VALIDATED & VERIFIED!
		
	//
		$getinfo=mysql_query("select * from payment where id='".$data['custom']."'");
		$res=mysql_fetch_assoc($getinfo);
		
		// Send mail for admin payment successfull receive
		$messag="<html><body>
					<table align='center' cellpadding='2' cellspacing='2'>
						<tr>
							<td colspan='2'><b>".$data['payer_email']."</b> has pay the amount through paypal. The details are given below:-</td>
						</tr>
						<tr>
							<td>email:</td>
							<td>".$res['email']."</td>
						</tr>
						<tr>
							<td>Status:</td>
							<td>".$data['payment_status']."</td>
						</tr>
						<tr>
							<td>Amount:</td>
							<td>".$data['payment_amount']."</td>
						</tr>
						<tr>
							<td>txnid:</td>
							<td>".$data['txn_id']."</td>
						</tr>
						<tr>
							<td>Name:</td>
							<td>".$res['firstname']."</td>
						</tr>
						<tr>
							<td>Address:</td>
							<td>".$res['address1']."</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><b>Admin,</b><br/>softedatepro.com</td>
						</tr>
					</table>
				</body></html>";
				
	$from_ad = $data['payer_email'];
	$to		 = SITE_MAIL;
	$bcc	 = '';
	
	
	$header = 'MIME-Version: 1.0' . "\r\n".
		   'Content-type: text/html; charset=UTF-8' . "\r\n" .
		   'From:'."$fname<$from_ad>". "\r\n" .
		   'Bcc:'."$bcc". "\r\n" .
		   'Reply-To: '."$from_ad". "\r\n" .
		  'X-Mailer: PHP/' . phpversion();
	$x = mail($to,'paypal',$messag,$header);
	
	//update transaction id and others details related to payment
	mysql_query(" update payment set transaction_id = '".$data['txn_id']."' , subscription = '".$data['payment_amount']."' , status = '".$data['payment_status']."' , paymentdate = now() , payment_from = 'Paypal' where id = '".$data['custom']."' ");
			
			}else if (strcmp ($res, "INVALID") == 0) {
		
				// PAYMENT INVALID & INVESTIGATE MANUALY! 
				// E-mail admin or alert user
			}		
		}		
	fclose ($fp);
	}
	

///////////////////////////////////////////

			// Send mail for user payment confirmation
			$messag_reg="<html><body>
							<table align='center' cellpadding='2' cellspacing='2'>
								<tr>
									<td colspan='2'>Hi, We have received your registration confirmation via  <b> ".$data['payer_email']."</b> email and has pay the amount through paypal. The details are given below:-</td>
								</tr>
								<tr>
									<td>email:</td>
									<td>".$res['email']."</td>
								</tr>
								<tr>
									<td>Status:</td>
									<td>".$data['payment_status']."</td>
								</tr>
								<tr>
									<td>Amount:</td>
									<td>".$data['payment_amount']."</td>
								</tr>
								<tr>
									<td>txnid:</td>
									<td>".$data['txn_id']."</td>
								</tr>
								<tr>
									<td>Name:</td>
									<td>".$res['name']."</td>
								</tr>
								<tr>
									<td>Address:</td>
									<td>".$res['address']."</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><b>Admin,</b><br/>softedatepro.com</td>
								</tr>
							</table>
						</body></html>";

	$reg_email	= $data['payer_email'];
	mail($reg_email,'Registration Confirmed',$messag_reg,$header);

////////////////////////////////////////////
?>
