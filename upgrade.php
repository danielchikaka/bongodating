<?php 
include_once("config/db_connect.php") ;
include_once("config/ckh_session.php");

// Fetch user information
$userdata		= mysql_query("select * from user where user_id = '".$_SESSION['userid']."' ");
$fetch_user		= mysql_fetch_array($userdata);
$user_country 	= $fetch_user['user_country'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME; ?></title>
<meta name="description" content="<?php echo SITE_DESCRIPTION; ?>"/>
<meta name="keywords" content="<?php echo SITE_KEYWORD; ?>"/>

<link rel="shortcut icon" type="image/x-icon" href="images/logo/<?php echo SITE_FAVICON; ?>"/>
<link href="templates/default/css/main.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/template.css" type="text/css"/>
<script src="js/jquery-1.6.min.js" type="text/javascript"></script>
<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"> </script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
	jQuery(document).ready(function(){
	jQuery("#member").validationEngine();
	});

</script>

</head>
<body>
  <?php include_once("header.php");?>
<div id="wrapper">
  <div id="maincont">
    <div id="illust">
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1">As an upgraded member, you will show up FIRST on Meet Me. This means that new users will let you know if they are attracted to you or not within minutes of signup! Messaging users who already find you attractive is the most effective way to use the site! </div>
        <div class="clr"></div>
        <div class="clr"></div>
        <div class="seriousmember">Get Your <?php echo SITE_NAME;?> Upgrade Now!</div>
        <div class="clr"></div>
        <div class="membership"> 1. Select Your Membership Length - *Funds in USD</div>
        <div class="clr"></div>
        <form name="member" id="member" action="paypal.php" method="post">
          <input type="hidden" name="cmd" value="_xclick-subscriptions">
          <input type="hidden" name="business" value="<?php echo SITE_PAYPAL_EMAIL_ID;?>">
          <input type="hidden" name="lc" value="US">
          <input type="hidden" name="item_name" value="Upgrade Membership">
          <input type="hidden" name="no_note" value="1">
          <input type="hidden" name="src" value="1">
          <input type="hidden" name="currency_code" value="USD">
          <input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHostedGuest">
          <div class="seriousmember_main">
            <div class="upgrade_txt">
              <label id="subscribe">
              <input class="validate[required] radio" type="radio" name="subscribe" id="subscribe" value="1"/>
              1 Year @ $6.78/month ($81.40)</label>
              <br />
              <label id="subscribe">
              <input class="validate[required] radio" type="radio" name="subscribe" id="subscribe" value="2"/>
              6 Months @ $8.50/month ($51.00)</label>
              <br />
              <label id="subscribe">
              <input class="validate[required] radio" type="radio" name="subscribe" id="subscribe" value="3"/>
              3 Months @ $11.80/month ($35.40)</label>
            </div>
            <div class="clr"></div>
            <div class="upgrade_txt"> You will be billed the lump sum stated above. </div>
            <div class="clr"></div>
            <div class="membership">2. Please enter your billing information:</div>
            <div class="clr"></div>
            <div class="cards"><img src="images/cards.png" /></div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> First Name:</div>
            <div class="mandatory_flds">
              <input type="text" name="first_name" id="fname" class="validate[required]" />
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Last Name</div>
            <div class="mandatory_flds">
              <input type="text" name="last_name" id="lname" class="validate[required]" />
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Card Type:</div>
            <div class="mandatory_flds">
              <select name="ctype" id="ctype" class="list_drop validate[required]">
                <option value='' >Select Card</option>
                <option value='Visa'>Visa</option>
                <option value='Mastercard'>Mastercard</option>
                <option value='American Express'>American Express</option>
                <option value='Discover'>Discover</option>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Credit Card Number:</div>
            <div class="upgrade_txt">
              <input type="text" name="cnumber" id="cnumber" style="width:250px;" class="validate[required,custom[onlyNumberSp],minSize[14]] text-input" />
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Card Verification Number:</div>
            <div class="upgrade_txt">
              <input type="text" name="cvv" id="cvv" size="4" style="width:80px;" class="validate[required]" />
            </div>
            <div class="upgrade_txt">(CVV2 code) What's this?</div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Expiration Date:</div>
            <div class="mandatory_flds">
              <select name="month" id="month" class="list_drop validate[required]" style="width:80px;">
                <option value="">Month</option>
                <?php $month=1; while($month!=13) { ?>
                <option value="<?=$month;?>">
                <?=$month;?>
                </option>
                <?php $month++; } ?>
              </select>
            </div>
            <div class="mandatory_flds">
              <select name="year" id="year" class="list_drop validate[required]" style="width:80px;">
                <option value="">Year</option>
                <?php $year=2011; while($year!=2026) { ?>
                <option value="<?=$year;?>">
                <?=$year;?>
                </option>
                <?php $year++; } ?>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Country:</div>
            <div class="mandatory_flds">
              <select name="country" id="country" class="list_drop validate[required]">
                <option value="" selected="selected">Select Country</option>
                <?php $con= mysql_query("select * from country order by name asc");
			 while($confetch=mysql_fetch_array($con)){ ?>
                <option value="<?=$confetch['country_id'];?>" <?php if($user_country == $confetch['country_id']) echo "selected";?>>
                <?=$confetch['name'];?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Billing Address 1:</div>
            <div class="upgrade_txt">
              <input type="text" name="address1" id="address1" style="width:250px;" class="validate[required]" />
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Billing Address 2:</div>
            <div class="upgrade_txt">
              <input type="text" name="address2" id="address2" style="width:250px;" class="validate[required]" />
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> City</div>
            <div class="upgrade_txt">
              <input type="text" name="city" id="city" style="width:250px;" class="validate[required]" />
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Province:</div>
            <div class="upgrade_txt">
              <input type="text" name="province" id="province" style="width:250px;" class="validate[required]" />
            </div>
            <div class="clr"></div>
            <div class="mandatory_txt1"> Postal Code:</div>
            <div class="upgrade_txt">
              <input type="text" name="pincode" id="pincode" style="width:100px;" class="validate[required]" />
            </div>
            <div class="clr"></div>
            <div class="upgrade_txt">
              <label id="terms">
              <input type="checkbox" name="terms" id="terms" class="validate[required] checkbox" />
              I agree with the terms and understand
              that this upgrade is non-refundable.</label>
            </div>
            <div class="clr"></div>
            <div class="registration_form_bttn">
              <input type="image" src="images/complete_purchase.png" name="button" id="button" value="Submit" />
            </div>
            <div class="clr"></div>
          </div>
        </form>
        <div class="clr"> </div>
      </div>
      <div class="clr"></div>
    </div>
    <p>&nbsp;</p>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
