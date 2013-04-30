<?php 
session_start();
include_once("config/db_connect.php") ;
include_once("config/ckh_session.php");
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
	jQuery("#emailpass").validationEngine();
	});

</script>

</head>
<body>
  <?php include_once("header.php");?>
<div id="wrapper">
  <div id="maincont">
    <div id="illust">
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="chemistry_main" style="background:#f1f1f1;">
          <div class="profl_txt_1">As an upgraded member, you will show up FIRST on Meet Me. This means that new users will let you know if they are attracted to you or not within minutes of signup! Messaging users who already find you attractive is the most effective way to use the site! </div>
        </div>
        <div class="clr"></div>
        <div class="seriousmember">Get Your <?php echo SITE_NAME;?> Upgrade Now!</div>
        <div class="clr"></div>
        <div class="membership"> 1. Select Your Membership Length - *Funds in USD</div>
        <div class="clr"></div>
        <div class="seriousmember_main">
          <div class="upgrade_txt">
            <input name="" type="radio" value="" />
            1 Year @ $6.78/month ($81.40)<br />
            <form id="form2" name="form2" method="post" action="">
              <label>
              <input type="radio" name="radio" id="radio" value="radio" />
              </label>
              6 Months @ $8.50/month ($51.00) <br />
              <label>
              <input type="radio" name="radio2" id="radio2" value="radio2" />
              </label>
              3 Months @ $11.80/month ($35.40
            </form>
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
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield" id="textfield" />
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Last Name</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield2" id="textfield2" />
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Card Type:</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select3" id="select3" class="list_drop">
                <option value='0' >Select</option>
                <option value='1'>Visa</option>
                <option value='2'>Mastercard</option>
                <option value='3'>American Express</option>
                <option value='4'>Discover</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Credit Card Number:</div>
          <div class="upgrade_txt">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield3" id="textfield3" style="width:250px;" />
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Card Verification Number:</div>
          <div class="upgrade_txt">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield4" id="textfield4" style="width:80px;" />
              </label>
            </form>
          </div>
          <div class="upgrade_txt">(CVV2 code) What's this?</div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Expiration Date:</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select6" id="select6" class="list_drop" style="width:80px;">
                <option value=b>Month</option>
                <option value=01 >01</option>
                <option value=02 >02</option>
                <option value=03 >03</option>
                <option value=04 >04</option>
                <option value=05 >05</option>
                <option value=06 >06</option>
                <option value=07 >07</option>
                <option value=08 >08</option>
                <option value=09 >09</option>
                <option value=10 >10</option>
                <option value=11 >11</option>
                <option value=12 >12</option>
              </select>
              </label>
            </form>
          </div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select6" id="select6" class="list_drop" style="width:80px;">
                <option value=c>Year</option>
                <option value=2011 >2011</option>
                <option value=2012 >2012</option>
                <option value=2013 >2013</option>
                <option value=2014 >2014</option>
                <option value=2015 >2015</option>
                <option value=2016 >2016</option>
                <option value=2017 >2017</option>
                <option value=2018 >2018</option>
                <option value=2019 >2019</option>
                <option value=2020 >2020</option>
                <option value=2021 >2021</option>
                <option value=2022 >2022</option>
                <option value=2023 >2023</option>
                <option value=2024 >2024</option>
                <option value=2020 >2025</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Country:</div>
          <div class="mandatory_flds">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <select name="select9" id="select9" class="list_drop">
                <option>India</option>
              </select>
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Billing Address 1:</div>
          <div class="upgrade_txt">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield3" id="textfield3" style="width:250px;" />
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Billing Address 1:</div>
          <div class="upgrade_txt">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield3" id="textfield3" style="width:250px;" />
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> City</div>
          <div class="upgrade_txt">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield3" id="textfield3" style="width:250px;" />
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Province:</div>
          <div class="upgrade_txt">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield3" id="textfield3" style="width:250px;" />
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="mandatory_txt1"> Postal Code:</div>
          <div class="upgrade_txt">
            <form id="form1" name="form1" method="post" action="">
              <label>
              <input type="text" name="textfield3" id="textfield3" style="width:100px;" />
              </label>
            </form>
          </div>
          <div class="clr"></div>
          <div class="upgrade_txt">
            <form id="form3" name="form3" method="post" action="">
              <label>
              <input type="checkbox" name="checkbox" id="checkbox" />
              </label>
              I agree with the terms and understand
              that this upgrade is non-refundable.
            </form>
          </div>
          <div class="clr"></div>
          <div class="registration_form_bttn">
            <input type="image" src="images/complete_purchase.png" name="button" id="button" value="Submit" />
          </div>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
